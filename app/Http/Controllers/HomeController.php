<?php

namespace App\Http\Controllers;

use App\Helpers\SpmbHelper;
use App\Models\Berita;
use App\Models\Sekolah;
use App\Models\spmb;
use App\Models\spmbSettings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    public function home()
    {
        $berita = Berita::orderBy('tanggal', 'DESC')->get();
        return view('home.index', compact('berita'));
    }

    public function profile(String $tingkat)
    {
        $toUpper = strtoupper($tingkat);
        $sekolah = Sekolah::with('profile')->where('kode', $toUpper)->first();
        $berita = Berita::where('tingkat', $sekolah->uuid)->orderBy('tanggal', 'DESC')->get();

        return view('home.profile', compact('sekolah', 'berita'));
    }

    /**
     * Berita Index
     */
    public function berita()
    {
        $berita = Berita::orderBy('tanggal', 'DESC')->paginate(6);
        return view('home.berita.index', compact('berita'));
    }
    /**
     * Berita - Show Berita
     */
    public function showBerita(String $uuid)
    {
        $berita = Berita::findOrFail($uuid);

        return view('home.berita.show', compact('berita'));
    }
    /**
     * SPMB Index
     */
    public function spmbIndex() {
        return view('home.spmb.index');
    }

    /**
     * SPMB Per Sekolah
     */
    public function spmbSekolah(String $sekolah) {
        $toUpper = strtoupper($sekolah);
        $sekolah = Sekolah::where('kode', $toUpper)->first();
        $spmbSetting = spmbSettings::where([
            ['id_sekolah','=',$sekolah->uuid],
            ['jenis','=','informasi_spmb']
        ])->first();
        if($spmbSetting != null) {
            $isi = $spmbSetting->nilai;
        } else {
            $isi = '';
        }
        $spmbStatus = spmbSettings::where([['id_sekolah','=',$sekolah->uuid],['jenis','=','mode_spmb']])->first();
        if($spmbStatus != null) {
            $status = $spmbStatus->nilai;
        } else {
            $status = '';
        }

        return view('home.spmb.sekolah', compact('sekolah','isi','status'));
    }

    public function spmbDaftar(String $sekolah) {
        $toUpper = strtoupper($sekolah);
        $sekolah = Sekolah::where('kode', $toUpper)->first();
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

        $status_pernyataan_setting = spmbSettings::where([
            ['id_sekolah', '=', $sekolah->uuid],
            ['jenis', '=', 'status_pernyataan_spmb']
        ])->first();
        $status_pernyataan = ($status_pernyataan_setting && $status_pernyataan_setting->nilai == 'nonaktif') ? 'nonaktif' : 'aktif';

        $pernyataan_setting = spmbSettings::where([
            ['id_sekolah', '=', $sekolah->uuid],
            ['jenis', '=', 'surat_pernyataan_spmb']
        ])->first();
        $surat_pernyataan = ($pernyataan_setting && !empty($pernyataan_setting->nilai))
            ? $pernyataan_setting->nilai
            : SpmbHelper::getDefaultTemplate();

        return view('home.spmb.daftar', compact('sekolah','formulir','status','surat_pernyataan','status_pernyataan'));
    }
    /**
     * Store Pendaftaran SPMB
     */
    public function spmbStore(Request $request, String $sekolah) {
        $sekolah = Sekolah::findOrFail($sekolah);

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
        if($request->konfirmasi1 == null) {
            $array_validate['konfirmasi1'] = 'required';
        }
        if($request->konfirmasi2 == null) {
            $array_validate['konfirmasi2'] = 'required';
        }

        // Cek status toggle surat pernyataan sekolah
        $status_pernyataan_setting = spmbSettings::where([
            ['id_sekolah', '=', $sekolah->uuid],
            ['jenis', '=', 'status_pernyataan_spmb']
        ])->first();
        $is_pernyataan_aktif = !($status_pernyataan_setting && $status_pernyataan_setting->nilai == 'nonaktif');

        if ($is_pernyataan_aktif) {
            $array_validate['nama_penyetuju'] = 'required';
            $array_validate['setuju_pernyataan'] = 'required';
        }
        $request->validate($array_validate);

        $biodata_array = $request->except(['_token','konfirmasi1','konfirmasi2','setuju_pernyataan']);
        if ($is_pernyataan_aktif) {
            $biodata_array['nama_penyetuju'] = $request->nama_penyetuju;
        }
        $input = serialize($biodata_array);
        $nis = $sekolah->kode.date('y').rand(10000,99999);

        // Ambil Data Gelombang dari Settingan
        $spmbStatus = spmbSettings::where([['id_sekolah','=',$sekolah->uuid],['jenis','=','status']])->first();
        if($spmbStatus != null) {
            $status = unserialize($spmbStatus->nilai);
        } else {
            $status = array(
                'status' => null,
                'gelombang' => null
            );
        }

        if ($is_pernyataan_aktif) {
            // Ambil template surat pernyataan sekolah
            $pernyataan_setting = spmbSettings::where([
                ['id_sekolah', '=', $sekolah->uuid],
                ['jenis', '=', 'surat_pernyataan_spmb']
            ])->first();
            $template = ($pernyataan_setting && !empty($pernyataan_setting->nilai))
                ? $pernyataan_setting->nilai
                : SpmbHelper::getDefaultTemplate();

            $final_pernyataan = SpmbHelper::renderPernyataan(
                $template,
                $biodata_array,
                $sekolah,
                $request->nama_penyetuju,
                $nis,
                now()
            );

            $pernyataan_setuju = true;
            $nama_penyetuju = $request->nama_penyetuju;
            $tanggal_pernyataan = now();
            $isi_pernyataan = $final_pernyataan;
        } else {
            $pernyataan_setuju = false;
            $nama_penyetuju = null;
            $tanggal_pernyataan = null;
            $isi_pernyataan = null;
        }

        $spmb = spmb::create([
            'id_sekolah'=> $sekolah->uuid,
            'nis'=> $nis,
            'biodata'=>$input,
            'dokumen'=>'',
            'gelombang' => $status['gelombang'],
            'status'=> 'mendaftar',
            'va' => 0,
            'keterangan' => null,
            'pernyataan_setuju' => $pernyataan_setuju,
            'nama_penyetuju' => $nama_penyetuju,
            'tanggal_pernyataan' => $tanggal_pernyataan,
            'isi_pernyataan' => $isi_pernyataan,
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
        $message = 'Pendaftaran berhasil! Calon Siswa dengan nama '.$request->nama.', NIS anda adalah <b>'.$nis.'</b> dan password awal anda adalah tanggal lahir anda dengan format DDMMYYYY ( Contoh 01 Januari 2007, maka passwordnya 01012007). Silahkan login untuk melengkapi data dan mengunggah dokumen.';
        return view('home.spmb.success',compact('sekolah','message','spmb','nis'));
    }

    public function spmbStatus(String $sekolah) {
        $toUpper = strtoupper($sekolah);
        $sekolah = Sekolah::where('kode', $toUpper)->first();
        $spmb_siswa = spmb::where('id_sekolah',$sekolah->uuid)->orderBy('created_at','desc')->get();
        $spmb_berkas = spmbSettings::where([['id_sekolah','=',$sekolah->uuid],['jenis','=','berkas_spmb']])->first();

        if($spmb_berkas != null) {
            $total_berkas = count(unserialize($spmb_berkas->nilai));
        } else {
            $total_berkas = 0;
        }
        return view('home.spmb.status',compact('sekolah','spmb_siswa','total_berkas'));
    }

    public function cetakPernyataanPublic(String $sekolah, String $uuid) {
        $sekolah = Sekolah::where('uuid', $sekolah)->orWhere('kode', strtoupper($sekolah))->firstOrFail();
        $spmb_siswa = spmb::where('uuid', $uuid)->where('id_sekolah', $sekolah->uuid)->firstOrFail();
        $biodata = unserialize($spmb_siswa->biodata);

        if (empty($spmb_siswa->isi_pernyataan)) {
            $pernyataan_setting = spmbSettings::where([
                ['id_sekolah', '=', $sekolah->uuid],
                ['jenis', '=', 'surat_pernyataan_spmb']
            ])->first();
            $template = ($pernyataan_setting && !empty($pernyataan_setting->nilai))
                ? $pernyataan_setting->nilai
                : SpmbHelper::getDefaultTemplate();
            $spmb_siswa->isi_pernyataan = SpmbHelper::renderPernyataan(
                $template,
                $biodata,
                $sekolah,
                $spmb_siswa->nama_penyetuju,
                $spmb_siswa->nis,
                $spmb_siswa->tanggal_pernyataan ?? $spmb_siswa->created_at
            );
        }

        return view('spmb.cetak.pernyataan', compact('spmb_siswa', 'sekolah', 'biodata'));
    }
}
