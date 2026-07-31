<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PenilaianAkademik;
use Illuminate\Http\Request;

class FuzzyController extends Controller
{
    public function index(Request $request)
    {
        $mahasiswaId = $request->get('mahasiswa_id');

        $data = PenilaianAkademik::query()
            ->join('mahasiswa', 'penilaian_akademik.mahasiswa_id', '=', 'mahasiswa.id')
            ->join('jadwal_kuliah', 'penilaian_akademik.jadwal_id', '=', 'jadwal_kuliah.id')
            ->join('mata_kuliah', 'jadwal_kuliah.mata_kuliah_id', '=', 'mata_kuliah.id')
            ->where('penilaian_akademik.mahasiswa_id', $mahasiswaId)
            ->select(
                'penilaian_akademik.*',
                'mahasiswa.nama as nama_mahasiswa',
                'mahasiswa.nim',
                'mata_kuliah.nama as nama_matkul',
                'mata_kuliah.kode_mk'
            )
            ->orderBy('penilaian_akademik.created_at', 'desc')
            ->get();

        return response()->json(['data' => $data]);
    }

    public function show(Request $request, $id)
    {
        $mahasiswaId = $request->get('mahasiswa_id');

        $data = PenilaianAkademik::query()
            ->join('mahasiswa', 'penilaian_akademik.mahasiswa_id', '=', 'mahasiswa.id')
            ->join('jadwal_kuliah', 'penilaian_akademik.jadwal_id', '=', 'jadwal_kuliah.id')
            ->join('mata_kuliah', 'jadwal_kuliah.mata_kuliah_id', '=', 'mata_kuliah.id')
            ->where('penilaian_akademik.id', $id)
            ->where('penilaian_akademik.mahasiswa_id', $mahasiswaId)
            ->select(
                'penilaian_akademik.*',
                'mahasiswa.nama as nama_mahasiswa',
                'mahasiswa.nim',
                'mata_kuliah.nama as nama_matkul',
                'mata_kuliah.kode_mk'
            )
            ->first();

        if (!$data) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json(['data' => $data]);
    }
}
