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
                                        <td>{{ $item->user->profile->nama_lengkap ?? '-' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->start_date)->format('d-m-Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->end_date)->format('d-m-Y') }}</td>
                                        <td>{{ $item->jamaah_count }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y H:i') }}</td>
                                        <td>
                                            @php
                                                $transaction = $item->transactionItem->transaction ?? null;
                                            @endphp

                                            @if ($transaction)
                                                <a href="{{ route('admin.transactions.show', $transaction->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    Lihat di Transaksi
                                                </a>
                                            @else
                                                <span class="text-muted">Belum ada transaksi</span>
                                            @endif
                                        </td>

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

                    <div class="row my-3">
                        <div class="col-lg-6">
                            <h5>Harga Muttowif Saat Ini: <span class="badge bg-success">Rp
                                    {{ number_format($price->price, 0, ',', '.') }}</span></h5>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#updateHargaModal">
                                <i class="bi bi-pencil-square"></i> Update Harga
                            </button>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal Update Harga -->
    <div class="modal fade" id="updateHargaModal" tabindex="-1" aria-labelledby="updateHargaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin.price-muttowif.update', $price->id) }}" method="POST" class="modal-content">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title" id="updateHargaModalLabel">Update Harga Muttowif</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="price" class="form-label">Harga Baru (Rp)</label>
                        <input type="number" name="price" class="form-control" value="{{ $price->price }}" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
@endsection
