<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Absensi – SIAKAD</title>
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

        /* ── SIDEBAR (SADBAR) ────────────────────── */
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
        table { width: 100%; min-width: 1000px; border-collapse: collapse; white-space: nowrap; }
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

        /* Design Elements inside Table */
        .badge-nim { background: var(--blue-50); color: var(--blue-700); padding: 3px 8px; border-radius: 6px; font-size: 11.5px; font-weight: 600; }
        
        .cnt-hadir { color: #16a34a; font-weight: 700; }
        .cnt-izin  { color: #2563eb; font-weight: 700; }
        .cnt-sakit { color: #d97706; font-weight: 700; }
        .cnt-alpha { color: #dc2626; font-weight: 700; }

        /* Custom Progress Bar Attendance */
        .progress-container { display: flex; align-items: center; gap: 8px; justify-content: center; width: 150px; margin: 0 auto; }
        .progress-track { flex: 1; height: 6px; border-radius: 10px; background: var(--gray-200); overflow: hidden; }
        .progress-fill { height: 100%; border-radius: 10px; transition: width .3s ease; }
        .fill-safe { background: linear-gradient(90deg, #22c55e, #4ade80); }
        .fill-danger { background: linear-gradient(90deg, #ef4444, #f87171); }
        
        .txt-safe { color: #16a34a; font-weight: 700; }
        .txt-danger { color: #dc2626; font-weight: 700; }

        /* Status Pills */
        .status-pill { padding: 4px 12px; border-radius: 20px; font-size: 11.5px; font-weight: 600; display: inline-block; }
        .pill-safe { background: #dcfce7; color: #15803d; }
        .pill-danger { background: #fee2e2; color: #b91c1c; }

        /* Empty state */
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
    $loginNip = session('nip');
@endphp

{{-- Overlay mobile --}}
<div class="sb-overlay" id="sbOverlay" onclick="toggleSidebar()"></div>

{{-- ═══════════════ SIDEBAR (SADBAR) ═══════════════ --}}
<aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <div class="brand-icon">🎓</div>
        <div>
            <p class="brand-name">SIAKAD</p>
            <p class="brand-sub">Sistem Informasi Academic</p>
        </div>
    </div>

    @if($role !== 'mahasiswa')
    <p class="nav-group-label">Master Data</p>
    <a href="{{ route('data-mahasiswa') }}" class="nav-link-sb"><i class="bi bi-people-fill"></i> Mahasiswa</a>
    <a href="{{ route('dosen.index') }}"    class="nav-link-sb"><i class="bi bi-person-badge-fill"></i> Dosen</a>
    <a href="{{ route('matkul.index') }}"   class="nav-link-sb"><i class="bi bi-book-fill"></i> Mata Kuliah</a>
    <a href="{{ route('ruangan.index') }}"  class="nav-link-sb"><i class="bi bi-building"></i> Ruangan</a>
    <a href="{{ route('tahun.index') }}"    class="nav-link-sb"><i class="bi bi-calendar3"></i> Tahun Academic</a>
    @endif

    <p class="nav-group-label">{{ $role === 'mahasiswa' ? 'Menu' : 'Transaksi' }}</p>
    @if($role === 'mahasiswa')
    <a href="{{ route('data-mahasiswa') }}" class="nav-link-sb"><i class="bi bi-person-fill"></i> Profil Saya</a>
    @endif
    <a href="{{ route('jadwal.index') }}"         class="nav-link-sb"><i class="bi bi-calendar-week-fill"></i> Jadwal</a>
    <a href="{{ route('krs.index') }}"            class="nav-link-sb {{ Request::routeIs('krs.index') ? 'active' : '' }}"><i class="bi bi-file-earmark-text-fill"></i> KRS</a>
    <a href="{{ route('absensi.index') }}"        class="nav-link-sb"><i class="bi bi-check-circle-fill"></i> Absensi</a>
    <a href="{{ route('rekap.index') }}"          class="nav-link-sb active"><i class="bi bi-bar-chart-fill"></i> Rekap</a>
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
                <p class="topbar-title"><i class="bi bi-bar-chart-fill me-1" style="color:var(--blue-600);"></i>Rekap Absensi</p>
                <p class="topbar-sub">Akumulasi presentase kehadiran mahasiswa per mata kuliah</p>
            </div>
        </div>
        <span class="topbar-clock" id="clockDisplay"></span>
    </div>

    <div class="page-content">

        <div class="table-card">

            {{-- Info Konteks Akses --}}
            @if($role == 'admin')
            <div class="info-note">
                <i class="bi bi-info-circle-fill"></i>
                Sebagai <strong>Admin</strong>, Anda dapat melihat rekap absensi seluruh mahasiswa.
            </div>
            @elseif($role == 'dosen')
            <div class="info-note info-blue">
                <i class="bi bi-info-circle-fill"></i>
                Sebagai <strong>Dosen</strong>, Anda melihat rekap mahasiswa untuk kelas yang Anda ajar.
            </div>
            @elseif($role == 'mahasiswa')
            <div class="info-note info-blue">
                <i class="bi bi-info-circle-fill"></i>
                Sebagai <strong>Mahasiswa</strong>, Anda melihat rekap kehadiran dan nilai Anda sendiri (KHS/Transkrip).
            </div>
            @endif

            {{-- Header Card --}}
            <div class="table-card-header" style="margin-top: 16px;">
                <div class="d-flex align-items-center gap-3 flex-wrap">
                    <h5 class="table-card-title">
                        <i class="bi bi-list-stars me-1" style="color:var(--blue-600);"></i>
                        @if($role == 'mahasiswa') Rekap Kehadiran Saya
                        @elseif($role == 'dosen') Rekap Kelas yang Diajar
                        @else Rekap Absensi Mahasiswa
                        @endif
                    </h5>
                    <div class="role-info-bar">
                        <span class="badge-role-bar
                            @if($role=='admin') role-admin
                            @elseif($role=='dosen') role-dosen
                            @else role-mahasiswa @endif">
                            @if($role=='admin')👑@elseif($role=='dosen')🎓@else📚@endif
                            {{ strtoupper($role) }}
                        </span>
                        @if($role=='admin') Semua Rekap (R)
                        @elseif($role=='dosen') Rekap Kelas Sendiri (R)
                        @else KHS / Transkrip (R)
                        @endif
                    </div>
                </div>
                
                <div class="search-box-wrap">
                    <i class="bi bi-search"></i>
                    <input type="text" class="search-box" id="searchInput" placeholder="Cari rekap...">
                </div>
            </div>

            {{-- TABLE REKAP --}}
            <div class="table-wrap">
                <table id="dataTable">
                    <thead>
                        <tr>
                            <th style="width: 50px;">No</th>
                            @if(in_array($role, ['admin', 'dosen']))
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            @endif
                            <th>Mata Kuliah</th>
                            @if(in_array($role, ['admin', 'dosen']))
                            <th>Dosen</th>
                            @endif
                            <th style="width: 70px;">Hadir</th>
                            <th style="width: 70px;">Izin</th>
                            <th style="width: 70px;">Sakit</th>
                            <th style="width: 70px;">Alpha</th>
                            <th>% Hadir</th>
                            <th style="width: 130px;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($rekap as $item)
                        <tr>
                            <td style="color:var(--gray-400); font-weight: 500;">{{ $loop->iteration }}</td>

                            @if(in_array($role, ['admin', 'dosen']))
                            <td><span class="badge-nim">{{ $item->nim }}</span></td>
                            <td style="font-weight:600; color:var(--blue-900); text-align: left;">{{ $item->nama_mahasiswa }}</td>
                            @endif

                            <td style="text-align: left;">{{ $item->nama_matkul }}</td>

                            @if(in_array($role, ['admin', 'dosen']))
                            <td style="text-align: left;">{{ $item->nama_dosen }}</td>
                            @endif

                            <td><span class="cnt-hadir">{{ $item->total_hadir }}</span></td>
                            <td><span class="cnt-izin">{{ $item->total_izin }}</span></td>
                            <td><span class="cnt-sakit">{{ $item->total_sakit }}</span></td>
                            <td><span class="cnt-alpha">{{ $item->total_alpha }}</span></td>
                            <td>
                                <div class="progress-container">
                                    <div class="progress-track">
                                        <div class="progress-fill {{ $item->persentase_hadir >= 75 ? 'fill-safe' : 'fill-danger' }}" 
                                             style="width: {{ $item->persentase_hadir }}%;"></div>
                                    </div>
                                    <span class="{{ $item->persentase_hadir >= 75 ? 'txt-safe' : 'txt-danger' }}">
                                        {{ $item->persentase_hadir }}%
                                    </span>
                                </div>
                            </td>
                            <td>
                                @if($item->persentase_hadir >= 75)
                                <span class="status-pill pill-safe">✔ Aman</span>
                                @else
                                <span class="status-pill pill-danger">⚠ Peringatan</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="{{ in_array($role, ['admin','dosen']) ? 11 : 8 }}">
                                <div class="empty-state">
                                    <i class="bi bi-inbox"></i>
                                    <p>Belum ada data rekap</p>
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