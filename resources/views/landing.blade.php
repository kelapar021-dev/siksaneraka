<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD — Sistem Informasi Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; box-sizing: border-box; }
        html { scroll-behavior: smooth; scroll-padding-top: 76px; }
        :root {
            --navy: #0D2E6E; --blue: #1D4ED8; --blue-500: #2563EB;
            --blue-400: #3B82F6; --blue-50: #EFF6FF;
            --gray-50: #F8FAFC; --gray-100: #F1F5F9; --gray-200: #E2E8F0;
            --gray-400: #94A3B8; --gray-600: #475569; --gray-800: #1E293B;
        }
        body { background: #fff; }

        /* NAVBAR */
        .navbar {
            background: rgba(255,255,255,0.85); backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--gray-200); padding: 14px 0;
        }
        .navbar-brand { font-weight: 800; font-size: 20px; color: var(--navy) !important; letter-spacing: -0.5px; }
        .navbar-brand span { color: var(--blue-500); }
        .nav-link { font-weight: 500; font-size: 14px; color: var(--gray-600) !important; padding: 6px 14px !important; }
        .nav-link:hover { color: var(--blue-500) !important; }
        .btn-masuk {
            background: var(--blue-500); color: #fff; border: none;
            padding: 8px 24px; border-radius: 10px; font-weight: 600; font-size: 14px;
            transition: all 0.2s;
        }
        .btn-masuk:hover { background: var(--blue); transform: translateY(-1px); box-shadow: 0 4px 12px rgba(37,99,235,0.3); }

        /* HERO */
        .hero {
            padding: 80px 0 60px; overflow: hidden;
            background: linear-gradient(165deg, #fff 0%, var(--blue-50) 100%);
        }
        .hero-badge {
            display: inline-flex; align-items: center; gap: 6px;
            background: rgba(37,99,235,0.1); color: var(--blue-500);
            padding: 6px 16px; border-radius: 20px; font-size: 13px; font-weight: 600;
            margin-bottom: 20px;
        }
        .hero h1 {
            font-size: clamp(2rem, 4.5vw, 3.2rem); font-weight: 800;
            color: var(--navy); line-height: 1.15; letter-spacing: -1px;
            margin-bottom: 16px;
        }
        .hero h1 span { color: var(--blue-500); }
        .hero p {
            font-size: 16px; color: var(--gray-600); line-height: 1.7;
            max-width: 520px; margin-bottom: 28px;
        }
        .hero-actions { display: flex; gap: 12px; flex-wrap: wrap; }
        .btn-primary-custom {
            background: var(--blue-500); color: #fff; border: none;
            padding: 12px 32px; border-radius: 12px; font-weight: 600; font-size: 15px;
            transition: all 0.2s;
        }
        .btn-primary-custom:hover { background: var(--blue); transform: translateY(-2px); box-shadow: 0 8px 24px rgba(37,99,235,0.35); }
        .btn-outline-custom {
            background: #fff; color: var(--gray-800); border: 1.5px solid var(--gray-200);
            padding: 12px 32px; border-radius: 12px; font-weight: 600; font-size: 15px;
            transition: all 0.2s;
        }
        .btn-outline-custom:hover { border-color: var(--blue-500); color: var(--blue-500); }

        .hero-visual { position: relative; display: flex; align-items: center; justify-content: center; }
        .hero-card {
            background: #fff; border-radius: 20px; padding: 28px;
            box-shadow: 0 20px 60px rgba(13,46,110,0.12);
            border: 1px solid var(--gray-200); width: 100%; max-width: 420px;
        }
        .hero-card-icon {
            width: 56px; height: 56px; border-radius: 14px;
            background: var(--blue-50); color: var(--blue-500);
            display: flex; align-items: center; justify-content: center;
            font-size: 24px; margin-bottom: 16px;
        }
        .hero-card h5 { font-weight: 700; color: var(--navy); font-size: 16px; margin-bottom: 4px; }
        .hero-card .text-muted { font-size: 13px; color: var(--gray-400) !important; }
        .hero-card .small-stat { font-size: 11px; font-weight: 600; color: var(--gray-400); }
        .stat-number { font-size: 20px; font-weight: 800; color: var(--navy); }

        /* GENERIC SECTION */
        .section { padding: 70px 0; }
        .section-alt { background: var(--gray-50); }
        .section-label {
            display: inline-flex; align-items: center; gap: 6px;
            background: var(--blue-50); color: var(--blue-500);
            padding: 4px 14px; border-radius: 20px; font-size: 12px; font-weight: 600;
            margin-bottom: 12px;
        }
        .section-title { font-size: 28px; font-weight: 800; color: var(--navy); margin-bottom: 8px; }
        .section-sub { font-size: 15px; color: var(--gray-400); max-width: 640px; margin: 0 auto 40px; }
        .text-center .section-label { margin-left: auto; margin-right: auto; }

        /* CARDS */
        .feature-card, .info-card {
            background: #fff; border: 1px solid var(--gray-200);
            border-radius: 16px; padding: 28px 24px; text-align: center;
            transition: all 0.3s; height: 100%;
        }
        .feature-card:hover, .info-card:hover {
            transform: translateY(-4px); box-shadow: 0 12px 32px rgba(13,46,110,0.08);
            border-color: var(--blue-400);
        }
        .feature-icon {
            width: 52px; height: 52px; border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            font-size: 22px; margin: 0 auto 16px;
        }
        .feature-card h6, .info-card h6 { font-weight: 700; font-size: 15px; color: var(--navy); margin-bottom: 6px; }
        .feature-card p, .info-card p { font-size: 13px; color: var(--gray-400); margin: 0; line-height: 1.6; }
        .info-card { text-align: left; padding: 24px; }
        .info-card .feature-icon { margin: 0 0 14px; width: 46px; height: 46px; font-size: 20px; }

        /* STEPS */
        .step-num {
            width: 44px; height: 44px; border-radius: 12px; flex-shrink: 0;
            background: var(--blue-500); color: #fff; font-weight: 800; font-size: 17px;
            display: flex; align-items: center; justify-content: center;
            box-shadow: 0 6px 16px rgba(37,99,235,0.3);
        }
        .step-item { display: flex; gap: 16px; align-items: flex-start; padding: 18px 0; }
        .step-item + .step-item { border-top: 1px dashed var(--gray-200); }
        .step-item h6 { font-weight: 700; color: var(--navy); margin-bottom: 4px; font-size: 15px; }
        .step-item p { font-size: 13px; color: var(--gray-400); margin: 0; line-height: 1.6; }

        /* TABLE */
        .table-spec { font-size: 14px; }
        .table-spec th { background: var(--blue-50); color: var(--navy); font-weight: 700; white-space: nowrap; }
        .table-spec td { color: var(--gray-600); vertical-align: middle; }

        /* API METHOD BADGES */
        .method {
            display: inline-block; min-width: 52px; text-align: center;
            font-size: 11px; font-weight: 800; letter-spacing: 0.5px;
            padding: 3px 8px; border-radius: 6px; color: #fff;
        }
        .method-get { background: #16A34A; }
        .method-post { background: #2563EB; }
        .method-put { background: #D97706; }
        .method-delete { background: #DC2626; }

        /* CHECKLIST */
        .check-list { list-style: none; padding: 0; margin: 0; }
        .check-list li { display: flex; gap: 10px; align-items: flex-start; padding: 8px 0; font-size: 14px; color: var(--gray-600); }
        .check-list li i { color: var(--blue-500); margin-top: 3px; }
        .check-list li strong { color: var(--navy); }

        /* FLOWCHART STATIS */
        .flow-wrap { display: flex; flex-direction: column; align-items: center; width: 100%; }
        .flow-node {
            background: #fff; border: 2px solid var(--blue-400); border-radius: 12px;
            padding: 12px 20px; text-align: center; width: 100%; max-width: 340px;
        }
        .flow-node h6 { font-weight: 700; color: var(--navy); font-size: 14px; margin-bottom: 2px; }
        .flow-node p { font-size: 12px; color: var(--gray-600); margin: 0; line-height: 1.5; }
        .flow-decision {
            background: var(--blue-50); border: 2px dashed var(--blue-500);
            border-radius: 12px; padding: 12px 20px; text-align: center; width: 100%; max-width: 340px;
        }
        .flow-decision h6 { font-weight: 700; color: var(--navy); font-size: 14px; margin-bottom: 2px; }
        .flow-decision p { font-size: 12px; color: var(--gray-600); margin: 0; line-height: 1.5; }
        .flow-start {
            background: var(--navy); color: #fff; border-radius: 40px;
            padding: 8px 24px; font-weight: 700; font-size: 14px; width: 100%; max-width: 240px; text-align: center;
        }
        .flow-end {
            background: #F0FDF4; border: 2px solid #16A34A; color: #166534;
            border-radius: 40px; padding: 8px 24px; font-weight: 700; font-size: 14px;
            width: 100%; max-width: 240px; text-align: center;
        }
        .flow-arrow { color: var(--gray-400); font-size: 20px; padding: 6px 0; line-height: 1; position: relative; }
        .flow-label {
            font-size: 11px; font-weight: 800; color: var(--blue-500);
            position: absolute; top: -2px; right: 0; background: var(--blue-50);
            padding: 1px 8px; border-radius: 10px;
        }
        .flow-branch { display: flex; gap: 28px; justify-content: center; flex-wrap: wrap; align-items: stretch; }
        .flow-col { display: flex; flex-direction: column; align-items: center; flex: 0 1 320px; }
        .flow-col-title {
            font-size: 12px; font-weight: 800; text-transform: uppercase; letter-spacing: 1px;
            color: var(--blue-500); margin-bottom: 8px; background: var(--blue-50);
            padding: 4px 14px; border-radius: 20px;
        }
        .flow-arch {
            display: flex; flex-direction: column; gap: 16px; align-items: center;
        }
        .flow-arch-row { display: flex; gap: 12px; align-items: center; justify-content: center; flex-wrap: wrap; }
        .arch-node {
            background: #fff; border: 2px solid var(--blue-400); border-radius: 12px;
            padding: 10px 18px; font-size: 13px; font-weight: 700; color: var(--navy);
            text-align: center; min-width: 130px;
        }
        .arch-node.db { border-color: #16A34A; color: #166534; background: #F0FDF4; }
        .arch-node.ngrok { border-style: dashed; border-color: var(--gray-400); color: var(--gray-600); }
        .arch-arrow { color: var(--gray-400); font-size: 18px; }

        /* TABS */
        .nav-pills .nav-link { color: var(--gray-600); background: var(--gray-100); font-weight: 600; font-size: 13px; border-radius: 10px; }
        .nav-pills .nav-link.active { background: var(--blue-500); color: #fff; }

        /* FAQ */
        .accordion-item { border: 1px solid var(--gray-200); border-radius: 12px !important; overflow: hidden; margin-bottom: 12px; }
        .accordion-button { font-weight: 600; color: var(--navy); font-size: 15px; background: #fff; }
        .accordion-button:not(.collapsed) { background: var(--blue-50); color: var(--navy); box-shadow: none; }
        .accordion-body { font-size: 14px; color: var(--gray-600); line-height: 1.7; }

        /* CONTACT */
        .contact-card {
            background: #fff; border: 1px solid var(--gray-200); border-radius: 16px;
            padding: 28px; text-align: center; height: 100%; transition: all 0.3s;
        }
        .contact-card:hover { transform: translateY(-4px); box-shadow: 0 12px 32px rgba(13,46,110,0.08); }
        .contact-card .feature-icon { width: 52px; height: 52px; margin: 0 auto 14px; }
        .contact-card a { text-decoration: none; color: var(--blue-500); font-weight: 600; font-size: 14px; word-break: break-all; }
        .contact-card h6 { font-weight: 700; color: var(--navy); font-size: 15px; }

        /* MOBILE APP SECTION */
        .mobile-app {
            background: linear-gradient(135deg, var(--navy), var(--blue));
            padding: 70px 0; color: #fff;
        }
        .mobile-app h2 { font-weight: 800; font-size: 30px; margin-bottom: 12px; }
        .mobile-app p { opacity: 0.85; font-size: 15px; max-width: 480px; }
        .btn-download {
            background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.3);
            color: #fff; padding: 10px 24px; border-radius: 12px;
            font-weight: 600; font-size: 13px; transition: all 0.2s;
            display: inline-flex; align-items: center; gap: 8px;
        }
        .btn-download:hover { background: rgba(255,255,255,0.25); color: #fff; }

        /* FOOTER */
        .footer {
            background: var(--gray-50); border-top: 1px solid var(--gray-200);
            padding: 24px 0; font-size: 13px; color: var(--gray-400);
        }

        @media (max-width: 768px) {
            .hero { padding: 50px 0 40px; text-align: center; }
            .hero p { margin-left: auto; margin-right: auto; }
            .hero-actions { justify-content: center; }
            .hero-visual { margin-top: 40px; }
            .flow-branch { gap: 18px; }
        }
    </style>
</head>
<body>
    @php
        $stats = [
            'mahasiswa'  => \Illuminate\Support\Facades\DB::table('mahasiswa')->count(),
            'dosen'      => \Illuminate\Support\Facades\DB::table('dosen')->count(),
            'matkul'     => \Illuminate\Support\Facades\DB::table('mata_kuliah')->count(),
            'jadwal'     => \Illuminate\Support\Facades\DB::table('jadwal_kuliah')->count(),
        ];
    @endphp

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/"><i class="bi bi-hexagon-fill me-2" style="color:var(--blue-500);"></i>SIAKAD<span>.</span></a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
                <i class="bi bi-list fs-4"></i>
            </button>
            <div class="collapse navbar-collapse" id="nav">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-1">
                    <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#keunggulan">Keunggulan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#fitur">Fitur</a></li>
                    <li class="nav-item"><a class="nav-link" href="#flowchart">Flowchart</a></li>
                    <li class="nav-item"><a class="nav-link" href="#modul">Modul</a></li>
                    <li class="nav-item"><a class="nav-link" href="#arsitektur">Arsitektur</a></li>
                    <li class="nav-item"><a class="nav-link" href="#api">API</a></li>
                    <li class="nav-item"><a class="nav-link" href="#instalasi">Instalasi</a></li>
                    <li class="nav-item"><a class="nav-link" href="#faq">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                    <li class="nav-item ms-lg-2">
                        <a href="/login" class="btn btn-masuk"><i class="bi bi-box-arrow-in-right me-1"></i>Masuk</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <section class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-badge"><i class="bi bi-lightning-fill"></i> Platform Akademik Terintegrasi</div>
                    <h1>Portal <span>Informasi Akademik</span> Cepat &amp; Andal</h1>
                    <p>Kelola KRS, jadwal kuliah, absensi mandiri, rekap kehadiran, nilai, pembayaran, dan evaluasi fuzzy dalam satu sistem — berbasis web (Laravel) dan aplikasi mobile (Flutter).</p>
                    <div class="hero-actions">
                        <a href="/login" class="btn btn-primary-custom"><i class="bi bi-box-arrow-in-right me-1"></i>Masuk ke SIAKAD</a>
                        <a href="/siakad.apk" class="btn btn-outline-custom" download><i class="bi bi-download me-1"></i>Download APK</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-visual">
                        <div class="hero-card">
                            <div class="hero-card-icon"><i class="bi bi-graph-up-arrow"></i></div>
                            <h5>Ringkasan Sistem</h5>
                            <p class="text-muted">Data akademik yang dikelola dalam platform.</p>
                            <hr class="my-3">
                            <div class="d-flex justify-content-between text-center">
                                <div><div class="stat-number">{{ $stats['mahasiswa'] }}</div><div class="small-stat">Mahasiswa</div></div>
                                <div><div class="stat-number">{{ $stats['dosen'] }}</div><div class="small-stat">Dosen</div></div>
                                <div><div class="stat-number">{{ $stats['matkul'] }}</div><div class="small-stat">Mata Kuliah</div></div>
                                <div><div class="stat-number">{{ $stats['jadwal'] }}</div><div class="small-stat">Jadwal</div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TENTANG -->
    <section class="section" id="tentang">
        <div class="container">
            <div class="text-center">
                <div class="section-label"><i class="bi bi-info-circle-fill"></i> Tentang</div>
                <h2 class="section-title">Sistem Informasi Akademik (SIAKAD)</h2>
                <p class="section-sub">Platform terpadu untuk mengelola seluruh proses akademik kampus secara digital.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="info-card">
                        <div class="feature-icon" style="background:var(--blue-50);color:var(--blue-500);"><i class="bi bi-signpost-2"></i></div>
                        <h6>Latar Belakang</h6>
                        <p>Pengelolaan akademik manual — KRS, absensi, nilai, dan pembayaran tersebar di banyak tempat — membuat data sulit dipantau. SIAKAD memusatkan seluruh proses dalam satu sistem web (siksaneraka) dan mobile (jasen).</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="info-card">
                        <div class="feature-icon" style="background:var(--blue-50);color:var(--blue-500);"><i class="bi bi-bullseye"></i></div>
                        <h6>Tujuan</h6>
                        <p>Menyediakan informasi akademik yang cepat, akurat, dan mudah diakses — mulai dari pendaftaran KRS, penjadwalan, absensi mandiri, rekap kehadiran dengan notifikasi peringatan, hingga evaluasi kelulusan berbasis logika fuzzy.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="info-card">
                        <div class="feature-icon" style="background:var(--blue-50);color:var(--blue-500);"><i class="bi bi-people"></i></div>
                        <h6>Target Pengguna</h6>
                        <p>Admin, staf akademik, dosen, dan mahasiswa. Masing-masing memiliki peran dan hak akses berbeda — {{ $stats['mahasiswa'] }} mahasiswa, {{ $stats['dosen'] }} dosen, {{ $stats['matkul'] }} mata kuliah, {{ $stats['jadwal'] }} jadwal kuliah terkelola dalam sistem.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="info-card">
                        <div class="feature-icon" style="background:var(--blue-50);color:var(--blue-500);"><i class="bi bi-stars"></i></div>
                        <h6>Manfaat Utama</h6>
                        <p>Data akademik terpusat dan transparan, proses KRS dan absensi lebih cepat, rekap kehadiran otomatis dengan notifikasi, evaluasi kelulusan objektif, serta akses kapan saja lewat aplikasi Android.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- KEUNGGULAN -->
    <section class="section section-alt" id="keunggulan">
        <div class="container">
            <div class="text-center">
                <div class="section-label"><i class="bi bi-trophy-fill"></i> Keunggulan</div>
                <h2 class="section-title">Mengapa SIAKAD?</h2>
                <p class="section-sub">Kelebihan yang membedakan SIAKAD dari sistem akademik konvensional.</p>
            </div>
            <div class="row g-3">
                @php
                    $ungguls = [
                        ['bi-phone', 'Web + Mobile Terpadu', 'Kelola dari panel web (siksaneraka); mahasiswa mengakses via aplikasi Android dan versi browser (jasen).'],
                        ['bi-pencil-square', 'Absensi Mandiri (Self-Report)', 'Mahasiswa mengisi kehadiran sendiri per pertemuan; dosen tinggal menghitung rekap dari data tersebut.'],
                        ['bi-bell', 'Notifikasi Peringatan', 'Kehadiran di bawah 75% memicu notifikasi peringatan otomatis ke mahasiswa, tanpa duplikasi pesan.'],
                        ['bi-cpu', 'Evaluasi Fuzzy Tsukamoto', 'Penilaian kelulusan objektif dari kehadiran, nilai tugas, dan keaktifan diskusi.'],
                        ['bi-shield-lock', 'Role-Based Access Control', 'Hak akses per peran (admin, staf_akademik, dosen, mahasiswa) hingga tingkat modul dan aksi.'],
                        ['bi-box-seam', 'Mudah Didistribusikan', 'Akses internet melalui ngrok; build web dan APK siap unduh langsung dari server.'],
                    ];
                @endphp
                @foreach($ungguls as $u)
                <div class="col-md-6 col-lg-4">
                    <div class="feature-card">
                        <div class="feature-icon" style="background:var(--blue-50);color:var(--blue-500);"><i class="bi {{ $u[0] }}"></i></div>
                        <h6>{{ $u[1] }}</h6>
                        <p>{{ $u[2] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- FITUR -->
    <section class="section" id="fitur">
        <div class="container text-center">
            <div class="section-label"><i class="bi bi-grid-3x3-gap-fill"></i> Fitur Utama</div>
            <h2 class="section-title">Kelola Akademik Lebih Mudah</h2>
            <p class="section-sub">Semua fitur yang tersedia untuk memantau perkuliahan dalam satu dashboard.</p>
            <div class="row g-3">
                @php
                    $fiturs = [
                        ['bi-book', 'KRS Online', 'Ajukan dan monitor Kartu Rencana Studi setiap semester.'],
                        ['bi-calendar-check', 'Jadwal Kuliah', 'Lihat jadwal perkuliahan harian atau per ruangan.'],
                        ['bi-grading', 'Nilai & IPK', 'Cek nilai setiap mata kuliah dan status kelulusan.'],
                        ['bi-payments', 'Pembayaran', 'Informasi status pembayaran SPP, UKT, dan biaya lainnya.'],
                        ['bi-checklist', 'Absensi', 'Rekam dan lihat riwayat kehadiran perkuliahan.'],
                        ['bi-pencil-square', 'Absensi Mandiri', 'Mahasiswa mengisi kehadiran per pertemuan dari web maupun aplikasi.'],
                        ['bi-bar-chart', 'Rekap & Laporan', 'Rekap kehadiran per mata kuliah dan persentase kehadiran.'],
                        ['bi-cpu', 'Evaluasi Fuzzy', 'Hasil evaluasi kelulusan dengan metode Tsukamoto.'],
                    ];
                @endphp
                @foreach($fiturs as $f)
                <div class="col-6 col-md-3">
                    <div class="feature-card">
                        <div class="feature-icon" style="background:var(--blue-50);color:var(--blue-500);"><i class="bi {{ $f[0] }}"></i></div>
                        <h6>{{ $f[1] }}</h6>
                        <p>{{ $f[2] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- FLOWCHART -->
    <section class="section section-alt" id="flowchart">
        <div class="container">
            <div class="text-center">
                <div class="section-label"><i class="bi bi-diagram-3-fill"></i> Flowchart</div>
                <h2 class="section-title">Alur Proses Sistem</h2>
                <p class="section-sub">Diagram alur login, absensi mandiri, rekap, evaluasi fuzzy, dan aplikasi mobile.</p>
            </div>

            <ul class="nav nav-pills justify-content-center mb-4 gap-2" id="flowTabs" role="tablist">
                <li class="nav-item" role="presentation"><button class="nav-link active" data-bs-toggle="pill" data-bs-target="#flow-login" type="button">Alur Login</button></li>
                <li class="nav-item" role="presentation"><button class="nav-link" data-bs-toggle="pill" data-bs-target="#flow-absensi" type="button">Self-Report Absensi</button></li>
                <li class="nav-item" role="presentation"><button class="nav-link" data-bs-toggle="pill" data-bs-target="#flow-rekap" type="button">Rekap &amp; Notifikasi</button></li>
                <li class="nav-item" role="presentation"><button class="nav-link" data-bs-toggle="pill" data-bs-target="#flow-fuzzy" type="button">Evaluasi Fuzzy</button></li>
                <li class="nav-item" role="presentation"><button class="nav-link" data-bs-toggle="pill" data-bs-target="#flow-mobile" type="button">Aplikasi Mobile</button></li>
            </ul>

            <div class="tab-content bg-white border rounded-4 p-4 p-md-5 shadow-sm">
                <!-- 1. ALUR LOGIN -->
                <div class="tab-pane fade show active" id="flow-login" role="tabpanel">
                    <div class="flow-wrap">
                        <div class="flow-start"><i class="bi bi-play-fill me-1"></i>Buka Halaman Login</div>
                        <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                        <div class="flow-node"><h6>Input Kredensial</h6><p>Web: username + password &nbsp;|&nbsp; Mobile: NIM + Nama</p></div>
                        <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                        <div class="flow-branch w-100">
                            <div class="flow-col">
                                <span class="flow-col-title">Aplikasi Web</span>
                                <div class="flow-node"><h6>Cek Akun (user_akses)</h6><p>Validasi username &amp; password</p></div>
                                <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                                <div class="flow-node"><h6>Set Session</h6><p>user_id, username, user_role, role</p></div>
                                <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                                <div class="flow-node"><h6>Redirect Sesuai Peran</h6><p>admin / staf_akademik / dosen / mahasiswa</p></div>
                            </div>
                            <div class="flow-col">
                                <span class="flow-col-title">Aplikasi Mobile (API)</span>
                                <div class="flow-node"><h6>Cek Mahasiswa</h6><p>Validasi NIM &amp; Nama</p></div>
                                <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                                <div class="flow-node"><h6>Buat Token</h6><p>id | md5(nim + now)</p></div>
                                <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                                <div class="flow-node"><h6>Simpan Hash SHA-256</h6><p>ke tabel personal_access_tokens</p></div>
                                <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                                <div class="flow-node"><h6>Respons JSON</h6><p>{ message, token, user }</p></div>
                            </div>
                        </div>
                        <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                        <div class="flow-end"><i class="bi bi-check-circle-fill me-1"></i>Selesai</div>
                    </div>
                </div>

                <!-- 2. SELF-REPORT ABSENSI -->
                <div class="tab-pane fade" id="flow-absensi" role="tabpanel">
                    <div class="flow-wrap">
                        <div class="flow-start"><i class="bi bi-play-fill me-1"></i>Buka Menu Absensi</div>
                        <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                        <div class="flow-node"><h6>Pilih Pertemuan</h6><p>Matkul, dosen, tanggal, pertemuan_ke terisi otomatis</p></div>
                        <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                        <div class="flow-node"><h6>Pilih Status</h6><p>Hadir / Izin / Sakit / Alfa + keterangan opsional</p></div>
                        <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                        <div class="flow-node"><h6>Simpan</h6><p>POST /api/transaksi/absensi</p></div>
                        <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                        <div class="flow-decision"><h6>Validasi</h6><p>Data lengkap &amp; valid?</p></div>
                        <div class="flow-arrow"><i class="bi bi-arrow-down"></i><span class="flow-label">Ya</span></div>
                        <div class="flow-node"><h6>Absensi Berhasil Disimpan</h6><p>List direfresh otomatis</p></div>
                        <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                        <div class="flow-end"><i class="bi bi-check-circle-fill me-1"></i>Selesai</div>
                        <div class="flow-arrow"><i class="bi bi-arrow-down"></i><span class="flow-label">Tidak</span></div>
                        <div class="flow-node"><h6>Tampil Pesan Error</h6><p>Kembali ke form</p></div>
                    </div>
                </div>

                <!-- 3. REKAP & NOTIFIKASI -->
                <div class="tab-pane fade" id="flow-rekap" role="tabpanel">
                    <div class="flow-wrap">
                        <div class="flow-start"><i class="bi bi-play-fill me-1"></i>Dosen: Hitung Rekap</div>
                        <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                        <div class="flow-node"><h6>Kelompokkan Data</h6><p>mahasiswa_id + nama_matkul + nama_dosen</p></div>
                        <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                        <div class="flow-node"><h6>Hitung Kehadiran</h6><p>Total Hadir / Izin / Sakit / Alfa &amp; persentase</p></div>
                        <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                        <div class="flow-node"><h6>Update rekap_absensi</h6><p>Simpan hasil per mahasiswa per jadwal</p></div>
                        <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                        <div class="flow-decision"><h6>Persentase &lt; 75%?</h6><p>Kehadiran di bawah ambang batas?</p></div>
                        <div class="flow-arrow"><i class="bi bi-arrow-down"></i><span class="flow-label">Ya</span></div>
                        <div class="flow-decision"><h6>Cek Duplikat</h6><p>Notifikasi dengan pesan sama sudah ada?</p></div>
                        <div class="flow-arrow"><i class="bi bi-arrow-down"></i><span class="flow-label">Tidak ada</span></div>
                        <div class="flow-node"><h6>Kirim Notifikasi</h6><p>Insert notifikasi_peringatan untuk mahasiswa</p></div>
                        <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                        <div class="flow-end"><i class="bi bi-check-circle-fill me-1"></i>Selesai</div>
                        <div class="flow-arrow"><i class="bi bi-arrow-down"></i><span class="flow-label">Tidak / sudah ada</span></div>
                        <div class="flow-end"><i class="bi bi-check-circle-fill me-1"></i>Selesai (tanpa notifikasi)</div>
                    </div>
                </div>

                <!-- 4. EVALUASI FUZZY -->
                <div class="tab-pane fade" id="flow-fuzzy" role="tabpanel">
                    <div class="flow-wrap">
                        <div class="flow-start"><i class="bi bi-play-fill me-1"></i>Input Penilaian</div>
                        <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                        <div class="flow-node"><h6>Variabel Input</h6><p>Kehadiran, nilai tugas, keaktifan diskusi (0–100)</p></div>
                        <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                        <div class="flow-node"><h6>Fuzzifikasi</h6><p>Rendah (linier turun) • Sedang (segitiga) • Tinggi (linier naik)</p></div>
                        <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                        <div class="flow-node"><h6>Inferensi 27 Rule</h6><p>α = min(μ kehadiran, μ tugas, μ keaktifan)</p></div>
                        <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                        <div class="flow-node"><h6>Z = output(α)</h6><p>Tidak Lulus / Marginal / Lulus (monotonik naik)</p></div>
                        <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                        <div class="flow-node"><h6>Defuzzifikasi Tsukamoto</h6><p>skor = Σ(αi × Zi) / Σαi</p></div>
                        <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                        <div class="flow-decision"><h6>Klasifikasi Skor</h6><p>Status kelulusan mahasiswa</p></div>
                        <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                        <div class="flow-branch w-100">
                            <div class="flow-col">
                                <span class="flow-col-title">Skor ≥ 65</span>
                                <div class="flow-end"><i class="bi bi-check-circle-fill me-1"></i>Lulus</div>
                            </div>
                            <div class="flow-col">
                                <span class="flow-col-title">Skor 45–64</span>
                                <div class="flow-end"><i class="bi bi-dash-circle-fill me-1"></i>Marginal</div>
                            </div>
                            <div class="flow-col">
                                <span class="flow-col-title">Skor &lt; 45</span>
                                <div class="flow-end"><i class="bi bi-x-circle-fill me-1"></i>Tidak Lulus</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 5. APLIKASI MOBILE -->
                <div class="tab-pane fade" id="flow-mobile" role="tabpanel">
                    <div class="flow-wrap">
                        <div class="flow-start"><i class="bi bi-play-fill me-1"></i>SplashScreen → checkLogin()</div>
                        <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                        <div class="flow-decision"><h6>Token Tersimpan?</h6><p>Cek token di SharedPreferences</p></div>
                        <div class="flow-arrow"><i class="bi bi-arrow-down"></i><span class="flow-label">Ya</span></div>
                        <div class="flow-node"><h6>Home (3 Tab)</h6><p>Dashboard • Notifikasi • Profil</p></div>
                        <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                        <div class="flow-node"><h6>Fitur Mahasiswa</h6><p>KRS • Jadwal • Absensi • Rekap • Pembayaran • Nilai • Fuzzy</p></div>
                        <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                        <div class="flow-end"><i class="bi bi-check-circle-fill me-1"></i>Selesai</div>
                        <div class="flow-arrow"><i class="bi bi-arrow-down"></i><span class="flow-label">Tidak</span></div>
                        <div class="flow-node"><h6>LoginScreen</h6><p>Masuk dengan NIM + Nama</p></div>
                        <div class="flow-arrow"><i class="bi bi-arrow-down"></i></div>
                        <div class="flow-end"><i class="bi bi-check-circle-fill me-1"></i>Kembali ke Home</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ROLE PENGGUNA -->
    <section class="section" id="role">
        <div class="container">
            <div class="text-center">
                <div class="section-label"><i class="bi bi-person-badge-fill"></i> Role Pengguna</div>
                <h2 class="section-title">Empat Peran dengan Hak Berbeda</h2>
                <p class="section-sub">Setiap peran memiliki akses sesuai kebutuhan kerjanya masing-masing.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="info-card">
                        <div class="feature-icon" style="background:var(--navy);color:#fff;"><i class="bi bi-shield-check"></i></div>
                        <h6>Admin</h6>
                        <p>Akses penuh: kelola semua master data, transaksi, hapus data, dan atur hak akses seluruh modul serta pengguna lain.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="info-card">
                        <div class="feature-icon" style="background:var(--blue-500);color:#fff;"><i class="bi bi-person-workspace"></i></div>
                        <h6>Staf Akademik</h6>
                        <p>Mengelola data mahasiswa dan dosen, membantu proses akademik, dan memantau jalannya perkuliahan.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="info-card">
                        <div class="feature-icon" style="background:var(--blue-400);color:#fff;"><i class="bi bi-easel"></i></div>
                        <h6>Dosen</h6>
                        <p>Mengisi absensi, menginput nilai, menghitung rekap kehadiran, dan menerbitkan notifikasi peringatan untuk mahasiswa.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="info-card">
                        <div class="feature-icon" style="background:var(--gray-600);color:#fff;"><i class="bi bi-mortarboard"></i></div>
                        <h6>Mahasiswa</h6>
                        <p>Mengajukan KRS, melihat jadwal, mengisi absensi mandiri, memantau pembayaran, nilai, rekap, notifikasi, dan hasil evaluasi fuzzy.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MODUL SISTEM -->
    <section class="section section-alt" id="modul">
        <div class="container">
            <div class="text-center">
                <div class="section-label"><i class="bi bi-boxes"></i> Modul Sistem</div>
                <h2 class="section-title">Modul Lengkap untuk Akademik</h2>
                <p class="section-sub">Sepuluh modul inti yang saling terhubung dalam satu ekosistem.</p>
            </div>
            <div class="row g-3">
                @php
                    $moduls = [
                        ['bi-database', 'Master Data', 'Mahasiswa, dosen, mata kuliah, ruangan, tahun akademik.'],
                        ['bi-journal-bookmark', 'KRS', 'Pengajuan, persetujuan, dan monitoring Kartu Rencana Studi.'],
                        ['bi-calendar-event', 'Jadwal Kuliah', 'Penjadwalan perkuliahan per hari dan jam.'],
                        ['bi-person-check', 'Absensi', 'Absensi klasik dosen dan absensi mandiri mahasiswa.'],
                        ['bi-clipboard-data', 'Rekap Absensi', 'Rekap kehadiran per mahasiswa per mata kuliah.'],
                        ['bi-bell-fill', 'Notifikasi', 'Peringatan otomatis dan pengumuman akademik.'],
                        ['bi-cash-coin', 'Pembayaran', 'Transaksi SPP, UKT, praktikum, dan biaya lainnya.'],
                        ['bi-mortarboard', 'Nilai', 'Input nilai, perhitungan bobot, dan status kelulusan.'],
                        ['bi-cpu', 'Fuzzy Evaluasi', 'Evaluasi kelulusan dengan metode Tsukamoto.'],
                        ['bi-person-lock', 'Hak Akses', 'Pengaturan peran dan izin per modul.'],
                    ];
                @endphp
                @foreach($moduls as $m)
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="feature-icon" style="background:var(--blue-50);color:var(--blue-500);"><i class="bi {{ $m[0] }}"></i></div>
                        <h6>{{ $m[1] }}</h6>
                        <p>{{ $m[2] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ARSITEKTUR -->
    <section class="section" id="arsitektur">
        <div class="container">
            <div class="text-center">
                <div class="section-label"><i class="bi bi-diagram-3"></i> Arsitektur Sistem</div>
                <h2 class="section-title">Satu Backend, Dua Klien</h2>
                <p class="section-sub">Web admin (Laravel + Blade) dan aplikasi mobile (Flutter) dilayani backend yang sama dengan API berautentikasi token.</p>
            </div>
            <div class="bg-white border rounded-4 p-4 p-md-5 shadow-sm">
                <div class="flow-arch">
                    <div class="flow-arch-row">
                        <div class="arch-node"><i class="bi bi-globe me-1"></i>Web Admin (Laravel + Blade)</div>
                        <div class="arch-arrow"><i class="bi bi-arrow-right"></i></div>
                        <div class="arch-node"><i class="bi bi-server me-1"></i>Laravel (Web + API)</div>
                        <div class="arch-arrow"><i class="bi bi-arrow-right"></i></div>
                        <div class="arch-node db"><i class="bi bi-database me-1"></i>MySQL — siakad</div>
                    </div>
                    <div class="flow-arch-row">
                        <div class="arch-node"><i class="bi bi-phone me-1"></i>Mobile (Flutter)</div>
                        <div class="arch-arrow"><i class="bi bi-arrow-right"></i></div>
                        <div class="arch-node ngrok"><i class="bi bi-broadcast me-1"></i>ngrok tunnel</div>
                        <div class="arch-arrow"><i class="bi bi-arrow-right"></i></div>
                        <div class="arch-node"><i class="bi bi-braces me-1"></i>Laravel API (JSON)</div>
                        <div class="arch-arrow"><i class="bi bi-arrow-right"></i></div>
                        <div class="arch-node db"><i class="bi bi-database me-1"></i>MySQL — siakad</div>
                    </div>
                </div>
            </div>
            <div class="row g-3 mt-3">
                <div class="col-md-6">
                    <div class="info-card">
                        <div class="feature-icon" style="background:var(--blue-50);color:var(--blue-500);"><i class="bi bi-globe"></i></div>
                        <h6>Aplikasi Web</h6>
                        <p>Dikelola admin, staf, dan dosen dengan session login. Menangani master data, transaksi, rekap, dan pengaturan hak akses.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-card">
                        <div class="feature-icon" style="background:var(--blue-50);color:var(--blue-500);"><i class="bi bi-phone"></i></div>
                        <h6>Aplikasi Mobile</h6>
                        <p>Flutter untuk mahasiswa, memakai REST API ber-bearer token (personal access token) dengan penanganan CORS.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- STRUKTUR DATABASE -->
    <section class="section section-alt" id="database">
        <div class="container">
            <div class="text-center">
                <div class="section-label"><i class="bi bi-database-fill"></i> Struktur Database</div>
                <h2 class="section-title">Tabel Inti Sistem</h2>
                <p class="section-sub">Rancangan relasional dengan MySQL 8.4 — master data, transaksi, dan hasil evaluasi.</p>
            </div>
            <div class="bg-white border rounded-4 p-4 shadow-sm overflow-auto">
                <table class="table table-spec align-middle mb-0">
                    <thead>
                        <tr><th>Modul</th><th>Tabel</th><th>Fungsi</th></tr>
                    </thead>
                    <tbody>
                        <tr><td>Master</td><td><code>mahasiswa</code>, <code>dosen</code>, <code>mata_kuliah</code>, <code>ruangan</code>, <code>tahun_akademik</code>, <code>user_akses</code></td><td>Data pokok dan akun login web.</td></tr>
                        <tr><td>Penjadwalan</td><td><code>jadwal_kuliah</code>, <code>pertemuan</code></td><td>Jadwal matkul dan sesi pertemuan per semester.</td></tr>
                        <tr><td>Absensi</td><td><code>transaksi_absensi</code>, <code>absensi</code>, <code>izin_tidak_hadir</code></td><td>Self-report mahasiswa, absensi dosen, dan pengajuan izin.</td></tr>
                        <tr><td>Rekap &amp; Notifikasi</td><td><code>rekap_absensi</code>, <code>notifikasi_peringatan</code></td><td>Rekap kehadiran dan peringatan otomatis &lt;75%.</td></tr>
                        <tr><td>Transaksi</td><td><code>krs</code>, <code>transaksi_pembayaran</code>, <code>transaksi_nilai</code></td><td>KRS, pembayaran, dan nilai mahasiswa.</td></tr>
                        <tr><td>Fuzzy</td><td><code>penilaian_akademik</code>, <code>fuzzy_hasil</code></td><td>Input dan hasil evaluasi fuzzy Tsukamoto.</td></tr>
                        <tr><td>Hak Akses</td><td><code>roles</code>, <code>permissions</code>, <code>role_permissions</code>, <code>hak_akses</code></td><td>Peran, izin, dan matriks akses per modul.</td></tr>
                    </tbody>
                </table>
            </div>
            <p class="text-center mt-3" style="font-size:13px;color:var(--gray-400);">Relasi inti: mahasiswa 1–N transaksi_absensi &rarr; rekap per <em>nama_matkul</em> + <em>nama_dosen</em>; jadwal_kuliah 1–N pertemuan.</p>
        </div>
    </section>

    <!-- DOKUMENTASI API -->
    <section class="section" id="api">
        <div class="container">
            <div class="text-center">
                <div class="section-label"><i class="bi bi-braces"></i> Dokumentasi API</div>
                <h2 class="section-title">REST API untuk Aplikasi Mobile</h2>
                <p class="section-sub">API JSON dengan autentikasi Bearer token di bawah prefix <code>/api</code>.</p>
            </div>
            <div class="bg-white border rounded-4 p-4 shadow-sm overflow-auto">
                <table class="table table-spec align-middle mb-0">
                    <thead>
                        <tr><th>Method</th><th>Endpoint</th><th>Fungsi</th></tr>
                    </thead>
                    <tbody>
                        <tr><td><span class="method method-post">POST</span></td><td><code>/api/login</code></td><td>Login mahasiswa (NIM + Nama) &rarr; token.</td></tr>
                        <tr><td><span class="method method-get">GET</span></td><td><code>/api/user</code></td><td>Data mahasiswa dari token aktif.</td></tr>
                        <tr><td><span class="method method-get">GET</span></td><td><code>/api/krs</code>, <code>/api/jadwal</code></td><td>Daftar KRS dan jadwal kuliah.</td></tr>
                        <tr><td><span class="method method-get">GET</span></td><td><code>/api/transaksi/absensi/pertemuan</code></td><td>Pilihan pertemuan untuk form absensi.</td></tr>
                        <tr><td><span class="method method-get">GET</span> / <span class="method method-post">POST</span></td><td><code>/api/transaksi/absensi</code></td><td>Lihat &amp; isi absensi mandiri mahasiswa.</td></tr>
                        <tr><td><span class="method method-get">GET</span></td><td><code>/api/rekap-absensi</code></td><td>Rekap kehadiran mahasiswa.</td></tr>
                        <tr><td><span class="method method-get">GET</span> / <span class="method method-post">POST</span> / <span class="method method-put">PUT</span> / <span class="method method-delete">DELETE</span></td><td><code>/api/transaksi/pembayaran</code></td><td>CRUD transaksi pembayaran.</td></tr>
                        <tr><td><span class="method method-get">GET</span></td><td><code>/api/transaksi/nilai</code></td><td>Daftar dan detail nilai.</td></tr>
                        <tr><td><span class="method method-get">GET</span></td><td><code>/api/fuzzy</code></td><td>Daftar dan detail hasil evaluasi fuzzy.</td></tr>
                        <tr><td><span class="method method-get">GET</span> / <span class="method method-post">POST</span></td><td><code>/api/notifikasi</code></td><td>Daftar notifikasi dan tandai dibaca.</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-4">
                <a href="/login" class="btn btn-outline-custom"><i class="bi bi-key me-1"></i>Masuk untuk menguji API</a>
            </div>
        </div>
    </section>

    <!-- LANGKAH INSTALASI -->
    <section class="section section-alt" id="instalasi">
        <div class="container">
            <div class="text-center">
                <div class="section-label"><i class="bi bi-tools"></i> Langkah Instalasi</div>
                <h2 class="section-title">Jalankan SIAKAD di Server Anda</h2>
                <p class="section-sub">Empat langkah dari instalasi hingga distribusi aplikasi.</p>
            </div>
            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <div class="info-card">
                        <div class="feature-icon" style="background:var(--blue-500);color:#fff;"><span class="fw-bold">1</span></div>
                        <h6>Instal Backend</h6>
                        <p><code>composer install</code> lalu atur file <code>.env</code>, jalankan <code>php artisan key:generate</code> dan <code>php artisan migrate</code>.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="info-card">
                        <div class="feature-icon" style="background:var(--blue-500);color:#fff;"><span class="fw-bold">2</span></div>
                        <h6>Jalankan Server</h6>
                        <p><code>php artisan serve</code> untuk melayani web admin dan API di <code>localhost:8000</code>.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="info-card">
                        <div class="feature-icon" style="background:var(--blue-500);color:#fff;"><span class="fw-bold">3</span></div>
                        <h6>Build Mobile</h6>
                        <p><code>flutter build web</code> dan <code>flutter build apk</code>, lalu salin hasilnya ke folder <code>public/</code> Laravel.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="info-card">
                        <div class="feature-icon" style="background:var(--blue-500);color:#fff;"><span class="fw-bold">4</span></div>
                        <h6>Distribusikan</h6>
                        <p>Ekspos server ke internet via ngrok, ubah <code>baseUrl</code> aplikasi, dan unduh APK langsung dari halaman ini.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- KEBUTUHAN SISTEM -->
    <section class="section" id="kebutuhan">
        <div class="container">
            <div class="text-center">
                <div class="section-label"><i class="bi bi-cpu"></i> Kebutuhan Sistem</div>
                <h2 class="section-title">Spesifikasi yang Diperlukan</h2>
                <p class="section-sub">Persyaratan untuk menjalankan server dan aplikasi.</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="bg-white border rounded-4 p-4 shadow-sm overflow-auto">
                        <table class="table table-spec align-middle mb-0">
                            <thead>
                                <tr><th>Komponen</th><th>Persyaratan</th></tr>
                            </thead>
                            <tbody>
                                <tr><td>PHP</td><td>8.3 ke atas</td></tr>
                                <tr><td>Framework</td><td>Laravel 13, Laravel Sanctum</td></tr>
                                <tr><td>Database</td><td>MySQL 8.x</td></tr>
                                <tr><td>Node.js</td><td>20 ke atas (untuk aset frontend &amp; dokumentasi)</td></tr>
                                <tr><td>Flutter</td><td>3.x dengan dukungan Android SDK (untuk build mobile)</td></tr>
                                <tr><td>Perangkat Mahasiswa</td><td>Android (APK) atau browser modern (versi web)</td></tr>
                                <tr><td>Akses Internet</td><td>ngrok atau web server untuk mengakses dari luar jaringan</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- KEAMANAN -->
    <section class="section section-alt" id="keamanan">
        <div class="container">
            <div class="text-center">
                <div class="section-label"><i class="bi bi-shield-lock-fill"></i> Keamanan Terjamin</div>
                <h2 class="section-title">Prinsip Keamanan SIAKAD</h2>
                <p class="section-sub">Sistem dibangun dengan praktik keamanan dasar yang ketat.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="info-card">
                        <div class="feature-icon" style="background:var(--blue-50);color:var(--blue-500);"><i class="bi bi-key-fill"></i></div>
                        <h6>Autentikasi API</h6>
                        <p>Setiap request mobile memakai Bearer token. Di database, token hanya disimpan dalam bentuk hash SHA-256 — bukan teks asli.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="info-card">
                        <div class="feature-icon" style="background:var(--blue-50);color:var(--blue-500);"><i class="bi bi-person-lock-fill"></i></div>
                        <h6>Otorisasi Peran</h6>
                        <p>Middleware <code>cek.akses</code> membatasi halaman berdasarkan peran; admin memiliki akses penuh, peran lain terbatas sesuai kebutuhan.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="info-card">
                        <div class="feature-icon" style="background:var(--blue-50);color:var(--blue-500);"><i class="bi bi-globe2"></i></div>
                        <h6>CORS Terkontrol</h6>
                        <p>Header CORS dikelola middleware khusus dengan metode dan header yang diizinkan secara eksplisit.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="info-card">
                        <div class="feature-icon" style="background:var(--blue-50);color:var(--blue-500);"><i class="bi bi-incognito"></i></div>
                        <h6>Tanpa Secret di Repo</h6>
                        <p>Kredensial dan token tidak disimpan dalam kode. URL remote GitHub bersih tanpa token tersemat; build artifact di-ignore git.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PERFORMA -->
    <section class="section" id="performa">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="section-label"><i class="bi bi-speedometer2"></i> Performa</div>
                    <h2 class="section-title">Ringan dan Responsif</h2>
                    <p class="section-sub" style="margin-bottom:0;">Dioptimalkan agar tetap cepat meski data akademik terus bertambah.</p>
                </div>
                <div class="col-lg-7">
                    <ul class="check-list">
                        <li><i class="bi bi-check-circle-fill"></i><span><strong>Query Builder ringan</strong> — penggunaan DB query yang efisien tanpa overhead berlebih.</span></li>
                        <li><i class="bi bi-check-circle-fill"></i><span><strong>API JSON minim</strong> — payload kecil sehingga respons cepat di jaringan mobile.</span></li>
                        <li><i class="bi bi-check-circle-fill"></i><span><strong>Indeks database</strong> — kolom kunci (id, relasi, UNIQUE) terindeks untuk pencarian cepat.</span></li>
                        <li><i class="bi bi-check-circle-fill"></i><span><strong>Build dioptimalkan</strong> — aset Flutter di-tree-shake sehingga ukuran aplikasi lebih kecil.</span></li>
                        <li><i class="bi bi-check-circle-fill"></i><span><strong>UI ringan</strong> — Bootstrap dan Material yang hemat sumber daya.</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- STUDI KASUS -->
    <section class="section section-alt" id="kasus">
        <div class="container">
            <div class="text-center">
                <div class="section-label"><i class="bi bi-mortarboard-fill"></i> Studi Kasus</div>
                <h2 class="section-title">Contoh Penerapan</h2>
                <p class="section-sub">Dua skenario nyata yang berjalan di SIAKAD.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="info-card">
                        <div class="feature-icon" style="background:var(--blue-50);color:var(--blue-500);"><i class="bi bi-journal-check"></i></div>
                        <h6>Kasus 1 — Absensi Mandiri &amp; Peringatan</h6>
                        <p class="mb-3">Mahasiswa mengisi kehadiran per pertemuan melalui aplikasi. Saat dosen menghitung rekap, sistem mengelompokkan data per matkul dan dosen, lalu membandingkan persentase kehadiran.</p>
                        <p style="font-size:13px;color:var(--gray-600);margin-bottom:0;"><strong>Hasil:</strong> jika kehadiran &lt; 75%, mahasiswa otomatis menerima notifikasi peringatan (tanpa duplikasi pesan yang sama).</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="info-card">
                        <div class="feature-icon" style="background:var(--blue-50);color:var(--blue-500);"><i class="bi bi-cpu"></i></div>
                        <h6>Kasus 2 — Evaluasi Fuzzy Tsukamoto</h6>
                        <p class="mb-3">Dosen menilai kehadiran, nilai tugas, dan keaktifan diskusi mahasiswa. Sistem mem-fuzzifikasi ketiga variabel, menjalankan 27 aturan inferensi, lalu menghitung skor rata-rata tertimbang.</p>
                        <p style="font-size:13px;color:var(--gray-600);margin-bottom:0;"><strong>Hasil:</strong> skor akhir 0–100 diklasifikasikan menjadi <em>Lulus</em> (≥65), <em>Marginal</em> (45–64), atau <em>Tidak Lulus</em> (&lt;45).</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="section" id="faq">
        <div class="container">
            <div class="text-center">
                <div class="section-label"><i class="bi bi-question-circle-fill"></i> Pertanyaan Umum</div>
                <h2 class="section-title">FAQ</h2>
                <p class="section-sub">Jawaban atas pertanyaan yang paling sering diajukan.</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="faqAcc">
                        @php
                            $faqs = [
                                ['Bagaimana mahasiswa login di aplikasi mobile?', 'Cukup masukkan NIM dan nama sesuai data di sistem. Tidak perlu kata sandi terpisah — validasi dilakukan langsung ke data mahasiswa.'],
                                ['Mengapa aplikasi tidak bisa terhubung saat di luar jaringan kampus?', 'Backend diekspos ke internet melalui ngrok. Pastikan base URL di aplikasi menunjuk ke domain ngrok aktif dan koneksi internet tersedia.'],
                                ['Apa bedanya status "Alfa" dan "Alpha"?', 'Pada tabel absensi mandiri (transaksi_absensi) nilai enum adalah "Alfa"; pada absensi klasik dosen (absensi) menggunakan "Alpha". Keduanya bermakna tidak hadir tanpa keterangan.'],
                                ['Bagaimana notifikasi peringatan dikirim?', 'Saat dosen menghitung rekap, jika persentase kehadiran di bawah 75% sistem membuat notifikasi untuk mahasiswa. Notifikasi yang pesannya sama tidak dibuat dua kali.'],
                                ['Apakah mahasiswa bisa mengedit atau menghapus absensi yang sudah diisi?', 'Tidak. Mahasiswa hanya dapat menambahkan absensi. Operasi ubah dan hapus hanya untuk admin, staf akademik, atau dosen.'],
                                ['Apa itu evaluasi fuzzy dan untuk apa?', 'Evaluasi fuzzy memakai metode Tsukamoto untuk menilai kelulusan dari tiga variabel: kehadiran, nilai tugas, dan keaktifan diskusi, menghasilkan skor objektif 0–100.'],
                            ];
                        @endphp
                        @foreach($faqs as $i => $q)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button {{ $i > 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#faq{{ $i }}">
                                    {{ $q[0] }}
                                </button>
                            </h2>
                            <div id="faq{{ $i }}" class="accordion-collapse collapse {{ $i === 0 ? 'show' : '' }}" data-bs-parent="#faqAcc">
                                <div class="accordion-body">{{ $q[1] }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- LISENSI -->
    <section class="section section-alt" id="lisensi">
        <div class="container text-center">
            <div class="section-label"><i class="bi bi-file-earmark-text-fill"></i> Lisensi</div>
            <h2 class="section-title">Open Source</h2>
            <p class="section-sub">Kode backend dan aplikasi mobile dipublikasikan sebagai proyek sumber terbuka.</p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <span class="badge rounded-pill text-bg-light border px-4 py-2" style="font-size:14px;color:var(--navy);"><i class="bi bi-patch-check me-1" style="color:var(--blue-500);"></i>Lisensi MIT</span>
                <span class="badge rounded-pill text-bg-light border px-4 py-2" style="font-size:14px;color:var(--navy);"><i class="bi bi-github me-1" style="color:var(--blue-500);"></i>Gratis untuk digunakan &amp; dimodifikasi</span>
            </div>
        </div>
    </section>

    <!-- KONTAK -->
    <section class="section" id="kontak">
        <div class="container">
            <div class="text-center">
                <div class="section-label"><i class="bi bi-envelope-fill"></i> Kontak</div>
                <h2 class="section-title">Hubungi Kami</h2>
                <p class="section-sub">Pertanyaan, masukan, atau laporan bug dapat disampaikan melalui kanal berikut.</p>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="contact-card">
                        <div class="feature-icon" style="background:var(--blue-50);color:var(--blue-500);"><i class="bi bi-github"></i></div>
                        <h6>Repositori Backend</h6>
                        <a href="https://github.com/kelapar021-dev/siksaneraka" target="_blank">github.com/kelapar021-dev/siksaneraka</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="contact-card">
                        <div class="feature-icon" style="background:var(--blue-50);color:var(--blue-500);"><i class="bi bi-phone"></i></div>
                        <h6>Repositori Mobile</h6>
                        <a href="https://github.com/kelapar021-dev/jasen" target="_blank">github.com/kelapar021-dev/jasen</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="contact-card">
                        <div class="feature-icon" style="background:var(--blue-50);color:var(--blue-500);"><i class="bi bi-bug-fill"></i></div>
                        <h6>Laporan Bug / Masukan</h6>
                        <a href="https://github.com/kelapar021-dev/siksaneraka/issues" target="_blank">Buka halaman Issues</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MOBILE APP -->
    <section class="mobile-app text-center">
        <div class="container">
            <h2><i class="bi bi-phone me-2"></i>SIAKAD Mobile</h2>
            <p class="mx-auto">Akses informasi akademik langsung dari genggaman Anda. Tersedia untuk Android.</p>
            <div class="d-flex justify-content-center gap-3 flex-wrap mt-4">
                <a href="/siakad.apk" class="btn-download" download><i class="bi bi-download fs-5"></i> Download APK (Android)</a>
                <a href="/jasen/" class="btn-download"><i class="bi bi-globe fs-5"></i> Buka di Browser</a>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <div class="footer text-center">
        <div class="container">
            <div class="mb-2">
                <a href="https://github.com/kelapar021-dev/jasen" target="_blank" class="text-decoration-none me-3" style="color:var(--gray-600);"><i class="bi bi-github me-1"></i>jasen — Mobile App</a>
                <a href="https://github.com/kelapar021-dev/siksaneraka" target="_blank" class="text-decoration-none" style="color:var(--gray-600);"><i class="bi bi-github me-1"></i>siksaneraka — Backend</a>
            </div>
            <i class="bi bi-hexagon-fill me-1" style="color:var(--blue-500);"></i> SIAKAD — Sistem Informasi Akademik
            <span class="mx-2">|</span> &copy; {{ date('Y') }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
