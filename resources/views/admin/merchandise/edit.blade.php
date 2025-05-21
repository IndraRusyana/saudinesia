@extends('layouts.admin')

@section('title')
    Dashboard Merchandise | Saudinesia
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
                        <h3 class="mb-0">Edit Merchandise</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">Form Edit Merchandise</div>
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
                                    <h5 class="card-title mb-3">Silahkan isi form berikut untuk mengedit Merchandise</h5>
                                    <form action="{{ route('admin.merchandise.update', $merchandise->id) }}" method="POST"
                                        enctype="multipart/form-data" accept-charset="utf-8">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 form-label" for="name">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="name" value="{{ old('name', $merchandise->name) }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 form-label" for="description">Deskripsi</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="description"
                                                    value="{{ old('description', $merchandise->description) }}"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-2 form-label" for="prices">Harga</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="prices"
                                                    value="{{ old('prices', $merchandise->prices) }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 form-label" for="images">Gambar</label>
                                            <div class="col-sm-10">
                                                <input type="file" name="images" class="form-control">
                                                <small class="form-text">Gambar yang tersimpan</small>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        @if ($merchandise->images)
                                                            <img src="{{ asset('uploads/' . $merchandise->images) }}" alt="Current Images"
                                                                class="img-thumbnail mt-2" width="150">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-sm-10 offset-sm-2">
                                                <button type="submit" class="btn btn-primary">Edit</button>
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
