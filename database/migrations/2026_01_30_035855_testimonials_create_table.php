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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();

            // Sesuai tampilan: foto profil (avatar)
            $table->string('avatar')->nullable(); // path atau URL

            // Sesuai tampilan: nama
            $table->string('name');

            // Sesuai tampilan: "Angkatan 2019"
            $table->unsignedSmallInteger('angkatan'); // contoh: 2019

            // Sesuai tampilan: "Informatika"
            $table->string('program_studi'); // atau 'jurusan'

            // Sesuai tampilan: kutipan/testimoni
            $table->text('quote');
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
