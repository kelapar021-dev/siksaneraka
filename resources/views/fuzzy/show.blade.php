<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Evaluasi Fuzzy – SIAKAD</title>
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

        .detail-card{background:var(--white);border:1px solid var(--gray-200);border-radius:var(--radius-lg);box-shadow:var(--shadow-sm);overflow:hidden;margin-bottom:24px;}
        .detail-header{padding:18px 24px;border-bottom:1px solid var(--gray-100);display:flex;align-items:center;gap:10px;}
        .detail-body{padding:24px;}
        .info-grid{display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:24px;}
        .info-item{background:var(--gray-50);border:1px solid var(--gray-200);border-radius:var(--radius-sm);padding:12px 16px;}
        .info-item-label{font-size:11px;font-weight:600;color:var(--gray-400);text-transform:uppercase;letter-spacing:.5px;margin-bottom:4px;}
        .info-item-value{font-size:15px;font-weight:700;color:var(--gray-800);}
        .skor-result{text-align:center;background:linear-gradient(135deg,var(--blue-50),#ede9fe);border:2px solid var(--blue-200);border-radius:var(--radius-lg);padding:28px;margin-bottom:24px;}
        .skor-number{font-size:48px;font-weight:800;color:var(--blue-700);line-height:1;}
        .skor-label{font-size:14px;color:var(--gray-600);margin-top:8px;font-weight:500;}
        .skor-status{display:inline-block;padding:6px 20px;border-radius:24px;font-size:14px;font-weight:700;margin-top:12px;}
        .status-lulus{background:#dcfce7;color:#15803d;}
        .status-marginal{background:#fef9c3;color:#a16207;}
        .status-tidak{background:#fee2e2;color:#b91c1c;}
        .fuzzy-section{margin-bottom:24px;}
        .fuzzy-section-title{font-size:14px;font-weight:700;color:var(--gray-800);margin-bottom:12px;display:flex;align-items:center;gap:8px;}
        .fuzzy-section-title i{color:var(--blue-600);}
        .membership-table{width:100%;border-collapse:collapse;font-size:12px;}
        .membership-table th{background:var(--gray-50);border:1px solid var(--gray-200);padding:8px 12px;text-align:center;font-weight:600;color:var(--gray-600);}
        .membership-table td{border:1px solid var(--gray-200);padding:8px 12px;text-align:center;}
        .membership-table tr:hover td{background:var(--blue-50);}
        .mu-val{font-weight:700;color:var(--blue-600);}
        .rule-badge{display:inline-block;padding:2px 8px;border-radius:12px;font-size:11px;font-weight:600;}
        .rule-tidak{background:#fee2e2;color:#b91c1c;}
        .rule-marginal{background:#fef9c3;color:#a16207;}
        .rule-lulus{background:#dcfce7;color:#15803d;}
        .btn-kembali{background:var(--white);border:1px solid var(--gray-200);color:var(--gray-600);padding:8px 20px;border-radius:var(--radius-sm);font-size:13px;font-weight:600;text-decoration:none;display:inline-flex;align-items:center;gap:6px;transition:all .15s;}
        .btn-kembali:hover{background:var(--gray-50);border-color:var(--gray-400);}
        .sb-overlay{display:none;position:fixed;inset:0;z-index:199;background:rgba(15,23,42,.4);}
        .sb-overlay.show{display:block;}

        canvas.fuzzy-graph{width:100%;height:280px;display:block;border:1px solid var(--gray-200);border-radius:var(--radius-sm);background:#fff;}
        .graph-row{display:grid;grid-template-columns:1fr 1fr 1fr;gap:16px;margin-bottom:8px;}
        .graph-col{position:relative;}
        .graph-label{font-size:12px;font-weight:700;color:var(--gray-800);text-align:center;margin-bottom:6px;}
        .graph-sublabel{font-size:10px;color:var(--gray-400);text-align:center;margin-top:-4px;margin-bottom:8px;}

        .defuz-bar-wrap{background:var(--gray-50);border:1px solid var(--gray-200);border-radius:var(--radius-sm);padding:16px;}
        .defuz-bar-item{display:flex;align-items:center;gap:10px;margin-bottom:10px;}
        .defuz-bar-label{width:100px;font-size:11px;font-weight:600;color:var(--gray-600);text-align:right;flex-shrink:0;}
        .defuz-bar-track{flex:1;height:28px;background:var(--gray-200);border-radius:6px;position:relative;overflow:hidden;}
        .defuz-bar-fill{height:100%;border-radius:6px;display:flex;align-items:center;justify-content:flex-end;padding-right:8px;font-size:11px;font-weight:700;color:#fff;transition:width .6s cubic-bezier(.4,0,.2,1);}
        .defuz-bar-val{width:70px;font-size:12px;font-weight:700;color:var(--gray-800);text-align:left;flex-shrink:0;}

        @media(max-width:992px){.sidebar{transform:translateX(-100%);}.sidebar.open{transform:translateX(0);box-shadow:8px 0 32px rgba(0,0,0,.25);}.main-wrap{margin-left:0;}.btn-hamburger{display:flex;}.page-content{padding:16px;}.info-grid{grid-template-columns:1fr;}.graph-row{grid-template-columns:1fr;}}
        @media(min-width:993px) and (max-width:1200px){.graph-row{grid-template-columns:1fr 1fr;}}
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
                <p class="topbar-title"><i class="bi bi-braces-asterisk me-1" style="color:var(--blue-600);"></i>Detail Evaluasi Fuzzy</p>
                <p class="topbar-sub">Breakdown perhitungan Tsukamoto — {{ $data->nama_mahasiswa }}</p>
            </div>
        </div>
        <span class="topbar-clock" id="clockDisplay"></span>
    </div>

    <div class="page-content">
        <a href="{{ route('fuzzy.index') }}" class="btn-kembali mb-4"><i class="bi bi-arrow-left"></i> Kembali</a>

        {{-- ═══ MAHASISWA INFO + SKOR ═══ --}}
        <div class="detail-card">
            <div class="detail-header">
                <i class="bi bi-person-lines-fill" style="color:var(--blue-600);font-size:18px;"></i>
                <h5 style="font-size:15px;font-weight:700;color:var(--gray-800);margin:0;">Informasi Mahasiswa & Mata Kuliah</h5>
            </div>
            <div class="detail-body">
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-item-label">NIM</div>
                        <div class="info-item-value">{{ $data->nim }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-item-label">Nama</div>
                        <div class="info-item-value">{{ $data->nama_mahasiswa }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-item-label">Mata Kuliah</div>
                        <div class="info-item-value">{{ $data->nama_matkul }} ({{ $data->kode_mk }})</div>
                    </div>
                    <div class="info-item">
                        <div class="info-item-label">Tanggal Evaluasi</div>
                        <div class="info-item-value">{{ \Carbon\Carbon::parse($data->created_at)->format('d M Y H:i') }}</div>
                    </div>
                </div>

                <div class="skor-result">
                    <div class="skor-number">{{ number_format($data->skor_fuzzy, 2) }}</div>
                    <div class="skor-label">Skor Prediksi Kelulusan (Fuzzy Tsukamoto)</div>
                    <span class="skor-status
                        @if($data->keterangan=='Lulus') status-lulus
                        @elseif($data->keterangan=='Marginal') status-marginal
                        @else status-tidak @endif">
                        @if($data->keterangan=='Lulus') ✔ {{ $data->keterangan }}
                        @elseif($data->keterangan=='Marginal') ⚠ {{ $data->keterangan }}
                        @else ✘ {{ $data->keterangan }} @endif
                    </span>
                </div>
            </div>
        </div>

        {{-- ═══ INPUT VALUES ═══ --}}
        <div class="detail-card">
            <div class="detail-header">
                <i class="bi bi-input-cursor-text" style="color:var(--blue-600);font-size:18px;"></i>
                <h5 style="font-size:15px;font-weight:700;color:var(--gray-800);margin:0;">Input Values</h5>
            </div>
            <div class="detail-body">
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-item-label">Kehadiran</div>
                        <div class="info-item-value" style="color:var(--blue-600);">{{ number_format($data->kehadiran,1) }}%</div>
                    </div>
                    <div class="info-item">
                        <div class="info-item-label">Nilai Tugas</div>
                        <div class="info-item-value" style="color:var(--blue-600);">{{ number_format($data->nilai_tugas,1) }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-item-label">Keaktifan Diskusi</div>
                        <div class="info-item-value" style="color:var(--blue-600);">{{ number_format($data->keaktifan_diskusi,1) }}</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ═══ FUZZIFIKASI — TABEL + GRAFIK ═══ --}}
        <div class="detail-card">
            <div class="detail-header">
                <i class="bi bi-graph-down" style="color:var(--blue-600);font-size:18px;"></i>
                <h5 style="font-size:15px;font-weight:700;color:var(--gray-800);margin:0;">Fuzzifikasi — Nilai Keanggotaan</h5>
            </div>
            <div class="detail-body">
                <div style="overflow-x:auto;margin-bottom:20px;">
                    <table class="membership-table">
                        <thead>
                            <tr><th>Variabel</th><th>Input</th><th>μ(Rendah)</th><th>μ(Sedang)</th><th>μ(Tinggi)</th></tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="font-weight:600;">Kehadiran</td>
                                <td>{{ number_format($data->kehadiran,1) }}%</td>
                                <td class="mu-val">{{ number_format($hasil['fuzzified']['kehadiran']['Rendah'],4) }}</td>
                                <td class="mu-val">{{ number_format($hasil['fuzzified']['kehadiran']['Sedang'],4) }}</td>
                                <td class="mu-val">{{ number_format($hasil['fuzzified']['kehadiran']['Tinggi'],4) }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight:600;">Nilai Tugas</td>
                                <td>{{ number_format($data->nilai_tugas,1) }}</td>
                                <td class="mu-val">{{ number_format($hasil['fuzzified']['nilai_tugas']['Rendah'],4) }}</td>
                                <td class="mu-val">{{ number_format($hasil['fuzzified']['nilai_tugas']['Sedang'],4) }}</td>
                                <td class="mu-val">{{ number_format($hasil['fuzzified']['nilai_tugas']['Tinggi'],4) }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight:600;">Keaktifan Diskusi</td>
                                <td>{{ number_format($data->keaktifan_diskusi,1) }}</td>
                                <td class="mu-val">{{ number_format($hasil['fuzzified']['keaktifan']['Rendah'],4) }}</td>
                                <td class="mu-val">{{ number_format($hasil['fuzzified']['keaktifan']['Sedang'],4) }}</td>
                                <td class="mu-val">{{ number_format($hasil['fuzzified']['keaktifan']['Tinggi'],4) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="graph-row">
                    <div class="graph-col">
                        <div class="graph-label">Kehadiran</div>
                        <div class="graph-sublabel">input = {{ number_format($data->kehadiran,1) }}%</div>
                        <canvas id="gKehadiran" class="fuzzy-graph"></canvas>
                    </div>
                    <div class="graph-col">
                        <div class="graph-label">Nilai Tugas</div>
                        <div class="graph-sublabel">input = {{ number_format($data->nilai_tugas,1) }}</div>
                        <canvas id="gTugas" class="fuzzy-graph"></canvas>
                    </div>
                    <div class="graph-col">
                        <div class="graph-label">Keaktifan Diskusi</div>
                        <div class="graph-sublabel">input = {{ number_format($data->keaktifan_diskusi,1) }}</div>
                        <canvas id="gDiskusi" class="fuzzy-graph"></canvas>
                    </div>
                </div>
            </div>
        </div>

        {{-- ═══ INFERENSI — RULES ═══ --}}
        <div class="detail-card">
            <div class="detail-header">
                <i class="bi bi-lightning-charge" style="color:var(--blue-600);font-size:18px;"></i>
                <h5 style="font-size:15px;font-weight:700;color:var(--gray-800);margin:0;">Inferensi — Rules yang Aktif (α > 0)</h5>
            </div>
            <div class="detail-body">
                <div style="overflow-x:auto;margin-bottom:20px;">
                    <table class="membership-table">
                        <thead>
                            <tr><th>Rule</th><th>Kehadiran</th><th>Tugas</th><th>Diskusi</th><th>μ1</th><th>μ2</th><th>μ3</th><th>α (min)</th><th>Output</th><th>Z</th></tr>
                        </thead>
                        <tbody>
                            @forelse($hasil['active_rules'] as $r)
                            <tr>
                                <td style="font-weight:700;">R{{ $r['rule'] }}</td>
                                <td>{{ $r['kehadiran'] }}</td>
                                <td>{{ $r['tugas'] }}</td>
                                <td>{{ $r['diskusi'] }}</td>
                                <td class="mu-val">{{ number_format($r['mu1'],4) }}</td>
                                <td class="mu-val">{{ number_format($r['mu2'],4) }}</td>
                                <td class="mu-val">{{ number_format($r['mu3'],4) }}</td>
                                <td class="mu-val" style="font-weight:800;">{{ number_format($r['alpha'],4) }}</td>
                                <td>
                                    <span class="rule-badge
                                        @if($r['output']=='Lulus') rule-lulus
                                        @elseif($r['output']=='Marginal') rule-marginal
                                        @else rule-tidak @endif">
                                        {{ $r['output'] }}
                                    </span>
                                </td>
                                <td style="font-weight:700;color:var(--blue-700);">{{ number_format($r['z'],2) }}</td>
                            </tr>
                            @empty
                            <tr><td colspan="10" style="color:var(--gray-400);">Tidak ada rule aktif</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Alpha bar chart --}}
                <div class="fuzzy-section-title"><i class="bi bi-bar-chart-line"></i> Kontribusi α per Rule</div>
                <div class="defuz-bar-wrap" id="alphaBars"></div>
            </div>
        </div>

        {{-- ═══ DEFUZZIFIKASI ═══ --}}
        <div class="detail-card">
            <div class="detail-header">
                <i class="bi bi-calculator" style="color:var(--blue-600);font-size:18px;"></i>
                <h5 style="font-size:15px;font-weight:700;color:var(--gray-800);margin:0;">Defuzzifikasi Tsukamoto</h5>
            </div>
            <div class="detail-body">
                <div style="background:var(--gray-50);border:1px solid var(--gray-200);border-radius:var(--radius-sm);padding:16px;margin-bottom:16px;font-size:13px;">
                    <p style="margin:0 0 8px;font-weight:600;color:var(--gray-600);">Rumus: Z = Σ(αi × Zi) / Σ(αi)</p>
                    <p style="margin:0 0 4px;color:var(--gray-800);">
                        Σ(α×Z) = <strong>{{ number_format($hasil['total_alpha_z'], 4) }}</strong> &nbsp;&nbsp;|&nbsp;&nbsp;
                        Σ(α) = <strong>{{ number_format($hasil['total_alpha'], 4) }}</strong>
                    </p>
                    <p style="margin:0;font-size:15px;font-weight:800;color:var(--blue-700);">
                        Z = {{ number_format($hasil['total_alpha_z'], 4) }} / {{ number_format($hasil['total_alpha'], 4) }} = <strong>{{ number_format($data->skor_fuzzy, 2) }}</strong>
                    </p>
                </div>

                <div class="fuzzy-section-title"><i class="bi bi-bar-chart-steps"></i> Kontribusi α×Z per Rule</div>
                <canvas id="gDefuz" class="fuzzy-graph" style="height:300px;"></canvas>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
function toggleSidebar(){document.getElementById('sidebar').classList.toggle('open');document.getElementById('sbOverlay').classList.toggle('show');}
(function tick(){const d=new Date();document.getElementById('clockDisplay').textContent=d.toLocaleDateString('id-ID',{weekday:'long',year:'numeric',month:'long',day:'numeric'})+' · '+d.toLocaleTimeString('id-ID');setTimeout(tick,1000)})();

// ══════════════════════════════════════════════════════════════
//  CANVAS GRAPH ENGINE (same as definisi.blade.php)
// ══════════════════════════════════════════════════════════════

function muLinTurun(x, a, b) { if (x <= a) return 1; if (x >= b) return 0; return (b - x) / (b - a); }
function muLinNaik(x, a, b)  { if (x <= a) return 0; if (x >= b) return 1; return (x - a) / (b - a); }
function muSegitiga(x, a, b, c) {
    if (x <= a || x >= c) return 0;
    if (x === b) return 1;
    return x < b ? (x - a) / (b - a) : (c - x) / (c - b);
}

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
    const xMin = config.xMin || 0, xMax = config.xMax || 100;
    const yMin = 0, yMax = 1.15;
    function toX(v){ return pad.left + ((v - xMin) / (xMax - xMin)) * gW; }
    function toY(v){ return pad.top + gH - ((v - yMin) / (yMax - yMin)) * gH; }

    ctx.fillStyle = '#fff'; ctx.fillRect(0, 0, W, H);

    // Grid
    ctx.strokeStyle = '#e2e8f0'; ctx.lineWidth = 0.8; ctx.setLineDash([4, 4]);
    for (let y = 0.2; y <= 1.0; y += 0.2) { ctx.beginPath(); ctx.moveTo(pad.left, toY(y)); ctx.lineTo(W - pad.right, toY(y)); ctx.stroke(); }
    ctx.setLineDash([]);

    // Axes
    ctx.strokeStyle = '#334155'; ctx.lineWidth = 1.5;
    ctx.beginPath(); ctx.moveTo(pad.left, toY(0)); ctx.lineTo(W - pad.right + 10, toY(0)); ctx.stroke();
    ctx.fillStyle = '#334155'; ctx.beginPath(); ctx.moveTo(W - pad.right + 18, toY(0)); ctx.lineTo(W - pad.right + 8, toY(0) - 5); ctx.lineTo(W - pad.right + 8, toY(0) + 5); ctx.fill();
    ctx.beginPath(); ctx.moveTo(pad.left, toY(0)); ctx.lineTo(pad.left, pad.top - 10); ctx.stroke();
    ctx.beginPath(); ctx.moveTo(pad.left, pad.top - 18); ctx.lineTo(pad.left - 5, pad.top - 8); ctx.lineTo(pad.left + 5, pad.top - 8); ctx.fill();

    // Labels
    ctx.fillStyle = '#334155'; ctx.font = '600 12px Poppins, sans-serif'; ctx.textAlign = 'center';
    ctx.fillText(config.xLabel || 'x', W - pad.right + 8, toY(0) + 22);
    ctx.save(); ctx.translate(pad.left - 40, pad.top + gH / 2); ctx.rotate(-Math.PI / 2); ctx.fillText('μ(x)', 0, 0); ctx.restore();

    // X ticks
    ctx.font = '500 11px Poppins, sans-serif'; ctx.textAlign = 'center';
    const ticks = config.xTicks || [0, 20, 40, 50, 60, 65, 70, 80, 90, 100];
    ticks.forEach(v => { if (v < xMin || v > xMax) return; ctx.fillStyle = '#64748b'; ctx.fillText(v, toX(v), toY(0) + 16); ctx.strokeStyle = '#94a3b8'; ctx.lineWidth = 1; ctx.beginPath(); ctx.moveTo(toX(v), toY(0) - 3); ctx.lineTo(toX(v), toY(0) + 3); ctx.stroke(); });

    // Y ticks
    ctx.textAlign = 'right';
    [0, 0.2, 0.4, 0.6, 0.8, 1.0].forEach(v => { ctx.fillStyle = '#64748b'; ctx.fillText(v.toFixed(1), pad.left - 8, toY(v) + 4); });

    // Breakpoints
    if (config.breakpoints) {
        config.breakpoints.forEach(bp => {
            ctx.strokeStyle = '#94a3b8'; ctx.lineWidth = 0.8; ctx.setLineDash([3, 3]);
            ctx.beginPath(); ctx.moveTo(toX(bp.x), toY(0)); ctx.lineTo(toX(bp.x), toY(1)); ctx.stroke();
            ctx.setLineDash([]);
            ctx.fillStyle = '#475569'; ctx.font = 'italic 600 11px Poppins, sans-serif'; ctx.textAlign = 'center';
            ctx.fillText(bp.label, toX(bp.x), toY(0) + 30);
        });
    }

    // μ=1 line
    ctx.strokeStyle = '#94a3b8'; ctx.lineWidth = 0.6; ctx.setLineDash([2, 3]);
    ctx.beginPath(); ctx.moveTo(pad.left, toY(1)); ctx.lineTo(W - pad.right, toY(1)); ctx.stroke();
    ctx.setLineDash([]);
    ctx.fillStyle = '#94a3b8'; ctx.font = '500 10px Poppins, sans-serif'; ctx.textAlign = 'left';
    ctx.fillText('μ = 1', W - pad.right + 2, toY(1) + 4);

    // Membership functions
    const colors = { rendah: '#dc2626', sedang: '#ca8a04', tinggi: '#16a34a' };
    config.functions.forEach(fn => {
        const pts = [];
        for (let x = xMin; x <= xMax; x += 0.5) pts.push({ x, y: fn.calc(x) });

        ctx.fillStyle = fn.fill || 'rgba(0,0,0,0.04)';
        ctx.beginPath(); ctx.moveTo(toX(pts[0].x), toY(0));
        pts.forEach(p => ctx.lineTo(toX(p.x), toY(p.y)));
        ctx.lineTo(toX(pts[pts.length - 1].x), toY(0)); ctx.closePath(); ctx.fill();

        ctx.strokeStyle = fn.color; ctx.lineWidth = 2.5; ctx.lineJoin = 'round';
        ctx.beginPath();
        pts.forEach((p, i) => { const px = toX(p.x), py = toY(p.y); if (i === 0) ctx.moveTo(px, py); else ctx.lineTo(px, py); });
        ctx.stroke();

        if (fn.labelPos) {
            ctx.fillStyle = fn.color; ctx.font = 'bold 12px Poppins, sans-serif'; ctx.textAlign = 'center';
            ctx.fillText(fn.label, toX(fn.labelPos.x), toY(fn.labelPos.y) - 10);
        }
    });

    // ── INPUT MARKER (vertical dashed line) ──
    if (config.inputValue != null) {
        const ix = config.inputValue;
        ctx.strokeStyle = '#2563eb'; ctx.lineWidth = 2; ctx.setLineDash([6, 4]);
        ctx.beginPath(); ctx.moveTo(toX(ix), toY(0)); ctx.lineTo(toX(ix), toY(1.05)); ctx.stroke();
        ctx.setLineDash([]);

        // Input dot on each function
        config.functions.forEach(fn => {
            const mu = fn.calc(ix);
            if (mu > 0) {
                ctx.beginPath(); ctx.arc(toX(ix), toY(mu), 5, 0, Math.PI * 2);
                ctx.fillStyle = '#fff'; ctx.fill();
                ctx.strokeStyle = fn.color; ctx.lineWidth = 2.5; ctx.stroke();

                // μ value label
                ctx.fillStyle = '#1e293b'; ctx.font = 'bold 11px Poppins, sans-serif'; ctx.textAlign = 'left';
                ctx.fillText('μ=' + mu.toFixed(3), toX(ix) + 10, toY(mu) - 6);
            }
        });

        // Input label
        ctx.fillStyle = '#2563eb'; ctx.font = 'bold 12px Poppins, sans-serif'; ctx.textAlign = 'center';
        ctx.fillText('x = ' + ix, toX(ix), toY(0) + 44);
    }
}

// ── INPUT DATA from PHP ──
const inputKehadiran = {{ $data->kehadiran }};
const inputTugas     = {{ $data->nilai_tugas }};
const inputDiskusi   = {{ $data->keaktifan_diskusi }};

const commonTicks = [0, 10, 20, 30, 40, 50, 60, 65, 70, 80, 90, 100];
const commonBP = [{x:50,label:'a=50'},{x:40,label:'b=40'},{x:65,label:'c=65'},{x:90,label:'d=90'},{x:70,label:'e=70'}];
const commonFns = [
    { calc: x => muLinTurun(x, 0, 50), color: '#dc2626', fill: 'rgba(220,38,38,0.06)', label: 'Rendah', labelPos: { x: 15, y: 0.95 } },
    { calc: x => muSegitiga(x, 40, 65, 90), color: '#ca8a04', fill: 'rgba(202,138,4,0.06)', label: 'Sedang', labelPos: { x: 65, y: 1.05 } },
    { calc: x => muLinNaik(x, 70, 100), color: '#16a34a', fill: 'rgba(22,163,74,0.06)', label: 'Tinggi', labelPos: { x: 88, y: 0.95 } },
];

function drawAllGraphs() {
    drawFuzzyGraph('gKehadiran', { xMin:0,xMax:100,xLabel:'Kehadiran (%)',xTicks:commonTicks,breakpoints:commonBP,inputValue:inputKehadiran,functions:commonFns.map(f=>({...f})) });
    drawFuzzyGraph('gTugas',     { xMin:0,xMax:100,xLabel:'Nilai Tugas',xTicks:commonTicks,breakpoints:commonBP,inputValue:inputTugas,functions:commonFns.map(f=>({...f})) });
    drawFuzzyGraph('gDiskusi',   { xMin:0,xMax:100,xLabel:'Keaktifan Diskusi',xTicks:commonTicks,breakpoints:commonBP,inputValue:inputDiskusi,functions:commonFns.map(f=>({...f})) });
}

// ── ALPHA BARS (HTML) ──
function renderAlphaBars() {
    const rules = @json($hasil['active_rules']);
    const wrap = document.getElementById('alphaBars');
    if (!rules.length) { wrap.innerHTML = '<p style="color:var(--gray-400);font-size:13px;">Tidak ada rule aktif.</p>'; return; }
    const maxAlpha = Math.max(...rules.map(r => r.alpha));
    const colorMap = { 'Tidak Lulus': '#dc2626', 'Marginal': '#ca8a04', 'Lulus': '#16a34a' };
    wrap.innerHTML = rules.map(r => {
        const pct = maxAlpha > 0 ? (r.alpha / maxAlpha * 100) : 0;
        const col = colorMap[r.output] || '#94a3b8';
        return `<div class="defuz-bar-wrap" style="margin-bottom:0;padding:0;background:none;border:none;">
            <div class="defuz-bar-item">
                <div class="defuz-bar-label">R${r.rule} — ${r.output}</div>
                <div class="defuz-bar-track">
                    <div class="defuz-bar-fill" style="width:${pct}%;background:${col};">${r.alpha > 0 ? r.alpha.toFixed(3) : ''}</div>
                </div>
                <div class="defuz-bar-val">α = ${r.alpha.toFixed(4)}</div>
            </div>
        </div>`;
    }).join('');
}

// ── DEFUZZIFIKASI BAR CHART (Canvas) ──
function drawDefuzChart() {
    const rules = @json($hasil['active_rules']);
    if (!rules.length) return;
    const canvas = document.getElementById('gDefuz');
    const dpr = window.devicePixelRatio || 1;
    const rect = canvas.getBoundingClientRect();
    canvas.width = rect.width * dpr;
    canvas.height = rect.height * dpr;
    const ctx = canvas.getContext('2d');
    ctx.scale(dpr, dpr);
    const W = rect.width, H = rect.height;
    const pad = { top: 20, right: 20, bottom: 40, left: 80 };
    const gW = W - pad.left - pad.right;
    const gH = H - pad.top - pad.bottom;

    ctx.fillStyle = '#fff'; ctx.fillRect(0, 0, W, H);

    const contributions = rules.map(r => ({ label: 'R' + r.rule, alphaZ: r.alpha * r.z, z: r.z, alpha: r.alpha, output: r.output }));
    const maxVal = Math.max(...contributions.map(c => c.alphaZ), 1);
    const barH = Math.min(30, (gH / contributions.length) - 6);
    const gap = (gH - barH * contributions.length) / (contributions.length + 1);

    const colorMap = { 'Tidak Lulus': '#dc2626', 'Marginal': '#ca8a04', 'Lulus': '#16a34a' };

    contributions.forEach((c, i) => {
        const y = pad.top + gap + i * (barH + gap);
        const bw = (c.alphaZ / maxVal) * gW;
        const col = colorMap[c.output] || '#94a3b8';

        // Label
        ctx.fillStyle = '#334155'; ctx.font = '600 12px Poppins, sans-serif'; ctx.textAlign = 'right';
        ctx.fillText(c.label, pad.left - 10, y + barH / 2 + 4);

        // Bar bg
        ctx.fillStyle = '#f1f5f9';
        ctx.fillRect(pad.left, y, gW, barH);

        // Bar fill
        ctx.fillStyle = col;
        ctx.fillRect(pad.left, y, Math.max(bw, 2), barH);

        // Value
        if (bw > 60) {
            ctx.fillStyle = '#fff'; ctx.font = 'bold 11px Poppins, sans-serif'; ctx.textAlign = 'right';
            ctx.fillText(c.alphaZ.toFixed(2), pad.left + bw - 8, y + barH / 2 + 4);
        } else {
            ctx.fillStyle = '#334155'; ctx.font = '600 11px Poppins, sans-serif'; ctx.textAlign = 'left';
            ctx.fillText(c.alphaZ.toFixed(2), pad.left + bw + 6, y + barH / 2 + 4);
        }
    });

    // Axis label
    ctx.fillStyle = '#64748b'; ctx.font = '500 11px Poppins, sans-serif'; ctx.textAlign = 'center';
    ctx.fillText('Kontribusi α × Z', pad.left + gW / 2, H - 8);

    // Total line
    const totalAlphaZ = contributions.reduce((s, c) => s + c.alphaZ, 0);
    ctx.fillStyle = '#2563eb'; ctx.font = 'bold 12px Poppins, sans-serif'; ctx.textAlign = 'right';
    ctx.fillText('Σ(α×Z) = ' + totalAlphaZ.toFixed(4), W - pad.right, H - 8);
}

// ── INIT ──
drawAllGraphs();
renderAlphaBars();
drawDefuzChart();
window.addEventListener('resize', () => { drawAllGraphs(); drawDefuzChart(); });
</script>
</body>
</html>
