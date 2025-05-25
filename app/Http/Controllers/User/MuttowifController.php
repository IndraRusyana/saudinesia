<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Muttowif;
use App\Models\PriceMuttowif;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MuttowifController extends Controller
{
    public function index()
    {
        $home = 'muttowif';

        $breadcrumbs = [
            ['label' => 'Home', 'url' => '/'],
            ['label' => 'Layanan', 'url' => null],
            ['label' => 'Muttowif', 'url' => null], // Aktif / halaman saat ini
        ];

        return view('user.muttowif.index', compact('home', 'breadcrumbs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'jamaah_count' => 'required|integer|min:1',
        ]);

        $data = $request->only(['start_date', 'end_date', 'jamaah_count']);
        $harga = PriceMuttowif::latest()->first()->price;

        return view('user.muttowif.detail', [
            'home' => 'muttowif',
            'breadcrumbs' => [['label' => 'Home', 'url' => '/'], ['label' => 'Layanan', 'url' => null], ['label' => 'Muttowif', 'url' => null]],
            'data' => $data,
            'harga' => $harga,
        ]);
    }

    public function detail($id)
    {
        $home = 'muttowif';

        $breadcrumbs = [
            ['label' => 'Home', 'url' => '/'],
            ['label' => 'Layanan', 'url' => null],
            ['label' => 'Muttowif', 'url' => null], // Aktif / halaman saat ini
        ];

        $muttowif = Muttowif::findOrFail($id);
        $harga = PriceMuttowif::latest()->first()->price;

        return view('user.muttowif.detail', compact('muttowif', 'harga', 'home', 'breadcrumbs'));
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'jamaah_count' => 'required|integer|min:1',
            'unit_price' => 'required|numeric|min:0',
        ]);

        $muttowif = Muttowif::create([
            'user_id' => auth()->id(),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'jamaah_count' => $request->jamaah_count,
        ]);

        $home = 'muttowif';

        $breadcrumbs = [
            ['label' => 'Home', 'url' => '/'],
            ['label' => 'Layanan', 'url' => null],
            ['label' => 'Muttowif', 'url' => null], // Aktif / halaman saat ini
        ];

        // Redirect dan kirim POST ke checkout.confirm dengan form auto-submit
        return view('user.muttowif.forward-checkout', [
            'itemable_type' => Muttowif::class,
            'itemable_id' => $muttowif->id,
            'unit_price' => $request->unit_price,
            'home' => $home,
            'breadcrumbs' => $breadcrumbs
        ]);
    }
}
