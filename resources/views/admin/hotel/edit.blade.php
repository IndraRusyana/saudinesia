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
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="page-title my-3">
                        <h3 class="mb-0">Edit Hotel</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">Form Edit Hotel</div>
                                <div class="card-body">
                                    <h5 class="card-title mb-3">Silahkan isi form berikut untuk menambah paket hotel</h5>
                                    <form action="{{ route('admin.hotel.update', $hotel->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-3">
                                            <label>Nama Hotel</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ old('name', $hotel->name) }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="city_id" class="form-label">Kota</label>
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

                                        <div class="mb-3">
                                            <label>Alamat</label>
                                            <textarea name="address" class="form-control">{{ old('address', $hotel->address) }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label>Deskripsi</label>
                                            <textarea name="description" class="form-control">{{ old('description', $hotel->description) }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label>Link Google Maps (opsional)</label>
                                            <input type="url" name="map_url" class="form-control"
                                                value="{{ old('map_url', $hotel->map_url) }}">
                                        </div>

                                        <div class="mb-3">
                                            <label>Gambar Hotel (maksimal 4)</label>
                                            <div class="row">
                                                @foreach (range(1, 4) as $i)
                                                    @php
                                                        $image = $hotel->images->get($i - 1);
                                                    @endphp
                                                    <div class="col-md-3 mb-3">
                                                        <label for="image{{ $i }}">Gambar
                                                            {{ $i }}</label>
                                                        <input type="file" name="image{{ $i }}"
                                                            class="form-control mb-1">
                                                        @if ($image)
                                                            <img src="{{ asset('uploads/' . $image->image_path) }}"
                                                                class="img-thumbnail" width="150">
                                                        @else
                                                            <img src="https://via.placeholder.com/150x100?text=No+Image"
                                                                class="img-thumbnail" width="150">
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>


                                        <h5>Harga per Periode & Tipe Kamar</h5>
                                        @foreach ($periods as $period)
                                            @php
                                                $hasPeriod =
                                                    $hotel->prices->where('period_id', $period->id)->count() > 0;
                                            @endphp
                                            <div class="border p-3 mb-3 rounded">
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox"
                                                        value="{{ $period->id }}" name="active_periods[]"
                                                        id="period_{{ $period->id }}" {{ $hasPeriod ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="period_{{ $period->id }}">
                                                        <strong>{{ $period->name }}</strong>
                                                        ({{ $period->formatted_start_date }} -
                                                        {{ $period->formatted_end_date }})
                                                    </label>
                                                </div>

                                                <div class="row">
                                                    @foreach ($roomTypes as $roomType)
                                                        @php
                                                            $existingPrice = $hotel->prices
                                                                ->where('period_id', $period->id)
                                                                ->where('room_type_id', $roomType->id)
                                                                ->first();
                                                        @endphp
                                                        <div class="col-md-4 mt-2">
                                                            <label>{{ $roomType->name }} - Harga</label>
                                                            <input type="number"
                                                                name="prices[{{ $period->id }}][{{ $roomType->id }}]"
                                                                class="form-control"
                                                                value="{{ $existingPrice ? $existingPrice->price : '' }}">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach

                                        <button type="submit" class="btn btn-success">Update Hotel</button>
                                        <a href="{{ route('admin.hotel.index') }}" class="btn btn-secondary">Batal</a>
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
