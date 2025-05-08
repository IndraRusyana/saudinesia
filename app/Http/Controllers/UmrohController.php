<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UmrohController extends Controller
{
    //
    public function index()
    {
        $home = 'umroh';

        $breadcrumbs = [
            ['label' => 'Home', 'url' => '/'],
            ['label' => 'Paket', 'url' => null],
            ['label' => 'Umroh', 'url' => null], // Aktif / halaman saat ini
        ];

        return view('user.paketUmroh',  compact('home', 'breadcrumbs'));
    }

    public function detail()
    {
        $home = 'umroh';

        $breadcrumbs = [
            ['label' => 'Home', 'url' => '/'],
            ['label' => 'Paket', 'url' => null],
            ['label' => 'Umroh', 'url' => null], // Aktif / halaman saat ini
        ];

        return view('user.detailUmroh',  compact('home', 'breadcrumbs'));
    }
}
