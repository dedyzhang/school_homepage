<?php

namespace App\Http\Controllers;

use App\Exports\InterviewExport;
use App\Exports\SiswaExport;
use App\Models\Sekolah;
use App\Models\spmb;
use App\Models\spmbSettings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Maatwebsite\Excel\Facades\Excel;

class SpmbController extends Controller
{
    public function index() {
        $user = Auth::user();
        if ($user->access == 'superadmin') {
            $sekolah = Sekolah::all();
        } else {
            $sekolah = Sekolah::where('uuid', $user->tingkat)->get();
        }
        return view('spmb.index',compact('sekolah'));
    }
    
    public function show(String $sekolah) {
        $sekolah = Sekolah::findOrFail($sekolah);
        $spmb_siswa = spmb::where('id_sekolah',$sekolah->uuid)->orderBy('created_at','desc')->get();
        

        return view('spmb.show',compact('sekolah','spmb_siswa'));
    }
    /**
     * Siswa - Detail SPMB
     */
    public function detailSiswa(String $uuid) {
        $user = Auth::user();
        $spmb_siswa = spmb::findOrFail($uuid);
        $sekolah = Sekolah::findOrFail($spmb_siswa->id_sekolah);
        $biodata = unserialize($spmb_siswa->biodata);
        return view('spmb.siswa.detail',compact('spmb_siswa','sekolah','biodata','user'));
    }

    public function settingsIndex() {
        $user = Auth::user();
        if ($user->access == 'superadmin') {
            $sekolah = Sekolah::all();
        } else {
            $sekolah = Sekolah::where('uuid', $user->tingkat)->get();
        }
        return view('spmb.setting.sekolah',compact('sekolah'));
    }

