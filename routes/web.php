<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\TahunAkademikController;
use App\Http\Controllers\RekapAbsensiController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\KrsController;
use App\Http\Controllers\HakAksesController;
use App\Http\Controllers\FuzzyController;

Route::get('/', fn() => view('landing'));

// ================= AUTH =================
Route::get('login',    [LoginController::class, 'showLogin'])->name('login');
Route::post('login',   [LoginController::class, 'login'])->name('login.post');
Route::get('logout',   [LoginController::class, 'logout'])->name('logout');
Route::get('register', [RegisterController::class, 'showRegister'])->name('register');
Route::post('register',[RegisterController::class, 'register'])->name('register.post');

// ================= SEMUA ROLE YANG SUDAH LOGIN =================
Route::middleware('cek.akses')->group(function () {

    // MAHASISWA (semua role bisa akses, controller filter sendiri)
    Route::get('data-mahasiswa',         [MahasiswaController::class, 'index'])->name('data-mahasiswa');

    // KRS
    Route::get('krs',              [KrsController::class, 'index'])->name('krs.index');
    Route::get('krs/create',       [KrsController::class, 'create'])->name('krs.create');
    Route::post('krs/store',       [KrsController::class, 'store'])->name('krs.store');
    Route::post('krs/status/{id}', [KrsController::class, 'updateStatus'])->name('krs.status');

    // JADWAL
    Route::get('jadwal-kuliah', [JadwalController::class, 'index'])->name('jadwal.index');

    // ABSENSI - lihat
    Route::get('absensi-kuliah', [AbsensiController::class, 'index'])->name('absensi.index');

    // REKAP
    Route::get('rekap-absensi', [RekapAbsensiController::class, 'index'])->name('rekap.index');

    // NOTIFIKASI
    Route::get('notifikasi',           [NotifikasiController::class, 'index'])->name('notifikasi.index');
    Route::get('notifikasi/baca/{id}', [NotifikasiController::class, 'baca'])->name('notifikasi.baca');

    // PEMBAYARAN
    Route::get('transaksi/pembayaran',              [TransaksiController::class, 'pembayaran'])->name('transaksi.pembayaran');
    Route::get('transaksi/pembayaran/create',       [TransaksiController::class, 'createPembayaran'])->name('transaksi.pembayaran.create');
    Route::post('transaksi/pembayaran/store',       [TransaksiController::class, 'storePembayaran'])->name('transaksi.pembayaran.store');
    Route::get('transaksi/pembayaran/edit/{id}',    [TransaksiController::class, 'editPembayaran'])->name('transaksi.pembayaran.edit');
    Route::post('transaksi/pembayaran/update/{id}', [TransaksiController::class, 'updatePembayaran'])->name('transaksi.pembayaran.update');

    // NILAI
    Route::get('transaksi/nilai',              [TransaksiController::class, 'nilai'])->name('transaksi.nilai');
    Route::get('transaksi/nilai/create',       [TransaksiController::class, 'createNilai'])->name('transaksi.nilai.create');
    Route::post('transaksi/nilai/store',       [TransaksiController::class, 'storeNilai'])->name('transaksi.nilai.store');
    Route::get('transaksi/nilai/edit/{id}',    [TransaksiController::class, 'editNilai'])->name('transaksi.nilai.edit');
    Route::post('transaksi/nilai/update/{id}', [TransaksiController::class, 'updateNilai'])->name('transaksi.nilai.update');

    // TRANSAKSI ABSENSI
    Route::get('transaksi/absensi',              [TransaksiController::class, 'absensi'])->name('transaksi.absensi');
    Route::get('transaksi/absensi/create',       [TransaksiController::class, 'createAbsensi'])->name('transaksi.absensi.create');
    Route::post('transaksi/absensi/store',       [TransaksiController::class, 'storeAbsensi'])->name('transaksi.absensi.store');
    Route::get('transaksi/absensi/edit/{id}',    [TransaksiController::class, 'editAbsensi'])->name('transaksi.absensi.edit');
    Route::post('transaksi/absensi/update/{id}', [TransaksiController::class, 'updateAbsensi'])->name('transaksi.absensi.update');
    // FUZZY EVALUASI
    Route::get('fuzzy/definisi',              [FuzzyController::class, 'definisi'])->name('fuzzy.definisi');
    Route::get('fuzzy/evaluasi',              [FuzzyController::class, 'index'])->name('fuzzy.index');
    Route::get('fuzzy/evaluasi/create',       [FuzzyController::class, 'create'])->name('fuzzy.create');
    Route::post('fuzzy/evaluasi/store',       [FuzzyController::class, 'store'])->name('fuzzy.store');
    Route::get('fuzzy/evaluasi/{id}',         [FuzzyController::class, 'show'])->name('fuzzy.show');
    Route::get('fuzzy/evaluasi/hapus/{id}',   [FuzzyController::class, 'destroy'])->name('fuzzy.destroy');
});

