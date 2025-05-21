<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Hotel;
use App\Models\HotelImage;
use App\Models\HotelPrice;
use App\Models\RoomType;
use App\Models\Period;
use App\Models\Cities;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $periodId = $request->query('period_id');

        // Ambil semua periode untuk dropdown
        $periods = Period::all();

        $hotels = Hotel::with(['images', 'prices.period', 'prices.roomType']);

        if ($periodId) {
            // Filter hanya harga yang sesuai periode
            $hotels = $hotels->whereHas('prices', function ($query) use ($periodId) {
                $query->where('period_id', $periodId);
            });
        }

        $hotels = $hotels->paginate(8)->withQueryString();

        return view('admin.hotel.index', compact('hotels', 'user', 'periods'));
    }

    public function create()
    {
        $user = Auth::user();
        $periods = Period::all(); // Mengambil semua data periode
        $roomTypes = RoomType::all(); // Mengambil semua data jenis kamar
        $cities = Cities::all();
        // Menampilkan view untuk membuat data baru
        return view('admin.hotel.create', compact('user', 'periods', 'roomTypes','cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'description' => 'required|string',
            'map_url' => 'nullable|url',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'images' => 'array|max:4',
            'active_periods' => 'nullable|array',
            'city_id' => 'required|exists:cities,id',
        ]);

        DB::beginTransaction();

        try {
            $hotel = Hotel::create([
                'name' => $request->name,
                'address' => $request->address,
                'description' => $request->description,
                'map_url' => $request->map_url,
                'city_id' => $request->city_id,
            ]);

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    if ($image) {
                        $path = $image->store('hotels', 'public_uploads');
                        HotelImage::create([
                            'hotel_id' => $hotel->id,
                            'image_path' => $path,
                        ]);
                    }
                }
            }

            // Simpan harga hanya untuk periode yang dipilih
            $selectedPeriods = $request->input('active_periods', []);
            foreach ($selectedPeriods as $period_id) {
                if (isset($request->prices[$period_id])) {
                    foreach ($request->prices[$period_id] as $room_type_id => $price) {
                        if ($price !== null && $price !== '') {
                            HotelPrice::create([
                                'hotel_id' => $hotel->id,
                                'period_id' => $period_id,
                                'room_type_id' => $room_type_id,
                                'price' => $price,
                            ]);
                        }
                    }
                }
            }

            DB::commit();

            return redirect()->route('admin.hotel.index')->with('success', 'Hotel berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function edit($id)
    {
        $user = Auth::user();
        $hotel = Hotel::with(['images', 'prices', 'prices.period', 'prices.roomType'])->findOrFail($id);
        $periods = Period::all();
        $roomTypes = RoomType::all();
        $cities = Cities::all();

        return view('admin.hotel.edit', compact('user', 'hotel', 'periods', 'roomTypes', 'cities'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'description' => 'required|string',
            'map_url' => 'nullable|url',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'image4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'active_periods' => 'nullable|array',
            'city_id' => 'required|exists:cities,id',
        ]);

        DB::beginTransaction();

        try {
            $hotel = Hotel::findOrFail($id);
            $hotel->update([
                'name' => $request->name,
                'address' => $request->address,
                'description' => $request->description,
                'map_url' => $request->map_url,
                'city_id' => $request->city_id,
            ]);

            // Proses upload gambar baru (image1-4)
            foreach (range(1, 4) as $i) {
                $inputName = "image{$i}";
                if ($request->hasFile($inputName)) {
                    // Cek apakah sudah ada image ke-i
                    $existingImage = $hotel->images->get($i - 1); // index dari 0
                    if ($existingImage) {
                        Storage::disk('public_uploads')->delete($existingImage->image_path);
                        $existingImage->delete();
                    }

                    $path = $request->file($inputName)->store('hotels', 'public_uploads');
                    HotelImage::create([
                        'hotel_id' => $hotel->id,
                        'image_path' => $path,
                    ]);
                }
            }

            // Update harga
            HotelPrice::where('hotel_id', $hotel->id)->delete();

            $selectedPeriods = $request->input('active_periods', []);
            foreach ($selectedPeriods as $period_id) {
                if (isset($request->prices[$period_id])) {
                    foreach ($request->prices[$period_id] as $room_type_id => $price) {
                        if ($price !== null && $price !== '') {
                            HotelPrice::create([
                                'hotel_id' => $hotel->id,
                                'period_id' => $period_id,
                                'room_type_id' => $room_type_id,
                                'price' => $price,
                            ]);
                        }
                    }
                }
            }

            DB::commit();
            return redirect()->route('admin.hotel.index')->with('success', 'Hotel berhasil diperbarui!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $hotel = Hotel::with('images')->findOrFail($id);

            // Hapus gambar dari storage dan database
            foreach ($hotel->images as $image) {
                if (Storage::disk('public_uploads')->exists($image->image_path)) {
                    Storage::disk('public_uploads')->delete($image->image_path);
                }
                $image->delete();
            }

            // Hapus harga-harga
            HotelPrice::where('hotel_id', $hotel->id)->delete();

            // Hapus data hotel
            $hotel->delete();

            DB::commit();
            return redirect()->route('admin.hotel.index')->with('success', 'Hotel berhasil dihapus!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()
                ->route('admin.hotel.index')
                ->with('error', 'Gagal menghapus hotel: ' . $e->getMessage());
        }
    }
}
