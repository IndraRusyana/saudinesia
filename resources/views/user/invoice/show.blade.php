@extends('layouts.user')

@section('title')
    Invoice | Saudinesia
@endsection

@section('invoice')
    active
@endsection

@section('content')
    <div class="container">

        <!-- breadcumb -->
        <x-user.breadcrumb :breadcrumbs="$breadcrumbs" />
        <!-- breadcumb -->

        <section>
            <div class="container invoice-section py-5 ">
                <div class="form-section shadow-sm border">
                    <!-- Stepper -->
                    <div class="stepper mb-4">
                        <div class="step-circle">1</div>
                        <div class="step-circle active">2</div>
                        <div class="step-circle">3</div>
                    </div>

                    <h3>Invoice</h3>
                    <p>No Invoice: {{ $transaction->invoice_number }}</p>
                    <p>Status: <span class="badge bg-warning">{{ $transaction->status }}</span></p>
                    <p>Total Pembayaran: <strong>Rp{{ number_format($transaction->total_amount, 0, ',', '.') }}</strong></p>

                    <hr>

                    <h5>Transfer ke:</h5>
                    <p>Bank BCA</p>
                    <p>No. Rekening: 1234567890</p>
                    <p>Atas Nama: PT Klik Jitu</p>

                    <a href="{{ route('invoice.upload.form', $transaction->id) }}" class="btn btn-success mt-3">Upload Bukti Pembayaran</a>

                </div>

            </div>

        </section>

    </div>
@endsection
