<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PertemuanController extends Controller
{
    public function index()
    {
        $userRole = session('user_role');
        $userId   = session('user_id');

        if ($userRole === 'dosen') {
            $dosen = DB::table('dosen')->where('user_id', $userId)->first();
            $pertemuan = DB::table('pertemuan as p')
                ->join('jadwal_kuliah as j', 'p.jadwal_id', '=', 'j.id')
                ->join('mata_kuliah as mk', 'j.mata_kuliah_id', '=', 'mk.id')
                ->where('j.dosen_id', $dosen->id ?? 0)
                ->select('p.*', 'mk.nama as matkul', 'j.hari', 'j.jam_mulai')
                ->orderByDesc('p.tanggal')
                ->get();
        } else {
            $pertemuan = DB::table('pertemuan as p')
                ->join('jadwal_kuliah as j', 'p.jadwal_id', '=', 'j.id')
                ->join('mata_kuliah as mk', 'j.mata_kuliah_id', '=', 'mk.id')
                ->join('dosen as d', 'j.dosen_id', '=', 'd.id')
                ->select('p.*', 'mk.nama as matkul', 'd.nama as dosen',
                         'j.hari', 'j.jam_mulai')
                ->orderByDesc('p.tanggal')
                ->get();
        }

        return view('pertemuan.index', compact('pertemuan'));
    }

    public function create()
    {
        $userId   = session('user_id');
        $userRole = session('user_role');

        if ($userRole === 'dosen') {
            $dosen = DB::table('dosen')->where('user_id', $userId)->first();
            $jadwals = DB::table('jadwal_kuliah as j')
                ->join('mata_kuliah as mk', 'j.mata_kuliah_id', '=', 'mk.id')
                ->where('j.dosen_id', $dosen->id ?? 0)
                ->select('j.id', 'mk.nama as matkul', 'j.hari', 'j.jam_mulai')
                ->get();
        } else {
            $jadwals = DB::table('jadwal_kuliah as j')
                ->join('mata_kuliah as mk', 'j.mata_kuliah_id', '=', 'mk.id')
                ->select('j.id', 'mk.nama as matkul', 'j.hari', 'j.jam_mulai')
                ->get();
        }

        return view('pertemuan.create', compact('jadwals'));
    }

    public function store(Request $request)
    {
        // Hitung pertemuan ke berapa otomatis
        $pertemuanKe = DB::table('pertemuan')
            ->where('jadwal_id', $request->jadwal_id)
            ->count() + 1;

        DB::table('pertemuan')->insert([
            'jadwal_id'        => $request->jadwal_id,
            'pertemuan_ke'     => $pertemuanKe,
            'tanggal'          => $request->tanggal,
            'topik'            => $request->topik,
            'status_pertemuan' => $request->status_pertemuan ?? 'berlangsung',
            'created_at'       => now(),
            'updated_at'       => now(),
        ]);

        return redirect()->route('pertemuan.index')
            ->with('success', 'Pertemuan berhasil ditambahkan.');
    }

    public function show($id)
    {
        $pertemuan = DB::table('pertemuan as p')
            ->join('jadwal_kuliah as j', 'p.jadwal_id', '=', 'j.id')
            ->join('mata_kuliah as mk', 'j.mata_kuliah_id', '=', 'mk.id')
            ->join('dosen as d', 'j.dosen_id', '=', 'd.id')
            ->join('ruangan as r', 'j.ruangan_id', '=', 'r.id')
            ->where('p.id', $id)
            ->select('p.*', 'mk.nama as matkul', 'd.nama as dosen',
                     'r.nama as ruangan', 'j.hari', 'j.jam_mulai', 'j.jam_selesai')
            ->first();

        if (!$pertemuan) {
            return redirect()->route('pertemuan.index')
                ->with('error', 'Pertemuan tidak ditemukan.');
        }

        // Daftar absensi pertemuan ini
        $absensi = DB::table('absensi as a')
            ->join('mahasiswa as m', 'a.mahasiswa_id', '=', 'm.id')
            ->where('a.pertemuan_id', $id)
            ->select('m.nim', 'm.nama', 'a.status', 'a.metode', 'a.waktu_absen')
            ->get();

        // Statistik
        $statistik = [
            'hadir' => $absensi->where('status', 'hadir')->count(),
            'izin'  => $absensi->whereIn('status', ['izin', 'sakit'])->count(),
            'alpha' => $absensi->where('status', 'alpha')->count(),
            'total' => $absensi->count(),
        ];

        return view('pertemuan.show', compact('pertemuan', 'absensi', 'statistik'));
    }

    public function edit($id)
    {
        $pertemuan = DB::table('pertemuan')->where('id', $id)->first();

        if (!$pertemuan) {
            return redirect()->route('pertemuan.index')
                ->with('error', 'Pertemuan tidak ditemukan.');
        }

        $jadwals = DB::table('jadwal_kuliah as j')
            ->join('mata_kuliah as mk', 'j.mata_kuliah_id', '=', 'mk.id')
            ->select('j.id', 'mk.nama as matkul', 'j.hari', 'j.jam_mulai')
            ->get();

        $statusList = ['berlangsung', 'selesai', 'dibatalkan', 'libur'];

        return view('pertemuan.edit', compact('pertemuan', 'jadwals', 'statusList'));
    }

    public function update(Request $request, $id)
    {
        DB::table('pertemuan')->where('id', $id)->update([
            'jadwal_id'        => $request->jadwal_id,
            'tanggal'          => $request->tanggal,
            'topik'            => $request->topik,
            'status_pertemuan' => $request->status_pertemuan,
            'updated_at'       => now(),
        ]);

        return redirect()->route('pertemuan.index')
            ->with('success', 'Pertemuan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus absensi terkait dulu
        DB::table('absensi')->where('pertemuan_id', $id)->delete();
        DB::table('pertemuan')->where('id', $id)->delete();

        return redirect()->route('pertemuan.index')
            ->with('success', 'Pertemuan berhasil dihapus.');
    }
}