<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiUtamaModel extends Model
{
    protected $table = 'nilai_utama';

    protected $fillable = [
        'judul',
        'deskripsi',
        'icon',
        'status_aktif',
    ];

    protected $casts = [
        'status_aktif' => 'boolean',
    ];
}
