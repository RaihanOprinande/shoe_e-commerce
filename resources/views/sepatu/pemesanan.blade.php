@extends('layouts.main')

@if ($errors->any())
    {{ dd($errors->all()) }}
@endif

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
        <tr>
            <td><img src="{{ asset('storage/' . $sepatu->gambar_sepatu) }}" alt="" style="height: 250px; width: 250px; object-fit: contain;"></td>
            <td>{{ $sepatu->nama }}</td>
            <td>{{ $sepatu->brands->nama_brand }}</td>
            <td>{{ $ukuran }}</td>
            <td>{{ $jumlah }}</td>
            <td>Rp. {{ number_format($sepatu->harga, 0, ',', '.') }}</td>
            <td><span id="totalHarga">Rp {{ number_format($totalHarga, 0, ',', '.') }}</span></td>
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
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->nohp }}</td>
                <td>{{ $customer->alamat }}</td>
                <td>
                    <a href="/pemesanan/update-customer/{{ $customer->id }}/edit" class="btn btn-warning btn-sm" title="Edit">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                </td>
            </tr>
        </table>
    </div>
    <div class="row">
        <div class="col">

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

        <form action="/proses-bayar" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- Data tersembunyi untuk form --}}
            <input type="hidden" name="id" value="{{ $sepatu->id }}">
            <input type="hidden" name="quantity" value="{{ $jumlah }}">
            <input type="hidden" name="size" value="{{ $ukuran }}">
            <input type="hidden" name="totalHarga" value="{{ $totalHarga }}">
            <input type="hidden" name="totalHarga" id="hiddenTotalHarga" value="{{ $totalHarga }}">
            <input type="hidden" name="pengambilan_id" id="hiddenPengambilanId">

            {{-- Tombol aksi --}}
            <div class="action-buttons">
                <button type="submit" class="btn btn-success">Konfirmasi</button>
                <a href="/sepatu/{{ $sepatu->id }}" class="btn btn-danger">Kembali</a>
            </div>
        </form>
    </div>

    <script>
        const baseTotalHarga = {{ $totalHarga }};
        const ongkir = 5000; // Example shipping cost

        function updateTotalHarga() {
            const pengambilanId = document.getElementById('pengambilan_id').value;
            let totalHarga = baseTotalHarga;

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
