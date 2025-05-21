<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Haji;

class HajiController extends Controller
{
    //
    public function index()
    {
        $query = Haji::paginate(8);
        $home = 'haji';

        $breadcrumbs = [
            ['label' => 'Home', 'url' => '/'],
            ['label' => 'Paket', 'url' => null],
            ['label' => 'Haji', 'url' => null], // Aktif / halaman saat ini
        ];

        return view('user.haji.index', compact('home', 'breadcrumbs', 'query'));
    }

    public function detail($id)
    {
        $home = 'haji';

        $breadcrumbs = [['label' => 'Home', 'url' => '/'], ['label' => 'Paket', 'url' => null], ['label' => 'Haji', 'url' => null]];

        $haji = Haji::findOrFail($id);

        $item = $haji;

        return view('user.haji.detail', compact('home', 'breadcrumbs', 'haji', 'item'));
    }
}
