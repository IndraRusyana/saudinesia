@extends('layouts.user')

@section('title')
    Layanan Visa | Saudinesia
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
                <h4>Detail Pengajuan Visa</h4>
                <ul>
                    <li>Nama Lengkap: {{ $data['nama_lengkap'] }}</li>
                    <li>Jenis Kelamin: {{ $data['jenis_kelamin'] }}</li>
                    <li>Tanggal Lahir: {{ $data['tanggal_lahir'] }}</li>
                    <li>Paspor: {{ $data['no_paspor'] ?? '-' }}</li>
                    <li>Tanggal Berangkat: {{ $data['tanggal_berangkat'] ?? '-' }}</li>
                    <li>Tanggal Kembali: {{ $data['tanggal_kembali'] ?? '-' }}</li>
                    <li>Harga: Rp{{ number_format($harga, 0, ',', '.') }}</li>
                </ul>

                <form action="{{ route('user.visa.checkout') }}" method="POST">
                    @csrf

                    {{-- Kirim semua data yang dibutuhkan ke controller --}}
                    @foreach ($data as $key => $value)
                        @if (is_array($value))
                            @foreach ($value as $subKey => $subValue)
                                <input type="hidden" name="{{ $key }}[{{ $subKey }}]"
                                    value="{{ $subValue }}">
                            @endforeach
                        @else
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endif
                    @endforeach

                    {{-- Harga visa --}}
                    <input type="hidden" name="unit_price" value="{{ $harga }}">

                    <button type="submit" class="btn btn-dark">Lanjut Checkout</button>
                </form>
            </div>
        </section>




    </div>
@endsection
