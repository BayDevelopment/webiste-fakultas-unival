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
        Schema::create('program_studis_home', function (Blueprint $table) {
            $table->id();

            // Badge S1/D3/dll
            $table->string('jenjang', 10); // contoh: S1, D3

            // Judul kartu
            $table->string('nama', 100); // Teknik Informatika

            // Deskripsi di bawah judul
            $table->string('deskripsi_singkat', 255);

            // Chip tags: Web, Mobile, Cloud (multiple)
            $table->json('tags')->nullable();

            // Kontrol tampil di beranda
            $table->boolean('status_aktif')->default(true)->index();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('program_studis_home');
    }
};
