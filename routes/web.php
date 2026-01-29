<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\TentangKamiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomepageController::class, 'index'])->name('home');
Route::get('/tentang-kami', [TentangKamiController::class, 'index'])->name('tentang-kami');

Route::get('/profile-prodi/{slug}', [HomeController::class, 'show'])->name('profil.prodi');
Route::get('/kegiatan', [HomeController::class, 'PageKegiatan'])->name('kegiatan');
Route::get('/kontak', [HomeController::class, 'PageKontak'])->name('kontak');
Route::get('/kuisioner/{slug}', [HomeController::class, 'PageKuisioner'])->name('kuisioner');
Route::get('/pendaftaran-sidang', [HomeController::class, 'PagePendaftaranSidang'])
    ->name('pendaftaran.sidang');
Route::get('/sertifikat-akreditasi', [HomeController::class, 'PageSertifikatAkreditasi'])
    ->name('sertifikat.akreditasi');

Route::get('/form-bimbingan', [HomeController::class, 'PageFormBimbingan'])->name('form.bimbingan');
