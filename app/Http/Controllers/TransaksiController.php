<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{

    // ================= PEMBAYARAN =================

    public function pembayaran()
    {
        $query = DB::table('transaksi_pembayaran')
            ->join('mahasiswa', 'transaksi_pembayaran.mahasiswa_id', '=', 'mahasiswa.id')
            ->select('transaksi_pembayaran.*', 'mahasiswa.nama', 'mahasiswa.nim');

        if (session('user_role') === 'mahasiswa') {
            $query->where('transaksi_pembayaran.mahasiswa_id', session('mahasiswa_id'));
        }

        $data = $query->get();

        return view('transaksi.pembayaran', compact('data'));
    }

    public function createPembayaran()
    {
        if (session('user_role') === 'mahasiswa') {
            $mahasiswa = DB::table('mahasiswa')
                ->where('id', session('mahasiswa_id'))
                ->get();
        } else {
            $mahasiswa = DB::table('mahasiswa')->get();
        }

        return view('transaksi.tambah-pembayaran', compact('mahasiswa'));
    }

   public function storePembayaran(Request $request)
{
    $request->validate([
        'mahasiswa_id'     => 'required',
        'kode_bayar'       => 'required|unique:transaksi_pembayaran,kode_bayar',
        'jenis_pembayaran' => 'required',
        'jumlah_bayar'     => 'required',
        'tanggal_bayar'    => 'required',
        'batas_bayar'      => 'required',
        'metode_bayar'     => 'required',
        'status_bayar'     => 'required',
    ], [
        'kode_bayar.unique' => 'Kode pembayaran sudah digunakan!',
    ]);

    DB::table('transaksi_pembayaran')->insert([

        'mahasiswa_id'     => $request->mahasiswa_id,

        'kode_bayar'       => $request->kode_bayar,

        'jenis_pembayaran' => $request->jenis_pembayaran,

        'jumlah_bayar'     => $request->jumlah_bayar,

        'tanggal_bayar'    => $request->tanggal_bayar,

        'batas_bayar'      => $request->batas_bayar,

        'metode_bayar'     => $request->metode_bayar,

        'status_bayar'     => $request->status_bayar,

        'keterangan'       => $request->keterangan,

    ]);

    return redirect()
        ->route('transaksi.pembayaran')
        ->with('success', 'Data pembayaran berhasil ditambahkan');
}
    public function editPembayaran($id)
    {
        if (session('user_role') === 'mahasiswa') abort(403);

        $data = DB::table('transaksi_pembayaran')
            ->where('id', $id)
            ->first();

        $mahasiswa = DB::table('mahasiswa')->get();

        return view('transaksi.edit-pembayaran', compact('data', 'mahasiswa'));
    }

    public function updatePembayaran(Request $request, $id)
    {
        if (session('user_role') === 'mahasiswa') abort(403);

        DB::table('transaksi_pembayaran')
            ->where('id', $id)
            ->update([
                'mahasiswa_id' => $request->mahasiswa_id,
                'kode_bayar' => $request->kode_bayar,
                'jenis_pembayaran' => $request->jenis_pembayaran,
                'jumlah_bayar' => $request->jumlah_bayar,
                'tanggal_bayar' => $request->tanggal_bayar,
                'batas_bayar' => $request->batas_bayar,
                'metode_bayar' => $request->metode_bayar,
                'status_bayar' => $request->status_bayar,
                'keterangan' => $request->keterangan,
            ]);

        return redirect()->route('transaksi.pembayaran');
    }

    public function deletePembayaran($id)
    {
        if (session('user_role') === 'mahasiswa') abort(403);

        DB::table('transaksi_pembayaran')
            ->where('id', $id)
            ->delete();

        return redirect()->route('transaksi.pembayaran');
    }

    // ================= NILAI =================

    public function nilai()
    {
        $query = DB::table('transaksi_nilai')
            ->join('mahasiswa', 'transaksi_nilai.mahasiswa_id', '=', 'mahasiswa.id')
            ->select('transaksi_nilai.*', 'mahasiswa.nama', 'mahasiswa.nim');

        if (session('user_role') === 'mahasiswa') {
            $query->where('transaksi_nilai.mahasiswa_id', session('mahasiswa_id'));
        }

        $data = $query->get();

        return view('transaksi.nilai', compact('data'));
    }

    public function createNilai()
    {
        $mahasiswa = DB::table('mahasiswa')->get();

        return view('transaksi.tambah-nilai', compact('mahasiswa'));
    }

    public function storeNilai(Request $request)
    {
        if (session('user_role') === 'mahasiswa') abort(403);

        DB::table('transaksi_nilai')->insert([

            'mahasiswa_id' => $request->mahasiswa_id,
            'kode_matkul' => $request->kode_matkul,
            'nama_matkul' => $request->nama_matkul,
            'sks' => $request->sks,
            'semester' => $request->semester,
            'tahun_ajaran' => $request->tahun_ajaran,
            'nilai_angka' => $request->nilai_angka,
            'nilai_huruf' => $request->nilai_huruf,
            'bobot_nilai' => $request->bobot_nilai,
            'status_nilai' => $request->status_nilai,

        ]);

        return redirect()->route('transaksi.nilai');
    }

    public function editNilai($id)
    {
        if (session('user_role') === 'mahasiswa') abort(403);

        $data = DB::table('transaksi_nilai')
            ->where('id', $id)
            ->first();

        $mahasiswa = DB::table('mahasiswa')->get();

        return view('transaksi.edit-nilai', compact('data', 'mahasiswa'));
    }

    public function updateNilai(Request $request, $id)
    {
        if (session('user_role') === 'mahasiswa') abort(403);

        DB::table('transaksi_nilai')
            ->where('id', $id)
            ->update([

                'mahasiswa_id' => $request->mahasiswa_id,
                'kode_matkul' => $request->kode_matkul,
                'nama_matkul' => $request->nama_matkul,
                'sks' => $request->sks,
                'semester' => $request->semester,
                'tahun_ajaran' => $request->tahun_ajaran,
                'nilai_angka' => $request->nilai_angka,
                'nilai_huruf' => $request->nilai_huruf,
                'bobot_nilai' => $request->bobot_nilai,
                'status_nilai' => $request->status_nilai,

            ]);

        return redirect()->route('transaksi.nilai');
    }

    public function deleteNilai($id)
    {
        if (session('user_role') === 'mahasiswa') abort(403);

        DB::table('transaksi_nilai')
            ->where('id', $id)
            ->delete();

        return redirect()->route('transaksi.nilai');
    }

    // ================= ABSENSI =================

    public function absensi()
    {
        $data = DB::table('transaksi_absensi')
            ->join('mahasiswa', 'transaksi_absensi.mahasiswa_id', '=', 'mahasiswa.id')
            ->select('transaksi_absensi.*', 'mahasiswa.nama', 'mahasiswa.nim')
            ->get();

        return view('transaksi.absensi', compact('data'));
    }

    public function createAbsensi()
    {
        $mahasiswa = DB::table('mahasiswa')->get();

        $pertemuan = DB::table('pertemuan')
            ->join('jadwal_kuliah', 'pertemuan.jadwal_id', '=', 'jadwal_kuliah.id')
            ->join('mata_kuliah', 'jadwal_kuliah.mata_kuliah_id', '=', 'mata_kuliah.id')
            ->select('pertemuan.*', 'mata_kuliah.nama as nama_matkul')
            ->orderBy('pertemuan.pertemuan_ke')
            ->get();

        return view('transaksi.tambah-absensi', compact('mahasiswa', 'pertemuan'));
    }

   public function storeAbsensi(Request $request)
{
    if (session('user_role') === 'mahasiswa') abort(403);

    DB::table('transaksi_absensi')->insert([

        'mahasiswa_id' => $request->mahasiswa_id,

        'nama_matkul' => $request->nama_matkul,

        'nama_dosen' => $request->nama_dosen,

        'tanggal' => $request->tanggal,

        'pertemuan_ke' => $request->pertemuan_ke,

        'status_hadir' => $request->status_hadir,

        'keterangan' => $request->keterangan,

    ]);

    return redirect()->route('transaksi.absensi');
}

    public function editAbsensi($id)
    {
        if (session('user_role') === 'mahasiswa') abort(403);

        $data = DB::table('transaksi_absensi')
            ->where('id', $id)
            ->first();

        $mahasiswa = DB::table('mahasiswa')->get();

        $pertemuan = DB::table('pertemuan')
            ->join('jadwal_kuliah', 'pertemuan.jadwal_id', '=', 'jadwal_kuliah.id')
            ->join('mata_kuliah', 'jadwal_kuliah.mata_kuliah_id', '=', 'mata_kuliah.id')
            ->select('pertemuan.*', 'mata_kuliah.nama as nama_matkul')
            ->orderBy('pertemuan.pertemuan_ke')
            ->get();

        return view('transaksi.edit-absensi', compact('data', 'mahasiswa', 'pertemuan'));
    }

    public function updateAbsensi(Request $request, $id)
{
    if (session('user_role') === 'mahasiswa') abort(403);

    DB::table('transaksi_absensi')
        ->where('id', $id)
        ->update([

            'mahasiswa_id' => $request->mahasiswa_id,

            'nama_matkul' => $request->nama_matkul,

            'nama_dosen' => $request->nama_dosen,

            'tanggal' => $request->tanggal,

            'pertemuan_ke' => $request->pertemuan_ke,

            'status_hadir' => $request->status_hadir,

            'keterangan' => $request->keterangan,

        ]);

    return redirect()->route('transaksi.absensi');
}

    public function deleteAbsensi($id)
    {
        if (session('user_role') === 'mahasiswa') abort(403);

        DB::table('transaksi_absensi')
            ->where('id', $id)
            ->delete();

        return redirect()->route('transaksi.absensi');
    }

}