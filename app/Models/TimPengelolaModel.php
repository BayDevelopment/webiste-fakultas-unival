<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class TimPengelolaModel extends Model
{
    protected $table = 'tim_pengelola';
    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'jabatan',
        'foto',
        'status_aktif'
    ];
    protected $casts = [
        'status_aktif' => 'boolean'
    ];

    public function getFotoUrlAttribute(): string
    {
        // 1) Kalau ada foto upload & file-nya ada
        if (!empty($this->foto) && Storage::disk('public')->exists($this->foto)) {
            return asset('storage/' . $this->foto);
        }

        // 2) Kalau kosong, fallback berdasarkan jenis kelamin
        if ($this->jenis_kelamin === 'P') {
            return asset('images/p-avatars.jpg');
        }

        // Default: L (atau kalau jenis_kelamin null)
        return asset('images/l-avatars.jpg');
    }
}
