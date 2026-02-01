<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class FormBimbinganModel extends Model
{
    protected $table = 'form_bimbingan';

    protected $fillable = [
        'jenis_bimbingan',
        'judul_kartu',
        'subjudul',
        'deskripsi',
        'teks_tombol',
        'catatan',
        'url_form',
        'aktif',
    ];

    protected $casts = [
        'aktif' => 'boolean',
    ];

    public function scopeAktif($q)
    {
        return $q->where('aktif', true);
    }

    protected static function booted()
    {
        static::saving(function ($model) {
            if (! in_array($model->jenis_bimbingan, ['kkp', 'skripsi'], true)) {
                throw ValidationException::withMessages([
                    'jenis_bimbingan' => 'Jenis bimbingan tidak valid.',
                ]);
            }
        });
    }
}
