<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\FuzzyLogicService;
use App\Models\PenilaianAkademik;
use App\Models\FuzzyHasil;
use App\Models\Mahasiswa;

class FuzzyController extends Controller
{
    protected FuzzyLogicService $fuzzy;

    public function __construct(FuzzyLogicService $fuzzy)
    {
        $this->fuzzy = $fuzzy;
    }

    public function index()
    {
        $query = PenilaianAkademik::query()
            ->join('mahasiswa', 'penilaian_akademik.mahasiswa_id', '=', 'mahasiswa.id')
            ->join('jadwal_kuliah', 'penilaian_akademik.jadwal_id', '=', 'jadwal_kuliah.id')
            ->join('mata_kuliah', 'jadwal_kuliah.mata_kuliah_id', '=', 'mata_kuliah.id')
            ->select(
                'penilaian_akademik.*',
                'mahasiswa.nama as nama_mahasiswa',
                'mahasiswa.nim',
                'mata_kuliah.nama as nama_matkul',
                'mata_kuliah.kode_mk'
            )
            ->orderBy('penilaian_akademik.created_at', 'desc');

        if (session('user_role') === 'mahasiswa') {
            $query->where('penilaian_akademik.mahasiswa_id', session('mahasiswa_id'));
        }

        $data = $query->get();

        return view('fuzzy.index', compact('data'));
    }

    public function create()
    {
        $mahasiswa = Mahasiswa::where('status', 'Aktif')->get();

        $jadwal = DB::table('jadwal_kuliah')
            ->join('mata_kuliah', 'jadwal_kuliah.mata_kuliah_id', '=', 'mata_kuliah.id')
            ->join('dosen', 'jadwal_kuliah.dosen_id', '=', 'dosen.id')
            ->join('ruangan', 'jadwal_kuliah.ruangan_id', '=', 'ruangan.id')
            ->select(
                'jadwal_kuliah.*',
                'mata_kuliah.nama as nama_matkul',
                'mata_kuliah.kode_mk',
                'dosen.nama as nama_dosen',
                'ruangan.nama as nama_ruangan'
            )
            ->get();

        return view('fuzzy.create', compact('mahasiswa', 'jadwal'));
    }

    public function store(Request $request)
    {
        if (session('user_role') === 'mahasiswa') abort(403);

        $request->validate([
            'mahasiswa_id'         => 'required',
            'jadwal_id'            => 'required',
            'kehadiran'            => 'required|numeric|between:0,100',
            'nilai_tugas'          => 'required|numeric|between:0,100',
            'keaktifan_diskusi'    => 'required|numeric|between:0,100',
        ]);

        $hasil = $this->fuzzy->hitung(
            $request->kehadiran,
            $request->nilai_tugas,
            $request->keaktifan_diskusi
        );

        $penilaian = PenilaianAkademik::create([
            'mahasiswa_id'        => $request->mahasiswa_id,
            'jadwal_id'           => $request->jadwal_id,
            'kehadiran'           => $request->kehadiran,
            'nilai_tugas'         => $request->nilai_tugas,
            'keaktifan_diskusi'   => $request->keaktifan_diskusi,
            'skor_fuzzy'          => $hasil['skor'],
            'keterangan'          => $hasil['keterangan'],
        ]);

        $mhs = Mahasiswa::find($request->mahasiswa_id);
        $f = $hasil['fuzzified'];

        FuzzyHasil::create([
            'penilaian_id'        => $penilaian->id,
            'nim'                 => $mhs->nim ?? '',
            'nama_mahasiswa'      => $mhs->nama ?? '',
            'kehadiran'           => $request->kehadiran,
            'nilai_tugas'         => $request->nilai_tugas,
            'keaktifan_diskusi'   => $request->keaktifan_diskusi,
            'kehadiran_rendah'    => $f['kehadiran']['Rendah'],
            'kehadiran_sedang'    => $f['kehadiran']['Sedang'],
            'kehadiran_tinggi'    => $f['kehadiran']['Tinggi'],
            'tugas_rendah'        => $f['nilai_tugas']['Rendah'],
            'tugas_sedang'        => $f['nilai_tugas']['Sedang'],
            'tugas_tinggi'        => $f['nilai_tugas']['Tinggi'],
            'diskusi_rendah'      => $f['keaktifan']['Rendah'],
            'diskusi_sedang'      => $f['keaktifan']['Sedang'],
            'diskusi_tinggi'      => $f['keaktifan']['Tinggi'],
            'detail_inferensi'    => $hasil['active_rules'],
            'total_alpha_z'       => $hasil['total_alpha_z'],
            'total_alpha'         => $hasil['total_alpha'],
            'hasil_defuzzifikasi' => $hasil['skor'],
            'keterangan'          => $hasil['keterangan'],
        ]);

        return redirect()->route('fuzzy.index')->with('success', 'Evaluasi fuzzy berhasil disimpan! Skor: ' . $hasil['skor'] . ' (' . $hasil['keterangan'] . ')');
    }

    public function show($id)
    {
        $data = PenilaianAkademik::query()
            ->join('mahasiswa', 'penilaian_akademik.mahasiswa_id', '=', 'mahasiswa.id')
            ->join('jadwal_kuliah', 'penilaian_akademik.jadwal_id', '=', 'jadwal_kuliah.id')
            ->join('mata_kuliah', 'jadwal_kuliah.mata_kuliah_id', '=', 'mata_kuliah.id')
            ->select(
                'penilaian_akademik.*',
                'mahasiswa.nama as nama_mahasiswa',
                'mahasiswa.nim',
                'mata_kuliah.nama as nama_matkul',
                'mata_kuliah.kode_mk'
            )
            ->where('penilaian_akademik.id', $id)
            ->first();

        if (!$data) {
            return redirect()->route('fuzzy.index')->with('error', 'Data evaluasi tidak ditemukan!');
        }

        $hasil = $this->fuzzy->hitung($data->kehadiran, $data->nilai_tugas, $data->keaktifan_diskusi);

        return view('fuzzy.show', compact('data', 'hasil'));
    }

    public function destroy($id)
    {
        if (session('user_role') === 'mahasiswa') abort(403);

        FuzzyHasil::where('penilaian_id', $id)->delete();
        PenilaianAkademik::where('id', $id)->delete();
        return redirect()->route('fuzzy.index')->with('success', 'Data evaluasi berhasil dihapus!');
    }

    public function definisi()
    {
        return view('fuzzy.definisi');
    }
}
