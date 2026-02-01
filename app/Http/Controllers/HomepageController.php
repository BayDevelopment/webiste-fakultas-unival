<?php

namespace App\Http\Controllers;

use App\Models\about_pages_model;
use App\Models\ChatWaModel;
use App\Models\ContactSetting;
use App\Models\HeroSectionModel;
use App\Models\JurusanHomeProdiModel;
use App\Models\KegiatanModel;
use App\Models\MisiModel;
use App\Models\ProdiHomeModel;
use App\Models\ProfilKeunggulanModel;
use App\Models\TestimonialModel;
use App\Models\VisiModel;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $hero = HeroSectionModel::where('is_active', true)->first();
        $profilKeunggulan = ProfilKeunggulanModel::query()
            ->where('status_aktif', true)
            ->orderBy('id')
            ->get();
        $about = about_pages_model::where('status_publikasi', true)->first();
        $visi = VisiModel::where('status_aktif', true)->orderBy('id')->first();
        $misi = MisiModel::where('status_aktif', true)
            ->when($visi, fn($q) => $q->where('visi_id', $visi->id))
            ->orderBy('id')
            ->get();

        $tentangkami = ProdiHomeModel::where('status_aktif', true)->orderBy('id')->first();
        $jurusanhome = JurusanHomeProdiModel::where('status_aktif', true)->orderBy('id')->get();
        $kegiatan = KegiatanModel::where('status_aktif', true)->orderBy('id')->get();
        $testimoni = TestimonialModel::where('is_active', true)->orderBy('id')->get();
        $contactSet = ContactSetting::where('is_active', true)->first();
        $DataWa = ChatWaModel::where('is_active', true)->first();

        return view('pages.index', [
            'title'   => 'Beranda | Fakultas Ilmu Komputer',
            'navlink' => 'Beranda',
            'hero'    => $hero,
            'about'   => $about, // 🔥 DATA ABOUT
            'visi'   => $visi,
            'misi'   => $misi,
            'profilKeunggulan' => $profilKeunggulan,
            'TentangKami' => $tentangkami,
            'JurusanHome' => $jurusanhome,
            'Kegiatan' => $kegiatan,
            'Testimoni' => $testimoni,
            'Contact' => $contactSet,
            'Chat' => $DataWa
        ]);
    }
}
