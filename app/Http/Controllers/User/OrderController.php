<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Merchandise;

class OrderController extends Controller
{
    public function confirm(Request $request)
    {
        $home = 'checkout';

        $breadcrumbs = [['label' => 'Home', 'url' => '/'], ['label' => 'checkout', 'url' => null]];

        // Dapatkan model berdasarkan itemable_type dan itemable_id
        $itemable = app($request->itemable_type)::findOrFail($request->itemable_id);

        // Jika tipe item adalah Merchandise
        if ($itemable instanceof Merchandise) {
            if ($itemable->stock < $request->quantity) {
                return back()->with('error', 'Stok tidak mencukupi untuk jumlah yang dipesan.');
            }
        }

        return view('user.checkout.index', [
            'itemable' => $itemable,
            'quantity' => $request->quantity,
            'unit_price' => $request->unit_price,
            'total' => $request->quantity * $request->unit_price,
            'breadcrumbs' => $breadcrumbs,
            'home' => $home,
        ]);
    }

    public function confirmMultiple(Request $request)
    {
        $request->validate([
            'cart_ids' => 'required|array|min:1',
            'cart_ids.*' => 'integer|exists:carts,id',
        ]);

        $carts = Cart::whereIn('id', $request->cart_ids)
            ->where('user_id', auth()->id())
            ->get();

        if ($carts->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada item yang valid dipilih.');
        }

        $home = 'checkout';
        $breadcrumbs = [['label' => 'Home', 'url' => '/'], ['label' => 'Konfirmasi Checkout', 'url' => null]];

        return view('user.checkout.multiple', compact('carts', 'home', 'breadcrumbs'));
    }

    public function checkoutMultiple(Request $request)
    {
        $home = 'checkout';

        $breadcrumbs = [['label' => 'Home', 'url' => '/'], ['label' => 'Checkout', 'url' => null]];

        $request->validate([
            'cart_ids' => 'required|array|min:1',
            'cart_ids.*' => 'integer|exists:carts,id',
        ]);

        // Ambil cart yang dimiliki user yang sedang login
        $carts = Cart::whereIn('id', $request->cart_ids)
            ->where('user_id', auth()->id())
            ->get();

        if ($carts->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada item yang dipilih.');
        }

        $total = $carts->sum(function ($cart) {
            return $cart->unit_price * $cart->quantity;
        });

        return view('user.checkout.multiple', [
            'carts' => $carts,
            'total' => $total,
            'home' => $home,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }
}
