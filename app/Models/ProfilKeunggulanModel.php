<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilKeunggulanModel extends Model
{
    protected $table = 'profil_keunggulan';
    protected $fillable = [
        'icon',
        'judul',
        'status_aktif'
    ];
    protected $casts = [
        'status_aktif' => 'boolean'
    ];
}
