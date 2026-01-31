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
        Schema::create('nav_links', function (Blueprint $table) {
            $table->id();

            // Group / Section
            $table->string('group_key');
            // contoh: portal, kuisioner, e-surat, download

            $table->string('group_label');
            // contoh: PORTAL, KUISIONER, E-SURAT, DOWNLOAD

            // Item info
            $table->string('label');
            // contoh: SIAKAD, Kuisoner Dosen

            $table->string('url')->nullable();
            // link langsung (external / internal)

            $table->string('icon')->nullable();
            // optional: heroicon / fontawesome class

            // Behavior
            $table->boolean('is_external')->default(false);
            $table->boolean('is_active')->default(true);

            // Ordering
            $table->unsignedInteger('group_order')->default(0);
            $table->unsignedInteger('item_order')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nav_links');
    }
};
