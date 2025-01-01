@extends('dashboard.layouts.main')
@section('content')

<div class="container-fluid">
    <h1 class="mt-4 mb-3">Kategori Pengeluaran</h1>
    <a href="/dashboard-kategori-pengeluaran/create" class="btn btn-primary  mb-3">Tambah Kategori</a>
<table class="table table-bordered ">
    <thead class="table-dark">

        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>


        @foreach ($kPengeluaran as $kategori)
        <tr>
            <td>{{ $kPengeluaran->firstItem() + $loop->index }}</td>
            <td>{{ $kategori->nama }}</td>
            <td>
                <a href="/dashboard-kategori-pengeluaran/{{ $kategori->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
            <form action="/dashboard-kategori-pengeluaran/{{ $kategori->id }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
            </form>
        </td>
        @endforeach
    </tbody>
    </table>

</div>
{{ $kPengeluaran->links() }}
@endsection
