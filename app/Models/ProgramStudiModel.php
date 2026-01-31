<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramStudiModel extends Model
{
    protected $table = 'program_studi';

    /**
     * Mass assignable fields
     */
    protected $fillable = [
        'nama_program_studi',
        'slug',
        'jenjang',
        'headline',
        'subheadline',
        'ringkas_program_studi',
        'gambar_hero',
        'judul_caption',
        'teks_caption',
        'url_lihat_dosen',
        'url_daftar',
        'jumlah_mata_kuliah_inti',
        'jumlah_lab',
        'jumlah_mitra_industri',
        'prospek_karier',
        'sejarah',
        'visi',
        'misi',
        'daftar_sk',
        'link_akreditasi',
        'aktif',
    ];

    /**
     * Casts
     */
    protected $casts = [
        'prospek_karier' => 'array',
        'misi'           => 'array',
        'daftar_sk'      => 'array',
        'aktif'          => 'boolean',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
