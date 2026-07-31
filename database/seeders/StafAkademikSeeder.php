<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StafAkademikSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('hak_akses')->updateOrInsert(
            ['nama_role' => 'staf_akademik'],
            [
                'akses_mahasiswa'    => true,
                'tambah_mahasiswa'   => true,
                'edit_mahasiswa'     => true,
                'hapus_mahasiswa'    => false,
                'akses_dosen'        => true,
                'tambah_dosen'       => false,
                'edit_dosen'         => false,
                'hapus_dosen'        => false,
                'akses_matkul'       => true,
                'tambah_matkul'      => true,
                'edit_matkul'        => true,
                'hapus_matkul'       => false,
                'akses_ruangan'      => true,
                'tambah_ruangan'     => true,
                'hapus_ruangan'      => false,
                'akses_tahun'        => true,
                'tambah_tahun'       => true,
                'hapus_tahun'        => false,
                'akses_jadwal'       => true,
                'tambah_jadwal'      => true,
                'hapus_jadwal'       => false,
                'akses_krs'          => true,
                'ajukan_krs'         => false,
                'setujui_krs'        => false,
                'hapus_krs'          => false,
                'akses_absensi'      => true,
                'tambah_absensi'     => true,
                'edit_absensi'       => true,
                'hapus_absensi'      => false,
                'akses_pembayaran'   => true,
                'tambah_pembayaran'  => true,
                'edit_pembayaran'    => true,
                'hapus_pembayaran'   => false,
                'akses_nilai'        => true,
                'tambah_nilai'       => true,
                'edit_nilai'         => true,
                'hapus_nilai'        => false,
                'akses_rekap'        => true,
                'akses_notifikasi'   => true,
                'akses_hak_akses'    => false,
            ]
        );
    }
}