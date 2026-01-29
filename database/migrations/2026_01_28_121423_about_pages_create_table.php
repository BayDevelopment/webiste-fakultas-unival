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
        Schema::create('header_tentang_kami', function (Blueprint $table) {
            $table->id();

            // Identitas
            $table->string('slug')->unique();
            // contoh: tentang-kami

            $table->string('breadcrumb_induk')->nullable();
            $table->string('breadcrumb_aktif')->nullable();

            // Judul halaman
            $table->string('judul_halaman');
            $table->text('subjudul_halaman')->nullable();

            // Hero kiri
            $table->string('badge_hero')->nullable();
            $table->string('judul_hero')->nullable();
            $table->text('deskripsi_hero')->nullable();

            // Hero kanan
            $table->string('gambar_hero')->nullable();
            $table->string('judul_kartu_hero')->nullable();
            $table->string('subjudul_kartu_hero')->nullable();

            $table->boolean('status_publikasi')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('header_tentang_kami');
    }
};
