<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa – SIAKAD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --blue-900: #0d2e6e; --blue-800: #1a3f8f; --blue-700: #1d4ed8;
            --blue-600: #2563eb; --blue-500: #3b82f6; --blue-400: #60a5fa;
            --blue-100: #dbeafe; --blue-50 : #eff6ff;
            --white: #ffffff; --gray-50: #f8fafc; --gray-100: #f1f5f9;
            --gray-200: #e2e8f0; --gray-400: #94a3b8; --gray-600: #475569;
            --gray-800: #1e293b; --sidebar-w: 256px;
            --shadow-sm: 0 1px 3px rgba(0,0,0,.08);
            --shadow-md: 0 4px 16px rgba(37,99,235,.12);
            --radius-sm: 8px; --radius-md: 12px; --radius-lg: 16px;
        }
        * { font-family: 'Plus Jakarta Sans', sans-serif; box-sizing: border-box; }
        body { background: var(--gray-100); color: var(--gray-800); min-height: 100vh; margin: 0; }

        .sidebar { position: fixed; top: 0; left: 0; height: 100vh; width: var(--sidebar-w); background: var(--blue-900); display: flex; flex-direction: column; overflow-y: auto; z-index: 200; transition: transform .28s cubic-bezier(.4,0,.2,1); }
        .sidebar-brand { padding: 20px 18px 16px; border-bottom: 1px solid rgba(255,255,255,.1); display: flex; align-items: center; gap: 11px; }
        .brand-icon { width: 40px; height: 40px; border-radius: 10px; background: var(--blue-600); display: flex; align-items: center; justify-content: center; font-size: 19px; flex-shrink: 0; box-shadow: 0 2px 8px rgba(37,99,235,.45); }
        .brand-name { color: #fff; font-weight: 700; font-size: 15px; margin: 0; line-height: 1.2; }
        .brand-sub  { color: rgba(255,255,255,.45); font-size: 10px; margin: 0; }
        .nav-group-label { padding: 18px 18px 5px; font-size: 9.5px; font-weight: 700; letter-spacing: 1.4px; text-transform: uppercase; color: rgba(255,255,255,.35); }
        .nav-link-sb { display: flex; align-items: center; gap: 10px; padding: 9px 14px 9px 18px; margin: 1px 8px; border-radius: var(--radius-sm); font-size: 13px; font-weight: 500; color: rgba(255,255,255,.65); text-decoration: none; transition: background .18s, color .18s; }
        .nav-link-sb i { font-size: 16px; width: 20px; flex-shrink: 0; }
        .nav-link-sb:hover { background: rgba(255,255,255,.08); color: #fff; }
        .nav-link-sb.active { background: var(--blue-600); color: #fff; box-shadow: 0 2px 10px rgba(37,99,235,.5); }
        .sidebar-footer { margin-top: auto; padding: 14px; border-top: 1px solid rgba(255,255,255,.08); }
        .user-card-sb { background: rgba(255,255,255,.07); border: 1px solid rgba(255,255,255,.1); border-radius: var(--radius-md); padding: 10px 12px; display: flex; align-items: center; gap: 9px; margin-bottom: 9px; }
        .user-avatar-sb { width: 34px; height: 34px; border-radius: 50%; flex-shrink: 0; background: var(--blue-500); display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 13px; color: #fff; }
        .user-name-sb { font-size: 12.5px; font-weight: 600; color: #fff; margin: 0; }
        .user-role-sb { font-size: 10.5px; color: rgba(255,255,255,.5); margin: 0; }
        .badge-role-sb { margin-left: auto; padding: 3px 9px; border-radius: 20px; font-size: 10px; font-weight: 700; white-space: nowrap; }
        .role-admin     { background: #fbbf24; color: #78350f; }
        .role-dosen     { background: #34d399; color: #064e3b; }
        .role-staf      { background: #c4b5fd; color: #3b0764; }
        .role-mahasiswa { background: var(--blue-400); color: var(--blue-900); }
        .btn-logout-sb { display: flex; align-items: center; justify-content: center; gap: 7px; width: 100%; padding: 9px; border: none; border-radius: var(--radius-sm); background: rgba(239,68,68,.15); color: #fca5a5; font-size: 13px; font-weight: 600; cursor: pointer; text-decoration: none; transition: background .18s; }
        .btn-logout-sb:hover { background: rgba(239,68,68,.3); color: #fca5a5; }

        .topbar { position: sticky; top: 0; z-index: 100; background: var(--white); border-bottom: 1px solid var(--gray-200); padding: 0 24px; height: 60px; display: flex; align-items: center; justify-content: space-between; box-shadow: var(--shadow-sm); }
        .topbar-left { display: flex; align-items: center; gap: 14px; }
        .btn-hamburger { display: none; background: var(--blue-50); border: 1px solid var(--blue-100); color: var(--blue-700); border-radius: var(--radius-sm); padding: 6px 9px; font-size: 18px; cursor: pointer; }
        .topbar-title { font-size: 16px; font-weight: 700; color: var(--gray-800); margin: 0; }
        .topbar-sub   { font-size: 11px; color: var(--gray-400); margin: 0; }
        .topbar-clock { font-size: 12px; color: var(--gray-400); }

        .main-wrap { margin-left: var(--sidebar-w); display: flex; flex-direction: column; min-height: 100vh; }
        .page-content { flex: 1; padding: 24px; }

        .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(140px, 1fr)); gap: 16px; margin-bottom: 22px; }
        .stat-card { background: var(--white); border: 1px solid var(--gray-200); border-radius: var(--radius-lg); padding: 18px 20px; display: flex; align-items: center; gap: 14px; box-shadow: var(--shadow-sm); transition: box-shadow .2s; }
        .stat-card:hover { box-shadow: var(--shadow-md); }
        .stat-icon { width: 46px; height: 46px; border-radius: var(--radius-md); flex-shrink: 0; display: flex; align-items: center; justify-content: center; font-size: 20px; }
        .stat-icon.blue  { background: var(--blue-50); color: var(--blue-600); }
        .stat-icon.sky   { background: #e0f2fe; color: #0284c7; }
        .stat-icon.pink  { background: #fce7f3; color: #be185d; }
        .stat-icon.green { background: #dcfce7; color: #16a34a; }
        .stat-num   { font-size: 26px; font-weight: 700; color: var(--blue-800); line-height: 1; }
        .stat-label { font-size: 12px; color: var(--gray-400); margin: 2px 0 0; }

        .table-card { background: var(--white); border: 1px solid var(--gray-200); border-radius: var(--radius-lg); box-shadow: var(--shadow-sm); overflow: hidden; }
        .table-card-header { padding: 18px 22px; border-bottom: 1px solid var(--gray-100); display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; background: var(--white); }
        .table-card-title { font-size: 15px; font-weight: 700; color: var(--gray-800); margin: 0; }
        .search-inp { background: var(--gray-50); border: 1px solid var(--gray-200); border-radius: var(--radius-sm); padding: 8px 14px; font-size: 13px; color: var(--gray-800); outline: none; width: 220px; transition: border-color .18s, box-shadow .18s; }
        .search-inp::placeholder { color: var(--gray-400); }
        .search-inp:focus { border-color: var(--blue-400); box-shadow: 0 0 0 3px rgba(96,165,250,.15); }
        .btn-tambah { background: var(--blue-600); border: none; color: #fff; padding: 8px 18px; border-radius: var(--radius-sm); font-size: 13px; font-weight: 600; display: inline-flex; align-items: center; gap: 6px; cursor: pointer; text-decoration: none; transition: background .18s, box-shadow .18s; }
        .btn-tambah:hover { background: var(--blue-700); color: #fff; box-shadow: var(--shadow-md); }

        .table-wrap { overflow-x: auto; }
        table { width: 100%; min-width: 1800px; border-collapse: collapse; white-space: nowrap; }
        thead tr { background: var(--blue-800); }
        thead th { color: #fff !important; font-size: 12px; font-weight: 600; padding: 13px 12px !important; border: none !important; text-align: center; letter-spacing: .3px; }
        tbody td { font-size: 12.5px; padding: 12px 12px !important; border: none !important; border-bottom: 1px solid var(--gray-100) !important; color: var(--gray-800) !important; background: var(--white) !important; vertical-align: middle; }
        tbody tr:hover td { background: var(--blue-50) !important; }
        tbody tr:last-child td { border-bottom: none !important; }

        .badge-nim    { background: var(--blue-50); color: var(--blue-700); padding: 3px 8px; border-radius: 6px; font-size: 11.5px; font-weight: 600; }
        .badge-male   { background: #e0f2fe; color: #0284c7; padding: 3px 10px; border-radius: 20px; font-size: 11.5px; }
        .badge-female { background: #fce7f3; color: #be185d; padding: 3px 10px; border-radius: 20px; font-size: 11.5px; }
        .badge-sem    { background: var(--blue-50); color: var(--blue-700); padding: 3px 8px; border-radius: 6px; font-size: 11.5px; }
        .badge-ipk    { background: #fef9c3; color: #854d0e; padding: 3px 8px; border-radius: 6px; font-size: 11.5px; font-weight: 700; }
        .badge-status-aktif { background: #dcfce7; color: #15803d; padding: 3px 10px; border-radius: 20px; font-size: 11.5px; }
        .badge-status-lain  { background: var(--gray-100); color: var(--gray-600); padding: 3px 10px; border-radius: 20px; font-size: 11.5px; }

        .btn-edit-row { background: #e0f2fe; color: #0369a1; border: none; padding: 5px 11px; border-radius: 6px; font-size: 11.5px; font-weight: 600; cursor: pointer; display: inline-flex; align-items: center; gap: 3px; text-decoration: none; }
        .btn-del-row  { background: #fee2e2; color: #dc2626; border: none; padding: 5px 11px; border-radius: 6px; font-size: 11.5px; font-weight: 600; cursor: pointer; display: inline-flex; align-items: center; gap: 3px; text-decoration: none; }
        .btn-edit-row:hover { background: #bae6fd; }
        .btn-del-row:hover  { background: #fecaca; }
        .actions-cell { display: flex; gap: 5px; justify-content: center; }

        .empty-state { text-align: center; padding: 60px 20px; color: var(--gray-400); }
        .empty-state i { font-size: 48px; margin-bottom: 12px; display: block; }

        .sb-overlay { display: none; position: fixed; inset: 0; z-index: 199; background: rgba(15,23,42,.4); }
        .sb-overlay.show { display: block; }

        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.open { transform: translateX(0); box-shadow: 8px 0 32px rgba(0,0,0,.25); }
            .main-wrap { margin-left: 0; }
            .btn-hamburger { display: flex; }
            .search-inp { width: 100%; }
            .page-content { padding: 16px; }
        }
    </style>
</head>
<body>

@php $role = session('role', 'mahasiswa'); $username = session('username', 'Guest'); @endphp

<div class="sb-overlay" id="sbOverlay" onclick="toggleSidebar()"></div>

<aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <div class="brand-icon">🎓</div>
        <div><p class="brand-name">SIAKAD</p><p class="brand-sub">Sistem Informasi Akademik</p></div>
    </div>

    @if($role !== 'mahasiswa')
    <p class="nav-group-label">Master Data</p>
    <a href="{{ route('data-mahasiswa') }}" class="nav-link-sb active"><i class="bi bi-people-fill"></i> Mahasiswa</a>
    <a href="{{ route('dosen.index') }}"    class="nav-link-sb"><i class="bi bi-person-badge-fill"></i> Dosen</a>
    <a href="{{ route('matkul.index') }}"   class="nav-link-sb"><i class="bi bi-book-fill"></i> Mata Kuliah</a>
    <a href="{{ route('ruangan.index') }}"  class="nav-link-sb"><i class="bi bi-building"></i> Ruangan</a>
    <a href="{{ route('tahun.index') }}"    class="nav-link-sb"><i class="bi bi-calendar3"></i> Tahun Akademik</a>
    @endif

    <p class="nav-group-label">{{ $role === 'mahasiswa' ? 'Menu' : 'Transaksi' }}</p>
    @if($role === 'mahasiswa')
    <a href="{{ route('data-mahasiswa') }}" class="nav-link-sb active"><i class="bi bi-person-fill"></i> Profil Saya</a>
    @endif
    <a href="{{ route('krs.index') }}"            class="nav-link-sb"><i class="bi bi-card-checklist"></i> KRS</a>
    <a href="{{ route('jadwal.index') }}"          class="nav-link-sb"><i class="bi bi-calendar-week-fill"></i> Jadwal</a>
    <a href="{{ route('absensi.index') }}"         class="nav-link-sb"><i class="bi bi-check-circle-fill"></i> Absensi</a>
    <a href="{{ route('rekap.index') }}"           class="nav-link-sb"><i class="bi bi-bar-chart-fill"></i> Rekap</a>
    <a href="{{ route('notifikasi.index') }}"      class="nav-link-sb"><i class="bi bi-bell-fill"></i> Notifikasi</a>
    <a href="{{ route('transaksi.pembayaran') }}"  class="nav-link-sb"><i class="bi bi-credit-card-fill"></i> Pembayaran</a>
    <a href="{{ route('transaksi.nilai') }}"       class="nav-link-sb"><i class="bi bi-pencil-fill"></i> Nilai</a>
    <a href="{{ route('fuzzy.index') }}" class="nav-link-sb {{ request()->routeIs('fuzzy.*') ? 'active' : '' }}"><i class="bi bi-braces-asterisk"></i> Fuzzy Evaluasi</a>

    @if($role == 'admin')
    <p class="nav-group-label">Administrasi</p>
    <a href="{{ route('hak-akses.index') }}" class="nav-link-sb"><i class="bi bi-shield-lock-fill"></i> Hak Akses</a>
    @endif

    <div class="sidebar-footer">
        <div class="user-card-sb">
            <div class="user-avatar-sb">{{ strtoupper(substr($username, 0, 1)) }}</div>
            <div style="flex:1;min-width:0;">
                <p class="user-name-sb text-truncate">{{ $username }}</p>
                <p class="user-role-sb">{{ ucfirst(str_replace('_', ' ', $role)) }}</p>
            </div>
            @if($role == 'admin')
                <span class="badge-role-sb role-admin">👑 ADMIN</span>
            @elseif($role == 'dosen')
                <span class="badge-role-sb role-dosen">🎓 DOSEN</span>
            @elseif($role == 'staf_akademik')
                <span class="badge-role-sb role-staf">🗂️ STAF TU</span>
            @else
                <span class="badge-role-sb role-mahasiswa">📚 MHS</span>
            @endif
        </div>
        <a href="{{ route('logout') }}" class="btn-logout-sb">
            <i class="bi bi-box-arrow-right"></i> Logout
        </a>
    </div>
</aside>

<div class="main-wrap">
    <div class="topbar">
        <div class="topbar-left">
            <button class="btn-hamburger" onclick="toggleSidebar()"><i class="bi bi-list"></i></button>
            <div>
                <p class="topbar-title">{{ $role === 'mahasiswa' ? 'Profil Saya' : 'Data Mahasiswa' }}</p>
                <p class="topbar-sub">{{ $role === 'mahasiswa' ? 'Data identitas Anda' : 'Kelola seluruh data mahasiswa terdaftar' }}</p>
            </div>
        </div>
        <span class="topbar-clock" id="clockDisplay"></span>
    </div>

    <div class="page-content">

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon blue"><i class="bi bi-people-fill"></i></div>
                <div><div class="stat-num">{{ $mahasiswa->count() }}</div><p class="stat-label">Total Mahasiswa</p></div>
            </div>
            <div class="stat-card">
                <div class="stat-icon sky"><i class="bi bi-gender-male"></i></div>
                <div><div class="stat-num">{{ $mahasiswa->where('jenis_kelamin','L')->count() }}</div><p class="stat-label">Laki-laki</p></div>
            </div>
            <div class="stat-card">
                <div class="stat-icon pink"><i class="bi bi-gender-female"></i></div>
                <div><div class="stat-num">{{ $mahasiswa->where('jenis_kelamin','P')->count() }}</div><p class="stat-label">Perempuan</p></div>
            </div>
            <div class="stat-card">
                <div class="stat-icon green"><i class="bi bi-mortarboard-fill"></i></div>
                <div><div class="stat-num">{{ $mahasiswa->unique('prodi')->count() }}</div><p class="stat-label">Program Studi</p></div>
            </div>
        </div>

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-3" role="alert" style="border-left:4px solid #16a34a !important;border-radius:var(--radius-md);">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-3" role="alert" style="border-left:4px solid #dc2626 !important;border-radius:var(--radius-md);">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="table-card">
            <div class="table-card-header">
                <h5 class="table-card-title">
                    <i class="bi bi-table me-2" style="color:var(--blue-600);"></i>{{ $role === 'mahasiswa' ? 'Data Diri Anda' : 'Daftar Mahasiswa' }}
                </h5>
                <div class="d-flex gap-2 align-items-center flex-wrap">
                    @if($role !== 'mahasiswa')
                    <input type="text" class="search-inp" id="searchInput" placeholder="🔍 Cari mahasiswa...">
                    @endif
                    {{-- Tombol Tambah hanya untuk admin & staf, bukan dosen --}}
                    @if(in_array($role, ['admin','staf_akademik']))
                    <a href="{{ route('create-mahasiswa') }}" class="btn-tambah">
                        <i class="bi bi-plus-circle-fill"></i> Tambah Data
                    </a>
                    @endif
                </div>
            </div>

            <div class="table-wrap">
                <table id="mahasiswaTable">
                    <thead>
                        <tr>
                            <th>No</th><th>NIM</th><th>Nama</th><th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th><th>Jenis Kelamin</th><th>Prodi</th>
                            <th>Fakultas</th><th>Email</th><th>No HP</th><th>Semester</th>
                            <th>IPK</th><th>Agama</th><th>Status</th><th>Asal Sekolah</th>
                            <th>Nama Ayah</th><th>Nama Ibu</th><th>Alamat</th>
                            @if($role !== 'mahasiswa')<th>Aksi</th>@endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($mahasiswa as $item)
                        <tr>
                            <td style="color:var(--gray-400);font-weight:500;">{{ $loop->iteration }}</td>
                            <td><span class="badge-nim">{{ $item->nim }}</span></td>
                            <td style="font-weight:600;color:var(--blue-900);">{{ $item->nama }}</td>
                            <td>{{ $item->tempat_lahir }}</td>
                            <td>{{ $item->tanggal_lahir }}</td>
                            <td>
                                @if($item->jenis_kelamin == 'L')
                                    <span class="badge-male">♂ Laki-laki</span>
                                @else
                                    <span class="badge-female">♀ Perempuan</span>
                                @endif
                            </td>
                            <td>{{ $item->prodi }}</td>
                            <td>{{ $item->fakultas }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->no_hp }}</td>
                            <td><span class="badge-sem">Sem {{ $item->semester }}</span></td>
                            <td><span class="badge-ipk">{{ $item->ipk }}</span></td>
                            <td>{{ $item->agama }}</td>
                            <td>
                                @if($item->status == 'Aktif')
                                    <span class="badge-status-aktif">● {{ $item->status }}</span>
                                @else
                                    <span class="badge-status-lain">{{ $item->status }}</span>
                                @endif
                            </td>
                            <td>{{ $item->asal_sekolah }}</td>
                            <td>{{ $item->nama_ayah }}</td>
                            <td>{{ $item->nama_ibu }}</td>
                            <td>{{ $item->alamat ?? '-' }}</td>
                            @if($role !== 'mahasiswa')
                            <td>
                                <div class="actions-cell">
                                    {{-- Edit: admin & staf --}}
                                    @if(in_array($role, ['admin','staf_akademik']))
                                    <a href="{{ url('edit-mahasiswa/'.$item->id) }}" class="btn-edit-row">
                                        <i class="bi bi-pencil-fill"></i> Edit
                                    </a>
                                    @endif
                                    {{-- Hapus: admin only --}}
                                    @if($role == 'admin')
                                    <a href="{{ route('hapus-mahasiswa', $item->id) }}"
                                       class="btn-del-row"
                                       onclick="return confirm('Yakin ingin hapus data {{ $item->nama }}?')">
                                        <i class="bi bi-trash-fill"></i> Hapus
                                    </a>
                                    @endif
                                </div>
                            </td>
                            @endif
                        </tr>
                        @empty
                        <tr>
                            <td colspan="{{ $role === 'mahasiswa' ? 18 : 19 }}" class="empty-state">
                                <i class="bi bi-inbox"></i>
                                Belum ada data mahasiswa
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
    function toggleSidebar(){
        document.getElementById('sidebar').classList.toggle('open');
        document.getElementById('sbOverlay').classList.toggle('show');
    }
    document.getElementById('searchInput').addEventListener('keyup', function(){
        const q = this.value.toLowerCase();
        document.querySelectorAll('#mahasiswaTable tbody tr').forEach(row => {
            row.style.display = row.textContent.toLowerCase().includes(q) ? '' : 'none';
        });
    });
    (function tick(){
        const d = new Date();
        document.getElementById('clockDisplay').textContent =
            d.toLocaleDateString('id-ID',{weekday:'long',year:'numeric',month:'long',day:'numeric'})
            + ' · ' + d.toLocaleTimeString('id-ID');
        setTimeout(tick, 1000);
    })();
</script>
</body>
</html>