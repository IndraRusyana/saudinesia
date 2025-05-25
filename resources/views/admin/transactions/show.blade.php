@extends('layouts.admin')

@section('title')
    Dashboard Transaksi | Saudinesia
@endsection

@section('transaksi')
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
                        <h2 class="mb-4">Detail Transaksi</h2>

                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Informasi Transaksi</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><strong>Invoice:</strong> {{ $transaction->invoice_number }}
                                    </li>
                                    <li class="list-group-item"><strong>Nama User:</strong>
                                        {{ $transaction->user->profile->nama_lengkap }}
                                    </li>
                                    <li class="list-group-item"><strong>Status:</strong>
                                        <span
                                            class="badge 
                        @switch($transaction->status)
                            @case('belum bayar') bg-warning @break
                            @case('sudah bayar') bg-info @break
                            @case('sudah diverifikasi') bg-success @break
                            @case('batal') bg-danger @break
                            @default bg-secondary
                        @endswitch
                    ">
                                            {{ ucfirst($transaction->status) }}
                                        </span>
                                    </li>
                                    <li class="list-group-item"><strong>Total Amount:</strong>
                                        Rp{{ number_format($transaction->total_amount, 0, ',', '.') }}</li>
                                </ul>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Daftar Item</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Deskripsi</th>
                                                <th>Qty</th>
                                                <th>Harga Satuan</th>
                                                <th>Total</th>
                                                <th>Jenis Item</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($transaction->items as $item)
                                                <tr>
                                                    <td>{{ $item->description }}</td>
                                                    <td>{{ $item->quantity }}</td>
                                                    <td>Rp{{ number_format($item->unit_price, 0, ',', '.') }}</td>
                                                    <td>Rp{{ number_format($item->total_price, 0, ',', '.') }}</td>
                                                    <td>{{ class_basename($item->itemable_type) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        @if ($transaction->payment_proof)
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">Bukti Pembayaran</h5>
                                    <img src="{{ asset('uploads/' . $transaction->payment_proof) }}" alt="Bukti Pembayaran"
                                        class="img-fluid rounded" style="max-width: 400px;">
                                </div>
                            </div>
                        @endif

                        @if ($transaction->confirmation_letter)
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">Surat Konfirmasi</h5>
                                    <a href="{{ asset('uploads/' . $transaction->confirmation_letter) }}" target="_blank"
                                        class="btn btn-primary">Download Surat</a>
                                </div>
                            </div>
                        @endif
                        
                        <div class="row">
                            <div class="col-md-6 d-flex align-items-center gap-2">
                                <a href="{{ route('admin.transactions.index') }}" class="btn btn-secondary">Kembali</a>
        
                                @if($transaction->status === 'sudah bayar')
                                    <form action="{{ route('admin.transactions.verify', $transaction->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-success">Verifikasi</button>
                                    </form>
                                @endif
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
