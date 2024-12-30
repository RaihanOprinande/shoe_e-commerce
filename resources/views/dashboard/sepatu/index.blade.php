@extends('dashboard.layouts.main')
@section('content')

<h1>Daftar Sepatu</h1>

  @if (session('pesan'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
     {{session('pesan')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
<a href="/dashboard-sepatu/create" class="btn btn-primary mb-2">Tambah Sepatu</a>

{{-- <div class="row mb-3 mt-4">
    <div class="col-md-4">
        <form class="d-flex" role="search" action="{{ url('/dshbrd-spt') }}" method="GET">
            <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-primary" type="submit">Search</button>
        </form>
    </div>
</div> --}}
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>Kategori</th>
        <th>Merek</th>
        {{-- <th>Sizes</th>
        <th>Gambar</th> --}}
        <th>Aksi</th>
    </tr>
    @foreach ($sepatus as $sepatu)
    <tr>
        <td>{{ $sepatus->firstItem()+$loop->index }}</td>
        {{-- <td>{{ $sepatu->id }}</td> --}}
        <td>{{ $sepatu->nama }}</td>
        <td>{{ $sepatu->harga }}</td>
        <td>{{ $sepatu->kategori->nama }}</td>
        <td>{{ $sepatu->brands->nama_brand }}</td>
        {{-- <td>{{ $sepatu->size->size }}</td> --}}

        {{-- <td>
            {{$sepatu->gambar->gambar_sepatu }}
        </td> --}}

        <td class="text-nowrap">
            <a href="/dashboard-sepatu/{{$sepatu->id}}" class="btn btn-success btn-sm" title="lihat detail">Detail</a>
            <a href="/dashboard-sepatu/{{$sepatu->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
            <form action="/dashboard-sepatu/{{$sepatu->id}}" method="post" class="d-inline">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger btn-sm" onclick="return confirm('yakin akan menghapus data ini?')">hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{{ $sepatus->links() }}
@endsection



