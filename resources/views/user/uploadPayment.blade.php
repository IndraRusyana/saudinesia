@extends('layouts.user')

@section('title')
    upload Payment | Saudinesia
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
            <div class="container upload-section py-5 ">
                <div class="form-section shadow-sm border">
                    <!-- Stepper -->
                    <div class="stepper mb-4">
                        <div class="step-circle">1</div>
                        <div class="step-circle">2</div>
                        <div class="step-circle active">3</div>
                    </div>

                    <!-- Header -->
                    <h5 class="fw-bold">Upload</h5>
                    <p class="text-muted">Upload your payment here</p>

                    <!-- Upload Box -->
                    <div class="upload-box mb-4">
                        Upload Your Document
                        <input type="file" name="document" accept=".pdf,.jpg,.png">
                    </div>

                    <!-- Button -->
                    <div class="text-end">
                        <a class="btn btn-dark btn-rounded" href="/">Back To Home</a>
                    </div>
                </div>

            </div>

        </section>

    </div>
@endsection
