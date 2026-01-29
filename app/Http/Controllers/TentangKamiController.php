<?php

namespace App\Http\Controllers;

use App\Models\about_pages_model;
use App\Models\KeunggulanModel;
use App\Models\MisiModel;
use App\Models\NilaiUtamaModel;
use App\Models\OverviewStatistik;
use App\Models\ProfilKeunggulanModel;
use App\Models\ProfilModel;
use App\Models\TimPengelolaModel;
use App\Models\VisiModel;
use Illuminate\Http\Request;

class TentangKamiController extends Controller
{
    public function index()
    {
        $about = about_pages_model::query()
            ->where('status_publikasi', true)
            ->latest() // default: created_at
            ->first();

        $profil = ProfilModel::query()
            ->where('status_aktif', true)
            ->latest('id_profil') // pastikan kolom ini memang ada
            ->first();

        $profilKeunggulan = ProfilKeunggulanModel::query()
            ->where('status_aktif', true)
            ->orderBy('id')
            ->get();

        $keunggulan = KeunggulanModel::query()
            ->where('status_aktif', true)
            ->orderBy('id')
            ->get();

        $visi = VisiModel::where('status_aktif', true)->orderBy('id')->first();

        $misi = MisiModel::where('status_aktif', true)
            ->when($visi, fn($q) => $q->where('visi_id', $visi->id))
            ->orderBy('id')
            ->get();

        $nilaiUtama = NilaiUtamaModel::where('status_aktif', true)
            ->latest()        // order by created_at DESC
            ->limit(3)
            ->get();
        $timpengelola = TimPengelolaModel::where('status_aktif', true)->latest()->get();
        $overviewStatistik = OverviewStatistik::where('show_plus', true)
            ->limit(3)
            ->get();


        return view('pages.tentang', [
            'title' => 'Tentang Kami | Fakultas Ilmu Komputer',
            'navlink' => 'Tentang Kami',
            'about' => $about,
            'keunggulan' => $keunggulan,
            'profil' => $profil,
            'profilKeunggulan' => $profilKeunggulan,
            'visi' => $visi,
            'misi' => $misi,
            'NilaiUtama' => $nilaiUtama,
            'TimPengelola' => $timpengelola,
            'overview_statistik' => $overviewStatistik
        ]);
    }
}
