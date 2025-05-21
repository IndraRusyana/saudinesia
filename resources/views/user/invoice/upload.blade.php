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

                    <h4>Upload Bukti Pembayaran</h4>
                    <p>Invoice: <strong>{{ $transaction->invoice_number }}</strong></p>

                    <form action="{{ route('invoice.upload', $transaction->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="payment_proof" class="form-label">Upload Bukti (jpg/png)</label>
                            <input type="file" name="payment_proof" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Kirim Bukti Pembayaran</button>
                    </form>

                </div>

            </div>

        </section>

    </div>
@endsection
