@extends('layouts.user')

@section('title')
    Home | Saudinesia
@endsection

@section('home')
    active
@endsection

@section('content')
    <div class="hero overlay">
        @foreach ($hero as $item)
        @endforeach
        <div class="img-bg rellax">
            <img src="{{ asset('uploads/' . $item->image) }}" alt="Image" class="img-fluid">
        </div>

        <div class="container">
            <div class="row align-items-center justify-content-start">
                <div class="col-lg-5">

                    <h1 class="heading" data-aos="fade-up">{{ $item->title }}</h1>
                    <p class="mb-5" data-aos="fade-up">{{ $item->description }}</p>

                    <div data-aos="fade-up">
                        <a href="/transport" class="play-button align-items-center d-flex glightbox3">
                            <button type="button" class="btn btn-outline-light">Lihat Tour</button>
                        </a>
                        {{-- <p>Current Locale: {{ app()->getLocale() }}</p>
                        <p>{{ __('messages.greeting') }}</p> --}}
                    </div>
                </div>


            </div>
        </div>


    </div>

    <div class="section section-2">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 order-lg-2 mb-5 mb-lg-0">
                    <div class="image-stack mb-5 mb-lg-0">
                        <div class="image-stack_item image-stack_item--bottom aos-init aos-animate">
                            <img src="assets/user/images/img2.jpg" alt="" class="img-fluid rellax">
                        </div>

                        <div class="image-stack__item image-stack__item--top" data-aos="fade-up" data-aos-delay="100"
                            data-rellax-percentage="0.5">
                            <img src="assets/user/images/img1.jpg" alt="Image" class="img-fluid">
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 order-lg-1">

                    <div>
                        <h2 class="heading mb-3" data-aos="fade-up" data-aos-delay="100">{{ __('homepage.judul') }}</h2>
                        <p data-aos="fade-up" data-aos-delay="300">{{ __('homepage.paragraf_1') }}</p>

                        <p data-aos="fade-up" data-aos-delay="300">{{ __('homepage.paragraf_2') }}</p>

                        <div class="d-flex">
                            <p class="my-4 me-3" data-aos="fade-up" data-aos-delay="300">
                                <a href="/haji" class="btn btn-outline-secondary">{{ __('homepage.btn_haji') }}</a>
                            </p>
                            <p class="my-4" data-aos="fade-up" data-aos-delay="300">
                                <a href="/umroh" class="btn btn-outline-secondary">{{ __('homepage.btn_umroh') }}</a>
                            </p>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <div class="section section-3" data-aos="fade-up" data-aos-delay="100">
        <div class="container">
            <div class="row align-items-center justify-content-between  mb-5">
                <div class="col-lg-5" data-aos="fade-up">
                    <h2 class="heading mb-3">{{ __('homepage.layanan_judul') }}</h2>
                    <p></p>
                </div>
            </div>

        </div>

        <div class="row px-5 g-3">
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('homepage.layanan_list.hotel.judul') }}</h5>
                        <p class="card-text text-dark" style="font-size: 0.9em">
                            {{ __('homepage.layanan_list.hotel.deskripsi') }}
                        </p>
                        <a href="/hotel" class="btn btn-dark px-3 py-1" style="font-size: 1em">
                            {{ __('homepage.layanan_list.hotel.link') }}
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('homepage.layanan_list.transport.judul') }}</h5>
                        <p class="card-text text-dark" style="font-size: 0.9em">
                            {{ __('homepage.layanan_list.transport.deskripsi') }}
                        </p>
                        <a href="/transport" class="btn btn-dark px-3 py-1" style="font-size: 1em">
                            {{ __('homepage.layanan_list.transport.link') }}
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('homepage.layanan_list.muttowif.judul') }}</h5>
                        <p class="card-text text-dark" style="font-size: 0.9em">
                            {{ __('homepage.layanan_list.muttowif.deskripsi') }}
                        </p>
                        <a href="/muttowif" class="btn btn-dark px-3 py-1" style="font-size: 1em">
                            {{ __('homepage.layanan_list.muttowif.link') }}
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('homepage.layanan_list.visa.judul') }}</h5>
                        <p class="card-text text-dark" style="font-size: 0.9em">
                            {{ __('homepage.layanan_list.visa.deskripsi') }}
                        </p>
                        <a href="/visa" class="btn btn-dark px-3 py-1" style="font-size: 1em">
                            {{ __('homepage.layanan_list.visa.link') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="section" style="background-color: #FEF7F4">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-5 mb-4 mb-lg-0" data-aos="fade-up">
                    <img src="assets/user/images/img3.jpg" alt="Image" class="img-fluid">
                </div>
                <div class="col-lg-5" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="heading mb-4">{{ __('homepage.kenapa_memilih_kami_judul') }}</h2>
                    <ul class="list-unstyled">
                        <li class="mb-2">• {!! __('homepage.kenapa_memilih_kami_list.pengalaman') !!}</li>
                        <li class="mb-2">• {!! __('homepage.kenapa_memilih_kami_list.kualitas') !!}</li>
                        <li class="mb-2">• {!! __('homepage.kenapa_memilih_kami_list.transparansi') !!}</li>
                        <li class="mb-2">• {!! __('homepage.kenapa_memilih_kami_list.dukungan') !!}</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

    <div class="section bg-light">


        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="row">
                    <h2 class="heading mb-5 text-start">{{ __('messages.testimoni') }}</h2>
                    @foreach ($testimoni as $t)
                        <div class="item col m-3">
                            <blockquote class="block-testimonial">
                                <div class="author">
                                    <img src="{{ asset('uploads/' . $t->foto) }}" alt="{{ $t->nama }}">
                                    <h3>{{ $t->nama }}</h3>
                                </div>
                                <p>&ldquo;{{ $t->deskripsi }}&rdquo;</p>
                            </blockquote>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

    </div> <!-- /.untree_co-section -->

    <div class="section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-6 mx-auto text-center">
                    <div class="heading-content" data-aos="fade-up">
                        <h2>Galeri</h2>
                        {{-- <p>Lorem ipsum dolor sit amet consectetur. Mollis erat duis aliquam mauris est risus lectus.
                            Phasellus consequat urna tellus</p> --}}
                        {{-- <p class="my-4" data-aos="fade-up" data-aos-delay="300"><a href="#" class="btn btn-primary">View All</a></p> --}}
                        <div class="mb-4" data-aos="fade-up" data-aos-delay="300">
                            <a class="btn product-btn btn-danger btn-default filter-button me-2 my-2 clicked"
                                data-filter="all">Semua</a>
                            <a class="btn product-btn btn-danger btn-default filter-button me-2 my-2"
                                data-filter="Madinah">Madinah</a>
                            <a class="btn product-btn btn-danger btn-default filter-button me-2 my-2"
                                data-filter="Makkah">Makkah</a>
                            <a class="btn product-btn btn-danger btn-default filter-button me-2 my-2"
                                data-filter="Dhahran">Dhahran</a>
                            <a class="btn product-btn btn-danger btn-default filter-button me-2 my-2"
                                data-filter="Al-Baha">Al-Baha</a>
                            <a class="btn product-btn btn-danger btn-default filter-button me-2 my-2"
                                data-filter="Abha">Abha</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="row g-3">
                    @foreach ($galeri as $item)
                        <div class="mb-4 col-md-3 justify-content-center filter {{ $item->kategori }}">
                            <img src="{{ asset('uploads/' . $item->gambar) }}" class="img-thumbnail col-md-4"
                                style="cursor: pointer;" data-type="image"
                                data-src="{{ asset('uploads/' . $item->gambar) }}" data-nama="{{ $item->nama }}"
                                data-deskripsi="{{ $item->deskripsi }}" onclick="handleMediaClick(this)">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">

            <div class="row">
                <div class="col" data-aos="fade-up" data-aos-delay="0">
                    <h2 class="heading mb-5">
                        {{ __('homepage.informasi_terbaru') }}
                        <a class="btn btn-outline-dark float-end" href="/informasi">{{ __('homepage.lihat_semua') }}</a>
                    </h2>
                </div>
            </div>

            <div class="row align-items-stretch gx-5">
                @forelse ($informasi as $index => $item)
                    <div class="col-lg-3">
                        <a href="">
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
                        <div class="alert alert-warning">{{ __('homepage.tidak_ada_informasi') }}</div>
                    </div>
                @endforelse
            </div>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="mediaModal" tabindex="-1" aria-labelledby="mediaModalLabel" aria-hidden="true"
        style="z-index: 2000;">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediaModalLabel">Media</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="modalImage" src="" class="img-fluid" alt="Gambar" style="display: none;">
                    <video id="modalVideo" class="img-fluid" controls style="display: none;">
                        <source id="videoSource" src="" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <p id="modalDescription" class="mt-4" style="text-align: justify"></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            $(".filter-button").click(function() {
                var value = $(this).attr('data-filter');

                if (value == "all") {
                    //$('.filter').removeClass('hidden');
                    $('.filter').show('1000');
                    // Menghapus class 'clicked' dari semua tombol filter
                    $(".filter-button").removeClass("clicked");

                    // Menambahkan class 'clicked' pada tombol yang diklik
                    $(this).addClass("clicked");
                } else {
                    //            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
                    //            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
                    $(".filter").not('.' + value).hide('3000');
                    $('.filter').filter('.' + value).show('3000');

                    // Menghapus class 'clicked' dari semua tombol filter
                    $(".filter-button").removeClass("clicked");

                    // Menambahkan class 'clicked' pada tombol yang diklik
                    $(this).addClass("clicked");
                }
            });

        });

        $(document).ready(function() {

            $(".filter-button2").click(function() {
                var value = $(this).attr('data-filter');

                // Menyembunyikan elemen yang tidak sesuai dengan filter
                $(".filter").not('.' + value).hide('3000');
                $('.filter').filter('.' + value).show('3000');

                // Menghapus class 'clicked' dari semua tombol filter
                $(".filter-button2").removeClass("clicked");

                // Menambahkan class 'clicked' pada tombol yang diklik
                $(this).addClass("clicked");
            });

        });

        function handleMediaClick(el) {
            const type = el.dataset.type;
            const src = el.dataset.src;
            const nama = el.dataset.nama;
            const deskripsi = el.dataset.deskripsi;

            openMediaModal(type, src, nama, deskripsi);
        }

        // Fungsi untuk membuka modal dan menampilkan gambar atau video
        function openMediaModal(mediaType, mediaSrc, name = '', description = '') {
            const modalImage = document.getElementById('modalImage');
            const modalDescription = document.getElementById('modalDescription');
            const modalName = document.getElementById('mediaModalLabel');

            // Reset media display
            modalImage.style.display = 'none';

            if (mediaType === 'image') {
                modalImage.src = mediaSrc;
                modalImage.style.display = 'block';
            }

            modalName.textContent = name || '-';
            modalDescription.textContent = description || '-';

            // Show the Bootstrap modal
            const mediaModal = new bootstrap.Modal(document.getElementById('mediaModal'));
            mediaModal.show();
        }
    </script>
@endsection