// ================= ADMIN + DOSEN + STAF AKADEMIK =================
Route::middleware('cek.akses:admin,dosen,staf_akademik')->group(function () {

    Route::get('create-mahasiswa',       [MahasiswaController::class, 'create'])->name('create-mahasiswa');
    Route::post('store-mahasiswa',       [MahasiswaController::class, 'store'])->name('store-mahasiswa');
    Route::get('edit-mahasiswa/{id}',    [MahasiswaController::class, 'edit'])->name('edit-mahasiswa');
    Route::post('update-mahasiswa/{id}', [MahasiswaController::class, 'update'])->name('update-mahasiswa');

    // DOSEN (staf hanya lihat)
    Route::get('dosen',              [DosenController::class, 'index'])->name('dosen.index');
    Route::get('dosen/create',       [DosenController::class, 'create'])->name('dosen.create');
    Route::post('dosen/store',       [DosenController::class, 'store'])->name('dosen.store');
    Route::get('dosen/edit/{id}',    [DosenController::class, 'edit'])->name('dosen.edit');
    Route::post('dosen/update/{id}', [DosenController::class, 'update'])->name('dosen.update');

    // MATA KULIAH
    Route::get('mata-kuliah',              [MataKuliahController::class, 'index'])->name('matkul.index');
    Route::get('mata-kuliah/create',       [MataKuliahController::class, 'create'])->name('matkul.create');
    Route::post('mata-kuliah/store',       [MataKuliahController::class, 'store'])->name('matkul.store');
    Route::get('mata-kuliah/edit/{id}',    [MataKuliahController::class, 'edit'])->name('matkul.edit');
    Route::post('mata-kuliah/update/{id}', [MataKuliahController::class, 'update'])->name('matkul.update');

    // RUANGAN
    Route::get('ruangan',              [RuanganController::class, 'index'])->name('ruangan.index');
    Route::get('ruangan/create',       [RuanganController::class, 'create'])->name('ruangan.create');
    Route::post('ruangan/store',       [RuanganController::class, 'store'])->name('ruangan.store');
    Route::get('ruangan/edit/{id}',    [RuanganController::class, 'edit'])->name('ruangan.edit');
    Route::put('ruangan/update/{id}',  [RuanganController::class, 'update'])->name('ruangan.update');

    // TAHUN AKADEMIK
    Route::get('tahun-akademik',             [TahunAkademikController::class, 'index'])->name('tahun.index');
    Route::get('tahun-akademik/create',      [TahunAkademikController::class, 'create'])->name('tahun.create');
    Route::post('tahun-akademik/store',      [TahunAkademikController::class, 'store'])->name('tahun.store');
    Route::get('tahun-akademik/edit/{id}',   [TahunAkademikController::class, 'edit'])->name('tahun.edit');
    Route::put('tahun-akademik/update/{id}', [TahunAkademikController::class, 'update'])->name('tahun.update');

    // JADWAL CRUD
    Route::get('jadwal-kuliah/create',      [JadwalController::class, 'create'])->name('jadwal.create');
    Route::post('jadwal-kuliah/store',      [JadwalController::class, 'store'])->name('jadwal.store');
    Route::get('jadwal-kuliah/edit/{id}',   [JadwalController::class, 'edit'])->name('jadwal.edit');
    Route::put('jadwal-kuliah/update/{id}', [JadwalController::class, 'update'])->name('jadwal.update');

    // ABSENSI CRUD
    Route::get('absensi-kuliah/create',       [AbsensiController::class, 'create'])->name('absensi.create');
    Route::post('absensi-kuliah/store',       [AbsensiController::class, 'store'])->name('absensi.store');
    Route::get('absensi-kuliah/edit/{id}',    [AbsensiController::class, 'edit'])->name('absensi.edit');
    Route::post('absensi-kuliah/update/{id}', [AbsensiController::class, 'update'])->name('absensi.update');

    // NOTIFIKASI CRUD
    Route::get('notifikasi/create',       [NotifikasiController::class, 'create'])->name('notifikasi.create');
    Route::post('notifikasi/store',       [NotifikasiController::class, 'store'])->name('notifikasi.store');
    Route::get('notifikasi/edit/{id}',    [NotifikasiController::class, 'edit'])->name('notifikasi.edit');
    Route::post('notifikasi/update/{id}', [NotifikasiController::class, 'update'])->name('notifikasi.update');

    // REKAP ABSENSI (dosen/admin menghitung rekap dari isian mahasiswa)
    Route::post('transaksi/absensi/hitung-rekap', [TransaksiController::class, 'hitungRekap'])->name('transaksi.absensi.hitung-rekap');
});

