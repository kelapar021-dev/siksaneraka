{{-- resources/views/krs/create.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajukan KRS – SIAKAD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
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

        .form-card{background:var(--white);border:1px solid var(--gray-200);border-radius:var(--radius-lg);box-shadow:var(--shadow-sm);overflow:hidden;max-width:860px;}
        .form-card-header{background:var(--blue-800);padding:18px 24px;display:flex;align-items:center;gap:10px;}
        .form-card-header h5{color:#fff;font-size:15px;font-weight:700;margin:0;}
        .form-card-body{padding:28px 24px;}

        .info-banner{background:var(--blue-50);border:1px solid var(--blue-100);border-radius:var(--radius-md);padding:12px 16px;display:flex;align-items:flex-start;gap:10px;margin-bottom:24px;font-size:13px;color:var(--blue-700);}
        .info-banner i{font-size:16px;margin-top:1px;flex-shrink:0;}

        .form-label-custom{font-size:13px;font-weight:600;color:var(--gray-800);margin-bottom:6px;display:block;}
        .form-label-custom .req{color:#dc2626;}
        .form-control-custom{background:var(--gray-50);border:1px solid var(--gray-200);border-radius:var(--radius-sm);padding:10px 14px;font-size:13px;color:var(--gray-800);width:100%;outline:none;transition:border-color .18s,background .18s;}
        .form-control-custom:focus{background:var(--white);border-color:var(--blue-500);box-shadow:0 0 0 3px rgba(59,130,246,.12);}
        .form-control-custom[disabled],.form-control-custom[readonly]{background:var(--gray-100);color:var(--gray-600);cursor:default;}

        /* Multi-select jadwal */
        .jadwal-filter-bar{display:flex;align-items:center;gap:10px;margin-bottom:10px;flex-wrap:wrap;}
        .search-jadwal-wrap{position:relative;flex:1;min-width:180px;}
        .search-jadwal-wrap i{position:absolute;left:10px;top:50%;transform:translateY(-50%);color:var(--gray-400);font-size:13px;}
        .search-jadwal{background:var(--gray-50);border:1px solid var(--gray-200);border-radius:var(--radius-sm);padding:8px 10px 8px 32px;font-size:12.5px;color:var(--gray-800);width:100%;outline:none;transition:border-color .18s;}
        .search-jadwal:focus{background:var(--white);border-color:var(--blue-500);}
        .jadwal-empty{text-align:center;padding:28px 12px;color:var(--gray-400);font-size:13px;}
        .jadwal-empty i{font-size:30px;display:block;margin-bottom:6px;}
        .jadwal-list{border:1px solid var(--gray-200);border-radius:var(--radius-md);max-height:320px;overflow-y:auto;background:var(--white);}
        .jadwal-item{display:flex;align-items:center;gap:12px;padding:12px 14px;border-bottom:1px solid var(--gray-100);cursor:pointer;transition:background .15s;user-select:none;}
        .jadwal-item:last-child{border-bottom:none;}
        .jadwal-item:hover{background:var(--blue-50);}
        .jadwal-item.selected{background:#eff6ff;}
        .jadwal-checkbox{width:17px;height:17px;border:2px solid var(--gray-400);border-radius:4px;flex-shrink:0;display:flex;align-items:center;justify-content:center;font-size:11px;color:transparent;background:var(--white);transition:border-color .15s,background .15s;}
        .jadwal-item.selected .jadwal-checkbox{border-color:var(--blue-600);background:var(--blue-600);color:#fff;}
        .jadwal-item.conflict{background:#fff5f5;cursor:not-allowed;opacity:.7;}
        .jadwal-item.conflict .jadwal-checkbox{border-color:#dc2626;}
        .jadwal-info{flex:1;min-width:0;}
        .jadwal-name{font-size:13px;font-weight:600;color:var(--gray-800);}
        .jadwal-meta{font-size:11.5px;color:var(--gray-400);margin-top:2px;}
        .badge-sks-sm{background:#e0f2fe;color:#0284c7;padding:2px 8px;border-radius:6px;font-size:11px;font-weight:600;white-space:nowrap;}
        .badge-hari{background:var(--blue-50);color:var(--blue-700);padding:2px 8px;border-radius:6px;font-size:11px;white-space:nowrap;}
        .conflict-tag{background:#fee2e2;color:#dc2626;padding:2px 7px;border-radius:6px;font-size:10.5px;font-weight:600;white-space:nowrap;}

        .selected-summary{margin-top:12px;}
        .selected-chips{display:flex;flex-wrap:wrap;gap:6px;min-height:30px;}
        .chip{display:inline-flex;align-items:center;gap:5px;background:var(--blue-600);color:#fff;padding:4px 10px 4px 12px;border-radius:20px;font-size:12px;font-weight:500;}
        .chip-close{background:rgba(255,255,255,.25);border:none;color:#fff;border-radius:50%;width:17px;height:17px;display:flex;align-items:center;justify-content:center;cursor:pointer;font-size:11px;padding:0;flex-shrink:0;}
        .chip-close:hover{background:rgba(255,255,255,.45);}
        .sks-counter{font-size:12.5px;color:var(--gray-600);margin-top:8px;}
        .sks-counter .ok{font-weight:700;color:#16a34a;}
        .sks-counter .warn{font-weight:700;color:#dc2626;}

        .form-footer{display:flex;gap:10px;margin-top:28px;padding-top:20px;border-top:1px solid var(--gray-100);}
        .btn-submit{background:var(--blue-600);border:none;color:#fff;padding:11px 24px;border-radius:var(--radius-sm);font-size:14px;font-weight:700;display:inline-flex;align-items:center;gap:7px;cursor:pointer;transition:background .18s,box-shadow .18s;}
        .btn-submit:hover{background:var(--blue-700);box-shadow:var(--shadow-md);}
        .btn-submit:disabled{background:var(--gray-400);cursor:not-allowed;}
        .btn-back{background:var(--white);border:1.5px solid var(--gray-200);color:var(--gray-600);padding:11px 20px;border-radius:var(--radius-sm);font-size:14px;font-weight:600;display:inline-flex;align-items:center;gap:7px;cursor:pointer;text-decoration:none;transition:border-color .18s,color .18s;}
        .btn-back:hover{border-color:var(--blue-400);color:var(--blue-700);}

        .sb-overlay{display:none;position:fixed;inset:0;z-index:199;background:rgba(15,23,42,.4);}
        .sb-overlay.show{display:block;}
        @media(max-width:768px){
            .sidebar{transform:translateX(-100%);}
            .sidebar.open{transform:translateX(0);box-shadow:8px 0 32px rgba(0,0,0,.25);}
            .main-wrap{margin-left:0;}
            .btn-hamburger{display:flex;}
            .page-content{padding:16px;}
            .form-card-body{padding:20px 16px;}
        }
    </style>
</head>
<body>

@php $role = session('role', 'mahasiswa'); $username = session('username', 'Guest'); @endphp

<div class="sb-overlay" id="sbOverlay" onclick="toggleSidebar()"></div>

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
    <a href="{{ route('krs.index') }}"           class="nav-link-sb active"><i class="bi bi-card-checklist"></i> KRS</a>
    <a href="{{ route('jadwal.index') }}"         class="nav-link-sb"><i class="bi bi-calendar-week-fill"></i> Jadwal</a>
    <a href="{{ route('absensi.index') }}"        class="nav-link-sb"><i class="bi bi-check-circle-fill"></i> Absensi</a>
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
            <div class="user-avatar-sb">{{ strtoupper(substr($username,0,1)) }}</div>
            <div style="flex:1;min-width:0;">
                <p class="user-name-sb text-truncate">{{ $username }}</p>
                <p class="user-role-sb">{{ ucfirst($role) }}</p>
            </div>
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
                <p class="topbar-title"><i class="bi bi-plus-circle-fill me-1" style="color:var(--blue-600);"></i>Ajukan KRS</p>
                <p class="topbar-sub">Tambah Kartu Rencana Studi baru</p>
            </div>
        </div>
        <span class="topbar-clock" id="clockDisplay"></span>
    </div>

    <div class="page-content">

        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-3" role="alert"
             style="border-left:4px solid #dc2626!important;border-radius:var(--radius-md);max-width:860px;">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="form-card">
            <div class="form-card-header">
                <i class="bi bi-journal-plus" style="color:#93c5fd;font-size:18px;"></i>
                <h5>Form Pengajuan KRS</h5>
            </div>
            <div class="form-card-body">

                <div class="info-banner">
                    <i class="bi bi-info-circle-fill"></i>
                    <span>KRS yang diajukan akan menunggu persetujuan Dosen atau Admin. Pastikan jadwal yang dipilih sesuai dengan semester aktif. Anda dapat memilih <strong>lebih dari satu mata kuliah</strong> dalam satu pengajuan.</span>
                </div>

                <form action="{{ route('krs.store') }}" method="POST" id="krsForm">
                    @csrf

                    <div class="row g-3 mb-4">
                        {{-- Pilih Mahasiswa --}}
                        <div class="col-md-6">
                            <label class="form-label-custom" for="mahasiswaSelect">
                                Mahasiswa <span class="req">*</span>
                            </label>
                            <select class="form-control-custom" id="mahasiswaSelect" name="mahasiswa_id" required>
                                <option value="">— Pilih Mahasiswa —</option>
                                @foreach($mahasiswa as $mhs)
                                    <option value="{{ $mhs->id }}"
                                        data-semester="{{ $mhs->semester ?? '' }}">
                                        {{ $mhs->nim }} – {{ $mhs->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        {{-- Tahun Akademik --}}
                        <div class="col-md-6">
                            <label class="form-label-custom" for="tahunSelect">
                                Tahun Akademik <span class="req">*</span>
                            </label>
                            <select class="form-control-custom" id="tahunSelect" name="tahun_akademik_id" required>
                                <option value="">— Pilih Tahun Akademik —</option>
                                @foreach($tahun_ak as $ta)
                                    <option value="{{ $ta->id }}">
                                        {{ $ta->tahun }} · {{ $ta->semester }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Semester --}}
                    <div class="mb-4">
                        <label class="form-label-custom" for="semesterSelect">
                            Semester <span class="req">*</span>
                        </label>
                        <select class="form-control-custom" id="semesterSelect" name="semester" required>
                            <option value="">— Pilih Semester —</option>
                            @for($s = 1; $s <= 8; $s++)
                                <option value="{{ $s }}">Semester {{ $s }}</option>
                            @endfor
                        </select>
                        <div style="font-size:11.5px;color:var(--gray-400);margin-top:4px;">
                            <i class="bi bi-lightbulb"></i> Daftar mata kuliah di bawah akan otomatis menyesuaikan semester yang dipilih.
                        </div>
                    </div>

                    {{-- Multi-select Jadwal --}}
                    <div class="mb-2">
                        <label class="form-label-custom">
                            Jadwal / Mata Kuliah <span class="req">*</span>
                        </label>
                        <div class="jadwal-filter-bar">
                            <div class="search-jadwal-wrap">
                                <i class="bi bi-search"></i>
                                <input type="text" class="search-jadwal" id="searchJadwal"
                                       placeholder="Cari mata kuliah…" disabled>
                            </div>
                            <div style="font-size:12px;color:var(--gray-400);" id="selectCount">0 dipilih</div>
                        </div>

                        <div class="jadwal-list" id="jadwalList">
                            <div class="jadwal-empty" id="jadwalEmptyMsg">
                                <i class="bi bi-arrow-up-circle"></i>
                                Pilih semester terlebih dahulu.
                            </div>
                        </div>

                        <div class="selected-summary" id="selectedSummary" style="display:none;">
                            <div style="font-size:12.5px;font-weight:600;color:var(--gray-600);margin-bottom:6px;">Mata kuliah yang akan diambil:</div>
                            <div class="selected-chips" id="selectedChips"></div>
                            <div class="sks-counter">Total SKS: <span id="totalSksVal" class="ok">0</span> SKS</div>
                        </div>
                    </div>

                    <div id="hiddenInputs"></div>

                    <div class="form-footer">
                        <button type="submit" class="btn-submit" id="btnSubmit" disabled>
                            <i class="bi bi-send-fill"></i> Ajukan KRS
                        </button>
                        <a href="{{ route('krs.index') }}" class="btn-back">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Data jadwal dari controller — variabel $jadwal (collection dari DB)
// Field yang dibutuhkan: id, kode_mk, nama_matkul, sks, hari, jam_mulai, jam_selesai, nama_dosen, semester
// Kolom semester diambil dari mata_kuliah.semester — pastikan kolom ini ada di tabel mata_kuliah
const ALL_JADWAL = {!! json_encode(
    $jadwal->map(fn($j) => [
        'id'          => $j->id,
        'kode_mk'     => $j->kode_mk,
        'nama_matkul' => $j->nama_matkul,
        'sks'         => $j->sks,
        'hari'        => $j->hari,
        'jam_mulai'   => $j->jam_mulai,
        'jam_selesai' => $j->jam_selesai,
        'nama_dosen'  => $j->nama_dosen,
        'semester'    => $j->semester ?? 0,
    ])
) !!};

const MAX_SKS = 24;
let selectedIds = new Set();

const semesterSelect  = document.getElementById('semesterSelect');
const jadwalList      = document.getElementById('jadwalList');
const emptyMsg        = document.getElementById('jadwalEmptyMsg');
const searchInput     = document.getElementById('searchJadwal');
const selectCountEl   = document.getElementById('selectCount');
const selectedChips   = document.getElementById('selectedChips');
const selectedSummary = document.getElementById('selectedSummary');
const totalSksVal     = document.getElementById('totalSksVal');
const hiddenInputs    = document.getElementById('hiddenInputs');
const btnSubmit       = document.getElementById('btnSubmit');

function toMin(t) { const [h,m] = t.split(':').map(Number); return h*60+m; }
function timesOverlap(s1,e1,s2,e2) { return toMin(s1)<toMin(e2) && toMin(s2)<toMin(e1); }

function renderList(semester, query) {
    jadwalList.innerHTML = '';
    const filtered = ALL_JADWAL.filter(j =>
        parseInt(j.semester) === parseInt(semester) &&
        (j.nama_matkul.toLowerCase().includes(query) ||
         j.kode_mk.toLowerCase().includes(query) ||
         j.hari.toLowerCase().includes(query))
    );
    if (!filtered.length) {
        jadwalList.innerHTML = `<div class="jadwal-empty"><i class="bi bi-search"></i>Tidak ada mata kuliah untuk semester ${semester}.</div>`;
        return;
    }
    const selectedItems = ALL_JADWAL.filter(j => selectedIds.has(j.id));
    filtered.forEach(j => {
        const sel = selectedIds.has(j.id);
        const conflict = !sel && selectedItems.some(s =>
            s.hari === j.hari && timesOverlap(s.jam_mulai, s.jam_selesai, j.jam_mulai, j.jam_selesai)
        );
        const row = document.createElement('div');
        row.className = 'jadwal-item' + (sel ? ' selected' : '') + (conflict ? ' conflict' : '');
        row.dataset.id = j.id;
        row.innerHTML = `
            <div class="jadwal-checkbox">${sel ? '<i class="bi bi-check2"></i>' : ''}</div>
            <div class="jadwal-info">
                <div class="jadwal-name">[${j.kode_mk}] ${j.nama_matkul}</div>
                <div class="jadwal-meta">${j.nama_dosen}</div>
            </div>
            <div class="d-flex gap-1 align-items-center flex-wrap justify-content-end">
                <span class="badge-sks-sm">${j.sks} SKS</span>
                <span class="badge-hari">${j.hari} ${j.jam_mulai}–${j.jam_selesai}</span>
                ${conflict ? '<span class="conflict-tag"><i class="bi bi-exclamation-triangle-fill"></i> Bentrok</span>' : ''}
            </div>`;
        if (!conflict) row.addEventListener('click', () => toggleItem(j));
        jadwalList.appendChild(row);
    });
}

function toggleItem(j) {
    if (selectedIds.has(j.id)) {
        selectedIds.delete(j.id);
    } else {
        const totalSks = [...selectedIds].reduce((s,id) => {
            const item = ALL_JADWAL.find(d => d.id === id);
            return s + (item ? parseInt(item.sks) : 0);
        }, 0);
        if (totalSks + parseInt(j.sks) > MAX_SKS) {
            alert('Maksimal ' + MAX_SKS + ' SKS per semester. Total Anda saat ini ' + totalSks + ' SKS.');
            return;
        }
        selectedIds.add(j.id);
    }
    refresh();
}

function refresh() {
    const sem   = semesterSelect.value;
    const query = searchInput.value.toLowerCase();
    if (sem) renderList(sem, query);

    selectedChips.innerHTML = '';
    hiddenInputs.innerHTML  = '';
    let total = 0;

    selectedIds.forEach(id => {
        const j = ALL_JADWAL.find(d => d.id === id);
        if (!j) return;
        total += parseInt(j.sks);

        const chip = document.createElement('div');
        chip.className = 'chip';
        chip.innerHTML = `<span>${j.kode_mk} – ${j.nama_matkul}</span>
            <button type="button" class="chip-close" title="Hapus">×</button>`;
        chip.querySelector('.chip-close').addEventListener('click', () => {
            selectedIds.delete(j.id); refresh();
        });
        selectedChips.appendChild(chip);

        const inp = document.createElement('input');
        inp.type  = 'hidden';
        inp.name  = 'jadwal_ids[]';
        inp.value = j.id;
        hiddenInputs.appendChild(inp);
    });

    const count = selectedIds.size;
    selectCountEl.textContent = count + ' dipilih';
    totalSksVal.textContent   = total;
    totalSksVal.className     = total > MAX_SKS ? 'warn' : 'ok';
    selectedSummary.style.display = count > 0 ? '' : 'none';
    btnSubmit.disabled = count === 0;
}

semesterSelect.addEventListener('change', function() {
    const sem = this.value;
    searchInput.disabled = !sem;
    searchInput.value    = '';
    selectedIds.clear();
    if (!sem) {
        jadwalList.innerHTML = '';
        jadwalList.appendChild(emptyMsg);
    } else {
        renderList(sem, '');
    }
    refresh();
});

searchInput.addEventListener('input', function() {
    renderList(semesterSelect.value, this.value.toLowerCase());
});

// Jika role mahasiswa, auto-set semester dari data mahasiswa yang login
// (opsional: tambahkan logika di sini jika diperlukan)

document.getElementById('krsForm').addEventListener('submit', function(e) {
    if (selectedIds.size === 0) {
        e.preventDefault();
        alert('Pilih minimal satu mata kuliah sebelum mengajukan KRS.');
    }
});

function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('open');
    document.getElementById('sbOverlay').classList.toggle('show');
}
(function tick() {
    const d = new Date();
    document.getElementById('clockDisplay').textContent =
        d.toLocaleDateString('id-ID',{weekday:'long',year:'numeric',month:'long',day:'numeric'})
        + ' · ' + d.toLocaleTimeString('id-ID');
    setTimeout(tick, 1000);
})();
</script>
</body>
</html>
