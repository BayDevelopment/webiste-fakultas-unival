<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KeunggulanModel extends Model
{
    protected $table = 'keunggulan';

    protected $fillable = [
        'judul',
        'ikon',
        'status_aktif',
    ];

    protected $casts = [
        'status_aktif' => 'boolean',
    ];
}
