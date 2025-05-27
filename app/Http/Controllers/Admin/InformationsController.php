<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Informations;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::user();
        $query = Informations::paginate(8);
        return view('admin.informations.index', compact('query', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        // Menampilkan view untuk membuat data baru
        return view('admin.informations.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        // Mendapatkan file gambar yang diupload
        $file = $request->file('images');

        // Mengganti nama file dengan format yang diinginkan
        $fileName = time() . '_' . $file->getClientOriginalName();

        // Menyimpan file gambar ke storage dengan nama baru
        $imagePath = $file->storeAs('images', $fileName, 'public_uploads');

        Informations::create([
            'title' => $request->title,
            'content' => $request->content,
            'images' => $imagePath,
            'date' => date("Y-m-d"),
        ]);

         // Mengalihkan pengguna ke halaman lain dengan pesan sukses
         return redirect()->route('admin.informations.index')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = Auth::user();
        // Temukan data berdasarkan ID
        $informations = Informations::findOrFail($id);

        // Kembalikan view dengan data yang ditemukan
        return view('admin.informations.edit', compact('informations', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        //  Temukan data berdasarkan ID
        $informations = Informations::findOrFail($id);

        // Jika ada gambar baru yang diupload
        if ($request->hasFile('images')) {
            // Hapus gambar lama jika ada
            if ($informations->images) {
                Storage::disk('public_uploads')->delete($informations->images);
            }

            // Mendapatkan file gambar yang diupload
            $file = $request->file('images');

            // Mengganti nama file dengan format yang diinginkan
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Menyimpan file gambar ke storage dengan nama baru
            $imagePath = $file->storeAs('images', $fileName, 'public_uploads');
        }


        $informations->update([
            'title' => $request->title,
            'content' => $request->content,
            'images' => $imagePath,
            'date' => date("Y-m-d"),
        ]);

        // Kembalikan view dengan data yang ditemukan
        return redirect()->route('admin.informations.index')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Temukan data berdasarkan ID
        $informations = Informations::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($informations->image) {
            Storage::disk('public_uploads')->delete($informations->image);
        }

        // Hapus data dari database
        $informations->delete();

        // Mengalihkan pengguna ke halaman lain dengan pesan sukses
        return redirect()->route('admin.informations.index')->with('success', 'Data berhasil dihapus!');
    }
}
