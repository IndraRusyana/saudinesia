<?php

namespace App\Http\Controllers\Admin;

use App\Models\LandArrangement;
use App\Models\LandArrangementItem;
use App\Models\Haji;
use App\Models\Umroh;
use App\Models\Hotel;
use App\Models\Transport;
use App\Models\Muttowif;
use App\Models\Visa;
use App\Models\Merchandise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LandArrangementController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $landArrangements = LandArrangement::with(['items.serviceable', 'umrohs', 'hajis'])->paginate(10);
        return view('admin.LA.index', compact('landArrangements', 'user'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('admin.LA.form', [
            'user' => $user,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'keterangan' => 'nullable|string',
            'items' => 'required|array',
            'items.*.serviceable_type' => 'nullable|string',
            'items.*.serviceable_id' => 'nullable|integer',
            'items.*.custom_name' => 'nullable|string',
            'items.*.keterangan' => 'nullable|string',
        ]);

        $la = LandArrangement::create([
            'name' => $request->name,
            'keterangan' => $request->keterangan,
        ]);

        foreach ($request->items as $item) {
            $la->items()->create([
                'serviceable_type' => $item['serviceable_type'] ?? null,
                'serviceable_id' => $item['serviceable_id'] ?? null,
                'custom_name' => $item['custom_name'] ?? null,
                'keterangan' => $item['keterangan'] ?? null,
            ]);
        }

        return redirect()->route('land-arrangements.index')->with('success', 'Land Arrangement berhasil dibuat.');
    }

    public function edit($id)
    {
        $user = Auth::user();
        $la = LandArrangement::with(['items', 'umrohs', 'hajis'])->findOrFail($id);

        return view('admin.LA.form', [
            'la' => $la,
            'user' => $user,
        ]);
    }

    public function update(Request $request, $id)
    {
        $la = LandArrangement::with('items')->findOrFail($id);

        $request->validate([
            'name' => 'required|string',
            'keterangan' => 'nullable|string',
            'umroh_ids' => 'nullable|array',
            'haji_ids' => 'nullable|array',
            'items' => 'required|array',
            'items.*.serviceable_type' => 'nullable|string',
            'items.*.serviceable_id' => 'nullable|integer',
            'items.*.custom_name' => 'nullable|string',
            'items.*.keterangan' => 'nullable|string',
        ]);

        $la->update([
            'name' => $request->name,
            'keterangan' => $request->keterangan,
        ]);

        // Set semua Haji dan Umroh sebelumnya yang pakai LA ini menjadi null
        Haji::where('land_arrangement_id', $la->id)->update(['land_arrangement_id' => null]);
        Umroh::where('land_arrangement_id', $la->id)->update(['land_arrangement_id' => null]);

        // Update relasi baru
        if ($request->haji_ids) {
            Haji::whereIn('id', $request->haji_ids)->update(['land_arrangement_id' => $la->id]);
        }
        if ($request->umroh_ids) {
            Umroh::whereIn('id', $request->umroh_ids)->update(['land_arrangement_id' => $la->id]);
        }

        // Hapus semua items lama dan buat ulang
        $la->items()->delete();
        foreach ($request->items as $item) {
            $la->items()->create([
                'serviceable_type' => $item['serviceable_type'] ?? null,
                'serviceable_id' => $item['serviceable_id'] ?? null,
                'custom_name' => $item['custom_name'] ?? null,
                'keterangan' => $item['keterangan'] ?? null,
            ]);
        }

        return redirect()->route('land-arrangements.index')->with('success', 'Land Arrangement berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $la = LandArrangement::findOrFail($id);
        $la->umrohs()->detach();
        $la->hajis()->detach();
        $la->items()->delete();
        $la->delete();

        return redirect()->route('land-arrangements.index')->with('success', 'Land Arrangement berhasil dihapus.');
    }
}
