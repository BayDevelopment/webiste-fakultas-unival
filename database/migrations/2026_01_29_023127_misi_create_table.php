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
        Schema::create('misi_profil', function (Blueprint $table) {
            $table->id();

            $table->foreignId('visi_id')
                ->constrained('visi_profil')
                ->cascadeOnDelete();

            $table->string('title', 150);

            $table->boolean('status_aktif')
                ->default(true)
                ->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('misi_profil');
    }
};
