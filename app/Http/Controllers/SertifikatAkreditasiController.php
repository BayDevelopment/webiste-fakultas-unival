<?php

namespace App\Http\Controllers;

use App\Models\SertifikatAkreditasiModel;
use Illuminate\Http\Request;

class SertifikatAkreditasiController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string) $request->query('q', ''));

        $baseQuery = SertifikatAkreditasiModel::query()
            ->where('aktif', true)
            ->orderByDesc('created_at');

        // Default: tampil 3 terbaru (ringan)
        $latest3 = (clone $baseQuery)->limit(3)->get();

        // Kalau ada search: tampil banyak data pakai paginate (stabil)
        $results = null;
        if ($q !== '') {
            $results = (clone $baseQuery)
                ->where(function ($query) use ($q) {
                    $query->where('prodi', 'like', "%{$q}%")
                        ->orWhere('judul_kartu', 'like', "%{$q}%")
                        ->orWhere('deskripsi', 'like', "%{$q}%")
                        ->orWhere('catatan', 'like', "%{$q}%");
                })
                ->paginate(12)
                ->withQueryString();
        }

        return view('pages.sertifikat-akreditasi', [
            'title' => 'Sertifikat Akreditasi | Fakultas Ilmu Komputer',
            'subtitle' => 'Silakan pilih sertifikat akreditasi yang tersedia.',
            'navlink' => 'Sertifikat Akreditasi',
            'q' => $q,
            'latest3' => $latest3,
            'results' => $results,
        ]);
    }
}
