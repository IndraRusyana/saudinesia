@extends('layouts.user')

@section('title')
    Detail Umroh | Saudinesia
@endsection

@section('paket')
    active
@endsection

@section('content')
    <div class="container">

        <!-- breadcumb -->
        <x-user.breadcrumb :breadcrumbs="$breadcrumbs" />
        <!-- breadcumb -->

        <section>
            <div class="container vh-100 py-5">
                <div class="row g-4">
                    <!-- Image Grid -->
                    <div class="col-lg-8">
                        <div class="row g-2 image-grid">
                            <div class="col-12">
                                <img src="{{ asset('storage/' . $umroh->image) }}" class="img-fluid w-100 img-large"
                                    alt="{{ $umroh->name }}">
                            </div>
                            {{-- Jika ingin tambah gambar kecil lain, kamu bisa menambahkan relasi gallery --}}
                            {{-- <div class="col-4">
                                <img src="{{ asset('storage/' . $umroh->image) }}" class="img-fluid" alt="">
                            </div>
                            <div class="col-4">
                                <img src="{{ asset('storage/' . $umroh->image) }}" class="img-fluid" alt="">
                            </div>
                            <div class="col-4">
                                <img src="{{ asset('storage/' . $umroh->image) }}" class="img-fluid" alt="">
                            </div> --}}
                        </div>
                    </div>

                    <!-- Info & Sidebar -->
                    <div class="col-lg-4">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h4 class="fw-bold">{{ $umroh->name }}</h4>
                                <p class="text-muted mb-2">Bus, 100 kapasitas</p> {{-- Ganti sesuai kolom jika ada --}}
                            </div>
                            <div>
                                <i class="bi bi-heart me-2"></i>
                                <i class="bi bi-share"></i>
                            </div>
                        </div>

                        <div class="price-box mt-4">
                            <h5 class="fw-bold">IDR. {{ number_format($umroh->price, 0, ',', '.') }}</h5>
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
                        <p class="text-muted">{!! nl2br(e($umroh->description)) !!}</p>
                    </div>
                </div>
            </div>

        </section>

    </div>
@endsection
