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
        Schema::create('kuisioner_user', function (Blueprint $table) {
            $table->id();

            // DOSEN / MAHASISWA
            $table->enum('jenis_user', ['dosen', 'mahasiswa']);

            // CARD KUISIONER (BAHASA INDONESIA)
            $table->string('judul_kartu')->nullable();
            // Kuisioner

            $table->string('periode')->nullable();
            // Ganjil tahun ajaran 2018/2019

            $table->text('deskripsi')->nullable();
            // Klik tombol di bawah untuk membuka kuisioner.

            $table->string('teks_tombol')->nullable();
            // Klik Disini

            $table->string('catatan')->nullable();
            // *Jika link belum tersedia, silakan hubungi admin.

            // LINK KUISIONER
            $table->string('url_kuisioner')->nullable();

            // STATUS
            $table->boolean('aktif')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kuisioner_user');
    }
};
