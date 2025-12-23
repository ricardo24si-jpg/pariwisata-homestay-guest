@extends('layouts.guest.app')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Contact Us</h1>
                <ol class="breadcrumb justify-content-center text-white mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-white">Pages</a></li>
                    <li class="breadcrumb-item active text-secondary">Detail Booking Homestay</li>
                </ol>
        </div>
    </div>
    <!-- Header End -->
    
    <div class="container py-5">

        <div class="row g-4 align-items-start">

            {{-- INFORMASI (KIRI) --}}
            <div class="col-lg-6">
                <h4 class="fw-bold mb-3">Informasi Booking</h4>

                <ul class="list-group">
                    <li class="list-group-item">
                        <strong>Warga:</strong> {{ $booking->warga->nama }}
                    </li>
                    <li class="list-group-item">
                        <strong>Kamar:</strong> {{ $booking->kamar->nama_kamar }}
                    </li>
                    <li class="list-group-item">
                        <strong>Check-in:</strong> {{ $booking->checkin->format('d M Y') }}
                    </li>
                    <li class="list-group-item">
                        <strong>Check-out:</strong> {{ $booking->checkout->format('d M Y') }}
                    </li>
                    <li class="list-group-item">
                        <strong>Total:</strong>
                        Rp {{ number_format($booking->total, 0, ',', '.') }}
                    </li>
                    <li class="list-group-item">
                        <strong>Status:</strong> {{ ucfirst($booking->status) }}
                    </li>
                    <li class="list-group-item">
                        <strong>Metode Bayar:</strong> {{ ucfirst($booking->metode_bayar) }}
                    </li>
                </ul>

                <a href="{{ route('booking.index') }}" class="btn btn-secondary mt-3">
                    Kembali
                </a>
            </div>

            {{-- FOTO BUKTI (KANAN) --}}
            <div class="col-lg-6 text-center">
                <h4 class="fw-bold mb-3">Bukti Pembayaran</h4>

                @if ($booking->media->count())
                    @foreach ($booking->media as $media)
                        <img src="{{ asset('storage/' . $media->file_name) }}" alt="Bukti Pembayaran"
                            class="img-fluid rounded mb-3" style="max-width: 400px;">
                    @endforeach
                @else
                    <p class="text-muted">Belum ada bukti pembayaran.</p>
                @endif
            </div>

        </div>
    </div>
@endsection
