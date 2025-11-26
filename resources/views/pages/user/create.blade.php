<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* ===== Background sama seperti LOGIN (warna + bubble) ===== */
        body {
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #d1d5db;
            font-family: 'Poppins', sans-serif;
            position: relative;
        }

        body::before,
        body::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: #ffffff;
            opacity: 0.15;
            z-index: 0;
        }

        body::before {
            width: 280px;
            height: 280px;
            top: -80px;
            left: -60px;
        }

        body::after {
            width: 250px;
            height: 250px;
            bottom: -70px;
            right: -50px;
        }

        /* ===== Register Card (Tema EXACT sama Login) ===== */
        .register-card {
            position: relative;
            z-index: 2;
            width: 420px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(6px);
            border-radius: 20px;
            padding: 2.4rem;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.18);
            border: 1px solid rgba(255, 255, 255, 0.4);
            transition: 0.35s ease;
        }

        .register-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 14px 32px rgba(0, 0, 0, 0.22);
        }

        .form-label {
            font-weight: 600;
            color: #374151;
        }

        .form-control {
            border-radius: 12px;
            padding: 11px 14px;
            border: 1px solid #d1d5db;
            transition: .3s ease;
        }

        .form-control:focus {
            border-color: #1e40af;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.2);
        }

        /* ===== Button sama dengan Login ===== */
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

        .footer-text {
            opacity: 0.85;
            letter-spacing: .3px;
        }
    </style>
</head>

<body>

    <div class="register-card">

        <div class="text-center mb-4">
            <img src="{{ asset('Assets/img/brand-logo.png') }}" width="75" class="mb-3">
            <h3 class="fw-bold text-primary">Create Account</h3>
            <p class="text-muted small">Buat akun baru untuk melanjutkan.</p>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                    placeholder="Masukkan nama lengkap...">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                    placeholder="Masukkan email...">
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password...">
            </div>

            <div class="mb-3">
                <label class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control"
                    placeholder="Ulangi password...">
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-2">Buat Akun</button>
        </form>

        <p class="text-center mt-4 small">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="fw-semibold text-primary">Masuk di sini</a>
        </p>

        <p class="text-center text-muted small footer-text">
            © {{ date('Y') }} Ricardo — All rights reserved.
        </p>

    </div>

</body>

</html>
