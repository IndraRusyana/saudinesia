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
                        <h3 class="mb-0">Tambah Kota</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">Form Tambah Kota</div>
                                <div class="card-body">
                                    <h5 class="card-title mb-3">Silahkan isi form berikut untuk menambah Kota</h5>
                                    <form action="{{ route('admin.cities.store') }}" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
                                        @csrf       
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 form-label" for="name">Nama Kota</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="name" class="form-control" placeholder="Contoh: Jakarta" required>
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
