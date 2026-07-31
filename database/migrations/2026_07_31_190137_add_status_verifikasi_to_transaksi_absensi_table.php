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
        Schema::table('transaksi_absensi', function (Blueprint $table) {
            $table->enum('status_verifikasi', ['Menunggu', 'Disetujui', 'Ditolak'])->default('Menunggu')->after('status_hadir');
            $table->string('verifikator', 100)->nullable()->after('status_verifikasi');
            $table->timestamp('tanggal_verifikasi')->nullable()->after('verifikator');
            $table->text('alasan_penolakan')->nullable()->after('tanggal_verifikasi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksi_absensi', function (Blueprint $table) {
            $table->dropColumn(['status_verifikasi', 'verifikator', 'tanggal_verifikasi', 'alasan_penolakan']);
        });
    }
};
