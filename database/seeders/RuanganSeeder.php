<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
 
class RuanganSeeder extends Seeder
{
    use WithoutModelEvents;
 
    public function run(): void
    {
        DB::table('ruangan')->insert([
            ['kode' => 'GD1-101', 'nama' => 'Lab Komputer 1',  'kapasitas' => 40, 'gedung' => 'Gedung A', 'created_at' => now(), 'updated_at' => now()],
            ['kode' => 'GD1-102', 'nama' => 'Lab Komputer 2',  'kapasitas' => 40, 'gedung' => 'Gedung A', 'created_at' => now(), 'updated_at' => now()],
            ['kode' => 'GD2-201', 'nama' => 'Ruang Kelas 201', 'kapasitas' => 35, 'gedung' => 'Gedung B', 'created_at' => now(), 'updated_at' => now()],
            ['kode' => 'GD2-202', 'nama' => 'Ruang Kelas 202', 'kapasitas' => 35, 'gedung' => 'Gedung B', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}