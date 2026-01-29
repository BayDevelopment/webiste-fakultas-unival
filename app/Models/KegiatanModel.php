<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KegiatanModel extends Model
{
    protected $table = 'kegiatan';
    protected $fillable = [
        'cover_image',
        'type',
        'activity_date',
        'title',
        'excerpt',
        'status_aktif',
    ];
    // Biar activity_date otomatis jadi Carbon instance
    protected $casts = [
        'activity_date' => 'date', // kalau kamu pakai dateTime di migration, ganti jadi 'datetime'
    ];
}
