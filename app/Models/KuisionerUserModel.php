<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class KuisionerUserModel extends Model
{
    protected $table = 'kuisioner_user';

    protected $fillable = [
        'jenis_user',
        'judul_kartu',
        'periode',
        'deskripsi',
        'teks_tombol',
        'catatan',
        'url_kuisioner',
        'aktif',
    ];

    protected $casts = [
        'aktif' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | Scope
    |--------------------------------------------------------------------------
    */

    public function scopeAktif(Builder $query)
    {
        return $query->where('aktif', true);
    }

    public function scopeDosen(Builder $query)
    {
        return $query->where('jenis_user', 'dosen');
    }

    public function scopeMahasiswa(Builder $query)
    {
        return $query->where('jenis_user', 'mahasiswa');
    }

    protected static function booted()
    {
        static::saving(function ($model) {
            if (! in_array($model->jenis_user, ['dosen', 'mahasiswa'])) {
                throw ValidationException::withMessages([
                    'jenis_user' => 'Jenis user tidak valid.',
                ]);
            }
        });
    }
}
