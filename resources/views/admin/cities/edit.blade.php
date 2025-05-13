@extends('layouts.admin')

@section('title')
    Dashboard Kota | Saudinesia
@endsection

@section('Kota')
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
                        <h3 class="mb-0">Edit Kota</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">Form Edit Kota</div>
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
                                    <h5 class="card-title mb-3">Silahkan isi form berikut untuk mengubah Kota</h5>
                                    <form action="{{ route('admin.cities.update', $cities->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                    
                                        {{-- Nama Kota --}}
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label" for="name">Nama Kota</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="name" id="name" value="{{ old('name', $cities->name) }}" class="form-control" required>
                                            </div>
                                        </div>
                                    
                                        {{-- Tombol Submit --}}
                                        <div class="mb-3 row">
                                            <div class="col-sm-10 offset-sm-2">
                                                <button type="submit" class="btn btn-primary">Perbarui</button>
                                                <a href="{{ route('admin.cities.index') }}" class="btn btn-secondary">Batal</a>
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
