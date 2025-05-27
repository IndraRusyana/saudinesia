@extends('layouts.user')

@section('title')
    Checkout | Saudinesia
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
            <div class="container contact-form-section py-5 ">
                <div class="form-section shadow-sm border">
                    <!-- Stepper -->
                    <div class="stepper mb-4">
                        <div class="step-circle">1</div>
                        <div class="step-circle inactive">2</div>
                        <div class="step-circle inactive">3</div>
                    </div>

                    <h3>Konfirmasi Pembelian</h3>

                    <p>Layanan: {{ $itemable->name ?? $itemable->title }}</p>
                    <p>Harga: Rp{{ number_format($unit_price, 0, ',', '.') }}</p>
                    <p>Jumlah: {{ $quantity }}</p>
                    <p><strong>Total: Rp{{ number_format($total, 0, ',', '.') }}</strong></p>

                    <form method="POST" action="{{ route('invoice.generate') }}">
                        @csrf
                        <input type="hidden" name="itemable_type" value="{{ get_class($itemable) }}">
                        <input type="hidden" name="itemable_id" value="{{ $itemable->id }}">
                        <input type="hidden" name="quantity" value="{{ $quantity }}">
                        <input type="hidden" name="unit_price" value="{{ $unit_price }}">
                        <button type="submit" class="btn btn-success">Lanjut ke Invoice</button>
                    </form>

                </div>

            </div>

        </section>

    </div>
@endsection
