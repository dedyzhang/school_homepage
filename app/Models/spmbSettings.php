<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class spmbSettings extends Model
{
    use HasUuids,HasFactory;
    protected $table = 'spmb_settings';
    protected $primaryKey = 'uuid';
    protected $fillable = [
        'id_sekolah',
        'jenis',
        'nilai',
    ];
}
