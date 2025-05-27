@extends('layouts.admin')

@section('title')
    Dashboard Muttowif | Saudinesia
@endsection

@section('Muttowif')
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
                        <h3 class="mb-0">Pemesanan Muttowif</h3>
                    </div>
                    <div class="row px-2">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Akun</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Berakhir</th>
                                    <th>Jumlah Jamaah</th>
                                    <th>Tanggal Pemesanan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($muttowif as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->user->name ?? '-' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->start_date)->format('d-m-Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->end_date)->format('d-m-Y') }}</td>
                                        <td>{{ $item->jamaah_count }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y H:i') }}</td>
                                        <td><button type="submit" class="btn btn-success btn-sm">Konfirmasi</button></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Belum ada data pemesanan Muttowif yang
                                            tersedia.</td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>

                        @if ($muttowif->hasPages())
                            <div class="my-4 d-flex justify-content-center">
                                {!! $muttowif->withQueryString()->links('pagination::bootstrap-5') !!}
                            </div>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
