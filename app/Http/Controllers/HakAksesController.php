<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HakAksesController extends Controller
{
    public function index()
    {
        // Hanya admin
        if (session('role') !== 'admin') {
            return redirect('data-mahasiswa')->with('error', 'Anda tidak memiliki akses!');
        }

        $hakAkses = DB::table('hak_akses')->get();
        // DIPERBAIKI: Menggunakan underscore agar sesuai dengan folder 'hak_akses'
        return view('hak_akses.index', compact('hakAkses'));
    }

    public function edit($id)
    {
        if (session('role') !== 'admin') {
            return redirect('data-mahasiswa')->with('error', 'Anda tidak memiliki akses!');
        }

        $data = DB::table('hak_akses')->where('id', $id)->first();
        // DIPERBAIKI: Menggunakan underscore agar sesuai dengan folder 'hak_akses'
        return view('hak_akses.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        if (session('role') !== 'admin') {
            return redirect('data-mahasiswa')->with('error', 'Anda tidak memiliki akses!');
        }

        DB::table('hak_akses')->where('id', $id)->update([
            'akses_mahasiswa'   => $request->has('akses_mahasiswa') ? 1 : 0,
            'tambah_mahasiswa'  => $request->has('tambah_mahasiswa') ? 1 : 0,
            'edit_mahasiswa'    => $request->has('edit_mahasiswa') ? 1 : 0,
            'hapus_mahasiswa'   => $request->has('hapus_mahasiswa') ? 1 : 0,
            'akses_dosen'       => $request->has('akses_dosen') ? 1 : 0,
            'tambah_dosen'      => $request->has('tambah_dosen') ? 1 : 0,
            'edit_dosen'        => $request->has('edit_dosen') ? 1 : 0,
            'hapus_dosen'       => $request->has('hapus_dosen') ? 1 : 0,
            'akses_matkul'      => $request->has('akses_matkul') ? 1 : 0,
            'tambah_matkul'     => $request->has('tambah_matkul') ? 1 : 0,
            'edit_matkul'       => $request->has('edit_matkul') ? 1 : 0,
            'hapus_matkul'      => $request->has('hapus_matkul') ? 1 : 0,
            'akses_ruangan'     => $request->has('akses_ruangan') ? 1 : 0,
            'tambah_ruangan'    => $request->has('tambah_ruangan') ? 1 : 0,
            'hapus_ruangan'     => $request->has('hapus_ruangan') ? 1 : 0,
            'akses_tahun'       => $request->has('akses_tahun') ? 1 : 0,
            'tambah_tahun'      => $request->has('tambah_tahun') ? 1 : 0,
            'hapus_tahun'       => $request->has('hapus_tahun') ? 1 : 0,
            'akses_jadwal'      => $request->has('akses_jadwal') ? 1 : 0,
            'tambah_jadwal'     => $request->has('tambah_jadwal') ? 1 : 0,
            'hapus_jadwal'      => $request->has('hapus_jadwal') ? 1 : 0,
            'akses_krs'         => $request->has('akses_krs') ? 1 : 0,
            'ajukan_krs'        => $request->has('ajukan_krs') ? 1 : 0,
            'setujui_krs'       => $request->has('setujui_krs') ? 1 : 0,
            'hapus_krs'         => $request->has('hapus_krs') ? 1 : 0,
            'akses_absensi'     => $request->has('akses_absensi') ? 1 : 0,
            'tambah_absensi'    => $request->has('tambah_absensi') ? 1 : 0,
            'edit_absensi'      => $request->has('edit_absensi') ? 1 : 0,
            'hapus_absensi'     => $request->has('hapus_absensi') ? 1 : 0,
            'akses_rekap'       => $request->has('akses_rekap') ? 1 : 0,
            'akses_notifikasi'  => $request->has('akses_notifikasi') ? 1 : 0,
            'akses_pembayaran'  => $request->has('akses_pembayaran') ? 1 : 0,
            'tambah_pembayaran' => $request->has('tambah_pembayaran') ? 1 : 0,
            'edit_pembayaran'   => $request->has('edit_pembayaran') ? 1 : 0,
            'hapus_pembayaran'  => $request->has('hapus_pembayaran') ? 1 : 0,
            'akses_nilai'       => $request->has('akses_nilai') ? 1 : 0,
            'tambah_nilai'      => $request->has('tambah_nilai') ? 1 : 0,
            'edit_nilai'        => $request->has('edit_nilai') ? 1 : 0,
            'hapus_nilai'       => $request->has('hapus_nilai') ? 1 : 0,
            'akses_hak_akses'   => $request->has('akses_hak_akses') ? 1 : 0,
            'updated_at'        => now(),
        ]);

        return redirect()->route('hak-akses.index')
            ->with('success', 'Hak akses role ' . strtoupper(DB::table('hak_akses')->where('id',$id)->value('nama_role')) . ' berhasil diperbarui!');
    }
}