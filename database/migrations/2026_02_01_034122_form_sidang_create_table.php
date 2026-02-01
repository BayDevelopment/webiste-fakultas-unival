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
        Schema::create('form_sidang', function (Blueprint $table) {
            $table->id();

            $table->enum('jenis_sidang', [
                'proposal',
                'akhir'
            ]);

            $table->string('judul_kartu');        // Form Pendaftaran Sidang
            $table->string('subjudul');           // Sidang Proposal Skripsi
            $table->text('deskripsi')->nullable(); // Klik tombol di bawah...
            $table->string('teks_tombol')->default('Klik Disini');
            $table->string('url_form')->nullable();

            $table->boolean('aktif')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_sidang');
    }
};
