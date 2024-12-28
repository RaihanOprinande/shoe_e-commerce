@extends('layouts.main')

@section('content')

<h1>Checkout</h1>

<Table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Size</th>
        <th>Pengambilan</th>
        <th>Harga Ongkir</th>
        <th>Harga</th>
        <th>Quantity</th>
        <th>Subtotal</th>
    </tr>
    @foreach ($transactions as $item)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->sepatus->nama }}</td>
        <td>{{ $item->sizes->size }}</td>
        <td>{{ $item->pengambilan->metode }}</td>
        <td>Rp. {{ number_format($item->pengambilan->ongkir, 0, ',','.') }}</td>
        <td>Rp. {{ number_format($item->sepatus->harga, 0, ',','.') }}</td>
        <td>{{ $item->quantity }}</td>
        <td>Rp. {{ number_format(($item->quantity * $item->sepatus->harga)+$item->pengambilan->ongkir, 0, ',' , '.' )}}</td>
    </tr>
    @endforeach
    <th>
        <td colspan="6" class="text-end"><Strong>TOTAL HARGA</Strong></td>
        <td colspan="1">Rp. {{ number_format($totalHarga, 0,',','.') }}</td>
    </th>
</Table>

<div class="transaksi text-center">
    <p><strong>Silahkan kirim Rp.{{ number_format($totalHarga, 0, ',','.') }} ke nomor rekening 5434 0100 3078 521 atas nama M Wahyu Fikri</strong></p>
</div>
<form action="/dashboard-order/store" method="POST">
@csrf

    <div class="upload-container mb-5">
        <label for="bukti_transaksi" class="form-label">Upload Bukti:</label>
        <input type="file" accept="image/*"
        class="form-control @error('bukti') is-invalid @enderror"
        id="bukti_transaksi" name="bukti_transaksi" required>
        @error('bukti_transaksi')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="buttons">
        <button type="submit" class="btn btn-success"> Submit </button>
</div>
</form>

@endsection
