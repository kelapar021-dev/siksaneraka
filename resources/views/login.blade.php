<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk – SIAKAD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --blue-900: #0d2e6e; --blue-800: #1a3f8f; --blue-700: #1d4ed8;
            --blue-600: #2563eb; --blue-500: #3b82f6; --blue-100: #dbeafe;
            --blue-50:  #eff6ff; --white: #ffffff;
            --gray-50: #f8fafc; --gray-100: #f1f5f9; --gray-200: #e2e8f0;
            --gray-400: #94a3b8; --gray-600: #475569; --gray-800: #1e293b;
            --radius-md: 12px; --radius-lg: 20px;
        }
        * { font-family: 'Poppins', sans-serif; box-sizing: border-box; }
        body {
            background: linear-gradient(135deg, var(--blue-900), var(--blue-700));
            min-height: 100vh; display: flex; align-items: center;
            justify-content: center; margin: 0; padding: 20px;
        }

        /* TABS */
        .login-wrapper { width: 100%; max-width: 460px; }
        .tab-selector {
            display: flex; background: rgba(255,255,255,0.15);
            border-radius: var(--radius-lg); padding: 5px;
            margin-bottom: 16px; gap: 4px;
        }
        .tab-btn {
            flex: 1; padding: 10px 4px; border: none; border-radius: 14px;
            font-size: 11px; font-weight: 600; cursor: pointer;
            background: transparent; color: rgba(255,255,255,0.7);
            transition: all 0.2s ease; display: flex;
            align-items: center; justify-content: center; gap: 4px;
        }
        .tab-btn.active {
            background: var(--white); color: var(--blue-700);
            box-shadow: 0 2px 10px rgba(0,0,0,0.15);
        }

        /* CARD */
        .login-card {
            background: var(--white); border-radius: var(--radius-lg);
            padding: 36px; box-shadow: 0 20px 40px rgba(13,46,110,0.25);
        }
        .brand-header { text-align: center; margin-bottom: 26px; }
        .brand-icon {
            width: 54px; height: 54px; border-radius: 14px;
            background: var(--blue-50); color: var(--blue-600);
            display: flex; align-items: center; justify-content: center;
            font-size: 26px; margin: 0 auto 12px;
            box-shadow: 0 4px 12px rgba(37,99,235,0.15);
        }
        .brand-header h2 { color: var(--blue-900); font-weight: 700; font-size: 20px; margin: 0; }
        .brand-header p  { color: var(--gray-400); font-size: 12px; margin: 4px 0 0; }

        /* FORM */
        .form-label { font-size: 12.5px; font-weight: 600; color: var(--gray-600); margin-bottom: 5px; }
        .input-group-text {
            background: var(--gray-50); border-color: var(--gray-200);
            color: var(--gray-400); border-radius: var(--radius-md) 0 0 var(--radius-md);
        }
        .form-control {
            border-color: var(--gray-200); padding: 10px 13px; font-size: 13.5px;
            color: var(--gray-800); border-radius: 0 var(--radius-md) var(--radius-md) 0;
            transition: all 0.2s;
        }
        .form-control:focus {
            border-color: var(--blue-500);
            box-shadow: 0 0 0 3px rgba(59,130,246,0.15);
        }
        .form-control::placeholder { color: var(--gray-400); font-size: 13px; }

        /* ROLE BADGE */
        .role-badge {
            display: inline-flex; align-items: center; gap: 6px;
            padding: 5px 14px; border-radius: 20px; font-size: 11.5px;
            font-weight: 600; margin-bottom: 18px;
        }
        .badge-admin     { background: #fef3c7; color: #92400e; }
        .badge-dosen     { background: #d1fae5; color: #065f46; }
        /* ===== NEW: staf akademik badge ===== */
        .badge-staf      { background: #ede9fe; color: #4c1d95; }
        .badge-mahasiswa { background: var(--blue-50); color: var(--blue-700); }

        /* BUTTON */
        .btn-login {
            background: var(--blue-600); border: none; color: white;
            font-weight: 600; padding: 12px; border-radius: var(--radius-md);
            width: 100%; font-size: 14px; letter-spacing: 0.3px;
            box-shadow: 0 4px 12px rgba(37,99,235,0.25);
            transition: all 0.2s; display: flex;
            align-items: center; justify-content: center; gap: 8px;
        }
        .btn-login:hover {
            background: var(--blue-700); transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(37,99,235,0.35);
        }

        /* ALERT */
        .alert-custom {
            border-radius: var(--radius-md); padding: 11px 15px;
            font-size: 12.5px; margin-bottom: 18px;
            display: flex; align-items: center; gap: 9px; border: 1px solid transparent;
        }
        .alert-error   { background: #fef2f2; border-color: #fee2e2; color: #991b1b; }
        .alert-success { background: #f0fdf4; border-color: #dcfce7; color: #166534; }

        /* PANEL */
        .login-panel { display: none; }
        .login-panel.active { display: block; }

        /* INFO BOX */
        .info-box {
            background: var(--blue-50); border: 1px solid var(--blue-100);
            border-radius: var(--radius-md); padding: 10px 14px;
            font-size: 12px; color: var(--blue-700); margin-bottom: 18px;
            display: flex; align-items: flex-start; gap: 8px;
        }
        /* ===== NEW: info box warna ungu untuk staf ===== */
        .info-box-staf {
            background: #f5f3ff; border: 1px solid #ddd6fe;
            border-radius: var(--radius-md); padding: 10px 14px;
            font-size: 12px; color: #5b21b6; margin-bottom: 18px;
            display: flex; align-items: flex-start; gap: 8px;
        }
    </style>
</head>
<body>
<div class="login-wrapper">

    {{-- TAB SELECTOR --}}
    <div class="tab-selector">
        <button class="tab-btn active" onclick="switchTab('admin')" id="tab-admin">
            👑 Admin
        </button>
        <button class="tab-btn" onclick="switchTab('staf')" id="tab-staf">
            🗂️ Staf TU
        </button>
        <button class="tab-btn" onclick="switchTab('dosen')" id="tab-dosen">
            🎓 Dosen
        </button>
        <button class="tab-btn" onclick="switchTab('mahasiswa')" id="tab-mahasiswa">
            📚 Mahasiswa
        </button>
    </div>

    <div class="login-card">
        <div class="brand-header">
            <div class="brand-icon"><i class="bi bi-shield-lock-fill"></i></div>
            <h2>Portal SIAKAD</h2>
            <p>Sistem Informasi Akademik</p>
        </div>

        @if(session('error'))
        <div class="alert-custom alert-error">
            <i class="bi bi-exclamation-triangle-fill fs-6"></i>
            <div>{{ session('error') }}</div>
        </div>
        @endif
        @if(session('success'))
        <div class="alert-custom alert-success">
            <i class="bi bi-check-circle-fill fs-6"></i>
            <div>{{ session('success') }}</div>
        </div>
        @endif

        {{-- ===== PANEL ADMIN ===== --}}
        <div class="login-panel active" id="panel-admin">
            <div class="role-badge badge-admin">👑 Masuk sebagai Administrator</div>
            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <input type="hidden" name="role_panel" value="admin">
                <div class="mb-3">
                    <label class="form-label">Username Admin</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                        <input type="text" name="username" class="form-control"
                               placeholder="Masukkan username" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
                        <input type="password" name="password" class="form-control"
                               placeholder="Masukkan password" required>
                    </div>
                </div>
                <button type="submit" class="btn-login">
                    <i class="bi bi-box-arrow-in-right"></i> Masuk sebagai Admin
                </button>
            </form>
        </div>

        {{-- ===== PANEL STAF AKADEMIK (NEW) ===== --}}
        <div class="login-panel" id="panel-staf">
            <div class="role-badge badge-staf">🗂️ Masuk sebagai Staf Akademik / TU</div>
            <div class="info-box-staf">
                <i class="bi bi-info-circle-fill mt-1"></i>
                <span>Gunakan <strong>Username</strong> dan <strong>Password</strong> akun Staf TU Anda.</span>
            </div>
            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <input type="hidden" name="role_panel" value="staf">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                        <input type="text" name="username_staf" class="form-control"
                               placeholder="Masukkan username staf">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
                        <input type="password" name="password_staf" class="form-control"
                               placeholder="Masukkan password">
                    </div>
                </div>
                <button type="submit" class="btn-login" style="background:#7c3aed;">
                    <i class="bi bi-box-arrow-in-right"></i> Masuk sebagai Staf TU
                </button>
            </form>
        </div>

        {{-- ===== PANEL DOSEN ===== --}}
        <div class="login-panel" id="panel-dosen">
            <div class="role-badge badge-dosen">🎓 Masuk sebagai Dosen</div>
            <div class="info-box">
                <i class="bi bi-info-circle-fill mt-1"></i>
                <span>Gunakan <strong>NIP</strong> dan <strong>Nama Lengkap</strong> akun Anda.</span>
            </div>
            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <input type="hidden" name="role_panel" value="dosen">
                <div class="mb-3">
                    <label class="form-label">NIP</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-card-text"></i></span>
                        <input type="text" name="nip" class="form-control"
                               placeholder="Masukkan NIP">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label">Username</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" name="username_dosen" class="form-control"
                               placeholder="Masukkan username">
                    </div>
                </div>
                <button type="submit" class="btn-login" style="background:#059669;">
                    <i class="bi bi-box-arrow-in-right"></i> Masuk sebagai Dosen
                </button>
            </form>
        </div>

        {{-- ===== PANEL MAHASISWA ===== --}}
        <div class="login-panel" id="panel-mahasiswa">
            <div class="role-badge badge-mahasiswa">📚 Masuk sebagai Mahasiswa</div>
            <div class="info-box">
                <i class="bi bi-info-circle-fill mt-1"></i>
                <span>Gunakan <strong>NIM</strong> dan <strong>Nama Lengkap</strong> Anda.</span>
            </div>
            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <input type="hidden" name="role_panel" value="mahasiswa">
                <div class="mb-3">
                    <label class="form-label">NIM</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-card-text"></i></span>
                        <input type="text" name="nim" class="form-control"
                               placeholder="Masukkan NIM">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label">Nama Lengkap</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" name="nama" class="form-control"
                               placeholder="Masukkan nama lengkap">
                    </div>
                </div>
                <button type="submit" class="btn-login">
                    <i class="bi bi-box-arrow-in-right"></i> Masuk sebagai Mahasiswa
                </button>
            </form>
        </div>

    </div>{{-- end login-card --}}
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Ambil panel terakhir dari session error jika ada (agar tab tidak reset saat error)
    const lastPanel = '{{ session("last_panel", "admin") }}';

    function switchTab(role) {
        document.querySelectorAll('.login-panel').forEach(p => p.classList.remove('active'));
        document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
        document.getElementById('panel-' + role).classList.add('active');
        document.getElementById('tab-' + role).classList.add('active');
    }

    // Saat halaman load, aktifkan tab sesuai last_panel
    document.addEventListener('DOMContentLoaded', function () {
        switchTab(lastPanel);
    });
</script>
</body>
</html>