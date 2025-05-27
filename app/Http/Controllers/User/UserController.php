<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Informations;

class UserController extends Controller
{
    public function index()
    {   
        $home = 'home';
        $informasi = Informations::paginate(4);

        return view('user.index', compact('home','informasi'));
    }

    public function checkout()
    {   
        $home = 'hotel';

        $breadcrumbs = [
            ['label' => 'Home', 'url' => '/'],
            ['label' => 'Layanan', 'url' => null],
            ['label' => 'checkout', 'url' => null], // Aktif / halaman saat ini
        ];

        return view('user.checkout', compact('home','breadcrumbs'));
    }

    public function invoice()
    {   
        $home = 'hotel';

        $breadcrumbs = [
            ['label' => 'Home', 'url' => '/'],
            ['label' => 'Layanan', 'url' => null],
            ['label' => 'invoice', 'url' => null], // Aktif / halaman saat ini
        ];

        return view('user.invoice', compact('home','breadcrumbs'));
    }

    public function uploadPayment()
    {   
        $home = 'hotel';

        $breadcrumbs = [
            ['label' => 'Home', 'url' => '/'],
            ['label' => 'Layanan', 'url' => null],
            ['label' => 'uploadPayment', 'url' => null], // Aktif / halaman saat ini
        ];

        return view('user.uploadPayment', compact('home','breadcrumbs'));
    }

    public function informasi()
    {   
        $query = Informations::paginate(8);

        $home = 'hotel';

        $breadcrumbs = [
            ['label' => 'Home', 'url' => '/'],
            ['label' => 'informasi', 'url' => null], // Aktif / halaman saat ini
        ];

        return view('user.informasi', compact('home','breadcrumbs','query'));
    }

}