    public function settings(String $sekolah) {
        $sekolah = Sekolah::findOrFail($sekolah);
        $formulir_spmb = spmbSettings::where([
            ['id_sekolah','=',$sekolah->uuid],
            ['jenis','=','formulir_spmb']
        ])->first();
        $mode_spmb = spmbSettings::where([
            ['id_sekolah','=',$sekolah->uuid],
            ['jenis','=','mode_spmb']
        ])->first();
        if($mode_spmb != null) {
            $mode_pendaftaran = $mode_spmb->nilai;
        } else {
            $mode_pendaftaran = '';
        }
        if($formulir_spmb != null && $formulir_spmb->count() > 0) {
            $formulir = unserialize($formulir_spmb->nilai);
        } else {
            $formulir = array();
        }
        $status_spmb = spmbSettings::where([
            ['id_sekolah','=',$sekolah->uuid],
            ['jenis','=','status']
        ])->first();
        if($status_spmb != null) {
            $status = unserialize($status_spmb->nilai);
        } else {
            $status = array(
                'status' => null,
                'gelombang' => null
            );
        }
        $berkas = spmbSettings::where([
            ['id_sekolah','=',$sekolah->uuid],
            ['jenis','=','berkas_spmb']
        ])->first();
        if($berkas != null) {
            $berkas_spmb = unserialize($berkas->nilai);
        } else {
            $berkas_spmb = array();
        }
        
        $interview = spmbSettings::where([
            ['id_sekolah','=',$sekolah->uuid],
            ['jenis','=','interview_spmb']
        ])->first();

        if($interview != null) {
            $interview_kuestioner = unserialize($interview->nilai);
        } else {
            $interview_kuestioner = array();
        }
        
        $desc_hasil = spmbSettings::where([
            ['id_sekolah','=',$sekolah->uuid],
            ['jenis','=','deskripsi_hasil_spmb']
        ])->first();

        if($desc_hasil != null) {
            $deskripsi = $desc_hasil->nilai;
        } else {
            $deskripsi = '';
        }

        return view('spmb.setting.index',compact('sekolah','formulir','mode_pendaftaran','status','berkas_spmb','interview_kuestioner','deskripsi'));
    }
    /**
     * Store Daftar Formulir yang diisi per sekolah
     */
    public function formulirStore(Request $request, String $sekolah) {
        $sekolah = Sekolah::findOrFail($sekolah);
        
        $formulir = $request->formulir_spmb;
        $array_formulir = array();
        array_push($array_formulir,'nama','jk','ttl','agama','alamat','sekolah_asal','pindah_ke','jenis_pendaftaran');
        if(isset($formulir)) {
            foreach($formulir as $nilai) {
                array_push($array_formulir,$nilai);
            }
        }
        $spmbSetting = spmbSettings::where([
            ['id_sekolah','=',$sekolah->uuid],
            ['jenis','=','formulir_spmb']
        ])->first();
        if($spmbSetting != null) {
            $spmbSetting->update([
                'nilai' => serialize($array_formulir)
            ]);
        } else {
            spmbSettings::create([
                'id_sekolah' => $sekolah->uuid,
                'jenis' => 'formulir_spmb',
                'nilai' => serialize($array_formulir)
            ]);
        }
        return redirect()->route('spmb.settings', $sekolah->uuid)->with('success', 'Formulir berhasil diperbarui.');
    }
    /**
     * Setting ganti mode pendaftaran
     */
    public function modeStore(Request $request, String $sekolah) {
        $sekolah = Sekolah::findOrFail($sekolah);
        
        $mode = $request->mode_pendaftaran;
        
        $spmbSetting = spmbSettings::where([
            ['id_sekolah','=',$sekolah->uuid],
            ['jenis','=','mode_spmb']
        ])->first();
        if($spmbSetting != null) {
            $spmbSetting->update([
                'nilai' => $mode
            ]);
        } else {
            spmbSettings::create([
                'id_sekolah' => $sekolah->uuid,
                'jenis' => 'mode_spmb',
                'nilai' => $mode
            ]);
        }
        return redirect()->route('spmb.settings', $sekolah->uuid)->with('success', 'Mode Pendaftaran berhasil diperbarui.');
    }
    /**
     * Setting berkas yang diupload Siswa
     */
    public function berkasStore(Request $request, String $sekolah) {
        $sekolah = Sekolah::findOrFail($sekolah);
        $setting_berkas = spmbSettings::where([
            ['id_sekolah','=',$sekolah->uuid],
            ['jenis','=','berkas_spmb']
        ])->first();
        $nama_berkas = $request->nama_berkas;
        $deskripsi_berkas = $request->deskripsi_berkas;
        $array_berkas = array(
            "nama_berkas" => $nama_berkas,
            "deskripsi_berkas" => $deskripsi_berkas
        );
        
        if($setting_berkas != null) {
            $berkas_serialized = unserialize($setting_berkas->nilai);
            array_push($berkas_serialized, $array_berkas);

            $setting_berkas->update([
                'nilai' => serialize($berkas_serialized)
            ]);
        } else {
            spmbSettings::create([
                'id_sekolah' => $sekolah->uuid,
                'jenis' => 'berkas_spmb',
                'nilai' => serialize(array($array_berkas))
            ]);
        }

        return redirect()->route('spmb.settings', $sekolah->uuid)->with('success', 'Berkas SPMB berhasil ditambahkan.');
    }
    /**
     * Hapus Berkas SPMB Yang sudah ditentukan
     */
    public function berkasDelete(Request $request, String $sekolah) {
        $sekolah = Sekolah::findOrFail($sekolah);
        $setting_berkas = spmbSettings::where([
            ['id_sekolah','=',$sekolah->uuid],
            ['jenis','=','berkas_spmb']
        ])->first();
        if($setting_berkas != null) {
            $berkas_serialized = unserialize($setting_berkas->nilai);
            $nama_berkas_hapus = $request->namaBerkas;
            $updated_berkas = array();
            foreach($berkas_serialized as $item) {
                if($item['nama_berkas'] != $nama_berkas_hapus) {
                    array_push($updated_berkas, $item);
                }
            }
            if(count($updated_berkas) == 0) {
                $setting_berkas->delete();
            } else {
                $setting_berkas->update([
                    'nilai' => serialize($updated_berkas)
                ]);
            }
        }
        return response()->json(['success' => 'Berhasil menghapus Berkas']);
    }
    /**
     * Setting status Pendaftaran
     */
    public function statusStore(Request $request, String $sekolah) {
        $sekolah = Sekolah::findOrFail($sekolah);
        
        $status = array(
            'status' => $request->status_pendaftaran,
            'gelombang' => $request->gelombang
        );
        
        $status = serialize($status);
        $spmbSetting = spmbSettings::where([
            ['id_sekolah','=',$sekolah->uuid],
            ['jenis','=','status']
        ])->first();
        if($spmbSetting != null) {
            $spmbSetting->update([
                'nilai' => $status
            ]);
        } else {
            spmbSettings::create([
                'id_sekolah' => $sekolah->uuid,
                'jenis' => 'status',
                'nilai' => $status
            ]);
        }
        return redirect()->route('spmb.settings', $sekolah->uuid)->with('success', 'Status Pendaftaran berhasil diperbarui.');
    }

