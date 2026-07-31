<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hak_akses', function (Blueprint $table) {
            $table->id();
            $table->string('nama_role', 50);        // admin, dosen, mahasiswa
            $table->boolean('akses_mahasiswa')->default(1);
            $table->boolean('tambah_mahasiswa')->default(0);
            $table->boolean('edit_mahasiswa')->default(0);
            $table->boolean('hapus_mahasiswa')->default(0);
            $table->boolean('akses_dosen')->default(1);
            $table->boolean('tambah_dosen')->default(0);
            $table->boolean('edit_dosen')->default(0);
            $table->boolean('hapus_dosen')->default(0);
            $table->boolean('akses_matkul')->default(1);
            $table->boolean('tambah_matkul')->default(0);
            $table->boolean('edit_matkul')->default(0);
            $table->boolean('hapus_matkul')->default(0);
            $table->boolean('akses_ruangan')->default(1);
            $table->boolean('tambah_ruangan')->default(0);
            $table->boolean('hapus_ruangan')->default(0);
            $table->boolean('akses_tahun')->default(1);
            $table->boolean('tambah_tahun')->default(0);
            $table->boolean('hapus_tahun')->default(0);
            $table->boolean('akses_jadwal')->default(1);
            $table->boolean('tambah_jadwal')->default(0);
            $table->boolean('hapus_jadwal')->default(0);
            $table->boolean('akses_krs')->default(1);
            $table->boolean('ajukan_krs')->default(0);
            $table->boolean('setujui_krs')->default(0);
            $table->boolean('hapus_krs')->default(0);
            $table->boolean('akses_absensi')->default(1);
            $table->boolean('tambah_absensi')->default(0);
            $table->boolean('edit_absensi')->default(0);
            $table->boolean('hapus_absensi')->default(0);
            $table->boolean('akses_rekap')->default(1);
            $table->boolean('akses_notifikasi')->default(1);
            $table->boolean('akses_pembayaran')->default(1);
            $table->boolean('tambah_pembayaran')->default(0);
            $table->boolean('edit_pembayaran')->default(0);
            $table->boolean('hapus_pembayaran')->default(0);
            $table->boolean('akses_nilai')->default(1);
            $table->boolean('tambah_nilai')->default(0);
            $table->boolean('edit_nilai')->default(0);
            $table->boolean('hapus_nilai')->default(0);
            $table->boolean('akses_hak_akses')->default(0); // hanya admin
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hak_akses');
    }
};