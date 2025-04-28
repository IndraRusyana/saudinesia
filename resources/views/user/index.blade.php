@extends('layouts.user')

@section('title')
    Home | Saudinesia
@endsection

@section('home')
    active
@endsection

@section('content')
<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
            <span class="icofont-close js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

<nav class="site-nav mt-3">
    <div class="container">

        <div class="site-navigation">
            <div class="row">
                <div class="col-6 col-lg-3">
                    <a href="index.html" class="logo m-0 float-start"><img src="assets/user/images/LOGO_SAUDINESIA.png" alt="" srcset="" width="120"></a>
                </div>
                <div class="col-lg-6 d-none d-lg-inline-block text-center nav-center-wrap">
                    <ul class="js-clone-nav  text-center site-menu p-0 m-0">
                        <li class="active"><a href="index.html">Home</a></li>
                        <li class="has-children">
                            <a href="#">Paket</a>
                            <ul class="dropdown">
                                <li><a href="#">Haji</a></li>
                                <li><a href="#">Umroh</a></li>
                            </ul>
                        </li>
                        <li class="has-children">
                            <a href="#">Layanan</a>
                            <ul class="dropdown">
                                <li><a href="#">Hotel</a></li>
                                <li><a href="#">Transport</a></li>
                                <li><a href="#">Muttowif</a></li>
                                <li><a href="#">Visa</a></li>
                            </ul>
                        </li>
                        <li><a href="about.html">Informasi</a></li>
                        <li><a href="about.html">Tentang Kami</a></li>
                        <li><a href="about.html">Helpdesk</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-3 text-lg-end">
                    <div class="button js-clone-nav d-none d-lg-inline-block px-0">
                        <a class="btn btn-outline-light px-3 py-2" href="contact.html">Login</a>
                    </div>
                    <div class="button js-clone-nav d-none d-lg-inline-block">
                        <a class="btn btn-outline-light px-3 py-2" href="contact.html">Register</a>
                    </div>

                    <a href="#" class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light" data-toggle="collapse" data-target="#main-navbar">
                        <span></span>
                    </a>
                </div>
            </div>
        </div>
        
    </div>
</nav>



