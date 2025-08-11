<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasUuids, HasFactory;

    protected $primaryKey = 'uuid';
    protected $table = 'profiles';
    protected $fillable = [
        'nss',
        'npsn',
        'id_sekolah',
        'alamat_jalan',
        'alamat_kelurahan',
        'alamat_kecamatan',
        'alamat_kota',
        'alamat_provinsi',
        'alamat_kode_pos',
        'maps',
        'nama_kepsek',
        'gambar_kepsek',
        'gambar_sekolah',
        'sk_izin_operasional',
        'tanggal_izin_operasional',
        'deskripsi',
        'visi_sekolah',
        'misi_sekolah',
        'kata_sambutan_kepsek',
        'akreditasi',
        'jumlah_siswa',
        'jumlah_guru',
        'jumlah_guru_sertifikasi',
        'pendik_akhir_guru',
        'prestasi_akademik',
        'prestasi_non_akademik',
    ];

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'id_tingkat');
    }
}
