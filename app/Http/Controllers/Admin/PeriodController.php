<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Period;

class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::user();
        $periods = Period::paginate(8);
        return view('admin.periods.index', compact('periods', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        // Menampilkan view untuk membuat data baru
        return view('admin.periods.create', compact('user'));
    }

    // Simpan data periode baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        Period::create([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('admin.periods.index')->with('success', 'Periode berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = Auth::user();
        // Temukan data berdasarkan ID
        $periods = Period::findOrFail($id);

        // Kembalikan view dengan data yang ditemukan
        return view('admin.periods.edit', compact('periods', 'user'));
    }

    // Update data periode
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $period = Period::findOrFail($id);
        $period->update([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        return redirect()->route('admin.periods.index')->with('success', 'Periode berhasil diperbarui.');
    }

    // Hapus data
    public function destroy($id)
    {
        $period = Period::findOrFail($id);
        $period->delete();

        return redirect()->route('admin.periods.index')->with('success', 'Periode berhasil dihapus.');
    }
}
