<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Cities;
use App\Models\Period;

class HotelController extends Controller
{
    public function index(Request $request)
    {
        $cities = Cities::all();
        $periods = Period::orderBy('start_date')->get(); // Periode diurutkan dari yang terdekat

        // Tentukan nilai default jika tidak ada query
        $defaultCityId = $cities->first()?->id;
        $defaultPeriodId = $periods->first()?->id;

        // Ambil filter dari query, fallback ke default
        $cityId = $request->input('city', $defaultCityId);
        $periodId = $request->input('period', $defaultPeriodId);

        // Query hotel
        $query = Hotel::with(['images', 'prices', 'city']);

        if ($cityId) {
            $query->where('city_id', $cityId);
        }

        if ($periodId) {
            $query->whereHas('prices', function ($q) use ($periodId) {
                $q->where('period_id', $periodId);
            });
        }

        $hotel = $query->paginate(8);

        $home = 'hotel';
        $breadcrumbs = [['label' => 'Home', 'url' => '/'], ['label' => 'Layanan', 'url' => null], ['label' => 'Hotel', 'url' => null]];

        return view('user.serviceHotel', compact('hotel', 'home', 'breadcrumbs', 'cities', 'periods', 'cityId', 'periodId'));
    }

    public function detail(Request $request, $id)
    {
        $home = 'hotel';

        $breadcrumbs = [
            ['label' => 'Home', 'url' => '/'],
            ['label' => 'Layanan', 'url' => null],
            ['label' => 'Hotel', 'url' => null], // Aktif / halaman saat ini
        ];

        $hotel = Hotel::with(['images', 'prices.period', 'prices.roomType', 'city'])->findOrFail($id);
        $periodId = $request->query('period_id');
        $cityId = $request->query('city_id');

        // Filter harga hanya untuk periode tertentu
        $filteredPrices = $hotel->prices->where('period_id', $periodId);

        // Ambil data periode untuk ditampilkan
        $selectedPeriod = Period::find($periodId);

        return view('user.detailHotel', compact('home', 'breadcrumbs', 'hotel', 'filteredPrices', 'selectedPeriod'));
    }

    public function pemesananHotel()
    {
        $home = 'hotel';

        $breadcrumbs = [
            ['label' => 'Home', 'url' => '/'],
            ['label' => 'Layanan', 'url' => null],
            ['label' => 'Hotel', 'url' => null], // Aktif / halaman saat ini
        ];

        return view('user.pemesananHotel', compact('home', 'breadcrumbs'));
    }
}
