<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TahunAkademikController extends Controller
{
    public function index()
    {
        $tahun = DB::table('tahun_akademik')->get();
        return view('tahun.index', compact('tahun'));
    }

    public function create()
    {
        return view('tahun.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun'        => 'required|string|max:20',
            'semester'     => 'required|in:Ganjil,Genap',
            'status_aktif' => 'required|in:Aktif,Tidak Aktif',
        ]);

        DB::table('tahun_akademik')->insert([
            'tahun'        => $request->tahun,
            'semester'     => $request->semester,
            'status_aktif' => $request->status_aktif,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        return redirect()->route('tahun.index')->with('success', 'Tahun akademik berhasil ditambahkan!');
    }

    // ✅ TAMBAH
    public function edit($id)
    {
        $tahun = DB::table('tahun_akademik')->where('id', $id)->first();

        if (!$tahun) {
            return redirect()->route('tahun.index')->with('error', 'Data tidak ditemukan!');
        }

        return view('tahun.edit', compact('tahun'));
    }

    // ✅ TAMBAH
    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun'        => 'required|string|max:20',
            'semester'     => 'required|in:Ganjil,Genap',
            'status_aktif' => 'required|in:Aktif,Tidak Aktif',
        ]);

        DB::table('tahun_akademik')->where('id', $id)->update([
            'tahun'        => $request->tahun,
            'semester'     => $request->semester,
            'status_aktif' => $request->status_aktif,
            'updated_at'   => now(),
        ]);

        return redirect()->route('tahun.index')->with('success', 'Tahun akademik berhasil diperbarui!');
    }

    public function destroy($id)
    {
        DB::table('tahun_akademik')->where('id', $id)->delete();
        return redirect()->route('tahun.index')->with('success', 'Tahun akademik berhasil dihapus!');
    }
}