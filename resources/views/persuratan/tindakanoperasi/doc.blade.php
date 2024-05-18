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
            <div style="text-align: center;margin-bottom:10px;"><strong>SURAT PERSETUJUAN DILAKUKAN TINDAKAN OPERASI /
                    ANESTESI PASIEN</strong></div>
            <p><strong>1. IDENTITAS PASIEN</strong></p>
            <table style="width: 100%;margin-left:17px; padding: 0;" cellspacing="0" cellpadding="0">
                <td style="margin: 0; padding: 0;width: 130px;">
                    <p>No.RM</p>
                    <p>Nama Pasien</p>
                    <p>Jenis Hewan</p>
                    <p>Tanggal Lahir</p>
                    <p>Jenis Kelamin</p>
                    <p>Tgl. masuk pasien</p>
                    <p>Jam</p>
                    <p>Diagnosa</p>
                    <p>Diagnosa banding</p>
                </td>
                <td style="margin: 0; padding: 0;width:350px;">
                    <p>:&nbsp;&nbsp;{{ $data['norm'] }}</p>
                    <p>:&nbsp;&nbsp;{{ $data['namapasien'] }}</p>
                    <p>:&nbsp;&nbsp;{{ $data['jenishewan'] }}</p>
                    <p>:&nbsp;&nbsp;{{ $data['tanggallahirpasien'] }}</p>
                    <p>:&nbsp;&nbsp;{{ $data['jeniskelaminpasien'] }}</p>
                    <p>:&nbsp;&nbsp;{{ $data['tanggalmasuk'] }}</p>
                    <p>:&nbsp;&nbsp;{{ $data['jam'] }}</p>
                    <p>:&nbsp;&nbsp;{{ $data['diagnosa'] }}</p>
                    <p>:&nbsp;&nbsp;{{ $data['diagnosabanding'] }}</p>
                </td>
            </table>

            <p><strong>2. IDENTITAS OWNER / KELUARGA PASIEN</strong></p>
            <p style="margin-left:17px; padding: 0;">Hubungan dengan pasien</p>
            <table style="width: 100%;margin-left:17px; padding: 0;" cellspacing="0" cellpadding="0">

                <td style="margin: 0; padding: 0;width: 280px;">
                    <p>Nama lengkap Owner / Keluarga pasien</p>
                    <p>Jenis kelamin</p>

                </td>
                <td style="margin: 0; padding: 0;">
                    <p>:&nbsp;&nbsp;{{ $data['namaowner'] }}</p>
                    <p>:&nbsp;&nbsp;{{ $data['jeniskelaminowner'] }}</p>
                </td>
            </table>
            <table style="width: 100%;margin-left:17px; padding: 0;" cellspacing="0" cellpadding="0">
                <td style="margin: 0; padding: 0;width: 280px;">
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
                <td style="margin: 0; padding: 0;width: 280px;">
                    <p>Telp / WA</p>
                </td>
                <td style="margin: 0; padding: 0;">
                    <p>:&nbsp;&nbsp;{{ $data['telepon'] }}</p>
                </td>
            </table>
        </div><br>

        <!-- Isi persetujuan tindakan pasien -->
        <div class="approval" style="font-size:11pt;text-align:justify;">
            <p style="margin: 0;">Dengan ini saya Pemilik Hewan diatas telah mengerti dan menyadari sepenuhnya atas
                penjelasan dokter hewan perihal TINDAKAN (OPERASI / ANESTESI)* dan
                menyatakan: </p>
            <strong>
                <ol>
                    <li style="text-align:justify;">Saya mengerti dan menerima semua resiko tindakan medis yang akan
                        dilakukan
                        dan memberikan kewenangan penuh pada dokter hewan untuk melakukan
                        tindakan tersebut sesuai prosedur kedokteran hewan.</li>
                    <li style="text-align:justify;">Saya tidak akan menuntut secara hukum baik pidana maupun perdata
                        dalam
                        bentuk apapun atas resiko yang ditimbulkan atas tindakan medis yang telah
                        diambil sesuai dengan prosedur standar seorang Dokter Hewan profesional.</li>
                </ol>
            </strong>
            <p style="font-size: 11pt;text-align:justify;">Demikian surat pernyataan ini kami buat dengan sadar dan
                jelas serta tanpa ada unsur paksaan dari pihak manapun atas segala pertanggungjawaban kami terhadap
                identitas pasien diatas.
            </p>
        </div>

        <!-- Tanda tangan -->
        <p style="text-align:
                right;font-size:11pt;padding:0;margin:0;">Gresik, {{ $today }}</p>
        <table style="width: 100%; padding: 0; font-size: 11pt;">
            <tr>
                <td style="text-align: right;">
                    <div>
                        <p>Manajemen Klinik,</p><br>
                        <p>{{ Auth::user()->name }}</p>
                    </div>
                </td>
                <td style="text-align: right;">
                    <div>
                        <p style="margin-right:30px;">Pembuat Pernyataan,</p><br>
                        <p>(…………………………)</p>
                    </div>
                </td>
            </tr>
        </table>

    </div>
</body>

</html>
