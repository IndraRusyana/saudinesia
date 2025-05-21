@extends('layouts.admin')

@section('title')
    Dashboard Haji | Saudinesia
@endsection

@section('Paket')
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
                        <h3 class="mb-0">Tambah Paket Haji</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">Form Tambah Paket Haji</div>
                                <div class="card-body">
                                    <h5 class="card-title mb-3">Silahkan isi form berikut untuk menambah paket haji</h5>
                                    <form action="{{ route('admin.haji.store') }}" method="POST"
                                        enctype="multipart/form-data" accept-charset="utf-8">
                                        @csrf
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 form-label" for="name">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="name" placeholder="Nama Paket"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 form-label" for="description">Deskripsi</label>
                                            <div class="col-sm-10">
                                                <textarea name="description" class="form-control" rows="4" required></textarea>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-2 form-label" for="prices">Harga</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="prices" placeholder="Rp 1.500.000"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 form-label" for="images">Gambar</label>
                                            <div class="col-sm-10">
                                                <input type="file" name="images" class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 form-label" for="land_arrangement_id">Land
                                                Arrangement</label>
                                            <div class="col-sm-10">
                                                <select name="land_arrangement_id" class="form-control" required>
                                                    <option value="">-- Pilih Land Arrangement --</option>
                                                    @foreach ($landArrangements as $la)
                                                        <option value="{{ $la->id }}">{{ $la->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <div class="col-sm-10 offset-sm-2">
                                                <button type="submit" class="btn btn-primary">Tambah</button>
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
