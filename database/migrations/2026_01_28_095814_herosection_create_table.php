<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hero_sections', function (Blueprint $table) {
            $table->id('id_herosection');

            $table->string('badge_text');
            $table->string('title');
            $table->string('subtitle');
            $table->text('description');

            $table->string('hero_image');

            $table->string('primary_button_label');
            $table->string('primary_button_url')->nullable();

            $table->string('secondary_button_label');
            $table->string('secondary_button_url')->nullable();

            $table->unsignedInteger('laboratory_count')->default(0);       // Laboratorium
            $table->unsignedInteger('lecturer_practitioner_count')->default(0); // Dosen & Praktisi
            $table->unsignedInteger('industry_partner_count')->default(0); // Mitra Industri

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hero_sections');
    }
};
