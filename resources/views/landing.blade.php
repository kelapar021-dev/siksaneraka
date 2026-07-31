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
        .nav-link { font-weight: 500; font-size: 14px; color: var(--gray-600) !important; padding: 6px 16px !important; }
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

        .hero-visual {
            position: relative; display: flex; align-items: center; justify-content: center;
        }
        .hero-card {
            background: #fff; border-radius: 20px; padding: 32px;
            box-shadow: 0 20px 60px rgba(13,46,110,0.12);
            border: 1px solid var(--gray-200); width: 100%; max-width: 380px;
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
        .stat-number { font-size: 22px; font-weight: 800; color: var(--navy); }

        /* FEATURES */
        .features { padding: 70px 0; }
        .section-label {
            display: inline-flex; align-items: center; gap: 6px;
            background: var(--blue-50); color: var(--blue-500);
            padding: 4px 14px; border-radius: 20px; font-size: 12px; font-weight: 600;
            margin-bottom: 12px;
        }
        .section-title { font-size: 28px; font-weight: 800; color: var(--navy); margin-bottom: 8px; }
        .section-sub { font-size: 15px; color: var(--gray-400); max-width: 560px; margin: 0 auto 40px; }
        .feature-card {
            background: #fff; border: 1px solid var(--gray-200);
            border-radius: 16px; padding: 28px 24px; text-align: center;
            transition: all 0.3s; height: 100%;
        }
        .feature-card:hover {
            transform: translateY(-4px); box-shadow: 0 12px 32px rgba(13,46,110,0.08);
            border-color: var(--blue-400);
        }
        .feature-icon {
            width: 52px; height: 52px; border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            font-size: 22px; margin: 0 auto 16px;
        }
        .feature-card h6 { font-weight: 700; font-size: 15px; color: var(--navy); margin-bottom: 6px; }
        .feature-card p { font-size: 13px; color: var(--gray-400); margin: 0; }

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
        }
    </style>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/"><i class="bi bi-hexagon-fill me-2" style="color:var(--blue-500);"></i>SIAKAD<span>.</span></a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
                <i class="bi bi-list fs-4"></i>
            </button>
            <div class="collapse navbar-collapse" id="nav">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-1">
                    <li class="nav-item"><a class="nav-link" href="#fitur">Fitur</a></li>
                    <li class="nav-item"><a class="nav-link" href="/jasen/">Aplikasi Mobile</a></li>
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
                    <p>Akses KRS, jadwal kuliah, nilai, absensi, dan informasi akademik lainnya dalam satu platform terpadu — kapan saja, di mana saja.</p>
                    <div class="hero-actions">
                        <a href="/login" class="btn btn-primary-custom"><i class="bi bi-box-arrow-in-right me-1"></i>Masuk ke SIAKAD</a>
                        <a href="/siakad.apk" class="btn btn-outline-custom" download><i class="bi bi-download me-1"></i>Download APK</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-visual">
                        <div class="hero-card">
                            <div class="hero-card-icon"><i class="bi bi-graph-up-arrow"></i></div>
                            <h5>Ringkasan Akademik</h5>
                            <p class="text-muted">Informasi cepat nilai, kehadiran, dan jadwal Anda.</p>
                            <hr class="my-3">
                            <div class="d-flex justify-content-between">
                                <div><div class="stat-number">8</div><div class="small-stat">Mata Kuliah</div></div>
                                <div><div class="stat-number">3.85</div><div class="small-stat">IPK</div></div>
                                <div><div class="stat-number">96%</div><div class="small-stat">Kehadiran</div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURES -->
    <section class="features" id="fitur">
        <div class="container text-center">
            <div class="section-label mx-auto"><i class="bi bi-grid-3x3-gap-fill"></i> Fitur Unggulan</div>
            <h2 class="section-title">Kelola Akademik Lebih Mudah</h2>
            <p class="section-sub">Semua fitur yang Anda butuhkan untuk memantau perkuliahan dalam satu dashboard.</p>
            <div class="row g-3">
                @php
                    $fiturs = [
                        ['bi-book', 'KRS Online', 'Ajukan dan monitor Kartu Rencana Studi setiap semester.'],
                        ['bi-calendar-check', 'Jadwal Kuliah', 'Lihat jadwal perkuliahan harian, mingguan, atau per ruangan.'],
                        ['bi-grading', 'Nilai & IPK', 'Cek nilai setiap mata kuliah dan pantau perkembangan IPK.'],
                        ['bi-payments', 'Pembayaran', 'Informasi status pembayaran SPP dan biaya akademik lain.'],
                        ['bi-checklist', 'Absensi', 'Rekam dan lihat riwayat kehadiran perkuliahan.'],
                        ['bi-bar-chart', 'Rekap & Laporan', 'Laporan absensi, grafik kehadiran, dan evaluasi fuzzy.'],
                    ];
                @endphp
                @foreach($fiturs as $f)
                <div class="col-6 col-md-4">
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
            <i class="bi bi-hexagon-fill me-1" style="color:var(--blue-500);"></i> SIAKAD — Sistem Informasi Akademik
            <span class="mx-2">|</span> &copy; {{ date('Y') }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
