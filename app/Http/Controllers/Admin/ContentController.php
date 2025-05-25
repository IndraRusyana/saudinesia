<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimoni;
use App\Models\Galeri;
use App\Models\Hero;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ContentController extends Controller
{
    // === TESTIMONI ===
    public function index()
    {
        $testimonis = Testimoni::all();
        $galeris = Galeri::all();
        $hero = Hero::first();
        $user = Auth::user();
        return view('admin.content.index', compact('testimonis', 'galeris', 'hero', 'user'));
    }

    public function updateTestimoni(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'foto' => 'nullable|image',
            'deskripsi' => 'required',
        ]);

        $testimoni = Testimoni::findOrFail($id);

        $testimoni->nama = $request->input('nama');
        $testimoni->deskripsi = $request->input('deskripsi');

        if ($request->hasFile('foto')) {
            if ($testimoni->foto) {
                Storage::disk('public_uploads')->delete($testimoni->foto);
            }
            // Mendapatkan file gambar yang diupload
            $file = $request->file('foto');

            // Mengganti nama file dengan format yang diinginkan
            $fileName = time() . '_' . $file->getClientOriginalName();

            // dd($fileName);

            // Menyimpan file gambar ke storage dengan nama baru
            $imagePath = $file->storeAs('testimoni', $fileName, 'public_uploads');

            // Update path gambar di database
            $testimoni->foto = $imagePath;
        }

        $testimoni->save();
        return back()->with('success', 'Testimoni updated successfully.');
    }

    public function createGaleri()
    {
        // Ambil semua kategori unik dari galeri yang sudah ada (hasil dari seeder)\
        $user = Auth::user();
        $kategoris = Galeri::select('kategori')->distinct()->pluck('kategori');

        return view('admin.content.galeri-create', compact('kategoris', 'user'));
    }

    public function storeGaleri(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'gambar' => 'required|image',
            'deskripsi' => 'nullable',
            'kategori' => 'nullable|string',
        ]);

        $galeri = new Galeri();
        $galeri->nama = $request->input('nama');
        $galeri->deskripsi = $request->input('deskripsi');
        $galeri->kategori = $request->input('kategori');

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $imagePath = $file->storeAs('galeri', $fileName, 'public_uploads');
            $galeri->gambar = $imagePath;
        }

        $galeri->save();
        return redirect()->route('admin.content.index')->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function editGaleri($id)
    {
        $galeri = Galeri::findOrFail($id);
        $kategoris = Galeri::select('kategori')->distinct()->pluck('kategori');
        $user = Auth::user();

        return view('admin.content.galeri-edit', compact('galeri', 'kategoris','user'));
    }

    public function updateGaleri(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'gambar' => 'nullable|image',
            'deskripsi' => 'nullable',
            'kategori' => 'nullable|string',
        ]);

        $galeri = Galeri::findOrFail($id);

        $galeri->nama = $request->input('nama');
        $galeri->deskripsi = $request->input('deskripsi');
        $galeri->kategori = $request->input('kategori');

        if ($request->hasFile('gambar')) {
            if ($galeri->gambar) {
                Storage::disk('public_uploads')->delete($galeri->gambar);
            }
            // Mendapatkan file gambar yang diupload
            $file = $request->file('gambar');

            // Mengganti nama file dengan format yang diinginkan
            $fileName = time() . '_' . $file->getClientOriginalName();

            // dd($fileName);

            // Menyimpan file gambar ke storage dengan nama baru
            $imagePath = $file->storeAs('galeri', $fileName, 'public_uploads');

            // Update path gambar di database
            $galeri->gambar = $imagePath;
        }

        $galeri->save();
        return redirect()->route('admin.content.index')->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function deleteGaleri($id)
    {
        $galeri = Galeri::findOrFail($id);
        if ($galeri->gambar) {
            Storage::disk('public_uploads')->delete($galeri->gambar);
        }
        $galeri->delete();
        return back()->with('success', 'Galeri berhasil dihapus.');
    }

    public function updateHero(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image',
        ]);

        $hero = Hero::first();

        $hero->title = $request->input('title');
        $hero->description = $request->input('description');

        if ($request->hasFile('image')) {
            if ($hero && $hero->image) {
                Storage::disk('public_uploads')->delete($hero->image);
            }

            // Mendapatkan file gambar yang diupload
            $file = $request->file('image');

            // Mengganti nama file dengan format yang diinginkan
            $fileName = time() . '_' . $file->getClientOriginalName();

            // dd($fileName);

            // Menyimpan file gambar ke storage dengan nama baru
            $imagePath = $file->storeAs('hero', $fileName, 'public_uploads');

            // Update path gambar di database
            $hero->image = $imagePath;
        }

        $hero->save();

        return back()->with('success', 'Hero section updated successfully.');
    }
}
