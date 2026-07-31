<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Baru – SIAKAD</title>
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
            --blue-100 : #dbeafe;
            --blue-50  : #eff6ff;
            --white    : #ffffff;
            --gray-50  : #f8fafc;
            --gray-100 : #f1f5f9;
            --gray-200 : #e2e8f0;
            --gray-400 : #94a3b8;
            --gray-600 : #475569;
            --gray-800 : #1e293b;
            --shadow-md: 0 10px 25px -5px rgba(13, 46, 110, 0.12), 0 8px 10px -6px rgba(13, 46, 110, 0.12);
            --radius-md: 12px;
            --radius-lg: 20px;
        }

        * { font-family: 'Poppins', sans-serif; box-sizing: border-box; }
        body {
            background: linear-gradient(135deg, var(--blue-900), var(--blue-700));
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 40px 20px;
        }

        .wrap {
            width: 100%;
            max-width: 960px;
            display: flex;
            gap: 24px;
            align-items: stretch;
            flex-wrap: wrap;
        }

        /* ── REGISTER CARD ──────────────────────── */
        .register-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 40px;
            flex: 1.2;
            min-width: 340px;
            box-shadow: var(--shadow-md);
            border: 1px solid rgba(255, 255, 255, 0.2);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .brand-header {
            margin-bottom: 24px;
        }
        .brand-header h2 { color: var(--blue-900); font-weight: 700; font-size: 22px; margin: 0; }
        .brand-header p { color: var(--gray-400); font-size: 13px; margin: 4px 0 0; }

        /* ── INFO CARD ──────────────────────────── */
        .info-card {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: var(--radius-lg);
            padding: 35px;
            flex: 1;
            min-width: 320px;
            color: var(--white);
            box-shadow: var(--shadow-md);
        }
        .info-title { font-size: 16px; font-weight: 700; margin-bottom: 20px; letter-spacing: 0.3px; display: flex; align-items: center; gap: 8px; }

        /* ── FORM INPUTS ────────────────────────── */
        .form-label {
            font-size: 13px;
            font-weight: 600;
            color: var(--gray-600);
            margin-bottom: 6px;
        }
        .input-group-text {
            background-color: var(--gray-50);
            border-color: var(--gray-200);
            color: var(--gray-400);
            border-top-left-radius: var(--radius-md);
            border-bottom-left-radius: var(--radius-md);
        }
        .form-control, .form-select {
            border-color: var(--gray-200);
            border-radius: var(--radius-md);
            padding: 11px 14px;
            font-size: 14px;
            color: var(--gray-800);
            transition: all 0.2s ease;
        }
        .input-group .form-control {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--blue-400);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
        }
        .form-control::placeholder {
            color: var(--gray-400);
            font-size: 13.5px;
        }

        /* ── BUTTONS ────────────────────────────── */
        .btn-daftar {
            background: var(--blue-600);
            border: none; color: white;
            font-weight: 600; padding: 12px;
            border-radius: var(--radius-md); width: 100%;
            font-size: 14px; letter-spacing: 0.3px;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);
            transition: all 0.2s ease;
            display: flex; align-items: center; justify-content: center; gap: 8px;
        }
        .btn-daftar:hover {
            background: var(--blue-700);
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(37, 99, 235, 0.3);
        }
        .btn-daftar:active { transform: translateY(0); }

        .btn-login-back {
            display: flex; align-items: center; justify-content: center; gap: 6px;
            text-align: center; background: var(--gray-50);
            border: 1px solid var(--gray-200);
            border-radius: var(--radius-md); padding: 11px;
            color: var(--gray-600); font-size: 13px; font-weight: 500; 
            text-decoration: none; transition: all 0.15s ease;
            margin-top: 12px;
        }
        .btn-login-back:hover {
            background: var(--blue-50); border-color: var(--blue-100);
            color: var(--blue-700);
        }

        /* ── PRIVILEGES LIST ────────────────────── */
        .role-block { margin-bottom: 22px; }
        .role-block:last-child { margin-bottom: 0; }
        .role-title {
            font-size: 13.5px; font-weight: 700;
            margin-bottom: 10px; display: flex;
            align-items: center; justify-content: space-between;
        }
        .badge-role {
            padding: 3px 12px; border-radius: 20px;
            font-size: 10.5px; font-weight: 700; letter-spacing: 0.3px;
        }
        .badge-admin { background-color: #fbbf24; color: #78350f; }
        .badge-dosen { background-color: #34d399; color: #064e3b; }
        .badge-mhs   { background-color: var(--blue-400); color: var(--blue-900); }
        
        .hak-list { list-style: none; padding: 0; margin: 0; font-size: 12.5px; opacity: 0.9; }
        .hak-list li { padding: 3px 0; display: flex; align-items: center; gap: 8px; }
        .hak-list .ok { color: #34d399; font-weight: bold; }
        .hak-list .no { color: #f87171; font-weight: bold; }
        
        .divider-line { border-top: 1px solid rgba(255,255,255,0.12); margin: 16px 0; }

        /* ── ALERTS ─────────────────────────────── */
        .alert-custom {
            border-radius: var(--radius-md);
            padding: 12px 16px;
            font-size: 13px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            background-color: #fef2f2;
            border: 1px solid #fee2e2;
            color: #991b1b;
        }
    </style>
</head>
<body>

<div class="wrap">

    {{-- FORM REGISTRASI --}}
    <div class="register-card">
        <div class="brand-header">
            <h2>📝 Registrasi Akun</h2>
            <p class="text-muted">Buat akun SIAKAD baru untuk mengakses portal akademik</p>
        </div>

        @if(session('error'))
        <div class="alert-custom">
            <i class="bi bi-exclamation-triangle-fill fs-5"></i>
            <div>{{ session('error') }}</div>
        </div>
        @endif

        <form action="{{ route('register.post') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Username</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" name="username" class="form-control" placeholder="Buat username unik" required autocomplete="username">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" name="email" class="form-control" placeholder="Masukkan email aktif" required autocomplete="email">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-key"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Buat password aman" required autocomplete="new-password">
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label">Jabatan / Role</label>
                <select name="role_id" class="form-select" required>
                    <option value="">-- Pilih Jabatan --</option>
                    @foreach($roles as $role)
                    <option value="{{ $role->id }}">
                        @if($role->nama_role == 'admin') 👑 
                        @elseif($role->nama_role == 'dosen') 🎓 
                        @else 📚 
                        @endif
                        {{ ucfirst($role->nama_role) }}
                    </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn-daftar">
                <i class="bi bi-check-circle"></i> Buat Akun Baru
            </button>
            
            <a href="{{ route('login') }}" class="btn-login-back">
                <i class="bi bi-arrow-left"></i> Sudah punya akun? Login di sini
            </a>
        </form>
    </div>

    {{-- INFO HAK AKSES --}}
    <div class="info-card">
        <div class="info-title">
            <i class="bi bi-info-circle-fill" style="color: var(--blue-400);"></i>
            <span>Matriks Hak Akses Jabatan</span>
        </div>

        {{-- ADMIN --}}
        <div class="role-block">
            <div class="role-title">
                <span>👑 Kelompok Admin</span>
                <span class="badge-role badge-admin">FULL AKSES</span>
            </div>
            <ul class="hak-list">
                <li><span class="ok">✓</span> Kelola semua master data & transaksi</li>
                <li><span class="ok">✓</span> Tambah, edit, dan hapus data mahasiswa</li>
                <li><span class="ok">✓</span> Konfigurasi user manajemen & hak akses</li>
            </ul>
        </div>

        <div class="divider-line"></div>

        {{-- DOSEN --}}
        <div class="role-block">
            <div class="role-title">
                <span>🎓 Kelompok Dosen</span>
                <span class="badge-role badge-dosen">AKSES MENENGAH</span>
            </div>
            <ul class="hak-list">
                <li><span class="ok">✓</span> Input, edit, & rekap evaluasi nilai mahasiswa</li>
                <li><span class="ok">✓</span> Melihat dan mengelola absensi kelas</li>
                <li><span class="no">✗</span> Tidak diizinkan menghapus data master</li>
            </ul>
        </div>

        <div class="divider-line"></div>

        {{-- MAHASISWA --}}
        <div class="role-block">
            <div class="role-title">
                <span>📚 Kelompok Mahasiswa</span>
                <span class="badge-role badge-mhs">READ ONLY</span>
            </div>
            <ul class="hak-list">
                <li><span class="ok">✓</span> Melihat transkrip nilai & status kelulusan</li>
                <li><span class="ok">✓</span> Memantau histori pembayaran kuliah</li>
                <li><span class="no">✗</span> Tidak bisa menambah/mengubah data sistem</li>
            </ul>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>