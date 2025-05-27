@extends('layouts.admin')

@section('title')
    Dashboard Periode | Saudinesia
@endsection

@section('periode')
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
                        <h3 class="mb-0">Periode</h3>
                        <a href="/admin/periode-tambah" class="btn btn-primary">Tambah Periode</a>
                    </div>
                    <div class="row px-2">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Periode</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Berakhir</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($periods as $index => $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->formatted_start_date }}</td>
                                        <td>{{ $item->formatted_end_date }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-primary"
                                                href="{{ route('admin.periods.edit', $item->id) }}">Edit</a>
                                            <form action="{{ route('admin.periods.destroy', $item->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Belum ada data periode yang tersedia.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        @if ($periods->hasPages())
                            <div class="my-4 d-flex justify-content-center">
                                {!! $periods->withQueryString()->links('pagination::bootstrap-5') !!}
                            </div>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
