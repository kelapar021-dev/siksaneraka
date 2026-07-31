<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fuzzy_hasil', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penilaian_id')->constrained('penilaian_akademik')->onDelete('cascade');
            $table->string('nim', 20);
            $table->string('nama_mahasiswa');

            // Input asli
            $table->float('kehadiran', 5, 2);
            $table->float('nilai_tugas', 5, 2);
            $table->float('keaktifan_diskusi', 5, 2);

            // Hasil fuzzifikasi (derajat keanggotaan per variabel)
            // Kehadiran
            $table->float('kehadiran_rendah', 5, 4);
            $table->float('kehadiran_sedang', 5, 4);
            $table->float('kehadiran_tinggi', 5, 4);
            // Nilai Tugas
            $table->float('tugas_rendah', 5, 4);
            $table->float('tugas_sedang', 5, 4);
            $table->float('tugas_tinggi', 5, 4);
            // Keaktifan Diskusi
            $table->float('diskusi_rendah', 5, 4);
            $table->float('diskusi_sedang', 5, 4);
            $table->float('diskusi_tinggi', 5, 4);

            // Inferensi detail (JSON: array of active rules with alpha & z)
            $table->json('detail_inferensi')->nullable();

            // Hasil akhir
            $table->float('total_alpha_z', 10, 4);
            $table->float('total_alpha', 10, 4);
            $table->float('hasil_defuzzifikasi', 5, 2);
            $table->string('keterangan');

            $table->timestamps();

            $table->index('nim');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fuzzy_hasil');
    }
};
