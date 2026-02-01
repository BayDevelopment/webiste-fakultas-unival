<?php

namespace App\Http\Controllers;

use App\Models\KuisionerUserModel;
use Illuminate\Http\Request;

class KuisionerController extends Controller
{

    public function index(Request $request, string $jenis_user)
    {
        $q = trim((string) $request->query('q', ''));

        $baseQuery = KuisionerUserModel::query()
            ->where('aktif', true)
            ->where('jenis_user', $jenis_user)
            ->orderByDesc('created_at');

        // default: 3 terbaru sesuai jenis_user
        $latest3 = (clone $baseQuery)->limit(3)->get();

        // kalau ada search: paginate biar stabil
        $results = null;
        if ($q !== '') {
            $results = (clone $baseQuery)
                ->where(function ($query) use ($q) {
                    $query->where('periode', 'like', "%{$q}%")
                        ->orWhere('judul_kartu', 'like', "%{$q}%")
                        ->orWhere('deskripsi', 'like', "%{$q}%");
                })
                ->paginate(12)
                ->withQueryString();
        }

        $label = $jenis_user === 'dosen' ? 'Dosen' : 'Mahasiswa';

        return view('pages.kuisioner', [
            'title' => "Kuisioner {$label} | Fakultas Ilmu Komputer",
            'navlink' => 'kuisioner',
            'subtitle' => "Silakan pilih kuisioner {$label} yang tersedia.",
            'jenis_user' => $jenis_user,
            'q' => $q,
            'latest3' => $latest3,
            'results' => $results,
        ]);
    }
}
