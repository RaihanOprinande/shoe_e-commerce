@extends('layouts.main')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Customer</h1>
  </div>

  <div class="row">
    <div class="col-6">


<form action="/pemesanan/update-customer/{{$customers->id }}" method="POST">
    @method('PUT')
    @csrf

      <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name',$customers->name) }}"disabled>
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="nohp" class="form-label">No Hp</label>
        <input type="text" class="form-control @error('nohp') is-invalid @enderror" name="nohp" id="nohp" value="{{ old('nohp',$customers->nohp) }}"disabled>
        @error('nohp')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="textarea" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" value="{{ old('alamat',$customers->alamat) }}">
        @error('alamat')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
      </div>

      <div class="mb-3">
        <input type="hidden" name="quantity" id="form_quantity" value="1">
        <input type="hidden" name="sepatu_id" value="{{ $sepatu->id }}">
        {{-- <input type="hidden" name="brand" value="{{ $sepatu->brands->nama_brand }}"> --}}
        <input type="hidden" name="size" id="form_size">
        <input type="date" name="tanggal" id="tanggal" value="date()" hidden>
        <input type="hidden" class="form-control @error('date') is-invalid @enderror" name="tanggal" id="date" value="{{ old('date') }}">

        
        <button type="submit" class="btn btn-primary" name="submit"> Submit </button>
      </div>
</form>
</div>
</div>
@endsection



