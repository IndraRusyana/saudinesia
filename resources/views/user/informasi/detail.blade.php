@extends('layouts.user')

@section('title')
    Detail Informasi | Saudinesia
@endsection

@section('paket')
    active
@endsection

@section('content')
    <div class="container">

        <!-- breadcumb -->
        <x-user.breadcrumb :breadcrumbs="$breadcrumbs" />
        <!-- breadcumb -->

        <section>
            <div class="container py-5">
                <div class="row g-4">
                    <!-- Image Grid -->
                    <div class="col-lg-8">
                        <div class="row g-2 image-grid">
                            <div class="col-12">
                                <img src="{{ asset('uploads/' . $informasi->images) }}" class="img-fluid w-100 img-large"
                                    alt="{{ $informasi->title }}">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Deskripsi -->
                <div class="row mt-5">
                    <div class="col-lg-8">
                        <h3 class="text">{{$informasi->title}}</h3>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-8">
                        <p class="text-muted">{{$informasi->content}}</p>
                    </div>
                </div>
            </div>

        </section>

    </div>
@endsection
