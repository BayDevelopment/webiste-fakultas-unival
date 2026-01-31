<?php

namespace App\Http\Controllers;

use App\Models\ProdiHomeModel;
use App\Models\ProgramStudiModel;
use App\Models\TimPengelolaModel;
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
    public function akreditasi(ProgramStudiModel $programStudi)
    {
        abort_if(! $programStudi->aktif, 404);

        return view('pages.sertifikat-akreditasi', [
            'title' => 'Akreditasi | Fakultas Ilmu Komputer',
            'navlink' => 'Akreditasi',
            'prodi' => $programStudi,
        ]);
    }
}
