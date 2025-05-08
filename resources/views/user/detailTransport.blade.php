@extends('layouts.user')

@section('title')
    Detail Transport | Saudinesia
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
                <div class="row g-4 ">
                    <!-- Image Grid -->
                    <div class="col-lg-8">
                        <div class="row g-2 image-grid">
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
                    </div>

                    <!-- Info & Sidebar -->
                    <div class="col-lg-4">
                        <div class="price-box mt-4">
                            <h5 class="fw-bold">IDR. 580.000</h5>
                            <hr>
                            <a class="btn btn-dark btn-dark-rounded mb-3" href="/checkout">Reserve Now</a>
                            <div class="text-center">
                                <i class="bi bi-telephone"></i> <small>Contact Host</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Deskripsi -->
                <div class="row mt-5">
                    <div class="col-lg-8">
                        <h6 class="fw-bold">Deskripsi Paket</h6>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua...</p>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua...</p>
                            <h6 class="fw-bold">Route</h6>
                            <p class="text-muted">Makkah - Madinah</p>
                            <h6 class="fw-bold">Jadwal Keberangkatan</h6>
                            <p class="text-muted">25 Mei 2025 19:00</p>
                    </div>
                </div>
            </div>

        </section>

    </div>
@endsection
