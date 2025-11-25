@extends('layouts.guest.app')

@section('content')

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Edir Kamar</h1>
                <ol class="breadcrumb justify-content-center text-white mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-white">Pages</a></li>
                    <li class="breadcrumb-item active text-secondary">Edit Kamar</li>
                </ol>
        </div>
    </div>
    <!-- Header End -->

    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="booking p-5 rounded-4 shadow-lg"
                style="background: #FFF;
                    backdrop-filter: blur(10px);
                    border: 1px solid rgba(104, 104, 104, 0.08);
                    border-radius: 20px;">

                <div class="text-center mb-4">
                    <h2 class="fw-bold text-gradient mb-3">Edit Data Kamar Homestay</h2>
                    <p class="text-light-50 mb-0">Perbarui data kamar sesuai kebutuhan</p>
                </div>

                @include('layouts.guest.alerts')

                <form action="{{ route('kamar.update', $kamar->kamar_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">

                        {{-- Homestay --}}
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select name="homestay_id"
                                    class="form-select input-glass @error('homestay_id') is-invalid @enderror">
                                    <option value="">Pilih Homestay</option>
                                    @foreach ($homestays as $h)
                                        <option value="{{ $h->homestay_id }}"
                                            {{ old('homestay_id', $kamar->homestay_id) == $h->homestay_id ? 'selected' : '' }}>
                                            {{ $h->nama_homestay }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="homestay_id">Homestay</label>
                                @error('homestay_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- Nama Kamar --}}
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="nama_kamar" value="{{ old('nama_kamar', $kamar->nama_kamar) }}"
                                    class="form-select input-glass @error('nama_kamar') is-invalid @enderror" required>
                                <label>Nama Kamar</label>
                                @error('nama_kamar')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- Kapasitas --}}
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="number" name="kapasitas" value="{{ old('kapasitas', $kamar->kapasitas) }}"
                                    class="form-select input-glass @error('kapasitas') is-invalid @enderror" required>
                                <label>Kapasitas</label>
                                @error('kapasitas')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- Harga --}}
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="number" name="harga" value="{{ old('harga', $kamar->harga) }}"
                                    class="form-select input-glass @error('harga') is-invalid @enderror" required>
                                <label>Harga</label>
                                @error('harga')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- Fasilitas --}}
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="fasilitas[]"
                                    value="{{ old('fasilitas.0', implode(', ', (array) json_decode($kamar->fasilitas_json, true) ?? [])) }}"
                                    class="form-select input-glass @error('fasilitas.0') is-invalid @enderror">
                                <label>Fasilitas (pisahkan dengan koma)</label>
                                @error('fasilitas.0')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- Foto --}}
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="file" name="foto[]"
                                    class="form-select input-glass @error('foto.*') is-invalid @enderror" multiple>
                                <label>Foto Kamar (opsional)</label>
                                @error('foto.*')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            @if (!empty($kamar->foto))
                                <div class="mt-2">
                                    <p class="mb-1">Foto Saat Ini:</p>
                                    @foreach (json_decode($kamar->foto, true) ?? [] as $foto)
                                        <img src="{{ asset('storage/' . $foto) }}" alt="Foto Kamar"
                                            class="rounded me-2 mb-2" width="100">
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        {{-- Tombol Submit --}}
                        <div class="col-12 d-flex justify-content-center mt-4">
                            <button class="btn btn-gradient w-100 py-3 rounded-pill shadow-sm" type="submit">
                                <i class="fa fa-save me-2"></i> Perbarui
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
