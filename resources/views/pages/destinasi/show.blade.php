@extends('layouts.guest.app')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4">{{ $destinasi->nama }}</h2>

        <div class="row g-4">

            <div class="col-lg-6">
                <img src="{{ asset('assets/img/service-1.jpg') }}" class="img-fluid rounded">
            </div>

            <div class="col-lg-6">
                <h4 class="fw-bold">Informasi</h4>
                <p>{{ $destinasi->deskripsi }}</p>

                <ul class="list-group">
                    <li class="list-group-item"><strong>Alamat:</strong> {{ $destinasi->alamat }}</li>
                    <li class="list-group-item"><strong>RT / RW:</strong> {{ $destinasi->rt }} / {{ $destinasi->rw }}</li>
                    <li class="list-group-item"><strong>Jam Buka:</strong> {{ $destinasi->jam_buka }}</li>
                    <li class="list-group-item"><strong>Tiket:</strong>
                        Rp{{ number_format($destinasi->tiket, 0, ',', '.') }}</li>
                    <li class="list-group-item"><strong>Kontak:</strong> {{ $destinasi->kontak }}</li>
                </ul>

                <a href="{{ route('destinasi.index') }}" class="btn btn-secondary mt-3">Kembali</a>
            </div>

        </div>
    </div>
@endsection
