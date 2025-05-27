<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Informations;

class InformationsController extends Controller
{
    public function index()
    {   
        $query = Informations::paginate(8);

        $home = 'informasi';

        $breadcrumbs = [
            ['label' => 'Home', 'url' => '/'],
            ['label' => 'informasi', 'url' => null], // Aktif / halaman saat ini
        ];

        return view('user.informasi.index', compact('home','breadcrumbs','query'));
    }

        public function detail($id)
    {
        $home = 'informasi';

        $breadcrumbs = [
            ['label' => 'Home', 'url' => '/'],
            ['label' => 'Informasi', 'url' => null],
        ];

        $informasi = Informations::findOrFail($id);

        return view('user.informasi.detail', compact('home', 'breadcrumbs', 'informasi'));
    }
}
