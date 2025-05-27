@extends('layouts.admin')

@section('title')
    Dashboard Rute | Saudinesia
@endsection

@section('Rute')
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
                        <h3 class="mb-0">Edit Rute</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">Form Edit Rute</div>
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
                                    <h5 class="card-title mb-3">Silahkan isi form berikut untuk mengubah Rute</h5>
                                    <form action="{{ route('admin.routes.update', $routes->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Nama Rute</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="routes" class="form-control"
                                                    value="{{ old('routes', $routes->routes) }}">
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-success">Update Rute</button>
                                        <a href="{{ route('admin.routes.index') }}" class="btn btn-secondary">Batal</a>
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
