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
        Schema::create('homeprodi', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 50);
            $table->string('title', 150);
            $table->string('icon', 50);
            $table->string('subtitle_link', 50);
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
        Schema::dropIfExists('homeprodi');
    }
};