    /**
     * Show Document yang diupload siswa
     */
    public function uploadSiswa(String $uuid) {
        $spmb_siswa = spmb::findOrFail($uuid);
        $sekolah = Sekolah::findOrFail($spmb_siswa->id_sekolah);
        $spmb_berkas = spmbSettings::where([
            ['id_sekolah','=',$sekolah->uuid],
            ['jenis','=','berkas_spmb']
        ])->first();
        if($spmb_berkas != null) {
            $berkas_array = unserialize($spmb_berkas->nilai);
        } else {
            $berkas_array = array();
        }
        if(isset($spmb_siswa) && $spmb_siswa->dokumen != "") {
            $siswa_berkas = unserialize($spmb_siswa->dokumen);
        } else {
            $siswa_berkas = array();
        }
        // dd($sekolah);
        return view('spmb.upload',compact('sekolah','berkas_array','siswa_berkas','spmb_siswa'));
    }
    /**
     * Admin upload dokumen SPMB
     */
    public function AdminUploadDokumenStore(Request $request,String $uuid) {
        $spmb_siswa = spmb::findOrFail($uuid);
        $sekolah = Sekolah::findOrFail($spmb_siswa->id_sekolah);
        $berkas_terupload = array();
        if($spmb_siswa->dokumen != null) {
            $berkas_terupload = unserialize($spmb_siswa->dokumen);
        }
        $request->validate([

            'file_berkas' => 'required|mimes:jpg,png,jpeg,pneg|max:5120',
        ],[
            'file_berkas.required' => 'File berkas wajib diunggah.',
            'file_berkas.mimes' => 'Format file berkas harus berupa jpg, png, jpeg, atau pdf.',
            'file_berkas.max' => 'Ukuran file berkas maksimal 5MB.',
        ]);
        
        $file = $request->file('file_berkas');
        $filepath = 'spmb/'.$sekolah->kode.'/'.$spmb_siswa->nis;
        $path = Storage::path($filepath);
        $date = date('dmYHis');
        $filename = $spmb_siswa->nis.'_'.$date.'_'.$request->nama_berkas.".".$file->getClientOriginalExtension();
        if(!Storage::exists($filepath)) {
            $schoolpath = Storage::path('spmb/'.$sekolah->kode);
            $spmbpath = Storage::path('spmb');
            umask(002); 
            Storage::makeDirectory($filepath, 0755,true);
            chmod($schoolpath, 0755);
            chmod($spmbpath, 0755);
            chmod($path, 0755);
        }
        $manager = new ImageManager(new Driver());
        $image = $manager->read($file);
        $image->save($path."/".$filename,60);

        // $file->storeAs($filepath,$filename);
        if(count($berkas_terupload) > 0) {
            $nama_berkas = $request->nama_berkas;
            $find = array_filter($berkas_terupload,function($item) use ($nama_berkas) {
                return $item['nama_berkas'] == $nama_berkas;
            });
            if(count($find) == 0) {
                array_push($berkas_terupload, array(
                    'nama_berkas' => $request->nama_berkas,
                    'lokasi_berkas' => $filepath.'/'.$filename
                ));
            } else {
                $result = array_filter($berkas_terupload,function($item) use ($nama_berkas) {
                    return $item['nama_berkas'] != $nama_berkas;
                });
                $berkas_terupload = $result;
                array_push($berkas_terupload, array(
                    'nama_berkas' => $request->nama_berkas,
                    'lokasi_berkas' => $filepath.'/'.$filename
                ));
            }
        } else {
            array_push($berkas_terupload, array(
                'nama_berkas' => $request->nama_berkas,
                'lokasi_berkas' => $filepath.'/'.$filename
            ));
        }
        $spmb_siswa->update([
            'dokumen' => serialize($berkas_terupload)
        ]);

        return redirect()->route('spmb.siswa.get.upload',$spmb_siswa->uuid)->with('success'.$request->nama_berkas, 'Berkas '.$request->nama_berkas.' berhasil diunggah/diupload.');
    }
    /**
     * Siswa Delete dokumen
     */
    public function AdmindeleteDokumen(Request $request,String $uuid) {
        $spmb_siswa = spmb::findOrFail($uuid);
        $sekolah = Sekolah::findOrFail($spmb_siswa->id_sekolah);
        $berkas_terupload = array();
        if($spmb_siswa->dokumen != null) {
            $berkas_terupload = unserialize($spmb_siswa->dokumen);
        }
        $nama_berkas = $request->berkas;

        $find = current(array_filter($berkas_terupload,function($item) use ($nama_berkas) {
            return $item['nama_berkas'] == $nama_berkas;
        }));
        $old_path = Storage::path($find['lokasi_berkas']);
        unlink($old_path);

        $result = array_filter($berkas_terupload,function($item) use ($nama_berkas) {
            return $item['nama_berkas'] != $nama_berkas;
        });
        $berkas_terupload = $result;

        if(count($result) > 0) {
            $spmb_siswa->update([
                'dokumen' => serialize($berkas_terupload)
            ]);
        } else {
            $spmb_siswa->update([
                'dokumen' => ''
            ]);
            $filepath = Storage::path('spmb/'.$sekolah->kode.'/'.$spmb_siswa->nis);
            rmdir($filepath);
        }

        return response()->json(['success' => "Sukses"]);

    }
    /**
     * Admin daftar siswa
     */
    public function spmbDaftar(String $uuid) {
        $sekolah = Sekolah::findOrFail($uuid);
        $spmbFormulir = spmbSettings::where([['id_sekolah','=',$sekolah->uuid],['jenis','=','formulir_spmb']])->first();
        $formulir = unserialize($spmbFormulir->nilai);

        $spmbStatus = spmbSettings::where([['id_sekolah','=',$sekolah->uuid],['jenis','=','status']])->first();
        if($spmbStatus != null) {
            $status = unserialize($spmbStatus->nilai);
        } else {
            $status = array(
                'status' => null,
                'gelombang' => null
            );
        }
        return view('spmb.create',compact('sekolah','formulir'));
    }
    /**
     * Admin Store siswa SPMB
     */
    public function spmbStore(String $uuid,Request $request) {
        $sekolah = Sekolah::findOrFail($uuid);

        $formulir_spmb = spmbSettings::where([
            ['id_sekolah','=',$sekolah->uuid],
            ['jenis','=','formulir_spmb']
        ])->first();
        $formulir = unserialize($formulir_spmb->nilai);
        $array_wajib = array('nama','jk','agama','alamat','nisn','tempat_lahir','tanggal_lahir','no_handphone','no_whatsapp','email','tinggi_badan','berat_badan','whatsapp_ortu','alamat','rt_rw','kelurahan','kecamatan','kabupaten','provinsi','tinggal_dengan','jarak','transportasi','regis_akte','nik','anak_ke','dari_ke','sekolah_asal','jenis_pendaftaran');

        $array_validate = array();
        $request_formulir = $request->all();
        foreach($request_formulir as $key => $value) {
            if(in_array($key,$array_wajib)) {
                $array_validate[$key] = 'required';
            }
        }
        if($request->jk == null) {
            $array_validate['jk'] = 'required';
        }
        $request->validate($array_validate);


        $input = serialize($request->except(['_token','konfirmasi1','konfirmasi2']));
        $nis = $sekolah->kode.date('y').rand(10000,99999);

        //Ambil Data Gelombang dari Settingan
        $spmbStatus = spmbSettings::where([['id_sekolah','=',$sekolah->uuid],['jenis','=','status']])->first();
        if($spmbStatus != null) {
            $status = unserialize($spmbStatus->nilai);
        } else {
            $status = array(
                'status' => null,
                'gelombang' => null
            );
        }
        spmb::create([
            'id_sekolah'=> $sekolah->uuid,
            'nis'=> $nis,
            'biodata'=>$input,
            'dokumen'=>'',
            'gelombang' => $status['gelombang'],
            'interview' => null,
            'status'=> 'mendaftar',
            'VA' => 0,
            'biaya' => 0,
            'bank' => null,
            'keterangan' => null
        ]);

        $pass = date('dmY',strtotime($request->tanggal_lahir));

        $password = Hash::make($pass);
        User::create([
            'name' => $request->nama,
            'tingkat' => $sekolah->kode,
            'username' => $nis,
            'password' => $password,
            'access' => 'siswa',
            'token' => '0',
        ]);
        $message = 'Pendaftaran berhasil! Calon Siswa dengan nama '.$request->nama.', NIS Siswa adalah <b>'.$nis.'</b> dan password awal soswa adalah tanggal lahir anda dengan format DDMMYYYY ( Contoh 01 Januari 2007, maka passwordnya 01012007). Arahkan Orangtua/siswa bersangkutan untuk login kedalam aplikasi dan arahkan untuk menggungah berkas.';
        return redirect()->route('spmb.show',$sekolah->uuid)->with('success',$message);
    }
    /**
     * Admin Edit Siswa
     */
    public function spmbEdit(String $uuid) {
        $siswa = spmb::findOrFail($uuid);
        $sekolah = Sekolah::findOrFail($siswa->id_sekolah);
        $spmbFormulir = spmbSettings::where([['id_sekolah','=',$sekolah->uuid],['jenis','=','formulir_spmb']])->first();
        $formulir = unserialize($spmbFormulir->nilai);

        $spmbStatus = spmbSettings::where([['id_sekolah','=',$sekolah->uuid],['jenis','=','status']])->first();
        if($spmbStatus != null) {
            $status = unserialize($spmbStatus->nilai);
        } else {
            $status = array(
                'status' => null,
                'gelombang' => null
            );
        }
        $siswa_form = unserialize($siswa->biodata);
        return view('spmb.edit',compact('sekolah','formulir','siswa_form','siswa'));
    }
     /**
     * Admin Update siswa SPMB
     */
    public function spmbUpdate(String $uuid,Request $request) {
        $siswa = spmb::findOrFail($uuid);
        $user = User::where('username',$siswa->nis)->first();
        $sekolah = Sekolah::findOrFail($siswa->id_sekolah);

        $formulir_spmb = spmbSettings::where([
            ['id_sekolah','=',$sekolah->uuid],
            ['jenis','=','formulir_spmb']
        ])->first();
        $formulir = unserialize($formulir_spmb->nilai);
        $array_wajib = array('nama','jk','agama','alamat','nisn','tempat_lahir','tanggal_lahir','no_handphone','no_whatsapp','email','tinggi_badan','berat_badan','whatsapp_ortu','alamat','rt_rw','kelurahan','kecamatan','kabupaten','provinsi','tinggal_dengan','jarak','transportasi','regis_akte','nik','anak_ke','dari_ke','sekolah_asal','jenis_pendaftaran');

        $array_validate = array();
        $request_formulir = $request->all();
        foreach($request_formulir as $key => $value) {
            if(in_array($key,$array_wajib)) {
                $array_validate[$key] = 'required';
            }
        }
        if($request->jk == null) {
            $array_validate['jk'] = 'required';
        }
        $request->validate($array_validate);


        $input = serialize($request->except(['_token','konfirmasi1','konfirmasi2']));
        
        $siswa->update([
            'biodata' => $input
        ]);

        $pass = date('dmY',strtotime($request->tanggal_lahir));

        $password = Hash::make($pass);
        $user->update([
            'password' => $password
        ]);
        
        $message = 'Data Berhasil Diupdate';
        return redirect()->route('spmb.show',$sekolah->uuid)->with('success',$message);
    }
    public function spmbDelete(String $uuid) {
        $siswa = spmb::findOrFail($uuid);
        $sekolah = Sekolah::findOrFail($siswa->id_sekolah);
        $user = User::where('username',$siswa->nis)->first();
        if($siswa->dokumen != "") {
            $dokumen = unserialize($siswa->dokumen);
            foreach($dokumen as $key => $item) {
                $old_path = Storage::path($item['lokasi_berkas']);
                unlink($old_path);
            }
            $filepath = Storage::path('spmb/'.$sekolah->kode.'/'.$siswa->nis);
            rmdir($filepath);
        }
        $user->delete();
        $siswa->delete();
    }
    //Buat Informasi SPMB
    public function spmbInformasi(String $uuid) {
        $sekolah = Sekolah::findOrFail($uuid);
        $spmbSetting = spmbSettings::where([
            ['id_sekolah','=',$sekolah->uuid],
            ['jenis','=','informasi_spmb']
        ])->first();
        if($spmbSetting != null) {
            $isi = $spmbSetting->nilai;
        } else {
            $isi = '';
        }
        return view('spmb.informasi',compact('sekolah','isi'));

    }
    public function spmbInformasiStore(Request $request, String $uuid) {
        $sekolah = Sekolah::findOrFail($uuid);
        
        // $request->validate([
        //     'isi' => 'required'
        // ]);
        
        $spmbSetting = spmbSettings::where([
            ['id_sekolah','=',$sekolah->uuid],
            ['jenis','=','informasi_spmb']
        ])->first();
        if($spmbSetting != null) {
            $spmbSetting->update([
                'nilai' => $request->isi
            ]);
        } else {
            spmbSettings::create([
                'id_sekolah' => $sekolah->uuid,
                'jenis' => 'informasi_spmb',
                'nilai' => $request->isi,
            ]);

        }
        return redirect()->back()->with('success','Informasi SPMB Berhasil Di Update');
    }

