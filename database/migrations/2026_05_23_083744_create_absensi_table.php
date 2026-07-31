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
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pertemuan_id');
            $table->unsignedBigInteger('mahasiswa_id');
            $table->enum('status', ['Hadir','Izin','Sakit','Alpha'])->default('Alpha');
            $table->timestamp('waktu_absen')->nullable();
            $table->enum('metode', ['Manual','QR'])->default('Manual');
            $table->text('keterangan')->nullable();
            $table->timestamps();
            $table->foreign('pertemuan_id')->references('id')->on('pertemuan');
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};
