<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosenSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        DB::table('dosen')->insert([
            [
                'nip'        => '197501012005011001',
                'nama'       => 'Budi Santoso, S.Kom., M.T.',
                'prodi'      => 'Teknik Informatika',
                'jabatan'    => 'Lektor',
                'email'      => 'budi.santoso@absensi.ac.id',
                'no_hp'      => '081234567890',
                'user_id'    => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nip'        => '198203152008012002',
                'nama'       => 'Siti Rahayu, S.T., M.Kom.',
                'prodi'      => 'Sistem Informasi',
                'jabatan'    => 'Asisten Ahli',
                'email'      => 'siti.rahayu@absensi.ac.id',
                'no_hp'      => '081234567891',
                'user_id'    => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}