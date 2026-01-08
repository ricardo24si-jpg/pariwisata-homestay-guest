<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

    <style>
        /* ===== Background breadcrumb sama dengan Destination ===== */
        .bg-breadcrumb {
            background: linear-gradient(rgba(15, 23, 42, 0.7), rgba(15, 23, 42, 0.7)),
                url('{{ asset('assets/img/breadcrumb.jpg') }}');
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }

        /* ===== Login Card Premium ===== */
        .login-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(6px);
            border-radius: 20px;
            padding: 2.4rem;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.18);
            border: 1px solid rgba(255, 255, 255, 0.4);
            transition: 0.35s ease;
        }

        .login-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 14px 32px rgba(0, 0, 0, 0.22);
        }

        .form-control {
            border-radius: 12px !important;
            padding: 11px 14px;
            border: 1px solid #d1d5db;
            transition: 0.3s ease;
        }

        .form-control:focus {
            border-color: #1e40af;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.2);
        }

        .btn-primary {
            border-radius: 50px;
            padding: 11px 0;
            font-weight: 600;
            background: #2563eb;
            border: none;
            transition: 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background: #1e40af;
            transform: translateY(-2px);
        }

        .google-btn {
            background: white;
            border: 1px solid #ddd;
            border-radius: 50px;
            padding: 11px 0;
            font-weight: 600;
            transition: 0.3s ease;
        }

        .google-btn:hover {
            background: #f3f4f6;
            border-color: #ccc;
        }

        .google-btn img {
            width: 22px;
            margin-right: 10px;
        }

        .footer-text {
            opacity: 0.85;
            letter-spacing: 0.3px;
        }
    </style>
</head>

<body>

    <!-- ===== Header (sama seperti Destination) ===== -->


    <!-- ===== Login Form ===== -->
    <div class="container py-5">
        <div class="row justify-content-center">

            <div class="col-md-5">

                <div class="login-card animate__animated animate__fadeInUp">

                    <div class="text-center mb-4">
                        <img src="{{ asset('assets/img/brand-logo.png') }}" width="340" class="mb-2">

                        <h3 class="fw-bold text-primary mb-1">Hello Again!</h3>
                        <p class="text-muted small mb-0">
                            Silakan masuk untuk melanjutkan ke akun Anda.
                        </p>
                    </div>

                    @include('layouts.guest.alerts')

                    <form action="{{ route('login.post') }}" method="POST" >
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                placeholder="Masukkan email...">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Password</label>
                            <input type="password" class="form-control" name="password"
                                placeholder="Masukkan password...">
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mt-2">Login</button>

                        <button type="button"
                            class="google-btn w-100 d-flex justify-content-center align-items-center mt-3">
                            <img src="https://www.svgrepo.com/show/355037/google.svg"> Masuk dengan Google
                        </button>

                    </form>

                    <p class="text-center mt-4">
                        Belum punya akun?
                        <a href="{{ route('users.create') }}" class="fw-semibold text-primary">Daftar Sekarang</a>
                    </p>

                    <p class="text-center text-muted small footer-text">
                        © {{ date('Y') }} Ricardo — All rights reserved.
                    </p>

                </div>

            </div>

        </div>
    </div>

</body>

</html>
