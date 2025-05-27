@extends('layouts.user')

@section('title')
    Pesanan Saya | Saudinesia
@endsection

@section('pesanan')
    active
@endsection

@section('content')
    <div class="container">
        <h2>Keranjang Saya</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($carts->isEmpty())
            <p>Keranjang Anda kosong.</p>
        @else
            <form action="{{ route('checkout.confirm.multiple') }}" method="POST">
                @csrf
                <table class="table">
                    <thead>
                        <tr>
                            <th>Pilih</th>
                            <th>Item</th>
                            <th>Deskripsi</th>
                            <th>Kuantitas</th>
                            <th>Harga Satuan</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carts as $cart)
                            <tr>
                                <td><input type="checkbox" name="cart_ids[]" value="{{ $cart->id }}"></td>
                                <td>{{ class_basename($cart->itemable_type) }} #{{ $cart->itemable_id }}</td>
                                <td>{{ $cart->description }}</td>
                                <td>{{ $cart->quantity }}</td>
                                <td>Rp {{ number_format($cart->unit_price, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($cart->total, 0, ',', '.') }}</td>
                                <td>
                                    {{-- <form action="{{ route('carts.destroy', $cart->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger"
                                            onclick="return confirm('Hapus item ini?')">Hapus</button>
                                    </form> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <button type="submit" class="btn btn-success">Checkout Item Terpilih</button>
            </form>
        @endif
    </div>
@endsection
