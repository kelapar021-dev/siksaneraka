<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = DB::table('dosen')->get();
        return view('dosen.index', compact('dosen'));
    }

    public function create()
    {
        return view('dosen.create');
    }

    public function store(Request $request)
    {
        DB::table('dosen')->insert([
            'nip'       => $request->nip,
            'nama'      => $request->nama,
            'prodi'     => $request->prodi,
            'jabatan'   => $request->jabatan,
            'email'     => $request->email,
            'no_hp'     => $request->no_hp,
            'created_at'=> now(),
            'updated_at'=> now(),
        ]);
        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $dosen = DB::table('dosen')->where('id', $id)->first();
        return view('dosen.edit', compact('dosen'));
    }

    public function update(Request $request, $id)
    {
        DB::table('dosen')->where('id', $id)->update([
            'nip'       => $request->nip,
            'nama'      => $request->nama,
            'prodi'     => $request->prodi,
            'jabatan'   => $request->jabatan,
            'email'     => $request->email,
            'no_hp'     => $request->no_hp,
            'updated_at'=> now(),
        ]);
        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil diupdate!');
    }

    public function destroy($id)
    {
        DB::table('dosen')->where('id', $id)->delete();
        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil dihapus!');
    }
}