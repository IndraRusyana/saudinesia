<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function store(Request $request)
    {
        $itemable = app($request->itemable_type)::findOrFail($request->itemable_id);

        $total = $request->quantity * $request->unit_price;

        $transaction = Transaction::create([
            'user_id' => auth()->id(),
            'invoice_number' => 'INV-' . now()->format('YmdHis') . rand(100, 999),
            'status' => 'belum bayar',
            'total_amount' => $total,
        ]);

        TransactionItem::create([
            'transaction_id' => $transaction->id,
            'itemable_type' => get_class($itemable),
            'itemable_id' => $itemable->id,
            'description' => $itemable->name ?? $itemable->title,
            'quantity' => $request->quantity,
            'unit_price' => $request->unit_price,
            'total_price' => $total,
        ]);

        return redirect()->route('invoice.show', $transaction->id);
    }

    public function show(Transaction $transaction)
    {
        $home = 'checkout';

        $breadcrumbs = [['label' => 'Home', 'url' => '/'], ['label' => 'checkout', 'url' => null]];
        // Cek apakah transaksi milik user yang sedang login
        if ($transaction->user_id !== auth()->id()) {
            abort(403, 'Akses ditolak');
        }

        return view('user.invoice.show', compact('transaction', 'home', 'breadcrumbs'));
    }

    // app/Http/Controllers/User/InvoiceController.php

    public function uploadForm(Transaction $transaction)
    {
        $home = 'checkout';

        $breadcrumbs = [['label' => 'Home', 'url' => '/'], ['label' => 'checkout', 'url' => null]];

        if ($transaction->user_id !== auth()->id()) {
            abort(403);
        }

        return view('user.invoice.upload', compact('transaction', 'home', 'breadcrumbs'));
    }

    public function upload(Request $request, Transaction $transaction)
    {
        if ($transaction->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'payment_proof' => 'required|image|max:2048', // atau bisa file/pdf tergantung kebijakan
        ]);

        $path = $request->file('payment_proof')->store('payment_proofs', 'public_uploads');

        $transaction->update([
            'payment_proof' => $path,
            'status' => 'sudah bayar', // ubah status ke "paid"
        ]);

        return redirect()->route('pesanan.index')->with('success', 'Bukti pembayaran berhasil diunggah.');
    }

    public function generateMultiple(Request $request)
    {
        $request->validate([
            'cart_ids' => 'required|array|min:1',
            'cart_ids.*' => 'integer|exists:carts,id',
        ]);

        // Ambil semua item keranjang yang dipilih milik user saat ini
        $carts = Cart::whereIn('id', $request->cart_ids)
            ->where('user_id', auth()->id())
            ->get();

        if ($carts->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada item keranjang yang valid dipilih.');
        }

        $total = $carts->sum(function ($cart) {
            return $cart->quantity * $cart->unit_price;
        });

        $transaction = Transaction::create([
            'user_id' => auth()->id(),
            'invoice_number' => 'INV-' . now()->format('YmdHis') . rand(100, 999),
            'status' => 'belum bayar',
            'total_amount' => $total,
        ]);

        foreach ($carts as $cart) {
            TransactionItem::create([
                'transaction_id' => $transaction->id,
                'itemable_type' => $cart->itemable_type,
                'itemable_id' => $cart->itemable_id,
                'description' => $cart->description,
                'quantity' => $cart->quantity,
                'unit_price' => $cart->unit_price,
                'total_price' => $cart->quantity * $cart->unit_price,
            ]);
        }

        // Hapus item dari keranjang setelah diproses
        Cart::whereIn('id', $request->cart_ids)->delete();

        return redirect()->route('invoice.show', $transaction->id)->with('success', 'Invoice berhasil dibuat.');
    }
}
