<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisiModel extends Model
{
    protected $table = 'visi_profil';
    protected $fillable = [
        'icon',
        'judul',
        'title',
        'subjudul',
        'subtitle',
        'deskripsi',
        'status_aktif'
    ];
    protected $casts = [
        'status_aktif' => 'boolean'
    ];

    // VisiProfil.php
    public function misi()
    {
        return $this->hasMany(MisiModel::class);
    }
}
