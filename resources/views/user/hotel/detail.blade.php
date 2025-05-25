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
                            @if ($hotel->images->count())
                                <div class="col-12">
                                    <img src="{{ asset('uploads/' . $hotel->images->first()->image_path) }}"
                                        class="img-fluid w-100 img-large" alt="{{ $hotel->name }}">
                                </div>
                                @foreach ($hotel->images->skip(1)->take(3) as $image)
                                    <div class="col-4">
                                        <img src="{{ asset('uploads/' . $image->image_path) }}" class="img-fluid"
                                            alt="Gambar tambahan">
                                    </div>
                                @endforeach
                            @else
                                <div class="col-12">
                                    <div class="img-placeholder img-large w-100">No Image Available</div>
                                </div>
                            @endif
                        </div>

                        <!-- Informasi Hotel -->
                        <div class="mt-4">
                            <h4 class="fw-bold">{{ $hotel->name }}</h4>
                            <p class="text-muted mb-1">{{ $hotel->address }}</p>
                            <div class="mb-2">{!! str_repeat('★', $hotel->stars) !!}{!! str_repeat('☆', 5 - $hotel->stars) !!}</div>

                            <h6 class="fw-bold">Deskripsi</h6>
                            <p class="text-muted">{{ $hotel->description }}</p>

                            <h6 class="fw-bold">Periode</h6>
                            <ul class="text-muted">
                                <p class="text-muted">
                                    {{ $selectedPeriod ? $selectedPeriod->name : 'Tidak ada periode yang dipilih' }}
                                </p>
                            </ul>

                            @if ($hotel->map_url)
                                <div class="map-placeholder d-flex justify-content-center align-items-center">
                                    <iframe src="{{ $hotel->map_url }}" width="100%" height="300" style="border:0;"
                                        allowfullscreen=""></iframe>
                                </div>
                            @else
                                <div class="map-placeholder d-flex justify-content-center align-items-center text-muted">
                                    [Google Maps Belum Tersedia]
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- harga sidebar --}}
                    <div class="col-lg-4">
                        <div class="price-box">
                            <h5 class="fw-bold mb-3">Pilih Tipe Kamar</h5>

                            <form action="/hotel/pemesanan" method="GET">
                                @foreach ($filteredPrices->groupBy('room_type_id') as $roomTypeId => $groupedPrices)
                                    @php
                                        $roomType = $groupedPrices->first()->roomType;
                                        $minPrice = $groupedPrices->min('price');
                                        $maxPrice = $groupedPrices->max('price');
                                        $labelPrice =
                                            $minPrice === $maxPrice
                                                ? 'Rp ' . number_format($minPrice, 0, ',', '.')
                                                : 'Rp ' .
                                                    number_format($minPrice, 0, ',', '.') .
                                                    ' - Rp ' .
                                                    number_format($maxPrice, 0, ',', '.');
                                    @endphp
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="room_type_id"
                                            id="room_{{ $roomType->id }}" value="{{ $roomType->id }}"
                                            data-price="{{ $minPrice }}" required>
                                        <label class="form-check-label" for="room_{{ $roomType->id }}">
                                            {{ ucfirst($roomType->name) }} - {{ $labelPrice }}
                                        </label>
                                    </div>
                                @endforeach



                            </form>

                            {{-- Input jumlah (berlaku untuk kedua form) --}}
                            <div class="mb-2">
                                <label for="quantity">Jumlah:</label>
                                <input type="number" id="quantityInput" name="quantity" value="1" min="1"
                                    class="form-control" required>
                            </div>

                            <form action="{{ route('checkout.confirm') }}" method="POST">
                                @csrf
                                <input type="hidden" name="itemable_type" value="{{ get_class($item) }}">
                                <input type="hidden" name="itemable_id" value="{{ $item->id }}">
                                <input type="hidden" name="quantity" id="checkoutQuantity" value="1">
                                <input type="hidden" id="unit_price_checkout" name="unit_price" value="">
                                <button type="submit" class="btn btn-dark btn-dark-rounded mb-3">Pesan Langsung</button>
                            </form>
                            @include('components.success')
                            <form action="{{ route('carts.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="itemable_type" value="{{ get_class($item) }}">
                                <input type="hidden" name="itemable_id" value="{{ $item->id }}">
                                <input type="hidden" name="quantity" id="cartQuantity" value="1">
                                <input type="hidden" id="unit_price_cart" name="unit_price" value="">
                                <button type="submit" class="btn btn-primary">Tambah ke Keranjang</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        document.querySelectorAll('input[name="room_type_id"]').forEach(radio => {
            radio.addEventListener('change', function() {
                const selectedPrice = this.dataset.price;
                document.getElementById('unit_price_checkout').value = selectedPrice;
                document.getElementById('unit_price_cart').value = selectedPrice;
            });
        });

        // Saat user mengubah jumlah, update ke kedua form
        const quantityInput = document.getElementById('quantityInput');
        const checkoutQuantity = document.getElementById('checkoutQuantity');
        const cartQuantity = document.getElementById('cartQuantity');

        quantityInput.addEventListener('input', function() {
            checkoutQuantity.value = this.value;
            cartQuantity.value = this.value;
        });
    </script>


@endsection
