@extends('layouts.guest.app')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Our Services</h1>
                <ol class="breadcrumb justify-content-center text-white mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-white">Pages</a></li>
                    <li class="breadcrumb-item active text-secondary">Services</li>
                </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- ================= ULASAN WISATA START ================= -->
    <div class="container py-5">

        <div class="section-title text-center mb-5">
            <h5 class="sub-title text-primary px-3">ULASAN WISATA</h5>
            <h1 class="display-5 mb-4">Pendapat Pengunjung</h1>
            <a href="{{ route('ulasan.create') }}" class="btn btn-primary mt-3">
                + Tambah Ulasan
            </a>
        </div>

        {{-- FLASH --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row g-4">
            @foreach ($ulasan as $u)
                <div class="col-md-6">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="fw-bold mb-1">{{ $u->destinasi->nama }}</h5>
                            <p class="text-muted small mb-2">
                                {{ $u->warga->nama }} • {{ \Carbon\Carbon::parse($u->waktu)->format('d M Y') }}
                            </p>

                            <p>{{ $u->komentar }}</p>

                            <div class="mb-3">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= $u->rating ? 'text-warning' : 'text-secondary' }}"></i>
                                @endfor
                            </div>

                            <div class="d-flex gap-2">
                                <a href="{{ route('ulasan.edit', $u) }}" class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('ulasan.destroy', $u) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus ulasan ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
    <!-- ================= ULASAN WISATA END ================= -->

    <!-- Services Start -->
    <div class="container-fluid service overflow-hidden py-5">
        <div class="container pt-5">
            <div class="section-title text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="sub-style">
                    <h5 class="sub-title text-primary px-3">Visa Categories</h5>
                </div>
                <h1 class="display-5 mb-4">Enabling Your Immigration Successfully</h1>
                <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat deleniti amet at atque
                    sequi quibusdam cumque itaque repudiandae temporibus, eius nam mollitia voluptas maxime veniam
                    necessitatibus saepe in ab? Repellat!</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item">
                        <div class="service-inner">
                            <div class="service-img">
                                <img src="{{ asset('assets/img/service-1.jpg') }}" class="img-fluid w-100 rounded"
                                    alt="Image">
                            </div>
                            <div class="service-title">
                                <div class="service-title-name">
                                    <div class="bg-primary text-center rounded p-3 mx-5 mb-4">
                                        <a href="#" class="h4 text-white mb-0">Job Visa</a>
                                    </div>
                                    <a class="btn bg-light text-secondary rounded-pill py-3 px-5 mb-4"
                                        href="#">Explore More</a>
                                </div>
                                <div class="service-content pb-4">
                                    <a href="#">
                                        <h4 class="text-white mb-4 py-3">Job Visa</h4>
                                    </a>
                                    <div class="px-4">
                                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Mollitia
                                            fugit dolores nesciunt adipisci obcaecati veritatis cum, ratione aspernatur
                                            autem velit.</p>
                                        <a class="btn btn-primary border-secondary rounded-pill py-3 px-5"
                                            href="#">Explore More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item">
                        <div class="service-inner">
                            <div class="service-img">
                                <img src="{{ asset('assets/img/service-2.jpg') }}" class="img-fluid w-100 rounded"
                                    alt="Image">
                            </div>
                            <div class="service-title">
                                <div class="service-title-name">
                                    <div class="bg-primary text-center rounded p-3 mx-5 mb-4">
                                        <a href="#" class="h4 text-white mb-0">Business Visa</a>
                                    </div>
                                    <a class="btn bg-light text-secondary rounded-pill py-3 px-5 mb-4"
                                        href="#">Explore More</a>
                                </div>
                                <div class="service-content pb-4">
                                    <a href="#">
                                        <h4 class="text-white mb-4 py-3">Business Visa</h4>
                                    </a>
                                    <div class="px-4">
                                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                            Mollitia
                                            fugit dolores nesciunt adipisci obcaecati veritatis cum, ratione aspernatur
                                            autem velit.</p>
                                        <a class="btn btn-primary border-secondary rounded-pill text-white py-3 px-5"
                                            href="#">Explore More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item">
                        <div class="service-inner">
                            <div class="service-img">
                                <img src="{{ asset('assets/img/service-3.jpg') }}" class="img-fluid w-100 rounded"
                                    alt="Image">
                            </div>
                            <div class="service-title">
                                <div class="service-title-name">
                                    <div class="bg-primary text-center rounded p-3 mx-5 mb-4">
                                        <a href="#" class="h4 text-white mb-0">Diplometic Visa</a>
                                    </div>
                                    <a class="btn bg-light text-secondary rounded-pill py-3 px-5 mb-4"
                                        href="#">Explore More</a>
                                </div>
                                <div class="service-content pb-4">
                                    <a href="#">
                                        <h4 class="text-white mb-4 py-3">Diplometic Visa</h4>
                                    </a>
                                    <div class="px-4">
                                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                            Mollitia
                                            fugit dolores nesciunt adipisci obcaecati veritatis cum, ratione aspernatur
                                            autem velit.</p>
                                        <a class="btn btn-primary border-secondary rounded-pill text-white py-3 px-5"
                                            href="#">Explore More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item">
                        <div class="service-inner">
                            <div class="service-img">
                                <img src="{{ asset('assets/img/service-1.jpg') }}" class="img-fluid w-100 rounded"
                                    alt="Image">
                            </div>
                            <div class="service-title">
                                <div class="service-title-name">
                                    <div class="bg-primary text-center rounded p-3 mx-5 mb-4">
                                        <a href="#" class="h4 text-white mb-0">Students Visa</a>
                                    </div>
                                    <a class="btn bg-light text-secondary rounded-pill py-3 px-5 mb-4"
                                        href="#">Explore More</a>
                                </div>
                                <div class="service-content pb-4">
                                    <a href="#">
                                        <h4 class="text-white mb-4 py-3">Students Visa</h4>
                                    </a>
                                    <div class="px-4">
                                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                            Mollitia fugit dolores nesciunt adipisci obcaecati veritatis cum, ratione
                                            aspernatur autem velit.</p>
                                        <a class="btn btn-primary border-secondary rounded-pill text-white py-3 px-5"
                                            href="#">Explore More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item">
                        <div class="service-inner">
                            <div class="service-img">
                                <img src="{{ asset('assets/img/service-2.jpg') }}" class="img-fluid w-100 rounded"
                                    alt="Image">
                            </div>
                            <div class="service-title">
                                <div class="service-title-name">
                                    <div class="bg-primary text-center rounded p-3 mx-5 mb-4">
                                        <a href="#" class="h4 text-white mb-0">Residence Visa</a>
                                    </div>
                                    <a class="btn bg-light text-secondary rounded-pill py-3 px-5 mb-4"
                                        href="#">Explore More</a>
                                </div>
                                <div class="service-content pb-4">
                                    <a href="#">
                                        <h4 class="text-white mb-4 py-3">Residence Visa</h4>
                                    </a>
                                    <div class="px-4">
                                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                            Mollitia fugit dolores nesciunt adipisci obcaecati veritatis cum, ratione
                                            aspernatur autem velit.</p>
                                        <a class="btn btn-primary border-secondary rounded-pill text-white py-3 px-5"
                                            href="#">Explore More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item">
                        <div class="service-inner">
                            <div class="service-img">
                                <img src="{{ asset('assets/img/service-3.jpg') }}" class="img-fluid w-100 rounded"
                                    alt="Image">
                            </div>
                            <div class="service-title">
                                <div class="service-title-name">
                                    <div class="bg-primary text-center rounded p-3 mx-5 mb-4">
                                        <a href="#" class="h4 text-white mb-0">Tourist Visa</a>
                                    </div>
                                    <a class="btn bg-light text-secondary rounded-pill py-3 px-5 mb-4"
                                        href="#">Explore More</a>
                                </div>
                                <div class="service-content pb-4">
                                    <a href="#">
                                        <h4 class="text-white mb-4 py-3">Tourist Visa</h4>
                                    </a>
                                    <div class="px-4">
                                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                            Mollitia fugit dolores nesciunt adipisci obcaecati veritatis cum, ratione
                                            aspernatur autem velit.</p>
                                        <a class="btn btn-primary border-secondary rounded-pill text-white py-3 px-5"
                                            href="#">Explore More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->


    <!-- Testimonial Start -->
    <div class="container-fluid testimonial overflow-hidden py-5">
        <div class="container pb-5">
            <div class="section-title text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="sub-style">
                    <h5 class="sub-title text-primary px-3">OUR CLIENTS RIVIEWS</h5>
                </div>
                <h1 class="display-5 mb-4">What Our Clients Say</h1>
                <p class="mb-0">Berikut adalah pendapat dan pengalaman pengunjung setelah menikmati berbagai destinasi
                    wisata.
                    Ulasan ini diharapkan dapat membantu pengunjung lain dalam memilih tujuan wisata terbaik!</p>
            </div>
            <div class="owl-carousel testimonial-carousel wow zoomInDown" data-wow-delay="0.2s">
                <div class="testimonial-item">
                    <div class="testimonial-content p-4 mb-5">
                        <p class="fs-5 mb-0">Lokasinya mudah dijangkau dan tidak terlalu ramai. Pemandangan alam yang hijau
                            dan sungai yang jernih membuat saya ingin kembali lagi. Sangat cocok bagi yang ingin menikmati
                            liburan santai dan menyatu dengan alam.
                        </p>
                        <div class="d-flex justify-content-end">
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="rounded-circle me-4" style="width: 100px; height: 100px;">
                            <img class="img-fluid rounded-circle" src="{{ asset('assets/img/testimonial-1.jpg') }}"
                                alt="img">
                        </div>
                        <div class="my-auto">
                            <h5>Jane</h5>
                            <p class="mb-0">Ibu Rumah Tangga</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-content p-4 mb-5">
                        <p class="fs-5 mb-0">Tempat ini benar-benar menakjubkan! Pemandangan alamnya sangat indah, udara
                            segarnya bikin betah berlama-lama. Anak-anak sangat senang bermain di area terbuka, dan banyak
                            spot foto yang instagramable. Fasilitasnya juga cukup lengkap, jadi liburan di sini terasa
                            nyaman dan menyenangkan untuk keluarga.
                        </p>
                        <div class="d-flex justify-content-end">
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="rounded-circle me-4" style="width: 100px; height: 100px;">
                            <img class="img-fluid rounded-circle" src="{{ asset('assets/img/testimonial-2.jpg') }}"
                                alt="img">
                        </div>
                        <div class="my-auto">
                            <h5>Prilly</h5>
                            <p class="mb-0">Influenser</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-content p-4 mb-5">
                        <p class="fs-5 mb-0">Tempat ini benar-benar menakjubkan! Pemandangan alamnya sangat indah, udara
                            segarnya bikin betah berlama-lama. Anak-anak sangat senang bermain di area terbuka, dan banyak
                            spot foto yang instagramable. Fasilitasnya juga cukup lengkap, jadi liburan di sini terasa
                            nyaman dan menyenangkan untuk keluarga.
                        </p>
                        <div class="d-flex justify-content-end">
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="rounded-circle me-4" style="width: 100px; height: 100px;">
                            <img class="img-fluid rounded-circle" src="{{ asset('assets/img/testimonial-3.jpg') }}"
                                alt="img">
                        </div>
                        <div class="my-auto">
                            <h5>Antony</h5>
                            <p class="mb-0">Mahasiswa</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
@endsection
