<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galaxy Satwa</title>
    <link rel="icon" type="image/png" href="../../images/logo/logo-icon.svg" />
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            display: flex;
            justify-content: center;
        }

        .container {
            width: 100%;
            margin: 3%;
        }

        @media (max-width: 400px) {
            .container {
                width: 100%;
                margin: 0;
                height: auto;
                padding: 20px;
            }
        }
    </style>

</head>

<body>
    <section>
        <div class="container">
            <div style="font-family: 'Inter', sans-serif;font-size:30px;font-weight:bold;">
                Verifikasi Email
            </div>
            <br>
            <div style="font-family: 'Inter', sans-serif;color:#6B7280;">
                Sebelum Melanjutkan ke halaman selanjutnya, silahkan verifikasi email terlebih dahulu
            </div>

            @if (session('resent'))
                <br>
                <div style="font-family: 'Inter', sans-serif;color:#6B7280;">
                    Email Verifikasi Berhasil Dikirim, Silahkan check Inbox Mail
                </div>
            @endif

            <div class="card-header text-center">
                <img src="../../images/img_grafis_verifikasi.svg" alt="" style="width: 90%;max-width:500px;">
            </div>
            <br>
            <div class="card-title text-center"
                style="font-family: 'Inter', sans-serif;font-size:20px;font-weight:bold;">
                Cek Email Sekarang
            </div>
            <br>
            <div style="display: flex; align-items: center;">
                <div style="font-family: 'Inter', sans-serif;font-size:16px;font-weight:400;color:#45484F;width:260px;">
                    Tidak
                    Mendapatkan Link
                    Verifikasi?</div>
                <form method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary"
                        style="background-color:white;border:none;font-family: 'Inter', sans-serif;font-size:16px;font-weight:400;color:#00CEE5;">Kirim
                        Ulang</button>
                </form>
            </div>

        </div>
    </section>

</body>
