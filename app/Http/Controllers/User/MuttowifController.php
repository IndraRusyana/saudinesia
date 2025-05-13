<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Muttowif;
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

        return view('user.serviceMuttowif', compact('home', 'breadcrumbs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'jamaah_count' => 'required|integer|min:1',
        ]);

        Muttowif::create([
            'user_id' => auth()->id(),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'jamaah_count' => $request->jamaah_count,
        ]);

        return redirect()->back()->with('success', 'Pemesanan Muttowif berhasil dikirim.');
    }
}
