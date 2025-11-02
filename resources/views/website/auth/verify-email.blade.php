<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>SILAKSA - Fakultas Hukum</title>
        <meta content="Sistem Informasi Pelayanan Administrasi Terpadu Civitas Akamedik" name="description">
        <meta content="Sistem Informasi Pelayanan Administrasi Terpadu Civitas Akamedik" name="keywords">

        @include('website.partials.style')
        <style>
            :root {
                --primary-color: #4154f1;
            }
            html, body {
                height: 100%;
                margin: 0;
                background-color: #f8f9fa;
            }
            .login-container {
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
            }
            .login-form {
                width: 100%;
                max-width: 400px;
                padding: 20px;
                background-color: white;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
            .btn-primary {
                background-color: var(--primary-color);
                border-color: var(--primary-color);
            }
            .btn-primary:hover {
                background-color: #2f41d1;
                border-color: #2f41d1;
            }
            .logo span {
                font-size: 30px;
                font-weight: 700;
                letter-spacing: 1px;
                color: #012970;
                font-family: "Nunito", sans-serif;
                margin-top: 3px;
            }
            .logo img {
                max-height: 40px;
                margin-right: 6px;
            }
            a {
                color: var(--primary-color);
                text-decoration: none;
            }
            a:hover {
                text-decoration: underline;
            }
            .invalid-feedback {
                display: block;
                font-size: 0.875em;
                color: #dc3545;
            }
            .intro-text {
                text-align: center;
                margin-bottom: 20px;
                font-size: 1rem;
                color: #444;
            }
            .intro-text h4 {
                font-size: 1.25rem;
                font-weight: 600;
                color: #012970;
                margin-bottom: 10px;
            }
            .intro-text p {
                margin: 0;
                font-size: 0.9rem;
                line-height: 1.5;
            }
        </style>
    </head>
    <body>
        <div class="login-container">
            <div class="login-form">
                <a href="{{ route('index') }}" class="logo d-flex align-items-center justify-content-center mb-2">
                    <img src="{{ asset('website/img/logo-upn.png') }}" alt="logo upn">
                    <span>SILAKSA</span>
                </a>

                <div class="intro-text">
                    <p>Terima kasih telah melakukan registrasi, silahkan periksa email anda untuk verifikasi</p>
                </div>

                <form action="{{ route('verification.send') }}" method="POST">
                    @csrf
                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary">Kirim Ulang Email Verifikasi</button>
                    </div>

                    <div class="text-center">
                        <p><a href="{{ route('logout') }}">Keluar</a></p>
                    </div>
                </form>
            </div>
        </div>

        @include('website.partials.script')
    </body>
</html>