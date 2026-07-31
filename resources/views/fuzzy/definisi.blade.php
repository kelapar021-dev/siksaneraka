<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Definisi Fuzzy – SIAKAD</title>
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

        .doc-card{background:var(--white);border:1px solid var(--gray-200);border-radius:var(--radius-lg);box-shadow:var(--shadow-sm);overflow:hidden;margin-bottom:24px;}
        .doc-card-header{padding:18px 24px;border-bottom:1px solid var(--gray-100);display:flex;align-items:center;gap:10px;}
        .doc-card-header i{font-size:20px;color:var(--blue-600);}
        .doc-card-title{font-size:16px;font-weight:700;color:var(--gray-800);margin:0;}
        .doc-card-body{padding:24px;}

        .var-badge{display:inline-block;padding:3px 10px;border-radius:14px;font-size:11px;font-weight:700;letter-spacing:.3px;}
        .var-input{background:var(--blue-50);color:var(--blue-700);}
        .var-output{background:#dcfce7;color:#15803d;}

        .formula-box{background:var(--gray-50);border:1px solid var(--gray-200);border-radius:var(--radius-sm);padding:14px 18px;margin-bottom:12px;}
        .formula-label{font-size:11px;font-weight:700;color:var(--gray-400);text-transform:uppercase;letter-spacing:.5px;margin-bottom:6px;}
        .formula-math{font-family:'Courier New',Consolas,monospace;font-size:13px;font-weight:600;color:var(--gray-800);line-height:2;}
        .formula-math .hl{color:var(--blue-600);font-weight:800;}
        .formula-math .fn-red{color:#dc2626;}
        .formula-math .fn-yellow{color:#ca8a04;}
        .formula-math .fn-green{color:#16a34a;}

        canvas.fuzzy-graph{width:100%;height:260px;display:block;border:1px solid var(--gray-200);border-radius:var(--radius-sm);background:#fff;}

        .tsukamoto-box{background:linear-gradient(135deg,var(--blue-50),#ede9fe);border:2px solid var(--blue-200);border-radius:var(--radius-md);padding:20px;margin-top:16px;}
        .tsukamoto-formula{font-family:'Courier New',Consolas,monospace;font-size:18px;font-weight:700;color:var(--blue-700);text-align:center;padding:14px;background:var(--white);border-radius:var(--radius-sm);border:1px solid var(--blue-100);}

        .rule-table{width:100%;border-collapse:collapse;font-size:12px;}
        .rule-table th{background:var(--blue-800);color:#fff;padding:10px 12px;text-align:center;font-weight:600;font-size:12px;}
        .rule-table td{border:1px solid var(--gray-200);padding:8px 10px;text-align:center;}
        .rule-table tbody tr:hover td{background:var(--blue-50);}
        .rule-table .rule-nomor{font-weight:700;color:var(--blue-700);width:40px;}
        .rule-table .out-tidak{background:#fee2e2;color:#b91c1c;font-weight:600;}
        .rule-table .out-marginal{background:#fef9c3;color:#a16207;font-weight:600;}
        .rule-table .out-lulus{background:#dcfce7;color:#15803d;font-weight:600;}

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
    <a href="{{ route('rekap.index') }}"          class="nav-link-sb"><i class="bi bi-bar-chart-fill"></i> Rekap</a>
    <a href="{{ route('notifikasi.index') }}"     class="nav-link-sb"><i class="bi bi-bell-fill"></i> Notifikasi</a>
    <a href="{{ route('transaksi.pembayaran') }}" class="nav-link-sb"><i class="bi bi-credit-card-fill"></i> Pembayaran</a>
    <a href="{{ route('transaksi.nilai') }}"      class="nav-link-sb"><i class="bi bi-pencil-fill"></i> Nilai</a>
    <a href="{{ route('fuzzy.definisi') }}"       class="nav-link-sb active"><i class="bi bi-book-half"></i> Definisi Fuzzy</a>
    <a href="{{ route('fuzzy.index') }}"          class="nav-link-sb"><i class="bi bi-braces-asterisk"></i> Fuzzy Evaluasi</a>
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
                <p class="topbar-title"><i class="bi bi-book-half me-1" style="color:var(--blue-600);"></i>Definisi Sistem Fuzzy</p>
                <p class="topbar-sub">Himpunan fuzzy, domain, fungsi keanggotaan, rumus & grafik</p>
            </div>
        </div>
        <span class="topbar-clock" id="clockDisplay"></span>
    </div>

    <div class="page-content">

        {{-- ═══ RINGKASAN ═══ --}}
        <div class="doc-card">
            <div class="doc-card-header"><i class="bi bi-info-circle"></i><h5 class="doc-card-title">Ringkasan Sistem</h5></div>
            <div class="doc-card-body">
                <div class="row g-3">
                    <div class="col-md-3"><div class="formula-box" style="text-align:center"><div class="formula-label">Metode</div><div style="font-size:18px;font-weight:800;color:var(--blue-700)">Tsukamoto</div></div></div>
                    <div class="col-md-3"><div class="formula-box" style="text-align:center"><div class="formula-label">Jumlah Input</div><div style="font-size:18px;font-weight:800;color:var(--blue-700)">3 Variabel</div></div></div>
                    <div class="col-md-3"><div class="formula-box" style="text-align:center"><div class="formula-label">Jumlah Output</div><div style="font-size:18px;font-weight:800;color:var(--blue-700)">1 Variabel</div></div></div>
                    <div class="col-md-3"><div class="formula-box" style="text-align:center"><div class="formula-label">Total Rules</div><div style="font-size:18px;font-weight:800;color:var(--blue-700)">27 Rules (3³)</div></div></div>
                </div>
            </div>
        </div>

        {{-- ═══ INPUT 1: KEHADIRAN ═══ --}}
        <div class="doc-card">
            <div class="doc-card-header"><i class="bi bi-check-circle"></i><h5 class="doc-card-title">Input 1 — Kehadiran <span class="var-badge var-input">INPUT</span></h5></div>
            <div class="doc-card-body">
                <div class="row g-4">
                    <div class="col-lg-5">
                        <div class="formula-box">
                            <div class="formula-label">Domain / Semesta Pembicaraan</div>
                            <div class="formula-math">X = <span class="hl">[0, 100]</span> (persen kehadiran)</div>
                        </div>
                        <div class="formula-box">
                            <div class="formula-label">Himpunan Fuzzy</div>
                            <div class="formula-math">A₁ = <span class="fn-red">Rendah</span><br>A₂ = <span class="fn-yellow">Sedang</span><br>A₃ = <span class="fn-green">Tinggi</span></div>
                        </div>
                        <div class="formula-box">
                            <div class="formula-label">Fungsi Keanggotaan</div>
                            <div class="formula-math" style="font-size:12px;line-height:2.1">
                                <span class="fn-red">μ<sub>Rendah</sub>(x)</span> = <strong>Linear Turun</strong><br>
                                &nbsp;&nbsp;(50 − x) / 50 &nbsp;jika 0 ≤ x ≤ 50<br>
                                &nbsp;&nbsp;0 &nbsp;jika x &gt; 50<br>
                                <span class="fn-yellow">μ<sub>Sedang</sub>(x)</span> = <strong>Segitiga</strong><br>
                                &nbsp;&nbsp;(x − 40) / 25 &nbsp;jika 40 ≤ x &lt; 65<br>
                                &nbsp;&nbsp;(90 − x) / 25 &nbsp;jika 65 &lt; x ≤ 90<br>
                                &nbsp;&nbsp;0 &nbsp;jika lainnya<br>
                                <span class="fn-green">μ<sub>Tinggi</sub>(x)</span> = <strong>Linear Naik</strong><br>
                                &nbsp;&nbsp;(x − 70) / 30 &nbsp;jika 70 ≤ x ≤ 100<br>
                                &nbsp;&nbsp;0 &nbsp;jika x &lt; 70
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <canvas id="gKehadiran" class="fuzzy-graph"></canvas>
                    </div>
                </div>
            </div>
        </div>

        {{-- ═══ INPUT 2: NILAI TUGAS ═══ --}}
        <div class="doc-card">
            <div class="doc-card-header"><i class="bi bi-pencil"></i><h5 class="doc-card-title">Input 2 — Nilai Tugas <span class="var-badge var-input">INPUT</span></h5></div>
            <div class="doc-card-body">
                <div class="row g-4">
                    <div class="col-lg-5">
                        <div class="formula-box">
                            <div class="formula-label">Domain / Semesta Pembicaraan</div>
                            <div class="formula-math">Y = <span class="hl">[0, 100]</span></div>
                        </div>
                        <div class="formula-box">
                            <div class="formula-label">Himpunan Fuzzy</div>
                            <div class="formula-math">B₁ = <span class="fn-red">Rendah</span><br>B₂ = <span class="fn-yellow">Sedang</span><br>B₃ = <span class="fn-green">Tinggi</span></div>
                        </div>
                        <div class="formula-box">
                            <div class="formula-label">Fungsi Keanggotaan</div>
                            <div class="formula-math" style="font-size:12px;line-height:2.1">
                                <span class="fn-red">μ<sub>Rendah</sub>(y)</span> = <strong>Linear Turun</strong><br>
                                &nbsp;&nbsp;(50 − y) / 50 &nbsp;jika 0 ≤ y ≤ 50<br>
                                &nbsp;&nbsp;0 &nbsp;jika y &gt; 50<br>
                                <span class="fn-yellow">μ<sub>Sedang</sub>(y)</span> = <strong>Segitiga</strong><br>
                                &nbsp;&nbsp;(y − 40) / 25 &nbsp;jika 40 ≤ y &lt; 65<br>
                                &nbsp;&nbsp;(90 − y) / 25 &nbsp;jika 65 &lt; y ≤ 90<br>
                                &nbsp;&nbsp;0 &nbsp;jika lainnya<br>
                                <span class="fn-green">μ<sub>Tinggi</sub>(y)</span> = <strong>Linear Naik</strong><br>
                                &nbsp;&nbsp;(y − 70) / 30 &nbsp;jika 70 ≤ y ≤ 100<br>
                                &nbsp;&nbsp;0 &nbsp;jika y &lt; 70
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <canvas id="gTugas" class="fuzzy-graph"></canvas>
                    </div>
                </div>
            </div>
        </div>

        {{-- ═══ INPUT 3: KEAKTIFAN DISKUSI ═══ --}}
        <div class="doc-card">
            <div class="doc-card-header"><i class="bi bi-chat-dots"></i><h5 class="doc-card-title">Input 3 — Keaktifan Diskusi <span class="var-badge var-input">INPUT</span></h5></div>
            <div class="doc-card-body">
                <div class="row g-4">
                    <div class="col-lg-5">
                        <div class="formula-box">
                            <div class="formula-label">Domain / Semesta Pembicaraan</div>
                            <div class="formula-math">Z = <span class="hl">[0, 100]</span></div>
                        </div>
                        <div class="formula-box">
                            <div class="formula-label">Himpunan Fuzzy</div>
                            <div class="formula-math">C₁ = <span class="fn-red">Rendah</span><br>C₂ = <span class="fn-yellow">Sedang</span><br>C₃ = <span class="fn-green">Tinggi</span></div>
                        </div>
                        <div class="formula-box">
                            <div class="formula-label">Fungsi Keanggotaan</div>
                            <div class="formula-math" style="font-size:12px;line-height:2.1">
                                <span class="fn-red">μ<sub>Rendah</sub>(z)</span> = <strong>Linear Turun</strong><br>
                                &nbsp;&nbsp;(50 − z) / 50 &nbsp;jika 0 ≤ z ≤ 50<br>
                                &nbsp;&nbsp;0 &nbsp;jika z &gt; 50<br>
                                <span class="fn-yellow">μ<sub>Sedang</sub>(z)</span> = <strong>Segitiga</strong><br>
                                &nbsp;&nbsp;(z − 40) / 25 &nbsp;jika 40 ≤ z &lt; 65<br>
                                &nbsp;&nbsp;(90 − z) / 25 &nbsp;jika 65 &lt; z ≤ 90<br>
                                &nbsp;&nbsp;0 &nbsp;jika lainnya<br>
                                <span class="fn-green">μ<sub>Tinggi</sub>(z)</span> = <strong>Linear Naik</strong><br>
                                &nbsp;&nbsp;(z − 70) / 30 &nbsp;jika 70 ≤ z ≤ 100<br>
                                &nbsp;&nbsp;0 &nbsp;jika z &lt; 70
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <canvas id="gDiskusi" class="fuzzy-graph"></canvas>
                    </div>
                </div>
            </div>
        </div>

        {{-- ═══ OUTPUT: SKOR KELULUSAN (TSUKAMOTO) ═══ --}}
        <div class="doc-card">
            <div class="doc-card-header"><i class="bi bi-bullseye"></i><h5 class="doc-card-title">Output — Skor Kelulusan <span class="var-badge var-output">OUTPUT</span></h5></div>
            <div class="doc-card-body">
                <div class="row g-4">
                    <div class="col-lg-5">
                        <div class="formula-box">
                            <div class="formula-label">Domain / Semesta Pembicaraan</div>
                            <div class="formula-math">W = <span class="hl">[0, 100]</span></div>
                        </div>
                        <div class="formula-box">
                            <div class="formula-label">Himpunan Fuzzy (Tsukamoto Monotonik Naik)</div>
                            <div class="formula-math">D₁ = <span class="fn-red">Tidak Lulus</span><br>D₂ = <span class="fn-yellow">Marginal</span><br>D₃ = <span class="fn-green">Lulus</span></div>
                        </div>
                        <div class="formula-box">
                            <div class="formula-label">Fungsi Keanggotaan Output</div>
                            <div class="formula-math" style="font-size:12px;line-height:2.1">
                                <span class="fn-red">Z<sub>TidakLulus</sub>(α)</span> = 20 + 30α<br>
                                &nbsp;&nbsp;Range: 20 → 50<br>
                                <span class="fn-yellow">Z<sub>Marginal</sub>(α)</span> = 30 + 40α<br>
                                &nbsp;&nbsp;Range: 30 → 70<br>
                                <span class="fn-green">Z<sub>Lulus</sub>(α)</span> = 60 + 40α<br>
                                &nbsp;&nbsp;Range: 60 → 100
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <canvas id="gOutput" class="fuzzy-graph"></canvas>
                    </div>
                </div>
                <div class="tsukamoto-box">
                    <div class="tsukamoto-title" style="font-size:14px;font-weight:700;color:var(--blue-800);margin-bottom:10px"><i class="bi bi-calculator me-1"></i> Rumus Defuzzifikasi Tsukamoto</div>
                    <div class="tsukamoto-formula">Z = Σ(αᵢ × Zᵢ) / Σ(αᵢ)</div>
                    <p style="margin:10px 0 0;font-size:12px;color:var(--gray-600)">Di mana <strong>αᵢ</strong> = min(μ₁, μ₂, μ₃) dari rule ke-i, dan <strong>Zᵢ</strong> = output Tsukamoto berdasarkan label output rule tersebut.</p>
                </div>
            </div>
        </div>

        {{-- ═══ RULE BASE ═══ --}}
        <div class="doc-card">
            <div class="doc-card-header"><i class="bi bi-lightning-charge"></i><h5 class="doc-card-title">Rule Base — 27 Rules</h5></div>
            <div class="doc-card-body" style="overflow-x:auto">
                <table class="rule-table">
                    <thead><tr><th>Rule</th><th>Kehadiran</th><th>Nilai Tugas</th><th>Keaktifan</th><th>→ Output</th></tr></thead>
                    <tbody>
                        @php
                        $rules=[
                            ['Rendah','Rendah','Rendah','Tidak Lulus'],['Rendah','Rendah','Sedang','Tidak Lulus'],['Rendah','Rendah','Tinggi','Marginal'],
                            ['Rendah','Sedang','Rendah','Tidak Lulus'],['Rendah','Sedang','Sedang','Marginal'],['Rendah','Sedang','Tinggi','Marginal'],
                            ['Rendah','Tinggi','Rendah','Marginal'],['Rendah','Tinggi','Sedang','Marginal'],['Rendah','Tinggi','Tinggi','Lulus'],
                            ['Sedang','Rendah','Rendah','Tidak Lulus'],['Sedang','Rendah','Sedang','Marginal'],['Sedang','Rendah','Tinggi','Marginal'],
                            ['Sedang','Sedang','Rendah','Marginal'],['Sedang','Sedang','Sedang','Lulus'],['Sedang','Sedang','Tinggi','Lulus'],
                            ['Sedang','Tinggi','Rendah','Marginal'],['Sedang','Tinggi','Sedang','Lulus'],['Sedang','Tinggi','Tinggi','Lulus'],
                            ['Tinggi','Rendah','Rendah','Marginal'],['Tinggi','Rendah','Sedang','Marginal'],['Tinggi','Rendah','Tinggi','Lulus'],
                            ['Tinggi','Sedang','Rendah','Marginal'],['Tinggi','Sedang','Sedang','Lulus'],['Tinggi','Sedang','Tinggi','Lulus'],
                            ['Tinggi','Tinggi','Rendah','Lulus'],['Tinggi','Tinggi','Sedang','Lulus'],['Tinggi','Tinggi','Tinggi','Lulus'],
                        ];
                        @endphp
                        @foreach($rules as $i=>$r)
                        @php
                            $outClass = $r[3]==='Lulus' ? 'out-lulus' : ($r[3]==='Marginal' ? 'out-marginal' : 'out-tidak');
                        @endphp
                        <tr>
                            <td class="rule-nomor">R{{ $i+1 }}</td>
                            <td>{{ $r[0] }}</td><td>{{ $r[1] }}</td><td>{{ $r[2] }}</td>
                            <td class="{{ $outClass }}">{{ $r[3] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
function toggleSidebar(){document.getElementById('sidebar').classList.toggle('open');document.getElementById('sbOverlay').classList.toggle('show');}
(function tick(){const d=new Date();document.getElementById('clockDisplay').textContent=d.toLocaleDateString('id-ID',{weekday:'long',year:'numeric',month:'long',day:'numeric'})+' · '+d.toLocaleTimeString('id-ID');setTimeout(tick,1000)})();

// ══════════════════════════════════════════════════════════════
//  CANVAS GRAPH DRAWING ENGINE — Gaya Buku Teks Akademik
// ══════════════════════════════════════════════════════════════

function drawFuzzyGraph(canvasId, config) {
    const canvas = document.getElementById(canvasId);
    const dpr = window.devicePixelRatio || 1;
    const rect = canvas.getBoundingClientRect();
    canvas.width = rect.width * dpr;
    canvas.height = rect.height * dpr;
    const ctx = canvas.getContext('2d');
    ctx.scale(dpr, dpr);
    const W = rect.width, H = rect.height;

    const pad = { top: 30, right: 30, bottom: 50, left: 55 };
    const gW = W - pad.left - pad.right;
    const gH = H - pad.top - pad.bottom;
    const xMin = config.xMin || 0;
    const xMax = config.xMax || 100;
    const yMin = 0, yMax = 1.15;

    function toX(v){ return pad.left + ((v - xMin) / (xMax - xMin)) * gW; }
    function toY(v){ return pad.top + gH - ((v - yMin) / (yMax - yMin)) * gH; }

    // Background
    ctx.fillStyle = '#fff';
    ctx.fillRect(0, 0, W, H);

    // Grid lines (dashed)
    ctx.strokeStyle = '#e2e8f0';
    ctx.lineWidth = 0.8;
    ctx.setLineDash([4, 4]);
    for (let y = 0.2; y <= 1.0; y += 0.2) {
        ctx.beginPath();
        ctx.moveTo(pad.left, toY(y));
        ctx.lineTo(W - pad.right, toY(y));
        ctx.stroke();
    }
    ctx.setLineDash([]);

    // Axes
    ctx.strokeStyle = '#334155';
    ctx.lineWidth = 1.5;
    // X-axis
    ctx.beginPath();
    ctx.moveTo(pad.left, toY(0));
    ctx.lineTo(W - pad.right + 10, toY(0));
    ctx.stroke();
    // Arrow X
    ctx.fillStyle = '#334155';
    ctx.beginPath();
    ctx.moveTo(W - pad.right + 18, toY(0));
    ctx.lineTo(W - pad.right + 8, toY(0) - 5);
    ctx.lineTo(W - pad.right + 8, toY(0) + 5);
    ctx.fill();
    // Y-axis
    ctx.beginPath();
    ctx.moveTo(pad.left, toY(0));
    ctx.lineTo(pad.left, pad.top - 10);
    ctx.stroke();
    // Arrow Y
    ctx.beginPath();
    ctx.moveTo(pad.left, pad.top - 18);
    ctx.lineTo(pad.left - 5, pad.top - 8);
    ctx.lineTo(pad.left + 5, pad.top - 8);
    ctx.fill();

    // Axis labels
    ctx.fillStyle = '#334155';
    ctx.font = '600 12px Poppins, sans-serif';
    ctx.textAlign = 'center';
    ctx.fillText(config.xLabel || 'x', W - pad.right + 8, toY(0) + 22);
    ctx.save();
    ctx.translate(pad.left - 40, pad.top + gH / 2);
    ctx.rotate(-Math.PI / 2);
    ctx.fillText('μ(x)', 0, 0);
    ctx.restore();

    // X ticks
    ctx.font = '500 11px Poppins, sans-serif';
    ctx.textAlign = 'center';
    const ticks = config.xTicks || [0, 20, 40, 50, 60, 65, 70, 80, 90, 100];
    ticks.forEach(v => {
        if (v < xMin || v > xMax) return;
        ctx.fillStyle = '#64748b';
        ctx.fillText(v, toX(v), toY(0) + 16);
        // Tick mark
        ctx.strokeStyle = '#94a3b8';
        ctx.lineWidth = 1;
        ctx.beginPath();
        ctx.moveTo(toX(v), toY(0) - 3);
        ctx.lineTo(toX(v), toY(0) + 3);
        ctx.stroke();
    });

    // Y ticks
    ctx.textAlign = 'right';
    [0, 0.2, 0.4, 0.6, 0.8, 1.0].forEach(v => {
        ctx.fillStyle = '#64748b';
        ctx.fillText(v.toFixed(1), pad.left - 8, toY(v) + 4);
    });

    // Breakpoint vertical dashed lines & labels
    if (config.breakpoints) {
        config.breakpoints.forEach(bp => {
            ctx.strokeStyle = '#94a3b8';
            ctx.lineWidth = 0.8;
            ctx.setLineDash([3, 3]);
            ctx.beginPath();
            ctx.moveTo(toX(bp.x), toY(0));
            ctx.lineTo(toX(bp.x), toY(1));
            ctx.stroke();
            ctx.setLineDash([]);
            // Label
            ctx.fillStyle = '#475569';
            ctx.font = 'italic 600 11px Poppins, sans-serif';
            ctx.textAlign = 'center';
            ctx.fillText(bp.label, toX(bp.x), toY(0) + 30);
        });
    }

    // μ=1 line (dashed)
    ctx.strokeStyle = '#94a3b8';
    ctx.lineWidth = 0.6;
    ctx.setLineDash([2, 3]);
    ctx.beginPath();
    ctx.moveTo(pad.left, toY(1));
    ctx.lineTo(W - pad.right, toY(1));
    ctx.stroke();
    ctx.setLineDash([]);
    ctx.fillStyle = '#94a3b8';
    ctx.font = '500 10px Poppins, sans-serif';
    ctx.textAlign = 'left';
    ctx.fillText('μ = 1', W - pad.right + 2, toY(1) + 4);

    // Draw each membership function
    const colors = { rendah: '#dc2626', sedang: '#ca8a04', tinggi: '#16a34a' };

    config.functions.forEach(fn => {
        const pts = [];
        for (let x = xMin; x <= xMax; x += 0.5) {
            pts.push({ x: x, y: fn.calc(x) });
        }

        // Fill area
        ctx.fillStyle = fn.fill || 'rgba(0,0,0,0.04)';
        ctx.beginPath();
        ctx.moveTo(toX(pts[0].x), toY(0));
        pts.forEach(p => ctx.lineTo(toX(p.x), toY(p.y)));
        ctx.lineTo(toX(pts[pts.length - 1].x), toY(0));
        ctx.closePath();
        ctx.fill();

        // Line
        ctx.strokeStyle = fn.color;
        ctx.lineWidth = 2.5;
        ctx.lineJoin = 'round';
        ctx.beginPath();
        pts.forEach((p, i) => {
            const px = toX(p.x), py = toY(p.y);
            if (i === 0) ctx.moveTo(px, py); else ctx.lineTo(px, py);
        });
        ctx.stroke();

        // Label at peak
        if (fn.labelPos) {
            ctx.fillStyle = fn.color;
            ctx.font = 'bold 12px Poppins, sans-serif';
            ctx.textAlign = 'center';
            ctx.fillText(fn.label, toX(fn.labelPos.x), toY(fn.labelPos.y) - 10);
        }
    });
}

// ══════════════════════════════════════════════════════════════
//  DRAW ALL 4 GRAPHS
// ══════════════════════════════════════════════════════════════

function muLinTurun(x, a, b) { if (x <= a) return 1; if (x >= b) return 0; return (b - x) / (b - a); }
function muLinNaik(x, a, b)  { if (x <= a) return 0; if (x >= b) return 1; return (x - a) / (b - a); }
function muSegitiga(x, a, b, c) {
    if (x <= a || x >= c) return 0;
    if (x === b) return 1;
    return x < b ? (x - a) / (b - a) : (c - x) / (c - b);
}

// ── INPUT 1: KEHADIRAN ──
drawFuzzyGraph('gKehadiran', {
    xMin: 0, xMax: 100,
    xLabel: 'Kehadiran (%)',
    xTicks: [0, 10, 20, 30, 40, 50, 60, 65, 70, 80, 90, 100],
    breakpoints: [
        { x: 50, label: 'a=50' },
        { x: 40, label: 'b=40' },
        { x: 65, label: 'c=65' },
        { x: 90, label: 'd=90' },
        { x: 70, label: 'e=70' },
    ],
    functions: [
        { calc: x => muLinTurun(x, 0, 50), color: '#dc2626', fill: 'rgba(220,38,38,0.06)', label: 'Rendah', labelPos: { x: 15, y: 0.95 } },
        { calc: x => muSegitiga(x, 40, 65, 90), color: '#ca8a04', fill: 'rgba(202,138,4,0.06)', label: 'Sedang', labelPos: { x: 65, y: 1.05 } },
        { calc: x => muLinNaik(x, 70, 100), color: '#16a34a', fill: 'rgba(22,163,74,0.06)', label: 'Tinggi', labelPos: { x: 88, y: 0.95 } },
    ]
});

// ── INPUT 2: NILAI TUGAS ──
drawFuzzyGraph('gTugas', {
    xMin: 0, xMax: 100,
    xLabel: 'Nilai Tugas',
    xTicks: [0, 10, 20, 30, 40, 50, 60, 65, 70, 80, 90, 100],
    breakpoints: [
        { x: 50, label: 'a=50' },
        { x: 40, label: 'b=40' },
        { x: 65, label: 'c=65' },
        { x: 90, label: 'd=90' },
        { x: 70, label: 'e=70' },
    ],
    functions: [
        { calc: x => muLinTurun(x, 0, 50), color: '#dc2626', fill: 'rgba(220,38,38,0.06)', label: 'Rendah', labelPos: { x: 15, y: 0.95 } },
        { calc: x => muSegitiga(x, 40, 65, 90), color: '#ca8a04', fill: 'rgba(202,138,4,0.06)', label: 'Sedang', labelPos: { x: 65, y: 1.05 } },
        { calc: x => muLinNaik(x, 70, 100), color: '#16a34a', fill: 'rgba(22,163,74,0.06)', label: 'Tinggi', labelPos: { x: 88, y: 0.95 } },
    ]
});

// ── INPUT 3: KEAKTIFAN DISKUSI ──
drawFuzzyGraph('gDiskusi', {
    xMin: 0, xMax: 100,
    xLabel: 'Keaktifan Diskusi',
    xTicks: [0, 10, 20, 30, 40, 50, 60, 65, 70, 80, 90, 100],
    breakpoints: [
        { x: 50, label: 'a=50' },
        { x: 40, label: 'b=40' },
        { x: 65, label: 'c=65' },
        { x: 90, label: 'd=90' },
        { x: 70, label: 'e=70' },
    ],
    functions: [
        { calc: x => muLinTurun(x, 0, 50), color: '#dc2626', fill: 'rgba(220,38,38,0.06)', label: 'Rendah', labelPos: { x: 15, y: 0.95 } },
        { calc: x => muSegitiga(x, 40, 65, 90), color: '#ca8a04', fill: 'rgba(202,138,4,0.06)', label: 'Sedang', labelPos: { x: 65, y: 1.05 } },
        { calc: x => muLinNaik(x, 70, 100), color: '#16a34a', fill: 'rgba(22,163,74,0.06)', label: 'Tinggi', labelPos: { x: 88, y: 0.95 } },
    ]
});

// ── OUTPUT: SKOR KELULUSAN (TSUKAMOTO) ──
drawFuzzyGraph('gOutput', {
    xMin: 0, xMax: 100,
    xLabel: 'α (derajat keanggotaan)',
    xTicks: [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100],
    breakpoints: [],
    functions: [
        { calc: x => { const a = x / 100; return (20 + 30 * a) / 100; }, color: '#dc2626', fill: 'rgba(220,38,38,0.06)', label: 'Tidak Lulus', labelPos: { x: 30, y: 0.5 } },
        { calc: x => { const a = x / 100; return (30 + 40 * a) / 100; }, color: '#ca8a04', fill: 'rgba(202,138,4,0.06)', label: 'Marginal', labelPos: { x: 50, y: 0.7 } },
        { calc: x => { const a = x / 100; return (60 + 40 * a) / 100; }, color: '#16a34a', fill: 'rgba(22,163,74,0.06)', label: 'Lulus', labelPos: { x: 80, y: 0.95 } },
    ]
});

// Redraw on resize
window.addEventListener('resize', () => {
    drawFuzzyGraph('gKehadiran', { xMin:0,xMax:100,xLabel:'Kehadiran (%)',xTicks:[0,10,20,30,40,50,60,65,70,80,90,100],breakpoints:[{x:50,label:'a=50'},{x:40,label:'b=40'},{x:65,label:'c=65'},{x:90,label:'d=90'},{x:70,label:'e=70'}],functions:[{calc:x=>muLinTurun(x,0,50),color:'#dc2626',fill:'rgba(220,38,38,0.06)',label:'Rendah',labelPos:{x:15,y:0.95}},{calc:x=>muSegitiga(x,40,65,90),color:'#ca8a04',fill:'rgba(202,138,4,0.06)',label:'Sedang',labelPos:{x:65,y:1.05}},{calc:x=>muLinNaik(x,70,100),color:'#16a34a',fill:'rgba(22,163,74,0.06)',label:'Tinggi',labelPos:{x:88,y:0.95}}] });
    drawFuzzyGraph('gTugas', { xMin:0,xMax:100,xLabel:'Nilai Tugas',xTicks:[0,10,20,30,40,50,60,65,70,80,90,100],breakpoints:[{x:50,label:'a=50'},{x:40,label:'b=40'},{x:65,label:'c=65'},{x:90,label:'d=90'},{x:70,label:'e=70'}],functions:[{calc:x=>muLinTurun(x,0,50),color:'#dc2626',fill:'rgba(220,38,38,0.06)',label:'Rendah',labelPos:{x:15,y:0.95}},{calc:x=>muSegitiga(x,40,65,90),color:'#ca8a04',fill:'rgba(202,138,4,0.06)',label:'Sedang',labelPos:{x:65,y:1.05}},{calc:x=>muLinNaik(x,70,100),color:'#16a34a',fill:'rgba(22,163,74,0.06)',label:'Tinggi',labelPos:{x:88,y:0.95}}] });
    drawFuzzyGraph('gDiskusi', { xMin:0,xMax:100,xLabel:'Keaktifan Diskusi',xTicks:[0,10,20,30,40,50,60,65,70,80,90,100],breakpoints:[{x:50,label:'a=50'},{x:40,label:'b=40'},{x:65,label:'c=65'},{x:90,label:'d=90'},{x:70,label:'e=70'}],functions:[{calc:x=>muLinTurun(x,0,50),color:'#dc2626',fill:'rgba(220,38,38,0.06)',label:'Rendah',labelPos:{x:15,y:0.95}},{calc:x=>muSegitiga(x,40,65,90),color:'#ca8a04',fill:'rgba(202,138,4,0.06)',label:'Sedang',labelPos:{x:65,y:1.05}},{calc:x=>muLinNaik(x,70,100),color:'#16a34a',fill:'rgba(22,163,74,0.06)',label:'Tinggi',labelPos:{x:88,y:0.95}}] });
    drawFuzzyGraph('gOutput', { xMin:0,xMax:100,xLabel:'α (derajat keanggotaan)',xTicks:[0,10,20,30,40,50,60,70,80,90,100],breakpoints:[],functions:[{calc:x=>{const a=x/100;return(20+30*a)/100},color:'#dc2626',fill:'rgba(220,38,38,0.06)',label:'Tidak Lulus',labelPos:{x:30,y:0.5}},{calc:x=>{const a=x/100;return(30+40*a)/100},color:'#ca8a04',fill:'rgba(202,138,4,0.06)',label:'Marginal',labelPos:{x:50,y:0.7}},{calc:x=>{const a=x/100;return(60+40*a)/100},color:'#16a34a',fill:'rgba(22,163,74,0.06)',label:'Lulus',labelPos:{x:80,y:0.95}}] });
});
</script>
</body>
</html>
