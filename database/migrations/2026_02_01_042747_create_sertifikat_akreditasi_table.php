<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sertifikat_akreditasi', function (Blueprint $table) {
            $table->id();

            // Identitas item (misal per prodi)
            $table->string('prodi', 100); // Teknik Informatika, Manajemen Informatika, dll

            // Konten card
            $table->string('judul_kartu', 100)->default('Sertifikat Akreditasi');
            $table->text('deskripsi')->nullable(); // Klik tombol di bawah untuk membuka sertifikat.
            $table->string('teks_tombol', 30)->default('Klik Disini');
            $table->string('catatan', 255)->nullable(); // *Jika link belum tersedia...

            // Link file sertifikat
            $table->string('url_sertifikat')->nullable(); // boleh null / '#' kalau belum tersedia

            // Status
            $table->boolean('aktif')->default(true);

            $table->timestamps();

            // Index biar cepat kalau data banyak
            $table->index(['aktif', 'prodi']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sertifikat_akreditasi');
    }
};
