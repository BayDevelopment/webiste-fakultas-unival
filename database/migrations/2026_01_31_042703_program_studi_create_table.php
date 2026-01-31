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
        Schema::create('program_studi', function (Blueprint $table) {
            $table->id();

            // Identitas dasar
            $table->string('nama_program_studi');
            $table->string('slug')->unique();
            $table->string('jenjang');

            // Headline
            $table->text('headline');
            $table->text('subheadline')->nullable();

            // Ringkasan
            $table->text('ringkas_program_studi')->nullable();

            // Hero
            $table->string('gambar_hero')->nullable();
            $table->string('judul_caption')->nullable();
            $table->string('teks_caption')->nullable();

            // CTA
            $table->string('url_lihat_dosen')->nullable();
            $table->string('url_daftar')->nullable();

            // Statistik ringkas
            $table->unsignedInteger('jumlah_mata_kuliah_inti')->default(0);
            $table->unsignedInteger('jumlah_lab')->default(0);
            $table->unsignedInteger('jumlah_mitra_industri')->default(0);

            // Chip / list
            $table->json('prospek_karier')->nullable();

            // Konten utama
            $table->longText('sejarah')->nullable();
            $table->text('visi')->nullable();
            $table->json('misi')->nullable();

            // ✅ DOKUMEN SK (BANYAK DATA)
            $table->json('daftar_sk')->nullable();

            $table->boolean('aktif')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_studi');
    }
};
