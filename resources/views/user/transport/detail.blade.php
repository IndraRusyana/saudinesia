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
                                    <img src="{{ asset('uploads/' . $transport->images->first()->image_path) }}"
                                        class="img-fluid w-100 img-large" alt="{{ $transport->name }}">
                                </div>
                                @foreach ($transport->images->skip(1)->take(3) as $image)
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
                                <input type="hidden" name="unit_price" value="{{ $filteredPrices->first()->price }}">
                                <button type="submit" class="btn btn-dark btn-dark-rounded mb-3">Pesan Langsung</button>
                            </form>
                            @include('components.success')
                            <form action="{{ route('carts.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="itemable_type" value="{{ get_class($item) }}">
                                <input type="hidden" name="itemable_id" value="{{ $item->id }}">
                                <input type="hidden" name="quantity" id="cartQuantity" value="1">
                                <input type="hidden" name="unit_price" value="{{ $filteredPrices->first()->price }}">
                                <button type="submit" class="btn btn-primary">Tambah ke Keranjang</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Deskripsi -->
                <div class="row mt-5">
                    <div class="col-lg-8">
                        <h6 class="fw-bold">Deskripsi Paket</h6>
                        <p class="text-muted">{{ $transport->description }}</p>

                        <h6 class="fw-bold">Route</h6>
                        <p class="text-muted">{{ $transport->routes->first()->routes }}</p>

                        <h6 class="fw-bold">Periode</h6>
                        <p class="text-muted">{{ $selectedPeriod->name }}</p>
                    </div>
                </div>
            </div>

        </section>

    </div>

    <script>
        document.querySelectorAll('input[name="room_type_id"]').forEach(radio => {
            radio.addEventListener('change', function() {
                const selectedPrice = this.dataset.price;
                const priceInput = document.getElementById('unit_price_input');
                if (priceInput) {
                    priceInput.value = selectedPrice;
                }
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
