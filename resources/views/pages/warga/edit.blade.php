@extends('layouts.guest.app')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Edit Warga</h1>
                <ol class="breadcrumb justify-content-center text-white mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-white">Pages</a></li>
                    <li class="breadcrumb-item active text-secondary">Edit Warga</li>
                </ol>
        </div>
    </div>
    <!-- Header End -->

    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="booking p-5 futuristic-card shadow-lg rounded-4"
                style="background: #FFF;
                            backdrop-filter: blur(10px);
                            border: 1px solid rgba(104, 104, 104, 0.08);
                            border-radius: 20px;">

                <h2 class="fw-bold text-gradient mb-4">Edit Warga</h2>
                @include('layouts.guest.alerts')

                <form action="{{ route('warga.update', $data->warga_id) }}" method="POST" class="futuristic-form">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control input-glass" name="no_ktp" placeholder="NIK"
                                    value="{{ old('no_ktp', $data->no_ktp) }}">
                                <label>NIK</label>
                                @error('no_ktp')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control input-glass" name="nama" placeholder="Nama"
                                    value="{{ old('nama', $data->nama) }}">
                                <label>Nama</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-select input-glass" name="jenis_kelamin"
                                    value="{{ old('jenis_kelamin', $data->jenis_kelamin) }}">
                                    <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                                        Laki-laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                                <label>Jenis Kelamin</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control input-glass" name="agama" placeholder="Agama"
                                    value="{{ old('agama', $data->agama) }}">
                                <label>Agama</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control input-glass" name="pekerjaan"
                                    placeholder="Pekerjaan" value="{{ old('pekerjaan', $data->pekerjaan) }}">
                                <label>Pekerjaan</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control input-glass" name="telp" placeholder="Telepon"
                                    value="{{ old('telp', $data->telp) }}">
                                <label>Telepon</label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="email" class="form-control input-glass" name="email" placeholder="Email"
                                    value="{{ old('email', $data->email) }}">
                                <label>Email</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-gradient w-100 py-3 rounded-pill shadow-sm" type="submit">
                                <i class="fa fa-paper-plane me-2"></i> Submit
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
