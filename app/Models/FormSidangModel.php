<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class FormSidangModel extends Model
{
    protected $table = 'form_sidang';

    protected $fillable = [
        'jenis_sidang',
        'judul_kartu',
        'subjudul',
        'deskripsi',
        'teks_tombol',
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
            if (! in_array($model->jenis_sidang, ['proposal', 'akhir'])) {
                throw ValidationException::withMessages([
                    'jenis_sidang' => 'Jenis sidang tidak valid.',
                ]);
            }
        });
    }
}
