<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KrsController extends Controller
{
    public function index(Request $request)
    {
        $mahasiswaId = $request->get('mahasiswa_id');

        $krs = DB::table('krs')
            ->join('mahasiswa', 'krs.mahasiswa_id', '=', 'mahasiswa.id')
            ->join('mata_kuliah', 'krs.mata_kuliah_id', '=', 'mata_kuliah.id')
            ->join('jadwal_kuliah', 'krs.jadwal_id', '=', 'jadwal_kuliah.id')
            ->join('dosen', 'jadwal_kuliah.dosen_id', '=', 'dosen.id')
            ->join('tahun_akademik', 'krs.tahun_akademik_id', '=', 'tahun_akademik.id')
            ->where('krs.mahasiswa_id', $mahasiswaId)
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
            ->orderBy('krs.created_at', 'desc')
            ->get();

        return response()->json(['data' => $krs]);
    }

    public function jadwalTersedia(Request $request)
    {
        $mahasiswaId = $request->get('mahasiswa_id');
        $mahasiswa = DB::table('mahasiswa')->where('id', $mahasiswaId)->first();

        $jadwal = DB::table('jadwal_kuliah')
            ->join('mata_kuliah', 'jadwal_kuliah.mata_kuliah_id', '=', 'mata_kuliah.id')
            ->join('dosen', 'jadwal_kuliah.dosen_id', '=', 'dosen.id')
            ->join('ruangan', 'jadwal_kuliah.ruangan_id', '=', 'ruangan.id')
            ->select(
                'jadwal_kuliah.*',
                'mata_kuliah.nama as nama_matkul',
                'mata_kuliah.kode_mk',
                'mata_kuliah.sks',
                'mata_kuliah.semester',
                'mata_kuliah.id as matkul_id',
                'dosen.nama as nama_dosen',
                'ruangan.nama as nama_ruangan'
            )
            ->get();

        $tahunAktif = DB::table('tahun_akademik')
            ->where('status_aktif', 'Aktif')
            ->first();

        return response()->json([
            'data' => $jadwal,
            'tahun_akademik' => $tahunAktif,
            'mahasiswa' => $mahasiswa,
        ]);
    }

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
            $exists = DB::table('krs')
                ->where('mahasiswa_id', $request->mahasiswa_id)
                ->where('jadwal_id', $jadwalId)
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

        return response()->json([
            'message'  => $inserted . ' KRS berhasil diajukan!' . ($skipped > 0 ? " ($skipped dilewati karena sudah ada)" : ''),
            'inserted' => $inserted,
            'skipped'  => $skipped,
        ]);
    }

    public function show(Request $request, $id)
    {
        $krs = DB::table('krs')
            ->join('mahasiswa', 'krs.mahasiswa_id', '=', 'mahasiswa.id')
            ->join('mata_kuliah', 'krs.mata_kuliah_id', '=', 'mata_kuliah.id')
            ->join('jadwal_kuliah', 'krs.jadwal_id', '=', 'jadwal_kuliah.id')
            ->join('dosen', 'jadwal_kuliah.dosen_id', '=', 'dosen.id')
            ->join('tahun_akademik', 'krs.tahun_akademik_id', '=', 'tahun_akademik.id')
            ->where('krs.id', $id)
            ->where('krs.mahasiswa_id', $request->get('mahasiswa_id'))
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
            ->first();

        if (!$krs) {
            return response()->json(['message' => 'KRS tidak ditemukan'], 404);
        }

        return response()->json(['data' => $krs]);
    }

    public function destroy(Request $request, $id)
    {
        $krs = DB::table('krs')
            ->where('id', $id)
            ->where('mahasiswa_id', $request->get('mahasiswa_id'))
            ->first();

        if (!$krs) {
            return response()->json(['message' => 'KRS tidak ditemukan'], 404);
        }

        DB::table('krs')->where('id', $id)->delete();

        return response()->json(['message' => 'KRS berhasil dihapus']);
    }
}
