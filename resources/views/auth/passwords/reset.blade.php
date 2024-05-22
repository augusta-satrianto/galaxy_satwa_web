<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galaxy Satwa</title>
    <link rel="icon" type="image/png" href="../../images/logo/logo-icon.svg" />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/jquery-ui.css" />
    <link rel="stylesheet" href="../../css/jquery-ui.theme.css" />
    <link rel="stylesheet" href="../../css/apexcharts.css" />
    <link rel="stylesheet" href="../../css/chartist-plugin-tooltip.css" />
    <link rel="stylesheet" href="../../css/chartist.min.css" />
    <link rel="stylesheet" href="../../css/customfont.css" />
    <link rel="stylesheet" href="../../css/jquery-jvectormap-2.0.5.css" />
    <link rel="stylesheet" href="../../css/jquery-ui.theme.min.css" />
    <link rel="stylesheet" href="../../css/metisMenu.min.css" />
    <link rel="stylesheet" href="../../css/select2.min.css" />
    <link rel="stylesheet" href="../../css/simplebar.css" />
    <link rel="stylesheet" href="../../css/dragula.min.css" />
    <link rel="stylesheet" href="../../css/animate.min.css" />
    <link rel="stylesheet" href="../../css/app.min.css" />
    <link rel="stylesheet" href="../../css/style.css" />
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
            <br>
            <div style="font-family: 'Inter', sans-serif;font-size:30px;font-weight:bold;">
                Lupa Kata Sandi
            </div>
            <br>
            <div style="font-family: 'Inter', sans-serif;color:#6B7280;">
                Silahkan masukkan Kata Sandi Baru Anda
            </div>
            <br>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
                        readonly>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="fromGroup eye mb-3">
                    <label>Password</label>
                    <div
                        class="form-control-icon @error('password') is-invalid               
                    @enderror">
                        <input id="password-hide_show" name="password" class="form-control" type="password"
                            placeholder="Masukkan password" required autofocus value="{{ old('password') }}"
                            autocomplete="off">
                        <div class="has-badge">
                            <i class="ph-eye"></i>
                        </div>
                    </div>
                    @error('password')
                        <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="fromGroup eye mb-3 abc">
                    <label>Konfirmasi Password</label>
                    <div
                        class="form-control-icon @error('password-confirm') is-invalid               
                    @enderror">
                        <input id="confirmpassword" name="password_confirmation" class="form-control" type="password"
                            placeholder="Masukkan ulang password" required autofocus
                            value="{{ old('password-confirm') }}" autocomplete="off">
                        <div class="has-badge">
                            <i class="ph-eye"></i>
                        </div>
                    </div>
                    @error('password-confirm')
                        <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <br>



                <button type="submit" class="btn btn-primary">
                    Perbarui Password
                </button>
            </form>

        </div>
    </section>

    <!-- scripts -->
    <script>
        const passwordInput = document.getElementById('confirmpassword');
        const toggleButton = document.querySelector('.abc i');

        toggleButton.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            toggleButton.classList.toggle('ph-eye');
            toggleButton.classList.toggle('ph-eye-slash');
        });
    </script>
    <script src="../../js/jquery-3.6.0.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/tippy-bundle.umd.min.js"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../js/apexcharts.min.js"></script>
    <script src="../../js/chartist.min.js"></script>
    <script src="../../js/jquery-jvectormap-2.0.5.min.js"></script>
    <script src="../../js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../../js/metisMenu.min.js"></script>
    <script src="../../js/morris.min.js"></script>
    <script src="../../js/select2.min.js"></script>
    <script src="../../js/simplebar.min.js"></script>
    <script src="../../js/moment.min.js"></script>
    <script src="../../js/jquery-ui.min.js"></script>
    <script src="https://unpkg.com/phosphor-icons"></script>
    <script src="../../js/custom-select.js"></script>
    <script src="../../js/waves.js"></script>
    <script src="../../js/dragula.min.js"></script>
    <script src="../../js/appkanban.js"></script>
    <script src="../../js/app.js"></script>

</body>
