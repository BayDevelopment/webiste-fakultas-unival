<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
        'warna_kalender',
        'status_kegiatan',
    ];

    protected $casts = [
        'activity_date' => 'date',
        'status_aktif' => 'boolean',
        'warna_kalender' => 'string',
        'status_kegiatan' => 'string',
    ];

    /* =========================
     * SCOPES
     * ========================= */
    public function scopeAktif($query)
    {
        return $query->where('status_aktif', true);
    }

    /**
     * Kalau kolom status_kegiatan sudah ada & terisi, pakai itu.
     * Kalau belum (data lama), fallback ke perbandingan tanggal.
     */
    public function scopeMendatang($query)
    {
        if (\Illuminate\Support\Facades\Schema::hasColumn('kegiatan', 'status_kegiatan')) {
            return $query->where('status_kegiatan', 'mendatang')
                ->orderBy('activity_date', 'asc');
        }

        return $query->whereDate('activity_date', '>=', now()->toDateString())
            ->orderBy('activity_date', 'asc');
    }

    public function scopeSelesai($query)
    {
        if (\Illuminate\Support\Facades\Schema::hasColumn('kegiatan', 'status_kegiatan')) {
            return $query->where('status_kegiatan', 'selesai')
                ->orderBy('activity_date', 'desc');
        }

        return $query->whereDate('activity_date', '<', now()->toDateString())
            ->orderBy('activity_date', 'desc');
    }

    /* =========================
     * ACCESSORS (buat tampilan)
     * ========================= */

    // Label untuk UI: "Mendatang" / "Selesai"
    public function getStatusWaktuAttribute(): string
    {
        // 1) kalau status_kegiatan ada di DB → jadikan sumber utama
        if (!empty($this->attributes['status_kegiatan'])) {
            return $this->attributes['status_kegiatan'] === 'mendatang' ? 'Mendatang' : 'Selesai';
        }

        // 2) fallback kalau data lama
        if (!$this->activity_date) {
            return 'Tidak ada tanggal';
        }

        return ($this->activity_date->isFuture() || $this->activity_date->isToday())
            ? 'Mendatang'
            : 'Selesai';
    }

    // Warna kalender: pakai DB kalau ada, kalau kosong otomatis
    public function getWarnaKalenderAttribute(): string
    {
        // kalau ada nilai di DB, pakai itu dulu
        if (!empty($this->attributes['warna_kalender'])) {
            return $this->attributes['warna_kalender'];
        }

        // otomatis dari status waktu
        return $this->status_waktu === 'Mendatang'
            ? '#2563eb'  // biru
            : '#94a3b8'; // abu
    }

    protected static function booted()
    {
        static::deleting(function ($kegiatan) {
            if ($kegiatan->cover_image && Storage::disk('public')->exists($kegiatan->cover_image)) {
                Storage::disk('public')->delete($kegiatan->cover_image);
            }
        });
    }
}
