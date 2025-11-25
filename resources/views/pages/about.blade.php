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
                    <h1 class="display-5 mb-4">We’re Trusted Immigration Consultant Agency.</h1>
                    <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt architecto consectetur
                        iusto perferendis blanditiis assumenda dignissimos, commodi fuga culpa earum explicabo libero sint
                        est mollitia saepe! Sequi asperiores rerum nemo!</p>
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
                                    <span class="text-secondary fw-bold fs-5" style="letter-spacing: 2px;">Free: +0123 456
                                        7890</span>
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
                        <h5 class="sub-title text-primary px-3">Worlwide Offices</h5>
                    </div>
                    <h1 class="display-5 mb-4">Explore Our Office Worldwide</h1>
                    <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat deleniti amet at
                        atque sequi quibusdam cumque itaque repudiandae temporibus, eius nam mollitia voluptas maxime veniam
                        necessitatibus saepe in ab? Repellat!</p>
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
                                <p class="mb-0">123, First Floor, 123 St Roots Terrace, Los Angeles 90010 Unitd States of
                                    America.</p>
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
                                <p class="mb-0">123, First Floor, 123 St Roots Terrace, Los Angeles 90010 Unitd States of
                                    America.</p>
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
                                <p class="mb-0">123, First Floor, 123 St Roots Terrace, Los Angeles 90010 Unitd States of
                                    America.</p>
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
                                <p class="mb-0">123, First Floor, 123 St Roots Terrace, Los Angeles 90010 Unitd States of
                                    America.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
