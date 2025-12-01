<?php

namespace App\Http\Controllers;

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
        return view('home.spmb.daftar', compact('sekolah','formulir','status'));
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
            'status'=> 'mendaftar',
            'va' => 0,
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
        $message = 'Pendaftaran berhasil! Calon Siswa dengan nama '.$request->nama.', NIS anda adalah <b>'.$nis.'</b> dan password awal anda adalah tanggal lahir anda dengan format DDMMYYYY ( Contoh 01 Januari 2007, maka passwordnya 01012007). Silahkan login untuk melengkapi data dan mengunggah dokumen.';
        return view('home.spmb.success',compact('sekolah','message'));
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
}
