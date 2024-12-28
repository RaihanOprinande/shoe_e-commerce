@extends('layouts.main')

@section('content')

{{-- untuk menampilkan pesan --}}
@if (session('pesan'))
<div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
   {{session('pesan')}}
</div>
@endif

{{-- untuk menampilkan jika keranjang kosong --}}
@if ($carts->count() == 0)
    <div class="cart-kosong text-center mt-5">
        <h1>Cart anda kosong silahkan belanja<h1>
    </div>
@else
    <h1 class="mb-5">Cart</h1>
    <table class="table table-bordered mb-5">
    <tr>
        <th>Gambar</th>
        <th>Produk</th>
        <th>Kategori</th>
        <th>Merek</th>
        <th>Size</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Sub harga</th>
        <th></th>
    </tr>
    @foreach ($carts as $cart)
    <tr>
        <td><img src="{{ asset('storage/' . $cart->sepatus->gambar_sepatu) }}" width="150px" height="auto" alt=""></td>
        <td>{{ $cart->sepatus->nama }}</td>
        <td>{{ $cart->sepatus->kategori->nama }}</td>
        <td>{{ $cart->sepatus->brands->nama_brand }}</td>
        <td>{{ $cart->sizes->size }}</td>
        <td>RP. {{ number_format($cart->sepatus->harga, 0, ',', '.') }}</td>
        <td>{{ $cart->quantity }}</td>
        <td> RP. {{ number_format($cart->quantity*$cart->sepatus->harga, 0, ',', '.') }}</td>
        <td class="text-nowrap">
            <form action="/cartedit/{{ $cart->id }}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger btn-sm">Cancel</button>

            </form>
        </td>
    </tr>
    @endforeach
    <tr>
        <td colspan="7" class="text-end ms-5"><strong>Total</strong></td>
        <td colspan="2"><strong>Rp. {{ number_format($totalHarga, 0, ',','.') }}</strong></td>
    </tr>
    </table>

    {{-- Menampilkan informasi customer hanya sekali --}}
    @php
        $customer = $carts->first()->customers; // Mendapatkan customer dari cart pertama
    @endphp

    <div class="mb-3">
        <table class="table table-bordered">
            <tr>
                <th>Nama</th>
                <th>No.HP</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
            <tr>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->nohp }}</td>
                <td>{{ $customer->alamat }}</td>
                <td>
                    <a href="/cart/update-customer/{{ $customer->id }}/edit" class="btn btn-warning btn-sm" title="Edit">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                </td>
            </tr>
        </table>
    </div>

    {{-- Pengambilan Barang --}}
    <form action="/checkout/store" method="POST">
    <div class="form-group">
        <label for="pengambilan_id"><strong>Pilih Pengambilan barang</strong></label>
        <select name="pengambilan_id" id="pengambilan_id" class="form-control mt-2" required>
            <option value="">-- Kiriman hanya berlaku di kota Dumai --</option>
            @foreach ($pengambilans as $pengambilan)
                <option value="{{ $pengambilan->id }}">{{ $pengambilan->metode }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="amount_field"><strong>Jumlah</strong></label>
        <input type="number" name="harga_ongkir" id="harga_ongkir" class="form-control mt-2" value="0">
    </div>

    {{-- Button Kembali dan Check Out --}}
    <div class="button-konfirmasi mt-4">
        <a href="/list" class="btn btn-dark">Kembali belanja</a>

            @csrf
            <button type="submit" class="btn btn-success">Check out</button>
        </form>
    </div>
@endif
<script>
    document.getElementById('pengambilan_id').addEventListener('change', function() {
        // Get the selected value
        var selectedValue = this.value;

        // Get the amount field
        var amountField = document.getElementById('harga_ongkir');

        // Check if the selected value is 1
        if (selectedValue == 1) {
            // Set the amount field to 5000
            amountField.value = 5000;
        } else {
            // Reset the amount field or set it to a default value
            amountField.value = 0; // or any other default value
        }
    });
</script>

@endsection
