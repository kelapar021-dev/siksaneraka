<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Absensi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">

    <style>

        *{
            font-family: 'Poppins', sans-serif;
        }

        body{
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
            min-height: 100vh;
            padding: 30px;
        }

        .main-card{
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 25px;
            padding: 35px;
            max-width: 850px;
            margin: auto;
        }

        .page-title{
            color: white;
            font-weight: 700;
            margin-bottom: 30px;
            text-align: center;
        }

        .form-label{
            color: rgba(255,255,255,0.8);
            font-weight: 500;
            margin-bottom: 8px;
        }

        .form-control,
        .form-select{
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.15);
            color: white;
            border-radius: 12px;
            padding: 12px 15px;
        }

        .form-control:focus,
        .form-select:focus{
            background: rgba(255,255,255,0.1);
            color: white;
            border-color: #43e97b;
            box-shadow: none;
        }

        .form-control::placeholder{
            color: rgba(255,255,255,0.4);
        }

        .form-select option{
            color: black;
        }

        .btn-simpan{
            background: linear-gradient(135deg, #43e97b, #38f9d7);
            border: none;
            color: #111;
            padding: 12px 25px;
            border-radius: 12px;
            font-weight: 700;
        }

        .btn-kembali{
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.15);
            color: white;
            padding: 12px 25px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
        }

    </style>

</head>

<body>

<div class="main-card">

    <h2 class="page-title">
        <i class="bi bi-pencil-square"></i>
        Edit Data Absensi
    </h2>

    <form action="{{ route('transaksi.absensi.update', $data->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="row">

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Mahasiswa
                </label>

                <select name="mahasiswa_id" class="form-select" required>

                    <option value="">-- Pilih Mahasiswa --</option>

                    @foreach($mahasiswa as $mhs)

                        <option
                            value="{{ $mhs->id }}"
                            {{ $data->mahasiswa_id == $mhs->id ? 'selected' : '' }}
                        >
                            {{ $mhs->nim }} - {{ $mhs->nama }}
                        </option>

                    @endforeach

                </select>

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Mata Kuliah
                </label>

                <input
                    type="text"
                    name="nama_matkul"
                    class="form-control"
                    value="{{ $data->nama_matkul }}"
                    required
                >

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Nama Dosen
                </label>

                <input
                    type="text"
                    name="nama_dosen"
                    class="form-control"
                    value="{{ $data->nama_dosen }}"
                    required
                >

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Tanggal
                </label>

                <input
                    type="date"
                    name="tanggal"
                    class="form-control"
                    value="{{ $data->tanggal }}"
                    required
                >

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Pertemuan Ke
                </label>

                <input
                    type="number"
                    name="pertemuan_ke"
                    class="form-control"
                    value="{{ $data->pertemuan_ke }}"
                    required
                >

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Status Kehadiran
                </label>

                <select name="status_hadir" class="form-select" required>

                    <option value="Hadir" {{ $data->status_hadir == 'Hadir' ? 'selected' : '' }}>
                        Hadir
                    </option>

                    <option value="Izin" {{ $data->status_hadir == 'Izin' ? 'selected' : '' }}>
                        Izin
                    </option>

                    <option value="Sakit" {{ $data->status_hadir == 'Sakit' ? 'selected' : '' }}>
                        Sakit
                    </option>

                    <option value="Alfa" {{ $data->status_hadir == 'Alfa' ? 'selected' : '' }}>
                        Alfa
                    </option>

                </select>

            </div>

            <div class="col-12 mb-4">

                <label class="form-label">
                    Keterangan
                </label>

                <textarea
                    name="keterangan"
                    class="form-control"
                    rows="4"
                >{{ $data->keterangan }}</textarea>

            </div>

        </div>

        <div class="d-flex gap-3">

            <button type="submit" class="btn-simpan">
                <i class="bi bi-save"></i>
                Update Data
            </button>

            <a href="{{ route('transaksi.absensi') }}" class="btn-kembali">
                <i class="bi bi-arrow-left"></i>
                Kembali
            </a>

        </div>

    </form>

</div>

</body>
</html>