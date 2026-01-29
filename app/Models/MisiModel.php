<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MisiModel extends Model
{
    protected $table = 'misi_profil';
    protected $fillable = [
        'visi_id',
        'title',
        'status_aktif'
    ];
    protected $casts = [
        'status_aktif' => 'boolean'
    ];

    // MisiProfil.php
    public function visi()
    {
        return $this->belongsTo(VisiModel::class);
    }
}
