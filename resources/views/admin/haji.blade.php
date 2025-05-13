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
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="page-title my-3 d-flex justify-content-between align-items-center pb-3">
                        <h3 class="mb-0">Paket Haji</h3>
                        <a href="/admin/paket/haji-tambah" class="btn btn-primary">Tambah Paket</a
                            href="/admin/paket/haji/tambah">
                    </div>
                    <div class="row">
                        @forelse ($query as $index => $item)
                            <div class="col-lg-3">
                                <div class="card mb-3">
                                    <img class="card-img-top" src="{{ asset('storage/' . $item->image) }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->name }}</h5>
                                        <p class="card-text">{{ Str::limit($item->description, 100, '...') }}</p>
                                        <p class="card-text"><small class="text-muted">Rp {{ number_format($item->price, 0, ',', '.') }}</small></p>
                                    </div>
                                    <div class="card-footer">
                                        <a class="btn btn-primary" href="{{ route('admin.haji.edit', $item->id) }}">Edit</a>
                                        <form action="{{ route('admin.haji.destroy', $item->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center">
                                <div class="alert alert-warning">Belum ada data paket haji yang tersedia.</div>
                            </div>
                        @endforelse
                    
                        @if ($query->hasPages())
                            <div class="my-5 d-flex justify-content-center">
                                {!! $query->withQueryString()->links('pagination::bootstrap-5') !!}
                            </div>
                        @endif
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
