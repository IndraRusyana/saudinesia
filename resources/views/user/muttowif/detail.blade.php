@extends('layouts.user')

@section('title')
    Layanan Muttowif | Saudinesia
@endsection

@section('muttowif')
    active
@endsection

@section('content')
    <div class="container">

        <!-- breadcumb -->
        <x-user.breadcrumb :breadcrumbs="$breadcrumbs" />
        <!-- breadcumb -->

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <section class="d-flex justify-content-center align-items-center my-5">
            <div class="card p-4" style="max-width: 500px; width: 100%;">
                <h4>Detail Pesanan Muttowif</h4>
                <ul>
                    <li>Mulai: {{ $data['start_date'] }}</li>
                    <li>Sampai: {{ $data['end_date'] }}</li>
                    <li>Jumlah Jamaah: {{ $data['jamaah_count'] }}</li>
                    <li>Harga: Rp{{ number_format($harga, 0, ',', '.') }}</li>
                </ul>

                <form action="{{ route('user.muttowif.checkout') }}" method="POST">
                    @csrf
                    <input type="hidden" name="start_date" value="{{ $data['start_date'] }}">
                    <input type="hidden" name="end_date" value="{{ $data['end_date'] }}">
                    <input type="hidden" name="jamaah_count" value="{{ $data['jamaah_count'] }}">
                    <input type="hidden" name="unit_price" value="{{ $harga }}">
                    <button type="submit" class="btn btn-dark">Lanjut Checkout</button>
                </form>



            </div>
        </section>


    </div>
@endsection
