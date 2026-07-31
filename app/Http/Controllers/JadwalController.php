<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = DB::table('jadwal_kuliah')
            ->join('mata_kuliah', 'jadwal_kuliah.mata_kuliah_id', '=', 'mata_kuliah.id')
            ->join('dosen', 'jadwal_kuliah.dosen_id', '=', 'dosen.id')
            ->join('ruangan', 'jadwal_kuliah.ruangan_id', '=', 'ruangan.id')
            ->join('tahun_akademik', 'jadwal_kuliah.tahun_akademik_id', '=', 'tahun_akademik.id')
            ->select('jadwal_kuliah.*',
                'mata_kuliah.nama as nama_matkul',
                'mata_kuliah.kode_mk',
                'mata_kuliah.sks',
                'dosen.nama as nama_dosen',
                'ruangan.nama as nama_ruangan',
                'tahun_akademik.tahun',
                'tahun_akademik.semester'
            )->get();

        return view('jadwal.index', compact('jadwal'));
    }

    public function create()
    {
        $matkul   = DB::table('mata_kuliah')->get();
        $dosen    = DB::table('dosen')->get();
        $ruangan  = DB::table('ruangan')->get();
        $tahun_ak = DB::table('tahun_akademik')->get();
        return view('jadwal.create', compact('matkul', 'dosen', 'ruangan', 'tahun_ak'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mata_kuliah_id'    => 'required|integer',
            'dosen_id'          => 'required|integer',
            'ruangan_id'        => 'required|integer',
            'tahun_akademik_id' => 'required|integer',
            'hari'              => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu',
            'jam_mulai'         => 'required',
            'jam_selesai'       => 'required',
        ]);

        DB::table('jadwal_kuliah')->insert([
            'mata_kuliah_id'    => $request->mata_kuliah_id,
            'dosen_id'          => $request->dosen_id,
            'ruangan_id'        => $request->ruangan_id,
            'tahun_akademik_id' => $request->tahun_akademik_id,
            'hari'              => $request->hari,
            'jam_mulai'         => $request->jam_mulai,
            'jam_selesai'       => $request->jam_selesai,
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan!');
    }

    // ✅ TAMBAH
    public function edit($id)
    {
        $jadwal = DB::table('jadwal_kuliah')->where('id', $id)->first();

        if (!$jadwal) {
            return redirect()->route('jadwal.index')->with('error', 'Jadwal tidak ditemukan!');
        }

        $matkul   = DB::table('mata_kuliah')->get();
        $dosen    = DB::table('dosen')->get();
        $ruangan  = DB::table('ruangan')->get();
        $tahun_ak = DB::table('tahun_akademik')->get();

        return view('jadwal.edit', compact('jadwal', 'matkul', 'dosen', 'ruangan', 'tahun_ak'));
    }

    // ✅ TAMBAH
    public function update(Request $request, $id)
    {
        $request->validate([
            'mata_kuliah_id'    => 'required|integer',
            'dosen_id'          => 'required|integer',
            'ruangan_id'        => 'required|integer',
            'tahun_akademik_id' => 'required|integer',
            'hari'              => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu',
            'jam_mulai'         => 'required',
            'jam_selesai'       => 'required',
        ]);

        DB::table('jadwal_kuliah')->where('id', $id)->update([
            'mata_kuliah_id'    => $request->mata_kuliah_id,
            'dosen_id'          => $request->dosen_id,
            'ruangan_id'        => $request->ruangan_id,
            'tahun_akademik_id' => $request->tahun_akademik_id,
            'hari'              => $request->hari,
            'jam_mulai'         => $request->jam_mulai,
            'jam_selesai'       => $request->jam_selesai,
            'updated_at'        => now(),
        ]);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui!');
    }

    public function destroy($id)
    {
        DB::table('jadwal_kuliah')->where('id', $id)->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus!');
    }
}