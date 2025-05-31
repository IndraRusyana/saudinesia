<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
            <span class="icofont-close js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

@if ($home == 'home')
    <nav class="site-nav mt-3">
    @else
        <nav class="site-nav" style="position: relative; background-color:#D9D9D9;">
@endif
<div class="container">

    <div class="site-navigation">
        <div class="row">
            <div class="col">
                <a href="index.html" class="logo m-0 float-start"><img
                        src="{{ asset('assets/user/images/LOGO_SAUDINESIA.png') }}" alt="" srcset=""
                        width="120"></a>
            </div>
            <div class="col-md-8 col-lg-8 d-none d-lg-inline-block text-center nav-center-wrap">
                <ul class="js-clone-nav  text-center site-menu p-0 m-0">
                    <li class=""><a href="/" class="{{ $home == 'home' ? 'active-2' : '' }}"
                            style="font-weight: 600">{{ __('messages.home') }}</a></li>
                    <li class="has-children">
                        <a href="#" class="{{ $home == 'haji' || $home == 'umroh' ? 'active-2' : '' }}"
                            style="font-weight: 600;">{{ __('messages.paket') }}</a>
                        <ul class="dropdown">
                            <li class="{{ request()->is('haji') ? 'active-2' : '' }}"><a href="/haji">Haji</a></li>
                            <li class="{{ request()->is('umroh') ? 'active-2' : '' }}"><a href="/umroh">Umroh</a></li>
                        </ul>
                    </li>
                    <li class="has-children">
                        <a href="#"
                            class="{{ $home == 'hotel' || $home == 'transport' || $home == 'muttowif' || $home == 'visa' || $home == 'merchandise' ? 'active-2' : '' }}"
                            style="font-weight: 600">{{ __('messages.layanan') }}</a>
                        <ul class="dropdown">
                            <li class="{{ request()->is('hotel') ? 'active-2' : '' }}"><a href="/hotel">Hotel</a></li>
                            <li class="{{ request()->is('transport') ? 'active-2' : '' }}"><a href="/transport">Transport</a></li>
                            <li class="{{ request()->is('muttowif') ? 'active-2' : '' }}"><a href="/muttowif">Muttowif</a></li>
                            <li class="{{ request()->is('visa') ? 'active-2' : '' }}"><a href="/visa">Visa</a></li>
                            <li class="{{ request()->is('merchandise') ? 'active-2' : '' }}"><a href="/merchandise">Merchandise</a></li>
                        </ul>
                    </li>
                    <li><a href="/informasi" class="{{ $home == 'informasi' ? 'active-2' : '' }}"
                            style="font-weight: 600">{{ __('messages.informasi') }}</a></li>
                    {{-- <li><a href="" class="{{ $home == 'tentang kami' ? 'active-2' : '' }}"
                            style="font-weight: 600">{{ __('messages.tentang_kami') }}</a></li> --}}
                    <li><a href="" class="{{ $home == 'helpdesk' ? 'active-2' : '' }}"
                            style="font-weight: 600">{{ __('messages.helpdesk') }}</a></li>
                    <li class="has-children">
                        <a href="#" style="font-weight: 600">{{ strtoupper(app()->getLocale()) }}</a>
                        <ul class="dropdown">
                            <li><a href="{{ route('lang.switch', 'en') }}">English</a></li>
                            <li><a href="{{ route('lang.switch', 'id') }}">Bahasa</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="col text-lg-end">
                @guest('user')
                    {{-- Tombol untuk tamu (belum login) --}}
                    <div class="button js-clone-nav d-none d-lg-inline-block px-0">
                        <a class="btn btn-light {{ $home !== 'home' ? 'btn-dark' : '' }} px-3 py-2"
                            href="/login">Login</a>
                    </div>
                    <div class="button js-clone-nav d-none d-lg-inline-block">
                        <a class="btn btn-light {{ $home !== 'home' ? 'btn-dark' : '' }} px-3 py-2"
                            href="/register">Register</a>
                    </div>
                @endguest

                @auth('user')
                    {{-- Dropdown menu user --}}
                    <div class="dropdown d-none d-lg-inline-block">
                        <a class="btn btn-light dropdown-toggle {{ $home !== 'home' ? 'btn-dark' : '' }} px-3 py-2"
                            href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::guard('user')->user()->profile->nama_lengkap }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item {{ $home == 'profile' ? 'active-2' : '' }}"
                                    href="/profiles">Profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ $home == 'cart' ? 'active-2' : '' }}"
                                    href="/carts">Keranjang</a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ $home == 'pesanan' ? 'active-2' : '' }}" href="/pesanan">Pesanan
                                    Saya</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form method="POST" action="{{ route('user.logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth


                <a href="#"
                    class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light"
                    data-toggle="collapse" data-target="#main-navbar">
                    <span></span>
                </a>
            </div>
        </div>
    </div>

</div>
</nav>
