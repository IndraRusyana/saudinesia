@extends('layouts.user')

@section('title')
    Detail Hotel | Saudinesia
@endsection

@section('layanan')
    active
@endsection

@section('content')
    <div class="container">

        <!-- breadcumb -->
        <x-user.breadcrumb :breadcrumbs="$breadcrumbs" />
        <!-- breadcumb -->

        <section>
            <div class="container py-5">
                <div class="row g-4">
                    <!-- Image Grid -->
                    <div class="col-lg-8">
                        <div class="row g-2">
                            <div class="col-12">
                                <div class="img-placeholder img-large w-100"></div>
                            </div>
                            <div class="col-4">
                                <div class="img-placeholder w-100"></div>
                            </div>
                            <div class="col-4">
                                <div class="img-placeholder w-100"></div>
                            </div>
                            <div class="col-4 position-relative">
                                <div class="img-placeholder w-100 d-flex justify-content-center align-items-center">
                                    <div class="text-center">
                                        <strong>+2</strong><br><small>More Photos</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Hotel Info -->
                        <div class="mt-4">
                            <h4 class="fw-bold">Hotel ABC</h4>
                            <p class="text-muted mb-1">100 Smart Street, LA, USA</p>
                            <div class="mb-2">★★★★☆</div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="fw-bold mb-0">Apartment Description</h6>
                                <div>
                                    <i class="bi bi-heart me-2"></i>
                                    <i class="bi bi-share"></i>
                                </div>
                            </div>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua...</p>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua...</p>

                            <h6 class="fw-bold">Periode</h6>
                            <p class="text-muted">February - Maret</p>

                            <div class="map-placeholder d-flex justify-content-center align-items-center">
                                <span class="text-muted">[Google Maps Placeholder]</span>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="col-lg-4">
                        <div class="price-box">
                            <h5 class="fw-bold">Rp. 500.000 - Rp. 1.500.000</h5>
                            <hr>
                            <ul class="list-unstyled text-muted">
                                <li><span class="dot"></span>Double: Rp 500.000</li>
                                <li><span class="dot"></span>Triple: Rp 1.000.000</li>
                                <li><span class="dot"></span>Quad: Rp 1.500.000</li>
                            </ul>
                            <a class="btn btn-dark btn-dark-rounded my-3" href="/hotel/pemesanan">Reserve Now</a>
                            <div class="text-center text-muted">
                                <i class="bi bi-telephone"></i> Contact Host
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </div>
@endsection
