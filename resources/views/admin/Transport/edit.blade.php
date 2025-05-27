@extends('layouts.admin')

@section('title')
    Dashboard Transport | Saudinesia
@endsection

@section('Transport')
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
                    <div class="page-title my-3">
                        <h3 class="mb-0">Edit Transport</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">Form Edit Transport</div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title mb-3">Silahkan isi form berikut untuk mengubah Transport</h5>
                                    <form action="{{ route('admin.transport.update', $transport->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Nama Transport</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ old('name', $transport->name) }}">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Deskripsi</label>
                                            <div class="col-sm-10">
                                                <textarea name="description" class="form-control">{{ old('description', $transport->description) }}</textarea>
                                            </div>
                                        </div>

                                         <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Tipe Transport</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="type" class="form-control"
                                                    value="{{ old('name', $transport->type) }}">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="route" class="col-sm-2 form-label">Rute</label>
                                            <div class="col-sm-10">
                                                <select name="route" id="route" class="form-select" required>
                                                    <option value="">-- Pilih Rute --</option>
                                                    @foreach ($routes as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ $transport->route_id == $item->id ? 'selected' : ''}}>
                                                            {{ $item->routes }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-3 pt-2 row">
                                            <label>Gambar Transport (maksimal 4)</label>
                                            <div class="row">
                                                @foreach (range(1, 4) as $i)
                                                    @php
                                                        $image = $transport->images->get($i - 1);
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

                                        <h5>Harga per Periode</h5>
                                        @foreach ($periods as $period)
                                            @php
                                                $existingPrice = $transport->prices
                                                    ->where('period_id', $period->id)
                                                    ->first();
                                            @endphp
                                            <div class="border p-3 mb-3 rounded">
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox"
                                                        value="{{ $period->id }}" name="active_periods[]"
                                                        id="period_{{ $period->id }}"
                                                        {{ $existingPrice ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="period_{{ $period->id }}">
                                                        <strong>{{ $period->name }}</strong>
                                                        ({{ $period->formatted_start_date }} -
                                                        {{ $period->formatted_end_date }})
                                                    </label>
                                                </div>

                                                <div class="mt-2">
                                                    <label>Harga</label>
                                                    <input type="number" name="prices[{{ $period->id }}]"
                                                        class="form-control"
                                                        value="{{ $existingPrice ? $existingPrice->price : '' }}">
                                                </div>
                                            </div>
                                        @endforeach

                                        <button type="submit" class="btn btn-success">Update Transport</button>
                                        <a href="{{ route('admin.transport.index') }}" class="btn btn-secondary">Batal</a>
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
