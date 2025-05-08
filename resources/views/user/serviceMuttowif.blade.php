@extends('layouts.user')

@section('title')
    Layanan Muttowif | Saudinesia
@endsection

@section('muttowif')
    active
@endsection

@section('content')
    <div class="container">

        <!-- breadcumb -->
        <x-user.breadcrumb :breadcrumbs="$breadcrumbs" />
        <!-- breadcumb -->

        <section class="d-flex justify-content-center align-items-center my-5">
            <div class="card p-4" style="max-width: 500px; width: 100%;">
                <h4 class="text-center mb-2">Pemesanan Muttowif</h4>
                <hr>
                <p class="text-center form-description mb-4">Isi form tersebut untuk memesan Muttowif</p>
    
                <form>
                    <div class="row g-3 mb-3">
                        <div class="col">
                            <label for="mulai" class="form-label">Mulai</label>
                            <input type="date" id="mulai" class="form-control" required>
                        </div>
                        <div class="col">
                            <label for="sampai" class="form-label">Sampai</label>
                            <input type="date" id="sampai" class="form-control" required>
                        </div>
                    </div>
    
                    <div class="mb-4">
                        <label for="jumlah" class="form-label">Jumlah Jamaah</label>
                        <input type="number" id="jumlah" class="form-control" min="1" required>
                    </div>
    
                    <div class="text-end">
                        <button type="submit" class="btn btn-dark">Next step</button>
                    </div>
                </form>
            </div>
        </section>


    </div>
@endsection
