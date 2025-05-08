@extends('layouts.user')

@section('title')
    Checkout | Saudinesia
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
            <div class="container contact-form-section py-5 ">
                <div class="form-section shadow-sm border">
                    <!-- Stepper -->
                    <div class="stepper mb-4">
                        <div class="step-circle">1</div>
                        <div class="step-circle inactive">2</div>
                        <div class="step-circle inactive">3</div>
                    </div>

                    <h5 class="fw-bold">Contact details</h5>
                    <p class="text-muted">Please fill your information for reservation info</p>

                    <!-- Name & Email -->
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="John Carter">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="Email address">
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            </div>
                        </div>
                    </div>

                    <!-- Phone Number -->
                    <div class="mt-3">
                        <label class="form-label">Phone Number</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="(123) 456 - 7890">
                            <span class="input-group-text"><i class="bi bi-phone"></i></span>
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="text-end mt-4">
                        <a class="btn btn-dark btn-rounded" href="/invoice">Next step</a>
                    </div>
                </div>

            </div>

        </section>

    </div>
@endsection
