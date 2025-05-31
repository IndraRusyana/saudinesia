@extends('layouts.user')

@section('title')
    {{ __('homepage.informasi_terbaru') }} | Saudinesia
@endsection

@section('informasi')
    active
@endsection

@section('content')
    <div class="container">

        <!-- breadcumb -->
        <x-user.breadcrumb :breadcrumbs="$breadcrumbs" />
        <!-- breadcumb -->

        <div class="section">
            <div class="container">


                <div class="row g-4 align-items-stretch">
                    <h3>{{ __('homepage.informasi_terbaru') }}</h3>
                    @forelse ($query as $index => $item)
                        <div class="col-lg-3">
                            <a href="/informasi/detail/{{$item->id}}">
                                <div class="card mb-3">
                                    <img class="card-img-top p-2" src="{{ asset('uploads/' . $item->images) }}"
                                        alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->title }}</h5>
                                        <p class="card-text text-dark">{{ Str::limit($item->content, 100, '...') }}</p>
                                        <p class="card-text"><small class="text-muted">{{ $item->date }}</small></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <div class="alert alert-warning">Belum ada data informasi yang tersedia.</div>
                        </div>
                    @endforelse




                    @if ($query->hasPages())
                        <div class="my-5">
                            {!! $query->withQueryString()->links('pagination::bootstrap-5') !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection
