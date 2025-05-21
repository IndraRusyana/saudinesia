@extends('layouts.user')

@section('title')
    Invoice | Saudinesia
@endsection

@section('layanan')
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

                    <!-- Header -->
                    <h5 class="fw-bold">Invoice</h5>
                    <p class="text-muted">This is your invoice</p>

                    <!-- Invoice Preview -->
                    <div class="invoice-preview mb-2">INVOICE</div>

                    <!-- Download Button -->
                    <a class="btn btn-secondary btn-sm btn-download" href="">Download</a>

                    <!-- Upload Button -->
                    <div class="text-end mt-4">
                        <a class="btn btn-dark btn-rounded" href="/upload-payment">Upload payment</a>
                    </div>
                </div>

            </div>

        </section>

    </div>
@endsection
