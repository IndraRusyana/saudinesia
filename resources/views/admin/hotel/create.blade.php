@extends('layouts.admin')

@section('title')
    Dashboard Hotel | Saudinesia
@endsection

@section('layanan')
    active
@endsection

@section('content')
    <div class="wrapper">
        <!-- Sodebar -->
        @include('components.admin.sidebar')
        <!-- Sodebar -->
        <div id="body">
            <!-- Navbar -->
            @include('components.admin.navbar')
            <!-- Navbar -->
            <div class="content">
                <div class="container">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Oops!</strong> Ada kesalahan pada inputan:<br><br>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="page-title my-3">
                        <h3 class="mb-0">Tambah Hotel</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">Form Tambah Paket Hotel</div>
                                <div class="card-body">
                                    <h5 class="card-title mb-3">Silahkan isi form berikut untuk menambah paket hotel</h5>
                                    <form action="{{ route('admin.hotel.store') }}" method="POST"
                                        enctype="multipart/form-data" accept-charset="utf-8">
                                        @csrf
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 form-label" for="name">Nama Hotel</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="name" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="city_id" class="col-sm-2 form-label">Kota</label>
                                            <div class="col-sm-10">
                                                <select name="city_id" id="city_id" class="form-select" required>
                                                    <option value="">-- Pilih Kota --</option>
                                                    @foreach ($cities as $city)
                                                        <option value="{{ $city->id }}"
                                                            {{ old('city_id', $hotel->city_id ?? '') == $city->id ? 'selected' : '' }}>
                                                            {{ $city->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 form-label" for="address">Alamat</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="address" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-2 form-label" for="descriotion">Deskripsi</label>
                                            <div class="col-sm-10">
                                                <textarea name="description" class="form-control" rows="4" required></textarea>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 form-label" for="map_url">Link Google Maps</label>
                                            <div class="col-sm-10">
                                                <input type="url" name="map_url" class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 form-label" for="images">Gambar Hotel (maksimal 4
                                                gambar)</label>
                                            <div class="col-sm-10">
                                                @for ($i = 0; $i < 4; $i++)
                                                    <input type="file" name="images[]" class="form-control mb-2"
                                                        {{ $i == 0 ? 'required' : '' }}>
                                                @endfor
                                            </div>
                                        </div>

                                        <hr>
                                        <h5>Harga per Periode & Tipe Kamar</h5>
                                        @foreach ($periods as $period)
                                            <div class="border p-3 mb-3 rounded">
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox"
                                                        value="{{ $period->id }}" name="active_periods[]"
                                                        id="period_{{ $period->id }}">
                                                    <label class="form-check-label" for="period_{{ $period->id }}">
                                                        <strong>{{ $period->name }}</strong>
                                                        ({{ $period->formatted_start_date }} -
                                                        {{ $period->formatted_end_date }})
                                                    </label>
                                                </div>

                                                <div class="row">
                                                    @foreach ($roomTypes as $roomType)
                                                        <div class="col-md-4 mt-2">
                                                            <label>{{ $roomType->name }} - Harga</label>
                                                            <input type="number"
                                                                name="prices[{{ $period->id }}][{{ $roomType->id }}]"
                                                                class="form-control">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach

                                        <div class="mb-3 row">
                                            <div class="col-sm-10 offset-sm-2">
                                                <button type="submit" class="btn btn-primary">Tambah</button>
                                                <a href="{{ route('admin.hotel.index') }}"
                                                    class="btn btn-secondary">Batal</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
