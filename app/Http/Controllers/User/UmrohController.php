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

        return view('user.umroh.index',  compact('home', 'breadcrumbs','query'));
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

        $item = $umroh;

        return view('user.umroh.detail',  compact('home', 'breadcrumbs', 'umroh', 'item'));
    }
}
