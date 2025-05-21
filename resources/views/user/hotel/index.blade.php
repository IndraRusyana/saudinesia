@extends('layouts.user')

@section('title')
    Layanan Hotel | Saudinesia
@endsection

@section('layanan')
    active
@endsection

@section('content')
    <div class="container">

        <!-- breadcumb -->
        <x-user.breadcrumb :breadcrumbs="$breadcrumbs" />
        <!-- breadcumb -->

        <section id="section-1" class="my-5">
            <div class="container">
                <form method="GET" action="{{ route('user.hotel.index') }}">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="more-info shadow-sm border mx-auto">
                                <div class="row align-items-center">
                                    <div class="col-lg-4 col-sm-6 col-6">
                                        <i class="fa-solid fa-location-dot" style="cursor: pointer"></i>
                                        <h4>
                                            <span>Kota:</span><br>
                                            <select name="city">
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}"
                                                        {{ $city->id == $cityId ? 'selected' : '' }}>
                                                        {{ $city->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </h4>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-6">
                                        <i class="fa-solid fa-calendar-days" style="cursor: pointer"></i>
                                        <h4>
                                            <span>Periode:</span><br>
                                            <select name="period">
                                                @foreach ($periods as $period)
                                                    <option value="{{ $period->id }}"
                                                        {{ $period->id == $periodId ? 'selected' : '' }}>
                                                        {{ $period->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </h4>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-6 mt-4">
                                        <div class="main-button">
                                            <button type="submit" class="btn btn-primary">Cari</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>


        <div class="container pt-4">
            <h5 class="">
                Menampilkan Hotel
                @if ($cityId)
                    di {{ $cities->firstWhere('id', $cityId)->name }}
                @endif
                @if ($periodId)
                    pada periode {{ $periods->firstWhere('id', $periodId)->name }}
                @endif
            </h5>
        </div>


        <section>
            <div class="container mt-5">
                <div class="row gx-4">
                    @forelse ($hotel as $item)
                        <div class="col-lg-3 mb-4">
                            <a href="{{ route('user.hotel.detail', [
                                'id' => $item->id,
                                'period_id' => $periodId,
                                'city_id' => $cityId,
                            ]) }}"
                                style="text-decoration: none; color: inherit;">
                                <div class="card h-100">
                                    {{-- Ambil gambar pertama dari relasi hotel_images --}}
                                    @if ($item->images->first())
                                        <img src="{{ asset('uploads/' . $item->images->first()->image_path) }}"
                                            alt="Hotel Image" class="card-img-top">
                                    @else
                                        <img src="{{ asset('images/no-image.jpg') }}" alt="No Image" class="card-img-top">
                                    @endif

                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->name }}</h5>
                                        <p class="card-text text-dark">
                                            {{ Str::limit($item->description, 100, '...') }} <br>
                                            <small class="text-muted">
                                                {!! str_repeat('★', $item->stars) !!}{!! str_repeat('☆', 5 - $item->stars) !!}
                                            </small>
                                        </p>
                                        <p class="card-text">
                                            <small
                                                class="text-muted">{{ $item->city?->name ?? 'Kota tidak tersedia' }}</small>
                                        </p>

                                        {{-- Ambil harga pertama dari hotel_prices jika ada --}}
                                        @php
                                            $price = optional($item->prices->first())->price;
                                        @endphp

                                        @if ($price)
                                            <p class="card-text"><small class="text-muted">Rp
                                                    {{ number_format($price, 0, ',', '.') }}</small></p>
                                        @else
                                            <p class="card-text"><small class="text-muted">Harga belum tersedia</small></p>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <div class="alert alert-warning">Belum ada data hotel yang tersedia.</div>
                        </div>
                    @endforelse

                    <!-- Pagination Links -->
                    <div class="col-12 mt-4">
                        {!! $hotel->withQueryString()->links('pagination::bootstrap-5') !!}
                    </div>
                </div>
            </div>
        </section>


    </div>
@endsection
