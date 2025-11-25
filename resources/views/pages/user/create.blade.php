<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #a3a467; /* warna solid sesuai permintaan */
            font-family: 'Poppins', sans-serif;
        }

        /* efek lembut di background agar tidak datar */
        body::before, body::after {
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

        .register-card {
            position: relative;
            z-index: 1;
            width: 420px;
            background: rgba(255, 255, 255, 0.97);
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.25);
            padding: 2.5rem;
            animation: fadeIn 0.6s ease;
        }

        .register-card h3 {
            text-align: center;
            margin-bottom: 1.5rem;
            font-weight: 700;
            color: #1e3a8a;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .form-label {
            font-weight: 500;
            color: #374151;
        }

        .form-control {
            border-radius: 10px;
            padding: 10px 14px;
        }

        .btn-primary {
            background: #2563eb;
            border: none;
            border-radius: 10px;
            padding: 10px 0;
            font-weight: 600;
            transition: background 0.3s;
        }

        .btn-primary:hover {
            background: #1e40af;
        }

        .alert {
            border-radius: 10px;
        }

        .register-card p {
            text-align: center;
            font-size: 0.9rem;
            margin-top: 1rem;
        }

        .register-card a {
            color: #2563eb;
            text-decoration: none;
        }

        .register-card a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="register-card">
    <h3>REGISTER</h3>

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
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Masukkan nama...">
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Masukkan email...">
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Masukkan password...">
        </div>

        <div class="mb-3">
            <label class="form-label">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password...">
        </div>

        <button type="submit" class="btn btn-primary w-100">Daftar</button>
    </form>

    <p class="text-center mt-3 small">
        Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
    </p>
</div>

</body>
</html>
