<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>Tambah Jadwal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        *{font-family:'Poppins',sans-serif;}
        body{background:linear-gradient(135deg,#0f0c29,#302b63,#24243e);min-height:100vh;padding:40px 20px;}
        .card-form{background:rgba(255,255,255,0.05);backdrop-filter:blur(20px);border:1px solid rgba(255,255,255,0.1);border-radius:25px;padding:35px;max-width:700px;margin:0 auto;}
        .card-form h3{color:white;font-weight:700;margin-bottom:25px;}
        label{color:rgba(255,255,255,0.8);font-weight:600;font-size:14px;}
        .form-control,.form-select{background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.15);border-radius:12px;padding:12px;color:white;font-size:14px;}
        .form-control:focus,.form-select:focus{background:rgba(255,255,255,0.12);border-color:rgba(54,209,220,0.6);box-shadow:none;color:white;}
        .form-select option{background:#302b63;color:white;}
        .btn-simpan{background:linear-gradient(135deg,#36d1dc,#5b86e5);border:none;color:white;font-weight:700;padding:12px 30px;border-radius:12px;}
        .btn-kembali{background:rgba(255,255,255,0.1);border:1px solid rgba(255,255,255,0.15);color:white;font-weight:600;padding:12px 30px;border-radius:12px;text-decoration:none;}
    </style>
</head>
<body>
<div class="card-form">
    <h3>🗓️ Tambah Jadwal Kuliah</h3>
    <form action="{{ route('jadwal.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Mata Kuliah</label>
                <select name="mata_kuliah_id" class="form-select" required>
                    <option value="">-- Pilih Mata Kuliah --</option>
                    @foreach($matkul as $m)
                    <option value="{{ $m->id }}">{{ $m->kode_mk }} - {{ $m->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label>Dosen</label>
                <select name="dosen_id" class="form-select" required>
                    <option value="">-- Pilih Dosen --</option>
                    @foreach($dosen as $d)
                    <option value="{{ $d->id }}">{{ $d->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label>Ruangan</label>
                <select name="ruangan_id" class="form-select" required>
                    <option value="">-- Pilih Ruangan --</option>
                    @foreach($ruangan as $r)
                    <option value="{{ $r->id }}">{{ $r->kode }} - {{ $r->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label>Tahun Akademik</label>
                <select name="tahun_akademik_id" class="form-select" required>
                    <option value="">-- Pilih Tahun --</option>
                    @foreach($tahun_ak as $t)
                    <option value="{{ $t->id }}">{{ $t->tahun }} - {{ $t->semester }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label>Hari</label>
                <select name="hari" class="form-select" required>
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                    <option value="Sabtu">Sabtu</option>
                </select>
            </div>
            <div class="col-md-4 mb-3"><label>Jam Mulai</label><input type="time" name="jam_mulai" class="form-control" required></div>
            <div class="col-md-4 mb-3"><label>Jam Selesai</label><input type="time" name="jam_selesai" class="form-control" required></div>
        </div>
        <div class="d-flex gap-3 mt-3">
            <button type="submit" class="btn-simpan">💾 Simpan</button>
            <a href="{{ route('jadwal.index') }}" class="btn-kembali">← Kembali</a>
        </div>
    </form>
</div>
</body>
</html>