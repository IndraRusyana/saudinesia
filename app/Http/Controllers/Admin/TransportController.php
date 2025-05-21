<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transport;
use App\Models\TransportImages;
use App\Models\TransportPrices;
use App\Models\TransportRoutes;
use App\Models\Period;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class TransportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $routes = TransportRoutes::all();
        $periodId = $request->query('period_id');

        // Ambil semua periode untuk dropdown
        $periods = Period::all();
        $transports = Transport::with(['images', 'prices.period', 'routes']);

        if ($periodId) {
            // Filter hanya harga yang sesuai periode
            $transports = $transports->whereHas('prices', function ($query) use ($periodId) {
                $query->where('period_id', $periodId);
            });
        }

        $transports = $transports->paginate(8)->withQueryString();

        return view('admin.transport.index', compact('transports', 'user', 'periods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $periods = Period::all(); // Mengambil semua data periode
        $routes = TransportRoutes::all();
        // Menampilkan view untuk membuat data baru
        return view('admin.transport.create', compact('user', 'periods', 'routes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'route' => 'required|string',
            'type' => 'required|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'images' => 'array|max:4',
            'active_periods' => 'nullable|array',
        ]);

        DB::beginTransaction();

        try {
            // Simpan data transport
            $transport = Transport::create([
                'name' => $request->name,
                'description' => $request->description,
                'type' => $request->type,
                'route_id' => $request->route,
            ]);

            // Simpan gambar jika ada
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    if ($image) {
                        $path = $image->store('transports', 'public_uploads');
                        TransportImages::create([
                            'transport_id' => $transport->id,
                            'image_path' => $path,
                        ]);
                    }
                }
            }

            // Simpan harga hanya untuk periode yang dipilih
            $selectedPeriods = $request->input('active_periods', []);
            foreach ($selectedPeriods as $period_id) {
                if (isset($request->prices[$period_id])) {
                    $price = $request->prices[$period_id];
                    if ($price !== null && $price !== '') {
                        TransportPrices::create([
                            'transport_id' => $transport->id,
                            'period_id' => $period_id,
                            'price' => $price,
                        ]);
                    }
                }
            }

            DB::commit();
            return redirect()->route('admin.transport.index')->with('success', 'Transport berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Transport $transport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = Auth::user();
        $transport = Transport::with(['images', 'prices'])->findOrFail($id);
        $periods = Period::all();
        $routes = TransportRoutes::all();

        return view('admin.transport.edit', compact('user', 'transport', 'periods', 'routes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $transport = Transport::with('images', 'prices')->findOrFail($id);

        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|string|max:255',
            'route' => 'nullable|string|max:255',
            'image1' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image3' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image4' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Update field dasar
        $transport->update([
            'name' => $request->name,
            'description' => $request->description,
            'type' => $request->type,
            'route_id' => $request->route,
        ]);

        // Simpan gambar baru jika diunggah
        foreach (range(1, 4) as $i) {
            $file = $request->file("image{$i}");
            if ($file) {
                $path = $file->store('transports', 'public_uploads');

                // Hapus gambar lama jika ada
                $existingImage = $transport->images->get($i - 1);
                if ($existingImage) {
                    Storage::disk('public_uploads')->delete($existingImage->image_path);
                    $existingImage->update(['image_path' => $path]);
                } else {
                    $transport->images()->create(['image_path' => $path]);
                }
            }
        }

        // Update harga berdasarkan periode
        $activePeriods = $request->input('active_periods', []);
        $pricesInput = $request->input('prices', []);

        // Hapus harga yang tidak aktif lagi
        $transport->prices()->whereNotIn('period_id', $activePeriods)->delete();

        foreach ($activePeriods as $periodId) {
            $price = $pricesInput[$periodId] ?? null;

            if ($price !== null) {
                $transport->prices()->updateOrCreate(['period_id' => $periodId], ['price' => $price]);
            }
        }

        return redirect()->route('admin.transport.index')->with('success', 'Transport berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $transport = Transport::with('images', 'prices')->findOrFail($id);

        // Hapus semua gambar dari storage dan database
        foreach ($transport->images as $image) {
            if ($image->image_path && Storage::disk('public_uploads')->exists($image->image_path)) {
                Storage::disk('public_uploads')->delete($image->image_path);
            }
            $image->delete();
        }

        // Hapus semua harga terkait
        $transport->prices()->delete();

        // Hapus data transport utama
        $transport->delete();

        return redirect()->route('admin.transport.index')->with('success', 'Transport berhasil dihapus.');
    }
}
