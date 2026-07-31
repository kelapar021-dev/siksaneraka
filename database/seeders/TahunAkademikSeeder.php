<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
 
class TahunAkademikSeeder extends Seeder
{
    use WithoutModelEvents;
 
    public function run(): void
    {
        DB::table('tahun_akademik')->insert([
        ['tahun' => '2024/2025', 'semester' => 'Ganjil', 'status_aktif' => 'Tidak Aktif', 'created_at' => now(), 'updated_at' => now()],
        ['tahun' => '2024/2025', 'semester' => 'Genap',  'status_aktif' => 'Tidak Aktif', 'created_at' => now(), 'updated_at' => now()],
        ['tahun' => '2025/2026', 'semester' => 'Ganjil', 'status_aktif' => 'Aktif', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
 