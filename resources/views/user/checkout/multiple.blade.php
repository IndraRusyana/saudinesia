@extends('layouts.user')

@section('title')
    Checkout | Saudinesia
@endsection

@section('layanan')
    active
@endsection

@section('content')
    <div class="container">

        <!-- breadcumb -->
        <x-user.breadcrumb :breadcrumbs="$breadcrumbs" />
        <!-- breadcumb -->

        <section>
            <div class="container contact-form-section py-5">
                <div class="form-section shadow-sm border">
                    <h3>Konfirmasi Checkout</h3>

                    <form action="{{ route('checkout.multiple') }}" method="POST">
                        @csrf

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Deskripsi</th>
                                    <th>Kuantitas</th>
                                    <th>Harga Satuan</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $grandTotal = 0; @endphp
                                @foreach ($carts as $cart)
                                    @php $grandTotal += $cart->quantity * $cart->unit_price; @endphp
                                    <tr>
                                        <td>{{ class_basename($cart->itemable_type) }} #{{ $cart->itemable_id }}</td>
                                        <td>{{ $cart->description }}</td>
                                        <td>{{ $cart->quantity }}</td>
                                        <td>Rp {{ number_format($cart->unit_price, 0, ',', '.') }}</td>
                                        <td>Rp {{ number_format($cart->quantity * $cart->unit_price, 0, ',', '.') }}</td>
                                    </tr>
                                    <input type="hidden" name="cart_ids[]" value="{{ $cart->id }}">
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4" class="text-end">Total</th>
                                    <th>Rp {{ number_format($grandTotal, 0, ',', '.') }}</th>
                                </tr>
                            </tfoot>
                        </table>

                        <button type="submit" class="btn btn-primary">Buat Invoice</button>
                        <a href="{{ route('carts.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </section>


    </div>
@endsection