<div class="hero overlay">

    <div class="img-bg rellax">
        <img src="assets/user/images/bg1.jpg" alt="Image" class="img-fluid">
    </div>

    <div class="container">
        <div class="row align-items-center justify-content-start">
            <div class="col-lg-5">

                <h1 class="heading" data-aos="fade-up">Makkah’s legendary
                    Golden Circle</h1>
                <p class="mb-5" data-aos="fade-up">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pellentesque arcu et turpis imperdiet dapibus. Vestibulum eget lobortis nulla. Pellentesque luctus feugiat ante id egestas</p>

                <div data-aos="fade-up">
                    <a href="" class="play-button align-items-center d-flex glightbox3" >
                        <button type="button" class="btn btn-outline-light">Lihat Tour</button>
                    </a>
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
                    <div class="image-stack__item image-stack__item--bottom" data-aos="fade-up"  >
                        <img src="assets/user/images/img2.jpg" alt="Image" class="img-fluid rellax ">
                    </div>
                    <div class="image-stack__item image-stack__item--top" data-aos="fade-up" data-aos-delay="100"  data-rellax-percentage="0.5">
                        <img src="assets/user/images/img1.jpg" alt="Image" class="img-fluid">
                    </div>
                </div>

            </div>
            <div class="col-lg-4 order-lg-1">

                <div>
                    <h2 class="heading mb-3" data-aos="fade-up" data-aos-delay="100">Pilih Paket Haji atau Umroh Sesuai keinginan 
                        mu</h2>

                    <p data-aos="fade-up" data-aos-delay="200">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pellentesque arcu et turpis imperdiet dapibus. Vestibulum eget lobortis nulla. Pellentesque luctus feugiat ante id egestas.</p>

                    <p data-aos="fade-up" data-aos-delay="300">Cras malesuada justo sed volutpat aliquam. Duis faucibus tincidunt auctor. Nam at dolor ornare, pharetra felis vel, pulvinar quam. Nulla venenatis ipsum ac ex rutrum, eget blandit nisl sagittis.</p>

                    <p class="my-4" data-aos="fade-up" data-aos-delay="300"><a href="#" class="btn btn-outline-secondary">Lihat Paket</a></p>
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
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pellentesque arcu et turpis imperdiet dapibus. Vestibulum eget lobortis nulla.</p>
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
                    <p class="text-dark" style="font-size: 0.6em">Lorem ipsum, dolor sit amet consectetur adipisicing elit</p>
                    </div>
                    <a href="" class="lihat m-4 btn btn-light px-3 py-1" style="font-size: 1.2em">
                        Lihat
                    </a>
                </div>
            </div>

            <div class="destination">
                <div class="thumb">
                    <img src="assets/user/images/img-2.jpg" alt="Image" class="img-fluid">
                    <div class="judul">
                        Penawaran Transport Terbaik
                    <p class="text-dark" style="font-size: 0.6em">Lorem ipsum, dolor sit amet consectetur adipisicing elit</p>
                    </div>
                    <a href="" class="lihat m-4 btn btn-light px-3 py-1" style="font-size: 1.2em">
                        Lihat
                    </a>
                </div>
            </div>

            <div class="destination">
                <div class="thumb">
                    <img src="assets/user/images/img-3.jpg" alt="Image" class="img-fluid">
                    <div class="judul">
                        Penawaran Muttowif Terbaik
                    <p class="text-dark" style="font-size: 0.6em">Lorem ipsum, dolor sit amet consectetur adipisicing elit</p>
                    </div>
                    <a href="" class="lihat m-4 btn btn-light px-3 py-1" style="font-size: 1.2em">
                        Lihat
                    </a>
                </div>
            </div>

            <div class="destination">
                <div class="thumb">
                    <img src="assets/user/images/img-4.jpg" alt="Image" class="img-fluid">
                    <div class="judul">
                        Penawaran Visa Terbaik
                    <p class="text-dark" style="font-size: 0.6em">Lorem ipsum, dolor sit amet consectetur adipisicing elit</p>
                    </div>
                    <a href="" class="lihat m-4 btn btn-light px-3 py-1" style="font-size: 1.2em">
                        Lihat
                    </a>
                </div>
            </div>

            <div class="destination">
                <div class="thumb">
                    <img src="assets/user/images/img-1.jpg" alt="Image" class="img-fluid">
                    <div class="judul">
                        Penawaran Hotel Terbaik
                    <p class="text-dark" style="font-size: 0.6em">Lorem ipsum, dolor sit amet consectetur adipisicing elit</p>
                    </div>
                    <a href="" class="lihat m-4 btn btn-light px-3 py-1" style="font-size: 1.2em">
                        Lihat
                    </a>
                </div>
            </div>

            <div class="destination">
                <div class="thumb">
                    <img src="assets/user/images/img-2.jpg" alt="Image" class="img-fluid">
                    <div class="judul">
                        Penawaran Transport Terbaik
                    <p class="text-dark" style="font-size: 0.6em">Lorem ipsum, dolor sit amet consectetur adipisicing elit</p>
                    </div>
                    <a href="" class="lihat m-4 btn btn-light px-3 py-1" style="font-size: 1.2em">
                        Lihat
                    </a>
                </div>
            </div>

            <div class="destination">
                <div class="thumb">
                    <img src="assets/user/images/img-3.jpg" alt="Image" class="img-fluid">
                    <div class="judul">
                        Penawaran Muttowif Terbaik
                    <p class="text-dark" style="font-size: 0.6em">Lorem ipsum, dolor sit amet consectetur adipisicing elit</p>
                    </div>
                    <a href="" class="lihat m-4 btn btn-light px-3 py-1" style="font-size: 1.2em">
                        Lihat
                    </a>
                </div>
            </div>

            <div class="destination">
                <div class="thumb">
                    <img src="assets/user/images/img-4.jpg" alt="Image" class="img-fluid">
                    <div class="judul">
                        Penawaran Visa Terbaik
                    <p class="text-dark" style="font-size: 0.6em">Lorem ipsum, dolor sit amet consectetur adipisicing elit</p>
                    </div>
                    <a href="" class="lihat m-4 btn btn-light px-3 py-1" style="font-size: 1.2em">
                        Lihat
                    </a>
                </div>
            </div>

        </div>
    </div>