// ================= ADMIN ONLY =================
Route::middleware('cek.akses:admin')->group(function () {
    Route::get('hapus-mahasiswa/{id}',             [MahasiswaController::class,    'destroy'])->name('hapus-mahasiswa');
    Route::get('dosen/delete/{id}',                [DosenController::class,        'destroy'])->name('dosen.destroy');
    Route::get('mata-kuliah/delete/{id}',          [MataKuliahController::class,   'destroy'])->name('matkul.destroy');
    Route::delete('ruangan/delete/{id}',            [RuanganController::class,      'destroy'])->name('ruangan.destroy');
    Route::get('tahun-akademik/delete/{id}',       [TahunAkademikController::class,'destroy'])->name('tahun.destroy');
    Route::delete('jadwal-kuliah/delete/{id}',      [JadwalController::class,       'destroy'])->name('jadwal.destroy');
    Route::delete('absensi-kuliah/delete/{id}',     [AbsensiController::class,      'destroy'])->name('absensi.destroy');
    Route::get('notifikasi/delete/{id}',           [NotifikasiController::class,   'destroy'])->name('notifikasi.destroy');
    Route::get('transaksi/pembayaran/delete/{id}', [TransaksiController::class,    'deletePembayaran'])->name('transaksi.pembayaran.delete');
    Route::get('transaksi/nilai/delete/{id}',      [TransaksiController::class,    'deleteNilai'])->name('transaksi.nilai.delete');
    Route::get('transaksi/absensi/delete/{id}',    [TransaksiController::class,    'deleteAbsensi'])->name('transaksi.absensi.delete');
    Route::get('krs/delete/{id}',                  [KrsController::class,          'destroy'])->name('krs.destroy');
    Route::get('hak-akses',                        [HakAksesController::class,     'index'])->name('hak-akses.index');
    Route::get('hak-akses/edit/{id}',              [HakAksesController::class,     'edit'])->name('hak-akses.edit');
    Route::post('hak-akses/update/{id}',           [HakAksesController::class,     'update'])->name('hak-akses.update');
});