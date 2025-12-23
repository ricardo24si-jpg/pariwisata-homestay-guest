@extends('layouts.guest.app')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">User</h1>
                <ol class="breadcrumb justify-content-center text-white mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-white">Pages</a></li>
                    <li class="breadcrumb-item active text-secondary">User</li>
                </ol>
        </div>
    </div>
    <!-- Header End -->

    {{-- FILTER & SEARCH (SAMA SEPERTI WARGA) --}}
    <div class="container mb-4">

        <form method="GET" class="card shadow-sm p-4 border-0 rounded-4">

            <style>
                .filter-label {
                    font-weight: 600;
                    font-size: 14px;
                    margin-bottom: 4px;
                }

                .filter-input {
                    border-radius: 12px;
                    padding: 10px 14px;
                }

                .btn-search {
                    border-radius: 12px;
                    padding: 10px;
                    font-weight: 600;
                }
            </style>

            <div class="row g-3 align-items-end">

                {{-- Search --}}
                <div class="col-md-5">
                    <label class="filter-label">Pencarian</label>
                    <input type="text" name="search" class="form-control filter-input"
                        placeholder="Cari nama / email..." value="{{ request('search') }}">
                </div>

                {{-- Role --}}
                <div class="col-md-3">
                    <label class="filter-label">Role</label>
                    <select name="role" class="form-control filter-input">
                        <option value="">Semua</option>
                        <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="warga" {{ request('role') == 'warga' ? 'selected' : '' }}>Warga</option>
                        <option value="mitra" {{ request('role') == 'mitra' ? 'selected' : '' }}>Mitra</option>
                    </select>
                </div>

                {{-- Jenis Kelamin --}}
                <div class="col-md-3">
                    <label class="filter-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control filter-input">
                        <option value="">Semua</option>
                        <option value="Laki-laki" {{ request('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                        </option>
                        <option value="Perempuan" {{ request('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan
                        </option>
                    </select>
                </div>

                {{-- Tombol Search --}}
                <div class="col-md-1 d-grid">
                    <button class="btn btn-primary btn-search">
                        <i class="fa fa-search"></i>
                    </button>
                </div>

            </div>
        </form>

    </div>

    <div class="container py-4 user-section">
        @include('layouts.guest.alerts')

        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('users.create') }}" class="btn btn-gradient">
                <i class="fa fa-plus"></i> Tambah User
            </a>
        </div>

        {{-- CARD USER --}}
        <div class="row g-4">
            @forelse($users as $user)
                <div class="col-md-4 col-sm-6">
                    <div class="user-card text-center p-4 shadow rounded-4">

                        <div class="avatar mb-3">
                            @if ($user->profileMedia)
                                <img src="{{ asset('storage/' . $user->profileMedia->file_name) }}" width="100"
                                    height="100" class="rounded-circle shadow-sm" style="object-fit: cover;">
                            @else
                                <img src="{{ asset('assets/img/avatar-placeholder.jpeg') }}" width="100" height="100"
                                    class="rounded-circle shadow-sm" style="object-fit: cover;">
                            @endif
                        </div>

                        <div class="user-name fw-bold fs-5">{{ $user->name }}</div>
                        <div class="user-email text-muted small mb-2">{{ $user->email }}</div>

                        {{-- Info kecil --}}
                        @if ($user->role)
                            <div class="badge bg-primary rounded-pill px-3 mb-2">{{ ucfirst($user->role) }}</div>
                        @endif
                        {{-- Role --}}
                        @if ($user->role)
                            <div class="badge bg-primary rounded-pill px-3 mb-2">{{ ucfirst($user->role) }}</div>
                        @endif

                        {{-- Aksi --}}
                        <div class="action-btns mt-3 d-flex justify-content-center gap-2">
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-sm rounded-pill px-3">
                                <i class="fa fa-edit"></i>
                            </a>

                            <form action="{{ route('users.destroy', $user) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm rounded-pill px-3"
                                    onclick="return confirm('Yakin ingin menghapus user ini?')">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-4">
                    <i class="bi bi-person-x fs-3"></i><br>
                    Belum ada user
                </div>
            @endforelse
        </div>

        {{-- PAGINATION --}}
        <div class="mt-3">
            {{ $users->links('pagination::bootstrap-5') }}
        </div>

    </div>
@endsection
