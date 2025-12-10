@extends('layouts.guest.app')

@section('content')
    <style>
        .service-title-name a {
            position: relative;
            z-index: 10 !important;
        }

        .service-title-name {
            position: relative;
            z-index: 10 !important;
        }

        .service-content {
            position: relative;
            z-index: 10 !important;
        }
    </style>

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Destination</h1>
                <ol class="breadcrumb justify-content-center text-white mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-white">Pages</a></li>
                    <li class="breadcrumb-item active text-secondary">Destination</li>
                </ol>
        </div>
    </div>
    <!-- Header End -->

    <div class="container-fluid service overflow-hidden py-5">
        <div class="container">

            <!-- Search & Filter -->
            <form method="GET" class="card shadow-sm p-4 border-0 rounded-4">
                <div class="row g-3 align-items-end">

                    <style>
                        /* Card container */
                        .dest-card {
                            position: relative;
                            background: #fff;
                            border-radius: 18px;
                            overflow: hidden;
                            transition: 0.3s ease-in-out;
                            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08);
                        }

                        .dest-card:hover {
                            transform: translateY(-6px);
                            box-shadow: 0 12px 26px rgba(0, 0, 0, 0.12);
                        }

                        /* Image */
                        .dest-img {
                            height: 230px;
                            overflow: hidden;
                            position: relative;
                        }

                        .dest-img img {
                            width: 100%;
                            height: 230px;
                            object-fit: cover;
                            transition: 0.5s;
                        }

                        .dest-card:hover .dest-img img {
                            transform: scale(1.08);
                        }

                        /* Gradient overlay */
                        .dest-img::after {
                            content: "";
                            position: absolute;
                            bottom: 0;
                            width: 100%;
                            height: 50%;
                            background: linear-gradient(to top, rgba(0, 0, 0, 0.55), transparent);
                        }

                        /* Title on image */
                        .dest-title {
                            position: absolute;
                            bottom: 15px;
                            left: 50%;
                            transform: translateX(-50%);
                            color: #fff;
                            font-size: 20px;
                            font-weight: 700;
                            text-align: center;
                            z-index: 10;
                            width: 90%;
                        }

                        /* Body */
                        .dest-body {
                            padding: 18px 20px;
                        }

                        /* Action buttons */
                        .dest-actions {
                            display: flex;
                            justify-content: space-between;
                            margin-top: 15px;
                        }

                        /* Floating edit/delete on hover */
                        .floating-btns {
                            position: absolute;
                            top: 15px;
                            right: 15px;
                            display: flex;
                            gap: 8px;
                            opacity: 0;
                            transition: 0.3s;
                            z-index: 20;
                        }

                        .dest-card:hover .floating-btns {
                            opacity: 1;
                        }

                        .floating-btns button,
                        .floating-btns a {
                            padding: 8px 12px;
                            border-radius: 50px;
                            font-size: 13px;
                        }

                        /* Detail button always above */
                        .btn-detail {
                            position: relative;
                            z-index: 30;
                        }
                    </style>


                    <!-- Search -->
                    <div class="col-md-4">
                        <label class="filter-label">Search</label>
                        <input type="text" name="search" class="form-control filter-input"
                            placeholder="Cari destinasi / alamat..." value="{{ request('search') }}">
                    </div>

                    <!-- Filter RT -->
                    <div class="col-md-2">
                        <label class="filter-label">RT</label>
                        <input type="text" name="rt" class="form-control filter-input" value="{{ request('rt') }}">
                    </div>

                    <!-- Filter RW -->
                    <div class="col-md-2">
                        <label class="filter-label">RW</label>
                        <input type="text" name="rw" class="form-control filter-input" value="{{ request('rw') }}">
                    </div>

                    <!-- Tombol -->
                    <div class="col-md-2 d-grid">
                        <button class="btn btn-primary btn-search">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>

                    <div class="col-md-2 d-grid">
                        <a href="{{ route('destinasi.index') }}" class="btn btn-secondary btn-search">Reset</a>
                    </div>

                </div>
            </form>


            <a href="{{ route('destinasi.create') }}" class="btn btn-secondary mb-4">
                <i class="fa fa-plus"></i> Tambah Homestay
            </a>

            <div class="row g-4">
                @foreach ($data as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="dest-card">

                            <!-- Floating Edit & Hapus -->
                            <div class="floating-btns">
                                <a href="{{ route('destinasi.edit', $item->destinasi_id) }}" class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <form action="{{ route('destinasi.destroy', $item->destinasi_id) }}" method="POST"
                                    onsubmit="return confirm('Yakin dihapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>

                            <!-- Image -->
                            <div class="dest-img">
                                @php
                                    $firstFoto = $item->medias->first(); // ambil foto pertama
                                    $fotoPath = $firstFoto
                                        ? asset('storage/' . $firstFoto->file_name)
                                        : asset('assets/img/service-1.jpg'); // default jika kosong
                                @endphp
                                <img src="{{ $fotoPath }}" alt="Image" class="img-fluid">
                                <div class="dest-title">{{ $item->nama }}</div>
                            </div>

                            <!-- Body -->
                            <div class="dest-body">
                                <p>{{ Str::limit($item->deskripsi, 100) }}</p>

                                <a href="{{ route('destinasi.show', $item->destinasi_id) }}"
                                    class="btn btn-primary rounded-pill px-4 w-100 btn-detail">
                                    Lihat Detail
                                </a>
                            </div>

                        </div>
                    </div>
                @endforeach

                <div class="mt-3">
                    {{ $data->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
