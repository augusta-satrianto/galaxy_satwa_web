<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Rekam Medis</title>
    <style>
        @page {
            margin: 0;
            size: Legal portrait;
        }

        body {
            font-family: 'Times New Roman', Times, serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        .paper {
            width: 636.5px;
            height: 1200px;
            padding: 0.68cm 2.33cm 0.49cm 2.36cm;
        }

        .identitas-pasien p {
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <div class="paper">
        <!-- Header -->
        <table style="width: 100%;margin:0;padding:0;">
            <tr>
                <td style="width: 2.76cm; text-align: center;">
                    <img style="width: 2.76cm;height:2.76cm;"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/logo/logo-klinik.png'))) }}">
                </td>
                <td>
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

        <hr style="border-top: 1.5px solid black; padding:0;margin:0; ">
        <hr style="border-top: 0.5px solid black; padding:0;margin-top:2px; ">

        <!-- Identitas -->
        <div class="identitas-pasien">
            <div style="text-align: center;margin-bottom:10px;"><strong>SURAT KETERANGAN KELAHIRAN</strong></div>
            <p><strong>1. IDENTITAS ANAK</strong></p>
            <table style="width: 100%;margin-left:17px; padding: 0;" cellspacing="0" cellpadding="0">
                <td style="margin: 0; padding: 0;width: 130px;">
                    <p>Nama</p>
                    <p>Jenis Ras</p>
                    <p>Jenis Kelamin</p>
                    <p>Tanggal Lahir/Jam</p>
                    <p>Berat</p>
                    <p>Panjang</p>
                    <p>Warna</p>
                </td>
                <td style="margin: 0; padding: 0;width:350px;">
                    <p>:&nbsp;&nbsp;{{ $data['namaanak'] }}</p>
                    <p>:&nbsp;&nbsp;{{ $data['jenisrasanak'] }}</p>
                    <p>:&nbsp;&nbsp;{{ $data['jeniskelaminanak'] }}</p>
                    <p>:&nbsp;&nbsp;{{ $data['tanggallahiranak'] }}&nbsp;&nbsp;{{ $data['jam'] }}</p>
                    <p>:&nbsp;&nbsp;{{ $data['berat'] }}</p>
                    <p>:&nbsp;&nbsp;{{ $data['panjang'] }}</p>
                    <p>:&nbsp;&nbsp;{{ $data['warna'] }}</p>
                </td>
            </table>

            <p><strong>2. IDENTITAS INDUK</strong></p>
            <table style="width: 100%;margin-left:17px; padding: 0;" cellspacing="0" cellpadding="0">
                <td style="margin: 0; padding: 0;width: 130px;">
                    <p>Nama Induk Betina</p>
                    <p>Jenis Ras</p>
                    <p>Tanggal Lahir</p>
                    <p>No. Id Microchip</p>
                    <p>Nama Induk Jantan</p>
                    <p>Jenis Ras</p>
                    <p>Tanggal Lahir</p>
                    <p>No. Id Microchip</p>
                </td>
                <td style="margin: 0; padding: 0;width:350px;">
                    <p>:&nbsp;&nbsp;{{ $data['namabetina'] }}</p>
                    <p>:&nbsp;&nbsp;{{ $data['jenisrasbetina'] }}</p>
                    <p>:&nbsp;&nbsp;{{ $data['tanggallahirbetina'] }}</p>
                    <p>:&nbsp;&nbsp;{{ $data['microchipbetina'] }}</p>
                    <p>:&nbsp;&nbsp;{{ $data['namajantan'] }}</p>
                    <p>:&nbsp;&nbsp;{{ $data['jenisrasjantan'] }}</p>
                    <p>:&nbsp;&nbsp;{{ $data['tanggallahirjantan'] }}</p>
                    <p>:&nbsp;&nbsp;{{ $data['microchipjantan'] }}</p>
                </td>
            </table>

            <p><strong>3. IDENTITAS OWNER</strong></p>
            <table style="width: 100%;margin-left:17px; padding: 0;" cellspacing="0" cellpadding="0">
                <td style="margin: 0; padding: 0;width: 130px;">
                    <p>Nama Owner</p>
                </td>
                <td style="margin: 0; padding: 0;">
                    <p>:&nbsp;&nbsp;{{ $data['namaowner'] }}</p>
                </td>
            </table>
            <table style="width: 100%;margin-left:17px; padding: 0;" cellspacing="0" cellpadding="0">
                <td style="margin: 0; padding: 0;width: 130px;">
                    <p>Alamat lengkap</p>
                </td>
                <td style="margin: 0; padding: 0;width: 10px;">
                    <p>:&nbsp;&nbsp;</p>
                </td>
                <td style="margin: 0; padding: 0;">
                    <p>{{ $data['alamatlengkap'] }}</p>
                </td>
            </table>
            <table style="width: 100%;margin-left:17px; padding: 0;" cellspacing="0" cellpadding="0">
                <td style="margin: 0; padding: 0;width: 130px;">
                    <p>Telp / WA</p>
                </td>
                <td style="margin: 0; padding: 0;">
                    <p>:&nbsp;&nbsp;{{ $data['telepon'] }}</p>
                </td>
            </table>
        </div>

        <!-- Isi persetujuan tindakan pasien -->
        <div class="approval" style="font-size:11pt;text-align:justify;">
            <p style="font-size: 11pt;text-align:justify;">Demikian surat pernyataan ini kami buat dengan sadar dan
                jelas serta tanpa ada unsur paksaan dari pihak manapun atas segala pertanggungjawaban kami terhadap
                identitas pasien diatas.
            </p>
        </div>

        <!-- Tanda tangan -->
        <p style="text-align:
                right;font-size:11pt;padding:0;margin:0;">Gresik, {{ $today }}</p>
        <table style="width: 100%; padding: 0;margin:0; font-size: 11pt;">
            <tr>
                <td style="text-align: right;">
                    <div>
                        <p style=" padding: 0;margin:0;">Dokter Pembuat Pernyataan,</p><br>
                        <p>{{ Auth::user()->name }}</p>
                    </div>
                </td>
            </tr>
        </table>

    </div>
</body>

</html>
