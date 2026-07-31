<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekapAbsensiController extends Controller
{
    public function index()
    {
        $userRole    = session('user_role');
        $mahasiswaId = session('mahasiswa_id');
        $dosenId     = session('dosen_id');

        // ==========================
        // MAHASISWA
        // ==========================
        if ($userRole === 'mahasiswa') {

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

        }

        // ==========================
        // DOSEN
        // ==========================
        elseif ($userRole === 'dosen') {

            $rekap = DB::table('rekap_absensi as r')
                ->join('jadwal_kuliah as j', 'r.jadwal_id', '=', 'j.id')
                ->join('mata_kuliah as mk', 'j.mata_kuliah_id', '=', 'mk.id')
                ->join('mahasiswa as m', 'r.mahasiswa_id', '=', 'm.id')
                ->join('dosen as d', 'j.dosen_id', '=', 'd.id')
                ->where('j.dosen_id', $dosenId)
                ->select(
                    'r.*',
                    'm.nim',
                    'm.nama as nama_mahasiswa',
                    'm.prodi',
                    'mk.nama as nama_matkul',
                    'd.nama as nama_dosen',
                    'j.hari',
                    'j.jam_mulai'
                )
                ->orderBy('mk.nama')
                ->orderBy('m.nama')
                ->get();

        }

        // ==========================
        // ADMIN
        // ==========================
        else {

            $rekap = DB::table('rekap_absensi as r')
                ->join('jadwal_kuliah as j', 'r.jadwal_id', '=', 'j.id')
                ->join('mata_kuliah as mk', 'j.mata_kuliah_id', '=', 'mk.id')
                ->join('mahasiswa as m', 'r.mahasiswa_id', '=', 'm.id')
                ->join('dosen as d', 'j.dosen_id', '=', 'd.id')
                ->select(
                    'r.*',
                    'm.nim',
                    'm.nama as nama_mahasiswa',
                    'm.prodi',
                    'mk.nama as nama_matkul',
                    'd.nama as nama_dosen',
                    'j.hari',
                    'j.jam_mulai'
                )
                ->orderBy('mk.nama')
                ->orderBy('m.nama')
                ->get();
        }

        return view('rekap.index', compact('rekap', 'userRole'));
    }
}