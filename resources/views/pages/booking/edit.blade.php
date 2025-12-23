@extends('layouts.guest.app')

@section('content')

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Contact Us</h1>
                <ol class="breadcrumb justify-content-center text-white mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-white">Pages</a></li>
                    <li class="breadcrumb-item active text-secondary">Edit Booking Homestay</li>
                </ol>
        </div>
    </div>
    <!-- Header End -->

    <div class="container py-5">

        {{-- ERROR --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('booking.update', $booking) }}" method="POST" enctype="multipart/form-data" class="card shadow-sm p-4">
            @csrf
            @method('PUT')

            <div class="row g-3">

                {{-- KAMAR --}}
                <div class="col-md-6">
                    <label class="form-label">Kamar</label>
                    <select name="kamar_id" class="form-control">
                        <option value="">-- Pilih Kamar --</option>
                        @foreach ($kamar as $k)
                            <option value="{{ $k->kamar_id }}"
                                {{ old('kamar_id', $booking->kamar_id) == $k->kamar_id ? 'selected' : '' }}>
                                {{ $k->nama_kamar }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- WARGA --}}
                <div class="col-md-6">
                    <label class="form-label">Warga</label>
                    <select name="warga_id" class="form-control">
                        <option value="">-- Pilih Warga --</option>
                        @foreach ($warga as $w)
                            <option value="{{ $w->warga_id }}"
                                {{ old('warga_id', $booking->warga_id) == $w->warga_id ? 'selected' : '' }}>
                                {{ $w->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- CHECKIN --}}
                <div class="col-md-6">
                    <label class="form-label">Check-in</label>
                    <input type="date" name="checkin" class="form-control"
                        value="{{ old('checkin', $booking->checkin->format('Y-m-d')) }}">
                </div>

                {{-- CHECKOUT --}}
                <div class="col-md-6">
                    <label class="form-label">Check-out</label>
                    <input type="date" name="checkout" class="form-control"
                        value="{{ old('checkout', $booking->checkout->format('Y-m-d')) }}">
                </div>

                {{-- TOTAL --}}
                <div class="col-md-4">
                    <label class="form-label">Total Pembayaran</label>
                    <input type="number" name="total" class="form-control" value="{{ old('total', $booking->total) }}">
                </div>

                {{-- STATUS --}}
                <div class="col-md-4">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="pending" {{ old('status', $booking->status) == 'pending' ? 'selected' : '' }}>
                            Pending</option>
                        <option value="paid" {{ old('status', $booking->status) == 'paid' ? 'selected' : '' }}>Paid
                        </option>
                        <option value="cancel" {{ old('status', $booking->status) == 'cancel' ? 'selected' : '' }}>Cancel
                        </option>
                    </select>
                </div>

                {{-- METODE BAYAR --}}
                <div class="col-md-4">
                    <label class="form-label">Metode Pembayaran</label>
                    <select name="metode_bayar" class="form-control">
                        <option value="transfer"
                            {{ old('metode_bayar', $booking->metode_bayar) == 'transfer' ? 'selected' : '' }}>Transfer
                        </option>
                        <option value="cash"
                            {{ old('metode_bayar', $booking->metode_bayar) == 'cash' ? 'selected' : '' }}>Cash</option>
                        <option value="qris"
                            {{ old('metode_bayar', $booking->metode_bayar) == 'qris' ? 'selected' : '' }}>QRIS</option>
                    </select>
                </div>

                {{-- BUKTI PEMBAYARAN --}}
                <div class="col-md-6">
                    <label class="form-label">Bukti Pembayaran</label>
                    <input type="file" name="bukti" class="form-control">

                    @if ($booking->media->count())
                        <img src="{{ asset('storage/' . $booking->media->first()->file_name) }}"
                            class="img-fluid mt-2 rounded" style="max-height:200px">
                    @endif
                </div>

                <div class="col-12 text-end">
                    <button class="btn btn-primary px-4">Update Booking</button>
                    <a href="{{ route('booking.index') }}" class="btn btn-secondary">Kembali</a>
                </div>

            </div>
        </form>

    </div>
@endsection
