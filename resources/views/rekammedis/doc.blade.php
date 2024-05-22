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
    <!-- Header -->
    <table style="width: 100%;margin:0;padding:0;border:none;">
        <tr>
            <td style="width: 2.76cm; text-align: center;border:none;">
                <img style="width: 2.76cm;height:2.76cm;"
                    src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/logo/logo-klinik.png'))) }}">
            </td>
            <td style="border:none;">
                <div style="text-align: center;">
                    <div style="font-size: 14pt">KLINIK HEWAN GALAXY SATWA</div>
                    <div style="font-size: 12pt">
                        Perumahan Menganti Permai Blok A6 / No.09<br>
                        Tlogo Bedah, Hulaan Kec. Menganti Kab. Gresik, Jawa Timur<br>
                        Telp : (085) 730 3 69 063 email :
                        <a href="mailto:klinikhewan.galaxysatwa@gmail.com">
                            klinikhewan.galaxysatwa@gmail.com
                        </a>
                    </div>
                </div>
            </td>
        </tr>
    </table>
    <br>
    <div style="width: 240px;border:1px solid #ddd;padding:0 20px;">
        <table style="width: 100%; padding: 0;" cellspacing="0" cellpadding="0">
            <td style="margin: 0; padding: 0;width: 70px;border:none;">
                <p>Nama Hewan</p>
                <p>Jenis Hewan</p>
                <p>Jenis Kelamin</p>
                <p>Warna</p>
                <p>Umur</p>
                <p>Tatto</p>
            </td>
            <td style="margin: 0; padding: 0;width:130px;border:none;">
                <p>:&nbsp;&nbsp;{{ $pet->name }}</p>
                <p>:&nbsp;&nbsp;{{ $pet->type }}</p>
                <p>:&nbsp;&nbsp;{{ $pet->gender }}</p>
                <p>:&nbsp;&nbsp;{{ $pet->color }}</p>
                <p>:&nbsp;&nbsp;{{ $pet->old }}</p>
                <p>:&nbsp;&nbsp;{{ $pet->tatto }}</p>
            </td>
        </table>
    </div>

    <br>
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Gejala Klinis</th>
                <th>Diagnosa</th>
                <th>Tindakan</th>
                <th>Resep</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($medicalrecords as $medicalrecord)
                <tr>
                    <td>{{ date('d/m/Y', strtotime($medicalrecord->date)) }}</td>
                    <td>{{ $medicalrecord->symptom }}</td>
                    <td>{{ $medicalrecord->diagnosis }}</td>
                    <td>{{ $medicalrecord->action }}</td>
                    <td>{{ $medicalrecord->recipe }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
