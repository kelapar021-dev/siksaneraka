<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>Edit Absensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        *{font-family:'Poppins',sans-serif;}
        body{background:linear-gradient(135deg,#0f0c29,#302b63,#24243e);min-height:100vh;padding:40px 20px;}
        .card-form{background:rgba(255,255,255,0.05);backdrop-filter:blur(20px);border:1px solid rgba(255,255,255,0.1);border-radius:25px;padding:35px;max-width:600px;margin:0 auto;}
        .card-form h3{color:white;font-weight:700;margin-bottom:25px;}
        label{color:rgba(255,255,255,0.8);font-weight:600;font-size:14px;}
        .form-control,.form-select{background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.15);border-radius:12px;padding:12px;color:white;font-size:14px;}
        .form-control:focus,.form-select:focus{background:rgba(255,255,255,0.12);border-color:rgba(67,233,123,0.6);box-shadow:none;color:white;}
        .form-select option{background:#302b63;color:white;}
        .btn-simpan{background:linear-gradient(135deg,#f093fb,#f5576c);border:none;color:white;font-weight:700;padding:12px 30px;border-radius:12px;}
        .btn-kembali{background:rgba(255,255,255,0.1);border:1px solid rgba(255,255,255,0.15);color:white;font-weight:600;padding:12px 30px;border-radius:12px;text-decoration:none;}
    </style>
</head>
<body>
<div class="card-form">
    <h3>✏️ Edit Absensi</h3>
    <form action="{{ route('absensi.update', $absensi->id) }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Status Kehadiran</label>
                <select name="status" class="form-select" required>
                    <option value="Hadir" {{ $absensi->status=='Hadir'?'selected':'' }}>✅ Hadir</option>
                    <option value="Izin" {{ $absensi->status=='Izin'?'selected':'' }}>📩 Izin</option>
                    <option value="Sakit" {{ $absensi->status=='Sakit'?'selected':'' }}>🏥 Sakit</option>
                    <option value="Alpha" {{ $absensi->status=='Alpha'?'selected':'' }}>❌ Alpha</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label>Metode</label>
                <select name="metode" class="form-select">
                    <option value="Manual" {{ $absensi->metode=='Manual'?'selected':'' }}>Manual</option>
                    <option value="QR" {{ $absensi->metode=='QR'?'selected':'' }}>QR Code</option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="3">{{ $absensi->keterangan }}</textarea>
        </div>
        <div class="d-flex gap-3 mt-3">
            <button type="submit" class="btn-simpan">💾 Update</button>
            <a href="{{ route('absensi.index') }}" class="btn-kembali">← Kembali</a>
        </div>
    </form>
</div>
</body>
</html>