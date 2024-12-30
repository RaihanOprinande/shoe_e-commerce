@extends('dashboard.layouts.main')
@section('content')
<h1>Daftar Merek</h1>

@if (session('pesan'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session('pesan') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<a href="{{ route('dashboard-brand.create') }}" class="btn btn-primary mb-2">Tambah Brand</a>

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Nama Merek</th>
        <th>Gambar</th>
        <th>Aksi</th>
    </tr>
    @foreach ($brands as $brand)
    <tr>
        <td>{{ $brands->firstItem() + $loop->index }}</td>
        <td>{{ $brand->nama_brand }}</td>
        <td>
            @if ($brand->gambar)
            <img src="{{ asset('images/'. $brand->gambar) }}" alt="{{ $brand->nama_brand }}" style="width: 100px; height: auto;">
            @else
            <span>Tidak ada gambar</span>
            @endif
        </td>
        <td class="text-nowrap">
            <a href="{{ route('dashboard-brand.show', $brand->id) }}" class="btn btn-success btn-sm" title="lihat detail">Detail</a>
            <a href="{{ route('dashboard-brand.edit', $brand->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('dashboard-brand.destroy', $brand->id) }}" method="post" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan menghapus data ini?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{{ $brands->links() }}
@endsection
