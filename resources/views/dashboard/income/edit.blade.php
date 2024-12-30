@extends('dashboard.layouts.main')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Pemasukan</h1>
  </div>

  <div class="row">
    <div class="col-6">


<form action="/dashboard-income/{{$incomes->id}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf

    <div class="mb-3">
        <label for="nama" class="form-label">sepatu</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama',$incomes->sepatus->nama) }} "disabled>
        @error('nama')
           <div class="invalid-feedback">
            {{ $message }}
           </div>
         @enderror
      </div >

      <div class="mb-3">
        <label for="brand" class="form-label">Brand</label>
        <input type="text" class="form-control @error('brand') is-invalid @enderror" name="brand" id="brand" value="{{ old('brand',$incomes->sepatus->brands->nama_brand) }}" disabled>
        @error('brand')
           <div class="invalid-feedback">
            {{ $message }}
           </div>
         @enderror
      </div>

      <div class="mb-3">
        <label for="harga" class="form-label">harga Satuan</label>
        <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga" id="harga" value="{{ old('harga',$incomes->sepatus->harga) }}" disabled>
        @error('brand')
           <div class="invalid-feedback">
            {{ $message }}
           </div>
         @enderror
      </div>

      <div class="mb-3">
        <label for="size" class="form-label">Size</label>
        <input type="text" class="form-control @error('size') is-invalid @enderror" name="size" id="size" value="{{ old('size',$incomes->size_id) }}" disabled>
        @error('brand')
           <div class="invalid-feedback">
            {{ $message }}
           </div>
         @enderror
      </div>

      <div class="mb-3">
        <label for="quantity" class="form-label">Quantity</label>
        <input type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" id="quantity" value="{{ old('quantity',$incomes->quantity) }}"disabled >
        @error('quantity')
           <div class="invalid-feedback">
            {{ $message }}
           </div>
         @enderror
      </div>
      <div class="mb-3">
        <label for="total_harga" class="form-label">Total</label>
        <input type="text" class="form-control @error('total_harga') is-invalid @enderror" name="total_harga" id="total_harga" value="{{ old('total_harga',$incomes->total_harga) }}">
        @error('total')
           <div class="invalid-feedback">
            {{ $message }}
           </div>
         @enderror
      </div>
      <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal</label>
        <input type="text" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" id="tanggal" value="{{ old('tanggal',$incomes->tanggal) }}"disabled>
        @error('total')
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
