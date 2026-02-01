<?php

use App\Http\Controllers\FormBimbinganController;
use App\Http\Controllers\FormSidangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\KuisionerController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\SertifikatAkreditasiController;
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
Route::get('/kuisioner/{jenis_user}', [KuisionerController::class, 'index'])
    ->whereIn('jenis_user', ['dosen', 'mahasiswa'])
    ->name('kuisioner.index');
Route::get('/pendaftaran-sidang', [FormSidangController::class, 'index'])
    ->name('pendaftaran.sidang');
Route::get('/sertifikat-akreditasi', [SertifikatAkreditasiController::class, 'index'])
    ->name('sertifikat.akreditasi');
Route::get('/form-bimbingan', [FormBimbinganController::class, 'index'])->name('form.bimbingan');
