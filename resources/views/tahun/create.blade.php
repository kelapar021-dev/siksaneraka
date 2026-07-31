<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>Tambah Tahun Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        *{font-family:'Poppins',sans-serif;}
        body{background:linear-gradient(135deg,#0f0c29,#302b63,#24243e);min-height:100vh;padding:40px 20px;}
        .card-form{background:rgba(255,255,255,0.05);backdrop-filter:blur(20px);border:1px solid rgba(255,255,255,0.1);border-radius:25px;padding:35px;max-width:500px;margin:0 auto;}
        .card-form h3{color:white;font-weight:700;margin-bottom:25px;}
        label{color:rgba(255,255,255,0.8);font-weight:600;font-size:14px;}
        .form-control,.form-select{background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.15);border-radius:12px;padding:12px;color:white;font-size:14px;}
        .form-control:focus,.form-select:focus{background:rgba(255,255,255,0.12);border-color:rgba(255,193,7,0.6);box-shadow:none;color:white;}
        .form-control::placeholder{color:rgba(255,255,255,0.3);}
        .form-select option{background:#302b63;color:white;}
        .btn-simpan{background:linear-gradient(135deg,#ffc107,#ff8c00);border:none;color:#111;font-weight:700;padding:12px 30px;border-radius:12px;}
        .btn-kembali{background:rgba(255,255,255,0.1);border:1px solid rgba(255,255,255,0.15);color:white;font-weight:600;padding:12px 30px;border-radius:12px;text-decoration:none;}
    </style>
</head>
<body>
<div class="card-form">
    <h3>📅 Tambah Tahun Akademik</h3>
    <form action="{{ route('tahun.store') }}" method="POST">
        @csrf
        <div class="mb-3"><label>Tahun Akademik</label><input type="text" name="tahun" class="form-control" placeholder="2024/2025" required></div>
        <div class="mb-3">
            <label>Semester</label>
            <select name="semester" class="form-select" required>
                <option value="Ganjil">Ganjil</option>
                <option value="Genap">Genap</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status_aktif" class="form-select" required>
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
            </select>
        </div>
        <div class="d-flex gap-3 mt-3">
            <button type="submit" class="btn-simpan">💾 Simpan</button>
            <a href="{{ route('tahun.index') }}" class="btn-kembali">← Kembali</a>
        </div>
    </form>
</div>
</body>
</html>