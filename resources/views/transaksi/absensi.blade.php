<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Absensi – SIAKAD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root{--blue-900:#0d2e6e;--blue-800:#1a3f8f;--blue-700:#1d4ed8;--blue-600:#2563eb;--blue-500:#3b82f6;--blue-400:#60a5fa;--blue-100:#dbeafe;--blue-50:#eff6ff;--white:#ffffff;--gray-50:#f8fafc;--gray-100:#f1f5f9;--gray-200:#e2e8f0;--gray-400:#94a3b8;--gray-600:#475569;--gray-800:#1e293b;--sidebar-w:256px;--shadow-sm:0 1px 3px rgba(0,0,0,.08);--shadow-md:0 4px 16px rgba(37,99,235,.12);--radius-sm:8px;--radius-md:12px;--radius-lg:16px;}
        *{font-family:'Poppins',sans-serif;box-sizing:border-box;}
        body{background:var(--gray-100);color:var(--gray-800);min-height:100vh;margin:0;}

        /* SIDEBAR */
        .sidebar{position:fixed;top:0;left:0;height:100vh;width:var(--sidebar-w);background:var(--blue-900);display:flex;flex-direction:column;overflow-y:auto;z-index:200;transition:transform .28s cubic-bezier(.4,0,.2,1);}
        .sidebar-brand{padding:20px 18px 16px;border-bottom:1px solid rgba(255,255,255,.1);display:flex;align-items:center;gap:11px;}
        .brand-icon{width:40px;height:40px;border-radius:10px;background:var(--blue-600);display:flex;align-items:center;justify-content:center;font-size:19px;flex-shrink:0;box-shadow:0 2px 8px rgba(37,99,235,.45);}
        .brand-name{color:#fff;font-weight:700;font-size:15px;margin:0;line-height:1.2;}
        .brand-sub{color:rgba(255,255,255,.45);font-size:10px;margin:0;}
        .nav-group-label{padding:18px 18px 5px;margin:0;font-size:9.5px;font-weight:700;letter-spacing:1.4px;text-transform:uppercase;color:rgba(255,255,255,.35);}
        .nav-link-sb{display:flex;align-items:center;gap:10px;padding:9px 14px 9px 18px;margin:1px 8px;border-radius:var(--radius-sm);font-size:13px;font-weight:500;color:rgba(255,255,255,.65);text-decoration:none;transition:background .18s,color .18s;}
        .nav-link-sb i{font-size:16px;width:20px;flex-shrink:0;}
        .nav-link-sb:hover{background:rgba(255,255,255,.08);color:#fff;}
        .nav-link-sb.active{background:var(--blue-600);color:#fff;box-shadow:0 2px 10px rgba(37,99,235,.5);}
        .sidebar-footer{margin-top:auto;padding:14px;border-top:1px solid rgba(255,255,255,.08);}
        .user-card-sb{background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.1);border-radius:var(--radius-md);padding:10px 12px;display:flex;align-items:center;gap:9px;margin-bottom:9px;}
        .user-avatar-sb{width:34px;height:34px;border-radius:50%;flex-shrink:0;background:var(--blue-500);display:flex;align-items:center;justify-content:center;font-weight:700;font-size:13px;color:#fff;}
        .user-name-sb{font-size:12.5px;font-weight:600;color:#fff;margin:0;}
        .user-role-sb{font-size:10.5px;color:rgba(255,255,255,.5);margin:0;}
        .badge-role-sb{margin-left:auto;padding:3px 9px;border-radius:20px;font-size:10px;font-weight:700;white-space:nowrap;}
        .role-admin{background:#fbbf24;color:#78350f;}
        .role-dosen{background:#34d399;color:#064e3b;}
        .role-staf{background:#a5b4fc;color:#312e81;}
        .role-mahasiswa{background:var(--blue-400);color:var(--blue-900);}
        .btn-logout-sb{display:flex;align-items:center;justify-content:center;gap:7px;width:100%;padding:9px;border:none;border-radius:var(--radius-sm);background:rgba(239,68,68,.15);color:#fca5a5;font-size:13px;font-weight:600;cursor:pointer;text-decoration:none;transition:background .18s;}
        .btn-logout-sb:hover{background:rgba(239,68,68,.3);color:#fca5a5;}

        /* TOPBAR */
        .topbar{position:sticky;top:0;z-index:100;background:var(--white);border-bottom:1px solid var(--gray-200);padding:0 24px;height:60px;display:flex;align-items:center;justify-content:space-between;box-shadow:var(--shadow-sm);}
        .topbar-left{display:flex;align-items:center;gap:14px;}
        .btn-hamburger{display:none;background:var(--blue-50);border:1px solid var(--blue-100);color:var(--blue-700);border-radius:var(--radius-sm);padding:6px 9px;font-size:18px;cursor:pointer;}
        .topbar-title{font-size:16px;font-weight:700;color:var(--gray-800);margin:0;}
        .topbar-sub{font-size:11px;color:var(--gray-400);margin:0;}
        .topbar-clock{font-size:12px;color:var(--gray-400);}

        /* LAYOUT */
        .main-wrap{margin-left:var(--sidebar-w);display:flex;flex-direction:column;min-height:100vh;}
        .page-content{flex:1;padding:24px;}

        /* CARD */
        .main-card{background:var(--white);border:1px solid var(--gray-200);border-radius:var(--radius-lg);box-shadow:var(--shadow-sm);padding:24px;}
        .page-header-block{display:flex;align-items:center;justify-content:space-between;border-bottom:1px solid var(--gray-100);padding-bottom:16px;margin-bottom:20px;flex-wrap:wrap;gap:12px;}
        .page-title-text{font-size:16px;font-weight:700;color:var(--gray-800);margin:0;}

        /* STATS */
        .stats-row{display:grid;grid-template-columns:repeat(5,1fr);gap:14px;margin-bottom:24px;}
        .stat-item{background:var(--gray-50);border:1px solid var(--gray-200);border-radius:var(--radius-md);padding:16px;display:flex;align-items:center;gap:12px;}
        .stat-icon{width:42px;height:42px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:18px;flex-shrink:0;}
        .stat-num{font-size:22px;font-weight:700;line-height:1.1;}
        .stat-lbl{font-size:11.5px;color:var(--gray-600);margin:0;}
        .si-total{background:var(--blue-50);color:var(--blue-600);}
        .si-hadir{background:#dcfce7;color:#16a34a;}
        .si-izin{background:#dbeafe;color:#2563eb;}
        .si-sakit{background:#fef9c3;color:#ca8a04;}
        .si-alfa{background:#fee2e2;color:#dc2626;}

        /* HEADER ACTION */
        .btn-primary-custom{background:var(--blue-600);border:none;color:#fff;padding:9px 16px;border-radius:var(--radius-sm);font-size:13px;font-weight:600;text-decoration:none;display:inline-flex;align-items:center;gap:6px;transition:background .15s;}
        .btn-primary-custom:hover{background:var(--blue-700);color:#fff;}
        .btn-outline-custom{background:var(--white);border:1px solid var(--gray-200);color:var(--gray-600);padding:9px 16px;border-radius:var(--radius-sm);font-size:13px;font-weight:600;text-decoration:none;display:inline-flex;align-items:center;gap:6px;transition:all .15s;}
        .btn-outline-custom:hover{background:var(--gray-50);border-color:var(--blue-200);color:var(--blue-700);}
        .search-box{background:var(--white);border:1px solid var(--gray-200);border-radius:var(--radius-sm);padding:9px 14px;font-size:13px;width:240px;outline:none;transition:border-color .15s,box-shadow .15s;}
        .search-box:focus{border-color:var(--blue-400);box-shadow:0 0 0 3px rgba(37,99,235,.1);}

        /* TABLE */
        .table-wrap{overflow-x:auto;border:1px solid var(--gray-200);border-radius:var(--radius-md);}
        table{min-width:900px;white-space:nowrap;margin:0;}
        thead th{background:var(--gray-50);color:var(--gray-800);font-weight:700;font-size:12px;padding:13px 14px !important;border-bottom:1px solid var(--gray-200) !important;text-transform:uppercase;letter-spacing:.3px;}
        tbody td{padding:12px 14px !important;font-size:13px;color:var(--gray-600);border-color:var(--gray-100) !important;}
        tbody tr:hover td{background:var(--gray-50);}
        .badge-nim{background:var(--blue-50);color:var(--blue-700);padding:3px 9px;border-radius:6px;font-size:11.5px;font-weight:600;}
        .txt-nama{font-weight:600;color:var(--blue-900);}

        /* BADGE VERIFIKASI */
        .badge-vf{padding:4px 11px;border-radius:20px;font-size:11.5px;font-weight:600;display:inline-flex;align-items:center;gap:4px;}
        .badge-menunggu{background:#fef3c7;color:#b45309;}
        .badge-disetujui{background:#dcfce7;color:#166534;}
        .badge-ditolak{background:#fee2e2;color:#991b1b;}

        /* AKSI */
        .btn-setuju{background:#dcfce7;border:1px solid #86efac;color:#15803d;padding:6px 14px;border-radius:var(--radius-sm);font-size:12px;font-weight:600;text-decoration:none;display:inline-flex;align-items:center;gap:5px;transition:all .15s;}
        .btn-setuju:hover{background:#bbf7d0;color:#14532d;}
        .btn-tolak{background:#fee2e2;border:1px solid #fca5a5;color:#b91c1c;padding:6px 14px;border-radius:var(--radius-sm);font-size:12px;font-weight:600;text-decoration:none;display:inline-flex;align-items:center;gap:5px;transition:all .15s;}
        .btn-tolak:hover{background:#fecaca;color:#7f1d1d;}

        .empty-state{text-align:center;padding:56px 20px;color:var(--gray-400);}
        .empty-state i{font-size:44px;margin-bottom:10px;display:block;color:var(--gray-200);}

        /* INFO NOTE */
        .info-note{background:var(--blue-50);border:1px solid var(--blue-100);color:var(--blue-800);border-radius:var(--radius-sm);padding:11px 15px;margin-bottom:18px;font-size:12.5px;display:flex;align-items:center;gap:8px;}

        .sb-overlay{display:none;position:fixed;inset:0;z-index:199;background:rgba(15,23,42,.4);}
        .sb-overlay.show{display:block;}
        @media(max-width:992px){
            .sidebar{transform:translateX(-100%);}
            .sidebar.open{transform:translateX(0);box-shadow:8px 0 32px rgba(0,0,0,.25);}
            .main-wrap{margin-left:0;}
            .btn-hamburger{display:flex;}
            .page-content{padding:16px;}
            .stats-row{grid-template-columns:repeat(2,1fr);}
            .search-box{width:100%;}
        }
    </style>
</head>
<body>

@php
    $role     = session('role', 'mahasiswa');
    $username = session('username', 'Guest');
@endphp

<div class="sb-overlay" id="sbOverlay" onclick="toggleSidebar()"></div>

<!-- SIDEBAR -->
<aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <div class="brand-icon">🎓</div>
        <div>
            <p class="brand-name">SIAKAD</p>
            <p class="brand-sub">Sistem Informasi Akademik</p>
        </div>
    </div>

    @if($role !== 'mahasiswa')
    <p class="nav-group-label">Master Data</p>
    <a href="{{ route('data-mahasiswa') }}" class="nav-link-sb"><i class="bi bi-people-fill"></i> Mahasiswa</a>
    <a href="{{ route('dosen.index') }}"    class="nav-link-sb"><i class="bi bi-person-badge-fill"></i> Dosen</a>
    <a href="{{ route('matkul.index') }}"   class="nav-link-sb"><i class="bi bi-book-fill"></i> Mata Kuliah</a>
    <a href="{{ route('ruangan.index') }}"  class="nav-link-sb"><i class="bi bi-building"></i> Ruangan</a>
    <a href="{{ route('tahun.index') }}"    class="nav-link-sb"><i class="bi bi-calendar3"></i> Tahun Akademik</a>
    @endif

    <p class="nav-group-label">{{ $role === 'mahasiswa' ? 'Menu' : 'Transaksi' }}</p>
    @if($role === 'mahasiswa')
    <a href="{{ route('data-mahasiswa') }}" class="nav-link-sb"><i class="bi bi-person-fill"></i> Profil Saya</a>
    @endif
    <a href="{{ route('krs.index') }}"           class="nav-link-sb"><i class="bi bi-card-checklist"></i> KRS</a>
    <a href="{{ route('jadwal.index') }}"         class="nav-link-sb"><i class="bi bi-calendar-week-fill"></i> Jadwal</a>
    <a href="{{ route('absensi.index') }}"        class="nav-link-sb"><i class="bi bi-check-circle-fill"></i> Absensi</a>
    @if(in_array($role, ['dosen', 'staf_akademik']))
    <a href="{{ route('transaksi.absensi') }}"    class="nav-link-sb active"><i class="bi bi-check2-square"></i> Verifikasi Absensi</a>
    @endif
    <a href="{{ route('rekap.index') }}"          class="nav-link-sb"><i class="bi bi-bar-chart-fill"></i> Rekap</a>
    <a href="{{ route('notifikasi.index') }}"     class="nav-link-sb"><i class="bi bi-bell-fill"></i> Notifikasi</a>
    <a href="{{ route('transaksi.pembayaran') }}" class="nav-link-sb"><i class="bi bi-credit-card-fill"></i> Pembayaran</a>
    <a href="{{ route('transaksi.nilai') }}"      class="nav-link-sb"><i class="bi bi-pencil-fill"></i> Nilai</a>
    <a href="{{ route('fuzzy.index') }}" class="nav-link-sb {{ request()->routeIs('fuzzy.*') ? 'active' : '' }}"><i class="bi bi-braces-asterisk"></i> Fuzzy Evaluasi</a>

    <div class="sidebar-footer">
        <div class="user-card-sb">
            <div class="user-avatar-sb">{{ strtoupper(substr($username, 0, 1)) }}</div>
            <div style="flex:1;min-width:0;">
                <p class="user-name-sb text-truncate">{{ $username }}</p>
                <p class="user-role-sb">{{ ucfirst($role) }}</p>
            </div>
            <span class="badge-role-sb
                @if($role=='admin') role-admin
                @elseif($role=='dosen') role-dosen
                @elseif($role=='staf_akademik') role-staf
                @else role-mahasiswa @endif">
                @if($role=='admin')👑@elseif($role=='dosen')🎓@elseif($role=='staf_akademik')🛡️@else📚@endif
                {{ $role=='staf_akademik' ? 'STAF' : strtoupper($role) }}
            </span>
        </div>
        <a href="{{ route('logout') }}" class="btn-logout-sb">
            <i class="bi bi-box-arrow-right"></i> Logout
        </a>
    </div>
</aside>

<!-- MAIN -->
<div class="main-wrap">
    <div class="topbar">
        <div class="topbar-left">
            <button class="btn-hamburger" onclick="toggleSidebar()"><i class="bi bi-list"></i></button>
            <div>
                <p class="topbar-title"><i class="bi bi-check2-square me-1" style="color:var(--blue-600);"></i>Verifikasi Absensi</p>
                <p class="topbar-sub">Setujui atau tolak isian absensi mahasiswa</p>
            </div>
        </div>
        <span class="topbar-clock" id="clockDisplay"></span>
    </div>

    <div class="page-content">
        <div class="main-card">

            @if(session('success'))
            <div class="alert alert-success" style="font-size:13px;border-radius:var(--radius-sm);">
                <i class="bi bi-check-circle-fill me-1"></i>{{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger" style="font-size:13px;border-radius:var(--radius-sm);">
                <i class="bi bi-x-circle-fill me-1"></i>{{ session('error') }}
            </div>
            @endif

            @if($role === 'dosen')
            <div class="info-note">
                <i class="bi bi-info-circle-fill"></i>
                Anda melihat isian absensi mahasiswa untuk kelas yang Anda ajar.
            </div>
            @elseif($role === 'staf_akademik')
            <div class="info-note">
                <i class="bi bi-info-circle-fill"></i>
                Sebagai Staf TU, Anda dapat memverifikasi absensi seluruh mahasiswa.
            </div>
            @endif

            {{-- STATS --}}
            <div class="stats-row">
                <div class="stat-item">
                    <div class="stat-icon si-total"><i class="bi bi-calendar-check"></i></div>
                    <div>
                        <div class="stat-num">{{ $data->count() }}</div>
                        <p class="stat-lbl">Total Absensi</p>
                    </div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon si-hadir"><i class="bi bi-check-circle"></i></div>
                    <div>
                        <div class="stat-num">{{ $data->where('status_hadir','Hadir')->count() }}</div>
                        <p class="stat-lbl">Hadir</p>
                    </div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon si-izin"><i class="bi bi-envelope"></i></div>
                    <div>
                        <div class="stat-num">{{ $data->where('status_hadir','Izin')->count() }}</div>
                        <p class="stat-lbl">Izin</p>
                    </div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon si-sakit"><i class="bi bi-heart-pulse"></i></div>
                    <div>
                        <div class="stat-num">{{ $data->where('status_hadir','Sakit')->count() }}</div>
                        <p class="stat-lbl">Sakit</p>
                    </div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon si-alfa"><i class="bi bi-x-circle"></i></div>
                    <div>
                        <div class="stat-num">{{ $data->where('status_hadir','Alfa')->count() }}</div>
                        <p class="stat-lbl">Alfa</p>
                    </div>
                </div>
            </div>

            {{-- HEADER --}}
            <div class="page-header-block">
                <h5 class="page-title-text">
                    <i class="bi bi-list-ul me-1" style="color:var(--blue-600);"></i>
                    Data Verifikasi Absensi
                </h5>
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <input type="text" class="search-box" id="searchInput" placeholder="Cari data...">
                    @if($role === 'dosen' || $role === 'staf_akademik')
                    <form action="{{ route('transaksi.absensi.hitung-rekap') }}" method="POST"
                          onsubmit="return confirm('Hitung rekap absensi sekarang?')" class="m-0">
                        @csrf
                        <button type="submit" class="btn-outline-custom">
                            <i class="bi bi-calculator"></i> Hitung Rekap
                        </button>
                    </form>
                    @endif
                    @if($role !== 'admin')
                    <a href="{{ route('transaksi.absensi.create') }}" class="btn-primary-custom">
                        <i class="bi bi-plus-circle"></i>
                        {{ $role === 'mahasiswa' ? 'Isi Absensi Saya' : 'Tambah Absensi' }}
                    </a>
                    @endif
                </div>
            </div>

            {{-- TABLE --}}
            <div class="table-wrap">
                <table class="table table-hover align-middle text-center" id="dataTable">
                    <thead>
                        <tr>
                            <th style="width:50px;">No</th>
                            <th>Nama Mahasiswa</th>
                            <th>Mata Kuliah</th>
                            <th>Semester</th>
                            @if($role === 'mahasiswa')
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Verifikasi</th>
                            @else
                            <th>Status</th>
                            <th>Verifikasi</th>
                            <th style="width:210px;">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="txt-nama">
                                {{ $item->nama }}
                                @if($role !== 'mahasiswa')
                                <div><span class="badge-nim">{{ $item->nim }}</span></div>
                                @endif
                            </td>
                            <td>
                                {{ $item->nama_matkul }}
                                <div style="color:var(--gray-400);font-size:11.5px;">{{ $item->nama_dosen }}</div>
                            </td>
                            <td>
                                <span style="background:var(--gray-50);border:1px solid var(--gray-200);padding:3px 10px;border-radius:6px;font-size:12px;font-weight:600;">
                                    {{ $item->semester ? 'Semester ' . $item->semester : '-' }}
                                </span>
                            </td>
                            @if($role === 'mahasiswa')
                            <td>{{ $item->tanggal }}</td>
                            @endif
                            <td>
                                @if($item->status_hadir == 'Hadir')
                                    <span class="badge-vf badge-disetujui"><i class="bi bi-check-circle"></i> Hadir</span>
                                @elseif($item->status_hadir == 'Izin')
                                    <span class="badge-vf badge-izin" style="background:#dbeafe;color:#2563eb;"><i class="bi bi-envelope"></i> Izin</span>
                                @elseif($item->status_hadir == 'Sakit')
                                    <span class="badge-vf badge-menunggu" style="background:#fef3c7;color:#b45309;"><i class="bi bi-heart-pulse"></i> Sakit</span>
                                @else
                                    <span class="badge-vf badge-ditolak"><i class="bi bi-x-circle"></i> Alfa</span>
                                @endif
                            </td>
                            <td>
                                @if($item->status_verifikasi == 'Disetujui')
                                    <span class="badge-vf badge-disetujui"><i class="bi bi-check-all"></i> Disetujui</span>
                                @elseif($item->status_verifikasi == 'Ditolak')
                                    <span class="badge-vf badge-ditolak" title="{{ $item->alasan_penolakan ?? '' }}"><i class="bi bi-x-octagon"></i> Ditolak</span>
                                @else
                                    <span class="badge-vf badge-menunggu"><i class="bi bi-hourglass-split"></i> Menunggu</span>
                                @endif
                            </td>
                            @if($role === 'dosen' || $role === 'staf_akademik')
                            <td>
                                @if($item->status_verifikasi == 'Menunggu')
                                <div class="d-flex justify-content-center gap-2">
                                    <form action="{{ route('transaksi.absensi.setujui', $item->id) }}" method="POST"
                                          onsubmit="return confirm('Setujui absensi ini?')" class="m-0">
                                        @csrf
                                        <button type="submit" class="btn-setuju">
                                            <i class="bi bi-check-circle"></i> Setuju
                                        </button>
                                    </form>
                                    <button type="button" class="btn-tolak"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalTolak{{ $item->id }}">
                                        <i class="bi bi-x-circle"></i> Tolak
                                    </button>
                                </div>
                                @else
                                <span style="color:var(--gray-400);font-size:12px;font-weight:500;">Selesai</span>
                                @endif
                            </td>
                            @endif
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8">
                                <div class="empty-state">
                                    <i class="bi bi-inbox"></i>
                                    <p class="mb-0">Belum ada data absensi.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

{{-- MODAL TOLAK --}}
@foreach($data as $item)
@if(($role === 'dosen' || $role === 'staf_akademik') && $item->status_verifikasi == 'Menunggu')
<div class="modal fade" id="modalTolak{{ $item->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('transaksi.absensi.tolak', $item->id) }}" method="POST">
            @csrf
            <div class="modal-content" style="border-radius:var(--radius-md);border:1px solid var(--gray-200);">
                <div class="modal-header" style="border-bottom:1px solid var(--gray-100);">
                    <h5 class="modal-title" style="font-size:15px;font-weight:700;color:var(--gray-800);">
                        <i class="bi bi-x-octagon me-1 text-danger"></i>Tolak Absensi
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p style="font-size:13px;color:var(--gray-600);">
                        {{ $item->nama_matkul }} — Semester {{ $item->semester ?? '-' }}
                        <br>{{ $item->nim }} · {{ $item->nama }}
                    </p>
                    <label class="form-label" style="font-size:13px;font-weight:600;color:var(--gray-600);">Alasan Penolakan</label>
                    <textarea name="alasan_penolakan" class="form-control" rows="3" required
                              placeholder="Isi alasan mengapa absensi ini ditolak"
                              style="border-radius:var(--radius-sm);border-color:var(--gray-200);font-size:13px;"></textarea>
                </div>
                <div class="modal-footer" style="border-top:1px solid var(--gray-100);">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-x-circle me-1"></i> Tolak Absensi
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endif
@endforeach

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function toggleSidebar(){
        document.getElementById('sidebar').classList.toggle('open');
        document.getElementById('sbOverlay').classList.toggle('show');
    }
    (function tick(){
        const d=new Date();
        document.getElementById('clockDisplay').textContent=
            d.toLocaleDateString('id-ID',{weekday:'long',year:'numeric',month:'long',day:'numeric'})
            +' · '+d.toLocaleTimeString('id-ID');
        setTimeout(tick,1000);
    })();

    document.getElementById('searchInput').addEventListener('keyup', function(){
        const filter = this.value.toLowerCase();
        document.querySelectorAll('#dataTable tbody tr').forEach(row => {
            row.style.display =
                row.textContent.toLowerCase().includes(filter)
                ? '' : 'none';
        });
    });
</script>
</body>
</html>
