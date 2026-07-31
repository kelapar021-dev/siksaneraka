<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MataKuliahController extends Controller
{
    public function index()
    {
        $matkul = DB::table('mata_kuliah')->get();
        return view('matkul.index', compact('matkul'));
    }

    public function create()
    {
        return view('matkul.create');
    }

    public function store(Request $request)
    {
        DB::table('mata_kuliah')->insert([
            'kode_mk'   => $request->kode_mk,
            'nama'      => $request->nama,
            'sks'       => $request->sks,
            'semester'  => $request->semester,
            'prodi'     => $request->prodi,
            'created_at'=> now(),
            'updated_at'=> now(),
        ]);
        return redirect()->route('matkul.index')->with('success', 'Mata kuliah berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $matkul = DB::table('mata_kuliah')->where('id', $id)->first();
        return view('matkul.edit', compact('matkul'));
    }

    public function update(Request $request, $id)
    {
        DB::table('mata_kuliah')->where('id', $id)->update([
            'kode_mk'   => $request->kode_mk,
            'nama'      => $request->nama,
            'sks'       => $request->sks,
            'semester'  => $request->semester,
            'prodi'     => $request->prodi,
            'updated_at'=> now(),
        ]);
        return redirect()->route('matkul.index')->with('success', 'Mata kuliah berhasil diupdate!');
    }

    public function destroy($id)
    {
        DB::table('mata_kuliah')->where('id', $id)->delete();
        return redirect()->route('matkul.index')->with('success', 'Mata kuliah berhasil dihapus!');
    }
}