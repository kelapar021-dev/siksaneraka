<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
 
class JadwalKuliahSeeder extends Seeder
{
    use WithoutModelEvents;
 
    public function run(): void
    {
        // mata_kuliah_id: IF301=1, IF302=2, IF303=3
        // dosen_id: Budi=1, Siti=2
        // ruangan_id: GD1-101=1, GD1-102=2, GD2-201=3
        // tahun_akademik_id: 2025/2026 Ganjil = 3 (aktif)
        DB::table('jadwal_kuliah')->insert([
            [
                'mata_kuliah_id'    => 1,
                'dosen_id'          => 1,
                'ruangan_id'        => 1,
                'tahun_akademik_id' => 3,
                'hari'              => 'Senin',
                'jam_mulai'         => '08:00',
                'jam_selesai'       => '10:30',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'mata_kuliah_id'    => 2,
                'dosen_id'          => 1,
                'ruangan_id'        => 2,
                'tahun_akademik_id' => 3,
                'hari'              => 'Rabu',
                'jam_mulai'         => '08:00',
                'jam_selesai'       => '10:30',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'mata_kuliah_id'    => 3,
                'dosen_id'          => 2,
                'ruangan_id'        => 3,
                'tahun_akademik_id' => 3,
                'hari'              => 'Jumat',
                'jam_mulai'         => '13:00',
                'jam_selesai'       => '14:40',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
        ]);
    }
}
 