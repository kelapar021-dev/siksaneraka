<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>Edit Tahun Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Poppins', sans-serif; }
        body { background: linear-gradient(135deg,#0f0c29,#302b63,#24243e); min-height:100vh; display:flex; align-items:center; justify-content:center; padding:30px; }
        .form-card { background:rgba(255,255,255,0.06); backdrop-filter:blur(20px); border:1px solid rgba(255,255,255,0.1); border-radius:25px; padding:35px; width:100%; max-width:500px; }
        .form-title { color:white; font-weight:700; font-size:20px; margin-bottom:25px; }
        .form-label { color:rgba(255,255,255,0.7); font-size:13px; font-weight:600; }
        .form-control, .form-select { background:rgba(255,255,255,0.08); border:1px solid rgba(255,255,255,0.15); border-radius:12px; color:white; padding:10px 15px; font-size:14px; }
        .form-control:focus, .form-select:focus { background:rgba(255,255,255,0.12); border-color:#ffc107; box-shadow:none; color:white; }
        .form-select option { background:#302b63; color:white; }
        .btn-save { background:linear-gradient(135deg,#ffc107,#ff8c00); border:none; color:#111; padding:11px 25px; border-radius:12px; font-weight:700; font-size:14px; width:100%; }
        .btn-back { background:rgba(255,255,255,0.08); border:1px solid rgba(255,255,255,0.15); color:rgba(255,255,255,0.7); padding:11px 25px; border-radius:12px; font-weight:600; font-size:14px; text-decoration:none; display:block; text-align:center; margin-top:10px; }
        .btn-back:hover { color:white; background:rgba(255,255,255,0.15); }
        .is-invalid { border-color:#ff416c !important; }
        .invalid-feedback { color:#ff416c; font-size:12px; }
    </style>
</head>
<body>
<div class="form-card">
    <div class="form-title">✏️ Edit Tahun Akademik</div>

    @if($errors->any())
        <div style="background:rgba(255,65,108,0.15);border:1px solid rgba(255,65,108,0.3);color:#ff416c;border-radius:12px;padding:12px 16px;margin-bottom:20px;font-size:13px;">
            <ul class="mb-0 ps-3">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('tahun.update', $tahun->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Tahun Akademik</label>
            <input type="text" name="tahun" class="form-control @error('tahun') is-invalid @enderror"
                   value="{{ old('tahun', $tahun->tahun) }}" placeholder="Contoh: 2024/2025" required>
            @error('tahun')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Semester</label>
            <select name="semester" class="form-select @error('semester') is-invalid @enderror" required>
                <option value="Ganjil"  {{ old('semester', $tahun->semester) == 'Ganjil'  ? 'selected' : '' }}>Ganjil</option>
                <option value="Genap"   {{ old('semester', $tahun->semester) == 'Genap'   ? 'selected' : '' }}>Genap</option>
            </select>
            @error('semester')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-4">
            <label class="form-label">Status</label>
            <select name="status_aktif" class="form-select @error('status_aktif') is-invalid @enderror" required>
                <option value="Aktif"       {{ old('status_aktif', $tahun->status_aktif) == 'Aktif'       ? 'selected' : '' }}>✔ Aktif</option>
                <option value="Tidak Aktif" {{ old('status_aktif', $tahun->status_aktif) == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
            @error('status_aktif')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <button type="submit" class="btn-save">💾 Simpan Perubahan</button>
        <a href="{{ route('tahun.index') }}" class="btn-back">← Kembali</a>
    </form>
</div>
</body>
</html>