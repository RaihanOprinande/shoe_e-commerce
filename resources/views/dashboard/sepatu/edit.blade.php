@extends('dashboard.layouts.main')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data Sepatu</h1>
  </div>

  <div class="row">
    <div class="col-6">


<form action="/dashboard-sepatu/{{$sepatus->id}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="mb-3">
        <label for="kode_sepatu" class="form-label">Kode Sepatu</label>
        <input type="text" class="form-control @error('kode_sepatu') is-invalid @enderror" name="kode_sepatu" id="kode_sepatu" value="{{ old('kode_sepatu',$sepatus->kode_sepatu) }}">
        @error('kode_sepatu')
           <div class="invalid-feedback">
            {{ $message }}
           </div>
         @enderror
      </div>
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Sepatu</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama',$sepatus->nama) }}">
        @error('nama')
           <div class="invalid-feedback">
            {{ $message }}
           </div>
         @enderror
      </div>

      <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga" id="harga" value="{{ old('harga',$sepatus->harga) }}">
        @error('harga')
           <div class="invalid-feedback">
            {{ $message }}
           </div>
         @enderror

      </div>

      <div class="mb-3">
        <label class="form-label">Kategori</label>
        <select name="kategori_id" class="form-select @error('kategori_id') is-invalid

        @enderror" >
            <option value="">Pilih Kategori</option>
            @foreach ($kategoris as $kategori)
            @if (old('kategori_id',$sepatus->kategori_id) == $kategori->id)
            <option value="{{ $kategori->id}}" selected>{{ $kategori->nama}}</option>
            @else
            <option value="{{ $kategori->id}}">{{ $kategori->nama}}</option>
            @endif

            @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Merek</label>
        <select name="brands_id" class="form-select @error('brands') is-invalid

        @enderror" >
            <option value="">Pilih Merek</option>
            @foreach ($mereks as $merek)
            @if (old('brands_id',$sepatus->brands_id) == $merek->id)
            <option value="{{ $merek->id}}" selected>{{ $merek->nama_brand}}</option>
            @else
            <option value="{{ $merek->id}}">{{ $merek->nama_brand}}</option>
            @endif

            @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="gambar_sepatu" class="form-label">Gambar</label>

        <!-- Menampilkan nama file lama -->
        @if ($sepatus->gambar_sepatu)
            <div class="mb-2">
                <img src="{{ asset('storage/' . $sepatus->gambar_sepatu) }}"
     class="card-img-top"
     alt="{{ $sepatus->gambar_sepatu }}"
     style="width: 300px; height: auto; object-fit: cover;">
            </div>
        @endif

        <!-- Input file untuk mengganti gambar -->
        <input type="file"
               class="form-control @error('gambar_sepatu') is-invalid @enderror"
               name="gambar_sepatu"
               id="gambar_sepatu">
        @error('gambar_sepatu')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>



      <div class="mb-3">

        <input type="submit" class="btn btn-primary" name="submit">
      </div>
</form>
</div>
</div>
@endsection
