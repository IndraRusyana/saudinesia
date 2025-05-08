<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotelController extends Controller
{
    //
    public function index()
    {
        $home = 'hotel';

        $breadcrumbs = [
            ['label' => 'Home', 'url' => '/'],
            ['label' => 'Layanan', 'url' => null],
            ['label' => 'Hotel', 'url' => null], // Aktif / halaman saat ini
        ];

        return view('user.serviceHotel', compact('home', 'breadcrumbs'));
    }

    public function detail()
    {
        $home = 'hotel';

        $breadcrumbs = [
            ['label' => 'Home', 'url' => '/'],
            ['label' => 'Layanan', 'url' => null],
            ['label' => 'Hotel', 'url' => null], // Aktif / halaman saat ini
        ];

        return view('user.detailHotel',  compact('home', 'breadcrumbs'));
    }

    public function pemesananHotel()
    {
        $home = 'hotel';

        $breadcrumbs = [
            ['label' => 'Home', 'url' => '/'],
            ['label' => 'Layanan', 'url' => null],
            ['label' => 'Hotel', 'url' => null], // Aktif / halaman saat ini
        ];

        return view('user.pemesananHotel',  compact('home', 'breadcrumbs'));
    }
}
