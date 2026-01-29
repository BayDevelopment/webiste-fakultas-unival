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
        Schema::create('keunggulan', function (Blueprint $table) {
            $table->id();

            // Konten chip
            $table->string('judul', 255);
            // contoh: Project Based Learning

            $table->string('ikon', 50)->nullable();
            // contoh: check, lightning, star (sesuai kebutuhan UI)

            $table->boolean('status_aktif')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Rollback migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('keunggulan');
    }
};
