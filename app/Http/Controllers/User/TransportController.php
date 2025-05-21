<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transport;
use App\Models\Period;

class TransportController extends Controller
{
    //
    public function index(Request $request)
    {
        // Ambil semua periode untuk dropdown (jika nanti dipakai)
        $periods = Period::orderBy('start_date')->get(); // Periode diurutkan dari yang terdekat

        // Tentukan nilai default jika tidak ada query
        $defaultPeriodId = $periods->first()?->id;

        // Ambil filter dari query, fallback ke default
        $periodId = $request->input('period', $defaultPeriodId);

        // Ambil hotel dengan relasi
        $query = Transport::with(['images', 'prices']);

        // Filter berdasarkan periode (harus filter dari hotel_prices)
        if ($periodId) {
            $query->whereHas('prices', function ($q) use ($periodId) {
                $q->where('period_id', $periodId);
            });
        }

        $transport = $query->paginate(8);

        $home = 'transport';
        $breadcrumbs = [
            ['label' => 'Home', 'url' => '/'],
            ['label' => 'Layanan', 'url' => null],
            ['label' => 'Transport', 'url' => null], // Aktif / halaman saat ini
        ];

        return view('user.transport.index', compact('transport', 'home', 'breadcrumbs', 'periods', 'periodId'));
    }

    public function detail(Request $request, $id)
    {
        $home = 'transport';

        $breadcrumbs = [
            ['label' => 'Home', 'url' => '/'],
            ['label' => 'Layanan', 'url' => null],
            ['label' => 'Transport', 'url' => null], // Aktif / halaman saat ini
        ];

        $transport = Transport::with(['images', 'prices.period', 'routes'])->findOrFail($id);
        $periodId = $request->query('period_id') ?? $transport->prices->first()?->period_id;

        // Filter harga hanya untuk periode tertentu
        $filteredPrices = $transport->prices->where('period_id', $periodId);

        // Ambil data periode untuk ditampilkan
        $selectedPeriod = Period::find($periodId);

        $item = $transport;

        return view('user.transport.detail', compact('home', 'breadcrumbs', 'transport', 'filteredPrices', 'selectedPeriod', 'item'));
    }
}
