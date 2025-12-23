@extends('layouts.guest.app')

@section('content')

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Kamar</h1>
                <ol class="breadcrumb justify-content-center text-white mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-white">Pages</a></li>
                    <li class="breadcrumb-item active text-secondary">Kamar</li>
                </ol>
        </div>
    </div>
    <!-- Header End -->

    {{-- FILTER & SEARCH --}}
    {{-- FILTER & SEARCH (SAMA STYLE DENGAN USER) --}}
    <div class="container mb-4">

        <form method="GET" class="card shadow-sm p-4 border-0 rounded-4">

            <style>
                .filter-label {
                    font-weight: 600;
                    font-size: 14px;
                    margin-bottom: 4px;
                }

                .filter-input {
                    border-radius: 12px !important;
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
                        placeholder="Cari kamar / harga / fasilitas..." value="{{ request('search') }}">
                </div>

                {{-- Homestay --}}
                <div class="col-md-3">
                    <label class="filter-label">Homestay</label>
                    <select name="homestay_id" class="form-control filter-input">
                        <option value="">Semua Homestay</option>
                        @foreach ($homestays as $hst)
                            <option value="{{ $hst->homestay_id }}"
                                {{ request('homestay_id') == $hst->homestay_id ? 'selected' : '' }}>
                                {{ $hst->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Kapasitas --}}
                <div class="col-md-3">
                    <label class="filter-label">Kapasitas</label>
                    <select name="kapasitas" class="form-control filter-input">
                        <option value="">Semua</option>
                        @for ($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}" {{ request('kapasitas') == $i ? 'selected' : '' }}>
                                {{ $i }} Orang
                            </option>
                        @endfor
                    </select>
                </div>

                {{-- Tombol --}}
                <div class="col-md-1 d-grid">
                    <button class="btn btn-primary btn-search">
                        <i class="fa fa-search"></i>
                    </button>
                </div>

            </div>
        </form>

    </div>



    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <a href="{{ route('kamar.create') }}" class="btn btn-secondary mb-4">
                <i class="fa fa-plus"></i> Tambah Kamar
            </a>

            @include('layouts.guest.alerts')

            @if ($kamars->isEmpty())
                <div class="text-center text-muted py-5">
                    <i class="fa fa-info-circle fa-2x mb-2"></i>
                    <p>Belum ada data kamar.</p>
                </div>
            @else
                <div class="row g-4">
                    @forelse($kamars as $kamar)
                        <div class="col-md-4 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="hotel-card shadow-sm rounded-4 overflow-hidden h-100 position-relative">

                                {{-- Lokasi Homestay --}}
                                <div class="lokasi-badge">
                                    <i class="fa fa-location-dot me-1"></i>
                                    {{ $kamar->homestay->nama ?? 'Lokasi' }}
                                </div>

                                {{-- Gambar --}}
                                <div class="hotel-img position-relative">
                                    <img src="{{ asset('Assets/img/kamar.jpeg') }}" class="img-fluid w-100"
                                        style="height: 180px; object-fit: cover;">
                                </div>

                                <div class="p-3">

                                    {{-- Nama Kamar --}}
                                    <h5 class="fw-bold text-dark mb-1">{{ $kamar->nama_kamar }}</h5>

                                    {{-- Rating + Ulasan (dummy bisa diganti nanti) --}}

                                    {{-- Harga Coret --}}

                                    {{-- Harga Promo --}}
                                    <p class="text-danger fw-bold h5">
                                        Rp {{ number_format($kamar->harga, 0, ',', '.') }}
                                    </p>

                                    {{-- Info Kamar --}}
                                    <p class="text-muted small mb-2">
                                        Kapasitas: {{ $kamar->kapasitas }} orang
                                    </p>

                                    {{-- Fasilitas --}}
                                    @php
                                        $fasilitas = $kamar->fasilitas_json;
                                    @endphp

                                    @if (is_array($fasilitas) && count($fasilitas) > 0)
                                        <div class="mb-3" style="max-height: 85px; overflow-y: auto;">
                                            @foreach ($fasilitas as $item)
                                                @if (is_string($item))
                                                    <div class="d-flex align-items-center mb-1">
                                                        <span class="badge bg-success rounded-circle me-2"
                                                            style="width: 10px; height: 10px;"></span>
                                                        <small class="text-secondary">{{ $item }}</small>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif


                                    {{-- Booking info --}}

                                    {{-- Tombol --}}
                                    <div class="d-flex justify-content-start gap-2">
                                        <a href="{{ route('kamar.edit', $kamar->kamar_id) }}"
                                            class="btn btn-outline-warning btn-sm rounded-pill px-3">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <form action="{{ route('kamar.destroy', $kamar->kamar_id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus kamar ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-5">
                            <h5 class="text-muted">Belum ada data kamar homestay.</h5>
                        </div>
                    @endforelse
                </div>
            @endif

            {{-- PAGINATION --}}
            <div class="mt-3">
                {{ $kamars->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </div>

    <style>
        .hotel-card {
            background: #fff;
            border-radius: 14px;
            border: 1px solid #eaeaea;
            transition: 0.2s ease;
        }

        .hotel-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.12);
        }

        /* Lokasi */
        .lokasi-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            background: #0d6efd;
            padding: 4px 10px;
            border-radius: 8px;
            color: #fff;
            font-size: 12px;
            z-index: 20;
        }

        /* Save badge */
        .save-badge {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background: #ff6f2c;
            color: #fff;
            padding: 4px 10px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 12px;
        }

        /* Scrollbar fasilitas */
        ul::-webkit-scrollbar {
            width: 6px;
        }

        ul::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 10px;
        }
    </style>


@endsection
