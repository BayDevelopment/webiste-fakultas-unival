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
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();

            // Pertanyaan FAQ (diinput admin)
            $table->string('question', 255);

            // Jawaban FAQ (boleh null kalau belum diisi)
            $table->text('answer')->nullable();

            // Kapan dijawab / diupdate
            $table->timestamp('answered_at')->nullable();

            // Status aktif (tampil / disembunyikan)
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faqs');
    }
};
