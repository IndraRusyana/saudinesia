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
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <div class="page-title my-3">
                        <h3 class="mb-0">Tambah Transport</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">Form Tambah Transport</div>
                                <div class="card-body">
                                    <h5 class="card-title mb-3">Silahkan isi form berikut untuk menambah Transport</h5>
                                    <form action="{{ route('admin.transport.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Nama Transport</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Contoh: Bus Jabal" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Deskripsi</label>
                                            <div class="col-sm-10">
                                                <textarea name="description" class="form-control" rows="3" placeholder="Deskripsi transportasi..." required></textarea>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Tipe Transport</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="type" class="form-control"
                                                    placeholder="Contoh: Bus / Mobil / Pesawat" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Rute</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="route" class="form-control"
                                                    placeholder="Contoh: Makkah - Madinah" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Jadwal</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="schedule" class="form-control"
                                                    placeholder="Contoh: Setiap Hari Pukul 07:00" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Gambar (maks. 4)</label>
                                            <div class="col-sm-10">
                                                @for ($i = 0; $i < 4; $i++)
                                                    <input type="file" name="images[]" class="form-control mb-2"
                                                        {{ $i == 0 ? 'required' : '' }}>
                                                @endfor
                                            </div>
                                        </div>

                                        <hr>

                                        <h5 class="mt-3">Harga per Periode</h5>
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

                                                <div class="mt-2">
                                                    <label for="price_{{ $period->id }}">Harga Transport</label>
                                                    <input type="number" class="form-control"
                                                        name="prices[{{ $period->id }}]" id="price_{{ $period->id }}">
                                                </div>
                                            </div>
                                        @endforeach


                                        <div class="mb-3 row">
                                            <div class="col-sm-10 offset-sm-2">
                                                <button type="submit" class="btn btn-primary">Tambah Transport</button>
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
