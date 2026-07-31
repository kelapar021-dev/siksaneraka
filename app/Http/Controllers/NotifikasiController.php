<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotifikasiController extends Controller
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

            $notifikasi = DB::table('notifikasi_peringatan as n')
                ->join('mahasiswa as m', 'n.mahasiswa_id', '=', 'm.id')
                ->join('jadwal_kuliah as j', 'n.jadwal_id', '=', 'j.id')
                ->join('mata_kuliah as mk', 'j.mata_kuliah_id', '=', 'mk.id')
                ->where('n.mahasiswa_id', $mahasiswaId ?? 0)
                ->select(
                    'n.*',
                    'm.nim',
                    'm.nama as nama_mahasiswa',
                    'mk.nama as nama_matkul'
                )
                ->orderByDesc('n.tanggal_kirim')
                ->get();

        }

        // ==========================
        // DOSEN
        // ==========================
        elseif ($userRole === 'dosen') {

            $notifikasi = DB::table('notifikasi_peringatan as n')
                ->join('mahasiswa as m', 'n.mahasiswa_id', '=', 'm.id')
                ->join('jadwal_kuliah as j', 'n.jadwal_id', '=', 'j.id')
                ->join('mata_kuliah as mk', 'j.mata_kuliah_id', '=', 'mk.id')
                ->where('j.dosen_id', $dosenId ?? 0)
                ->select(
                    'n.*',
                    'm.nim',
                    'm.nama as nama_mahasiswa',
                    'mk.nama as nama_matkul'
                )
                ->orderByDesc('n.tanggal_kirim')
                ->get();

        }

        // ==========================
        // ADMIN
        // ==========================
        else {

            $notifikasi = DB::table('notifikasi_peringatan as n')
                ->join('mahasiswa as m', 'n.mahasiswa_id', '=', 'm.id')
                ->join('jadwal_kuliah as j', 'n.jadwal_id', '=', 'j.id')
                ->join('mata_kuliah as mk', 'j.mata_kuliah_id', '=', 'mk.id')
                ->select(
                    'n.*',
                    'm.nim',
                    'm.nama as nama_mahasiswa',
                    'mk.nama as nama_matkul'
                )
                ->orderByDesc('n.tanggal_kirim')
                ->get();

        }

        $belumBaca = $notifikasi->where('status_baca', 'Belum')->count();

        return view('notifikasi.index', compact(
            'notifikasi',
            'belumBaca',
            'userRole'
        ));
    }

    public function baca($id)
    {
        DB::table('notifikasi_peringatan')
            ->where('id', $id)
            ->update([
                'status_baca' => 'Sudah',
                'updated_at' => now()
            ]);

        return redirect()->route('notifikasi.index')
            ->with('success', 'Notifikasi ditandai sudah dibaca.');
    }

    public function create()
    {
        if (session('user_role') === 'admin') abort(403);

        $mahasiswa = DB::table('mahasiswa')->get();

        $jadwal = DB::table('jadwal_kuliah as j')
            ->join('mata_kuliah as mk', 'j.mata_kuliah_id', '=', 'mk.id')
            ->select(
                'j.id',
                'mk.nama as nama_matkul'
            )
            ->get();

        return view('notifikasi.create', compact(
            'mahasiswa',
            'jadwal'
        ));
    }

    public function store(Request $request)
    {
        if (session('user_role') === 'admin') abort(403);

        DB::table('notifikasi_peringatan')->insert([
            'mahasiswa_id'  => $request->mahasiswa_id,
            'jadwal_id'     => $request->jadwal_id,
            'pesan'         => $request->pesan,
            'tanggal_kirim' => now(),
            'status_baca'   => 'Belum',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        return redirect()->route('notifikasi.index')
            ->with('success', 'Notifikasi berhasil dikirim!');
    }

    public function edit($id)
    {
        if (session('user_role') === 'admin') abort(403);

        $notifikasi = DB::table('notifikasi_peringatan')
            ->where('id', $id)
            ->first();

        $mahasiswa = DB::table('mahasiswa')->get();

        $jadwal = DB::table('jadwal_kuliah as j')
            ->join('mata_kuliah as mk', 'j.mata_kuliah_id', '=', 'mk.id')
            ->select(
                'j.id',
                'mk.nama as nama_matkul'
            )
            ->get();

        return view('notifikasi.edit', compact(
            'notifikasi',
            'mahasiswa',
            'jadwal'
        ));
    }

    public function update(Request $request, $id)
    {
        if (session('user_role') === 'admin') abort(403);

        DB::table('notifikasi_peringatan')
            ->where('id', $id)
            ->update([
                'pesan' => $request->pesan,
                'updated_at' => now(),
            ]);

        return redirect()->route('notifikasi.index')
            ->with('success', 'Notifikasi berhasil diupdate!');
    }

    public function destroy($id)
    {
        DB::table('notifikasi_peringatan')
            ->where('id', $id)
            ->delete();

        return redirect()->route('notifikasi.index')
            ->with('success', 'Notifikasi berhasil dihapus!');
    }
}