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
    <div class="judul">DATA HEWAN</div><br>
    <table>
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Jenis</th>
                <th>Umur</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pets as $pet)
                <?php
                $list = explode('storage', $pet->image);
                $list = array_filter($list);
                $list[1] = 'storage' . $list[1];
                $image = $list[1];
                ?>
                <tr>
                    <td><img style="width: 1cm;height:1cm;border-radius:50%;"
                            src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path($image))) }}"></td>
                    <td>{{ $pet->name }}</td>
                    <td>{{ $pet->category }}</td>
                    <td>{{ $pet->type }}</td>
                    <td>{{ $pet->old }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
