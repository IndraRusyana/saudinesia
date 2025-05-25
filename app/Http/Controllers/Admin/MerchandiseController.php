<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Merchandise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class MerchandiseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $query = Merchandise::paginate(8);
        return view('admin.merchandise.index', compact('query', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        // Menampilkan view untuk membuat data baru
        return view('admin.merchandise.create', compact('user'));
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
            'stock' => 'required|numeric',
        ]);

        // Mendapatkan file gambar yang diupload
        $file = $request->file('images');

        // Mengganti nama file dengan format yang diinginkan
        $fileName = time() . '_' . $file->getClientOriginalName();

        // Menyimpan file gambar ke storage dengan nama baru
        $imagePath = $file->storeAs('images', $fileName, 'public_uploads');

        // Membuat instance baru dari model merchandise
        $merchandise = new Merchandise();
        $merchandise->name = $request->input('name');
        $merchandise->description = $request->input('description');
        $merchandise->prices = $request->input('prices');
        $merchandise->images = $imagePath;
        $merchandise->stock = $request->input('stock');

        // Menyimpan data ke database
        $merchandise->save();

        // Mengalihkan pengguna ke halaman lain dengan pesan sukses
        return redirect()->route('admin.merchandise.index')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Merchandise $merchandise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = Auth::user();
        // Temukan data berdasarkan ID
        $merchandise = Merchandise::findOrFail($id);

        // Kembalikan view dengan data yang ditemukan
        return view('admin.merchandise.edit', compact('merchandise', 'user'));
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
            'stock' => 'required|numeric',
        ]);

        // Temukan data berdasarkan ID
        $merchandise = Merchandise::findOrFail($id);

        // Update nama
        $merchandise->name = $request->input('name');
        $merchandise->description = $request->input('description');
        $merchandise->prices = $request->input('prices');
        $merchandise->stock = $request->input('stock');

        // Jika ada gambar baru yang diupload
        if ($request->hasFile('images')) {
            // Hapus gambar lama jika ada
            if ($merchandise->images) {
                Storage::disk('public_uploads')->delete($merchandise->images);
            }

            // Mendapatkan file gambar yang diupload
            $file = $request->file('images');

            // Mengganti nama file dengan format yang diinginkan
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Menyimpan file gambar ke storage dengan nama baru
            $imagePath = $file->storeAs('images', $fileName, 'public_uploads');

            // Update path gambar di database
            $merchandise->images = $imagePath;
        }

        // Simpan perubahan ke database
        $merchandise->save();

        // Mengalihkan pengguna ke halaman lain dengan pesan sukses
        return redirect()->route('admin.merchandise.index')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Temukan data berdasarkan ID
        $merchandise = Merchandise::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($merchandise->image) {
            Storage::disk('public_uploads')->delete($merchandise->image);
        }

        // Hapus data dari database
        $merchandise->delete();

        // Mengalihkan pengguna ke halaman lain dengan pesan sukses
        return redirect()->route('admin.merchandise.index')->with('success', 'Data berhasil dihapus!');
    }
}
