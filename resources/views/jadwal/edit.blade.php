<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>Edit Jadwal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Poppins', sans-serif; }
        body { background: linear-gradient(135deg,#0f0c29,#302b63,#24243e); min-height:100vh; display:flex; align-items:center; justify-content:center; padding:30px; }
        .form-card { background:rgba(255,255,255,0.06); backdrop-filter:blur(20px); border:1px solid rgba(255,255,255,0.1); border-radius:25px; padding:35px; width:100%; max-width:560px; }
        .form-title { color:white; font-weight:700; font-size:20px; margin-bottom:25px; }
        .form-label { color:rgba(255,255,255,0.7); font-size:13px; font-weight:600; }
        .form-control, .form-select { background:rgba(255,255,255,0.08); border:1px solid rgba(255,255,255,0.15); border-radius:12px; color:white; padding:10px 15px; font-size:14px; }
        .form-control:focus, .form-select:focus { background:rgba(255,255,255,0.12); border-color:#36d1dc; box-shadow:none; color:white; }
        .form-select option { background:#302b63; color:white; }
        .btn-save { background:linear-gradient(135deg,#36d1dc,#5b86e5); border:none; color:white; padding:11px 25px; border-radius:12px; font-weight:700; font-size:14px; width:100%; }
        .btn-back { background:rgba(255,255,255,0.08); border:1px solid rgba(255,255,255,0.15); color:rgba(255,255,255,0.7); padding:11px 25px; border-radius:12px; font-weight:600; font-size:14px; text-decoration:none; display:block; text-align:center; margin-top:10px; }
        .btn-back:hover { color:white; background:rgba(255,255,255,0.15); }
        .is-invalid { border-color:#ff416c !important; }
        .invalid-feedback { color:#ff416c; font-size:12px; }
        .row { margin:0 -8px; }
        .col-6 { padding:0 8px; }
    </style>
</head>
<body>
<div class="form-card">
    <div class="form-title">✏️ Edit Jadwal Kuliah</div>

    @if($errors->any())
        <div style="background:rgba(255,65,108,0.15);border:1px solid rgba(255,65,108,0.3);color:#ff416c;border-radius:12px;padding:12px 16px;margin-bottom:20px;font-size:13px;">
            <ul class="mb-0 ps-3">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Mata Kuliah</label>
            <select name="mata_kuliah_id" class="form-select @error('mata_kuliah_id') is-invalid @enderror" required>
                <option value="">-- Pilih Mata Kuliah --</option>
                @foreach($matkul as $mk)
                <option value="{{ $mk->id }}" {{ old('mata_kuliah_id', $jadwal->mata_kuliah_id) == $mk->id ? 'selected' : '' }}>
                    {{ $mk->kode_mk }} - {{ $mk->nama }}
                </option>
                @endforeach
            </select>
            @error('mata_kuliah_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Dosen</label>
            <select name="dosen_id" class="form-select @error('dosen_id') is-invalid @enderror" required>
                <option value="">-- Pilih Dosen --</option>
                @foreach($dosen as $d)
                <option value="{{ $d->id }}" {{ old('dosen_id', $jadwal->dosen_id) == $d->id ? 'selected' : '' }}>
                    {{ $d->nama }}
                </option>
                @endforeach
            </select>
            @error('dosen_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Ruangan</label>
            <select name="ruangan_id" class="form-select @error('ruangan_id') is-invalid @enderror" required>
                <option value="">-- Pilih Ruangan --</option>
                @foreach($ruangan as $r)
                <option value="{{ $r->id }}" {{ old('ruangan_id', $jadwal->ruangan_id) == $r->id ? 'selected' : '' }}>
                    {{ $r->nama }}
                </option>
                @endforeach
            </select>
            @error('ruangan_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Tahun Akademik</label>
            <select name="tahun_akademik_id" class="form-select @error('tahun_akademik_id') is-invalid @enderror" required>
                <option value="">-- Pilih Tahun Akademik --</option>
                @foreach($tahun_ak as $t)
                <option value="{{ $t->id }}" {{ old('tahun_akademik_id', $jadwal->tahun_akademik_id) == $t->id ? 'selected' : '' }}>
                    {{ $t->tahun }} - {{ $t->semester }}
                </option>
                @endforeach
            </select>
            @error('tahun_akademik_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Hari</label>
            <select name="hari" class="form-select @error('hari') is-invalid @enderror" required>
                <option value="">-- Pilih Hari --</option>
                @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'] as $h)
                <option value="{{ $h }}" {{ old('hari', $jadwal->hari) == $h ? 'selected' : '' }}>{{ $h }}</option>
                @endforeach
            </select>
            @error('hari')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="row mb-4">
            <div class="col-6">
                <label class="form-label">Jam Mulai</label>
                <input type="time" name="jam_mulai" class="form-control @error('jam_mulai') is-invalid @enderror"
                       value="{{ old('jam_mulai', $jadwal->jam_mulai) }}" required>
                @error('jam_mulai')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-6">
                <label class="form-label">Jam Selesai</label>
                <input type="time" name="jam_selesai" class="form-control @error('jam_selesai') is-invalid @enderror"
                       value="{{ old('jam_selesai', $jadwal->jam_selesai) }}" required>
                @error('jam_selesai')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>

        <button type="submit" class="btn-save">💾 Simpan Perubahan</button>
        <a href="{{ route('jadwal.index') }}" class="btn-back">← Kembali</a>
    </form>
</div>
</body>
</html>