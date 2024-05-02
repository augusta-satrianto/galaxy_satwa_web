<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan</title>
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
    <div class="judul">DATA PEMILIK</div><br>

    <table>
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Telepon</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <?php
                $list = explode('storage', $employee->image);
                $list = array_filter($list);
                $list[1] = 'storage' . $list[1];
                $image = $list[1];
                ?>
                <tr>
                    <td><img style="width: 1cm;height:1cm;border-radius:50%;"
                            src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path($image))) }}"></td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->date_of_birth }}</td>
                    <td>{{ $employee->gender }}</td>
                    <td>{{ $employee->address }}</td>
                    <td>{{ $employee->phone }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
