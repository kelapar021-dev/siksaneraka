<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function pembayaran(Request $request)
    {
        $mahasiswaId = $request->get('mahasiswa_id');

        $data = DB::table('transaksi_pembayaran')
            ->join('mahasiswa', 'transaksi_pembayaran.mahasiswa_id', '=', 'mahasiswa.id')
            ->where('transaksi_pembayaran.mahasiswa_id', $mahasiswaId)
            ->select('transaksi_pembayaran.*', 'mahasiswa.nama', 'mahasiswa.nim')
            ->orderBy('transaksi_pembayaran.created_at', 'desc')
            ->get();

        return response()->json(['data' => $data]);
    }

    public function nilai(Request $request)
    {
        $mahasiswaId = $request->get('mahasiswa_id');

        $data = DB::table('transaksi_nilai')
            ->join('mahasiswa', 'transaksi_nilai.mahasiswa_id', '=', 'mahasiswa.id')
            ->where('transaksi_nilai.mahasiswa_id', $mahasiswaId)
            ->select('transaksi_nilai.*', 'mahasiswa.nama', 'mahasiswa.nim')
            ->orderBy('transaksi_nilai.created_at', 'desc')
            ->get();

        return response()->json(['data' => $data]);
    }

    public function storePembayaran(Request $request)
    {
        $mahasiswaId = $request->get('mahasiswa_id');

        $request->validate([
            'kode_bayar'       => 'required|unique:transaksi_pembayaran,kode_bayar',
            'jenis_pembayaran' => 'required',
            'jumlah_bayar'     => 'required',
            'tanggal_bayar'    => 'required',
            'batas_bayar'      => 'required',
            'metode_bayar'     => 'required',
            'status_bayar'     => 'required',
        ]);

        DB::table('transaksi_pembayaran')->insert([
            'mahasiswa_id'     => $mahasiswaId,
            'kode_bayar'       => $request->kode_bayar,
            'jenis_pembayaran' => $request->jenis_pembayaran,
            'jumlah_bayar'     => $request->jumlah_bayar,
            'tanggal_bayar'    => $request->tanggal_bayar,
            'batas_bayar'      => $request->batas_bayar,
            'metode_bayar'     => $request->metode_bayar,
            'status_bayar'     => $request->status_bayar,
            'keterangan'       => $request->keterangan,
            'created_at'       => now(),
            'updated_at'       => now(),
        ]);

        return response()->json(['message' => 'Pembayaran berhasil ditambahkan']);
    }

    public function updatePembayaran(Request $request, $id)
    {
        $existing = DB::table('transaksi_pembayaran')
            ->where('id', $id)
            ->where('mahasiswa_id', $request->get('mahasiswa_id'))
            ->first();

        if (!$existing) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        DB::table('transaksi_pembayaran')
            ->where('id', $id)
            ->update([
                'kode_bayar'       => $request->kode_bayar ?? $existing->kode_bayar,
                'jenis_pembayaran' => $request->jenis_pembayaran ?? $existing->jenis_pembayaran,
                'jumlah_bayar'     => $request->jumlah_bayar ?? $existing->jumlah_bayar,
                'tanggal_bayar'    => $request->tanggal_bayar ?? $existing->tanggal_bayar,
                'batas_bayar'      => $request->batas_bayar ?? $existing->batas_bayar,
                'metode_bayar'     => $request->metode_bayar ?? $existing->metode_bayar,
                'status_bayar'     => $request->status_bayar ?? $existing->status_bayar,
                'keterangan'       => $request->keterangan ?? $existing->keterangan,
                'updated_at'       => now(),
            ]);

        return response()->json(['message' => 'Pembayaran berhasil diupdate']);
    }

    public function deletePembayaran(Request $request, $id)
    {
        $existing = DB::table('transaksi_pembayaran')
            ->where('id', $id)
            ->where('mahasiswa_id', $request->get('mahasiswa_id'))
            ->first();

        if (!$existing) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        DB::table('transaksi_pembayaran')
            ->where('id', $id)
            ->delete();

        return response()->json(['message' => 'Pembayaran berhasil dihapus']);
    }

    public function nilaiDetail(Request $request, $id)
    {
        $mahasiswaId = $request->get('mahasiswa_id');

        $data = DB::table('transaksi_nilai')
            ->join('mahasiswa', 'transaksi_nilai.mahasiswa_id', '=', 'mahasiswa.id')
            ->where('transaksi_nilai.id', $id)
            ->where('transaksi_nilai.mahasiswa_id', $mahasiswaId)
            ->select('transaksi_nilai.*', 'mahasiswa.nama', 'mahasiswa.nim')
            ->first();

        if (!$data) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json(['data' => $data]);
    }

    // ================= ABSENSI (SELF-REPORT) =================

    public function absensi(Request $request)
    {
        $mahasiswaId = $request->get('mahasiswa_id');

        $data = DB::table('transaksi_absensi')
            ->join('mahasiswa', 'transaksi_absensi.mahasiswa_id', '=', 'mahasiswa.id')
            ->where('transaksi_absensi.mahasiswa_id', $mahasiswaId)
            ->select('transaksi_absensi.*', 'mahasiswa.nama as nama_mahasiswa', 'mahasiswa.nim')
            ->orderBy('transaksi_absensi.tanggal', 'desc')
            ->get();

        return response()->json(['data' => $data]);
    }

    public function storeAbsensi(Request $request)
    {
        $mahasiswaId = $request->get('mahasiswa_id');

        $request->validate([
            'nama_matkul'  => 'required',
            'nama_dosen'   => 'required',
            'tanggal'      => 'required|date',
            'pertemuan_ke' => 'required|integer',
            'status_hadir' => 'required|in:Hadir,Izin,Sakit,Alfa',
        ]);

        DB::table('transaksi_absensi')->insert([
            'mahasiswa_id' => $mahasiswaId,
            'nama_matkul'  => $request->nama_matkul,
            'nama_dosen'   => $request->nama_dosen,
            'tanggal'      => $request->tanggal,
            'pertemuan_ke' => $request->pertemuan_ke,
            'status_hadir' => $request->status_hadir,
            'keterangan'   => $request->keterangan,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        return response()->json(['message' => 'Absensi berhasil disimpan']);
    }

    public function absensiPertemuan()
    {
        $pertemuan = DB::table('pertemuan')
            ->join('jadwal_kuliah', 'pertemuan.jadwal_id', '=', 'jadwal_kuliah.id')
            ->join('mata_kuliah', 'jadwal_kuliah.mata_kuliah_id', '=', 'mata_kuliah.id')
            ->join('dosen', 'jadwal_kuliah.dosen_id', '=', 'dosen.id')
            ->select(
                'pertemuan.id',
                'pertemuan.pertemuan_ke',
                'pertemuan.tanggal',
                'pertemuan.topik',
                'mata_kuliah.nama as nama_matkul',
                'dosen.nama as nama_dosen'
            )
            ->orderBy('pertemuan.tanggal', 'desc')
            ->get();

        return response()->json(['data' => $pertemuan]);
    }
}
