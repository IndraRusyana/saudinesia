@extends('layouts.user')

@section('title')
    Informasi Terbaru | Saudinesia
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
                    <h3>Informasi Terbaru</h3>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="media-entry">
                            <a href="">
                                <img src="assets/user/images/gal_1.jpg" alt="Image" class="img-fluid">
                            </a>
                            <div class="bg-white m-body">
                                <span class="date">May 14, 2020</span>
                                <h3><a href="">Far far away, behind the word mountains</a></h3>
                                <p>Vokalia and Consonantia, there live the blind texts. Separated they live.</p>

                                <a href="" class="more d-flex align-items-center float-start">
                                    <span class="label">Read More</span>
                                    <span class="arrow"><span class="icon-keyboard_arrow_right"></span></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="media-entry">
                            <a href="">
                                <img src="assets/user/images/gal_2.jpg" alt="Image" class="img-fluid">
                            </a>
                            <div class="bg-white m-body">
                                <span class="date">May 14, 2020</span>
                                <h3><a href="">Far far away, behind the word mountains</a></h3>
                                <p>Vokalia and Consonantia, there live the blind texts. Separated they live.</p>

                                <a href="" class="more d-flex align-items-center float-start">
                                    <span class="label">Read More</span>
                                    <span class="arrow"><span class="icon-keyboard_arrow_right"></span></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="media-entry">
                            <a href="">
                                <img src="assets/user/images/gal_3.jpg" alt="Image" class="img-fluid">
                            </a>
                            <div class="bg-white m-body">
                                <span class="date">May 14, 2020</span>
                                <h3><a href="">Far far away, behind the word mountains</a></h3>
                                <p>Vokalia and Consonantia, there live the blind texts. Separated they live.</p>
                                <a href="" class="more d-flex align-items-center float-start">
                                    <span class="label">Read More</span>
                                    <span class="arrow"><span class="icon-keyboard_arrow_right"></span></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="media-entry">
                            <a href="">
                                <img src="assets/user/images/gal_4.jpg" alt="Image" class="img-fluid">
                            </a>
                            <div class="bg-white m-body">
                                <span class="date">May 14, 2020</span>
                                <h3><a href="">Far far away, behind the word mountains</a></h3>
                                <p>Vokalia and Consonantia, there live the blind texts. Separated they live.</p>
                                <a href="" class="more d-flex align-items-center float-start">
                                    <span class="label">Read More</span>
                                    <span class="arrow"><span class="icon-keyboard_arrow_right"></span></span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="media-entry">
                            <a href="">
                                <img src="assets/user/images/gal_1.jpg" alt="Image" class="img-fluid">
                            </a>
                            <div class="bg-white m-body">
                                <span class="date">May 14, 2020</span>
                                <h3><a href="">Far far away, behind the word mountains</a></h3>
                                <p>Vokalia and Consonantia, there live the blind texts. Separated they live.</p>

                                <a href="" class="more d-flex align-items-center float-start">
                                    <span class="label">Read More</span>
                                    <span class="arrow"><span class="icon-keyboard_arrow_right"></span></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="media-entry">
                            <a href="">
                                <img src="assets/user/images/gal_2.jpg" alt="Image" class="img-fluid">
                            </a>
                            <div class="bg-white m-body">
                                <span class="date">May 14, 2020</span>
                                <h3><a href="">Far far away, behind the word mountains</a></h3>
                                <p>Vokalia and Consonantia, there live the blind texts. Separated they live.</p>

                                <a href="" class="more d-flex align-items-center float-start">
                                    <span class="label">Read More</span>
                                    <span class="arrow"><span class="icon-keyboard_arrow_right"></span></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="media-entry">
                            <a href="">
                                <img src="assets/user/images/gal_3.jpg" alt="Image" class="img-fluid">
                            </a>
                            <div class="bg-white m-body">
                                <span class="date">May 14, 2020</span>
                                <h3><a href="">Far far away, behind the word mountains</a></h3>
                                <p>Vokalia and Consonantia, there live the blind texts. Separated they live.</p>
                                <a href="" class="more d-flex align-items-center float-start">
                                    <span class="label">Read More</span>
                                    <span class="arrow"><span class="icon-keyboard_arrow_right"></span></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="media-entry">
                            <a href="">
                                <img src="assets/user/images/gal_4.jpg" alt="Image" class="img-fluid">
                            </a>
                            <div class="bg-white m-body">
                                <span class="date">May 14, 2020</span>
                                <h3><a href="">Far far away, behind the word mountains</a></h3>
                                <p>Vokalia and Consonantia, there live the blind texts. Separated they live.</p>
                                <a href="" class="more d-flex align-items-center float-start">
                                    <span class="label">Read More</span>
                                    <span class="arrow"><span class="icon-keyboard_arrow_right"></span></span>
                                </a>
                            </div>
                        </div>
                    </div>



                    <nav class="mt-5" aria-label="Page navigation example" data-aos="fade-up" data-aos-delay="100">
                        <ul class="custom-pagination pagination">
                            <li class="page-item prev"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item next"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </div>
@endsection
