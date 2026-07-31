<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksi_absensi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mahasiswa_id');         // FK ke tabel mahasiswa
            $table->string('nama_matkul', 100);                 // Nama mata kuliah
            $table->string('nama_dosen', 100);                  // Nama dosen pengampu
            $table->date('tanggal');                            // Tanggal pertemuan
            $table->integer('pertemuan_ke');                    // Pertemuan ke berapa
            $table->enum('status_hadir', [                      // Status kehadiran
                'Hadir', 'Izin', 'Sakit', 'Alfa'
            ])->default('Hadir');
            $table->text('keterangan')->nullable();             // Keterangan tambahan
            $table->timestamps();

            $table->foreign('mahasiswa_id')
                  ->references('id')
                  ->on('mahasiswa')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksi_absensi');
    }
};