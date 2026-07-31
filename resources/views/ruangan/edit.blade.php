<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>Edit Ruangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Poppins', sans-serif; }
        body { background: linear-gradient(135deg,#0f0c29,#302b63,#24243e); min-height:100vh; display:flex; align-items:center; justify-content:center; padding:30px; }
        .form-card { background:rgba(255,255,255,0.06); backdrop-filter:blur(20px); border:1px solid rgba(255,255,255,0.1); border-radius:25px; padding:35px; width:100%; max-width:520px; }
        .form-title { color:white; font-weight:700; font-size:20px; margin-bottom:25px; }
        .form-label { color:rgba(255,255,255,0.7); font-size:13px; font-weight:600; }
        .form-control { background:rgba(255,255,255,0.08); border:1px solid rgba(255,255,255,0.15); border-radius:12px; color:white; padding:10px 15px; font-size:14px; }
        .form-control:focus { background:rgba(255,255,255,0.12); border-color:#667eea; box-shadow:none; color:white; }
        .btn-save { background:linear-gradient(135deg,#667eea,#764ba2); border:none; color:white; padding:11px 25px; border-radius:12px; font-weight:600; font-size:14px; width:100%; }
        .btn-back { background:rgba(255,255,255,0.08); border:1px solid rgba(255,255,255,0.15); color:rgba(255,255,255,0.7); padding:11px 25px; border-radius:12px; font-weight:600; font-size:14px; text-decoration:none; display:block; text-align:center; margin-top:10px; }
        .btn-back:hover { color:white; background:rgba(255,255,255,0.15); }
        .is-invalid { border-color:#ff416c !important; }
        .invalid-feedback { color:#ff416c; font-size:12px; }
    </style>
</head>
<body>
<div class="form-card">
    <div class="form-title">✏️ Edit Ruangan</div>

    @if($errors->any())
        <div style="background:rgba(255,65,108,0.15);border:1px solid rgba(255,65,108,0.3);color:#ff416c;border-radius:12px;padding:12px 16px;margin-bottom:20px;font-size:13px;">
            <ul class="mb-0 ps-3">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('ruangan.update', $ruangan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Kode Ruangan</label>
            <input type="text" name="kode" class="form-control @error('kode') is-invalid @enderror"
                   value="{{ old('kode', $ruangan->kode) }}" placeholder="Contoh: R101" required>
            @error('kode')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Ruangan</label>
            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                   value="{{ old('nama', $ruangan->nama) }}" placeholder="Contoh: Ruang Kuliah A" required>
            @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Kapasitas (orang)</label>
            <input type="number" name="kapasitas" class="form-control @error('kapasitas') is-invalid @enderror"
                   value="{{ old('kapasitas', $ruangan->kapasitas) }}" placeholder="Contoh: 40" min="1" required>
            @error('kapasitas')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-4">
            <label class="form-label">Gedung <span style="color:rgba(255,255,255,0.4)">(opsional)</span></label>
            <input type="text" name="gedung" class="form-control @error('gedung') is-invalid @enderror"
                   value="{{ old('gedung', $ruangan->gedung) }}" placeholder="Contoh: Gedung B">
            @error('gedung')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <button type="submit" class="btn-save">💾 Simpan Perubahan</button>
        <a href="{{ route('ruangan.index') }}" class="btn-back">← Kembali</a>
    </form>
</div>
</body>
</html>