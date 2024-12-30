@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <div class="title text-center mb-5 mt-4">
        <h1>Order History </h1>
    </div>
    <table class="table table-bordered">
        <thead class="table">
            <tr>
                <th>No</th>
                <th>Sepatu</th>
                <th>Tanggal</th>
            <th>Status pembelian</th>
            <th>Total Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
            <td>{{ $orders->firstItem() + $loop->index }}</td>
            <td>{{ $order->sepatus->nama }}</td>
            <td>{{ $order->tanggal }}</td>
            <td>{{ $order->status }}</td>
            <td>Rp {{ number_format($order->sepatus->harga * $order->quantity + $order->pengambilans->ongkir, 0, ',', '.') }}</td>
            <td class="text-nowrap">
                <a href="/detail-order/{{ $order->id }}" class="btn btn-primary btn-sm">Detail</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
<div class="mt-3">
    {{ $orders->links() }}
</div>
@endsection
