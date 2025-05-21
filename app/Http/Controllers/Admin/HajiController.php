<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Haji;
use App\Models\LandArrangement;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class HajiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::user();
        $query = Haji::paginate(8);
        return view('admin.haji.index', compact('query', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tambah()
    {
        $user = Auth::user();
        // Menampilkan view untuk membuat data baru
        $landArrangements = LandArrangement::all(); // ambil semua data LA
        return view('admin.haji.create', compact('user', 'landArrangements'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'prices' => 'required|numeric',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'land_arrangement_id' => 'required|exists:land_arrangements,id',
        ]);

        // dd($request);

        // Mendapatkan file gambar yang diupload
        $file = $request->file('images');

        // Mengganti nama file dengan format yang diinginkan
        $fileName = time() . '_' . $file->getClientOriginalName();

        // Menyimpan file gambar ke storage dengan nama baru
        $imagePath = $file->storeAs('images', $fileName, 'public_uploads');

        // Membuat instance baru dari model haji
        $haji = new Haji();
        $haji->name = $request->input('name');
        $haji->description = $request->input('description');
        $haji->prices = $request->input('prices');
        $haji->land_arrangement_id = $request->input('land_arrangement_id');
        $haji->images = $imagePath;

        // Menyimpan data ke database
        $haji->save();

        // Mengalihkan pengguna ke halaman lain dengan pesan sukses
        return redirect()->route('admin.haji.index')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = Auth::user();
        $landArrangements = LandArrangement::all();
        // Temukan data berdasarkan ID
        $haji = Haji::findOrFail($id);
        $la_id = $haji->land_arrangement_id;
        $la_data = LandArrangement::findOrFail($la_id); // ambil semua data LA

        // Kembalikan view dengan data yang ditemukan
        return view('admin.haji.edit', compact('haji', 'user', 'landArrangements', 'la_data'));
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
        $haji = Haji::findOrFail($id);

        // Update nama
        $haji->name = $request->input('name');
        $haji->description = $request->input('description');
        $haji->prices = $request->input('prices');
        $haji->land_arrangement_id = $request->input('land_arrangement_id');

        // Jika ada gambar baru yang diupload
        if ($request->hasFile('images')) {
            // Hapus gambar lama jika ada
            if ($haji->images) {
                Storage::disk('public_uploads')->delete($haji->images);
            }

            // Mendapatkan file gambar yang diupload
            $file = $request->file('images');

            // Mengganti nama file dengan format yang diinginkan
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Menyimpan file gambar ke storage dengan nama baru
            $imagePath = $file->storeAs('images', $fileName, 'public_uploads');

            // Update path gambar di database
            $haji->images = $imagePath;
        }

        // Simpan perubahan ke database
        $haji->save();

        // Mengalihkan pengguna ke halaman lain dengan pesan sukses
        return redirect()->route('admin.haji.index')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Temukan data berdasarkan ID
        $haji = Haji::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($haji->image) {
            Storage::disk('public_uploads')->delete($haji->image);
        }

        // Hapus data dari database
        $haji->delete();

        // Mengalihkan pengguna ke halaman lain dengan pesan sukses
        return redirect()->route('admin.haji.index')->with('success', 'Data berhasil dihapus!');
    }
}
