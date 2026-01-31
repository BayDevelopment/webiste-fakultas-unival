<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\TentangKamiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomepageController::class, 'index'])->name('home');
Route::get('/tentang-kami', [TentangKamiController::class, 'index'])->name('tentang-kami');
Route::get('/program-studi/{programStudi:slug}', [ProdiController::class, 'show'])
    ->name('profil.prodi');
Route::get('/program-studi/{programStudi:slug}/akreditasi', [ProdiController::class, 'akreditasi'])
    ->name('prodi.akreditasi');

Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan');
// ⬇️ WAJIB untuk FullCalendar (ambil data dari DB)
Route::get('/kegiatan/events', [KegiatanController::class, 'events'])->name('kegiatan.events');

Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');


Route::get('/kuisioner/{slug}', [HomeController::class, 'PageKuisioner'])->name('kuisioner');
Route::get('/pendaftaran-sidang', [HomeController::class, 'PagePendaftaranSidang'])
    ->name('pendaftaran.sidang');
Route::get('/sertifikat-akreditasi', [HomeController::class, 'PageSertifikatAkreditasi'])
    ->name('sertifikat.akreditasi');

Route::get('/form-bimbingan', [HomeController::class, 'PageFormBimbingan'])->name('form.bimbingan');