</div>

<div class="section">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-5 mb-4 mb-lg-0" data-aos="fade-up">
                <img src="assets/user/images/img3.jpg" alt="Image" class="img-fluid">
            </div>
            <div class="col-lg-5" data-aos="fade-up" data-aos-delay="100">
                <h2 class="heading mb-4">Kenapa memilih Saudinesia ?</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                <p class="my-4" data-aos="fade-up" data-aos-delay="200"><a href="#" class="btn btn-primary">Read more</a></p>
            </div>	
        </div>
    </div>
</div>

<div class="section bg-light">
    
    
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="row">
                <h2 class="heading mb-5 text-start">Testimoni Pelanggan</h2>
                <div class="item col m-3">
                    <blockquote class="block-testimonial">
                        <div class="author">
                            <img src="assets/user/images/person_1.jpg" alt="Free template by TemplateUX">
                            <h3>John Doe</h3>
                            <p class="position mb-5"></p>
                        </div>
                        <p>
                            <div class="quote">&ldquo;</div>
                        &ldquo;Alhamdulilah, terima kasih Saudinesia yang Amanah membantu kami dalam perjalanan Umrah kami bersama Keluarga.&rdquo;</p>
                    </blockquote>
                </div>
    
                <div class="item col m-3">
                    <blockquote class="block-testimonial">
                        <div class="author">
                            <img src="assets/user/images/person_2.jpg" alt="Free template by TemplateUX">
                            <h3>James Woodland</h3>
                            <p class="position mb-5"></p>
                        </div>
                        <p>
                            <div class="quote">&ldquo;</div>
                        &ldquo;Terima kasih Saudinesia dengan Teamnya, atas bantuan selama perjalanan Haji kami. Semua berjalan sesuai rencana dan SAUDINESIA akan saya rekomendasikan kepada teman yang lain.&rdquo;</p>
    
                    </blockquote>
                </div>
    
                <div class="item col m-3">
                    <blockquote class="block-testimonial">
                        <div class="author">
                            <img src="assets/user/images/person_3.jpg" alt="Free template by TemplateUX">
                            <h3>Rob Smith</h3>
                            <p class="position mb-5"></p>
                        </div>
                        <p>
                            <div class="quote">&ldquo;</div>
                        &ldquo;A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.&rdquo;</p>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>

</div> <!-- /.untree_co-section -->

