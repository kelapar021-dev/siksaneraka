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
        Schema::create('notifikasi_peringatan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mahasiswa_id');
            $table->unsignedBigInteger('jadwal_id');
            $table->text('pesan');
            $table->date('tanggal_kirim');
            $table->enum('status_baca', ['Belum','Sudah'])->default('Belum');
            $table->timestamps();
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa');
            $table->foreign('jadwal_id')->references('id')->on('jadwal_kuliah');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifikasi_peringatan');
    }
};
