<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasUuids, HasFactory;
    protected $primaryKey = 'uuid';
    protected $table = 'sekolah';
    protected $fillable = [
        'kode',
        'nama',
        'alamat',
        'contact',
        'email',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class, 'id_sekolah');
    }
}
