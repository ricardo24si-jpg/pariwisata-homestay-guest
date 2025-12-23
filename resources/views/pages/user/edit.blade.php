@extends('layouts.guest.app')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Edit User</h1>
                <ol class="breadcrumb justify-content-center text-white mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-white">Pages</a></li>
                    <li class="breadcrumb-item active text-secondary">Edit User</li>
                </ol>
        </div>
    </div>
    <!-- Header End -->

    <div class="container py-5">
        <h2>Edit User</h2>
        <form action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')

            @include('layouts.guest.alerts')

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label>Password (isi jika ingin ubah)</label>
                <input type="password" name="password" class="form-control">
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Role</label>
                <select name="role" class="form-control">
                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="warga" {{ old('role', $user->role) == 'warga' ? 'selected' : '' }}>Warga</option>
                    <option value="mitra" {{ old('role', $user->role) == 'mitra' ? 'selected' : '' }}>Mitra</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Foto Profil</label>

                @if ($user->profileMedia)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $user->profileMedia->file_name) }}" width="80" height="80"
                            class="rounded-circle" style="object-fit: cover;">
                    </div>
                @endif

                <input type="file" name="profile_picture" class="form-control">
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
