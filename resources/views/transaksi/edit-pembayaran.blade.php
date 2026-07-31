<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Pembayaran</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

        *{
            font-family:'Poppins',sans-serif;
        }

        body{
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
            min-height:100vh;
            padding:40px;
        }

        .card-form{
            max-width:900px;
            margin:auto;
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(20px);
            border:1px solid rgba(255,255,255,0.1);
            border-radius:25px;
            padding:35px;
        }

        .title{
            color:white;
            font-weight:700;
            margin-bottom:30px;
        }

        label{
            color:white;
            margin-bottom:8px;
            font-size:14px;
            font-weight:500;
        }

        .form-control,
        .form-select{
            background: rgba(255,255,255,0.08);
            border:1px solid rgba(255,255,255,0.15);
            color:white;
            border-radius:12px;
            padding:12px;
        }

        .form-control:focus,
        .form-select:focus{
            background: rgba(255,255,255,0.1);
            color:white;
            box-shadow:none;
            border-color:#f093fb;
        }

        option{
            color:black;
        }

        .btn-save{
            background: linear-gradient(135deg, #f093fb, #f5576c);
            border:none;
            padding:12px 25px;
            border-radius:12px;
            color:white;
            font-weight:600;
        }

        .btn-back{
            background: rgba(255,255,255,0.1);
            border:1px solid rgba(255,255,255,0.1);
            padding:12px 25px;
            border-radius:12px;
            color:white;
            text-decoration:none;
            font-weight:600;
        }

    </style>
</head>

<body>

<div class="card-form">

    <h2 class="title">
        ✏ Edit Transaksi Pembayaran
    </h2>

    <form action="{{ route('transaksi.pembayaran.update', $data->id) }}" method="POST">

        @csrf

        <div class="row">

            <div class="col-md-6 mb-3">
                <label>Mahasiswa</label>

                <select name="mahasiswa_id" class="form-select" required>

                    @foreach($mahasiswa as $m)

                    <option value="{{ $m->id }}"
                        {{ $data->mahasiswa_id == $m->id ? 'selected' : '' }}>

                        {{ $m->nim }} - {{ $m->nama }}

                    </option>

                    @endforeach

                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label>Kode Bayar</label>

                <input type="text"
                       name="kode_bayar"
                       class="form-control"
                       value="{{ $data->kode_bayar }}"
                       required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Jenis Pembayaran</label>

                <input type="text"
                       name="jenis_pembayaran"
                       class="form-control"
                       value="{{ $data->jenis_pembayaran }}"
                       required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Jumlah Bayar</label>

                <input type="number"
                       name="jumlah_bayar"
                       class="form-control"
                       value="{{ $data->jumlah_bayar }}"
                       required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Tanggal Bayar</label>

                <input type="date"
                       name="tanggal_bayar"
                       class="form-control"
                       value="{{ $data->tanggal_bayar }}"
                       required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Batas Bayar</label>

                <input type="date"
                       name="batas_bayar"
                       class="form-control"
                       value="{{ $data->batas_bayar }}"
                       required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Metode Bayar</label>

                <select name="metode_bayar"
                        class="form-select"
                        required>

                    <option value="Transfer"
                        {{ $data->metode_bayar == 'Transfer' ? 'selected' : '' }}>
                        Transfer
                    </option>

                    <option value="Cash"
                        {{ $data->metode_bayar == 'Cash' ? 'selected' : '' }}>
                        Cash
                    </option>

                    <option value="QRIS"
                        {{ $data->metode_bayar == 'QRIS' ? 'selected' : '' }}>
                        QRIS
                    </option>

                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label>Status Bayar</label>

                <select name="status_bayar"
                        class="form-select"
                        required>

                    <option value="Lunas"
                        {{ $data->status_bayar == 'Lunas' ? 'selected' : '' }}>
                        Lunas
                    </option>

                    <option value="Belum Lunas"
                        {{ $data->status_bayar == 'Belum Lunas' ? 'selected' : '' }}>
                        Belum Lunas
                    </option>

                    <option value="Cicilan"
                        {{ $data->status_bayar == 'Cicilan' ? 'selected' : '' }}>
                        Cicilan
                    </option>

                </select>
            </div>

            <div class="col-12 mb-4">
                <label>Keterangan</label>

                <textarea name="keterangan"
                          rows="4"
                          class="form-control">{{ $data->keterangan }}</textarea>
            </div>

        </div>

        <div style="display:flex;gap:10px;">

            <button type="submit"
                    class="btn-save">
                Update
            </button>

            <a href="{{ route('transaksi.pembayaran') }}"
               class="btn-back">
               Kembali
            </a>

        </div>

    </form>

</div>

</body>
</html>