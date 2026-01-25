<?php

namespace App\Exports;

use App\Models\spmb;
use App\Models\spmbSettings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SiswaExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $params;

    function __construct($params) {
        $this->params = $params;
    }
    public function view() : View
    {
        $siswa = spmb::where('id_sekolah',$this->params)->orderBy('created_at')->orderBy('gelombang')->get();
        $formulir = spmbSettings::where([
            ['id_sekolah','=',$this->params],['jenis','=','formulir_spmb']
        ])->first();

        if(isset($formulir) && $formulir->nilai != null) {
            $list_formulir = unserialize($formulir->nilai);
        } else {
            $list_formulir = array();
        }

        $nama_array_terbaru = array(
            'nama' => array('nilai' => 'nama','warna' => '#AAC4F5','width' => '30'),
            'jk' => array('nilai' => 'JK','warna' => '#AAC4F5','width' => '5'),
            'agama' => array('nilai' => 'Agama','warna' => '#AAC4F5','width' => '10'),
            'alamat' => array('nilai' => 'Alamat','warna' => '#AAC4F5','width' => '45'),
            'sekolah_asal' => array('nilai' => 'Sekolah Asal','warna' => '#FDACAC','width' => '30'),
            'pindah_ke' => array('nilai' => 'Pindah Ke Tingkat','warna' => '#FDACAC','width' => '10'),
            'jenis_pendaftaran' => array('nilai' => 'Jenis Pendaftaran','warna' => '#FDACAC','width' => '15'),
            'nisn' => array('nilai' => 'NISN','warna' => '#FDACAC','width' => '15'),
            'no_handphone' => array('nilai' => 'No. Handphone Siswa','warna' => '#FEEAC9','width' => '20'),
            'no_whatsapp' => array('nilai' => 'No. Whatsapp Siswa','warna' => '#FEEAC9','width' => '20'),
            'no_telepon' => array('nilai' => 'No. Telepon Rumah','warna' => '#FEEAC9','width' => '20'),
            'email' => array('nilai' => 'Email Siswa','warna' => '#FEEAC9','width' => '30'),
            'tinggi_badan' => array('nilai' => 'Tinggi Badan','warna' => '#FEEAC9','width' => '10'),
            'berat_badan' => array('nilai' => 'Berat Badan','warna' => '#FEEAC9','width' => '10'),
            'rt_rw' => array('nilai' => 'RT/RW','warna' => '#FEEAC9','width' => '10'),
            'kelurahan' => array('nilai' => 'Kelurahan','warna' => '#FEEAC9','width' => '20'),
            'kecamatan' => array('nilai' => 'Kecamatan','warna' => '#FEEAC9','width' => '20'),
            'kabupaten' => array('nilai' => 'Kabupaten/Kota','warna' => '#FEEAC9','width' => '20'),
            'provinsi' => array('nilai' => 'Provinsi','warna' => '#FEEAC9','width' => '20'),
            'tinggal_dengan' => array('nilai' => 'Tinggal Dengan','warna' => '#FEEAC9','width' => '20'),
            'jarak' => array('nilai' => 'Jarak Ke Sekolah','warna' => '#FEEAC9','width' => '15'),
            'transportasi' => array('nilai' => 'Transportasi Ke Sekolah','warna' => '#FEEAC9','width' => '25'),
            'regis_akte' => array('nilai' => 'No. Akte Kelahiran', 'warna' => '#FEEAC9', 'width' => '20'),
            'nik' => array('nilai' => 'Nomor Induk Kependudukan (NIK)', 'warna' => '#FEEAC9', 'width' => '20'),

            'nama_ayah' => array('nilai' => 'Nama Ayah', 'warna' => '#badc58', 'width' => '30'),
            'nik_ayah' => array('nilai' => 'NIK Ayah', 'warna' => '#badc58', 'width' => '20'),
            'pekerjaan_ayah' => array('nilai' => 'Pekerjaan Ayah', 'warna' => '#badc58', 'width' => '20'),
            'pendidikan_ayah' => array('nilai' => 'Pendidikan Ayah', 'warna' => '#badc58', 'width' => '15'),
            'handphone_ayah' => array('nilai' => 'No. Handphone Ayah', 'warna' => '#badc58', 'width' => '20'),
            'penghasilan_ayah' => array('nilai' => 'Penghasilan Ayah', 'warna' => '#badc58', 'width' => '30'),

            'nama_ibu' => array('nilai' => 'Nama Ibu', 'warna' => '#badc58', 'width' => '30'),
            'nik_ibu' => array('nilai' => 'NIK Ibu', 'warna' => '#badc58', 'width' => '20'),
            'pekerjaan_ibu' => array('nilai' => 'Pekerjaan Ibu', 'warna' => '#badc58', 'width' => '20'),
            'pendidikan_ibu' => array('nilai' => 'Pendidikan Ibu', 'warna' => '#badc58', 'width' => '15'),
            'handphone_ibu' => array('nilai' => 'No. Handphone Ibu', 'warna' => '#badc58', 'width' => '20'),
            'penghasilan_ibu' => array('nilai' => 'Penghasilan Ibu', 'warna' => '#badc58', 'width' => '30'),

            'nama_wali' => array('nilai' => 'Nama Wali', 'warna' => '#badc58', 'width' => '30'),
            'nik_wali' => array('nilai' => 'NIK Wali', 'warna' => '#badc58', 'width' => '20'),
            'pekerjaan_wali' => array('nilai' => 'Pekerjaan Wali', 'warna' => '#badc58', 'width' => '20'),
            'pendidikan_wali' => array('nilai' => 'Pendidikan Wali', 'warna' => '#badc58', 'width' => '15'),
            'handphone_wali' => array('nilai' => 'No. Handphone Wali', 'warna' => '#badc58', 'width' => '20'),
            'penghasilan_wali' => array('nilai' => 'Penghasilan Wali', 'warna' => '#badc58', 'width' => '30'),

            'whatsapp_ortu' => array('nilai' => 'No. WhatsApp Orang Tua/Wali', 'warna' => '#badc58', 'width' => '20'),
            'kps' => array('nilai' => 'No. KPS/KKS/PKH', 'warna' => '#FEEAC9', 'width' => '20'),
            'kip' => array('nilai' => 'No. KIP', 'warna' => '#FEEAC9', 'width' => '20'),

        );
        $centered_array = array('agama','jk','pindah_ke','jenis_pendaftaran','nisn','no_handphone','no_whatsapp','no_telepon','tinggi_badan','berat_badan','rt_rw','jarak','transportasi','tinggal_dengan','pendidikan_ayah','pendidikan_ibu','pendidikan_wali','handphone_ayah','handphone_ibu','handphone_wali','kps','kip','whatsapp_ortu');
        return view('spmb.cetak.siswa',['siswa' => $siswa,'formulir' => $list_formulir,'nama_formulir' => $nama_array_terbaru,'center' => $centered_array]);
    }
}
