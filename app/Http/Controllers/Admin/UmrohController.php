<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Umroh;
use App\Models\LandArrangement;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UmrohController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::user();
        $query = Umroh::paginate(8);
        return view('admin.umroh.index', compact('query', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tambah()
    {
        $user = Auth::user();
        // Menampilkan view untuk membuat data baru
        $landArrangements = LandArrangement::all(); // ambil semua data LA
        return view('admin.umroh.create', compact('user', 'landArrangements'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'prices' => 'required|numeric',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'land_arrangement_id' => 'required|exists:land_arrangements,id',
        ]);

        // Mendapatkan file gambar yang diupload
        $file = $request->file('images');

        // Mengganti nama file dengan format yang diinginkan
        $fileName = time() . '_' . $file->getClientOriginalName();

        // Menyimpan file gambar ke storage dengan nama baru
        $imagePath = $file->storeAs('images', $fileName, 'public_uploads');

        // Membuat instance baru dari model umroh
        $umroh = new Umroh();
        $umroh->name = $request->input('name');
        $umroh->description = $request->input('description');
        $umroh->prices = $request->input('prices');
        $umroh->land_arrangement_id = $request->input('land_arrangement_id');
        $umroh->images = $imagePath;

        // Menyimpan data ke database
        $umroh->save();

        // Mengalihkan pengguna ke halaman lain dengan pesan sukses
        return redirect()->route('admin.umroh.index')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = Auth::user();
        $landArrangements = LandArrangement::all();
        // Temukan data berdasarkan ID
        $umroh = Umroh::findOrFail($id);
        $la_id = $umroh->land_arrangement_id;
        $la_data = LandArrangement::findOrFail($la_id); // ambil semua data LA

        // Kembalikan view dengan data yang ditemukan
        return view('admin.umroh.edit', compact('umroh', 'user', 'landArrangements', 'la_data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'prices' => 'required|numeric',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'land_arrangement_id' => 'required|exists:land_arrangements,id',
        ]);

        // Temukan data berdasarkan ID
        $umroh = Umroh::findOrFail($id);

        // Update nama
        $umroh->name = $request->input('name');
        $umroh->description = $request->input('description');
        $umroh->prices = $request->input('prices');
        $umroh->land_arrangement_id = $request->input('land_arrangement_id');

        // Jika ada gambar baru yang diupload
        if ($request->hasFile('images')) {
            // Hapus gambar lama jika ada
            if ($umroh->images) {
                Storage::disk('public_uploads')->delete($umroh->images);
            }

            // Mendapatkan file gambar yang diupload
            $file = $request->file('images');

            // Mengganti nama file dengan format yang diinginkan
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Menyimpan file gambar ke storage dengan nama baru
            $imagePath = $file->storeAs('images', $fileName, 'public_uploads');

            // Update path gambar di database
            $umroh->images = $imagePath;
        }

        // Simpan perubahan ke database
        $umroh->save();

        // Mengalihkan pengguna ke halaman lain dengan pesan sukses
        return redirect()->route('admin.umroh.index')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Temukan data berdasarkan ID
        $umroh = Umroh::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($umroh->image) {
            Storage::disk('public_uploads')->delete($umroh->image);
        }

        // Hapus data dari database
        $umroh->delete();

        // Mengalihkan pengguna ke halaman lain dengan pesan sukses
        return redirect()->route('admin.umroh.index')->with('success', 'Data berhasil dihapus!');
    }
}
