<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilModel extends Model
{
    protected $table = 'profil';
    protected $primaryKey = 'id_profil';

    protected $fillable = [
        'judul',
        'subjudul',
        'title',
        'subjudul_link',
        'subtitle_link',
        'subtext_link',
        'link',
        'status_aktif'
    ];

    protected $casts = [
        'status_aktif' => 'boolean',
    ];
}
