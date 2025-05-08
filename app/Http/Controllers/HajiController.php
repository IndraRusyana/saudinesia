<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HajiController extends Controller
{
    //
    public function index()
    {
        $home = 'haji';

        $breadcrumbs = [
            ['label' => 'Home', 'url' => '/'],
            ['label' => 'Paket', 'url' => null],
            ['label' => 'Haji', 'url' => null], // Aktif / halaman saat ini
        ];

        return view('user.paketHaji',  compact('home', 'breadcrumbs'));
    }
    
    public function detail()
    {
        $home = 'haji';

        $breadcrumbs = [
            ['label' => 'Home', 'url' => '/'],
            ['label' => 'Paket', 'url' => null],
            ['label' => 'Haji', 'url' => null], // Aktif / halaman saat ini
        ];

        return view('user.detailHaji',  compact('home', 'breadcrumbs'));
    }
}
