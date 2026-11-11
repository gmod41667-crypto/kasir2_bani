<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'jurusans';
    

    protected $fillable = [
        'kode_jurusan',
        'nama_jurusan',
        'keterangan',
        'status',
    ];
}
