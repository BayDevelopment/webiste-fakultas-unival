<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdiHomeModel extends Model
{
    protected $table = 'homeprodi';
    protected $fillable = [
        'judul',
        'title',
        'deskripsi',
        'icon',
        'subtitle_link',
        'link',
        'status_aktif'
    ];
    protected $casts = [
        'status_aktif' => 'boolean'
    ];
}
