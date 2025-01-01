@extends('dashboard.layouts.main')
@section('content')

<div class="container-fluid">
<!-- resources/views/dashboard/sizes/create.blade.php -->


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

<form action="/dashboard-kategori-pengeluaran/{{ $customers->id }}" method="POST">
    @method('PUT')
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name',$customers->name) }}" required>
        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">email</label>
        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email',$customers->email) }}" required>
        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="alamat" class="form-label">alamat</label>
        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat',$customers->alamat) }}" required>
        @error('alamat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="nohp" class="form-label">Nohp</label>
        <input type="text" class="form-control @error('nohp') is-invalid @enderror" id="nohp" name="nohp" value="{{ old('nohp',$customers->nohp) }}" required>
        @error('nohp')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password',$customers->password) }}" required>
        @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Simpan Kategori</button>
    <a href="/dashboard-customer" class="btn btn-secondary">kembali</a>
</form>


</div>
@endsection
