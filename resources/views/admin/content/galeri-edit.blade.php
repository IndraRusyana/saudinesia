@extends('layouts.admin')

@section('title')
    Dashboard Galeri | Saudinesia
@endsection

@section('Galeri')
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
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="page-title my-3 d-flex justify-content-between align-items-center pb-3">
                        <h3 class="mb-0">Edit Galeri</h3>
                    </div>
                    <form action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST"
                        enctype="multipart/form-data" class="mt-4">
                        @csrf

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control"
                                value="{{ old('nama', $galeri->nama) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select name="kategori" class="form-select">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori }}"
                                        {{ $galeri->kategori == $kategori ? 'selected' : '' }}>
                                        {{ $kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Gambar Saat Ini:</label><br>
                            <img src="{{ asset('uploads/' . $galeri->gambar) }}" alt="Gambar Galeri" width="150"
                                class="mb-2"><br>
                            <input type="file" name="gambar" class="form-control">
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.content.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
