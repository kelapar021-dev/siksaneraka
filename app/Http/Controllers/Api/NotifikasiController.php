<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotifikasiController extends Controller
{
    public function index(Request $request)
    {
        $mahasiswaId = $request->get('mahasiswa_id');

        $notifikasi = DB::table('notifikasi_peringatan as n')
            ->join('mahasiswa as m', 'n.mahasiswa_id', '=', 'm.id')
            ->join('jadwal_kuliah as j', 'n.jadwal_id', '=', 'j.id')
            ->join('mata_kuliah as mk', 'j.mata_kuliah_id', '=', 'mk.id')
            ->where('n.mahasiswa_id', $mahasiswaId)
            ->select(
                'n.*',
                'm.nim',
                'm.nama as nama_mahasiswa',
                'mk.nama as nama_matkul'
            )
            ->orderByDesc('n.tanggal_kirim')
            ->get();

        $belumBaca = $notifikasi->where('status_baca', 'Belum')->count();

        return response()->json([
            'data'       => $notifikasi,
            'belum_baca' => $belumBaca,
        ]);
    }

    public function baca(Request $request, $id)
    {
        DB::table('notifikasi_peringatan')
            ->where('id', $id)
            ->update([
                'status_baca' => 'Sudah',
                'updated_at'  => now(),
            ]);

        return response()->json(['message' => 'Notifikasi ditandai sudah dibaca']);
    }
}
