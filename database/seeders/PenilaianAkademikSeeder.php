<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenilaianAkademikSeeder extends Seeder
{
    public function run(): void
    {
        $penilaian = [
            ['mahasiswa_id' => 1, 'jadwal_id' => 1, 'kehadiran' => 90, 'nilai_tugas' => 85, 'keaktifan_diskusi' => 80],
            ['mahasiswa_id' => 2, 'jadwal_id' => 1, 'kehadiran' => 70, 'nilai_tugas' => 60, 'keaktifan_diskusi' => 55],
            ['mahasiswa_id' => 3, 'jadwal_id' => 2, 'kehadiran' => 95, 'nilai_tugas' => 92, 'keaktifan_diskusi' => 88],
            ['mahasiswa_id' => 4, 'jadwal_id' => 3, 'kehadiran' => 45, 'nilai_tugas' => 35, 'keaktifan_diskusi' => 30],
            ['mahasiswa_id' => 1, 'jadwal_id' => 2, 'kehadiran' => 80, 'nilai_tugas' => 75, 'keaktifan_diskusi' => 70],
            ['mahasiswa_id' => 2, 'jadwal_id' => 2, 'kehadiran' => 55, 'nilai_tugas' => 50, 'keaktifan_diskusi' => 40],
        ];

        $fuzzyService = new \App\Services\FuzzyLogicService();

        foreach ($penilaian as $p) {
            $hasil = $fuzzyService->hitung($p['kehadiran'], $p['nilai_tugas'], $p['keaktifan_diskusi']);

            $penilaianId = DB::table('penilaian_akademik')->insertGetId([
                'mahasiswa_id'        => $p['mahasiswa_id'],
                'jadwal_id'           => $p['jadwal_id'],
                'kehadiran'           => $p['kehadiran'],
                'nilai_tugas'         => $p['nilai_tugas'],
                'keaktifan_diskusi'   => $p['keaktifan_diskusi'],
                'skor_fuzzy'          => $hasil['skor'],
                'keterangan'          => $hasil['keterangan'],
                'created_at'          => now(),
                'updated_at'          => now(),
            ]);

            $mhs = DB::table('mahasiswa')->where('id', $p['mahasiswa_id'])->first();
            $f = $hasil['fuzzified'];

            DB::table('fuzzy_hasil')->insert([
                'penilaian_id'        => $penilaianId,
                'nim'                 => $mhs->nim ?? '',
                'nama_mahasiswa'      => $mhs->nama ?? '',
                'kehadiran'           => $p['kehadiran'],
                'nilai_tugas'         => $p['nilai_tugas'],
                'keaktifan_diskusi'   => $p['keaktifan_diskusi'],
                'kehadiran_rendah'    => $f['kehadiran']['Rendah'],
                'kehadiran_sedang'    => $f['kehadiran']['Sedang'],
                'kehadiran_tinggi'    => $f['kehadiran']['Tinggi'],
                'tugas_rendah'        => $f['nilai_tugas']['Rendah'],
                'tugas_sedang'        => $f['nilai_tugas']['Sedang'],
                'tugas_tinggi'        => $f['nilai_tugas']['Tinggi'],
                'diskusi_rendah'      => $f['keaktifan']['Rendah'],
                'diskusi_sedang'      => $f['keaktifan']['Sedang'],
                'diskusi_tinggi'      => $f['keaktifan']['Tinggi'],
                'detail_inferensi'    => json_encode($hasil['active_rules']),
                'total_alpha_z'       => $hasil['total_alpha_z'],
                'total_alpha'         => $hasil['total_alpha'],
                'hasil_defuzzifikasi' => $hasil['skor'],
                'keterangan'          => $hasil['keterangan'],
                'created_at'          => now(),
                'updated_at'          => now(),
            ]);
        }
    }
}
