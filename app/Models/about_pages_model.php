<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class about_pages_model extends Model
{
    protected $table = 'header_tentang_kami';
    protected $fillable = [
        // Identitas halaman
        'slug',
        'breadcrumb_induk',
        'breadcrumb_aktif',

        // Judul halaman
        'judul_halaman',
        'subjudul_halaman',

        // Hero kiri
        'badge_hero',
        'judul_hero',
        'deskripsi_hero',

        // Hero kanan
        'gambar_hero',
        'judul_kartu_hero',
        'subjudul_kartu_hero',

        // Status
        'status_publikasi',
    ];

    protected static function booted(): void
    {
        // Paksa slug dari judul halaman (create & update)
        static::saving(function ($model) {
            $model->slug = Str::slug($model->judul_halaman ?? '');
        });

        static::updating(function (self $record) {
            if ($record->isDirty('gambar_hero')) {
                $lama = $record->getOriginal('gambar_hero');

                if ($lama) {
                    Storage::disk('public')->delete($lama);
                }
            }
        });

        static::deleting(function (self $record) {
            if ($record->gambar_hero) {
                Storage::disk('public')->delete($record->gambar_hero);
            }
        });
    }
}
