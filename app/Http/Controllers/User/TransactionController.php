<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        $home = 'pesanan';

        // Ambil transaksi milik user yang login, beserta item-nya
        $transactions = Transaction::with('items.itemable')
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        return view('user.transactions.index', compact('transactions', 'home'));
    }

}