    /**
     * Admin Download Excel daftar Siswa SPMB
     */
    public function cetakDaftarSiswa(String $uuid) {
        return Excel::download(new SiswaExport($uuid), 'Daftar_Siswa_SPMB.xlsx');
    }
    /**
     * Admin Download Excel daftar Siswa SPMB
     */
    public function cetakInterviewSiswa(String $uuid) {
        return Excel::download(new InterviewExport($uuid), 'Hasil_interview_SPMB.xlsx');
    }

    /**
     * Interview Siswa SPMB
     */
    public function spmbInterviewIndex() {
        $user = Auth::user();
        if ($user->access == 'superadmin') {
            $sekolah = Sekolah::all();
        } else {
            $sekolah = Sekolah::where('uuid', $user->tingkat)->get();
        }
        return view('spmb.interview.index',compact('sekolah'));
    }
    public function spmbInterviewStore(String $uuid, Request $request) {
        $sekolah = Sekolah::findOrFail($uuid);
        $interview_setting = spmbSettings::where([
            ['id_sekolah','=',$sekolah->uuid],
            ['jenis','=','interview_spmb']
        ])->first();
        if($interview_setting != null) {
            $kuestioner = unserialize($interview_setting->nilai);
            array_push($kuestioner,array(
                'id_kuestioner' => 'kues'.rand(1000,9999),
                'jenis' => $request->jenis,
                'kuestioner' => $request->kuestioner,
                'opsi' => $request->option
            ));
            $interview_setting->update([
                'nilai' => serialize($kuestioner)
            ]);
        } else {
            $kuestioner = array();
            $id_kuestioner = 'kues'.rand(1000,9999);
            array_push($kuestioner,array(
                'id_kuestioner' => $id_kuestioner,
                'jenis' => $request->jenis,
                'kuestioner' => $request->kuestioner,
                'opsi' => $request->option
            ));
            spmbSettings::create([
                'id_sekolah' => $sekolah->uuid,
                'jenis' => 'interview_spmb',
                'nilai' => serialize($kuestioner)
            ]);
        }
        return response()->json(['success' => 'Berhasil Menambahkan Kuestioner Interview']);
    }
    public function spmbInterviewDelete(String $uuid, Request $request) {
        $sekolah = Sekolah::findOrFail($uuid);
        $interview_setting = spmbSettings::where([
            ['id_sekolah','=',$sekolah->uuid],
            ['jenis','=','interview_spmb']
        ])->first();
        if($interview_setting != null) {
            $kuestioner = unserialize($interview_setting->nilai);
            $updated_kuestioner = array();
            foreach($kuestioner as $item) {
                if($item['id_kuestioner'] != $request->id_kuestioner) {
                    array_push($updated_kuestioner, $item);
                }
            }
            if(count($updated_kuestioner) == 0) {
                $interview_setting->delete();
            } else {
                $interview_setting->update([
                    'nilai' => serialize($updated_kuestioner)
                ]);
            }
        }
        return response()->json(['success' => 'Berhasil Menghapus Kuestioner Interview']);
    }
    public function spmbInterviewShow(String $uuid) {
        $sekolah = Sekolah::findOrFail($uuid);
        $spmb_siswa = spmb::where('id_sekolah',$sekolah->uuid)->orderBy('created_at','desc')->get();
        

        return view('spmb.interview.show',compact('sekolah','spmb_siswa'));
    }

