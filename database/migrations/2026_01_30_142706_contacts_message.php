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
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();

            // Data pengirim
            $table->string('name', 120);
            $table->string('email', 150);
            $table->string('phone', 30)->nullable();

            // Isi pesan
            $table->string('subject', 150)->nullable(); // kalau kamu auto-subject, tetap disimpan
            $table->text('message');

            // Anti spam basic / meta
            $table->string('ip_address', 45)->nullable();
            $table->string('user_agent', 255)->nullable();

            // Status penanganan
            $table->enum('status', ['new', 'read', 'replied', 'archived'])->default('new');

            $table->timestamps();

            $table->index(['status', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
    }
};
