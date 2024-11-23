@extends('dashboard.layouts.main')

@section('content')

<h1>Edit Pengeluaran</h1>

@if (session('pesan'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Hei Tayo!</strong> {{ session('pesan') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<form action="{{ url('/dashboard-pengeluarans/' . $pengeluaran->id) }}" method="POST">
  @csrf
  @method('PUT') <!-- Method spoofing for PUT request -->

  <div class="mb-3">
    <label for="size" class="form-label">Size</label>
    <input type="text" class="form-control" id="size" name="size" value="{{ old('size', $pengeluaran->size) }}" required>
    @error('size')
      <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="brand" class="form-label">Brand</label>
    <input type="text" class="form-control" id="brand" name="brand" value="{{ old('brand', $pengeluaran->brand) }}" required>
    @error('brand')
      <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="kategori" class="form-label">Kategori</label>
    <input type="text" class="form-control" id="kategori" name="kategori" value="{{ old('kategori', $pengeluaran->kategori) }}" required>
    @error('kategori')
      <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="harga" class="form-label">Harga</label>
    <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga', $pengeluaran->harga) }}" step="0.01" required>
    @error('harga')
      <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="quantity" class="form-label">Quantity</label>
    <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $pengeluaran->quantity) }}" required>
    @error('quantity')
      <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>

  <button type="submit" class="btn btn-primary">Update Pengeluaran</button>
</form>

<a href="/dashboard-pengeluarans" class="btn btn-secondary mt-3">Back to List</a>

@endsection
