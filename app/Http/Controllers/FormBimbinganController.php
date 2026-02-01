<?php

namespace App\Http\Controllers;

use App\Models\FormBimbinganModel;
use Illuminate\Http\Request;

class FormBimbinganController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string) $request->query('q', ''));

        $baseQuery = FormBimbinganModel::query()
            ->where('aktif', true)
            ->orderByDesc('created_at');

        // Default: tampil 3 terbaru (ringan)
        $latest3 = (clone $baseQuery)->limit(3)->get();

        // Kalau ada search: paginate (stabil untuk data banyak)
        $results = null;
        if ($q !== '') {
            $results = (clone $baseQuery)
                ->where(function ($query) use ($q) {
                    $query->where('jenis_bimbingan', 'like', "%{$q}%")
                        ->orWhere('judul_kartu', 'like', "%{$q}%")
                        ->orWhere('subjudul', 'like', "%{$q}%")
                        ->orWhere('deskripsi', 'like', "%{$q}%");
                })
                ->paginate(12)
                ->withQueryString();
        }

        return view('pages.form-bimbingan', [
            'title' => 'Form Bimbingan | Fakultas Ilmu Komputer',
            'subtitle' => 'Silakan pilih jenis bimbingan.',
            'navlink' => 'Form Bimbingan',
            'q' => $q,
            'latest3' => $latest3,
            'results' => $results,
        ]);
    }
}
