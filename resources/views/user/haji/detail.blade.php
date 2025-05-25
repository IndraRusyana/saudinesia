@extends('layouts.user')

@section('title')
    Detail Haji | Saudinesia
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
            <div class="container py-5">
                <div class="row g-4">
                    <!-- Image Grid -->
                    <div class="col-lg-8">
                        <div class="row g-2 image-grid">
                            <div class="col-12">
                                <img src="{{ asset('uploads/' . $haji->images) }}" class="img-fluid w-100 img-large"
                                    alt="{{ $haji->name }}">
                            </div>
                            {{-- Jika ingin tambah gambar kecil lain, kamu bisa menambahkan relasi gallery --}}
                            {{-- <div class="col-4">
                                <img src="{{ asset('uploads/' . $haji->image) }}" class="img-fluid" alt="">
                            </div>
                            <div class="col-4">
                                <img src="{{ asset('uploads/' . $haji->image) }}" class="img-fluid" alt="">
                            </div>
                            <div class="col-4">
                                <img src="{{ asset('uploads/' . $haji->image) }}" class="img-fluid" alt="">
                            </div> --}}
                        </div>
                    </div>

                    <!-- Info & Sidebar -->
                    <div class="col-lg-4">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h4 class="fw-bold">{{ $haji->name }}</h4>
                                <p class="text-muted mb-2">Bus, 100 kapasitas</p> {{-- Ganti sesuai kolom jika ada --}}
                            </div>
                            <div>
                                <i class="bi bi-heart me-2"></i>
                                <i class="bi bi-share"></i>
                            </div>
                        </div>

                        <div class="price-box mt-4">
                            <h5 class="fw-bold">IDR. {{ number_format($haji->prices, 0, ',', '.') }}</h5>
                            <hr>

                            {{-- Input jumlah (berlaku untuk kedua form) --}}
                            <div class="mb-2">
                                <label for="quantity">Jumlah:</label>
                                <input type="number" id="quantityInput" name="quantity" value="1" min="1"
                                    class="form-control" required>
                            </div>

                            {{-- Form Checkout --}}
                            <form id="checkoutForm" action="{{ route('checkout.confirm') }}" method="POST">
                                @csrf
                                <input type="hidden" name="itemable_type" value="{{ get_class($item) }}">
                                <input type="hidden" name="itemable_id" value="{{ $item->id }}">
                                <input type="hidden" name="quantity" id="checkoutQuantity" value="1">
                                <input type="hidden" name="unit_price" value="{{ $item->prices }}">
                                <button type="submit" class="btn btn-dark btn-dark-rounded mb-3">Pesan Langsung</button>
                            </form>

                            @include('components.success')

                            {{-- Form Tambah ke Keranjang --}}
                            <form id="cartForm" action="{{ route('carts.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="itemable_type" value="{{ get_class($item) }}">
                                <input type="hidden" name="itemable_id" value="{{ $item->id }}">
                                <input type="hidden" name="quantity" id="cartQuantity" value="1">
                                <input type="hidden" name="unit_price" value="{{ $item->prices }}">
                                <button type="submit" class="btn btn-primary">Tambah ke Keranjang</button>
                            </form>
                        </div>

                    </div>
                </div>

                <!-- Deskripsi -->
                <div class="row mt-5">
                    <div class="col-lg-8">
                        <h6 class="fw-bold">Deskripsi Paket</h6>
                        <p class="text-muted">{!! nl2br(e($haji->description)) !!}</p>
                    </div>
                </div>

            </div>

        </section>

    </div>

    <script>
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
