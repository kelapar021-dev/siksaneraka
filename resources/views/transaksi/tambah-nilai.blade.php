<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Nilai</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#0f172a;
            color:white;
            font-family:Poppins,sans-serif;
            padding:40px;
        }

        .card-box{
            max-width:800px;
            margin:auto;
            background:#1e293b;
            padding:30px;
            border-radius:20px;
        }

        .form-control,
        .form-select{
            background:#334155;
            border:none;
            color:white;
        }

        .form-control:focus,
        .form-select:focus{
            background:#334155;
            color:white;
            box-shadow:none;
        }

        label{
            margin-bottom:6px;
            font-weight:600;
        }
    </style>
</head>
<body>

<div class="card-box">

    <h2 class="mb-4">
        Tambah Data Nilai
    </h2>

    <form action="{{ route('transaksi.nilai.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label>Mahasiswa</label>

            <select name="mahasiswa_id" class="form-select" required>

                <option value="">-- Pilih Mahasiswa --</option>

                @foreach($mahasiswa as $m)

                    <option value="{{ $m->id }}">
                        {{ $m->nim }} - {{ $m->nama }}
                    </option>

                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <label>Kode Matkul</label>

            <input type="text"
                   name="kode_matkul"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label>Nama Matkul</label>

            <input type="text"
                   name="nama_matkul"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label>SKS</label>

            <input type="number"
                   name="sks"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label>Semester</label>

            <input type="number"
                   name="semester"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label>Tahun Ajaran</label>

            <input type="text"
                   name="tahun_ajaran"
                   class="form-control"
                   placeholder="2025/2026"
                   required>
        </div>

        <div class="mb-3">
            <label>Nilai Angka</label>

            <input type="number"
                   name="nilai_angka"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label>Nilai Huruf</label>

            <input type="text"
                   name="nilai_huruf"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label>Bobot Nilai</label>

            <input type="text"
                   name="bobot_nilai"
                   class="form-control"
                   required>
        </div>

        <div class="mb-4">
            <label>Status Nilai</label>

            <select name="status_nilai"
                    class="form-select"
                    required>

                <option value="Lulus">Lulus</option>
                <option value="Tidak Lulus">Tidak Lulus</option>
                <option value="Mengulang">Mengulang</option>

            </select>
        </div>

        <button type="submit" class="btn btn-success">
            Simpan
        </button>

        <a href="{{ route('transaksi.nilai') }}"
           class="btn btn-secondary">
           Kembali
        </a>

    </form>

</div>

</body>
</html>