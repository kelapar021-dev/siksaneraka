<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RuanganController extends Controller
{
    public function index()
    {
        $ruangan = DB::table('ruangan')->get();
        return view('ruangan.index', compact('ruangan'));
    }

    public function create()
    {
        return view('ruangan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode'      => 'required|string|max:20',
            'nama'      => 'required|string|max:100',
            'kapasitas' => 'required|integer|min:1',
            'gedung'    => 'nullable|string|max:100',
        ]);

        DB::table('ruangan')->insert([
            'kode'      => $request->kode,
            'nama'      => $request->nama,
            'kapasitas' => $request->kapasitas,
            'gedung'    => $request->gedung,
            'created_at'=> now(),
            'updated_at'=> now(),
        ]);

        return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $ruangan = DB::table('ruangan')->where('id', $id)->first();

        if (!$ruangan) {
            return redirect()->route('ruangan.index')->with('error', 'Ruangan tidak ditemukan!');
        }

        return view('ruangan.edit', compact('ruangan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode'      => 'required|string|max:20',
            'nama'      => 'required|string|max:100',
            'kapasitas' => 'required|integer|min:1',
            'gedung'    => 'nullable|string|max:100',
        ]);

        DB::table('ruangan')->where('id', $id)->update([
            'kode'      => $request->kode,
            'nama'      => $request->nama,
            'kapasitas' => $request->kapasitas,
            'gedung'    => $request->gedung,
            'updated_at'=> now(),
        ]);

        return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        DB::table('ruangan')->where('id', $id)->delete();
        return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil dihapus!');
    }
}