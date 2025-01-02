@extends('layouts.main')

{{-- @if ($errors->any())
    {{ dd($errors->all()) }}
@endif --}}

@section('content')
<div class="container-fluid">
    <h1 class="text-center mt-4 mb-5">Detail Pemesanan</h1>
    <table class="table table-bordered">
        <tr>
            <td><h5>gambar</h5></td>
            <td><h5>Sepatu</h5></td>
            <td><h5>Brand</h5></td>
            <td><h5>Size</h5></td>
            <td><h5>Quantity</h5></td>
            <td><h5>Harga satuan</h5></td>
            <td><h5>Total Harga</h5></td>
        </tr>
        @foreach ($carts as $cart)

        <tr>
            <td><img src="{{ asset('storage/' . $cart->sepatus->gambar_sepatu) }}" alt="" style="height: 250px; width: 250px; object-fit: contain;"></td>
            <td>{{ $cart->sepatus->nama }}</td>
            <td>{{ $cart->sepatus->brands->nama_brand }}</td>
            <td>{{ $cart->sizes->size }}</td>
            <td>{{ $cart->quantity }}</td>
            <td>Rp. {{ number_format($cart->sepatus->harga, 0, ',', '.') }}</td>
            <td><span id="totalHarga">Rp {{ number_format($totalHarga + $cart->quantity * $cart->sepatus->harga, 0, ',', '.') }}</span></td>
        </tr>
        @endforeach
        </table>

        <h4>Customer Information</h4>
    <div class="mb-3">
        <table class="table table-bordered">
            <tr>
                <th>Nama</th>
                <th>No.HP</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
            <tr>
                <td>{{ $cart->customers->name }}</td>
                <td>{{ $cart->customers->nohp }}</td>
                <td>{{ $cart->customers->alamat }}</td>
                <td>
                    <a href="/pemesanan/update-customer/{{ $cart->customers->id }}/edit" class="btn btn-warning btn-sm" title="Edit">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                </td>
            </tr>
        </table>
    </div>
    <div class="row">
        <div class="col">
            <form action="/proses-bayar" method="POST" enctype="multipart/form-data">
            {{-- Metode pengambilan --}}
            <div class="form-group">
                <label for="pengambilan_id"><strong>Pilih Pengambilan barang</strong></label>
                <select name="pengambilan_id" id="pengambilan_id" class="form-control mt-2" required>
                    <option value="">-- Kiriman hanya berlaku di kota Dumai --</option>
                    @foreach ($pengambilans as $pengambilan)
                    <option value="{{ $pengambilan->id }}">{{ $pengambilan->metode }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col">

            {{-- Input untuk file bukti pembayaran --}}
            <div class="upload-container">
                <label for="bukti" class="form-label"><strong>Upload Bukti</strong></label>
                <input type="file" accept="image/*" class="form-control @error('bukti') is-invalid @enderror" id="bukti" name="bukti" required>
                @error('bukti')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col">
            <div class="bank-pemilik mt-4">
                <p>No Rekening Pemilik: <strong>5434 0100 3078 521</strong><br>
                    Atas Nama: <strong>M WAHYU FIKRI</strong></p>

            </div>
        </div>

    </div>
</div>
    <div class="detail-container">
        {{-- Menampilkan pesan error jika ada --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-1">

                    @csrf
                    {{-- Data tersembunyi untuk form --}}
                    <input type="hidden" name="sepatu_id" value="{{ $cart->sepatu_id }}">
                    <input type="hidden" name="size_id" value="{{ $cart->size_id }}">
                    <input type="hidden" name="quantity" value="{{ $cart->quantity }}">
                    {{-- <input type="hidden" name="pengambilan_id" value="{{ $pengambilan->id }}"> --}}


                    {{-- Tombol aksi --}}
                    <button type="submit" class="btn btn-success">Konfirmasi</button>
                </form>
                </div>
                <div class="col">
                    <form action="/clean-cart/{{ $cart->customer_id }}" method="POST">
                        @method('POST')
                        @csrf
                        <button class="btn btn-small btn-danger" type="submit">kembali</button>
                </form>
            </div>
        </div>


    </div>
    <script>
        const baseTotalHarga = {{ $totalHarga }};
        const ongkir = 5000; // Example shipping cost
        const carts = @json($carts); // Pass the cart items to JavaScript

        function updateTotalHarga() {
            const pengambilanId = document.getElementById('pengambilan_id').value;
            let totalHarga = 0;

            carts.forEach(cart => {
                totalHarga += cart.quantity * cart.sepatus.harga;
            });

            if (pengambilanId == 1) {
                totalHarga += ongkir;
            }

            document.getElementById('totalHarga').innerText = totalHarga.toLocaleString('id-ID');
            document.getElementById('hiddenTotalHarga').value = totalHarga;
            document.getElementById('hiddenPengambilanId').value = pengambilanId;
        }

        document.getElementById('pengambilan_id').addEventListener('change', updateTotalHarga);
    </script>
@endsection
