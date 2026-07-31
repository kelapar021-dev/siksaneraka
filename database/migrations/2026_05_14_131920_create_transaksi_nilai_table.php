<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksi_nilai', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mahasiswa_id');         // FK ke tabel mahasiswa
            $table->string('kode_matkul', 20);                  // Kode mata kuliah
            $table->string('nama_matkul', 100);                 // Nama mata kuliah
            $table->integer('sks');                             // Jumlah SKS
            $table->integer('semester');                        // Semester ke berapa
            $table->string('tahun_ajaran', 20);                 // Contoh: 2024/2025
            $table->float('nilai_angka')->nullable();           // Nilai 0-100
            $table->string('nilai_huruf', 2)->nullable();       // A, B, C, D, E
            $table->float('bobot_nilai')->nullable();           // 4.0, 3.0, 2.0, dll
            $table->enum('status_nilai', [                      // Status nilai
                'Lulus', 'Tidak Lulus', 'Mengulang'
            ])->nullable();
            $table->timestamps();

            $table->foreign('mahasiswa_id')
                  ->references('id')
                  ->on('mahasiswa')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksi_nilai');
    }
};