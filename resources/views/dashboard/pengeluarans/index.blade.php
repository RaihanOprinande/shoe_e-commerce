@extends('dashboard.layouts.main')
@section('content')

<h1>Daftar Pengeluaran</h1>

@if (session('pesan'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Berhasil!</strong> {{ session('pesan') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<a href="/dashboard-pengeluarans/create" class="btn btn-primary mb-2">Tambah Pengeluaran</a>

<form method="GET" action="{{ url('/dashboard-pengeluarans') }}" class="mb-3">
    <div class="row">
        <div class="col-md-4">
            <select name="kategori_id" class="form-select">
                <option value="">Pilih Kategori</option>
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ request('kategori_id') == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <input type="date" name="date" class="form-control" value="{{ request('date') }}">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary">Filter</button>
        </div>

        <div class="col-md-2">
            {{-- <a href="{{ url('/dashboard-pengeluarans/cetak-pdf') }}" class="btn btn-success mb-2">Cetak Pdf</a> --}}
        </div>
    </div>
</form>

<table class="table table-bordered">
    <thead class="table-primary">
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Keterangan</th>
            <th>Tanggal</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pengeluarans as $pengeluaran)
        <tr>
            <td>{{ $pengeluarans->firstItem() + $loop->index }}</td>
            <td>{{ $pengeluaran->kategori->nama }}</td>
            <td>{{ $pengeluaran->keterangan }}</td>
            <td>{{ $pengeluaran->date }}</td>
            <td>Rp {{ number_format($pengeluaran->uang, 0, ',', '.') }}</td>
            <td class="text-nowrap">

                <a href="/dashboard-pengeluarans/{{ $pengeluaran->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                <form action="/dashboard-pengeluarans/{{ $pengeluaran->id }}" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan menghapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="4" class="text-start"><strong>Total Pengeluaran</strong></td>
            <td colspan="2">Rp {{ number_format($total, 0, ',', '.') }}</td>
        </tr>
    </tfoot>
</table>

<div class="mt-3">
    {{ $pengeluarans->links() }}
</div>

@endsection
