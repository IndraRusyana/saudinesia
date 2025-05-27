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

                    <div class="row px-2">
                        <h4>Verifikasi Transaksi</h4>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Invoice</th>
                                    <th>User</th>
                                    <th>email</th>
                                    <th>Status</th>
                                    <th>Bukti</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $t)
                                    <tr>
                                        <td>{{ $t->invoice_number }}</td>
                                        <td>{{ $t->user->profile->nama_lengkap }}</td>
                                        <td>{{ $t->user->email }}</td>
                                        {{-- Kolom Status dengan Label --}}
                                        <td>
                                            @php
                                                $statusLabels = [
                                                    'belum bayar' => 'warning',
                                                    'sudah bayar' => 'info',
                                                    'sudah diverifikasi' => 'success',
                                                    'batal' => 'danger',
                                                ];
                                            @endphp
                                            <span class="badge bg-{{ $statusLabels[$t->status] ?? 'secondary' }}">
                                                {{ ucfirst($t->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            @if ($t->payment_proof)
                                                <a class="btn btn-outline-light" href="{{ asset('uploads/' . $t->payment_proof) }}"
                                                    target="_blank">Lihat</a>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if ($t->status === 'belum bayar')
                                                <span class="text-muted">Menunggu pembayaran</span>
                                            @elseif($t->status === 'sudah bayar')
                                                <form action="{{ route('admin.transactions.verify', $t->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button class="btn btn-success btn-sm">Verifikasi</button>
                                                </form>
                                            @elseif($t->status === 'sudah diverifikasi')
                                                <span class="text-muted">Selesai</span>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @if ($transactions->hasPages())
                            <div class="my-4 d-flex justify-content-center">
                                {!! $transactions->withQueryString()->links('pagination::bootstrap-5') !!}
                            </div>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
