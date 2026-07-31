<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>Tambah Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        *{font-family:'Poppins',sans-serif;}
        body{background:linear-gradient(135deg,#0f0c29,#302b63,#24243e);min-height:100vh;padding:40px 20px;}
        .card-form{background:rgba(255,255,255,0.05);backdrop-filter:blur(20px);border:1px solid rgba(255,255,255,0.1);border-radius:25px;padding:35px;max-width:700px;margin:0 auto;}
        .card-form h3{color:white;font-weight:700;margin-bottom:25px;}
        label{color:rgba(255,255,255,0.8);font-weight:600;font-size:14px;}
        .form-control{background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.15);border-radius:12px;padding:12px;color:white;font-size:14px;}
        .form-control:focus{background:rgba(255,255,255,0.12);border-color:rgba(240,147,251,0.6);box-shadow:none;color:white;}
        .form-control::placeholder{color:rgba(255,255,255,0.3);}
        .btn-simpan{background:linear-gradient(135deg,#f093fb,#f5576c);border:none;color:white;font-weight:700;padding:12px 30px;border-radius:12px;}
        .btn-kembali{background:rgba(255,255,255,0.1);border:1px solid rgba(255,255,255,0.15);color:white;font-weight:600;padding:12px 30px;border-radius:12px;text-decoration:none;}
    </style>
</head>
<body>
<div class="card-form">
    <h3>📚 Tambah Mata Kuliah</h3>
    <form action="{{ route('matkul.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3"><label>Kode MK</label><input type="text" name="kode_mk" class="form-control" placeholder="IF301" required></div>
            <div class="col-md-6 mb-3"><label>Nama Mata Kuliah</label><input type="text" name="nama" class="form-control" placeholder="Pemrograman Web II" required></div>
            <div class="col-md-4 mb-3"><label>SKS</label><input type="number" name="sks" class="form-control" placeholder="3" min="1" max="6" required></div>
            <div class="col-md-4 mb-3"><label>Semester</label><input type="number" name="semester" class="form-control" placeholder="6" min="1" max="8" required></div>
            <div class="col-md-4 mb-3"><label>Prodi</label><input type="text" name="prodi" class="form-control" placeholder="Informatika" required></div>
        </div>
        <div class="d-flex gap-3 mt-3">
            <button type="submit" class="btn-simpan">💾 Simpan</button>
            <a href="{{ route('matkul.index') }}" class="btn-kembali">← Kembali</a>
        </div>
    </form>
</div>
</body>
</html>