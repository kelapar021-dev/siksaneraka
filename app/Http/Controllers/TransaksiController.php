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
        $role = session('user_role', 'mahasiswa');

        $query = DB::table('transaksi_absensi as t')
            ->join('mahasiswa as m', 't.mahasiswa_id', '=', 'm.id')
            ->select(
                't.*',
                'm.nama',
                'm.nim',
                DB::raw("(SELECT k.semester FROM krs k
                    JOIN jadwal_kuliah j ON j.id = k.jadwal_id
                    JOIN mata_kuliah mk ON mk.id = j.mata_kuliah_id
                    WHERE k.mahasiswa_id = t.mahasiswa_id AND mk.nama = t.nama_matkul
                    LIMIT 1) as semester")
            );

        if ($role === 'mahasiswa') {
            $query->where('t.mahasiswa_id', session('mahasiswa_id'));
        } elseif ($role === 'dosen') {
            $query->where('t.nama_dosen', session('username'));
        }

        $data = $query->orderByDesc('t.created_at')->get();

        return view('transaksi.absensi', compact('data', 'role'));
    }

    public function setujuiAbsensi($id)
    {
        $role = session('user_role');

        if (!in_array($role, ['dosen', 'staf_akademik'])) {
            return redirect()->route('transaksi.absensi')
                ->with('error', 'Anda tidak memiliki akses untuk memverifikasi absensi!');
        }

        $data = DB::table('transaksi_absensi')->where('id', $id)->first();

        if (!$data) {
            return redirect()->route('transaksi.absensi')
                ->with('error', 'Data absensi tidak ditemukan!');
        }

        if ($role === 'dosen' && $data->nama_dosen !== session('username')) {
            return redirect()->route('transaksi.absensi')
                ->with('error', 'Anda hanya dapat memverifikasi absensi pada kelas Anda!');
        }

        DB::table('transaksi_absensi')
            ->where('id', $id)
            ->update([
                'status_verifikasi'   => 'Disetujui',
                'verifikator'         => session('username'),
                'tanggal_verifikasi'  => now(),
                'updated_at'          => now(),
            ]);

        $this->kirimNotifVerifikasi($data, 'Disetujui', null);

        return redirect()->route('transaksi.absensi')
            ->with('success', "Absensi {$data->nama_matkul} pertemuan ke-{$data->pertemuan_ke} telah disetujui. Notifikasi terkirim ke mahasiswa.");
    }

    public function tolakAbsensi(Request $request, $id)
    {
        $role = session('user_role');

        if (!in_array($role, ['dosen', 'staf_akademik'])) {
            return redirect()->route('transaksi.absensi')
                ->with('error', 'Anda tidak memiliki akses untuk memverifikasi absensi!');
        }

        $request->validate([
            'alasan_penolakan' => 'required',
        ], [
            'alasan_penolakan.required' => 'Alasan penolakan wajib diisi!',
        ]);

        $data = DB::table('transaksi_absensi')->where('id', $id)->first();

        if (!$data) {
            return redirect()->route('transaksi.absensi')
                ->with('error', 'Data absensi tidak ditemukan!');
        }

        if ($role === 'dosen' && $data->nama_dosen !== session('username')) {
            return redirect()->route('transaksi.absensi')
                ->with('error', 'Anda hanya dapat memverifikasi absensi pada kelas Anda!');
        }

        DB::table('transaksi_absensi')
            ->where('id', $id)
            ->update([
                'status_verifikasi'   => 'Ditolak',
                'verifikator'         => session('username'),
                'tanggal_verifikasi'  => now(),
                'alasan_penolakan'    => $request->alasan_penolakan,
                'updated_at'          => now(),
            ]);

        $this->kirimNotifVerifikasi($data, 'Ditolak', $request->alasan_penolakan);

        return redirect()->route('transaksi.absensi')
            ->with('success', "Absensi {$data->nama_matkul} pertemuan ke-{$data->pertemuan_ke} telah ditolak. Notifikasi terkirim ke mahasiswa.");
    }

    private function kirimNotifVerifikasi($data, $status, $alasan)
    {
        $jadwal = DB::table('jadwal_kuliah as j')
            ->join('mata_kuliah as mk', 'j.mata_kuliah_id', '=', 'mk.id')
            ->join('dosen as d', 'j.dosen_id', '=', 'd.id')
            ->where('mk.nama', $data->nama_matkul)
            ->where('d.nama', $data->nama_dosen)
            ->select('j.id')
            ->first();

        if (!$jadwal) {
            $jadwal = DB::table('jadwal_kuliah as j')
                ->join('mata_kuliah as mk', 'j.mata_kuliah_id', '=', 'mk.id')
                ->where('mk.nama', $data->nama_matkul)
                ->select('j.id')
                ->first();
        }

        if (!$jadwal) return;

        $statusLabel = $status === 'Disetujui' ? 'DISETUJUI' : 'DITOLAK';
        $pesan = "Absensi Anda: {$data->nama_matkul} pertemuan ke-{$data->pertemuan_ke} ({$data->tanggal}) dengan status " .
            "'{$data->status_hadir}' telah {$statusLabel} oleh " . session('username') . ".";

        if ($status === 'Ditolak' && $alasan) {
            $pesan .= " Alasan: {$alasan}.";
        }

        DB::table('notifikasi_peringatan')->insert([
            'mahasiswa_id'  => $data->mahasiswa_id,
            'jadwal_id'     => $jadwal->id,
            'pesan'         => $pesan,
            'tanggal_kirim' => now(),
            'status_baca'   => 'Belum',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);
    }

    public function createAbsensi()
    {
        $role = session('role', 'mahasiswa');

        if ($role === 'mahasiswa') {
            $mahasiswa = DB::table('mahasiswa')
                ->where('id', session('mahasiswa_id'))
                ->get();
        } else {
            $mahasiswa = DB::table('mahasiswa')->get();
        }

        $pertemuan = DB::table('pertemuan')
            ->join('jadwal_kuliah', 'pertemuan.jadwal_id', '=', 'jadwal_kuliah.id')
            ->join('mata_kuliah', 'jadwal_kuliah.mata_kuliah_id', '=', 'mata_kuliah.id')
            ->select('pertemuan.*', 'mata_kuliah.nama as nama_matkul')
            ->orderBy('pertemuan.pertemuan_ke')
            ->get();

        return view('transaksi.tambah-absensi', compact('mahasiswa', 'pertemuan', 'role'));
    }

   public function storeAbsensi(Request $request)
{
    if (session('user_role') === 'admin') abort(403);

    $role = session('user_role', 'mahasiswa');

    $mahasiswaId = $role === 'mahasiswa'
        ? session('mahasiswa_id')
        : $request->mahasiswa_id;

    DB::table('transaksi_absensi')->insert([

        'mahasiswa_id' => $mahasiswaId,

        'nama_matkul' => $request->nama_matkul,

        'nama_dosen' => $request->nama_dosen,

        'tanggal' => $request->tanggal,

        'pertemuan_ke' => $request->pertemuan_ke,

        'status_hadir' => $request->status_hadir,

        'status_verifikasi' => 'Menunggu',

        'keterangan' => $request->keterangan,

        'created_at' => now(),

        'updated_at' => now(),

    ]);

    return redirect()->route('transaksi.absensi')
        ->with('success', 'Data absensi berhasil disimpan dan menunggu verifikasi!');
}

    public function hitungRekap()
    {
        $role = session('user_role');

        if (!in_array($role, ['dosen', 'staf_akademik'])) {
            return redirect()->route('transaksi.absensi')
                ->with('error', 'Anda tidak memiliki akses untuk menghitung rekap!');
        }

        $dosenNama = $role === 'dosen' ? session('username') : null;

        $query = DB::table('transaksi_absensi')
            ->where('status_verifikasi', 'Disetujui');
        if ($dosenNama) {
            $query->where('nama_dosen', $dosenNama);
        }

        $rows = $query->get();

        $groups = $rows->groupBy(function ($r) {
            return $r->mahasiswa_id . '|' . $r->nama_matkul . '|' . $r->nama_dosen;
        });

        $notifDikirim = 0;

        foreach ($groups as $key => $items) {
            [$mahasiswaId, $namaMatkul, $namaDosen] = explode('|', $key);

            $hadir = $items->where('status_hadir', 'Hadir')->count();
            $izin  = $items->where('status_hadir', 'Izin')->count();
            $sakit = $items->where('status_hadir', 'Sakit')->count();
            $alpha = $items->where('status_hadir', 'Alfa')->count();
            $total = $items->count();
            $persentase = $total > 0 ? round(($hadir / $total) * 100, 2) : 0;

            $jadwal = DB::table('jadwal_kuliah as j')
                ->join('mata_kuliah as mk', 'j.mata_kuliah_id', '=', 'mk.id')
                ->join('dosen as d', 'j.dosen_id', '=', 'd.id')
                ->where('mk.nama', $namaMatkul)
                ->where('d.nama', $namaDosen)
                ->select('j.id')
                ->first();

            if (!$jadwal) {
                $jadwal = DB::table('jadwal_kuliah as j')
                    ->join('mata_kuliah as mk', 'j.mata_kuliah_id', '=', 'mk.id')
                    ->where('mk.nama', $namaMatkul)
                    ->select('j.id')
                    ->first();
            }

            if (!$jadwal) continue;

            $jadwalId = $jadwal->id;

            $data = [
                'total_hadir'      => $hadir,
                'total_izin'       => $izin,
                'total_sakit'      => $sakit,
                'total_alpha'      => $alpha,
                'persentase_hadir' => $persentase,
                'updated_at'       => now(),
            ];

            $existing = DB::table('rekap_absensi')
                ->where('mahasiswa_id', $mahasiswaId)
                ->where('jadwal_id', $jadwalId)
                ->first();

            if ($existing) {
                DB::table('rekap_absensi')->where('id', $existing->id)->update($data);
            } else {
                DB::table('rekap_absensi')->insert(array_merge($data, [
                    'mahasiswa_id' => $mahasiswaId,
                    'jadwal_id'    => $jadwalId,
                    'created_at'   => now(),
                ]));
            }

            if ($persentase < 75) {
                $pesan = "Peringatan! Kehadiran Anda pada mata kuliah {$namaMatkul} hanya {$persentase}%. Minimal kehadiran adalah 75%.";
                $sudahAda = DB::table('notifikasi_peringatan')
                    ->where('mahasiswa_id', $mahasiswaId)
                    ->where('jadwal_id', $jadwalId)
                    ->where('pesan', $pesan)
                    ->exists();

                if (!$sudahAda) {
                    DB::table('notifikasi_peringatan')->insert([
                        'mahasiswa_id'  => $mahasiswaId,
                        'jadwal_id'     => $jadwalId,
                        'pesan'         => $pesan,
                        'tanggal_kirim' => now(),
                        'status_baca'   => 'Belum',
                        'created_at'    => now(),
                        'updated_at'    => now(),
                    ]);
                    $notifDikirim++;
                }
            }
        }

        return redirect()->route('transaksi.absensi')
            ->with('success', "Rekap absensi berhasil dihitung ({$groups->count()} kelompok). Notifikasi peringatan terkirim: {$notifDikirim}.");
    }

    public function editAbsensi($id)
    {
        if (in_array(session('user_role'), ['mahasiswa', 'admin'])) abort(403);

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
    if (in_array(session('user_role'), ['mahasiswa', 'admin'])) abort(403);

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
        if (in_array(session('user_role'), ['mahasiswa', 'admin'])) abort(403);

        DB::table('transaksi_absensi')
            ->where('id', $id)
            ->delete();

        return redirect()->route('transaksi.absensi');
    }

}