<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        if (session('user_role') === 'mahasiswa') {
            $mahasiswa = Mahasiswa::where('id', session('mahasiswa_id'))->get();
        } else {
            $mahasiswa = Mahasiswa::all();
        }
        return view('data-mahasiswa', compact('mahasiswa'));
    }

    public function create()
    {
        // PERBAIKAN: Menambahkan huruf 'm' yang hilang
        return view('create-mahasiswa');
    }

    public function store(Request $request)
    {
        if (session('user_role') === 'mahasiswa') abort(403);

        Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'prodi' => $request->prodi,
            'fakultas' => $request->fakultas,
            'semester' => $request->semester,
            'ipk' => $request->ipk,
            'agama' => $request->agama,
            'status' => $request->status,
            'asal_sekolah' => $request->asal_sekolah,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
        ]);

        return redirect('data-mahasiswa');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('edit-mahasiswa', compact('mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        if (session('user_role') === 'mahasiswa') abort(403);

        $mahasiswa = Mahasiswa::find($id);

        $mahasiswa->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'prodi' => $request->prodi,
            'fakultas' => $request->fakultas,
            'semester' => $request->semester,
            'ipk' => $request->ipk,
            'agama' => $request->agama,
            'status' => $request->status,
            'asal_sekolah' => $request->asal_sekolah,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
        ]);

        return redirect('data-mahasiswa');
    }

    public function destroy($id)
    {
        if (session('user_role') === 'mahasiswa') abort(403);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        // Konsisten menggunakan path URL
        return redirect('data-mahasiswa');
    }
}