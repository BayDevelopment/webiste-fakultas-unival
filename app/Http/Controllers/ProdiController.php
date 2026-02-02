<?php

namespace App\Http\Controllers;

use App\Models\ProgramStudiModel;
use App\Models\SertifikatAkreditasiModel;
use App\Models\TimPengelolaModel; // <--- tambahin ini
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function show(ProgramStudiModel $programStudi)
    {
        abort_if(! $programStudi->aktif, 404);

        $navProdi = ProgramStudiModel::where('aktif', true)
            ->orderBy('nama_program_studi')
            ->get();
        $timpengelola = TimPengelolaModel::where('status_aktif', true)->latest()->get();


        return view('pages.profile-prodi', [
            'title' => 'Program Studi ' . $programStudi->nama_program_studi . ' | Fakultas Ilmu Komputer',
            'navlink' => $programStudi->nama_program_studi,
            'prodi' => $programStudi,
            'navProdi' => $navProdi,
            'dosentim' => $timpengelola
        ]);
    }
    public function akreditasi(Request $request, ProgramStudiModel $programStudi)
    {
        abort_if(! $programStudi->aktif, 404);

        $q = trim((string) $request->query('q', ''));

        // KUNCI: karena tabel sertifikat pakai kolom "prodi" (string),
        // kita samakan dengan nama prodi dari ProgramStudiModel.
        $prodiKey = $programStudi->nama_program_studi;

        $base = SertifikatAkreditasiModel::query()
            ->aktif()
            ->where('prodi', $prodiKey);

        // Default: 3 terbaru
        $latest3 = (clone $base)
            ->latest()
            ->take(3)
            ->get();

        // Search
        $results = null;
        if ($q !== '') {
            $results = (clone $base)
                ->where(function ($qq) use ($q) {
                    $qq->where('judul_kartu', 'like', "%{$q}%")
                        ->orWhere('deskripsi', 'like', "%{$q}%")
                        ->orWhere('catatan', 'like', "%{$q}%")
                        ->orWhere('teks_tombol', 'like', "%{$q}%")
                        ->orWhere('url_sertifikat', 'like', "%{$q}%");
                })
                ->latest()
                ->paginate(9)
                ->withQueryString();
        }

        return view('pages.sertifikat-akreditasi', [
            'title' => 'Sertifikat Akreditasi - ' . $programStudi->nama_program_studi . ' | Fakultas Ilmu Komputer',
            'subtitle' => 'Klik tombol di bawah untuk membuka sertifikat akreditasi program studi.',
            'navlink' => $programStudi->nama_program_studi,
            'prodi' => $programStudi,
            'q' => $q,
            'latest3' => $latest3,
            'results' => $results,
        ]);
    }
}
