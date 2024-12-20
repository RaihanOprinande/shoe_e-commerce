@extends('dashboard.layouts.main')

@section('content')
<h1>Tambah Warna Baru</h1>

@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form action="/dashboard-color" method="POST">
    @csrf
    <div class="mb-3">
        <label for="color" class="form-label">Nama Warna</label>
        <input type="text" class="form-control @error('color') is-invalid @enderror" id="color" name="color" value="{{ old('color') }}" required>
        @error('color')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="/dashboard-color" class="btn btn-secondary">Batal</a>
</form>
@endsection
