<?php

namespace App\Http\Controllers;

use App\Models\FormSidangModel;
use Illuminate\Http\Request;

class FormSidangController extends Controller
{

    public function index(Request $request)
    {
        $q = trim((string) $request->query('q', ''));

        $baseQuery = FormSidangModel::query()
            ->where('aktif', true)
            ->orderByDesc('created_at');

        // Default: 3 terbaru
        $latest3 = (clone $baseQuery)->limit(3)->get();

        // Search: banyak data tapi stabil (paginate)
        $results = null;
        if ($q !== '') {
            $results = (clone $baseQuery)
                ->where(function ($query) use ($q) {
                    $query->where('jenis_sidang', 'like', "%{$q}%")
                        ->orWhere('judul_kartu', 'like', "%{$q}%")
                        ->orWhere('subjudul', 'like', "%{$q}%")
                        ->orWhere('deskripsi', 'like', "%{$q}%");
                })
                ->paginate(12)
                ->withQueryString();
        }

        return view('pages.page-pendaftaran-sidang', [
            'title' => 'Form | Fakultas Ilmu Komputer',
            'subtitle' => 'Silakan pilih jenis sidang yang akan didaftarkan.',
            'navlink' => 'Form Pendaftaran Sidang',
            'q' => $q,
            'latest3' => $latest3,
            'results' => $results,
        ]);
    }
}
