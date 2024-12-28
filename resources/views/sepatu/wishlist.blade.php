@extends('layouts.main')

@section('content')
<h1 class="text-center mb-5 mt-4">Wishlist</h1>
@foreach ($wishlists as $wishlist)

<a href="/sepatu/{{ $wishlist->sepatus->id }}" class="text-decoration-none text-dark">

    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-2">
                    <img src="{{ asset('storage/' . $wishlist->sepatus->gambar_sepatu) }}" alt="gambar tidak tersedia" style="height: 250px; width: 250px; object-fit: contain;">
                </div>
                <div class="col-lg-9">
                    <h4>{{ $wishlist->sepatus->nama }}</h4>
                    <p>{{ $wishlist->sepatus->brands->nama_brand }}</p>
                    <p>Rp. {{ number_format($wishlist->sepatus->harga, 0, ',', '.') }}</p>
                    <form action="/wishlist/{{ $wishlist->id }}" method="POST" class="mt-5">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-small btn-danger" type="submit">Remove</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</a>
@endforeach
@endsection
