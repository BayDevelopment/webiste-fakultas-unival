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
        Schema::create('form_bimbingan', function (Blueprint $table) {
            $table->id();

            $table->enum('jenis_bimbingan', ['kkp', 'skripsi']);

            $table->string('judul_kartu', 100)->default('Form Bimbingan');
            $table->string('subjudul', 120); // Form Bimbingan KKP / Skripsi
            $table->text('deskripsi')->nullable();
            $table->string('teks_tombol', 30)->default('Klik Disini');
            $table->string('catatan', 255)->nullable();

            $table->string('url_form')->nullable(); // https://... atau '#'
            $table->boolean('aktif')->default(true);

            $table->timestamps();

            $table->index(['aktif', 'jenis_bimbingan', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_bimbingan');
    }
};
