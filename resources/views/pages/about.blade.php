@extends('layouts.guest.app')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">About Us</h1>
                <ol class="breadcrumb justify-content-center text-white mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-white">Pages</a></li>
                    <li class="breadcrumb-item active text-secondary">About</li>
                </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- About Start -->
    <div class="container-fluid overflow-hidden py-5">
        <div class="container pt-5">
            <div class="row g-5">
                <div class="col-xl-5 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="bg-light rounded">
                        <img src="{{ asset('assets/img/about-2.png') }}" class="img-fluid w-100"
                            style="margin-bottom: -7px;" alt="Image">
                        <img src="{{ asset('assets/img/about-3.jpg') }}"
                            class="img-fluid w-100 border-bottom border-5 border-primary"
                            style="border-top-right-radius: 300px; border-top-left-radius: 300px;" alt="Image">
                    </div>
                </div>
                <div class="col-xl-7 wow fadeInRight" data-wow-delay="0.3s">
                    <h5 class="sub-title pe-3">About the company</h5>
                    <h1 class="display-5 mb-4">Agensi Konsultan Imigrasi Terpercaya.</h1>
                    <p class="mb-4">
                        ParStay hadir untuk memudahkan Anda menjelajahi destinasi wisata menarik, memesan homestay
                        dan kamar yang nyaman,
                        serta membaca ulasan wisata yang terpercaya. Semua informasi lengkap dan praktis, agar pengalaman
                        liburan Anda semakin menyenangkan.
                    </p>
                    <div class="row gy-4 align-items-center">
                        <div class="col-12 col-sm-6 d-flex align-items-center">
                            <i class="fas fa-map-marked-alt fa-3x text-secondary"></i>
                            <h5 class="ms-4">Best Immigration Resources</h5>
                        </div>
                        <div class="col-12 col-sm-6 d-flex align-items-center">
                            <i class="fas fa-passport fa-3x text-secondary"></i>
                            <h5 class="ms-4">Return Visas Availabile</h5>
                        </div>
                        <div class="col-4 col-md-3">
                            <div class="bg-light text-center rounded p-3">
                                <div class="mb-2">
                                    <i class="fas fa-ticket-alt fa-4x text-primary"></i>
                                </div>
                                <h1 class="display-5 fw-bold mb-2">34</h1>
                                <p class="text-muted mb-0">Years of Experience</p>
                            </div>
                        </div>
                        <div class="col-8 col-md-9">
                            <div class="mb-5">
                                <p class="text-primary h6 mb-3"><i class="fa fa-check-circle text-secondary me-2"></i> Offer
                                    100 % Genuine Assistance</p>
                                <p class="text-primary h6 mb-3"><i class="fa fa-check-circle text-secondary me-2"></i> It’s
                                    Faster & Reliable Execution</p>
                                <p class="text-primary h6 mb-3"><i class="fa fa-check-circle text-secondary me-2"></i>
                                    Accurate & Expert Advice</p>
                            </div>
                            <div class="d-flex flex-wrap">
                                <div id="phone-tada" class="d-flex align-items-center justify-content-center me-4">
                                    <a href="" class="position-relative wow tada" data-wow-delay=".9s">
                                        <i class="fa fa-phone-alt text-primary fa-3x"></i>
                                        <div class="position-absolute" style="top: 0; left: 25px;">
                                            <span><i class="fa fa-comment-dots text-secondary"></i></span>
                                        </div>
                                    </a>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <span class="text-primary">Have any questions?</span>
                                    <span class="text-secondary fw-bold fs-5" style="letter-spacing: 2px;">Free: +62 812-6477-5971</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Contact Start -->
    <div class="container-fluid contact overflow-hidden py-5">
        <div class="container pb-5">
            <div class="office">
                <div class="section-title text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="sub-style">
                        <h5 class="sub-title text-primary px-3">Alur Pemesanan</h5>
                    </div>
                    <h1 class="display-5 mb-4">Cara Memesan Wisata & Homestay</h1>
                    <p class="mb-0">Ikuti alur berikut untuk menjelajahi destinasi wisata, memilih homestay, dan melakukan
                        booking dengan mudah.</p>
                </div>
                <div class="row g-4 justify-content-center">

                    <!-- Destinasi Wisata -->
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="office-item p-4 text-center">
                            <div class="office-img mb-4">
                                <img src="{{ asset('assets/img/pemandangan1.jpg') }}" class="img-fluid w-100 rounded"
                                    alt="Destinasi Wisata">
                            </div>
                            <h4 class="mb-2">Destinasi Wisata</h4>
                            <p class="mb-0">Telusuri berbagai destinasi wisata menarik yang tersedia di website kami.</p>
                        </div>
                    </div>

                    <!-- Homestay -->
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="office-item p-4 text-center">
                            <div class="office-img mb-4">
                                <img src="{{ asset('assets/img/Homestay2.jpeg') }}" class="img-fluid w-100 rounded"
                                    alt="Homestay">
                            </div>
                            <h4 class="mb-2">Homestay</h4>
                            <p class="mb-0">Pilih homestay yang sesuai dengan kebutuhan dan lokasi destinasi wisata.</p>
                        </div>
                    </div>

                    <!-- Booking Homestay -->
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="office-item p-4 text-center">
                            <div class="office-img mb-4">
                                <img src="{{ asset('assets/img/kamar.jpeg') }}" class="img-fluid w-100 rounded"
                                    alt="Booking Homestay">
                            </div>
                            <h4 class="mb-2">Booking Homestay</h4>
                            <p class="mb-0">Lakukan booking homestay melalui sistem booking kami dengan mudah dan aman.
                            </p>
                        </div>
                    </div>

                    <!-- Ulasan Wisata -->
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.9s">
                        <div class="office-item p-4 text-center">
                            <div class="office-img mb-4">
                                <img src="{{ asset('assets/img/ulasan-wisata.jpg') }}" class="img-fluid w-100 rounded"
                                    alt="Ulasan Wisata">
                            </div>
                            <h4 class="mb-2">Ulasan Wisata</h4>
                            <p class="mb-0">Baca ulasan wisatawan lain dan tinggalkan review pengalamanmu sendiri.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <!-- Developer Bio Start -->
    <div class="container-fluid py-5 bg-light">
        <div class="container"> <!-- INI PENTING -->
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="sub-title text-primary px-3 mb-3" style="letter-spacing: 2px;">DEVELOPER</h5>
                <h1 class="display-5 fw-bold mb-4">Meet Our Developer</h1>
            </div>

            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="row g-0 align-items-stretch">
                    <!-- Foto kiri -->
                    <div class="col-md-4 d-flex align-items-center justify-content-center p-5"
                        style="background: linear-gradient(135deg, #979da8 0%, #334155 100%);">
                        <div class="text-center text-white">
                            <img src="{{ asset('assets/img/aldo.jpeg') }}"
                                class="img-fluid rounded-circle mb-4 shadow"
                                style="width: 180px; height: 180px; object-fit: cover; border: 5px solid rgba(255,255,255,0.2);">

                            <h3 class="fw-bold mb-1">Ricardo Zulkifli</h3>
                            <h4 class="fw-light mb-3 ">Raja Gukguk</h4>

                            <span class="badge bg-primary px-4 py-2">
                                Fullstack Web Developer
                            </span>
                        </div>
                    </div>

                    <!-- Konten kanan -->
                    <div class="col-md-8 bg-white">
                        <div class="card-body p-4 p-md-5">
                            <h2 class="fw-bold mb-4" style="color: #1e293b;">ParStay</h2>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <h6 class="text-uppercase fw-bold mb-3 text-muted">Profile Information</h6>
                                    <p><strong>NIM:</strong> 2457301121</p>
                                    <p><strong>Program Studi:</strong> Sistem Informasi</p>
                                    <p class="text-primary fw-semibold">Fullstack Web Developer</p>
                                </div>

                                <div class="col-md-6">
                                    <h6 class="text-uppercase fw-bold mb-3 text-muted">Skills</h6>
                                    <div class="d-flex flex-wrap gap-2">
                                        <span class="badge bg-light text-dark border">HTML</span>
                                        <span class="badge bg-light text-dark border">CSS</span>
                                        <span class="badge bg-light text-dark border">JavaScript</span>
                                        <span class="badge bg-light text-dark border">React</span>
                                        <span class="badge bg-light text-dark border">Node.js</span>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4">

                            <p class="text-muted">
                                Bersemangat dalam membangun aplikasi web yang bersih, efisien, serta menghadirkan pengalaman
                                pengguna yang ramah dan optimal.
                            </p>

                            <!-- Sosial -->
                            <div class="d-flex gap-3 mt-3">
                                <a href="https://github.com/ricardo24si-jpg" class="text-dark fs-5"><i
                                        class="fab fa-github"></i></a>
                                <a href="https://www.linkedin.com/in/ricardo-zulkifli-raja-guk-guk-b8508b3a1/"
                                    class="text-primary fs-5"><i class="fab fa-linkedin"></i></a>
                                <a href="mailto:ricardo24si@mahasiswa.pcr.ac.id" class="text-muted fs-5"><i
                                        class="fas fa-envelope"></i></a>
                                <a href="https://youtube.com/@ricardozulkifli?si=AXUYOYbU5ofrTFce"
                                    class="text-danger fs-5"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Developer Bio End -->
@endsection
