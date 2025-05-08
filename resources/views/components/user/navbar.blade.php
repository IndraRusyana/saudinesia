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
            <div class="col-6 col-lg-3">
                <a href="index.html" class="logo m-0 float-start"><img src="{{asset('assets/user/images/LOGO_SAUDINESIA.png')}}"
                        alt="" srcset="" width="120"></a>
            </div>
            <div class="col-lg-6 d-none d-lg-inline-block text-center nav-center-wrap">
                <ul class="js-clone-nav  text-center site-menu p-0 m-0">
                    <li class=""><a href="/" class="{{ $home == 'home' ? 'active-2' : '' }}"
                            style="font-weight: 600">Home</a></li>
                    <li class="has-children">
                        <a href="#" class="{{ $home == 'haji' || $home == 'umroh' ? 'active-2' : '' }}"
                            style="font-weight: 600;">Paket</a>
                        <ul class="dropdown">
                            <li class="{{ request()->is('haji') ? 'active-2' : '' }}"><a href="/haji">Haji</a></li>
                            <li class="{{ request()->is('umroh') ? 'active-2' : '' }}"><a href="/umroh">Umroh</a></li>
                        </ul>
                    </li>
                    <li class="has-children">
                        <a href="#"
                            class="{{ $home == 'hotel' || $home == 'transport' || $home == 'muttowif' || $home == 'visa' ? 'active-2' : '' }}"
                            style="font-weight: 600">Layanan</a>
                        <ul class="dropdown">
                            <li class="{{ request()->is('hotel') ? 'active-2' : '' }}"><a href="/hotel">Hotel</a></li>
                            <li class="{{ request()->is('transport') ? 'active-2' : '' }}"><a
                                    href="/transport">Transport</a></li>
                            <li class="{{ request()->is('muttowif') ? 'active-2' : '' }}"><a
                                    href="/muttowif">Muttowif</a></li>
                            <li class="{{ request()->is('visa') ? 'active-2' : '' }}"><a href="/visa">Visa</a></li>
                        </ul>
                    </li>
                    <li><a href="/informasi" class="{{ $home == 'informasi' ? 'active-2' : '' }}"
                            style="font-weight: 600">Informasi</a></li>
                    <li><a href="" class="{{ $home == 'tentang kami' ? 'active-2' : '' }}"
                            style="font-weight: 600">Tentang Kami</a></li>
                    <li><a href="" class="{{ $home == 'helpdesk' ? 'active-2' : '' }}"
                            style="font-weight: 600">Helpdesk</a></li>
                </ul>
            </div>
            <div class="col-6 col-lg-3 text-lg-end">
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
                    {{-- Tombol logout untuk user yang sudah login --}}
                    <form method="POST" action="{{ route('user.logout') }}">
                        @csrf
                        <a class="btn btn-outline-warning" href="{{ route('user.logout') }}"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            {{-- <i class="bx bx-power-off me-2"></i> --}}
                            <span class="align-middle">{{ __('Log Out') }}</span>
                        </a>
                    </form>
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
