<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JurusanHomeProdiModel extends Model
{
    protected $table = 'program_studis_home';

    protected $fillable = [
        'jenjang',
        'nama',
        'deskripsi_singkat',
        'tags',
        'status_aktif',
    ];

    protected $casts = [
        'tags' => 'array',
        'status_aktif' => 'boolean',
    ];
}
