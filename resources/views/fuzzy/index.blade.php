<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuzzy Evaluasi – SIAKAD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root{--blue-900:#0d2e6e;--blue-800:#1a3f8f;--blue-700:#1d4ed8;--blue-600:#2563eb;--blue-500:#3b82f6;--blue-400:#60a5fa;--blue-100:#dbeafe;--blue-50:#eff6ff;--white:#ffffff;--gray-50:#f8fafc;--gray-100:#f1f5f9;--gray-200:#e2e8f0;--gray-400:#94a3b8;--gray-600:#475569;--gray-800:#1e293b;--sidebar-w:256px;--shadow-sm:0 1px 3px rgba(0,0,0,.08);--shadow-md:0 4px 16px rgba(37,99,235,.12);--radius-sm:8px;--radius-md:12px;--radius-lg:16px;}
        *{font-family:'Poppins',sans-serif;box-sizing:border-box;}
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
        .stats-bar{display:flex;gap:16px;margin-bottom:24px;flex-wrap:wrap;}
        .stat-item{background:var(--white);border:1px solid var(--gray-200);border-radius:var(--radius-md);padding:16px 20px;flex:1;min-width:160px;box-shadow:var(--shadow-sm);display:flex;align-items:center;gap:16px;}
        .stat-icon-wrapper{width:44px;height:44px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:20px;}
        .si-total{background:var(--blue-50);color:var(--blue-600);}
        .si-lulus{background:#e6f4ea;color:#137333;}
        .si-marginal{background:#fef7e0;color:#b06000;}
        .si-tidak{background:#fce8e6;color:#c5221f;}
        .stat-number{font-size:22px;font-weight:700;color:var(--gray-800);margin:0;line-height:1.2;}
        .stat-label{font-size:12px;color:var(--gray-400);margin:0;font-weight:500;}
        .main-card{background:var(--white);border:1px solid var(--gray-200);border-radius:var(--radius-lg);box-shadow:var(--shadow-sm);padding:24px;}
        .table-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;flex-wrap:wrap;gap:16px;}
        .table-title{color:var(--gray-800);font-weight:700;font-size:16px;margin:0;}
        .search-box{background:var(--gray-50);border:1px solid var(--gray-200);border-radius:var(--radius-sm);padding:8px 14px 8px 36px;color:var(--gray-800);font-size:13.5px;width:240px;outline:none;transition:border-color .15s;}
        .search-box:focus{border-color:var(--blue-400);background:var(--white);}
        .search-wrapper{position:relative;}
        .search-wrapper i{position:absolute;left:13px;top:50%;transform:translateY(-50%);color:var(--gray-400);font-size:14px;}
        .btn-tambah{background:var(--blue-600);border:none;color:white;padding:8px 16px;border-radius:var(--radius-sm);font-size:13px;font-weight:600;text-decoration:none;display:inline-flex;align-items:center;gap:8px;box-shadow:0 2px 6px rgba(37,99,235,.2);transition:background .15s;}
        .btn-tambah:hover{background:var(--blue-700);color:white;}
        .table-container{overflow-x:auto;border:1px solid var(--gray-200);border-radius:var(--radius-md);background:var(--white);}
        table{min-width:1100px;white-space:nowrap;margin:0;}
        thead tr{background:var(--gray-50);border-bottom:2px solid var(--gray-200);}
        th{padding:12px 14px!important;font-size:13px;color:var(--gray-600)!important;font-weight:600;text-align:center;}
        td{padding:12px 14px!important;font-size:13px;color:var(--gray-800)!important;border-bottom:1px solid var(--gray-200)!important;vertical-align:middle;text-align:center;}
        tbody tr:last-child td{border-bottom:none!important;}
        tbody tr:hover td{background:var(--gray-50)!important;}
        .nim-badge{background:var(--blue-50);color:var(--blue-700);padding:3px 8px;border-radius:6px;font-size:12px;font-weight:600;}
        .skor-badge{padding:4px 12px;border-radius:20px;font-size:12px;font-weight:700;}
        .skor-lulus{background:#dcfce7;color:#15803d;}
        .skor-marginal{background:#fef9c3;color:#a16207;}
        .skor-tidak{background:#fee2e2;color:#b91c1c;}
        .btn-detail{background:var(--white);border:1px solid var(--gray-200);color:var(--blue-600);padding:5px 10px;border-radius:6px;font-size:12px;text-decoration:none;font-weight:600;display:inline-flex;align-items:center;gap:4px;transition:all .15s;}
        .btn-detail:hover{background:var(--blue-50);border-color:var(--blue-200);}
        .btn-hapus{background:var(--white);border:1px solid var(--gray-200);color:#dc2626;padding:5px 10px;border-radius:6px;font-size:12px;text-decoration:none;font-weight:600;display:inline-flex;align-items:center;gap:4px;transition:all .15s;}
        .btn-hapus:hover{background:#fee2e2;border-color:#fca5a5;}
        .empty-state{text-align:center;padding:48px 20px;color:var(--gray-400);}
        .empty-state i{font-size:40px;color:var(--gray-200);display:block;margin-bottom:8px;}
        .alert-success-custom{background:#dcfce7;border:1px solid #bbf7d0;color:#15803d;border-radius:var(--radius-sm);padding:11px 16px;margin:0 0 16px;font-size:13px;font-weight:500;display:flex;align-items:center;gap:8px;}
        .sb-overlay{display:none;position:fixed;inset:0;z-index:199;background:rgba(15,23,42,.4);}
        .sb-overlay.show{display:block;}
        @media(max-width:992px){.sidebar{transform:translateX(-100%);}.sidebar.open{transform:translateX(0);box-shadow:8px 0 32px rgba(0,0,0,.25);}.main-wrap{margin-left:0;}.btn-hamburger{display:flex;}.page-content{padding:16px;}}
    </style>
</head>
<body>
@php
    $role     = session('role', 'mahasiswa');
    $username = session('username', 'Guest');
@endphp

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
    <a href="{{ route('krs.index') }}"            class="nav-link-sb"><i class="bi bi-file-earmark-text-fill"></i> KRS</a>
    <a href="{{ route('jadwal.index') }}"         class="nav-link-sb"><i class="bi bi-calendar-week-fill"></i> Jadwal</a>
    <a href="{{ route('absensi.index') }}"        class="nav-link-sb"><i class="bi bi-check-circle-fill"></i> Absensi</a>
    @if(in_array($role, ['dosen', 'staf_akademik']))
    <a href="{{ route('transaksi.absensi') }}" class="nav-link-sb"><i class="bi bi-check2-square"></i> Verifikasi Absensi</a>
    @endif
    <a href="{{ route('rekap.index') }}"          class="nav-link-sb"><i class="bi bi-bar-chart-fill"></i> Rekap</a>
    <a href="{{ route('notifikasi.index') }}"     class="nav-link-sb"><i class="bi bi-bell-fill"></i> Notifikasi</a>
    <a href="{{ route('transaksi.pembayaran') }}" class="nav-link-sb"><i class="bi bi-credit-card-fill"></i> Pembayaran</a>
    <a href="{{ route('transaksi.nilai') }}"      class="nav-link-sb"><i class="bi bi-pencil-fill"></i> Nilai</a>
    <a href="{{ route('fuzzy.definisi') }}"       class="nav-link-sb"><i class="bi bi-book-half"></i> Definisi Fuzzy</a>
    <a href="{{ route('fuzzy.index') }}"          class="nav-link-sb active"><i class="bi bi-braces-asterisk"></i> Fuzzy Evaluasi</a>
    <div class="sidebar-footer">
        <div class="user-card-sb">
            <div class="user-avatar-sb">{{ strtoupper(substr($username,0,1)) }}</div>
            <div style="flex:1;min-width:0;"><p class="user-name-sb text-truncate">{{ $username }}</p><p class="user-role-sb">{{ ucfirst($role) }}</p></div>
            <span class="badge-role-sb @if($role=='admin')role-admin @elseif($role=='dosen')role-dosen @else role-mahasiswa @endif">
                @if($role=='admin')👑@elseif($role=='dosen')🎓@else📚@endif {{ strtoupper($role) }}
            </span>
        </div>
        <a href="{{ route('logout') }}" class="btn-logout-sb"><i class="bi bi-box-arrow-right"></i> Logout</a>
    </div>
</aside>

<div class="main-wrap">
    <div class="topbar">
        <div class="topbar-left">
            <button class="btn-hamburger" onclick="toggleSidebar()"><i class="bi bi-list"></i></button>
            <div>
                <p class="topbar-title"><i class="bi bi-braces-asterisk me-1" style="color:var(--blue-600);"></i>Fuzzy Evaluasi Kelulusan</p>
                <p class="topbar-sub">Prediksi kelulusan mahasiswa menggunakan metode Tsukamoto</p>
            </div>
        </div>
        <span class="topbar-clock" id="clockDisplay"></span>
    </div>

    <div class="page-content">
        @if(session('success'))
        <div class="alert-success-custom"><i class="bi bi-check-circle-fill"></i> {{ session('success') }}</div>
        @endif

        <div class="stats-bar">
            <div class="stat-item">
                <div class="stat-icon-wrapper si-total"><i class="bi bi-braces-asterisk"></i></div>
                <div><p class="stat-number">{{ $data->count() }}</p><p class="stat-label">Total Evaluasi</p></div>
            </div>
            <div class="stat-item">
                <div class="stat-icon-wrapper si-lulus"><i class="bi bi-check-circle"></i></div>
                <div><p class="stat-number">{{ $data->where('keterangan','Lulus')->count() }}</p><p class="stat-label">Lulus</p></div>
            </div>
            <div class="stat-item">
                <div class="stat-icon-wrapper si-marginal"><i class="bi bi-exclamation-triangle"></i></div>
                <div><p class="stat-number">{{ $data->where('keterangan','Marginal')->count() }}</p><p class="stat-label">Marginal</p></div>
            </div>
            <div class="stat-item">
                <div class="stat-icon-wrapper si-tidak"><i class="bi bi-x-circle"></i></div>
                <div><p class="stat-number">{{ $data->where('keterangan','Tidak Lulus')->count() }}</p><p class="stat-label">Tidak Lulus</p></div>
            </div>
        </div>

        <div class="main-card">
            <div class="table-header">
                <h5 class="table-title"><i class="bi bi-table me-2" style="color:var(--blue-600);"></i>Daftar Evaluasi Fuzzy</h5>
                <div class="d-flex gap-2 align-items-center flex-wrap">
                    <div class="search-wrapper">
                        <i class="bi bi-search"></i>
                        <input type="text" class="search-box" id="searchInput" placeholder="Cari data...">
                    </div>
                    @if($role !== 'mahasiswa')
                    <a href="{{ route('fuzzy.create') }}" class="btn-tambah"><i class="bi bi-plus-lg"></i> Tambah Evaluasi</a>
                    @endif
                </div>
            </div>

            <div class="table-container">
                <table id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Mata Kuliah</th>
                            <th>Kehadiran</th>
                            <th>Nilai Tugas</th>
                            <th>Keaktifan</th>
                            <th>Skor Fuzzy</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><span class="nim-badge">{{ $item->nim }}</span></td>
                            <td style="font-weight:500;text-align:left;">{{ $item->nama_mahasiswa }}</td>
                            <td style="text-align:left;">{{ $item->nama_matkul }}</td>
                            <td>{{ number_format($item->kehadiran,1) }}%</td>
                            <td>{{ number_format($item->nilai_tugas,1) }}</td>
                            <td>{{ number_format($item->keaktifan_diskusi,1) }}</td>
                            <td><strong>{{ number_format($item->skor_fuzzy,2) }}</strong></td>
                            <td>
                                @if($item->keterangan=='Lulus')
                                    <span class="skor-badge skor-lulus"><i class="bi bi-check-circle-fill"></i> Lulus</span>
                                @elseif($item->keterangan=='Marginal')
                                    <span class="skor-badge skor-marginal"><i class="bi bi-exclamation-triangle-fill"></i> Marginal</span>
                                @else
                                    <span class="skor-badge skor-tidak"><i class="bi bi-x-circle-fill"></i> Tidak Lulus</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="{{ route('fuzzy.show', $item->id) }}" class="btn-detail"><i class="bi bi-eye"></i> Detail</a>
                                    @if($role !== 'mahasiswa')
                                    <a href="{{ route('fuzzy.destroy', $item->id) }}" class="btn-hapus" onclick="return confirm('Yakin hapus evaluasi ini?')"><i class="bi bi-trash"></i></a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">
                                <div class="empty-state"><i class="bi bi-folder-x"></i><p>Belum ada data evaluasi fuzzy.</p></div>
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
    document.getElementById('searchInput').addEventListener('keyup',function(){
        const f=this.value.toLowerCase();
        document.querySelectorAll('#dataTable tbody tr').forEach(r=>{
            if(!r.querySelector('.empty-state')) r.style.display=r.textContent.toLowerCase().includes(f)?'':'none';
        });
    });
    function toggleSidebar(){document.getElementById('sidebar').classList.toggle('open');document.getElementById('sbOverlay').classList.toggle('show');}
    (function tick(){const d=new Date();document.getElementById('clockDisplay').textContent=d.toLocaleDateString('id-ID',{weekday:'long',year:'numeric',month:'long',day:'numeric'})+' · '+d.toLocaleTimeString('id-ID');setTimeout(tick,1000)})();
</script>
</body>
</html>
