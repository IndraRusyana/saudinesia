@extends('layouts.admin')

@section('title')
    Dashboard Periode | Saudinesia
@endsection

@section('Periode')
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
                        <h3 class="mb-0">Edit Periode</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">Form Edit Periode</div>
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
                                    <h5 class="card-title mb-3">Silahkan isi form berikut untuk mengubah Periode</h5>
                                    <form action="{{ route('admin.periods.update', $periods->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                    
                                        {{-- Nama Periode --}}
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label" for="name">Nama Periode</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="name" id="name" value="{{ old('name', $periods->name) }}" class="form-control" required>
                                            </div>
                                        </div>
                                    
                                        {{-- Tanggal Mulai --}}
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label" for="start_date">Tanggal Mulai</label>
                                            <div class="col-sm-10">
                                                <input type="date" name="start_date" id="start_date" value="{{ old('start_date', \Carbon\Carbon::parse($periods->start_date)->format('Y-m-d')) }}" class="form-control" required>
                                            </div>
                                        </div>
                                    
                                        {{-- Tanggal Selesai --}}
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label" for="end_date">Tanggal Selesai</label>
                                            <div class="col-sm-10">
                                                <input type="date" name="end_date" id="end_date" value="{{ old('end_date', \Carbon\Carbon::parse($periods->end_date)->format('Y-m-d')) }}" class="form-control" required>
                                            </div>
                                        </div>
                                    
                                        {{-- Tombol Submit --}}
                                        <div class="mb-3 row">
                                            <div class="col-sm-10 offset-sm-2">
                                                <button type="submit" class="btn btn-primary">Perbarui</button>
                                                <a href="{{ route('admin.periods.index') }}" class="btn btn-secondary">Batal</a>
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
