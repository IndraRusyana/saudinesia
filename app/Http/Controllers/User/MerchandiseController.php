<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Merchandise;

class MerchandiseController extends Controller
{
    public function index()
    {
        $query = Merchandise::paginate(8);
        $home = 'merchandise';

        $breadcrumbs = [
            ['label' => 'Home', 'url' => '/'],
            ['label' => 'Merchandise', 'url' => null],// Aktif / halaman saat ini
        ];

        return view('user.merchandise.index', compact('home', 'breadcrumbs', 'query'));
    }

    public function detail($id)
    {
        $home = 'merchandise';

        $breadcrumbs = [['label' => 'Home', 'url' => '/'], ['label' => 'Merchandise', 'url' => null],];

        $merchandise = Merchandise::findOrFail($id);

        $item = $merchandise;

        return view('user.merchandise.detail', compact('home', 'breadcrumbs', 'merchandise', 'item'));
    }
}
