<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Haji;
use App\Models\Umroh;
use App\Models\Hotel;
use App\Models\Transport;
use App\Models\Visa;
use App\Models\Muttowif;
use App\Models\Merchandise;
use App\Models\Transaction;
use App\Models\LandArrangement;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.dashboard', [
            'users' => User::count(),
            'haji' => Haji::count(),
            'umroh' => Umroh::count(),
            'hotels' => Hotel::count(),
            'transport' => Transport::count(),
            'visa' => Visa::count(),
            'muttowif' => Muttowif::count(),
            'merchandise' => Merchandise::count(),
            'transactions' => Transaction::count(),
            'landArrangements' => LandArrangement::count(),
            'visaLatest' => Visa::latest()->take(5)->get(),
            'muttowifList' => Muttowif::with('user')->latest()->take(5)->get(),
            'user' => $user,
        ]);
    }

    public function listUser()
    {
        $user = Auth::user();
        $query = User::latest()->paginate(10); // bisa ubah jadi all() jika tidak ingin pagination
        return view('admin.user.index', compact('query', 'user'));
    }
}
