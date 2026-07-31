<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mahasiswa', function (Blueprint $table) {

            $table->id();
            $table->string('nim');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
           $table->text('alamat');
            $table->string('email');
            $table->string('no_hp');
            $table->string('prodi');
            $table->string('fakultas');
            $table->integer('semester');
            $table->string('ipk');
            $table->string('agama');
            $table->string('status');
            $table->string('asal_sekolah');
            $table->string('nama_ayah');
            $table->string('nama_ibu');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};