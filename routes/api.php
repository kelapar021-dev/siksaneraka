<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MahasiswaController;
use App\Http\Controllers\Api\KrsController;
use App\Http\Controllers\Api\JadwalController;
use App\Http\Controllers\Api\AbsensiController;
use App\Http\Controllers\Api\RekapAbsensiController;
use App\Http\Controllers\Api\NotifikasiController;
use App\Http\Controllers\Api\TransaksiController;
use App\Http\Controllers\Api\FuzzyController;

// ================= PUBLIC =================
Route::post('login', [AuthController::class, 'login'])->middleware('cors');

Route::options('{any}', function () {
    return response('', 200);
})->where('any', '.*')->middleware('cors');

// ================= PROTECTED =================
Route::middleware(['cors', 'api.auth'])->group(function () {
    Route::post('logout',  [AuthController::class, 'logout']);
    Route::get('user',     [AuthController::class, 'user']);

    Route::get('mahasiswa/profile', [MahasiswaController::class, 'profile']);

    Route::get('krs',               [KrsController::class, 'index']);
    Route::post('krs',              [KrsController::class, 'store']);
    Route::delete('krs/{id}',       [KrsController::class, 'destroy']);
    Route::get('krs/jadwal-tersedia', [KrsController::class, 'jadwalTersedia']);
    Route::get('krs/{id}',          [KrsController::class, 'show']);

    Route::get('jadwal',            [JadwalController::class, 'index']);

    Route::get('absensi',           [AbsensiController::class, 'index']);

    Route::get('rekap-absensi',     [RekapAbsensiController::class, 'index']);

    Route::get('notifikasi',        [NotifikasiController::class, 'index']);
    Route::post('notifikasi/{id}/baca', [NotifikasiController::class, 'baca']);

    Route::get('transaksi/pembayaran', [TransaksiController::class, 'pembayaran']);
    Route::post('transaksi/pembayaran', [TransaksiController::class, 'storePembayaran']);
    Route::put('transaksi/pembayaran/{id}', [TransaksiController::class, 'updatePembayaran']);
    Route::delete('transaksi/pembayaran/{id}', [TransaksiController::class, 'deletePembayaran']);
    Route::get('transaksi/nilai',       [TransaksiController::class, 'nilai']);
    Route::get('transaksi/nilai/{id}',  [TransaksiController::class, 'nilaiDetail']);

    Route::get('transaksi/absensi',             [TransaksiController::class, 'absensi']);
    Route::post('transaksi/absensi',            [TransaksiController::class, 'storeAbsensi']);
    Route::get('transaksi/absensi/pertemuan',   [TransaksiController::class, 'absensiPertemuan']);

    Route::get('fuzzy',             [FuzzyController::class, 'index']);
    Route::get('fuzzy/{id}',        [FuzzyController::class, 'show']);
});
