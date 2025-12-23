@extends('layouts.guest.app')

@section('content')

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Homestay</h3>
        <ol class="breadcrumb justify-content-center text-white mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="#" class="text-white">Home</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-white">Pages</a></li>
            <li class="breadcrumb-item active text-secondary">Homestay</li>
        </ol>
    </div>
</div>
<!-- Header End -->

<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">

        <!-- Search & Filter -->
        <form method="GET" class="card shadow-sm p-4 border-0 rounded-4 mb-4">
            <div class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label class="filter-label">Search</label>
                    <input type="text" name="search" class="form-control filter-input"
                        placeholder="Cari nama/alamat..." value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <label class="filter-label">Status</label>
                    <select name="status" class="form-select filter-input">
                        <option value="">Semua</option>
                        <option value="tersedia" {{ request('status') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="penuh" {{ request('status') == 'penuh' ? 'selected' : '' }}>Penuh</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="filter-label">RT</label>
                    <input type="text" name="rt" class="form-control filter-input" value="{{ request('rt') }}">
                </div>
                <div class="col-md-2">
                    <label class="filter-label">RW</label>
                    <input type="text" name="rw" class="form-control filter-input" value="{{ request('rw') }}">
                </div>
                <div class="col-md-1 d-grid">
                    <button class="btn btn-primary btn-search">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <a href="{{ route('homestay.create') }}" class="btn btn-secondary mb-4">
            <i class="fa fa-plus"></i> Tambah Homestay
        </a>

        <!-- Flash Alerts -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if ($homestays->isEmpty())
            <div class="text-center text-muted py-5">
                <i class="fa fa-info-circle fa-2x mb-2"></i>
                <p>Belum ada data homestay.</p>
            </div>
        @else
            <div class="row g-4">
                @foreach ($homestays as $homestay)
                    <div class="col-md-6 col-lg-4">
                        <div class="homestay-card">

                            <!-- Gambar -->
                            <div class="homestay-img">
                                <img src="{{ asset('Assets/img/Homestay2.jpeg') }}">
                                <div class="img-overlay"></div>
                            </div>

                            <!-- Lokasi -->
                            <div class="location-bar">
                                <div class="location-item">
                                    <i class="fa fa-location-dot"></i>
                                    {{ $homestay->alamat ?? '-' }}
                                </div>
                                <div class="location-item">
                                    RT {{ $homestay->rt }} / RW {{ $homestay->rw }}
                                </div>
                            </div>

                            <!-- Body -->
                            <div class="card-body text-center">

                                <h5 class="homestay-title">{{ $homestay->nama }}</h5>

                                <!-- Harga -->
                                <h4 class="text-success fw-bold">
                                    Rp {{ number_format($homestay->harga_per_malam, 0, ',', '.') }}
                                    <span class="text-muted" style="font-size: 14px">/ malam</span>
                                </h4>

                                <!-- Status -->
                                <p class="mt-2">
                                    @if ($homestay->status === 'tersedia')
                                        <span class="badge bg-success px-3 py-2">Tersedia</span>
                                    @else
                                        <span class="badge bg-danger px-3 py-2">Penuh</span>
                                    @endif
                                </p>

                                <!-- Fasilitas -->
                                <div class="mb-3">
                                    <strong class="d-block mb-1">Fasilitas:</strong>
                                    @php
                                        $fasilitas = is_string($homestay->fasilitas_json)
                                            ? json_decode($homestay->fasilitas_json, true)
                                            : $homestay->fasilitas_json;
                                    @endphp
                                    @if (is_array($fasilitas))
                                        @foreach ($fasilitas as $f)
                                            <span class="facility-chip">{{ $f }}</span>
                                        @endforeach
                                    @else
                                        <span class="text-muted">Tidak ada data</span>
                                    @endif
                                </div>

                                <!-- Action Buttons -->
                                <div class="d-flex justify-content-center gap-2 mb-3">
                                    <a href="{{ route('homestay.edit', $homestay) }}"
                                        class="btn btn-sm btn-outline-warning rounded-pill">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form action="{{ route('homestay.destroy', $homestay->homestay_id) }}"
                                        method="POST" onsubmit="return confirm('Yakin ingin menghapus homestay ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger rounded-pill">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>

                                <!-- Tombol CTA -->
                                <div class="d-flex justify-content-center gap-3">
                                    <a href="" class="btn btn-outline-primary btn-pill">Detail</a>

                                    @if ($homestay->status === 'penuh')
                                        <button class="btn btn-secondary btn-pill" disabled title="Homestay sedang penuh">
                                            Book Now
                                        </button>
                                    @else
                                        <a href="{{ route('homestay.book', $homestay) }}" class="btn btn-primary btn-pill">
                                            Book Now
                                        </a>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="mt-3">
            {{ $homestays->links('pagination::bootstrap-5') }}
        </div>

    </div>
</div>

<style>
    .homestay-card {
        border-radius: 18px;
        overflow: hidden;
        background: #fff;
        transition: .35s ease;
        border: none;
        box-shadow: 0 8px 22px rgba(0, 0, 0, 0.08);
    }
    .homestay-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 14px 32px rgba(0, 0, 0, 0.15);
    }
    .homestay-img { position: relative; height: 220px; overflow: hidden; }
    .homestay-img img { width: 100%; height: 100%; object-fit: cover; transition: .4s; }
    .homestay-card:hover .homestay-img img { transform: scale(1.08); }
    .img-overlay { position: absolute; inset: 0; background: linear-gradient(to bottom, rgba(0,0,0,0.1), rgba(0,0,0,0.55)); }
    .location-bar { background: #f9fafb; display: flex; justify-content: space-between; padding: 10px 14px; font-size: 13px; color: #4b5563; border-top: 1px solid #f1f1f1; }
    .location-item i { color: #2563eb; }
    .homestay-title { font-weight: 700; font-size: 20px; color: #1e40af; margin-bottom: 6px; }
    .facility-chip { background: #eef2ff; border: 1px solid #dbeafe; color: #1e3a8a; padding: 4px 10px; border-radius: 25px; font-size: 12px; display: inline-block; margin: 2px; }
    .btn-pill { border-radius: 50px; padding: 8px 24px; font-weight: 600; }
    .filter-label { font-weight: 600; font-size: 14px; margin-bottom: 4px; }
    .filter-input { border-radius: 12px !important; padding: 10px 14px; }
    .btn-search { border-radius: 12px; padding: 10px; font-weight: 600; }
</style>

@endsection
