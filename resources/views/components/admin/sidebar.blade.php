<nav id="sidebar">
    <div class="sidebar-header">
        <img src="{{ asset('assets/user/images/LOGO_SAUDINESIA.png') }}" alt="Saudinesia logo" class="app-logo"
            width="120">
    </div>
    <ul class="list-unstyled components text-secondary">
        <li>
            <a href="/admin/dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        </li>

        <li>
            <a href="#uipaketmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down">
                <i class="fas fa-boxes"></i> Paket
            </a>
            <ul class="collapse list-unstyled" id="uipaketmenu">
                <li><a href="/admin/paket/haji"><i class="fas fa-kaaba"></i> Haji</a></li>
                <li><a href="/admin/paket/umroh"><i class="fas fa-mosque"></i> Umroh</a></li>
            </ul>
        </li>

        <li>
            <a href="#uilayananmenu" data-bs-toggle="collapse" aria-expanded="false"
                class="dropdown-toggle no-caret-down">
                <i class="fas fa-concierge-bell"></i> Layanan
            </a>
            <ul class="collapse list-unstyled" id="uilayananmenu">
                <li><a href="/admin/layanan/hotel"><i class="fas fa-hotel"></i> Hotel</a></li>
                <li><a href="/admin/layanan/transport"><i class="fas fa-bus-alt"></i> Transport</a></li>
                <li><a href="/admin/layanan/muttowif"><i class="fas fa-user-friends"></i> Muttowif</a></li>
                <li><a href="/admin/layanan/visa"><i class="fas fa-passport"></i> Visa</a></li>
            </ul>
        </li>

        <li><a href="/admin/informasi"><i class="fas fa-info-circle"></i> Informasi</a></li>
        <li><a href="/admin/users"><i class="fas fa-users"></i> User</a></li>
        <li><a href="/admin/transactions"><i class="fas fa-cogs"></i> Transaksi</a></li>
        <li><a href="/admin/periode"><i class="fas fa-calendar"></i> Periode</a></li>
        <li><a href="/admin/kota"><i class="fas fa-city"></i> Kota</a></li>
        <li><a href="/admin/rute"><i class="fas fa-route"></i> Rute</a></li>
        <li><a href="/admin/merchandise"><i class="fas fa-shopping-bag"></i> Merchandise</a></li>
        <li><a href="/land-arrangements"><i class="fas fa-map-marked-alt"></i> Land Arrangements</a></li>
        <li><a href="/admin/content"><i class="fas fa-map-marked-alt"></i> Konten</a></li>
    </ul>

</nav>
