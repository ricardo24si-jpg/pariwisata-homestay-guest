@extends('layouts.guest.app')

@section('content')
    <!-- Carousel Start -->
    <div class="carousel-header">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="{{ asset('assets/img/pemandangan1.jpg') }}" class="img-fluid" alt="Image">
                    <div class="carousel-caption">
                        <div class="text-center p-4" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase fw-bold mb-3 mb-md-4 wow fadeInUp" data-wow-delay="0.1s">
                                Solusi untuk Semua Jenis Visa</h4>
                            <h1 class="display-1 text-capitalize text-white mb-3 mb-md-4 wow fadeInUp"
                                data-wow-delay="0.3s">Proses Imigrasi Dimulai Di Sini!</h1>
                            <p class="text-white mb-4 mb-md-5 fs-5 wow fadeInUp" data-wow-delay="0.5s">Kami menyediakan
                                layanan profesional untuk membantu Anda dalam proses pengurusan visa
                                dengan mudah, cepat, dan terpercaya.
                            </p>
                            <a class="btn btn-primary border-secondary rounded-pill text-white py-3 px-5 wow fadeInUp"
                                data-wow-delay="0.7s" href="{{ route('about') }}">More Details</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/pemandangan2.jpg') }}" class="img-fluid" alt="Image">
                    <div class="carousel-caption">
                        <div class="text-center p-4" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase fw-bold mb-3 mb-md-4 wow fadeInUp" data-wow-delay="0.1s">
                                Solusi Lengkap Layanan Visa</h5>
                            <h1 class="display-1 text-capitalize text-white mb-3 mb-md-4 wow fadeInUp"
                                data-wow-delay="0.3s">Layanan Imigrasi Visa Terpercaya</h1>
                            <p class="text-white mb-4 mb-md-5 fs-5 wow fadeInUp" data-wow-delay="0.5s">Kami membantu proses
                                pengurusan visa Anda dengan pelayanan profesional, cepat,
                                dan sesuai dengan kebutuhan perjalanan internasional Anda.
                            </p>
                            <a class="btn btn-primary border-secondary rounded-pill text-white py-3 px-5 wow fadeInUp"
                                data-wow-delay="0.7s" href="{{ route('about') }}">More Details</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-secondary wow fadeInLeft" data-wow-delay="0.2s"
                    aria-hidden="false"></span>
                <span class="visually-hidden-focusable">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-secondary wow fadeInRight" data-wow-delay="0.2s"
                    aria-hidden="false"></span>
                <span class="visually-hidden-focusable">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- About Start -->
    <div class="container-fluid py-5">
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
                    <h1 class="display-5 mb-4">We’re Trusted Immigration Consultant Agency.</h1>
                    <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt architecto
                        consectetur iusto perferendis blanditiis assumenda dignissimos, commodi fuga culpa earum
                        explicabo libero sint est mollitia saepe! Sequi asperiores rerum nemo!</p>
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
                                <p class="text-primary h6 mb-3"><i class="fa fa-check-circle text-secondary me-2"></i>
                                    Offer 100 % Genuine Assistance</p>
                                <p class="text-primary h6 mb-3"><i class="fa fa-check-circle text-secondary me-2"></i>
                                    It’s Faster & Reliable Execution</p>
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
                                    <span class="text-secondary fw-bold fs-5" style="letter-spacing: 2px;">Free: +0123
                                        456 7890</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Services Start -->
    <div class="container-fluid service overflow-hidden py-5">
        <div class="container">
            <div class="section-title text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="sub-style">
                    <h5 class="sub-title text-primary px-3">Visa Services</h5>
                </div>
                <h1 class="display-5 mb-4">Enabling Your Immigration Successfully</h1>
                <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat deleniti amet at
                    atque sequi quibusdam cumque itaque repudiandae temporibus, eius nam mollitia voluptas maxime veniam
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
                                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                            Mollitia fugit dolores nesciunt adipisci obcaecati veritatis cum, ratione
                                            aspernatur autem velit.</p>
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


    <!-- Contact Start -->
    <div class="container-fluid contact overflow-hidden py-5">
        <div class="container pb-5">
            <div class="office">
                <div class="section-title text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="sub-style">
                        <h5 class="sub-title text-primary px-3">Worlwide Offices</h5>
                    </div>
                    <h1 class="display-5 mb-4">Explore Our Office Worldwide</h1>
                    <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat deleniti amet at
                        atque sequi quibusdam cumque itaque repudiandae temporibus, eius nam mollitia voluptas maxime
                        veniam necessitatibus saepe in ab? Repellat!</p>
                </div>
                <div class="row g-4 justify-content-center">
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="office-item p-4">
                            <div class="office-img mb-4">
                                <img src="{{ asset('assets/img/office-2.jpg') }}" class="img-fluid w-100 rounded"
                                    alt="">
                            </div>
                            <div class="office-content d-flex flex-column">
                                <h4 class="mb-2">Australia</h4>
                                <a href="#" class="text-secondary fs-5 mb-2">+123.456.7890</a>
                                <a href="#" class="text-muted fs-5 mb-2">travisa@example.com</a>
                                <p class="mb-0">123, First Floor, 123 St Roots Terrace, Los Angeles 90010 Unitd
                                    States of America.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="office-item p-4">
                            <div class="office-img mb-4">
                                <img src="{{ asset('assets/img/office-1.jpg') }}" class="img-fluid w-100 rounded"
                                    alt="">
                            </div>
                            <div class="office-content d-flex flex-column">
                                <h4 class="mb-2">Canada</h4>
                                <a href="#" class="text-secondary fs-5 mb-2">(012) 0345 6789</a>
                                <a href="#" class="text-muted fs-5 mb-2">travisa@example.com</a>
                                <p class="mb-0">123, First Floor, 123 St Roots Terrace, Los Angeles 90010 Unitd
                                    States of America.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="office-item p-4">
                            <div class="office-img mb-4">
                                <img src="{{ asset('assets/img/office-3.jpg') }}" class="img-fluid w-100 rounded"
                                    alt="">
                            </div>
                            <div class="office-content d-flex flex-column">
                                <h4 class="mb-2">United Kingdom</h4>
                                <a href="#" class="text-secondary fs-5 mb-2">01234.567.890</a>
                                <a href="#" class="text-muted fs-5 mb-2">travisa@example.com</a>
                                <p class="mb-0">123, First Floor, 123 St Roots Terrace, Los Angeles 90010 Unitd
                                    States of America.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="office-item p-4">
                            <div class="office-img mb-4">
                                <img src="{{ asset('assets/img/office-4.jpg') }}" class="img-fluid w-100 rounded"
                                    alt="">
                            </div>
                            <div class="office-content d-flex flex-column">
                                <h4 class="mb-2">India</h4>
                                <a href="#" class="text-secondary fs-5 mb-2">+123.45.67890</a>
                                <a href="#" class="text-muted fs-5 mb-2">travisa@example.com</a>
                                <p class="mb-0">123, First Floor, 123 St Roots Terrace, Los Angeles 90010 Unitd
                                    States of America.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
