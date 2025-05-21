@extends('layouts.user')

@section('title')
    Pemesanan Hotel | Saudinesia
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
            <div class="container py-5">
                <div class="form-section shadow-sm border">
                    <!-- Stepper -->
                    <div class="stepper mb-4">
                      <div class="step-circle">1</div>
                      <div class="step-circle inactive">2</div>
                      <div class="step-circle inactive">3</div>
                    </div>
                
                    <h5 class="fw-bold">Informasi Tambahan</h5>
                    <p class="text-muted">Please fill your information for reservation info</p>
                
                    <!-- Check In / Out -->
                    <div class="row g-3 mb-4">
                      <div class="col-md-6">
                        <label for="checkin" class="form-label">Check In</label>
                        <input type="date" class="form-control" id="checkin" value="2022-12-12">
                      </div>
                      <div class="col-md-6">
                        <label for="checkout" class="form-label">Check Out</label>
                        <input type="date" class="form-control" id="checkout" value="2022-12-12">
                      </div>
                    </div>
                
                    <!-- Konsumsi -->
                    <div class="mb-4">
                      <h6 class="fw-bold">Konsumsi</h6>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="konsumsi" id="tanpa" checked>
                        <label class="form-check-label" for="tanpa">Tanpa Konsumsi</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="konsumsi" id="sarapan">
                        <label class="form-check-label" for="sarapan">Hanya Sarapan</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="konsumsi" id="sehari">
                        <label class="form-check-label" for="sehari">3x Sehari</label>
                      </div>
                    </div>
                
                    <!-- Layanan Tambahan -->
                    <div class="mb-4">
                      <h6 class="fw-bold">Layanan Tambahan</h6>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="tambahan-kasur" checked>
                        <label class="form-check-label" for="tambahan-kasur">Tambahan Kasur</label>
                      </div>
                    </div>
                
                    <!-- Tombol -->
                    <div class="text-end">
                      <a class="btn btn-dark btn-rounded" href="/checkout">Next step</a>
                    </div>
                  </div>
            </div>

        </section>

    </div>
@endsection
