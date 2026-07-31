<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata</title>
    <style>
        body {
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
        }

        .card {
            width: 550px;
            /* Pakai PHP echo asset untuk panggil gambar di folder public */
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                        url('<?php echo asset("clark.png"); ?>');
            background-size: cover;
            background-position: center;
            padding: 40px;
            border-radius: 25px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.4);
            color: white;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        h2 {
            margin-top: 0;
            margin-bottom: 30px;
            letter-spacing: 3px;
            font-weight: bold;
            text-transform: uppercase;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 15px 5px;
            text-align: left;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        th {
            color: #ffcc00; 
            width: 40%;
        }

        td {
            color: #ffffff;
        }

        tr:last-child th, tr:last-child td {
            border-bottom: none;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>BIODATA</h2>
    
    <table>
        <?php
            $data = [
                "Nama Lengkap"   => "Muhammad Ryan Hidayat",
                "Nama Panggung"  => "Ryan",
                "Tanggal Lahir"  => "29 April 2006",
                "Hobi"           => "Sepak Bola" , 
                "Asal Sekolah"   => "MA Trubus Iman",
            ];

            foreach ($data as $label => $isi) {
                echo "<tr>
                        <th>$label</th>
                        <td>: $isi</td>
                      </tr>";
            }
        ?>
    </table>
</div>

</body>
</html>  