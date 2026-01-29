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
        Schema::create('overview_statistik', function (Blueprint $table) {
            $table->id();

            // contoh: active_students, partners, achievements
            $table->string('icon', 50);

            // label yang tampil di UI (opsional)
            $table->string('judul', 100);

            // angka yang diinput admin
            $table->unsignedInteger('value')->default(0);

            // kalau mau tampil "1200+" (opsional)
            $table->boolean('show_plus')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('overview_statistik');
    }
};
