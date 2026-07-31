<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Services\FuzzyLogicService;

class BackfillFuzzyHasil extends Command
{
    protected $signature = 'fuzzy:backfill';
    protected $description = 'Backfill fuzzy_hasil from existing penilaian_akademik records';

    public function handle(): int
    {
        $fuzzy = new FuzzyLogicService();
        $missing = DB::table('penilaian_akademik')
            ->whereNotIn('id', DB::table('fuzzy_hasil')->select('penilaian_id'))
            ->get();

        foreach ($missing as $p) {
            $hasil = $fuzzy->hitung($p->kehadiran, $p->nilai_tugas, $p->keaktifan_diskusi);
            $mhs = DB::table('mahasiswa')->where('id', $p->mahasiswa_id)->first();
            $f = $hasil['fuzzified'];

            DB::table('fuzzy_hasil')->insert([
                'penilaian_id'        => $p->id,
                'nim'                 => $mhs->nim ?? '',
                'nama_mahasiswa'      => $mhs->nama ?? '',
                'kehadiran'           => $p->kehadiran,
                'nilai_tugas'         => $p->nilai_tugas,
                'keaktifan_diskusi'   => $p->keaktifan_diskusi,
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

        $this->info("Backfilled {$missing->count()} records.");
        return 0;
    }
}
