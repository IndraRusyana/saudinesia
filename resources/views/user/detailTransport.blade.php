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
                        <div class="row g-2">
                            @if ($transport->images->count())
                                <div class="col-12">
                                    <img src="{{ asset('storage/' . $transport->images->first()->image_path) }}"
                                        class="img-fluid w-100 img-large" alt="{{ $transport->name }}">
                                </div>
                                @foreach ($transport->images->skip(1)->take(3) as $image)
                                    <div class="col-4">
                                        <img src="{{ asset('storage/' . $image->image_path) }}" class="img-fluid"
                                            alt="Gambar tambahan">
                                    </div>
                                @endforeach
                            @else
                                <div class="col-12">
                                    <div class="img-placeholder img-large w-100">No Image Available</div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Info & Sidebar -->
                    <div class="col-lg-4">
                        <div class="price-box mt-4">
                            <h5 class="fw-bold">
                                @if ($filteredPrices->count())
                                    Rp {{ number_format($filteredPrices->first()->price, 0, ',', '.') }}
                                @else
                                    <span class="text-danger">Harga belum tersedia</span>
                                @endif
                            </h5>
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
                        <p class="text-muted">{{ $transport->description }}</p>

                        <h6 class="fw-bold">Route</h6>
                        <p class="text-muted">{{ $transport->route }}</p>

                        <h6 class="fw-bold">Periode</h6>
                        <p class="text-muted">{{ $selectedPeriod->name }}</p>

                        <h6 class="fw-bold">Jadwal Keberangkatan</h6>
                        <p class="text-muted">{{ $transport->schedule }}</p>
                    </div>
                </div>
            </div>

        </section>

    </div>
@endsection
