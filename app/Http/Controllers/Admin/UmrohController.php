<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Umroh;
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
        return view('admin.umroh', compact('query', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tambah()
    {
        $user = Auth::user();
        // Menampilkan view untuk membuat data baru
        return view('admin.umroh_tambah', compact('user'));
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
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        // Mendapatkan file gambar yang diupload
        $file = $request->file('image');

        // Mengganti nama file dengan format yang diinginkan
        $fileName = time() . '_' . $file->getClientOriginalName();

        // Menyimpan file gambar ke storage dengan nama baru
        $imagePath = $file->storeAs('images', $fileName, 'public');

        // Membuat instance baru dari model umroh
        $umroh = new Umroh();
        $umroh->name = $request->input('name');
        $umroh->description = $request->input('description');
        $umroh->price = $request->input('price');
        $umroh->image = $imagePath;

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
        // Temukan data berdasarkan ID
        $umroh = Umroh::findOrFail($id);

        // Kembalikan view dengan data yang ditemukan
        return view('admin.umroh_edit', compact('umroh', 'user'));
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
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        // Temukan data berdasarkan ID
        $umroh = Umroh::findOrFail($id);

        // Update nama
        $umroh->name = $request->input('name');
        $umroh->description = $request->input('description');
        $umroh->price = $request->input('price');


        // Jika ada gambar baru yang diupload
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($umroh->images) {
                Storage::disk('public')->delete($umroh->images);
            }

            // Mendapatkan file gambar yang diupload
            $file = $request->file('image');

            // Mengganti nama file dengan format yang diinginkan
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Menyimpan file gambar ke storage dengan nama baru
            $imagePath = $file->storeAs('images', $fileName, 'public');

            // Update path gambar di database
            $umroh->image = $imagePath;
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
            Storage::disk('public')->delete($umroh->image);
        }

        // Hapus data dari database
        $umroh->delete();

        // Mengalihkan pengguna ke halaman lain dengan pesan sukses
        return redirect()->route('admin.umroh.index')->with('success', 'Data berhasil dihapus!');
    }
}
