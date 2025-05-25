@extends('layouts.admin')

@section('title')
    Dashboard Konten | Saudinesia
@endsection

@section('Konten')
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
                        <h3 class="mb-0">Konten</h3>
                    </div>
                    <div class="row px-2">
                        {{-- HERO SECTION --}}
                        <div class="card mb-5">
                            <div class="card-header"><h3>Hero Section</h3></div>
                            <div class="card-body">
                                <form action="{{ route('admin.hero.update') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $hero->id }}">
                                    <div class="mb-3">
                                        <label for="title">Judul</label>
                                        <input type="text" class="form-control" name="title"
                                            value="{{ $hero->title }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="description">Deskripsi</label>
                                        <textarea name="description" class="form-control">{{ $hero->description }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="image">Gambar Sekarang:</label><br>
                                        <img src="{{ asset('uploads/' . $hero->image) }}" width="200">
                                        <input type="file" class="form-control mt-2" name="image">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Hero</button>
                                </form>
                            </div>
                        </div>

                        {{-- TESTIMONI SECTION --}}
                        <div class="card mb-5">
                            <div class="card-header"><h3>Testimoni</h3></div>
                            <div class="card-body">
                                @foreach ($testimonis as $testimoni)
                                    <form action="{{ route('admin.testimoni.update', $testimoni->id) }}" method="POST"
                                        enctype="multipart/form-data" class="mb-4 border p-3">
                                        @csrf
                                        <div class="mb-2">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control" name="nama"
                                                value="{{ $testimoni->nama }}">
                                        </div>
                                        <div class="mb-2">
                                            <label for="deskripsi">Deskripsi</label>
                                            <textarea class="form-control" name="deskripsi">{{ $testimoni->deskripsi }}</textarea>
                                        </div>
                                        <div class="mb-2">
                                            <label>Foto Saat Ini:</label><br>
                                            @if ($testimoni->foto)
                                                <img src="{{ asset('uploads/' . $testimoni->foto) }}" width="100">
                                            @endif
                                            <input type="file" class="form-control mt-2" name="foto">
                                        </div>
                                        <button class="btn btn-success" type="submit">Update Testimoni</button>
                                    </form>
                                @endforeach
                            </div>
                        </div>

                        {{-- GALERI SECTION --}}
                        <div class="card">
                            <div class="page-title my-3 d-flex justify-content-between align-items-center pb-3">
                                <h3 class="ms-3">Galeri</h3>
                                <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary">+ Tambah Galeri
                                    Baru</a>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered align-middle">
                                        <thead class="table-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Deskripsi</th>
                                                <th>Kategori</th>
                                                <th>Gambar</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($galeris as $index => $galeri)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $galeri->nama }}</td>
                                                    <td>{{ Str::limit($galeri->deskripsi, 50) }}</td>
                                                    <td>{{ $galeri->kategori }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ asset('uploads/' . $galeri->gambar) }}" target="_blank"
                                                            class="btn btn-sm btn-secondary">Lihat</a>
                                                    </td>
                                                    <td class="text-center">
                                                        {{-- Update --}}
                                                        <a href="{{ route('admin.galeri.edit', $galeri->id) }}"
                                                            class="btn btn-sm btn-info">Update</a>

                                                        {{-- Delete --}}
                                                        <form action="{{ route('admin.galeri.delete', $galeri->id) }}"
                                                            method="POST" class="d-inline"
                                                            onsubmit="return confirm('Yakin ingin menghapus galeri ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-sm btn-danger">Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @if ($galeris->isEmpty())
                                                <tr>
                                                    <td colspan="6" class="text-center">Belum ada data galeri.</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
