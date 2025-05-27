<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\TransportRoutes;

class RouteController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $routes = TransportRoutes::paginate(8);
        return view('admin.routes.index', compact('routes', 'user'));
    }

    public function create()
    {
        $user = Auth::user();
        // Menampilkan view untuk membuat data baru
        return view('admin.routes.create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'routes' => 'required|string|max:255',
        ]);

        TransportRoutes::create([
            'routes' => $request->routes,
        ]);

        return redirect()->route('admin.routes.index')->with('success', 'Rute berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = Auth::user();
        // Temukan data berdasarkan ID
        $routes = TransportRoutes::findOrFail($id);

        // Kembalikan view dengan data yang ditemukan
        return view('admin.routes.edit', compact('routes', 'user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'routes' => 'required|string|max:255',
        ]);

        $routes = TransportRoutes::findOrFail($id);
        $routes->update([
            'routes' => $request->routes,
        ]);
        return redirect()->route('admin.routes.index')->with('success', 'Rute berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $routes = TransportRoutes::findOrFail($id);
        $routes->delete();

        return redirect()->route('admin.routes.index')->with('success', 'Rute berhasil dihapus.');
    }
}
