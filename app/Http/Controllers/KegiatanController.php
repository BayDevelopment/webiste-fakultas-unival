<?php

namespace App\Http\Controllers;

use App\Models\KegiatanModel;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        $today = now()->toDateString();

        // ambil mendatang dulu (maks 3)
        $mendatang = KegiatanModel::where('status_aktif', true)
            ->whereDate('activity_date', '>=', $today)
            ->orderBy('activity_date', 'asc')
            ->limit(3)
            ->get();

        // isi sisa slot dengan selesai terbaru
        $sisa = 3 - $mendatang->count();

        $selesai = collect();
        if ($sisa > 0) {
            $selesai = KegiatanModel::where('status_aktif', true)
                ->whereDate('activity_date', '<', $today)
                ->orderByDesc('activity_date')
                ->limit($sisa)
                ->get();
        }

        // gabungkan -> ini yang dikirim ke view
        $kegiatanList = $mendatang->concat($selesai);

        // statistik (semua data aktif)
        $totalKegiatan = KegiatanModel::where('status_aktif', true)->count();
        $jumlahMendatang = KegiatanModel::where('status_aktif', true)->whereDate('activity_date', '>=', $today)->count();
        $jumlahSelesai = KegiatanModel::where('status_aktif', true)->whereDate('activity_date', '<', $today)->count();
        $totalKategori = KegiatanModel::where('status_aktif', true)
            ->whereNotNull('type')->where('type', '!=', '')
            ->distinct('type')->count('type');

        $calendarUrl = config('services.kegiatan_calendar.embed_url');

        return view('pages.kegiatan', [
            'title' => 'Kegiatan | Fakultas Ilmu Komputer',
            'navlink' => 'kegiatan',

            // ✅ INI PENTING: view baca $kegiatan
            'kegiatan' => $kegiatanList,

            'totalKegiatan' => $totalKegiatan,
            'jumlahMendatang' => $jumlahMendatang,
            'jumlahSelesai' => $jumlahSelesai,
            'totalKategori' => $totalKategori,

            // ✅ view baca $calendarUrl
            'calendarUrl' => $calendarUrl,
        ]);
    }

    public function events(Request $request)
    {
        $today = now()->toDateString();

        // FullCalendar kirim range
        $start = $request->query('start');
        $end   = $request->query('end');

        $q = KegiatanModel::where('status_aktif', true)
            ->whereDate('activity_date', '>=', $today); // ✅ hanya mendatang

        // tetap batasi range biar ringan
        if ($start && $end) {
            $q->whereBetween('activity_date', [$start, $end]);
        }

        return $q->orderBy('activity_date', 'asc')
            ->get()
            ->map(function ($k) {
                return [
                    'title' => $k->title ?? $k->judul_kegiatan ?? 'Kegiatan',
                    'start' => $k->activity_date, // ❗ wajib
                    'allDay' => true,
                ];
            });
    }
}
