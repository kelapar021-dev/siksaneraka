<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsensiController extends Controller
{
    public function index(Request $request)
    {
        $mahasiswaId = $request->get('mahasiswa_id');

        $absensi = DB::table('absensi')
            ->join('pertemuan', 'absensi.pertemuan_id', '=', 'pertemuan.id')
            ->join('jadwal_kuliah', 'pertemuan.jadwal_id', '=', 'jadwal_kuliah.id')
            ->join('mata_kuliah', 'jadwal_kuliah.mata_kuliah_id', '=', 'mata_kuliah.id')
            ->join('dosen', 'jadwal_kuliah.dosen_id', '=', 'dosen.id')
            ->join('mahasiswa', 'absensi.mahasiswa_id', '=', 'mahasiswa.id')
            ->where('absensi.mahasiswa_id', $mahasiswaId)
            ->select(
                'absensi.*',
                'mahasiswa.nama as nama_mahasiswa',
                'mahasiswa.nim',
                'mata_kuliah.nama as nama_matkul',
                'dosen.nama as nama_dosen',
                'pertemuan.pertemuan_ke',
                'pertemuan.tanggal',
                'pertemuan.topik'
            )
            ->orderBy('pertemuan.tanggal', 'desc')
            ->get();

        return response()->json(['data' => $absensi]);
    }
}
