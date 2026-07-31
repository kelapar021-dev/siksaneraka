<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsensiController extends Controller
{
    public function index()
    {
        $userRole    = session('user_role');
        $mahasiswaId = session('mahasiswa_id');
        $dosenId     = session('dosen_id');

        $query = DB::table('absensi')
            ->join('pertemuan',    'absensi.pertemuan_id',     '=', 'pertemuan.id')
            ->join('jadwal_kuliah','pertemuan.jadwal_id',       '=', 'jadwal_kuliah.id')
            ->join('mata_kuliah',  'jadwal_kuliah.mata_kuliah_id','=','mata_kuliah.id')
            ->join('dosen',        'jadwal_kuliah.dosen_id',   '=', 'dosen.id')
            ->join('mahasiswa',    'absensi.mahasiswa_id',     '=', 'mahasiswa.id')
            ->select(
                'absensi.*',
                'mahasiswa.nama as nama_mahasiswa',
                'mahasiswa.nim',
                'mata_kuliah.nama as nama_matkul',
                'dosen.nama as nama_dosen',
                'pertemuan.pertemuan_ke',
                'pertemuan.tanggal',
                'pertemuan.topik'
            );

        // Filter per role
        if ($userRole === 'mahasiswa') {
            // Mahasiswa hanya lihat absensi dirinya sendiri
            $query->where('absensi.mahasiswa_id', $mahasiswaId ?? 0);
        } elseif ($userRole === 'dosen') {
            // Dosen hanya lihat absensi di jadwal miliknya
            $query->where('jadwal_kuliah.dosen_id', $dosenId ?? 0);
        }
        // Admin lihat semua (tidak ada filter tambahan)

        $absensi = $query->orderByDesc('absensi.created_at')->get();

        // Mahasiswa juga melihat riwayat self-report beserta status verifikasi
        $selfReport = [];
        if ($userRole === 'mahasiswa') {
            $selfReport = DB::table('transaksi_absensi')
                ->join('mahasiswa', 'transaksi_absensi.mahasiswa_id', '=', 'mahasiswa.id')
                ->where('transaksi_absensi.mahasiswa_id', $mahasiswaId ?? 0)
                ->select(
                    'transaksi_absensi.id',
                    'transaksi_absensi.mahasiswa_id',
                    'transaksi_absensi.nama_matkul',
                    'transaksi_absensi.nama_dosen',
                    'transaksi_absensi.tanggal',
                    'transaksi_absensi.pertemuan_ke',
                    'transaksi_absensi.status_hadir',
                    'transaksi_absensi.status_verifikasi',
                    'transaksi_absensi.verifikator',
                    'transaksi_absensi.alasan_penolakan',
                    'transaksi_absensi.keterangan',
                    'mahasiswa.nama as nama_mahasiswa',
                    'mahasiswa.nim'
                )
                ->orderByDesc('transaksi_absensi.created_at')
                ->get();
        }

        return view('absensi.index', compact('absensi', 'userRole', 'selfReport'));
    }

    public function create()
    {
        $userRole = session('user_role');
        $dosenId  = session('dosen_id');

        $mahasiswa = DB::table('mahasiswa')->get();

        // Dosen hanya bisa pilih pertemuan di jadwalnya
        $pertemuanQuery = DB::table('pertemuan')
            ->join('jadwal_kuliah', 'pertemuan.jadwal_id', '=', 'jadwal_kuliah.id')
            ->join('mata_kuliah',   'jadwal_kuliah.mata_kuliah_id', '=', 'mata_kuliah.id')
            ->select('pertemuan.*', 'mata_kuliah.nama as nama_matkul');

        if ($userRole === 'dosen') {
            $pertemuanQuery->where('jadwal_kuliah.dosen_id', $dosenId ?? 0);
        }

        $pertemuan = $pertemuanQuery->get();
        return view('absensi.create', compact('mahasiswa', 'pertemuan'));
    }

    public function store(Request $request)
    {
        DB::table('absensi')->insert([
            'pertemuan_id' => $request->pertemuan_id,
            'mahasiswa_id' => $request->mahasiswa_id,
            'status'       => $request->status,
            'waktu_absen'  => now(),
            'metode'       => $request->metode ?? 'Manual',
            'keterangan'   => $request->keterangan,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);
        $this->updateRekap($request->mahasiswa_id, $request->pertemuan_id);
        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil disimpan!');
    }

    public function edit($id)
    {
        $userRole = session('user_role');
        $dosenId  = session('dosen_id');

        $absensi   = DB::table('absensi')->where('id', $id)->first();
        $mahasiswa = DB::table('mahasiswa')->get();

        $pertemuanQuery = DB::table('pertemuan')
            ->join('jadwal_kuliah', 'pertemuan.jadwal_id', '=', 'jadwal_kuliah.id')
            ->join('mata_kuliah',   'jadwal_kuliah.mata_kuliah_id', '=', 'mata_kuliah.id')
            ->select('pertemuan.*', 'mata_kuliah.nama as nama_matkul');

        if ($userRole === 'dosen') {
            $pertemuanQuery->where('jadwal_kuliah.dosen_id', $dosenId ?? 0);
        }

        $pertemuan = $pertemuanQuery->get();
        return view('absensi.edit', compact('absensi', 'mahasiswa', 'pertemuan'));
    }

    public function update(Request $request, $id)
    {
        DB::table('absensi')->where('id', $id)->update([
            'status'     => $request->status,
            'metode'     => $request->metode,
            'keterangan' => $request->keterangan,
            'updated_at' => now(),
        ]);
        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil diupdate!');
    }

    public function destroy($id)
    {
        DB::table('absensi')->where('id', $id)->delete();
        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil dihapus!');
    }

    private function updateRekap($mahasiswa_id, $pertemuan_id)
    {
        $jadwal_id = DB::table('pertemuan')->where('id', $pertemuan_id)->value('jadwal_id');
        $rekap = DB::table('absensi')
            ->join('pertemuan', 'absensi.pertemuan_id', '=', 'pertemuan.id')
            ->where('absensi.mahasiswa_id', $mahasiswa_id)
            ->where('pertemuan.jadwal_id', $jadwal_id)
           ->select(
                DB::raw("SUM(CASE WHEN status='hadir' THEN 1 ELSE 0 END) as hadir"),
                DB::raw("SUM(CASE WHEN status='izin' THEN 1 ELSE 0 END) as izin"),
                DB::raw("SUM(CASE WHEN status='sakit' THEN 1 ELSE 0 END) as sakit"),
                DB::raw("SUM(CASE WHEN status='alpha' THEN 1 ELSE 0 END) as alpha"),
                DB::raw("COUNT(*) as total")
            )->first();

        $persentase = $rekap->total > 0
            ? round(($rekap->hadir / $rekap->total) * 100, 2) : 0;

        $existing = DB::table('rekap_absensi')
            ->where('mahasiswa_id', $mahasiswa_id)
            ->where('jadwal_id', $jadwal_id)->first();

        if ($existing) {
            DB::table('rekap_absensi')->where('id', $existing->id)->update([
                'total_hadir'      => $rekap->hadir,
                'total_izin'       => $rekap->izin,
                'total_sakit'      => $rekap->sakit,
                'total_alpha'      => $rekap->alpha,
                'persentase_hadir' => $persentase,
                'updated_at'       => now(),
            ]);
        } else {
            DB::table('rekap_absensi')->insert([
                'mahasiswa_id'     => $mahasiswa_id,
                'jadwal_id'        => $jadwal_id,
                'total_hadir'      => $rekap->hadir,
                'total_izin'       => $rekap->izin,
                'total_sakit'      => $rekap->sakit,
                'total_alpha'      => $rekap->alpha,
                'persentase_hadir' => $persentase,
                'created_at'       => now(),
                'updated_at'       => now(),
            ]);
        }

        if ($persentase < 75) {
            DB::table('notifikasi_peringatan')->insert([
                'mahasiswa_id'  => $mahasiswa_id,
                'jadwal_id'     => $jadwal_id,
                'pesan'         => "Peringatan! Kehadiran Anda hanya {$persentase}%. Minimal kehadiran adalah 75%.",
                'tanggal_kirim' => now(),
                'status_baca'   => 'Belum',
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }
    }
}