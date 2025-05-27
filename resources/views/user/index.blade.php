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
                        <div class="image-stack__item image-stack__item--bottom" data-aos="fade-up">
                            <img src="assets/user/images/img2.jpg" alt="Image" class="img-fluid rellax ">
                        </div>
                        <div class="image-stack__item image-stack__item--top" data-aos="fade-up" data-aos-delay="100"
                            data-rellax-percentage="0.5">
                            <img src="assets/user/images/img1.jpg" alt="Image" class="img-fluid">
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 order-lg-1">

                    <div>
                        <h2 class="heading mb-3" data-aos="fade-up" data-aos-delay="100">Pilih Paket Haji atau Umroh Sesuai
                            keinginan
                            mu</h2>

                        <p data-aos="fade-up" data-aos-delay="200">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Sed pellentesque arcu et turpis imperdiet dapibus. Vestibulum eget lobortis nulla. Pellentesque
                            luctus feugiat ante id egestas.</p>

                        <p data-aos="fade-up" data-aos-delay="300">Cras malesuada justo sed volutpat aliquam. Duis faucibus
                            tincidunt auctor. Nam at dolor ornare, pharetra felis vel, pulvinar quam. Nulla venenatis ipsum
                            ac ex rutrum, eget blandit nisl sagittis.</p>

                        <div class="d-flex">
                            <p class="my-4 me-3" data-aos="fade-up" data-aos-delay="300"><a href="/haji"
                                    class="btn btn-outline-secondary">Paket Haji</a></p>
                            <p class="my-4" data-aos="fade-up" data-aos-delay="300"><a href="/umroh"
                                    class="btn btn-outline-secondary">Paket Umroh</a></p>
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
                    <h2 class="heading mb-3">Layanan Kami</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pellentesque arcu et turpis imperdiet
                        dapibus. Vestibulum eget lobortis nulla.</p>
                </div>
                <div class="col-lg-5 text-md-end" data-aos="fade-up" data-aos-delay="100">
                    <div id="destination-controls">
                        <span class="prev me-3" data-controls="prev">
                            <span class="icon-chevron-left"></span>

                        </span>
                        <span class="next" data-controls="next">
                            <span class="icon-chevron-right"></span>

                        </span>
                    </div>
                </div>
            </div>

        </div>

        <div class="destination-slider-wrap">
            <div class="destination-slider">
                <div class="destination">
                    <div class="thumb">
                        <img src="assets/user/images/img-1.jpg" alt="Image" class="img-fluid">
                        <div class="judul">
                            Penawaran Hotel Terbaik
                            <p class="text-dark" style="font-size: 0.6em">Lorem ipsum, dolor sit amet consectetur
                                adipisicing elit</p>
                        </div>
                        <a href="/hotel" class="lihat m-4 btn btn-light px-3 py-1" style="font-size: 1.2em">
                            Lihat
                        </a>
                    </div>
                </div>

                <div class="destination">
                    <div class="thumb">
                        <img src="assets/user/images/img-2.jpg" alt="Image" class="img-fluid">
                        <div class="judul">
                            Penawaran Transport Terbaik
                            <p class="text-dark" style="font-size: 0.6em">Lorem ipsum, dolor sit amet consectetur
                                adipisicing elit</p>
                        </div>
                        <a href="/transport" class="lihat m-4 btn btn-light px-3 py-1" style="font-size: 1.2em">
                            Lihat
                        </a>
                    </div>
                </div>

                <div class="destination">
                    <div class="thumb">
                        <img src="assets/user/images/img-3.jpg" alt="Image" class="img-fluid">
                        <div class="judul">
                            Penawaran Muttowif Terbaik
                            <p class="text-dark" style="font-size: 0.6em">Lorem ipsum, dolor sit amet consectetur
                                adipisicing elit</p>
                        </div>
                        <a href="/muttowif" class="lihat m-4 btn btn-light px-3 py-1" style="font-size: 1.2em">
                            Lihat
                        </a>
                    </div>
                </div>

                <div class="destination">
                    <div class="thumb">
                        <img src="assets/user/images/img-4.jpg" alt="Image" class="img-fluid">
                        <div class="judul">
                            Penawaran Visa Terbaik
                            <p class="text-dark" style="font-size: 0.6em">Lorem ipsum, dolor sit amet consectetur
                                adipisicing elit</p>
                        </div>
                        <a href="/visa" class="lihat m-4 btn btn-light px-3 py-1" style="font-size: 1.2em">
                            Lihat
                        </a>
                    </div>
                </div>

                <div class="destination">
                    <div class="thumb">
                        <img src="assets/user/images/img-1.jpg" alt="Image" class="img-fluid">
                        <div class="judul">
                            Penawaran Hotel Terbaik
                            <p class="text-dark" style="font-size: 0.6em">Lorem ipsum, dolor sit amet consectetur
                                adipisicing elit</p>
                        </div>
                        <a href="/hotel" class="lihat m-4 btn btn-light px-3 py-1" style="font-size: 1.2em">
                            Lihat
                        </a>
                    </div>
                </div>

                <div class="destination">
                    <div class="thumb">
                        <img src="assets/user/images/img-2.jpg" alt="Image" class="img-fluid">
                        <div class="judul">
                            Penawaran Transport Terbaik
                            <p class="text-dark" style="font-size: 0.6em">Lorem ipsum, dolor sit amet consectetur
                                adipisicing elit</p>
                        </div>
                        <a href="/transport" class="lihat m-4 btn btn-light px-3 py-1" style="font-size: 1.2em">
                            Lihat
                        </a>
                    </div>
                </div>

                <div class="destination">
                    <div class="thumb">
                        <img src="assets/user/images/img-3.jpg" alt="Image" class="img-fluid">
                        <div class="judul">
                            Penawaran Muttowif Terbaik
                            <p class="text-dark" style="font-size: 0.6em">Lorem ipsum, dolor sit amet consectetur
                                adipisicing elit</p>
                        </div>
                        <a href="/muttowif" class="lihat m-4 btn btn-light px-3 py-1" style="font-size: 1.2em">
                            Lihat
                        </a>
                    </div>
                </div>

                <div class="destination">
                    <div class="thumb">
                        <img src="assets/user/images/img-4.jpg" alt="Image" class="img-fluid">
                        <div class="judul">
                            Penawaran Visa Terbaik
                            <p class="text-dark" style="font-size: 0.6em">Lorem ipsum, dolor sit amet consectetur
                                adipisicing elit</p>
                        </div>
                        <a href="/visa" class="lihat m-4 btn btn-light px-3 py-1" style="font-size: 1.2em">
                            Lihat
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
                    <h2 class="heading mb-4">Kenapa memilih Saudinesia ?</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                        the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large
                        language ocean.</p>
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a
                        paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                    <p class="my-4" data-aos="fade-up" data-aos-delay="200"><a href="#"
                            class="btn btn-primary">Read more</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="section bg-light">


        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="row">
                    <h2 class="heading mb-5 text-start">Testimoni Pelanggan</h2>
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
                        <p>Lorem ipsum dolor sit amet consectetur. Mollis erat duis aliquam mauris est risus lectus.
                            Phasellus consequat urna tellus</p>
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
                        <div class="mb-4 col-lg-3 justify-content-center filter {{ $item->kategori }}">
                            <img src="{{ asset('uploads/' . $item->gambar) }}" class="img-thumbnail"
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
                <div class="col"data-aos="fade-up" data-aos-delay="0">
                    <h2 class="heading mb-5">Informasi Terbaru <a class="btn btn-outline-dark float-end"
                            href="/informasi">Lihat Semua</a></h2>
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
                        <div class="alert alert-warning">Belum ada data informasi yang tersedia.</div>
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
