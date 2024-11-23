@extends('dashboard.layouts.main')

@section('content')
<h1>Orders</h1>

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>Kategori</th>
        <th>Merek</th>
        <th>Size</th>
        <th>Jumlah</th>
        <th>Total</th>
        <th>Bukti</th>
        <th>Konfirmasi</th>
    </tr>
    @foreach ($orders as $order)
    <tr>
        <td>{{ $orders->firstItem() + $loop->index }}</td>
        <td>{{ $order->nama }}</td>
        <td>{{ number_format($order->harga, 0, ',', '.') }}</td>
        <td>{{ $order->kategori_id }}</td>
        <td>{{ $order->merek_id }}</td>
        <td>{{ $order->size_id }}</td>
        <td>{{ $order->jumlah }}</td>
        <td>{{ number_format($order->total, 0, ',', '.') }}</td>
        <td>
            @if($order->bukti)
                <img src="{{ asset('storage/' . $order->bukti) }}" alt="Bukti Pembayaran" style="width: 100px; height: auto; cursor: pointer;"
                     data-bs-toggle="modal" data-bs-target="#imageModal{{ $order->id }}">
                <!-- Modal -->
                <div class="modal fade" id="imageModal{{ $order->id }}" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="imageModalLabel">Bukti Pembayaran</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset('storage/' . $order->bukti) }}" alt="Bukti Pembayaran" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            @else
                Tidak ada bukti
            @endif
        </td>
        <td class="text-nowrap">

            <a href="/dashboard-order/{{$order->id}}/edit" class="btn btn-success">Konfirmasi</a>
            <form action="/dashboard-order/{{$order->id}}" method="post" class="d-inline">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger btn-sm" onclick="return confirm('yakin akan menghapus data ini?')">hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{{ $orders->links() }}

<!-- CSS untuk gambar dalam modal -->
<style>
    .modal-body img {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 0 auto; /* Pusatkan gambar */
    }
</style>

<script>
    // Menginisialisasi modal saat halaman dimuat
    $(document).ready(function() {
        $('.modal').on('shown.bs.modal', function () {
            console.log('Modal dibuka');
        });

        $('.modal').on('hidden.bs.modal', function () {
            console.log('Modal ditutup');
        });
    });
</script>
@endsection
