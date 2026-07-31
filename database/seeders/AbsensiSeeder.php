<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
 
class AbsensiSeeder extends Seeder
{
    use WithoutModelEvents;
 
    public function run(): void
    {
        // [pertemuan_id, mahasiswa_id, status, metode]
        $data = [
            // Pemrograman Web II (pertemuan 1-5)
            [1, 1, 'hadir', 'manual'], [1, 2, 'hadir', 'manual'], [1, 3, 'hadir', 'manual'],
            [2, 1, 'hadir', 'manual'], [2, 2, 'izin',  'manual'], [2, 3, 'hadir', 'manual'],
            [3, 1, 'hadir', 'manual'], [3, 2, 'hadir', 'manual'], [3, 3, 'alpha', 'manual'],
            [4, 1, 'sakit', 'manual'], [4, 2, 'hadir', 'manual'], [4, 3, 'hadir', 'manual'],
            [5, 1, 'hadir', 'manual'], [5, 2, 'hadir', 'manual'], [5, 3, 'hadir', 'manual'],
 
            // Basis Data (pertemuan 6-8)
            [6, 1, 'hadir', 'manual'], [6, 2, 'hadir', 'manual'], [6, 4, 'hadir', 'manual'],
            [7, 1, 'alpha', 'manual'], [7, 2, 'hadir', 'manual'], [7, 4, 'izin',  'manual'],
            [8, 1, 'hadir', 'manual'], [8, 2, 'hadir', 'manual'], [8, 4, 'hadir', 'manual'],
 
            // Jaringan Komputer (pertemuan 9-10)
            [9,  1, 'hadir', 'manual'], [9,  3, 'hadir', 'manual'],
            [10, 1, 'hadir', 'manual'], [10, 3, 'izin',  'manual'],
        ];
 
        foreach ($data as $a) {
            DB::table('absensi')->insert([
                'pertemuan_id' => $a[0],
                'mahasiswa_id' => $a[1],
                'status'       => $a[2],
                'metode'       => $a[3],
                'waktu_absen'  => now(),
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);
        }
 
        // Generate rekap otomatis
        $this->generateRekap();
    }
 
    private function generateRekap(): void
    {
        $jadwals    = DB::table('jadwal_kuliah')->get();
        $mahasiswas = DB::table('mahasiswa')->get();
 
        foreach ($jadwals as $jadwal) {
            $pertemuanIds   = DB::table('pertemuan')->where('jadwal_id', $jadwal->id)->pluck('id');
            $totalPertemuan = $pertemuanIds->count();
 
            foreach ($mahasiswas as $mhs) {
                $hadir = DB::table('absensi')
                    ->whereIn('pertemuan_id', $pertemuanIds)
                    ->where('mahasiswa_id', $mhs->id)
                    ->where('status', 'hadir')->count();
 
                $izin = DB::table('absensi')
                    ->whereIn('pertemuan_id', $pertemuanIds)
                    ->where('mahasiswa_id', $mhs->id)
                    ->whereIn('status', ['izin', 'sakit'])->count();
 
                $alpha = DB::table('absensi')
                    ->whereIn('pertemuan_id', $pertemuanIds)
                    ->where('mahasiswa_id', $mhs->id)
                    ->where('status', 'alpha')->count();
 
                // Lewati jika mahasiswa tidak ada absensi di jadwal ini
                if (($hadir + $izin + $alpha) === 0) continue;
 
                $persen = $totalPertemuan > 0
                    ? round(($hadir / $totalPertemuan) * 100, 2)
                    : 0;
 
                DB::table('rekap_absensi')->insert([
                    'mahasiswa_id'     => $mhs->id,
                    'jadwal_id'        => $jadwal->id,
                    'total_hadir'      => $hadir,
                    'total_izin'       => $izin,
                    'total_alpha'      => $alpha,
                    'persentase_hadir' => $persen,
                    'created_at'       => now(),
                    'updated_at'       => now(),
                ]);
 
                // Kirim notifikasi jika kehadiran < 75%
                if ($persen < 75) {
                 DB::table('notifikasi_peringatan')->insert([
                'mahasiswa_id'  => $mhs->id,
                'jadwal_id'     => $jadwal->id,
                'pesan'         => "⚠️ Peringatan! Kehadiran Anda hanya {$persen}%. Batas minimum kehadiran adalah 75%.",
                'tanggal_kirim' => now(),
                'status_baca'   => 'Belum',
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
                }
            }
        }
    }
}
 