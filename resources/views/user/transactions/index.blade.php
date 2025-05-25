@extends('layouts.user')

@section('title')
    Pesanan saya | Saudinesia
@endsection

@section('pesanan')
    active
@endsection

@section('content')
    <div class="container py-4">
        <h3 class="mb-4">Transaksi Saya</h3>

        @php
            $grouped = $transactions->groupBy('status');
            $statuses = [
                'belum_bayar' => 'belum bayar',
                'sudah_bayar' => 'sudah bayar',
                'sudah_diverifikasi' => 'sudah diverifikasi',
                'batal' => 'batal',
            ];

        @endphp

        <ul class="nav nav-tabs mb-3" id="transactionTabs" role="tablist">
            @foreach ($statuses as $key => $label)
                <li class="nav-item" role="presentation">
                    <button class="nav-link @if ($loop->first) active @endif" id="{{ $key }}-tab"
                        data-bs-toggle="tab" data-bs-target="#{{ $key }}" type="button" role="tab"
                        aria-controls="{{ $key }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                        {{ $label }}
                    </button>
                </li>
            @endforeach
        </ul>

        <!-- Tab Contents -->
        <div class="tab-content" id="transactionTabsContent">
            @foreach ($statuses as $key => $label)
                <div class="tab-pane fade @if ($loop->first) show active @endif" id="{{ $key }}"
                    role="tabpanel" aria-labelledby="{{ $key }}-tab">
                    @php
                        $statusLookup = str_replace('_', ' ', $key);
                    @endphp
                    @forelse ($grouped[$statusLookup] ?? [] as $transaction)
                        <div class="card mb-3">
                            <div class="card-header d-flex justify-content-between">
                                <div>
                                    <strong>Invoice:</strong> {{ $transaction->invoice_number }}<br>
                                    <strong>Status:</strong> {{ ucfirst($transaction->status) }}
                                </div>
                                <div class="text-end">
                                    <strong>Total:</strong> Rp
                                    {{ number_format($transaction->total_amount, 0, ',', '.') }}<br>
                                    <small class="text-muted">{{ $transaction->created_at->format('d M Y H:i') }}</small>
                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    @foreach ($transaction->items as $item)
                                        <li class="list-group-item">
                                            <strong>{{ class_basename($item->itemable_type) }}</strong> -
                                            {{ $item->description }}<br>
                                            Qty: {{ $item->quantity }} × Rp
                                            {{ number_format($item->unit_price, 0, ',', '.') }} =
                                            <strong>Rp {{ number_format($item->total_price, 0, ',', '.') }}</strong>
                                        </li>
                                    @endforeach

                                    @if ($transaction->status === 'belum bayar')
                                        <div class="mt-3 text-end">
                                            <a href="{{ route('invoice.show', $transaction->id) }}"
                                                class="btn btn-success">
                                                Bayar
                                            </a>
                                        </div>
                                    @endif


                                </ul>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-secondary">Tidak ada transaksi dengan status
                            <strong>{{ ucfirst($label) }}</strong>.
                        </div>
                    @endforelse
                </div>
            @endforeach
        </div>
    </div>
@endsection
