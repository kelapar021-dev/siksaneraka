<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penilaian_akademik', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->constrained('mahasiswa');
            $table->foreignId('jadwal_id')->constrained('jadwal_kuliah');
            $table->float('kehadiran', 5, 2);
            $table->float('nilai_tugas', 5, 2);
            $table->float('keaktifan_diskusi', 5, 2);
            $table->float('skor_fuzzy', 5, 2)->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penilaian_akademik');
    }
};
