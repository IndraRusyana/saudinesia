<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $transactions = Transaction::with('user')->latest()->paginate(10);
        // dd($transactions);
        return view('admin.transactions.index', compact('transactions', 'user'));
    }

    public function verify(Transaction $transaction)
    {
        if ($transaction->status !== 'sudah bayar') {
            return back()->with('error', 'Transaksi belum dibayar.');
        }

        $transaction->update(['status' => 'sudah diverifikasi']);

        return back()->with('success', 'Transaksi berhasil diverifikasi.');
    }

    public function show(Transaction $transaction)
    {
        $user = Auth::user();
        $transaction->load(['user', 'items.itemable']); // eager loading relasi

        return view('admin.transactions.show', compact('transaction', 'user'));
    }
}
