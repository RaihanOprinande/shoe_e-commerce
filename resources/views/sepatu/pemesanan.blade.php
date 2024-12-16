@extends('layouts.main')

@if ($errors->any())
    {{ dd($errors->all()) }}
@endif

@section('content')
    <style>
        .detail-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
        }

        p {
            margin: 10px 0;
        }

        .btn {
            margin-top: 20px;
            display: inline-block;
            padding: 10px 20px;
            background-color: #000;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn:hover {
            background-color: #333;
        }

        .upload-container {
            display: flex;
            align-items: center;
            margin-top: 20px;
        }

        .upload-container label {
            margin-right: 10px;
        }

        input[type="file"] {
            flex: 1;
        }

        .action-buttons {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>

    <div class="detail-container">
        <h1>Detail Pemesanan</h1>
        <p>Sepatu: {{ $sepatu->nama }}</p>
        <p>Harga per Unit: Rp {{ number_format($sepatu->harga, 0, ',', '.') }}</p>
        <p>Jumlah: {{ $jumlah }}</p>
        <p>Ukuran: {{ $ukuran }}</p>
        <p>Total Harga: Rp {{ number_format($totalHarga, 0, ',', '.') }}</p>

        <p>No Rekening Pemilik: <strong>5434 0100 3078 521</strong><br>
            Atas Nama: <strong>M WAHYU FIKRI</strong></p>

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

        <form action="{{ route('proses.bayar') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- Data tersembunyi untuk form --}}
            <input type="hidden" name="id" value="{{ $sepatu->id }}">
            <input type="hidden" name="nama" value="{{ $sepatu->nama }}">
            <input type="hidden" name="harga" value="{{ $sepatu->harga }}">
            <input type="hidden" name="kategori_id" value="{{ $sepatu->kategori_id }}">
            <input type="hidden" name="merek_id" value="{{ $sepatu->brands_id }}">
            <input type="hidden" name="jumlah" value="{{ $jumlah }}">
            <input type="hidden" name="ukuran" value="{{ $ukuran }}">
            <input type="hidden" name="totalHarga" value="{{ $totalHarga }}">

            {{-- Input untuk file bukti pembayaran --}}
            <div class="upload-container">
                <label for="bukti" class="form-label">Upload Bukti:</label>
                <input type="file" accept="image/*"
                       class="form-control @error('bukti') is-invalid @enderror"
                       id="bukti" name="bukti" required>
                @error('bukti')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Tombol aksi --}}
            <div class="action-buttons">
                <button type="submit" class="btn">Konfirmasi</button>
                <a href="{{ route('sepatu.detail', ['id' => $sepatu->id]) }}" class="btn">Kembali</a>
            </div>
        </form>
    </div>
@endsection
