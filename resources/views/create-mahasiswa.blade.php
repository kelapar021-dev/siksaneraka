<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Mahasiswa</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body{
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            min-height: 100vh;
        }

        .card-custom{
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .card-header{
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            padding: 25px;
            border: none;
        }

        .card-header h2{
            color: white;
            font-weight: 700;
            margin: 0;
            text-align: center;
        }

        .form-control{
            border-radius: 12px;
            padding: 12px;
            border: 1px solid #dcdcdc;
        }

        .form-control:focus{
            box-shadow: 0 0 10px rgba(0,114,255,0.3);
            border-color: #0072ff;
        }

        .btn-gradient{
            background: linear-gradient(135deg, #36d1dc, #5b86e5);
            border: none;
            color: white;
            font-weight: 600;
            padding: 12px 20px;
            border-radius: 12px;
            transition: 0.3s;
        }

        .btn-gradient:hover{
            transform: translateY(-2px);
            opacity: 0.9;
            color: white;
        }

        .btn-secondary-custom{
            background: linear-gradient(135deg, #868f96, #596164);
            border: none;
            color: white;
            font-weight: 600;
            padding: 12px 20px;
            border-radius: 12px;
        }

        label{
            font-weight: 600;
            margin-bottom: 5px;
        }
    </style>
</head>

<body>

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card card-custom">

                <div class="card-header">
                    <h2>Form Data Mahasiswa</h2>
                </div>

                <div class="card-body p-4">

                    <form action="{{ route('store-mahasiswa') }}" method="POST">
                        @csrf

                        <div class="row">

                           <div class="col-md-6 mb-3">
                                <label>NIM</label>
                               <input type="text" name="nim" class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control">
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>No HP</label>
                                <input type="text" name="no_hp" class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Program Studi</label>
                                <input type="text" name="prodi" class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Fakultas</label>
                                <input type="text" name="fakultas" class="form-control">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label>Semester</label>
                                <input type="number" name="semester" class="form-control">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label>IPK</label>
                                <input type="text" name="ipk" class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Agama</label>
                                <input type="text" name="agama" class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Status</label>
                                <input type="text" name="status" class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Asal Sekolah</label>
                                <input type="text" name="asal_sekolah" class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Nama Ayah</label>
                                <input type="text" name="nama_ayah" class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Nama Ibu</label>
                                <input type="text" name="nama_ibu" class="form-control">
                            </div>

                            <div class="col-12 mb-3">
                                <label>Alamat</label>
                                <textarea name="alamat" rows="4" class="form-control"></textarea>
                            </div>

                        </div>

                        <div class="d-flex gap-2 mt-3">

                            <button type="submit" class="btn btn-gradient">
                                Simpan Data
                            </button>

                            <a href="{{ route('data-mahasiswa') }}" class="btn btn-secondary-custom">
                                Kembali
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>

</div>

</body>
</html>