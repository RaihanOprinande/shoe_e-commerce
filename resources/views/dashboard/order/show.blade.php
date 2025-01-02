@extends('dashboard.layouts.main')

@section('content')

<div class="container-fluid">
    <div class="title">
        <h1 class="text-center mt-4 mb-5">Detail Order</h1>
    </div>
    <table class="table table-bordered">
        <thead class="table">
            <tr>
                <th>Gambar</th>
                <th>Sepatu</th>
                <th>Size</th>
                <th>Quantity</th>
                <th>Tanggal</th>
                <th>Tipe Pengambilan</th>
                <th>Status pembelian</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><img src="{{ asset('storage/' . $orders->sepatus->gambar_sepatu) }}" alt="" style="height: 250px; width: 250px; object-fit: contain;"></td>
                <td>{{ $orders->sepatus->nama }}</td>
                <td>{{ $orders->sizes->size }}</td>
                <td>{{ $orders->quantity }}</td>
                <td>{{ $orders->tanggal }}</td>
                <td>{{ $orders->pengambilans->metode }}</td>
                <td>{{ $orders->status }}</td>
                <td>Rp {{ number_format($orders->sepatus->harga * $orders->quantity + $orders->pengambilans->ongkir, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <div class="customer-info mt-5">
        <div class="row">
            <div class="col-2">
                <div class="name">
                    <p><strong>Nama</strong> : {{ $orders->customers->name }}</p>
                </div>
                <div class="telepon">
                    <p><strong>Telephone</strong> : {{ $orders->customers->nohp }}</p>
                </div>
                <div class="telepon">
                    <p><strong>Alamat</strong> : {{ $orders->customers->alamat }}</p>
                </div>
            </div>
            <div class="col">
                <p><strong>Bukti Pembayaran</strong></p>
                <img src="{{ asset('storage/' . $orders->bukti_transaksi) }}" alt="Bukti Pembayaran" style=" height: auto;">
            </div>
            {{-- <div class="col">
                <div class="form-group">
                    <label for="status">Select Status:</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="">-- Status --</option>
                            <option value="diproses">Diproses</option>
                            <option value="dikirim">Dikirim</option>
                            <option value="pending">Sukses</option>

                    </select>
                </div>
            </div>
            <div class="col">
                <form action=" /update-status/{{ $orders->id }}" method="POST" class="d-inline">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Konfirmasi pesanan ini?')">Konfirmasi</button>
                </form>
            </div> --}}
        </div>

    </div>

</div>
<div class="mt-3">
    {{-- {{ $orders->links() }} --}}
</div>
@endsection
