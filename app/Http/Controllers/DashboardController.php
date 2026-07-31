<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $userId   = session('user_id');
        $userRole = session('user_role');

        // ── Statistik umum ──────────────────────────────────────
        $totalMahasiswa  = DB::table('mahasiswa')->count();
        $totalDosen      = DB::table('dosen')->count();
        $totalMatkul     = DB::table('mata_kuliah')->count();
        $totalJadwal     = DB::table('jadwal_kuliah')->count();

        // Tahun akademik aktif
        $tahunAktif = DB::table('tahun_akademik')
            ->where('status_aktif', 1)->first();

        // ── Data spesifik per role ───────────────────────────────
        $jadwalHariIni   = collect();
        $rekapSaya       = collect();
        $notifBelumBaca  = 0;
        $absensiHariIni  = collect();

        if ($userRole === 'mahasiswa') {
            $mahasiswa = DB::table('mahasiswa')->where('user_id', $userId)->first();

            if ($mahasiswa) {
                // Rekap absensi mahasiswa ini
                $rekapSaya = DB::table('rekap_absensi as r')
                    ->join('jadwal_kuliah as j', 'r.jadwal_id', '=', 'j.id')
                    ->join('mata_kuliah as mk', 'j.mata_kuliah_id', '=', 'mk.id')
                    ->where('r.mahasiswa_id', $mahasiswa->id)
                    ->select('mk.nama as matkul', 'r.total_hadir', 'r.total_izin',
                             'r.total_alpha', 'r.persentase_hadir')
                    ->get();

                // Notifikasi belum dibaca
                $notifBelumBaca = DB::table('notifikasi_peringatan')
                    ->where('mahasiswa_id', $mahasiswa->id)
                    ->where('status_baca', 0)->count();

                // Jadwal hari ini
                $hariIni = now()->locale('id')->isoFormat('dddd');
                $hariMap = [
                    'Monday'    => 'Senin',  'Tuesday'  => 'Selasa',
                    'Wednesday' => 'Rabu',   'Thursday' => 'Kamis',
                    'Friday'    => 'Jumat',  'Saturday' => 'Sabtu',
                    'Sunday'    => 'Minggu',
                ];
                $hariIndo = $hariMap[now()->format('l')] ?? now()->format('l');

                $jadwalHariIni = DB::table('jadwal_kuliah as j')
                    ->join('mata_kuliah as mk', 'j.mata_kuliah_id', '=', 'mk.id')
                    ->join('dosen as d', 'j.dosen_id', '=', 'd.id')
                    ->join('ruangan as r', 'j.ruangan_id', '=', 'r.id')
                    ->where('j.hari', $hariIndo)
                    ->select('mk.nama as matkul', 'd.nama as dosen',
                             'r.nama as ruangan', 'j.jam_mulai', 'j.jam_selesai')
                    ->get();
            }

        } elseif ($userRole === 'dosen') {
            $dosen = DB::table('dosen')->where('user_id', $userId)->first();

            if ($dosen) {
                // Jadwal mengajar dosen ini
                $jadwalHariIni = DB::table('jadwal_kuliah as j')
                    ->join('mata_kuliah as mk', 'j.mata_kuliah_id', '=', 'mk.id')
                    ->join('ruangan as r', 'j.ruangan_id', '=', 'r.id')
                    ->where('j.dosen_id', $dosen->id)
                    ->select('mk.nama as matkul', 'r.nama as ruangan',
                             'j.hari', 'j.jam_mulai', 'j.jam_selesai', 'j.id')
                    ->get();

                // Pertemuan terakhir yang belum diisi absensi
                $absensiHariIni = DB::table('pertemuan as p')
                    ->join('jadwal_kuliah as j', 'p.jadwal_id', '=', 'j.id')
                    ->join('mata_kuliah as mk', 'j.mata_kuliah_id', '=', 'mk.id')
                    ->where('j.dosen_id', $dosen->id)
                    ->where('p.status_pertemuan', 'berlangsung')
                    ->select('p.id', 'p.pertemuan_ke', 'p.tanggal',
                             'mk.nama as matkul', 'p.topik')
                    ->get();
            }

        } elseif ($userRole === 'admin') {
            // Absensi hari ini (semua)
            $absensiHariIni = DB::table('absensi as a')
                ->join('pertemuan as p', 'a.pertemuan_id', '=', 'p.id')
                ->join('jadwal_kuliah as j', 'p.jadwal_id', '=', 'j.id')
                ->join('mata_kuliah as mk', 'j.mata_kuliah_id', '=', 'mk.id')
                ->where('p.tanggal', now()->toDateString())
                ->select('mk.nama as matkul',
                    DB::raw('COUNT(*) as total'),
                    DB::raw("SUM(CASE WHEN a.status='hadir' THEN 1 ELSE 0 END) as hadir"),
                    DB::raw("SUM(CASE WHEN a.status='alpha' THEN 1 ELSE 0 END) as alpha"))
                ->groupBy('mk.nama')
                ->get();

            // Notifikasi yang belum dibaca (semua mahasiswa)
            $notifBelumBaca = DB::table('notifikasi_peringatan')
                ->where('status_baca', 0)->count();
        }

        return view('dashboard', compact(
            'totalMahasiswa', 'totalDosen', 'totalMatkul', 'totalJadwal',
            'tahunAktif', 'jadwalHariIni', 'rekapSaya',
            'notifBelumBaca', 'absensiHariIni', 'userRole'
        ));
    }
}