    public function spmbInterviewEdit(String $uuid) {
        $idSekolah = spmb::findOrFail($uuid)->id_sekolah;
        $siswa = spmb::findOrFail($uuid);
        $sekolah = Sekolah::findOrFail($idSekolah);
        $kuestioner = spmbSettings::where([
            ['id_sekolah','=',$idSekolah],
            ['jenis','=','interview_spmb']
        ])->first();
        
        if($kuestioner != null) {
            $kuestioner_array = unserialize($kuestioner->nilai);
        } else {
            $kuestioner_array = array();
        }

        if($siswa->interview != null) {
            $jawaban = unserialize($siswa->interview);
        } else {
            $jawaban = array();
        }
        return view('spmb.interview.edit',compact('kuestioner_array','sekolah','siswa','jawaban'));
    }

    public function spmbInterviewUpdate(String $uuid, Request $request) {
        $spmb_siswa = spmb::findOrFail($uuid);
        $idSekolah = $spmb_siswa->id_sekolah;
        $sekolah = Sekolah::findOrFail($idSekolah);
        $jawaban = serialize($request->jawabanArray);
        $spmb_siswa->update([
            'interview' => $jawaban
        ]);
        return response()->json(['success' => true, 'message' => 'Berhasil Menyimpan Data Interview']);
    }

