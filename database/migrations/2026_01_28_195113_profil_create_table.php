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
        Schema::create('profil', function (Blueprint $table) {
            $table->id('id_profil');

            $table->string('judul', 255);
            $table->string('subjudul', 255)->nullable();

            $table->text('title');

            $table->string('subjudul_link', 255)->nullable();
            $table->string('subtitle_link', 255)->nullable();
            $table->string('subtext_link', 150)->nullable();
            $table->text('link')->nullable();

            $table->boolean('status_aktif')->default(true)->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil');
    }
};
