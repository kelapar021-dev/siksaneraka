<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi Peringatan – SIAKAD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --blue-900:#0d2e6e;--blue-800:#1a3f8f;--blue-700:#1d4ed8;
            --blue-600:#2563eb;--blue-500:#3b82f6;--blue-400:#60a5fa;
            --blue-100:#dbeafe;--blue-50:#eff6ff;
            --white:#ffffff;--gray-50:#f8fafc;--gray-100:#f1f5f9;
            --gray-200:#e2e8f0;--gray-400:#94a3b8;--gray-600:#475569;
            --gray-800:#1e293b;--sidebar-w:256px;
            --shadow-sm:0 1px 3px rgba(0,0,0,.08);
            --shadow-md:0 4px 16px rgba(37,99,235,.12);
            --radius-sm:8px;--radius-md:12px;--radius-lg:16px;
        }
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

        /* CONTENT */
        .main-card{background:var(--white);border:1px solid var(--gray-200);border-radius:var(--radius-lg);box-shadow:var(--shadow-sm);padding:24px;}
        .page-header-block{display:flex;align-items:center;justify-content:space-between;border-bottom:1px solid var(--gray-100);padding-bottom:16px;margin-bottom:20px;}
        .page-title-text{font-size:16px;font-weight:700;color:var(--gray-800);margin:0;}

        /* NOTIF CARDS */
        .notif-item{background:var(--white);border:1px solid var(--gray-200);border-left:4px solid #dc2626;border-radius:var(--radius-md);padding:16px 20px;margin-bottom:14px;display:flex;justify-content:space-between;align-items:flex-start;gap:16px;box-shadow:0 1px 2px rgba(0,0,0,.02);transition:transform .15s,box-shadow .15s;}
        .notif-item:hover{transform:translateY(-1px);box-shadow:0 4px 12px rgba(0,0,0,.04);}
        .notif-item.sudah{border-left-color:var(--gray-400);background:var(--gray-50);opacity:.75;}
        .notif-icon{width:40px;height:40px;border-radius:10px;background:#fee2e2;color:#dc2626;display:flex;align-items:center;justify-content:center;font-size:18px;flex-shrink:0;}
        .notif-item.sudah .notif-icon{background:var(--gray-200);color:var(--gray-600);}
        .notif-content{flex:1;min-width:0;}
        .notif-meta-row{display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:4px;}
        .notif-title{color:var(--gray-800);font-weight:600;font-size:14.5px;}
        .notif-nim{background:var(--blue-50);color:var(--blue-700);padding:2px 7px;border-radius:6px;font-size:11.5px;font-weight:600;}
        .badge-status{padding:3px 9px;border-radius:20px;font-size:11px;font-weight:600;display:inline-flex;align-items:center;gap:4px;}
        .badge-belum{background:#fee2e2;color:#991b1b;}
        .badge-sudah{background:#dcfce7;color:#166534;}
        .notif-subtext{color:var(--gray-600);font-size:12.5px;font-weight:500;margin-bottom:6px;}
        .notif-pesan{color:var(--gray-600);font-size:13px;line-height:1.5;margin:0 0 8px 0;}
        .notif-tanggal{color:var(--gray-400);font-size:11.5px;display:flex;align-items:center;gap:4px;}
        .btn-baca{background:var(--white);border:1px solid var(--gray-200);color:var(--gray-600);padding:7px 14px;border-radius:var(--radius-sm);font-size:12.5px;font-weight:600;text-decoration:none;white-space:nowrap;display:inline-flex;align-items:center;gap:6px;transition:background .15s,border-color .15s,color .15s;}
        .btn-baca:hover{background:var(--blue-50);border-color:var(--blue-200);color:var(--blue-700);}

        /* Empty state */
        .empty-state{text-align:center;padding:60px 20px;color:var(--gray-400);}
        .empty-state i{font-size:48px;margin-bottom:12px;display:block;color:var(--gray-200);}

        /* Header actions */
        .btn-kirim{background:var(--blue-600);border:none;color:#fff;padding:9px 16px;border-radius:var(--radius-sm);font-size:13px;font-weight:600;text-decoration:none;display:inline-flex;align-items:center;gap:6px;transition:background .15s;}
        .btn-kirim:hover{background:var(--blue-700);color:#fff;}
        .btn-edit-notif{background:var(--white);border:1px solid var(--gray-200);color:var(--blue-700);padding:7px 13px;border-radius:var(--radius-sm);font-size:12px;font-weight:600;text-decoration:none;white-space:nowrap;display:inline-flex;align-items:center;gap:5px;transition:background .15s,border-color .15s;}
        .btn-edit-notif:hover{background:var(--blue-50);border-color:var(--blue-200);}

        /* Admin separator */
        .nav-admin-divider{margin:8px 16px 0;border:none;border-top:1px solid rgba(255,255,255,.08);}

        /* Mobile */
        .sb-overlay{display:none;position:fixed;inset:0;z-index:199;background:rgba(15,23,42,.4);}
        .sb-overlay.show{display:block;}
        @media(max-width:992px){
            .sidebar{transform:translateX(-100%);}
            .sidebar.open{transform:translateX(0);box-shadow:8px 0 32px rgba(0,0,0,.25);}
            .main-wrap{margin-left:0;}
            .btn-hamburger{display:flex;}
            .page-content{padding:16px;}
            .notif-item{flex-direction:column;align-items:stretch;}
            .btn-baca{justify-content:center;width:100%;margin-top:4px;}
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
    <a href="{{ route('transaksi.absensi') }}" class="nav-link-sb"><i class="bi bi-check2-square"></i> Verifikasi Absensi</a>
    @endif
    <a href="{{ route('rekap.index') }}"          class="nav-link-sb"><i class="bi bi-bar-chart-fill"></i> Rekap</a>
    <a href="{{ route('notifikasi.index') }}"     class="nav-link-sb active"><i class="bi bi-bell-fill"></i> Notifikasi</a>
    <a href="{{ route('transaksi.pembayaran') }}" class="nav-link-sb"><i class="bi bi-credit-card-fill"></i> Pembayaran</a>
    <a href="{{ route('transaksi.nilai') }}"      class="nav-link-sb"><i class="bi bi-pencil-fill"></i> Nilai</a>
    <a href="{{ route('fuzzy.index') }}" class="nav-link-sb {{ request()->routeIs('fuzzy.*') ? 'active' : '' }}"><i class="bi bi-braces-asterisk"></i> Fuzzy Evaluasi</a>

    {{-- Hanya Admin yang bisa lihat menu Hak Akses --}}
    @if($role == 'admin')
    <hr class="nav-admin-divider">
    <p class="nav-group-label">Administrasi</p>
    <a href="{{ route('hak-akses.index') }}" class="nav-link-sb">
        <i class="bi bi-shield-lock-fill"></i> Hak Akses
    </a>
    @endif

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
                <p class="topbar-title"><i class="bi bi-bell-fill me-1" style="color:var(--blue-600);"></i>Pusat Notifikasi</p>
                <p class="topbar-sub">Log peringatan absensi dan ambang batas kehadiran mahasiswa</p>
            </div>
        </div>
        <span class="topbar-clock" id="clockDisplay"></span>
    </div>

    <div class="page-content">
        <div class="main-card">
            <div class="page-header-block">
                <h5 class="page-title-text">
                    <i class="bi bi-exclamation-triangle-fill text-danger me-1"></i>
                    Daftar Peringatan Absensi
                </h5>
                @if(in_array($role, ['dosen', 'staf_akademik']))
                <a href="{{ route('notifikasi.create') }}" class="btn-kirim">
                    <i class="bi bi-plus-circle"></i> Kirim Notifikasi
                </a>
                @endif
            </div>

            @forelse($notifikasi as $item)
            <div class="notif-item {{ $item->status_baca == 'Sudah' ? 'sudah' : '' }}">
                <div class="notif-icon">
                    <i class="bi bi-exclamation-circle"></i>
                </div>
                <div class="notif-content">
                    <div class="notif-meta-row">
                        <span class="notif-title">{{ $item->nama_mahasiswa }}</span>
                        <span class="notif-nim">{{ $item->nim }}</span>
                        @if($item->status_baca == 'Belum')
                        <span class="badge-status badge-belum"><i class="bi bi-record-fill"></i> Belum Dibaca</span>
                        @else
                        <span class="badge-status badge-sudah"><i class="bi bi-check-all"></i> Sudah Dibaca</span>
                        @endif
                    </div>
                    <div class="notif-subtext"><i class="bi bi-book me-1"></i> {{ $item->nama_matkul }}</div>
                    <p class="notif-pesan">{{ $item->pesan }}</p>
                    <div class="notif-tanggal"><i class="bi bi-clock"></i> {{ $item->tanggal_kirim }}</div>
                </div>
                @if($item->status_baca == 'Belum')
                <a href="{{ route('notifikasi.baca', $item->id) }}" class="btn-baca">
                    <i class="bi bi-check2-square"></i> Tandai Dibaca
                </a>
                @endif
                @if(in_array($role, ['dosen', 'staf_akademik']))
                <a href="{{ route('notifikasi.edit', $item->id) }}" class="btn-edit-notif">
                    <i class="bi bi-pencil"></i> Edit
                </a>
                @endif
            </div>
            @empty
            <div class="empty-state">
                <i class="bi bi-bell-slash"></i>
                <p class="mb-0">Tidak ada log notifikasi yang masuk.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>

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
</script>
</body>
</html>
