@extends('layouts.admin')

@section('title')
    Dashboard Informasi | Saudinesia
@endsection

@section('Informasi')
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
                        <h3 class="mb-0">Edit Informasi</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">Form Edit Informasi</div>
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
                                    <h5 class="card-title mb-3">Silahkan isi form berikut untuk mengubah Informasi</h5>
                                    <form action="{{ route('admin.informations.update', $informations->id) }}" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
                                        @csrf
                                        @method('PUT')
                                    
                                        {{-- Nama Informasi --}}
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label" for="title">Nama Informasi</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="title" id="title" value="{{ old('title', $informations->title) }}" class="form-control" required>
                                            </div>
                                        </div>
                                    
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 form-label" for="content">Konten</label>
                                            <div class="col-sm-10">
                                                <textarea name="content" class="form-control" rows="4" required>{{ old('content', $informations->content) }}</textarea>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-2 form-label" for="images">Gambar</label>
                                            <div class="col-sm-10">
                                                <input type="file" name="images" class="form-control">
                                                <small class="form-text">Gambar yang tersimpan</small>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        @if ($informations->images)
                                                            <img src="{{ asset('storage/' . $informations->images) }}" alt="Current Images"
                                                                class="img-thumbnail mt-2" width="150">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                        {{-- Tombol Submit --}}
                                        <div class="mb-3 row">
                                            <div class="col-sm-10 offset-sm-2">
                                                <button type="submit" class="btn btn-primary">Perbarui</button>
                                                <a href="{{ route('admin.informations.index') }}" class="btn btn-secondary">Batal</a>
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
