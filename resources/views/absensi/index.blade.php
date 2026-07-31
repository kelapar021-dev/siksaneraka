<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Absensi – SIAKAD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* ══════════════════════════════════════════
            DESIGN TOKENS — Biru Putih Akademik
        ══════════════════════════════════════════ */
        :root {
            --blue-900 : #0d2e6e;
            --blue-800 : #1a3f8f;
            --blue-700 : #1d4ed8;
            --blue-600 : #2563eb;
            --blue-500 : #3b82f6;
            --blue-400 : #60a5fa;
            --blue-100 : #dbeafe;
            --blue-50  : #eff6ff;
            --white    : #ffffff;
            --gray-50  : #f8fafc;
            --gray-100 : #f1f5f9;
            --gray-200 : #e2e8f0;
            --gray-400 : #94a3b8;
            --gray-600 : #475569;
            --gray-800 : #1e293b;
            --sidebar-w: 256px;
            --shadow-sm: 0 1px 3px rgba(0,0,0,.08);
            --shadow-md: 0 4px 16px rgba(37,99,235,.12);
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
        }

        * { font-family: 'Poppins', sans-serif; box-sizing: border-box; }
        body { background: var(--gray-100); color: var(--gray-800); min-height: 100vh; margin: 0; }

        /* ── SIDEBAR ────────────────────────────── */
        .sidebar {
            position: fixed; top: 0; left: 0; height: 100vh;
            width: var(--sidebar-w);
            background: var(--blue-900);
            display: flex; flex-direction: column;
            overflow-y: auto;
            z-index: 200;
            transition: transform .28s cubic-bezier(.4,0,.2,1);
        }
        .sidebar-brand {
            padding: 20px 18px 16px;
            border-bottom: 1px solid rgba(255,255,255,.1);
            display: flex; align-items: center; gap: 11px;
        }
        .brand-icon {
            width: 40px; height: 40px; border-radius: 10px;
            background: var(--blue-600);
            display: flex; align-items: center; justify-content: center;
            font-size: 19px; flex-shrink: 0;
            box-shadow: 0 2px 8px rgba(37,99,235,.45);
        }
        .brand-name { color: #fff; font-weight: 700; font-size: 15px; margin: 0; line-height: 1.2; }
        .brand-sub  { color: rgba(255,255,255,.45); font-size: 10px; margin: 0; }

        .nav-group-label {
            padding: 18px 18px 5px; margin: 0;
            font-size: 9.5px; font-weight: 700; letter-spacing: 1.4px;
            text-transform: uppercase; color: rgba(255,255,255,.35);
        }
        .nav-link-sb {
            display: flex; align-items: center; gap: 10px;
            padding: 9px 14px 9px 18px; margin: 1px 8px;
            border-radius: var(--radius-sm);
            font-size: 13px; font-weight: 500;
            color: rgba(255,255,255,.65);
            text-decoration: none;
            transition: background .18s, color .18s;
        }
        .nav-link-sb i { font-size: 16px; width: 20px; flex-shrink: 0; }
        .nav-link-sb:hover { background: rgba(255,255,255,.08); color: #fff; }
        .nav-link-sb.active {
            background: var(--blue-600); color: #fff;
            box-shadow: 0 2px 10px rgba(37,99,235,.5);
        }

        .sidebar-footer {
            margin-top: auto; padding: 14px;
            border-top: 1px solid rgba(255,255,255,.08);
        }
        .user-card-sb {
            background: rgba(255,255,255,.07);
            border: 1px solid rgba(255,255,255,.1);
            border-radius: var(--radius-md);
            padding: 10px 12px;
            display: flex; align-items: center; gap: 9px;
            margin-bottom: 9px;
        }
        .user-avatar-sb {
            width: 34px; height: 34px; border-radius: 50%; flex-shrink: 0;
            background: var(--blue-500);
            display: flex; align-items: center; justify-content: center;
            font-weight: 700; font-size: 13px; color: #fff;
        }
        .user-name-sb { font-size: 12.5px; font-weight: 600; color: #fff; margin: 0; }
        .user-role-sb { font-size: 10.5px; color: rgba(255,255,255,.5); margin: 0; }
        .badge-role-sb {
            margin-left: auto; padding: 3px 9px;
            border-radius: 20px; font-size: 10px; font-weight: 700; white-space: nowrap;
        }
        .role-admin     { background: #fbbf24; color: #78350f; }
        .role-dosen     { background: #34d399; color: #064e3b; }
        .role-mahasiswa { background: var(--blue-400); color: var(--blue-900); }
        .btn-logout-sb {
            display: flex; align-items: center; justify-content: center; gap: 7px;
            width: 100%; padding: 9px; border: none; border-radius: var(--radius-sm);
            background: rgba(239,68,68,.15); color: #fca5a5;
            font-size: 13px; font-weight: 600; cursor: pointer;
            text-decoration: none; transition: background .18s;
        }
        .btn-logout-sb:hover { background: rgba(239,68,68,.3); color: #fca5a5; }

        /* ── TOPBAR ──────────────────────────────── */
        .topbar {
            position: sticky; top: 0; z-index: 100;
            background: var(--white);
            border-bottom: 1px solid var(--gray-200);
            padding: 0 24px; height: 60px;
            display: flex; align-items: center; justify-content: space-between;
            box-shadow: var(--shadow-sm);
        }
        .topbar-left { display: flex; align-items: center; gap: 14px; }
        .btn-hamburger {
            display: none;
            background: var(--blue-50); border: 1px solid var(--blue-100);
            color: var(--blue-700); border-radius: var(--radius-sm);
            padding: 6px 9px; font-size: 18px; cursor: pointer;
        }
        .topbar-title { font-size: 16px; font-weight: 700; color: var(--gray-800); margin: 0; }
        .topbar-sub   { font-size: 11px; color: var(--gray-400); margin: 0; }
        .topbar-clock { font-size: 12px; color: var(--gray-400); }

        /* ── LAYOUT ──────────────────────────────── */
        .main-wrap { margin-left: var(--sidebar-w); display: flex; flex-direction: column; min-height: 100vh; }
        .page-content { flex: 1; padding: 24px; }

        /* ── STATS BAR ───────────────────────────── */
        .stats-bar { display: flex; gap: 14px; margin-bottom: 20px; flex-wrap: wrap; }
        .stat-item {
            background: var(--white); border: 1px solid var(--gray-200);
            border-radius: var(--radius-md); padding: 14px 18px;
            flex: 1; min-width: 140px; box-shadow: var(--shadow-sm);
            display: flex; flex-direction: column; justify-content: center;
        }
        .stat-number { font-size: 24px; font-weight: 700; color: var(--blue-900); line-height: 1.2; }
        .stat-label { font-size: 12px; color: var(--gray-600); margin: 4px 0 0 0; font-weight: 500; }

        .num-total { color: var(--blue-700); }
        .num-hadir { color: #16a34a; }
        .num-izin  { color: #2563eb; }
        .num-sakit { color: #d97706; }
        .num-alpha { color: #dc2626; }

        /* ── TABLE CARD ──────────────────────────── */
        .table-card {
            background: var(--white); border: 1px solid var(--gray-200);
            border-radius: var(--radius-lg); box-shadow: var(--shadow-sm);
            overflow: hidden;
        }
        .table-card-header {
            padding: 18px 22px; border-bottom: 1px solid var(--gray-100);
            display: flex; align-items: center; justify-content: space-between;
            flex-wrap: wrap; gap: 12px;
        }
        .table-card-title { font-size: 15px; font-weight: 700; color: var(--gray-800); margin: 0; }

        .role-info-bar {
            display: inline-flex; align-items: center; gap: 8px;
            background: var(--blue-50); border: 1px solid var(--blue-100);
            border-radius: var(--radius-sm); padding: 5px 12px; font-size: 12px; color: var(--blue-700);
        }
        .badge-role-bar { padding: 2px 9px; border-radius: 20px; font-size: 10px; font-weight: 700; }

        /* Search Box Style */
        .search-box-wrap { position: relative; width: 240px; }
        .search-box-wrap i { position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: var(--gray-400); font-size: 14px; }
        .search-box {
            background: var(--gray-50); border: 1px solid var(--gray-200);
            border-radius: var(--radius-sm); padding: 8px 12px 8px 36px;
            color: var(--gray-800); font-size: 13px; width: 100%; outline: none;
            transition: border-color .18s, background .18s;
        }
        .search-box:focus { background: var(--white); border-color: var(--blue-500); }
        .search-box::placeholder { color: var(--gray-400); }

        .btn-tambah {
            background: var(--blue-600); border: none; color: #fff;
            padding: 8px 18px; border-radius: var(--radius-sm);
            font-size: 13px; font-weight: 600;
            display: inline-flex; align-items: center; gap: 6px;
            cursor: pointer; text-decoration: none;
            transition: background .18s, box-shadow .18s;
        }
        .btn-tambah:hover { background: var(--blue-700); color: #fff; box-shadow: var(--shadow-md); }

        /* Info note */
        .info-note {
            margin: 16px 22px 0;
            background: #fefce8; border: 1px solid #fde68a;
            border-radius: var(--radius-sm); padding: 10px 16px;
            font-size: 12px; color: #92400e; display: flex; align-items: center; gap: 8px;
        }
        .info-note.info-blue { background: var(--blue-50); border-color: var(--blue-100); color: var(--blue-800); }

        /* ── TABLE ───────────────────────────────── */
        .table-wrap { overflow-x: auto; }
        table { width: 100%; min-width: 1200px; border-collapse: collapse; white-space: nowrap; }
        thead tr { background: var(--blue-800); }
        thead th {
            color: #fff !important; font-size: 12px; font-weight: 600;
            padding: 13px 12px !important; border: none !important;
            text-align: center; letter-spacing: .3px;
        }
        tbody td {
            font-size: 12.5px; padding: 12px 12px !important; border: none !important;
            border-bottom: 1px solid var(--gray-100) !important;
            color: var(--gray-800) !important; background: var(--white) !important;
            vertical-align: middle; text-align: center;
        }
        tbody tr:hover td { background: var(--blue-50) !important; }
        tbody tr:last-child td { border-bottom: none !important; }

        .badge-nim { background: var(--blue-50); color: var(--blue-700); padding: 3px 8px; border-radius: 6px; font-size: 11.5px; font-weight: 600; }
        .badge-meet { background: var(--gray-100); color: var(--gray-600); padding: 3px 8px; border-radius: 6px; font-size: 11.5px; font-weight: 500; }

        /* Attendance Status Pill */
        .badge-status { padding: 4px 12px; border-radius: 20px; font-size: 11.5px; font-weight: 600; display: inline-block; }
        .badge-hadir { background: #dcfce7; color: #15803d; }
        .badge-izin  { background: #eff6ff; color: #1d4ed8; }
        .badge-sakit { background: #fef9c3; color: #a16207; }
        .badge-alpha { background: #fee2e2; color: #b91c1c; }

        /* Action buttons */
        .btn-edit-row {
            background: #e0f2fe; color: #0369a1; border: none;
            padding: 5px 11px; border-radius: 6px;
            font-size: 11.5px; font-weight: 600; cursor: pointer;
            display: inline-flex; align-items: center; gap: 3px; text-decoration: none;
        }
        .btn-edit-row:hover { background: #bae6fd; color: #0369a1; }
        .btn-del-row {
            background: #fee2e2; color: #dc2626; border: none;
            padding: 5px 11px; border-radius: 6px;
            font-size: 11.5px; font-weight: 600; cursor: pointer;
            display: inline-flex; align-items: center; gap: 3px; text-decoration: none;
        }
        .btn-del-row:hover { background: #fecaca; color: #dc2626; }
        .readonly-badge {
            background: var(--gray-100); color: var(--gray-400);
            padding: 5px 11px; border-radius: 6px; font-size: 11.5px;
            display: inline-flex; align-items: center; gap: 3px;
        }

        /* Verification status pills */
        .badge-vf { padding: 4px 12px; border-radius: 20px; font-size: 11.5px; font-weight: 600; display: inline-block; }
        .vf-menunggu  { background: #fef9c3; color: #a16207; }
        .vf-disetujui { background: #dcfce7; color: #15803d; }
        .vf-ditolak   { background: #fee2e2; color: #b91c1c; }

        .alert-success-custom {
            background: #dcfce7; border: 1px solid #bbf7d0; color: #15803d;
            border-radius: var(--radius-sm); padding: 11px 16px;
            margin: 16px 22px 0; font-size: 13px; font-weight: 500;
            display: flex; align-items: center; gap: 8px;
        }

        .empty-state { text-align: center; padding: 60px 20px; color: var(--gray-400); }
        .empty-state i { font-size: 48px; margin-bottom: 12px; display: block; }

        /* Mobile Responsive */
        .sb-overlay { display: none; position: fixed; inset: 0; z-index: 199; background: rgba(15,23,42,.4); }
        .sb-overlay.show { display: block; }
        @media (max-width: 992px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.open { transform: translateX(0); box-shadow: 8px 0 32px rgba(0,0,0,.25); }
            .main-wrap { margin-left: 0; }
            .btn-hamburger { display: flex; }
            .page-content { padding: 16px; }
            .table-card-header { gap: 16px; }
            .search-box-wrap { width: 100%; }
        }
    </style>
</head>
<body>

@php
    $role     = session('role', 'mahasiswa');
    $username = session('username', 'Guest');
    $loginNim = session('nim');
@endphp

{{-- Overlay mobile --}}
<div class="sb-overlay" id="sbOverlay" onclick="toggleSidebar()"></div>

{{-- ═══════════════ SIDEBAR ═══════════════ --}}
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
    {{-- MENU KRS BARU --}}
    <a href="{{ route('krs.index') }}"            class="nav-link-sb {{ request()->routeIs('krs.*') ? 'active' : '' }}"><i class="bi bi-file-earmark-text-fill"></i> KRS</a>
    <a href="{{ route('jadwal.index') }}"         class="nav-link-sb"><i class="bi bi-calendar-week-fill"></i> Jadwal</a>
    <a href="{{ route('absensi.index') }}"        class="nav-link-sb active"><i class="bi bi-check-circle-fill"></i> Absensi</a>
    @if(in_array($role, ['dosen', 'staf_akademik']))
    <a href="{{ route('transaksi.absensi') }}" class="nav-link-sb"><i class="bi bi-check2-square"></i> Verifikasi Absensi</a>
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
                @else role-mahasiswa @endif">
                @if($role=='admin')👑@elseif($role=='dosen')🎓@else📚@endif
                {{ strtoupper($role) }}
            </span>
        </div>
        <a href="{{ route('logout') }}" class="btn-logout-sb">
            <i class="bi bi-box-arrow-right"></i> Logout
        </a>
    </div>
</aside>

{{-- ═══════════════ MAIN CONTENT ═══════════════════ --}}
<div class="main-wrap">

    {{-- TOPBAR --}}
    <div class="topbar">
        <div class="topbar-left">
            <button class="btn-hamburger" onclick="toggleSidebar()">
                <i class="bi bi-list"></i>
            </button>
            <div>
                <p class="topbar-title"><i class="bi bi-check-circle-fill me-1" style="color:var(--blue-600);"></i>Data Absensi</p>
                <p class="topbar-sub">Rekam kehadiran mahasiswa dan agenda materi perkuliahan</p>
            </div>
        </div>
        <span class="topbar-clock" id="clockDisplay"></span>
    </div>

    <div class="page-content">

        {{-- STATS BAR --}}
        <div class="stats-bar">
            <div class="stat-item">
                <div class="stat-number num-total">{{ $absensi->count() }}</div>
                <p class="stat-label">Total Absensi</p>
            </div>
            <div class="stat-item">
                <div class="stat-number num-hadir">{{ $absensi->where('status','Hadir')->count() }}</div>
                <p class="stat-label">✔ Hadir</p>
            </div>
            <div class="stat-item">
                <div class="stat-number num-izin">{{ $absensi->where('status','Izin')->count() }}</div>
                <p class="stat-label">📩 Izin</p>
            </div>
            <div class="stat-item">
                <div class="stat-number num-sakit">{{ $absensi->where('status','Sakit')->count() }}</div>
                <p class="stat-label">🏥 Sakit</p>
            </div>
            <div class="stat-item">
                <div class="stat-number num-alpha">{{ $absensi->where('status','Alpha')->count() }}</div>
                <p class="stat-label">❌ Alpha</p>
            </div>
        </div>

        <div class="table-card">

            {{-- Alert --}}
            @if(session('success'))
            <div class="alert-success-custom"><i class="bi bi-check-circle-fill"></i> {{ session('success') }}</div>
            @endif

            {{-- Info Konteks Akses --}}
            @if($role == 'admin')
            <div class="info-note">
                <i class="bi bi-info-circle-fill"></i>
                Sebagai <strong>Admin</strong>, Anda dapat melihat semua absensi dan menghapus data. Input & edit absensi dilakukan oleh Dosen.
            </div>
            @elseif($role == 'dosen')
            <div class="info-note info-blue">
                <i class="bi bi-info-circle-fill"></i>
                Sebagai <strong>Dosen</strong>, Anda dapat menginput dan mengedit absensi untuk kelas yang Anda ajar.
            </div>
            @elseif($role == 'mahasiswa')
            <div class="info-note info-blue">
                <i class="bi bi-info-circle-fill"></i>
                Sebagai <strong>Mahasiswa</strong>, Anda dapat menambahkan absensi untuk diri sendiri. Data akan diverifikasi oleh Dosen atau Staf TU sebelum masuk rekap.
            </div>
            @endif

            {{-- Header Card --}}
            <div class="table-card-header" style="margin-top: 16px;">
                <div class="d-flex align-items-center gap-3 flex-wrap">
                    <h5 class="table-card-title">
                        <i class="bi bi-list-task me-1" style="color:var(--blue-600);"></i>Log Absensi Perkuliahan
                    </h5>
                    <div class="role-info-bar">
                        <span class="badge-role-bar
                            @if($role=='admin') role-admin
                            @elseif($role=='dosen') role-dosen
                            @else role-mahasiswa @endif">
                            @if($role=='admin')👑@elseif($role=='dosen')🎓@else📚@endif
                            {{ strtoupper($role) }}
                        </span>
                        @if($role=='admin') Lihat & Hapus (R, D)
                        @elseif($role=='dosen') Input, Lihat & Edit (C, R, U)
                        @else Absensi Saya (C, R)
                        @endif
                    </div>
                </div>
                
                <div class="d-flex align-items-center gap-2 flex-wrap w-sm-100">
                    <div class="search-box-wrap">
                        <i class="bi bi-search"></i>
                        <input type="text" class="search-box" id="searchInput" placeholder="Cari absensi...">
                    </div>
                        @if($role == 'dosen')
                        <a href="{{ route('absensi.create') }}" class="btn-tambah">
                            <i class="bi bi-plus-circle-fill"></i> Input Absensi
                        </a>
                        @elseif($role == 'mahasiswa')
                        <a href="{{ route('transaksi.absensi.create') }}" class="btn-tambah">
                            <i class="bi bi-plus-circle-fill"></i> Isi Absensi Saya
                        </a>
                        @endif
                </div>
            </div>

            {{-- TABLE --}}
            <div class="table-wrap">
                <table id="dataTable">
                    <thead>
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Mata Kuliah</th>
                            <th>Dosen</th>
                            <th>Pertemuan</th>
                            <th>Tanggal</th>
                            <th>Topik</th>
                            <th>Status</th>
                            <th>Metode</th>
                            <th style="width: 140px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($absensi as $item)
                        <tr>
                            <td style="color:var(--gray-400);font-weight:500;">{{ $loop->iteration }}</td>
                            <td><span class="badge-nim">{{ $item->nim }}</span></td>
                            <td style="font-weight:600;color:var(--blue-900); text-align: left;">{{ $item->nama_mahasiswa }}</td>
                            <td style="text-align: left;">{{ $item->nama_matkul }}</td>
                            <td style="text-align: left;">{{ $item->nama_dosen }}</td>
                            <td><span class="badge-meet">Ke-{{ $item->pertemuan_ke }}</span></td>
                            <td style="color:var(--gray-600);">{{ $item->tanggal }}</td>
                            <td style="text-align: left; max-width: 180px;" class="text-truncate" title="{{ $item->topik ?? '-' }}">
                                {{ $item->topik ?? '-' }}
                            </td>
                            <td>
                                @if($item->status=='Hadir') <span class="badge-status badge-hadir">✔ Hadir</span>
                                @elseif($item->status=='Izin') <span class="badge-status badge-izin">📩 Izin</span>
                                @elseif($item->status=='Sakit') <span class="badge-status badge-sakit">🏥 Sakit</span>
                                @else <span class="badge-status badge-alpha">✘ Alpha</span>
                                @endif
                            </td>
                            <td><span class="badge-meet" style="background:var(--blue-50); color:var(--blue-600);">{{ $item->metode }}</span></td>
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    @if($role == 'admin')
                                        <a href="{{ route('absensi.destroy', $item->id) }}" class="btn-del-row"
                                           onclick="return confirm('Hapus data absensi ini?')">
                                            <i class="bi bi-trash-fill"></i> Hapus
                                        </a>
                                    @elseif($role == 'dosen')
                                        <a href="{{ route('absensi.edit', $item->id) }}" class="btn-edit-row">
                                            <i class="bi bi-pencil-fill"></i> Edit
                                        </a>
                                    @else
                                        <span class="readonly-badge"><i class="bi bi-eye-fill"></i> Hanya Lihat</span>
                                    @endif
                                </div>
                            </td>
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

            @if($role == 'mahasiswa' && count($selfReport) > 0)
            <div class="table-wrap" style="border-top: 2px solid var(--gray-100); margin-top: 8px;">
                <div style="padding: 14px 22px; background: var(--blue-50); border-bottom: 1px solid var(--blue-100);">
                    <h5 style="font-size: 14px; font-weight: 700; color: var(--blue-800); margin: 0;">
                        <i class="bi bi-person-check-fill me-1"></i> Absensi Saya (Self-Report) — Menunggu Verifikasi
                    </h5>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Mata Kuliah</th>
                            <th>Dosen</th>
                            <th>Pertemuan</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Verifikasi</th>
                            <th>Keterangan</th>
                            <th style="width: 140px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($selfReport as $item)
                        <tr>
                            <td style="color:var(--gray-400);font-weight:500;">{{ $loop->iteration }}</td>
                            <td><span class="badge-nim">{{ $item->nim }}</span></td>
                            <td style="font-weight:600;color:var(--blue-900); text-align: left;">{{ $item->nama_mahasiswa }}</td>
                            <td style="text-align: left;">{{ $item->nama_matkul }}</td>
                            <td style="text-align: left;">{{ $item->nama_dosen }}</td>
                            <td><span class="badge-meet">Ke-{{ $item->pertemuan_ke }}</span></td>
                            <td style="color:var(--gray-600);">{{ $item->tanggal }}</td>
                            <td>
                                @if($item->status_hadir=='Hadir') <span class="badge-status badge-hadir">✔ Hadir</span>
                                @elseif($item->status_hadir=='Izin') <span class="badge-status badge-izin">📩 Izin</span>
                                @elseif($item->status_hadir=='Sakit') <span class="badge-status badge-sakit">🏥 Sakit</span>
                                @else <span class="badge-status badge-alpha">✘ Alfa</span>
                                @endif
                            </td>
                            <td>
                                @if($item->status_verifikasi=='Disetujui') <span class="badge-vf vf-disetujui">✔ Disetujui</span>
                                @elseif($item->status_verifikasi=='Ditolak') <span class="badge-vf vf-ditolak" title="{{ $item->alasan_penolakan ?? '' }}">✘ Ditolak</span>
                                @else <span class="badge-vf vf-menunggu">⏳ Menunggu</span>
                                @endif
                            </td>
                            <td style="text-align: left; max-width: 180px;" class="text-truncate" title="{{ $item->keterangan ?? '-' }}">
                                {{ $item->keterangan ?? '-' }}
                            </td>
                            <td>
                                <span class="readonly-badge"><i class="bi bi-eye-fill"></i> Hanya Lihat</span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="11">
                                <div class="empty-state">
                                    <i class="bi bi-inbox"></i>
                                    <p>Belum ada absensi self-report</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @endif

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Fitur Live Search Pendeteksi Row Tabel
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const filter = this.value.toLowerCase();
        document.querySelectorAll('#dataTable tbody tr').forEach(row => {
            if(row.querySelector('.empty-state')) return;
            row.style.display = row.textContent.toLowerCase().includes(filter) ? '' : 'none';
        });
    });

    // Responsivitas Sidebar Mobile Toggle
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('open');
        document.getElementById('sbOverlay').classList.toggle('show');
    }

    // Realtime Clock Topbar
    (function tick() {
        const d = new Date();
        document.getElementById('clockDisplay').textContent =
            d.toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })
            + ' · ' + d.toLocaleTimeString('id-ID');
        setTimeout(tick, 1000);
    })();
</script>
</body>
</html>
