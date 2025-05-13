<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Umroh;

class UmrohController extends Controller
{
    //
    public function index()
    {
        $query = Umroh::paginate(8);
        $home = 'umroh';

        $breadcrumbs = [
            ['label' => 'Home', 'url' => '/'],
            ['label' => 'Paket', 'url' => null],
            ['label' => 'Umroh', 'url' => null], // Aktif / halaman saat ini
        ];

        return view('user.paketUmroh',  compact('home', 'breadcrumbs','query'));
    }

    public function detail($id)
    {
        $home = 'umroh';

        $breadcrumbs = [
            ['label' => 'Home', 'url' => '/'],
            ['label' => 'Paket', 'url' => null],
            ['label' => 'Umroh', 'url' => null], // Aktif / halaman saat ini
        ];

        $umroh = Umroh::findOrFail($id);

        return view('user.detailUmroh',  compact('home', 'breadcrumbs', 'umroh'));
    }
}
