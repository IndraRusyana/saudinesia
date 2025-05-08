<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisaController extends Controller
{
    //
    public function index()
    {
        $home = 'visa';

        $breadcrumbs = [
            ['label' => 'Home', 'url' => '/'],
            ['label' => 'Layanan', 'url' => null],
            ['label' => 'Visa', 'url' => null], // Aktif / halaman saat ini
        ];

        return view('user.serviceVisa', compact('home', 'breadcrumbs'));
    }
}
