<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class spmb extends Model
{
    use HasUuids,HasFactory;
    protected $table = 'spmb';
    protected $primaryKey = 'uuid';
    protected $fillable = [
        'id_sekolah',
        'nis',
        'biodata',
        'dokumen',
        'interview',
        'gelombang',
        'status',
        'VA',
        'bank',
        'biaya',
        'keterangan',
    ];
}
