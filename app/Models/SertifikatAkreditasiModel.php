<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SertifikatAkreditasiModel extends Model
{
    protected $table = 'sertifikat_akreditasi';

    protected $fillable = [
        'prodi',
        'judul_kartu',
        'deskripsi',
        'teks_tombol',
        'catatan',
        'url_sertifikat',
        'aktif',
    ];

    protected $casts = [
        'aktif' => 'boolean',
    ];

    public function scopeAktif($q)
    {
        return $q->where('aktif', true);
    }
}
