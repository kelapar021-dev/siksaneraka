<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalController extends Controller
{
    public function index(Request $request)
    {
        $mahasiswaId = $request->get('mahasiswa_id');

        $krsIds = DB::table('krs')
            ->where('mahasiswa_id', $mahasiswaId)
            ->whereIn('status', ['Diajukan', 'Disetujui'])
            ->pluck('jadwal_id');

        $jadwal = DB::table('jadwal_kuliah')
            ->join('mata_kuliah', 'jadwal_kuliah.mata_kuliah_id', '=', 'mata_kuliah.id')
            ->join('dosen', 'jadwal_kuliah.dosen_id', '=', 'dosen.id')
            ->join('ruangan', 'jadwal_kuliah.ruangan_id', '=', 'ruangan.id')
            ->join('tahun_akademik', 'jadwal_kuliah.tahun_akademik_id', '=', 'tahun_akademik.id')
            ->whereIn('jadwal_kuliah.id', $krsIds)
            ->select(
                'jadwal_kuliah.*',
                'mata_kuliah.nama as nama_matkul',
                'mata_kuliah.kode_mk',
                'mata_kuliah.sks',
                'dosen.nama as nama_dosen',
                'ruangan.nama as nama_ruangan',
                'tahun_akademik.tahun',
                'tahun_akademik.semester'
            )
            ->get();

        return response()->json(['data' => $jadwal]);
    }
}
