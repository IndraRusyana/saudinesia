<div class="site-footer" style="background-color:#D9D9D9;">
    <div class="container">

        <div class="row">
            <div class="col-lg-3 pe-4">
                <!-- Content -->
                <img class="mb-4 img-fluid w-50" src="{{ asset('assets/user/images/LOGO_SAUDINESIA.png') }}" alt=""
                    srcset="">
                <p>
                    {{__('messages.footer_desk')}}
                    {{-- Kami memahami betapa pentingnya perjalanan ini bagi setiap Muslim, kami berusaha untuk memastikan
                    bahwa setiap jamaah kami mendapatkan pelayanan terbaik dengan kenyamanan dan kepuasan yang maksimal. --}}
                </p>
                {{-- <div class="widget">
                    <h3>Connect</h3>
                    <ul class="list-unstyled social">
                        <li><a href="#"><span class="icon-instagram"></span></a></li>
                        <li><a href="#"><span class="icon-twitter"></span></a></li>
                        <li><a href="#"><span class="icon-facebook"></span></a></li>
                        <li><a href="#"><span class="icon-linkedin"></span></a></li>
                        <li><a href="#"><span class="icon-pinterest"></span></a></li>
                        <li><a href="#"><span class="icon-dribbble"></span></a></li>
                    </ul>
                </div>  --}}
                <!-- /.widget -->
            </div>
            {{-- <div class="col-lg-4">
                <div class="widget">
                    <a href="index.html" class="logo m-0 float-start"><img src="assets/user/images/LOGO_SAUDINESIA.png" alt="" srcset="" width="120"></a>
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
            </div> <!-- /.col-lg-3 --> --}}

            <div class="col-lg-2 ml-auto">
                <div class="widget">
                    <h3>{{ __('messages.paket') }}</h3>
                    <ul class="list-unstyled float-left links">
                        <li><a href="/haji">{{ __('messages.haji') }}</a></li>
                        <li><a href="/umroh">{{ __('messages.umroh') }}</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="widget">
                    <h3>{{ __('messages.layanan') }}</h3>
                    <ul class="list-unstyled float-left links">
                        <li><a href="/hotel">{{ __('messages.hotel') }}</a></li>
                        <li><a href="/transport">{{ __('messages.transport') }}</a></li>
                        <li><a href="/muttowif">{{ __('messages.muttowif') }}</a></li>
                        <li><a href="/visa">{{ __('messages.visa') }}</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="widget">
                    <h3>{{ __('messages.tautan') }}</h3>
                    <ul class="list-unstyled float-left links">
                        <li><a href="/informasi">{{ __('messages.informasi') }}</a></li>
                        <li><a href="/">{{ __('messages.tentang_kami') }}</a></li>
                        <li><a href="/helpdesk">{{ __('messages.helpdesk') }}</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="widget">
                    <h3>{{ __('messages.alamat') }}</h3>
                    <address>Jalan Siliwangi – Karisma Siliwangi Residence C11 -
                        Cikalang – Tawang, Kota Tasikmalaya 46114 Jawa Barat INDONESIA
                    </address>
                    <ul class="list-unstyled links mb-4">
                        <li><a href="tel://+6281122896789">+62 811 2289 6789 </a></li>
                        <li><a href="tel://+966530565175">+966 53 056 5175 </a></li>
                        <li><a href="tel://+966536219322">+966 53 621 9322 </a></li>
                        <li><a href="mailto:info@saudinesia.id">info@saudinesia.id</a></li>
                    </ul>
                </div>
            </div>


        </div> <!-- /.row -->

        <div class="row mt-5">
            <div class="col-12 text-center">
                <p class="mb-0">Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script>. All Rights Reserved.
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
</div>
