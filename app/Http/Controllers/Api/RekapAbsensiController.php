<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekapAbsensiController extends Controller
{
    public function index(Request $request)
    {
        $mahasiswaId = $request->get('mahasiswa_id');

        $rekap = DB::table('rekap_absensi as r')
            ->join('jadwal_kuliah as j', 'r.jadwal_id', '=', 'j.id')
            ->join('mata_kuliah as mk', 'j.mata_kuliah_id', '=', 'mk.id')
            ->join('dosen as d', 'j.dosen_id', '=', 'd.id')
            ->join('mahasiswa as m', 'r.mahasiswa_id', '=', 'm.id')
            ->where('r.mahasiswa_id', $mahasiswaId)
            ->select(
                'r.*',
                'm.nim',
                'm.nama as nama_mahasiswa',
                'm.prodi',
                'mk.nama as nama_matkul',
                'mk.sks',
                'd.nama as nama_dosen',
                'j.hari',
                'j.jam_mulai'
            )
            ->orderBy('mk.nama')
            ->get();

        return response()->json(['data' => $rekap]);
    }
}
