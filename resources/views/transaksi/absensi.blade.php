<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Transaksi Absensi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        *{
            font-family: 'Poppins', sans-serif;
        }

        body{
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
            min-height: 100vh;
            padding: 30px;
        }

        .top-navbar{
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 20px;
            padding: 15px 25px;
            margin-bottom: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand{
            color: white;
            font-weight: 700;
            font-size: 18px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand-icon{
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #43e97b, #38f9d7);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .nav-links{
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .nav-link-btn{
            padding: 8px 16px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
            border: 1px solid rgba(255,255,255,0.15);
            color: rgba(255,255,255,0.7);
            background: rgba(255,255,255,0.05);
        }

        .nav-link-btn:hover,
        .nav-link-btn.active{
            background: linear-gradient(135deg, #43e97b, #38f9d7);
            color: #111;
            border-color: transparent;
        }

        .btn-back{
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.15);
            color: white;
            padding: 8px 16px;
            border-radius: 10px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }

        .btn-tambah{
            background: linear-gradient(135deg, #43e97b, #38f9d7);
            border: none;
            color: #111;
            padding: 10px 18px;
            border-radius: 12px;
            font-weight: 700;
            text-decoration: none;
            font-size: 14px;
        }

        .btn-edit{
            background: rgba(79,172,254,0.2);
            color: #4facfe;
            border: 1px solid rgba(79,172,254,0.3);
            padding: 6px 12px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
        }

        .btn-hapus{
            background: rgba(255,65,108,0.2);
            color: #ff416c;
            border: 1px solid rgba(255,65,108,0.3);
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
        }

        .main-card{
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 25px;
            padding: 30px;
        }

        .stats-bar{
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }

        .stat-item{
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 16px;
            padding: 15px 20px;
            flex: 1;
            min-width: 150px;
            color: white;
        }

        .stat-number{
            font-size: 26px;
            font-weight: 700;
            background: linear-gradient(135deg, #43e97b, #38f9d7);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .stat-label{
            font-size: 12px;
            color: rgba(255,255,255,0.7);
            margin: 0;
        }

        .table-header{
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .table-title{
            color: white;
            font-weight: 700;
            font-size: 20px;
            margin: 0;
        }

        .header-right{
            display: flex;
            gap: 10px;
            align-items: center;
            flex-wrap: wrap;
        }

        .search-box{
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 12px;
            padding: 10px 16px;
            color: white;
            font-size: 14px;
            width: 250px;
            outline: none;
        }

        .search-box::placeholder{
            color: rgba(255,255,255,0.5);
        }

        .table-container{
            overflow-x: auto;
            border-radius: 16px;
            border: 1px solid rgba(255,255,255,0.08);
        }

        table{
            min-width: 1200px;
            white-space: nowrap;
            margin: 0;
        }

        thead tr{
            background: #f5f5f5;
        }

        th{
            padding: 15px 12px !important;
            font-size: 13px;
            color: #222 !important;
            font-weight: 700;
            border: none !important;
            border-bottom: 1px solid rgba(0,0,0,0.1) !important;
            background: #f5f5f5 !important;
        }

        td{
            padding: 13px 12px !important;
            font-size: 13px;
            color: #ffffff;
            border: none !important;
            border-bottom: 1px solid rgba(255,255,255,0.05) !important;
            background: transparent !important;
            font-weight: 500;
        }

        tbody tr:hover td{
            background: rgba(255,255,255,0.05) !important;
        }

        .badge-hadir{
            background: rgba(67,233,123,0.2);
            color: #43e97b;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-izin{
            background: rgba(79,172,254,0.2);
            color: #4facfe;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-sakit{
            background: rgba(255,193,7,0.2);
            color: #ffc107;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-alfa{
            background: rgba(255,65,108,0.2);
            color: #ff416c;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-menunggu{
            background: rgba(255,193,7,0.2);
            color: #ffc107;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-disetujui{
            background: rgba(67,233,123,0.2);
            color: #43e97b;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-ditolak{
            background: rgba(255,65,108,0.2);
            color: #ff416c;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .btn-setuju{
            background: rgba(67,233,123,0.2);
            color: #43e97b;
            border: 1px solid rgba(67,233,123,0.3);
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
        }

        .btn-tolak{
            background: rgba(255,65,108,0.2);
            color: #ff416c;
            border: 1px solid rgba(255,65,108,0.3);
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
        }

        .empty-state{
            text-align: center;
            padding: 60px 20px;
            color: rgba(255,255,255,0.5);
        }

        .empty-state i{
            font-size: 60px;
            margin-bottom: 15px;
        }

        .alert-success{
            background: rgba(67,233,123,0.15);
            border: 1px solid rgba(67,233,123,0.3);
            color: #43e97b;
            border-radius: 12px;
        }

        .alert-danger{
            background: rgba(255,65,108,0.15);
            border: 1px solid rgba(255,65,108,0.3);
            color: #ff416c;
            border-radius: 12px;
        }
    </style>
</head>

<body>

<div class="top-navbar">
    <div class="brand">
        <div class="brand-icon">📋</div>
        Transaksi Absensi
    </div>

    <div class="nav-links">
        <a href="{{ route('transaksi.pembayaran') }}" class="nav-link-btn">💳 Pembayaran</a>
        <a href="{{ route('transaksi.nilai') }}" class="nav-link-btn">📊 Nilai</a>
        <a href="{{ route('transaksi.absensi') }}" class="nav-link-btn active">📋 Absensi</a>
        <a href="{{ route('data-mahasiswa') }}" class="btn-back">← Kembali</a>
    </div>
</div>

<div class="main-card">

    @php $role = session('role', 'mahasiswa'); @endphp

    @if(session('success'))
    <div class="alert alert-success mb-4">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger mb-4">
        {{ session('error') }}
    </div>
    @endif

    <div class="stats-bar">
        <div class="stat-item">
            <div class="stat-number">{{ $data->count() }}</div>
            <p class="stat-label"><i class="bi bi-calendar-check"></i> Total Absensi</p>
        </div>

        <div class="stat-item">
            <div class="stat-number">{{ $data->where('status_hadir','Hadir')->count() }}</div>
            <p class="stat-label"><i class="bi bi-check-circle"></i> Hadir</p>
        </div>

        <div class="stat-item">
            <div class="stat-number">{{ $data->where('status_hadir','Izin')->count() }}</div>
            <p class="stat-label"><i class="bi bi-envelope"></i> Izin</p>
        </div>

        <div class="stat-item">
            <div class="stat-number">{{ $data->where('status_hadir','Sakit')->count() }}</div>
            <p class="stat-label"><i class="bi bi-heart-pulse"></i> Sakit</p>
        </div>

        <div class="stat-item">
            <div class="stat-number">{{ $data->where('status_hadir','Alfa')->count() }}</div>
            <p class="stat-label"><i class="bi bi-x-circle"></i> Alfa</p>
        </div>
    </div>

    <div class="table-header">

        <h5 class="table-title">
            <i class="bi bi-clipboard-check-fill"></i>
            Data Absensi Mahasiswa
        </h5>

        <div class="header-right">

            <input
                type="text"
                class="search-box"
                id="searchInput"
                placeholder="🔍 Cari data..."
            >

            @if($role === 'dosen' || $role === 'staf_akademik')
            <form
                action="{{ route('transaksi.absensi.hitung-rekap') }}"
                method="POST"
                onsubmit="return confirm('Hitung rekap absensi sekarang?')"
            >
                @csrf
                <button type="submit" class="btn-tambah" style="background:linear-gradient(135deg,#4facfe,#38f9d7);">
                    <i class="bi bi-calculator"></i>
                    Hitung Rekap
                </button>
            </form>
            @endif

            @if($role !== 'admin')
            <a href="{{ route('transaksi.absensi.create') }}" class="btn-tambah">
                <i class="bi bi-plus-circle"></i>
                {{ $role === 'mahasiswa' ? 'Isi Absensi Saya' : 'Tambah Absensi' }}
            </a>
            @endif

        </div>

    </div>

    <div class="table-container">

        <table class="table table-hover text-center align-middle" id="dataTable">

            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Mata Kuliah</th>
                    <th>Nama Dosen</th>
                    <th>Tanggal</th>
                    <th>Pertemuan</th>
                    <th>Status</th>
                    <th>Verifikasi</th>
                    <th>Keterangan</th>
                    @if($role === 'dosen' || $role === 'staf_akademik')<th>Aksi</th>@endif
                </tr>
            </thead>

            <tbody>

                @forelse($data as $item)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>
                        <span style="background:rgba(67,233,123,0.2);color:#43e97b;padding:3px 8px;border-radius:6px;font-size:12px;">
                            {{ $item->nim }}
                        </span>
                    </td>

                    <td style="font-weight:600;color:white;">
                        {{ $item->nama }}
                    </td>

                    <td>{{ $item->nama_matkul }}</td>

                    <td>{{ $item->nama_dosen }}</td>

                    <td>{{ $item->tanggal }}</td>

                    <td>
                        <span style="background:rgba(255,255,255,0.1);padding:3px 10px;border-radius:6px;">
                            {{ $item->pertemuan_ke }}
                        </span>
                    </td>

                    <td>

                        @if($item->status_hadir == 'Hadir')
                            <span class="badge-hadir">✔ Hadir</span>

                        @elseif($item->status_hadir == 'Izin')
                            <span class="badge-izin">📩 Izin</span>

                        @elseif($item->status_hadir == 'Sakit')
                            <span class="badge-sakit">🏥 Sakit</span>

                        @else
                            <span class="badge-alfa">✘ Alfa</span>
                        @endif

                    </td>

                    <td>

                        @if($item->status_verifikasi == 'Disetujui')
                            <span class="badge-disetujui">✔ Disetujui</span>

                        @elseif($item->status_verifikasi == 'Ditolak')
                            <span class="badge-ditolak" title="{{ $item->alasan_penolakan ?? '' }}">✘ Ditolak</span>

                        @else
                            <span class="badge-menunggu">⏳ Menunggu</span>
                        @endif

                    </td>

                    <td>{{ $item->keterangan ?? '-' }}</td>

                    @if($role === 'dosen' || $role === 'staf_akademik')
                    <td>

                        <div class="d-flex justify-content-center gap-2">

                            @if($item->status_verifikasi == 'Menunggu')

                            <form
                                action="{{ route('transaksi.absensi.setujui', $item->id) }}"
                                method="POST"
                                onsubmit="return confirm('Setujui absensi ini?')"
                            >
                                @csrf
                                <button type="submit" class="btn-setuju">
                                    <i class="bi bi-check-circle"></i>
                                    Setuju
                                </button>
                            </form>

                            <button
                                type="button"
                                class="btn-tolak"
                                data-bs-toggle="modal"
                                data-bs-target="#modalTolak{{ $item->id }}"
                            >
                                <i class="bi bi-x-circle"></i>
                                Tolak
                            </button>

                            @else

                            <a
                                href="{{ route('transaksi.absensi.edit', $item->id) }}"
                                class="btn-edit"
                            >
                                <i class="bi bi-pencil-square"></i>
                                Edit
                            </a>

                            <form
                                action="{{ route('transaksi.absensi.delete', $item->id) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?')"
                            >
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn-hapus">
                                    <i class="bi bi-trash"></i>
                                    Hapus
                                </button>
                            </form>

                            @endif

                        </div>

                    </td>
                    @endif

                </tr>

                @empty

                <tr>
                    <td colspan="11">

                        <div class="empty-state">
                            <i class="bi bi-inbox"></i>
                            <p>Belum ada data absensi</p>
                        </div>

                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

<script>

document.getElementById('searchInput').addEventListener('keyup', function(){

    const filter = this.value.toLowerCase();

    document.querySelectorAll('#dataTable tbody tr').forEach(row => {

        row.style.display =
            row.textContent.toLowerCase().includes(filter)
            ? ''
            : 'none';

    });

});

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@foreach($data as $item)
@if($role === 'dosen' || $role === 'staf_akademik')
<div class="modal fade" id="modalTolak{{ $item->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('transaksi.absensi.tolak', $item->id) }}" method="POST">
            @csrf
            <div class="modal-content" style="background:#1a1735;color:white;border:1px solid rgba(255,255,255,0.1);border-radius:20px;">
                <div class="modal-header" style="border-bottom:1px solid rgba(255,255,255,0.1);">
                    <h5 class="modal-title">Tolak Absensi</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p style="font-size:13px;color:rgba(255,255,255,0.7);">
                        {{ $item->nama_matkul }} — Pertemuan {{ $item->pertemuan_ke }} ({{ $item->tanggal }})
                        <br>{{ $item->nim }} · {{ $item->nama }}
                    </p>
                    <label class="form-label" style="font-size:13px;">Alasan Penolakan</label>
                    <textarea
                        name="alasan_penolakan"
                        class="form-control"
                        rows="3"
                        required
                        placeholder="Isi alasan mengapa absensi ini ditolak"
                        style="background:rgba(255,255,255,0.08);color:white;border:1px solid rgba(255,255,255,0.15);"
                    ></textarea>
                </div>
                <div class="modal-footer" style="border-top:1px solid rgba(255,255,255,0.1);">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Tolak Absensi</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endif
@endforeach

</body>
</html>