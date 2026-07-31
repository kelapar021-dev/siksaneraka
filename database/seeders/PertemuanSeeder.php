<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
 
class PertemuanSeeder extends Seeder
{
    use WithoutModelEvents;
 
    public function run(): void
    {
        $pertemuan = [
            // [jadwal_id, ke, tanggal, topik]
            [1, 1, '2025-09-08', 'Pengantar Laravel & MVC'],
            [1, 2, '2025-09-15', 'Routing dan Controller'],
            [1, 3, '2025-09-22', 'Blade Template Engine'],
            [1, 4, '2025-09-29', 'Eloquent ORM & Query Builder'],
            [1, 5, '2025-10-06', 'Middleware & Autentikasi'],
 
            [2, 1, '2025-09-10', 'Konsep Relasi & ERD'],
            [2, 2, '2025-09-17', 'SQL DDL & DML'],
            [2, 3, '2025-09-24', 'Normalisasi Tabel'],
 
            [3, 1, '2025-09-12', 'Pengantar Jaringan & Topologi'],
            [3, 2, '2025-09-19', 'Model OSI & TCP/IP'],
        ];
 
        foreach ($pertemuan as $p) {
            DB::table('pertemuan')->insert([
                'jadwal_id'        => $p[0],
                'pertemuan_ke'     => $p[1],
                'tanggal'          => $p[2],
                'topik'            => $p[3],
                'status_pertemuan' => 'selesai',
                'created_at'       => now(),
                'updated_at'       => now(),
            ]);
        }
    }
}
 