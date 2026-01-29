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
        Schema::create('visi_profil', function (Blueprint $table) {
            $table->id();
            $table->string('icon', 100);
            $table->string('judul', 50);
            $table->string('title', 150);
            $table->text('deskripsi');
            $table->string('subjudul', 50);
            $table->string('subtitle', 150);
            $table->boolean('status_aktif')->default(true)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visi_profil');
    }
};
