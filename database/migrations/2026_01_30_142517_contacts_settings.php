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
        Schema::create('contact_settings', function (Blueprint $table) {
            $table->id();

            // Header halaman
            $table->string('page_title', 100)->default('Kontak');
            $table->string('page_subtitle', 255)->nullable();

            // Card
            $table->string('card_title', 120)->default('Mari terhubung');
            $table->text('card_description')->nullable();

            // Badge
            $table->string('badge_1', 40)->nullable();
            $table->string('badge_2', 40)->nullable();
            $table->string('badge_3', 40)->nullable();

            // Info kontak
            $table->string('office_hours_label', 60)->default('Senin–Jumat');
            $table->string('office_hours_time', 60)->default('08:00–16:00 WIB');

            $table->string('address_text', 255)->nullable();
            $table->string('contact_email', 120)->nullable();

            // ✅ TAMBAHAN
            $table->string('contact_phone', 30)->nullable();
            // contoh: +62 812-3456-7890

            $table->text('location_embed')->nullable();
            // iframe google maps / embed code

            // Tombol
            $table->string('primary_button_text', 40)->default('Kirim Pesan');
            $table->string('primary_button_url', 255)->nullable();

            $table->string('secondary_button_text', 40)->default('Email Kami');
            $table->string('secondary_button_url', 255)->nullable();

            // Hero
            $table->string('hero_image', 255)->nullable();

            // CTA
            $table->string('cta_title', 80)->default('Kirim pesan');
            $table->string('cta_subtitle', 120)->nullable();

            // Status
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_settings');
    }
};
