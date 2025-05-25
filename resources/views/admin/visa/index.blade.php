@extends('layouts.admin')

@section('title')
    Dashboard Visa | Saudinesia
@endsection

@section('Visa')
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
                        <h3 class="mb-0">Pemesanan Visa</h3>
                    </div>
                    <div class="row px-2">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Tempat, Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No Paspor</th>
                                    <th>Tanggal Berangkat</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Akun</th>
                                    <th>Lampiran KTP</th>
                                    <th>Lampiran Paspor</th>
                                    <th>Lampiran KK</th>
                                    <th>Lampiran Tiket</th>
                                    <th>Lampiran Hotel</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($visa as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->nama_lengkap }}</td>
                                        <td>{{ $item->tempat_lahir }},
                                            {{ \Carbon\Carbon::parse($item->tanggal_lahir)->format('d-m-Y') }}</td>
                                        <td>{{ $item->jenis_kelamin }}</td>
                                        <td>{{ $item->no_paspor ?? '-' }}</td>
                                        <td>{{ optional($item->tanggal_berangkat)->format('d-m-Y') }}</td>
                                        <td>{{ optional($item->tanggal_kembali)->format('d-m-Y') }}</td>
                                        <td>{{ $item->user->name ?? '-' }}</td>

                                        {{-- Lampiran File --}}
                                        <td>
                                            @if ($item->lampiran_ktp)
                                                <a class="btn btn-sm btn-outline-primary"
                                                    href="{{ asset('uploads/' . $item->lampiran_ktp) }}"
                                                    target="_blank">Lihat</a>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->lampiran_paspor)
                                                <a class="btn btn-sm btn-outline-primary"
                                                    href="{{ asset('uploads/' . $item->lampiran_paspor) }}"
                                                    target="_blank">Lihat</a>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->lampiran_kk)
                                                <a class="btn btn-sm btn-outline-primary"
                                                    href="{{ asset('uploads/' . $item->lampiran_kk) }}"
                                                    target="_blank">Lihat</a>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->lampiran_tiket)
                                                <a class="btn btn-sm btn-outline-primary"
                                                    href="{{ asset('uploads/' . $item->lampiran_tiket) }}"
                                                    target="_blank">Lihat</a>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->lampiran_hotel)
                                                <a class="btn btn-sm btn-outline-primary"
                                                    href="{{ asset('uploads/' . $item->lampiran_hotel) }}"
                                                    target="_blank">Lihat</a>
                                            @else
                                                -
                                            @endif
                                        </td>

                                        <td>{{ $item->created_at->format('d-m-Y H:i') }}</td>
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
                                        <td colspan="15" class="text-center">Belum ada data pengajuan visa.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        @if ($visa->hasPages())
                            <div class="my-4 d-flex justify-content-center">
                                {!! $visa->withQueryString()->links('pagination::bootstrap-5') !!}
                            </div>
                        @endif

                    </div>

                    <div class="row my-3">
                        <div class="col-lg-6">
                            <h5>Harga Visa Saat Ini: <span class="badge bg-success">Rp
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
            <form action="{{ route('admin.price-visa.update', $price->id) }}" method="POST" class="modal-content">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title" id="updateHargaModalLabel">Update Harga Visa</h5>
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
