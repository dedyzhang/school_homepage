<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasUuids, HasFactory;

    protected $primaryKey = 'uuid';
    protected $table = 'berita';
    protected $fillable = [
        'judul',
        'author',
        'tingkat',
        'isi',
        'gambar',
        'tanggal'
    ];
    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'tingkat');
    }
}
