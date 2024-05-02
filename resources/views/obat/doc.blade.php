<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Rekam Medis</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12px;
            margin: 20px;
            /* Menambahkan jarak antara judul dengan tabel */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            /* Memberikan latar belakang abu pada header */
        }

        /* Warna putih pada baris ganjil */
        tr:nth-child(odd) {
            background-color: #fff;
        }

        /* Judul */
        .judul {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 20px;
            /* Menambahkan jarak antara judul dengan tabel */
        }
    </style>
</head>

<body>
    <div class="judul">DATA OBAT</div><br>
    <table>
        <thead>
            <tr>
                <th>Kode Obat</th>
                <th>Nama Obat</th>
                <th>Tanggal Kadaluarsa</th>
                <th>Stok Obat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($medicines as $medicine)
                <tr>
                    <td>{{ $medicine->code }}</td>
                    <td>{{ $medicine->name }}</td>
                    <td> {{ date('d/m/Y', strtotime($medicine->expiry_date)) }}</td>
                    <td>{{ $medicine->stock }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
