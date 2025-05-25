<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Muttowif;
use App\Models\PriceMuttowif;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MuttowifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::user();
        $muttowif = Muttowif::orderBy('created_at', 'desc')->paginate(20);
        $price = PriceMuttowif::first();
        
        return view('admin.muttowif.index', compact('muttowif', 'user', 'price'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Muttowif $muttowif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Muttowif $muttowif)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'price' => 'required|numeric|min:0',
        ]);

        $price = PriceMuttowif::findOrFail($id);
        $price->price = $request->input('price');
        $price->save();

        return redirect()->route('admin.muttowif.index')->with('success', 'Harga Muttowif berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Muttowif $muttowif)
    {
        //
    }
}
