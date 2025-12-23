@extends('layouts.guest.app')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Contact Us</h1>
                <ol class="breadcrumb justify-content-center text-white mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-white">Pages</a></li>
                    <li class="breadcrumb-item active text-secondary">Booking Homestay</li>
                </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Contact Start -->
    <div class="container py-5">

        <div class="d-flex justify-content-between mb-4">
            <a href="{{ route('booking.create') }}" class="btn btn-primary">Tambah Booking</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row g-4">
            @foreach ($booking as $b)
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm h-100">

                        <div class="card-body">
                            <h5 class="fw-bold mb-1">{{ $b->kamar->nama_kamar }}</h5>
                            <p class="text-muted small mb-3">
                                {{ $b->warga->nama }}
                            </p>

                            <ul class="list-unstyled mb-3">
                                <li><strong>Check-in:</strong> {{ $b->checkin->format('d M Y') }}</li>
                                <li><strong>Check-out:</strong> {{ $b->checkout->format('d M Y') }}</li>
                                <li><strong>Total:</strong> Rp {{ number_format($b->total, 0, ',', '.') }}</li>
                            </ul>

                            {{-- STATUS --}}
                            <span
                                class="badge
                            {{ $b->status == 'paid' ? 'bg-success' : '' }}
                            {{ $b->status == 'pending' ? 'bg-warning text-dark' : '' }}
                            {{ $b->status == 'cancel' ? 'bg-danger' : '' }}">
                                {{ ucfirst($b->status) }}
                            </span>
                        </div>

                        <div class="card-footer bg-light d-flex gap-2">
                            <a href="{{ route('booking.show', $b) }}" class="btn btn-info btn-sm w-100">
                                Detail
                            </a>
                            <a href="{{ route('booking.edit', $b) }}" class="btn btn-warning btn-sm w-100">
                                Edit
                            </a>
                            <form action="{{ route('booking.destroy', $b) }}" method="POST" class="w-100">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Hapus booking ini?')" class="btn btn-danger btn-sm w-100">
                                    Hapus
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

    </div>
    <!-- Contact End -->
@endsection
