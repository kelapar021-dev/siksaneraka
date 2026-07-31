<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Hak Akses – SIAKAD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root{--blue-900:#0d2e6e;--blue-800:#1a3f8f;--blue-700:#1d4ed8;--blue-600:#2563eb;--blue-500:#3b82f6;--blue-400:#60a5fa;--blue-100:#dbeafe;--blue-50:#eff6ff;--white:#ffffff;--gray-50:#f8fafc;--gray-100:#f1f5f9;--gray-200:#e2e8f0;--gray-400:#94a3b8;--gray-600:#475569;--gray-800:#1e293b;--sidebar-w:256px;--shadow-sm:0 1px 3px rgba(0,0,0,.08);--shadow-md:0 4px 16px rgba(37,99,235,.12);--radius-sm:8px;--radius-md:12px;--radius-lg:16px;}
        *{font-family:'Plus Jakarta Sans',sans-serif;box-sizing:border-box;}
        body{background:var(--gray-100);color:var(--gray-800);min-height:100vh;margin:0;}
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
        .role-staf{background:#c4b5fd;color:#3b0764;}
        .role-mahasiswa{background:var(--blue-400);color:var(--blue-900);}
        .btn-logout-sb{display:flex;align-items:center;justify-content:center;gap:7px;width:100%;padding:9px;border:none;border-radius:var(--radius-sm);background:rgba(239,68,68,.15);color:#fca5a5;font-size:13px;font-weight:600;cursor:pointer;text-decoration:none;transition:background .18s;}
        .btn-logout-sb:hover{background:rgba(239,68,68,.3);color:#fca5a5;}
        .topbar{position:sticky;top:0;z-index:100;background:var(--white);border-bottom:1px solid var(--gray-200);padding:0 24px;height:60px;display:flex;align-items:center;justify-content:space-between;box-shadow:var(--shadow-sm);}
        .topbar-left{display:flex;align-items:center;gap:14px;}
        .btn-hamburger{display:none;background:var(--blue-50);border:1px solid var(--blue-100);color:var(--blue-700);border-radius:var(--radius-sm);padding:6px 9px;font-size:18px;cursor:pointer;}
        .topbar-title{font-size:16px;font-weight:700;color:var(--gray-800);margin:0;}
        .topbar-sub{font-size:11px;color:var(--gray-400);margin:0;}
        .topbar-clock{font-size:12px;color:var(--gray-400);}
        .main-wrap{margin-left:var(--sidebar-w);display:flex;flex-direction:column;min-height:100vh;}
        .page-content{flex:1;padding:24px;}

        /* Role Cards */
        .role-cards{display:grid;grid-template-columns:repeat(auto-fit,minmax(340px,1fr));gap:20px;margin-bottom:28px;}
        .role-card{background:var(--white);border:1px solid var(--gray-200);border-radius:var(--radius-lg);box-shadow:var(--shadow-sm);overflow:hidden;transition:box-shadow .2s;}
        .role-card:hover{box-shadow:var(--shadow-md);}
        .role-card-header{padding:18px 22px;display:flex;align-items:center;justify-content:space-between;}
        .role-card-header.admin-h{background:linear-gradient(135deg,#fbbf24,#f59e0b);}
        .role-card-header.dosen-h{background:linear-gradient(135deg,#34d399,#10b981);}
        /* ===== NEW: Staf Akademik header ===== */
        .role-card-header.staf-h{background:linear-gradient(135deg,#a78bfa,#7c3aed);}
        .role-card-header.mhs-h{background:linear-gradient(135deg,#60a5fa,#3b82f6);}
        .role-card-title{font-size:16px;font-weight:700;color:#fff;margin:0;display:flex;align-items:center;gap:8px;}
        .role-card-sub{font-size:11px;color:rgba(255,255,255,.8);margin:2px 0 0;}
        .btn-edit-role{background:rgba(255,255,255,.25);border:1px solid rgba(255,255,255,.4);color:#fff;padding:6px 14px;border-radius:var(--radius-sm);font-size:12px;font-weight:700;text-decoration:none;display:inline-flex;align-items:center;gap:5px;transition:background .18s;}
        .btn-edit-role:hover{background:rgba(255,255,255,.4);color:#fff;}
        .role-card-body{padding:18px 22px;}

        /* Permission groups */
        .perm-group{margin-bottom:14px;}
        .perm-group-title{font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.8px;color:var(--gray-400);margin-bottom:8px;padding-bottom:5px;border-bottom:1px solid var(--gray-100);}
        .perm-list{display:flex;flex-wrap:wrap;gap:6px;}
        .perm-badge{display:inline-flex;align-items:center;gap:4px;padding:4px 10px;border-radius:20px;font-size:11.5px;font-weight:600;}
        .perm-on {background:#dcfce7;color:#15803d;}
        .perm-off{background:#f1f5f9;color:#94a3b8;text-decoration:line-through;}

        /* Mobile */
        .sb-overlay{display:none;position:fixed;inset:0;z-index:199;background:rgba(15,23,42,.4);}
        .sb-overlay.show{display:block;}
        @media(max-width:768px){
            .sidebar{transform:translateX(-100%);}
            .sidebar.open{transform:translateX(0);box-shadow:8px 0 32px rgba(0,0,0,.25);}
            .main-wrap{margin-left:0;}
            .btn-hamburger{display:flex;}
            .page-content{padding:16px;}
        }
    </style>
</head>
<body>

@php $role = session('role','admin'); $username = session('username','Admin'); @endphp

<div class="sb-overlay" id="sbOverlay" onclick="toggleSidebar()"></div>

<aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <div class="brand-icon">🎓</div>
        <div><p class="brand-name">SIAKAD</p><p class="brand-sub">Sistem Informasi Akademik</p></div>
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
    <a href="{{ route('rekap.index') }}"          class="nav-link-sb"><i class="bi bi-bar-chart-fill"></i> Rekap</a>
    <a href="{{ route('notifikasi.index') }}"     class="nav-link-sb"><i class="bi bi-bell-fill"></i> Notifikasi</a>
    <a href="{{ route('transaksi.pembayaran') }}" class="nav-link-sb"><i class="bi bi-credit-card-fill"></i> Pembayaran</a>
    <a href="{{ route('transaksi.nilai') }}"      class="nav-link-sb"><i class="bi bi-pencil-fill"></i> Nilai</a>
    <a href="{{ route('fuzzy.index') }}" class="nav-link-sb {{ request()->routeIs('fuzzy.*') ? 'active' : '' }}"><i class="bi bi-braces-asterisk"></i> Fuzzy Evaluasi</a>
    <p class="nav-group-label">Administrasi</p>
    <a href="{{ route('hak-akses.index') }}" class="nav-link-sb active"><i class="bi bi-shield-lock-fill"></i> Hak Akses</a>
    <div class="sidebar-footer">
        <div class="user-card-sb">
            <div class="user-avatar-sb">{{ strtoupper(substr($username,0,1)) }}</div>
            <div style="flex:1;min-width:0;"><p class="user-name-sb text-truncate">{{ $username }}</p><p class="user-role-sb">{{ ucfirst($role) }}</p></div>
            <span class="badge-role-sb role-admin">👑 ADMIN</span>
        </div>
        <a href="{{ route('logout') }}" class="btn-logout-sb"><i class="bi bi-box-arrow-right"></i> Logout</a>
    </div>
</aside>

<div class="main-wrap">
    <div class="topbar">
        <div class="topbar-left">
            <button class="btn-hamburger" onclick="toggleSidebar()"><i class="bi bi-list"></i></button>
            <div>
                <p class="topbar-title"><i class="bi bi-shield-lock-fill me-1" style="color:var(--blue-600);"></i>Manajemen Hak Akses</p>
                <p class="topbar-sub">Kelola izin akses per jabatan — hanya dapat diakses Admin</p>
            </div>
        </div>
        <span class="topbar-clock" id="clockDisplay"></span>
    </div>

    <div class="page-content">

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-3" role="alert" style="border-left:4px solid #16a34a!important;border-radius:var(--radius-md);">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="role-cards">
            @foreach($hakAkses as $ha)
            @php
                $isAdmin = $ha->nama_role === 'admin';
                $isDosen = $ha->nama_role === 'dosen';
                $isStaf  = $ha->nama_role === 'staf_akademik'; // NEW

                $headerClass = $isAdmin ? 'admin-h' : ($isDosen ? 'dosen-h' : ($isStaf ? 'staf-h' : 'mhs-h'));

                $icon = $isAdmin ? '👑' : ($isDosen ? '🎓' : ($isStaf ? '🗂️' : '📚'));

                $subtext = $isAdmin
                    ? 'Full Akses — dapat mengelola semua fitur'
                    : ($isDosen
                        ? 'Akses Menengah — tidak bisa hapus'
                        : ($isStaf
                            ? 'Operator Akademik — kelola administrasi, tanpa hapus data utama'  // NEW
                            : 'Read Only — hanya lihat & ajukan KRS'));
            @endphp

            <div class="role-card">
                <div class="role-card-header {{ $headerClass }}">
                    <div>
                        <h5 class="role-card-title">{{ $icon }} {{ strtoupper(str_replace('_', ' ', $ha->nama_role)) }}</h5>
                        <p class="role-card-sub">{{ $subtext }}</p>
                    </div>
                    <a href="{{ route('hak-akses.edit', $ha->id) }}" class="btn-edit-role">
                        <i class="bi bi-pencil-square"></i> Edit Akses
                    </a>
                </div>

                <div class="role-card-body">

                    @php
                    $groups = [
                        '👥 Mahasiswa'   => [
                            'Lihat'  => $ha->akses_mahasiswa,
                            'Tambah' => $ha->tambah_mahasiswa,
                            'Edit'   => $ha->edit_mahasiswa,
                            'Hapus'  => $ha->hapus_mahasiswa,
                        ],
                        '👨‍🏫 Dosen'       => [
                            'Lihat'  => $ha->akses_dosen,
                            'Tambah' => $ha->tambah_dosen,
                            'Edit'   => $ha->edit_dosen,
                            'Hapus'  => $ha->hapus_dosen,
                        ],
                        '📚 Mata Kuliah' => [
                            'Lihat'  => $ha->akses_matkul,
                            'Tambah' => $ha->tambah_matkul,
                            'Edit'   => $ha->edit_matkul,
                            'Hapus'  => $ha->hapus_matkul,
                        ],
                        '🏫 Ruangan'     => [
                            'Lihat'  => $ha->akses_ruangan,
                            'Tambah' => $ha->tambah_ruangan,
                            'Hapus'  => $ha->hapus_ruangan,
                        ],
                        '📅 Tahun Akad.' => [
                            'Lihat'  => $ha->akses_tahun,
                            'Tambah' => $ha->tambah_tahun,
                            'Hapus'  => $ha->hapus_tahun,
                        ],
                        '🗓️ Jadwal'       => [
                            'Lihat'  => $ha->akses_jadwal,
                            'Tambah' => $ha->tambah_jadwal,
                            'Hapus'  => $ha->hapus_jadwal,
                        ],
                        '📋 KRS'         => [
                            'Lihat'   => $ha->akses_krs,
                            'Ajukan'  => $ha->ajukan_krs,
                            'Setujui' => $ha->setujui_krs,
                            'Hapus'   => $ha->hapus_krs,
                        ],
                        '✅ Absensi'      => [
                            'Lihat'  => $ha->akses_absensi,
                            'Tambah' => $ha->tambah_absensi,
                            'Edit'   => $ha->edit_absensi,
                            'Hapus'  => $ha->hapus_absensi,
                        ],
                        '💳 Pembayaran'  => [
                            'Lihat'  => $ha->akses_pembayaran,
                            'Tambah' => $ha->tambah_pembayaran,
                            'Edit'   => $ha->edit_pembayaran,
                            'Hapus'  => $ha->hapus_pembayaran,
                        ],
                        '📝 Nilai'       => [
                            'Lihat'  => $ha->akses_nilai,
                            'Tambah' => $ha->tambah_nilai,
                            'Edit'   => $ha->edit_nilai,
                            'Hapus'  => $ha->hapus_nilai,
                        ],
                        '📊 Rekap & Notif' => [
                            'Rekap'      => $ha->akses_rekap,
                            'Notifikasi' => $ha->akses_notifikasi,
                        ],
                        '🔐 Hak Akses'   => [
                            'Kelola' => $ha->akses_hak_akses,
                        ],
                    ];
                    @endphp

                    @foreach($groups as $groupName => $perms)
                    <div class="perm-group">
                        <div class="perm-group-title">{{ $groupName }}</div>
                        <div class="perm-list">
                            @foreach($perms as $label => $val)
                            <span class="perm-badge {{ $val ? 'perm-on' : 'perm-off' }}">
                                {{ $val ? '✔' : '✘' }} {{ $label }}
                            </span>
                            @endforeach
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            @endforeach
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