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
        Schema::create('nilai_utama', function (Blueprint $table) {
            $table->id();

            // Judul card (contoh: Inovasi, Kolaborasi)
            $table->string('judul', 50);

            // Deskripsi singkat di card
            $table->string('deskripsi', 255);

            // Icon (contoh: heroicon-o-light-bulb)
            $table->string('icon', 50)->nullable();

            // Tampil / tidak di halaman
            $table->boolean('status_aktif')->default(true)->index();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nilai_utama');
    }
};
