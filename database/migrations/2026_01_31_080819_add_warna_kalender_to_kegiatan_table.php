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
        Schema::table('kegiatan', function (Blueprint $table) {
            $table->enum('status_kegiatan', ['mendatang', 'selesai'])
                ->default('mendatang')
                ->after('activity_date')
                ->index();

            $table->string('warna_kalender')
                ->nullable()
                ->after('status_aktif');
        });
    }

    public function down(): void
    {
        Schema::table('kegiatan', function (Blueprint $table) {
            if (Schema::hasColumn('kegiatan', 'status_kegiatan')) {
                $table->dropColumn('status_kegiatan');
            }

            if (Schema::hasColumn('kegiatan', 'warna_kalender')) {
                $table->dropColumn('warna_kalender');
            }
        });
    }
};
