@extends('layouts.admin')

@section('title')
    Dashboard Hotel | Saudinesia
@endsection

@section('Layanan')
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
                        <h3 class="mb-0">Layanan Hotel</h3>
                        <a href="/admin/layanan/hotel-tambah" class="btn btn-primary">Tambah Hotel </a>
                    </div>
                    <div class="row">
                        <form method="GET" class="mb-3">
                            <div class="row g-2 align-items-center">
                                <div class="col-auto">
                                    <label for="period_id" class="col-form-label">Filter Periode:</label>
                                </div>
                                <div class="col-auto">
                                    <select name="period_id" id="period_id" class="form-select"
                                        onchange="this.form.submit()">
                                        <option value="">-- Semua Periode --</option>
                                        @foreach ($periods as $period)
                                            <option value="{{ $period->id }}"
                                                {{ request('period_id') == $period->id ? 'selected' : '' }}>
                                                {{ $period->name }} ({{ $period->formatted_start_date }} -
                                                {{ $period->formatted_end_date }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <div style="min-width: 1200px">
                                <table class="table table-bordered table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Kota</th> {{-- Tambahkan kolom kota --}}
                                            <th>Deskripsi</th>
                                            <th>Alamat</th>
                                            <th>Gambar</th>
                                            <th>Harga per Periode & Tipe Kamar</th>
                                            <th>Maps</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($hotels as $index => $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->city->name ?? '-' }}</td> {{-- Tampilkan nama kota --}}
                                                <td>{{ Str::limit($item->description, 100) }}</td>
                                                <td>{{ $item->address }}</td>
                                                <td>
                                                    @if ($item->images->count() > 0)
                                                        <!-- Tombol untuk membuka modal -->
                                                        <button type="button" class="btn btn-sm btn-outline-primary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#imagesModal{{ $item->id }}">
                                                            Lihat Gambar ({{ $item->images->count() }})
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="imagesModal{{ $item->id }}"
                                                            tabindex="-1"
                                                            aria-labelledby="imagesModalLabel{{ $item->id }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="imagesModalLabel{{ $item->id }}">Gambar
                                                                            Hotel - {{ $item->name }}</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Tutup"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            @foreach ($item->images as $image)
                                                                                <div class="col-md-4 mb-3">
                                                                                    <img src="{{ asset('storage/' . $image->image_path) }}"
                                                                                        class="img-fluid rounded shadow-sm">
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Tutup</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <span class="text-muted">Tidak ada gambar</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    @if ($item->prices->count())
                                                        @php
                                                            $grouped = $item->prices->groupBy('period.name');
                                                        @endphp

                                                        @foreach ($grouped as $periodName => $prices)
                                                            <strong>{{ $periodName }}</strong><br>
                                                            @foreach ($prices as $price)
                                                                - {{ $price->roomType->name }}, Harga Rp.
                                                                {{ number_format($price->price, 0, ',', '.') }}<br>
                                                            @endforeach
                                                            <br>
                                                        @endforeach
                                                    @else
                                                        <span class="text-muted">Belum ada data harga.</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->map_url)
                                                        <a href="{{ $item->map_url }}" class="btn btn-sm btn-outline-info"
                                                            target="_blank">Lihat Maps</a>
                                                    @else
                                                        <span class="text-muted">Tidak tersedia</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-primary mb-1"
                                                        href="{{ route('admin.hotel.edit', $item->id) }}">Edit</a>
                                                    <form action="{{ route('admin.hotel.destroy', $item->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9" class="text-center text-muted">Belum ada data hotel yang
                                                    tersedia.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>

                                </table>
                            </div>
                        </div>

                        @if ($hotels->hasPages())
                            <div class="my-4 d-flex justify-content-center">
                                {!! $hotels->withQueryString()->links('pagination::bootstrap-5') !!}
                            </div>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
