<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
 
class RoleSeeder extends Seeder
{
    use WithoutModelEvents;
 
    public function run(): void
    {
        DB::table('roles')->insert([
            ['nama_role' => 'admin',     'deskripsi' => 'Akses penuh ke seluruh sistem',        'created_at' => now(), 'updated_at' => now()],
            ['nama_role' => 'dosen',     'deskripsi' => 'Mengelola absensi dan jadwal mengajar', 'created_at' => now(), 'updated_at' => now()],
            ['nama_role' => 'mahasiswa', 'deskripsi' => 'Melihat jadwal dan rekap absensi',      'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
 