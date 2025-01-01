<!-- resources/views/dashboard/sizes/create.blade.php -->

@extends('dashboard.layouts.main')
@section('content')

<h1>Tambah Ukuran</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/dashboard-kategori-pengeluaran" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nama" class="form-label">Pilih Ukuran</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" required>
        @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Simpan Kategori</button>
    <a href="/dashboard-kategori-pengeluaran" class="btn btn-secondary">kembali</a>
</form>

@endsection
