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
                        <h3 class="mb-0">Edit Paket Haji</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">Form Edit Paket Haji</div>
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
                                    <h5 class="card-title mb-3">Silahkan isi form berikut untuk menambah paket haji</h5>
                                    <form action="{{ route('admin.haji.update', $haji->id) }}" method="POST"
                                        enctype="multipart/form-data" accept-charset="utf-8">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 form-label" for="name">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="name" value="{{ old('name', $haji->name) }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 form-label" for="description">Deskripsi</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="description"
                                                    value="{{ old('description', $haji->description) }}"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-2 form-label" for="pricess">Harga</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="prices"
                                                    value="{{ old('prices', $haji->prices) }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 form-label" for="images">Gambar</label>
                                            <div class="col-sm-10">
                                                <input type="file" name="images" class="form-control">
                                                <small class="form-text">Gambar yang tersimpan</small>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        @if ($haji->images)
                                                            <img src="{{ asset('uploads/' . $haji->images) }}" alt="Current Image"
                                                                class="img-thumbnail mt-2" width="150">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 form-label" for="land_arrangement_id">Land
                                                Arrangement</label>
                                            <div class="col-sm-10">
                                                <select name="land_arrangement_id" class="form-control" required>
                                                    <option value="">-- Pilih Land Arrangement --</option>
                                                    @foreach ($landArrangements as $la)
                                                        <option value="{{ $la->id }}"
                                                            {{ $la_data->id == $la->id ? 'selected' : '' }}>{{ $la->name }}</option>
                                                    @endforeach
                                                </select>
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
