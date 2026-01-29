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
        Schema::create('tim_pengelola', function (Blueprint $table) {
            $table->id();

            // Nama tim pengelola
            $table->string('nama', 100);

            // Jenis kelamin
            // L = Laki-laki, P = Perempuan
            $table->enum('jenis_kelamin', ['L', 'P'])
                ->comment('L = Laki-laki, P = Perempuan');

            // Jabatan / posisi (Dekan, Kaprodi, dll)
            $table->string('jabatan', 100)->nullable();

            // Foto tim pengelola (path image)
            $table->string('foto')->nullable();

            // Tampil / tidak di halaman
            $table->boolean('status_aktif')->default(true)->index();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tim_pengelola');
    }
};
