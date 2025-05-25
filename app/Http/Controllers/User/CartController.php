<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Merchandise;

class CartController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $home = 'cart';

        $breadcrumbs = [['label' => 'Home', 'url' => '/'], ['label' => 'Pesanan', 'url' => null]];

        $carts = Cart::where('user_id', auth()->id())->get();

        return view('user.cart.index', compact('carts', 'home', 'breadcrumbs'));
    }

    public function store(Request $request)
    {
        // dd(Auth::id(), $request->all());
        $request->validate([
            'itemable_type' => 'required|string',
            'itemable_id' => 'required|integer',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:1',
            'unit_price' => 'required|numeric|min:0',
        ]);

        // Resolve full class name if short
        $itemableClass = $request->itemable_type;

        // Ambil instance dari itemable
        $itemable = $itemableClass::findOrFail($request->itemable_id);

        if ($itemable instanceof Merchandise) {
            if ($itemable->stock < $request->quantity) {
                return back()->with('error', 'Stok tidak mencukupi untuk jumlah yang dipesan.');
            }
        }

        // Default deskripsi dari itemable (misalnya: nama layanan, hotel, dll)
        $defaultDescription = $itemable->name ?? ($itemable->title ?? class_basename($itemableClass) . ' #' . $itemable->id);

        Cart::create([
            'user_id' => Auth::id(),
            'itemable_type' => $request->itemable_type,
            'itemable_id' => $request->itemable_id,
            'description' => $defaultDescription,
            'quantity' => $request->quantity,
            'unit_price' => $request->unit_price,
        ]);

        return redirect()->back()->with('success', 'Item ditambahkan ke keranjang.');
    }

    public function update(Request $request, Cart $cart)
    {
        $this->authorize('update', $cart); // pastikan user hanya bisa update miliknya

        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart->update([
            'quantity' => $request->quantity,
        ]);

        return redirect()->back()->with('success', 'Jumlah item diperbarui.');
    }

    public function destroy(Cart $cart)
    {
        $this->authorize('delete', $cart);

        $cart->delete();

        return redirect()->back()->with('success', 'Item dihapus dari keranjang.');
    }
}
