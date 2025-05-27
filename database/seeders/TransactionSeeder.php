<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Hotel;
use App\Models\Transport;
use App\Models\Transaction;
use App\Models\TransactionItem;
use App\Models\User;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::limit(5)->get(); // Ambil 5 user pertama
        $hotel = Hotel::first();
        $transport = Transport::first();

        $statuses = ['belum bayar', 'sudah bayar', 'sudah diverifikasi', 'batal'];

        foreach ($users as $userIndex => $user) {
            foreach ($statuses as $statusIndex => $status) {

                // Simulasi cart item 1: Hotel
                $cart1 = Cart::create([
                    'user_id' => $user->id,
                    'itemable_type' => Hotel::class,
                    'itemable_id' => $hotel->id,
                    'description' => "Hotel Mekkah untuk user {$user->id}",
                    'quantity' => 1,
                    'unit_price' => 15000000,
                ]);

                // Simulasi cart item 2: Transport
                $cart2 = Cart::create([
                    'user_id' => $user->id,
                    'itemable_type' => Transport::class,
                    'itemable_id' => $transport->id,
                    'description' => "Transport user {$user->id}",
                    'quantity' => 1,
                    'unit_price' => 5000000,
                ]);

                $total = $cart1->unit_price + $cart2->unit_price;

                // Buat transaksi
                $transaction = Transaction::create([
                    'user_id' => $user->id,
                    'invoice_number' => 'INV-' . now()->format('YmdHis') . "-U{$user->id}-S{$statusIndex}",
                    'status' => $status,
                    'total_amount' => $total,
                ]);

                // Simpan item ke transaksi
                foreach ([$cart1, $cart2] as $cartItem) {
                    TransactionItem::create([
                        'transaction_id' => $transaction->id,
                        'itemable_type' => $cartItem->itemable_type,
                        'itemable_id' => $cartItem->itemable_id,
                        'description' => $cartItem->description,
                        'quantity' => $cartItem->quantity,
                        'unit_price' => $cartItem->unit_price,
                        'total_price' => $cartItem->quantity * $cartItem->unit_price,
                    ]);
                }

                // Kosongkan keranjang user
                Cart::where('user_id', $user->id)->delete();
            }
        }
    }
}