<div class="section">
    <div class="container">

        <div class="row">
            <div class="col"data-aos="fade-up" data-aos-delay="0">
                <h2 class="heading mb-5">Informasi Terbaru <a class="btn btn-outline-dark float-end" href="">Lihat Semua</a></h2>
            </div>
                
        </div>
        <div class="row align-items-stretch gx-5">
            <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div class="media-entry">
                    <a href="#">
                        <img src="assets/user/images/gal_1.jpg" alt="Image" class="img-fluid">
                    </a>
                    <div class="bg-white m-body">
                        <span class="date">May 14, 2020</span>
                        <h3><a href="#">Far far away, behind the word mountains</a></h3>
                        <p>Vokalia and Consonantia, there live the blind texts. Separated they live.</p>

                        <a href="single.html" class="more d-flex align-items-center float-start">
                            <span class="label">Read More</span>
                            <span class="arrow"><span class="icon-keyboard_arrow_right"></span></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <div class="media-entry">
                    <a href="#">
                        <img src="assets/user/images/gal_2.jpg" alt="Image" class="img-fluid">
                    </a>
                    <div class="bg-white m-body">
                        <span class="date">May 14, 2020</span>
                        <h3><a href="#">Far far away, behind the word mountains</a></h3>
                        <p>Vokalia and Consonantia, there live the blind texts. Separated they live.</p>

                        <a href="single.html" class="more d-flex align-items-center float-start">
                            <span class="label">Read More</span>
                            <span class="arrow"><span class="icon-keyboard_arrow_right"></span></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                <div class="media-entry">
                    <a href="#">
                        <img src="assets/user/images/gal_3.jpg" alt="Image" class="img-fluid">
                    </a>
                    <div class="bg-white m-body">
                        <span class="date">May 14, 2020</span>
                        <h3><a href="#">Far far away, behind the word mountains</a></h3>
                        <p>Vokalia and Consonantia, there live the blind texts. Separated they live.</p>
                        <a href="single.html" class="more d-flex align-items-center float-start">
                            <span class="label">Read More</span>
                            <span class="arrow"><span class="icon-keyboard_arrow_right"></span></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                <div class="media-entry">
                    <a href="#">
                        <img src="assets/user/images/gal_4.jpg" alt="Image" class="img-fluid">
                    </a>
                    <div class="bg-white m-body">
                        <span class="date">May 14, 2020</span>
                        <h3><a href="#">Far far away, behind the word mountains</a></h3>
                        <p>Vokalia and Consonantia, there live the blind texts. Separated they live.</p>
                        <a href="single.html" class="more d-flex align-items-center float-start">
                            <span class="label">Read More</span>
                            <span class="arrow"><span class="icon-keyboard_arrow_right"></span></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>	
    </div>		
</div>

<div class="site-footer">
    <div class="container">

        <div class="row">
            <div class="col-lg-4">
                <div class="widget">
                    <h3>About Passport<span class="text-primary">.</span> </h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                </div> <!-- /.widget -->
                <div class="widget">
                    <h3>Connect</h3>
                    <ul class="list-unstyled social">
                        <li><a href="#"><span class="icon-instagram"></span></a></li>
                        <li><a href="#"><span class="icon-twitter"></span></a></li>
                        <li><a href="#"><span class="icon-facebook"></span></a></li>
                        <li><a href="#"><span class="icon-linkedin"></span></a></li>
                        <li><a href="#"><span class="icon-pinterest"></span></a></li>
                        <li><a href="#"><span class="icon-dribbble"></span></a></li>
                    </ul>
                </div> <!-- /.widget -->
            </div> <!-- /.col-lg-3 -->

            <div class="col-lg-2 ml-auto">
                <div class="widget">
                    <h3>Links</h3>
                    <ul class="list-unstyled float-left links">
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">News</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div> <!-- /.widget -->
            </div> <!-- /.col-lg-3 -->

            <div class="col-lg-2">
                <div class="widget">
                    <h3>Company</h3>
                    <ul class="list-unstyled float-left links">
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">News</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div> <!-- /.widget -->
            </div> <!-- /.col-lg-3 -->


            <div class="col-lg-3">
                <div class="widget">
                    <h3>Contact</h3>
                    <address>43 Raymouth Rd. Baltemoer, London 3910</address>
                    <ul class="list-unstyled links mb-4">
                        <li><a href="tel://11234567890">+1(123)-456-7890</a></li>
                        <li><a href="tel://11234567890">+1(123)-456-7890</a></li>
                        <li><a href="mailto:info@mydomain.com">info@mydomain.com</a></li>
                    </ul>
                </div> <!-- /.widget -->
            </div> <!-- /.col-lg-3 -->

        </div> <!-- /.row -->

        <div class="row mt-5">
            <div class="col-12 text-center">
                <p class="mb-0">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a> <!-- License information: https://untree.co/license/ --> Distributed By <a href="https:/themewagon.com" target="_blank">ThemeWagon</a>
                </p>
            </div>
        </div> <!-- /.container -->
    </div> <!-- /.site-footer -->

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
@endsection
