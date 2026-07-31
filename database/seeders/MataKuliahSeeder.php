<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
 
class MataKuliahSeeder extends Seeder
{
    use WithoutModelEvents;
 
    public function run(): void
    {
        DB::table('mata_kuliah')->insert([
            ['kode_mk' => 'IF301', 'nama' => 'Pemrograman Web II',         'sks' => 3, 'semester' => 3, 'prodi' => 'Teknik Informatika', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF302', 'nama' => 'Basis Data',                 'sks' => 3, 'semester' => 3, 'prodi' => 'Teknik Informatika', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF303', 'nama' => 'Jaringan Komputer',          'sks' => 2, 'semester' => 3, 'prodi' => 'Teknik Informatika', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'SI301', 'nama' => 'Sistem Informasi Manajemen', 'sks' => 3, 'semester' => 3, 'prodi' => 'Sistem Informasi',   'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}