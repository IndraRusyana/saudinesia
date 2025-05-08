@extends('layouts.user')

@section('title')
    Layanan Transport | Saudinesia
@endsection

@section('layanan')
    active
@endsection

@section('content')
    <div class="container">

        <!-- breadcumb -->
        <x-user.breadcrumb :breadcrumbs="$breadcrumbs" />
        <!-- breadcumb -->

        <section id="section-1" class="my-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="more-info shadow-sm border mx-auto">
                            <div class="row">
                                <div class="col-lg-4 col-sm-6 col-6">
                                    <i class="fa-solid fa-location-dot" style="cursor: pointer"></i>
                                    <h4><span>Kota:</span><br>Pilih Kota-</h4>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-6">
                                    <i class="fa-solid fa-calendar-days" style="cursor: pointer"></i>
                                    <h4><span>Tanggal:</span><br>Pilih Tanggal-</h4>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-6">
                                    <div class="main-button">
                                        <a href="about.html">Cari</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container pt-4">
            <h3 class="fw-bolder">Show Transport in Makkah on 1 February</h3>
        </div>

        <section>
            <div class="container mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    {{-- @foreach ($query as $item)
                    <div id="sell_{{$item->id}}" class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top"
                                src="{{ asset('storage/'.$item->gambar)}}"
                                alt="..." height="300" width="450"/>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-justify">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{$item->nama_barang}}</h5>
                                    <h6 class="fw-bolder">@formatRupiah($item->harga)</h6>
                                    <!-- Product price-->
                                    {{$item->deskripsi}}
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer pt-0 border-top-0 bg-transparent">
                                <div class="row">
                                    <div class="col-4 mx-auto">
                                        <a class="btn btn-outline-success mt-auto edit-sell-button" href="https://wa.me/6285931514385?text=Halo,%20saya%20ingin%20membeli%20produk%20{{ urlencode($item->nama_barang) }}%20dengan%20harga%20{{ urlencode(number_format($item->harga, 0, ',', '.')) }}." target="_blank">Beli</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach --}}
                    @for ($i = 0; $i < 5; $i++)
                        <div id="" class="col mb-5">
                            <div class="card">
                                <img src="https://images.unsplash.com/photo-1477862096227-3a1bb3b08330?ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=60"
                                    alt="" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title">Sunset</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut eum
                                        similique repellat a laborum, rerum voluptates ipsam eos quo tempore iusto dolore
                                        modi
                                        dolorum in pariatur. Incidunt repellendus praesentium quae!</p>
                                    <a href="/transport/detail" class="btn btn-outline-success btn-sm">Read More</a>
                                    <a href="" class="btn btn-outline-danger btn-sm"><i class="far fa-heart"></i></a>
                                </div>
                            </div>
                        </div>
                    @endfor
                    {{-- <!-- Pagination Links -->
                    <div class="mt-4">
                        {!! $query->withQueryString()->links('pagination::bootstrap-5') !!}
                    </div> --}}
                </div>
            </div>
    </div>
    </section>

    </div>
@endsection
