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
       Schema::create('pertemuan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jadwal_id');
            $table->integer('pertemuan_ke');
            $table->date('tanggal');
            $table->string('topik', 200)->nullable();
            $table->enum('status_pertemuan', ['Terjadwal','Berlangsung','Selesai','Dibatalkan'])->default('Terjadwal');
            $table->timestamps();
            $table->foreign('jadwal_id')->references('id')->on('jadwal_kuliah');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertemuan');
    }
};