    public function spmbHasilIndex() {
        $user = Auth::user();
        if ($user->access == 'superadmin') {
            $sekolah = Sekolah::all();
        } else {
            $sekolah = Sekolah::where('uuid', $user->tingkat)->get();
        }
        return view('spmb.hasil.index',compact('sekolah'));
    }
    public function spmbHasilShow(String $uuid) {
        $sekolah = Sekolah::findOrFail($uuid);
        $spmb_siswa = spmb::where('id_sekolah',$sekolah->uuid)->orderBy('created_at','desc')->get();
        

        return view('spmb.hasil.show',compact('sekolah','spmb_siswa'));
    }

    public function spmbHasilUpdate(String $uuid, Request $request) {
        $spmb_siswa = spmb::findOrFail($uuid);
        $jenis = $request->jenis;
        $spmb_siswa->update([
            $jenis => $request->nilai
        ]);
        return response()->json(['success' => true]);
    }

    /**
     * Atur Setting Deskripsi Hasil SPMB
     */
    public function spmbdescHasilStore(String $uuid,Request $request) {
     $sekolah = Sekolah::findOrFail($uuid);
    
    $request->validate([
        'desc_hasil' => 'required'
    ]);
    $mode = $request->desc_hasil;
    
    $spmbSetting = spmbSettings::where([
        ['id_sekolah','=',$sekolah->uuid],
        ['jenis','=','deskripsi_hasil_spmb']
    ])->first();
    if($spmbSetting != null) {
        $spmbSetting->update([
            'nilai' => $mode
        ]);
    } else {
        spmbSettings::create([
            'id_sekolah' => $sekolah->uuid,
            'jenis' => 'deskripsi_hasil_spmb',
            'nilai' => $mode
        ]);
    }
    return redirect()->route('spmb.settings', $sekolah->uuid)->with('success', 'Mode Pendaftaran berhasil diperbarui.');
    }

