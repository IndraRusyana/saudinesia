<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $cities = Cities::paginate(8);
        return view('admin.cities.index', compact('cities', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        // Menampilkan view untuk membuat data baru
        return view('admin.cities.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Cities::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.cities.index')->with('success', 'Kota berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Cities $cities)
    // {
    //     $user = Auth::user();
    //     // Temukan data berdasarkan ID
    //     $periods = Period::findOrFail($id);

    //     // Kembalikan view dengan data yang ditemukan
    //     return view('admin.periods.edit', compact('periods', 'user'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = Auth::user();
        // Temukan data berdasarkan ID
        $cities = Cities::findOrFail($id);

        // Kembalikan view dengan data yang ditemukan
        return view('admin.cities.edit', compact('cities', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $cities = Cities::findOrFail($id);
        $cities->update([
            'name' => $request->name,
        ]);
        return redirect()->route('admin.cities.index')->with('success', 'Kota berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cities = Cities::findOrFail($id);
        $cities->delete();

        return redirect()->route('admin.cities.index')->with('success', 'Kota berhasil dihapus.');
    }
}
