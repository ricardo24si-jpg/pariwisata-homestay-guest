@extends('layouts.guest.app')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Edit Homestay</h1>
                <ol class="breadcrumb justify-content-center text-white mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-white">Pages</a></li>
                    <li class="breadcrumb-item active text-secondary">Edit Homestay</li>
                </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Form Edit -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="booking p-5 rounded-4 shadow-lg"
                style="background: #FFF;
                        backdrop-filter: blur(10px);
                        border: 1px solid rgba(104, 104, 104, 0.08);
                        border-radius: 20px;">

                <div class="text-center mb-4">
                    <h2 class="fw-bold text-gradient mb-3">Edit Data Homestay</h2>
                    <p class="text-light-50 mb-0">Perbarui data homestay sesuai kebutuhan</p>
                </div>

                @include('layouts.guest.alerts')

                <form action="{{ route('homestay.update', $homestay->homestay_id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="nama" value="{{ old('nama', $homestay->nama) }}"
                                    class="form-control input-glass @error('nama') is-invalid @enderror"
                                    placeholder="Nama Homestay" required>
                                <label>Nama Homestay</label>
                                @error('nama')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="number" name="harga_per_malam"
                                    value="{{ old('harga_per_malam', $homestay->harga_per_malam) }}"
                                    class="form-control input-glass @error('harga_per_malam') is-invalid @enderror"
                                    placeholder="Harga per malam">
                                <label>Harga per Malam</label>
                                @error('harga_per_malam')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" name="alamat" value="{{ old('alamat', $homestay->alamat) }}"
                                    class="form-control input-glass @error('alamat') is-invalid @enderror"
                                    placeholder="Alamat">
                                <label>Alamat Lengkap</label>
                                @error('alamat')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="rt" value="{{ old('rt', $homestay->rt) }}"
                                    class="form-control input-glass @error('rt') is-invalid @enderror" placeholder="RT">
                                <label>RT</label>
                                @error('rt')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="rw" value="{{ old('rw', $homestay->rw) }}"
                                    class="form-control input-glass @error('rw') is-invalid @enderror" placeholder="RW">
                                <label>RW</label>
                                @error('rw')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" name="fasilitas_json"
                                    value="{{ old('fasilitas_json', implode(', ', json_decode($homestay->fasilitas_json, true) ?? [])) }}"
                                    class="form-control input-glass @error('fasilitas_json') is-invalid @enderror"
                                    placeholder="WiFi, AC, TV">
                                <label>Fasilitas (pisahkan dengan koma)</label>
                                @error('fasilitas_json')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <select name="status"
                                    class="form-select input-glass @error('status') is-invalid @enderror">
                                    <option value="tersedia"
                                        {{ old('status', $homestay->status) == 'tersedia' ? 'selected' : '' }}>Tersedia
                                    </option>
                                    <option value="penuh"
                                        {{ old('status', $homestay->status) == 'penuh' ? 'selected' : '' }}>Penuh</option>
                                </select>
                                <label>Status</label>
                                @error('status')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 d-flex justify-content-center mt-4">
                            <button class="btn btn-gradient w-100 py-3 rounded-pill shadow-sm" type="submit">
                                <i class="fa fa-save me-2"></i> Update Data
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
