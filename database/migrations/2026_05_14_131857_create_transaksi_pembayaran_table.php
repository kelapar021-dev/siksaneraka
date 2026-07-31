<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksi_pembayaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mahasiswa_id');         // FK ke tabel mahasiswa
            $table->string('kode_bayar', 50)->unique();         // Kode unik pembayaran
            $table->enum('jenis_pembayaran', [                  // Jenis pembayaran
                'SPP', 'UKT', 'Praktikum', 'Wisuda', 'Lainnya'
            ]);
            $table->decimal('jumlah_bayar', 12, 2);             // Nominal pembayaran
            $table->date('tanggal_bayar');                      // Tanggal bayar
            $table->date('batas_bayar');                        // Batas akhir bayar
            $table->enum('status_bayar', [                      // Status pembayaran
                'Lunas', 'Belum Lunas', 'Cicilan'
            ])->default('Belum Lunas');
            $table->string('metode_bayar', 50)->nullable();     // Transfer/Cash/dll
            $table->text('keterangan')->nullable();             // Catatan tambahan
            $table->timestamps();

            $table->foreign('mahasiswa_id')
                  ->references('id')
                  ->on('mahasiswa')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksi_pembayaran');
    }
};