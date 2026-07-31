<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pembayaran</title>

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
        💳 Tambah Transaksi Pembayaran
    </h2>

    <form action="{{ route('transaksi.pembayaran.store') }}" method="POST">

        @csrf

        <div class="row">

            <div class="col-md-6 mb-3">
                <label>Mahasiswa</label>

                @if(session('user_role') === 'mahasiswa')
                    @foreach($mahasiswa as $m)
                    <input type="hidden" name="mahasiswa_id" value="{{ $m->id }}">
                    <input type="text" class="form-control" value="{{ $m->nim }} - {{ $m->nama }}" readonly
                           style="background:rgba(255,255,255,0.04);color:rgba(255,255,255,.7);">
                    @endforeach
                @else
                <select name="mahasiswa_id" class="form-select" required>
                    <option value="">-- Pilih Mahasiswa --</option>
                    @foreach($mahasiswa as $m)
                    <option value="{{ $m->id }}">
                        {{ $m->nim }} - {{ $m->nama }}
                    </option>
                    @endforeach
                </select>
                @endif
            </div>

            <div class="col-md-6 mb-3">
                <label>Kode Bayar</label>

                <input type="text"
                       name="kode_bayar"
                       class="form-control"
                       required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Jenis Pembayaran</label>

                <input type="text"
                       name="jenis_pembayaran"
                       class="form-control"
                       placeholder="SPP / Praktikum / UKT"
                       required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Jumlah Bayar</label>

                <input type="number"
                       name="jumlah_bayar"
                       class="form-control"
                       required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Tanggal Bayar</label>

                <input type="date"
                       name="tanggal_bayar"
                       class="form-control"
                       required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Batas Bayar</label>

                <input type="date"
                       name="batas_bayar"
                       class="form-control"
                       required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Metode Bayar</label>

                <select name="metode_bayar"
                        class="form-select"
                        required>

                    <option value="">-- Pilih Metode --</option>
                    <option value="Transfer">Transfer</option>
                    <option value="Cash">Cash</option>
                    <option value="QRIS">QRIS</option>

                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label>Status Bayar</label>

                <select name="status_bayar"
                        class="form-select"
                        required>

                    <option value="">-- Pilih Status --</option>
                    <option value="Lunas">Lunas</option>
                    <option value="Belum Lunas">Belum Lunas</option>
                    <option value="Cicilan">Cicilan</option>

                </select>
            </div>

            <div class="col-12 mb-4">
                <label>Keterangan</label>

                <textarea name="keterangan"
                          rows="4"
                          class="form-control"></textarea>
            </div>

        </div>

        <div style="display:flex;gap:10px;">

            <button type="submit"
                    class="btn-save">
                Simpan
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