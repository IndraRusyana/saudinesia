@extends('layouts.user')

@section('title')
    Paket Umroh | Saudinesia
@endsection

@section('umroh')
    active
@endsection

@section('content')
    <div class="container">

        <!-- breadcumb -->
        <x-user.breadcrumb :breadcrumbs="$breadcrumbs" />
        <!-- breadcumb -->

        <section>
            <div class="container mt-5">
                <div class="row g-4">
                    <h3>{{ __('messages.paket_umroh') }}</h3>
                    @forelse ($query as $index => $item)
                        <div id="" class="col-lg-3">
                            <a href="/umroh/detail/{{$item->id}}">
                                <div class="card mb-3">
                                    <img src="{{ asset('uploads/' . $item->images) }}" alt="" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->name }}</h5>
                                        <p class="card-text text-dark">{{ Str::limit($item->description, 100, '...') }}</p>
                                        <p class="card-text"><small class="text-muted">Rp
                                                {{ number_format($item->prices, 0, ',', '.') }}</small></p> 
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-12 text-center vh-100">
                            <div class="alert alert-warning">Belum ada data paket haji yang tersedia.</div>
                        </div>
                    @endforelse
                    <!-- Pagination Links -->
                    <div class="mt-4 d-flex justify-content-center">
                        {!! $query->withQueryString()->links('pagination::bootstrap-5') !!}
                    </div>
                </div>
            </div>
    </div>
    </section>

    </div>
@endsection
