<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KrsController extends Controller
{
    public function index()
    {
        $query = DB::table('krs')
            ->join('mahasiswa', 'krs.mahasiswa_id', '=', 'mahasiswa.id')
            ->join('mata_kuliah', 'krs.mata_kuliah_id', '=', 'mata_kuliah.id')
            ->join('jadwal_kuliah', 'krs.jadwal_id', '=', 'jadwal_kuliah.id')
            ->join('dosen', 'jadwal_kuliah.dosen_id', '=', 'dosen.id')
            ->join('tahun_akademik', 'krs.tahun_akademik_id', '=', 'tahun_akademik.id')
            ->select(
                'krs.*',
                'mahasiswa.nama as nama_mahasiswa',
                'mahasiswa.nim',
                'mahasiswa.prodi',
                'mata_kuliah.nama as nama_matkul',
                'mata_kuliah.kode_mk',
                'mata_kuliah.sks',
                'dosen.nama as nama_dosen',
                'jadwal_kuliah.hari',
                'jadwal_kuliah.jam_mulai',
                'jadwal_kuliah.jam_selesai',
                'tahun_akademik.tahun',
                'tahun_akademik.semester as semester_tahun'
            )
            ->orderBy('krs.created_at', 'desc');

        if (session('user_role') === 'mahasiswa') {
            $query->where('krs.mahasiswa_id', session('mahasiswa_id'));
        }

        $krs = $query->get();

        return view('krs.index', compact('krs'));
    }

    public function create()
    {
        $mahasiswa = DB::table('mahasiswa')->get();

        // Ambil semua jadwal beserta info mata kuliah, dosen, ruangan
        // PENTING: pastikan tabel mata_kuliah memiliki kolom 'semester' (integer)
        // Jika belum ada, jalankan migration:
        //   Schema::table('mata_kuliah', fn($t) => $t->integer('semester')->default(1));
        $jadwal = DB::table('jadwal_kuliah')
            ->join('mata_kuliah', 'jadwal_kuliah.mata_kuliah_id', '=', 'mata_kuliah.id')
            ->join('dosen', 'jadwal_kuliah.dosen_id', '=', 'dosen.id')
            ->join('ruangan', 'jadwal_kuliah.ruangan_id', '=', 'ruangan.id')
            ->select(
                'jadwal_kuliah.*',
                'mata_kuliah.nama as nama_matkul',
                'mata_kuliah.kode_mk',
                'mata_kuliah.sks',
                'mata_kuliah.semester',      // <-- kolom semester di mata_kuliah
                'mata_kuliah.id as matkul_id',
                'dosen.nama as nama_dosen',
                'ruangan.nama as nama_ruangan'
            )
            ->get();

        $tahun_ak = DB::table('tahun_akademik')
            ->where('status_aktif', 'Aktif')
            ->get();

        return view('krs.create', compact('mahasiswa', 'jadwal', 'tahun_ak'));
    }

    /**
     * Store — menerima array jadwal_ids[] untuk multi-mata-kuliah
     */
    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id'      => 'required',
            'tahun_akademik_id' => 'required',
            'semester'          => 'required|integer',
            'jadwal_ids'        => 'required|array|min:1',
            'jadwal_ids.*'      => 'required|integer',
        ]);

        $inserted = 0;
        $skipped  = 0;

        foreach ($request->jadwal_ids as $jadwalId) {
            // Cek duplikat per jadwal
            $exists = DB::table('krs')
                ->where('mahasiswa_id',      $request->mahasiswa_id)
                ->where('jadwal_id',         $jadwalId)
                ->where('tahun_akademik_id', $request->tahun_akademik_id)
                ->exists();

            if ($exists) {
                $skipped++;
                continue;
            }

            $jadwal = DB::table('jadwal_kuliah')->where('id', $jadwalId)->first();
            if (!$jadwal) continue;

            DB::table('krs')->insert([
                'mahasiswa_id'      => $request->mahasiswa_id,
                'mata_kuliah_id'    => $jadwal->mata_kuliah_id,
                'jadwal_id'         => $jadwalId,
                'tahun_akademik_id' => $request->tahun_akademik_id,
                'semester'          => $request->semester,
                'status'            => 'Diajukan',
                'keterangan'        => null,
                'created_at'        => now(),
                'updated_at'        => now(),
            ]);

            $inserted++;
        }

        if ($inserted === 0 && $skipped > 0) {
            return back()->with('error', 'Semua mata kuliah yang dipilih sudah pernah diajukan sebelumnya.');
        }

        $pesan = $inserted . ' KRS berhasil diajukan!';
        if ($skipped > 0) $pesan .= ' (' . $skipped . ' mata kuliah dilewati karena sudah ada.)';

        return redirect()->route('krs.index')->with('success', $pesan);
    }

    public function updateStatus(Request $request, $id)
    {
        DB::table('krs')->where('id', $id)->update([
            'status'     => $request->status,
            'keterangan' => $request->keterangan,
            'updated_at' => now(),
        ]);

        $pesan = $request->status === 'Disetujui' ? 'KRS berhasil disetujui!' : 'KRS ditolak!';
        return redirect()->route('krs.index')->with('success', $pesan);
    }

    public function destroy($id)
    {
        DB::table('krs')->where('id', $id)->delete();
        return redirect()->route('krs.index')->with('success', 'KRS berhasil dihapus!');
    }
}