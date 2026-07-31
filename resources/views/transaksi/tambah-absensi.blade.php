<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Absensi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#111827;
            font-family:Arial;
            padding:40px;
            color:white;
        }

        .card{
            max-width:800px;
            margin:auto;
            background:#1f2937;
            border-radius:15px;
            padding:30px;
        }

        .form-control,
        .form-select{
            margin-bottom:15px;
            background:#374151;
            border:none;
            color:white;
        }

        .form-control:focus,
        .form-select:focus{
            background:#374151;
            color:white;
            box-shadow:none;
        }

    </style>

</head>
<body>

<div class="card">

    <h2 class="mb-4">
        Tambah Data Absensi
    </h2>

    <form action="{{ route('transaksi.absensi.store') }}" method="POST">

        @csrf

        @php $role = session('role', 'mahasiswa'); @endphp

        @if($role === 'mahasiswa')

        <div style="background:rgba(67,233,123,0.15);border:1px solid rgba(67,233,123,0.3);color:#43e97b;padding:12px 16px;border-radius:10px;margin-bottom:15px;font-size:13px;">
            Anda mengisi absensi atas nama Anda sendiri
            ({{ $mahasiswa->first()->nim ?? '' }} - {{ $mahasiswa->first()->nama ?? '' }}).
        </div>

        <input type="hidden" name="mahasiswa_id" value="{{ session('mahasiswa_id') }}">

        @else

        <label>Mahasiswa</label>

        <select name="mahasiswa_id" class="form-select" required>

            <option value="">-- Pilih Mahasiswa --</option>

            @foreach($mahasiswa as $mhs)

                <option value="{{ $mhs->id }}">
                    {{ $mhs->nim }} - {{ $mhs->nama }}
                </option>

            @endforeach

        </select>

        @endif

        <label>Tanggal</label>

        <input type="date"
               name="tanggal"
               class="form-control"
               required>

        <label>Mata Kuliah</label>

        <input type="text"
               name="nama_matkul"
               class="form-control"
               placeholder="Masukkan mata kuliah"
               required>

        <label>Nama Dosen</label>

        <input type="text"
               name="nama_dosen"
               class="form-control"
               placeholder="Masukkan nama dosen"
               required>

        <label>Pertemuan Ke</label>

        <select name="pertemuan_ke"
                class="form-select"
                required>

            <option value="">-- Pilih Pertemuan --</option>

            @foreach($pertemuan as $p)

                <option value="{{ $p->pertemuan_ke }}">
                    {{ $p->nama_matkul }} - Pertemuan ke-{{ $p->pertemuan_ke }} ({{ $p->tanggal }})
                </option>

            @endforeach

        </select>

        <label>Status Kehadiran</label>

        <select name="status_hadir"
                class="form-select"
                required>

            <option value="">-- Pilih Status --</option>

            <option value="Hadir">Hadir</option>
            <option value="Izin">Izin</option>
            <option value="Sakit">Sakit</option>
            <option value="Alfa">Alfa</option>

        </select>

        <label>Keterangan</label>

        <textarea name="keterangan"
                  class="form-control"
                  rows="4"></textarea>

        <button type="submit"
                class="btn btn-success mt-3">
            Simpan
        </button>

        <a href="{{ route('transaksi.absensi') }}"
           class="btn btn-secondary mt-3">
            Kembali
        </a>

    </form>

</div>

</body>
</html>