<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        DB::table('mahasiswa')->insert([
            [
                'user_id'        => 4,
                'nim'            => '2455201110012',
                'nama'           => 'Muhammad Ryan Hidayat',
                'tempat_lahir'   => 'Banjarmasin',
                'tanggal_lahir'  => '2005-01-15',
                'jenis_kelamin'  => 'L',
                'alamat'         => 'Jl. Ahmad Yani Km. 5',
                'email'          => 'ryan@mahasiswa.ac.id',
                'no_hp'          => '081234567890',
                'prodi'          => 'Teknik Informatika',
                'fakultas'       => 'Fakultas Teknologi Informasi',
                'semester'       => 4,
                'ipk'            => '3.85',
                'agama'          => 'Islam',
                'status'         => 'Aktif',
                'asal_sekolah'   => 'SMAN 1 Banjarmasin',
                'nama_ayah'      => 'Ahmad Hidayat',
                'nama_ibu'       => 'Siti Aminah',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'user_id'        => 5,
                'nim'            => '2455201110014',
                'nama'           => 'Andi Pratama',
                'tempat_lahir'   => 'Banjarbaru',
                'tanggal_lahir'  => '2005-03-20',
                'jenis_kelamin'  => 'L',
                'alamat'         => 'Jl. Trikora',
                'email'          => 'andi@mahasiswa.ac.id',
                'no_hp'          => '082345678901',
                'prodi'          => 'Teknik Informatika',
                'fakultas'       => 'Fakultas Teknologi Informasi',
                'semester'       => 4,
                'ipk'            => '3.72',
                'agama'          => 'Islam',
                'status'         => 'Aktif',
                'asal_sekolah'   => 'SMAN 2 Banjarbaru',
                'nama_ayah'      => 'Slamet',
                'nama_ibu'       => 'Nurhayati',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'user_id'        => null,
                'nim'            => '2455201110016',
                'nama'           => 'Dewi Anggraeni',
                'tempat_lahir'   => 'Martapura',
                'tanggal_lahir'  => '2005-06-11',
                'jenis_kelamin'  => 'P',
                'alamat'         => 'Jl. Sekumpul',
                'email'          => 'dewi@mahasiswa.ac.id',
                'no_hp'          => '083456789012',
                'prodi'          => 'Teknik Informatika',
                'fakultas'       => 'Fakultas Teknologi Informasi',
                'semester'       => 4,
                'ipk'            => '3.90',
                'agama'          => 'Islam',
                'status'         => 'Aktif',
                'asal_sekolah'   => 'SMAN 1 Martapura',
                'nama_ayah'      => 'Abdul Karim',
                'nama_ibu'       => 'Rahmawati',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'user_id'        => null,
                'nim'            => '2455201110018',
                'nama'           => 'Rizky Firmansyah',
                'tempat_lahir'   => 'Pelaihari',
                'tanggal_lahir'  => '2005-09-02',
                'jenis_kelamin'  => 'L',
                'alamat'         => 'Jl. A. Yani',
                'email'          => 'rizky@mahasiswa.ac.id',
                'no_hp'          => '084567890123',
                'prodi'          => 'Sistem Informasi',
                'fakultas'       => 'Fakultas Teknologi Informasi',
                'semester'       => 4,
                'ipk'            => '3.68',
                'agama'          => 'Islam',
                'status'         => 'Aktif',
                'asal_sekolah'   => 'SMAN 1 Pelaihari',
                'nama_ayah'      => 'Joko Firmansyah',
                'nama_ibu'       => 'Sri Wahyuni',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
        ]);
    }
}