    /**
     * SISWA-----------------------------------------------------------------------
     */


    /**
     * Siswa upload dokumen SPMB
     */
    public function uploadDokumen() {
        $user = Auth::user();
        $sekolah = Sekolah::where('kode',$user->tingkat)->first();
        $spmb_berkas = spmbSettings::where([
            ['id_sekolah','=',$sekolah->uuid],
            ['jenis','=','berkas_spmb']
        ])->first();
        if($spmb_berkas != null) {
            $berkas_array = unserialize($spmb_berkas->nilai);
        } else {
            $berkas_array = array();
        }
        $siswa = spmb::where('nis',$user->username)->first();
        if(isset($siswa) && $siswa->dokumen != "") {
            $siswa_berkas = unserialize($siswa->dokumen);
        } else {
            $siswa_berkas = array();
        }
        // dd($sekolah);
        return view('spmb.siswa.upload',compact('sekolah','berkas_array','siswa_berkas'));
    }
    /**
     * Siswa store upload dokumen SPMB
     */
    public function uploadDokumenStore(Request $request) {
        $user = Auth::user();
        $sekolah = Sekolah::where('kode',$user->tingkat)->first();
        $spmb_siswa = spmb::where('id_sekolah',$sekolah->uuid)
                        ->where('nis',$user->username)
                        ->first();
        $berkas_terupload = array();
        if($spmb_siswa->dokumen != null) {
            $berkas_terupload = unserialize($spmb_siswa->dokumen);
        }
        $request->validate([

            'file_berkas' => 'required|mimes:jpg,png,jpeg,pneg|max:5120',
        ],[
            'file_berkas.required' => 'File berkas wajib diunggah.',
            'file_berkas.mimes' => 'Format file berkas harus berupa jpg, png, jpeg, atau pdf.',
            'file_berkas.max' => 'Ukuran file berkas maksimal 5MB.',
        ]);
        
        $file = $request->file('file_berkas');
        $filepath = 'spmb/'.$sekolah->kode.'/'.$user->username;
        $path = Storage::path($filepath);
        $date = date('dmYHis');
        $filename = $spmb_siswa->nis.'_'.$date.'_'.$request->nama_berkas.".".$file->getClientOriginalExtension();
        if(!Storage::exists($filepath)) {
            $schoolpath = Storage::path('spmb/'.$sekolah->kode);
            $spmbpath = Storage::path('spmb');
            umask(002); 
            Storage::makeDirectory($filepath, 0755,true);
            chmod($schoolpath, 0755);
            chmod($spmbpath, 0755);
            chmod($path, 0755);
            
        }
        $manager = new ImageManager(new Driver());
        $image = $manager->read($file);
        $image->save($path."/".$filename,60);

        // $file->storeAs($filepath,$filename);
        if(count($berkas_terupload) > 0) {
            $nama_berkas = $request->nama_berkas;
            $find = array_filter($berkas_terupload,function($item) use ($nama_berkas) {
                return $item['nama_berkas'] == $nama_berkas;
            });
            if(count($find) == 0) {
                array_push($berkas_terupload, array(
                    'nama_berkas' => $request->nama_berkas,
                    'lokasi_berkas' => $filepath.'/'.$filename
                ));
            } else {
                $result = array_filter($berkas_terupload,function($item) use ($nama_berkas) {
                    return $item['nama_berkas'] != $nama_berkas;
                });
                $berkas_terupload = $result;
                array_push($berkas_terupload, array(
                    'nama_berkas' => $request->nama_berkas,
                    'lokasi_berkas' => $filepath.'/'.$filename
                ));
            }
        } else {
            array_push($berkas_terupload, array(
                'nama_berkas' => $request->nama_berkas,
                'lokasi_berkas' => $filepath.'/'.$filename
            ));
        }
        $spmb_siswa->update([
            'dokumen' => serialize($berkas_terupload)
        ]);

        return redirect()->route('spmb.siswa.upload')->with('success'.$request->nama_berkas, 'Berkas '.$request->nama_berkas.' berhasil diunggah/diupload.');
    }
    /**
     * Siswa Delete dokumen
     */
    public function deleteDokumen(Request $request) {
        $user = Auth::user();
        $sekolah = Sekolah::where('kode',$user->tingkat)->first();
        $spmb_siswa = spmb::where('id_sekolah',$sekolah->uuid)
                        ->where('nis',$user->username)
                        ->first();
        $berkas_terupload = array();
        if($spmb_siswa->dokumen != null) {
            $berkas_terupload = unserialize($spmb_siswa->dokumen);
        }
        $nama_berkas = $request->berkas;

        $find = current(array_filter($berkas_terupload,function($item) use ($nama_berkas) {
            return $item['nama_berkas'] == $nama_berkas;
        }));
        $old_path = Storage::path($find['lokasi_berkas']);
        unlink($old_path);

        $result = array_filter($berkas_terupload,function($item) use ($nama_berkas) {
            return $item['nama_berkas'] != $nama_berkas;
        });
        $berkas_terupload = $result;

        if(count($result) > 0) {
            $spmb_siswa->update([
                'dokumen' => serialize($berkas_terupload)
            ]);
        } else {
            $spmb_siswa->update([
                'dokumen' => ''
            ]);
            $filepath = Storage::path('spmb/'.$sekolah->kode.'/'.$user->username);
            rmdir($filepath);
        }

        return response()->json(['success' => "Sukses"]);
        
    }
        /**
         * Siswa - Detail SPMB
        */
    public function identitas() {
        $user = Auth::user();
        $spmb_siswa = spmb::where('nis',$user->username)->first();
        $sekolah = Sekolah::findOrFail($spmb_siswa->id_sekolah);
        $biodata = unserialize($spmb_siswa->biodata);
        return view('spmb.siswa.detail',compact('spmb_siswa','sekolah','biodata','user'));
    }
    /**
     * Cetak Kartu SPMB Siswa
     */
    public function cetakHasilSiswa(String $uuid) {
        $spmb_siswa = spmb::findOrFail($uuid);
        $sekolah = Sekolah::findOrFail($spmb_siswa->id_sekolah);
        $biodata = unserialize($spmb_siswa->biodata);
        $deskripsi_hasil = spmbSettings::where([['id_sekolah','=',$sekolah->uuid],['jenis','=','deskripsi_hasil_spmb']])->first();
        if($deskripsi_hasil != null) {
            $deskripsi = $deskripsi_hasil->nilai;
        } else {
            $deskripsi = "";
        }
       
        return view('spmb.siswa.hasil',compact('spmb_siswa','sekolah','biodata','deskripsi'));
    }
}
