@extends('dashboard.layouts.main')
@section('content')

<h1>Daftar Pengeluaran</h1>

@if (session('pesan'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Berhasil!</strong> {{ session('pesan') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<a href="/dashboard-pengeluarans/create" class="btn btn-dark mb-4 mt-4">Tambah Pengeluaran</a>

{{-- FILTER TAMPILAN PENGELUARAN --}}
<form method="GET" action="/dashboard-pengeluarans" class="mb-3">
    <h4>Filter Tampilan</h4>
    <div class="row">
        <div class="col-md-3">
            <select name="kategori_id" class="form-select">
                <option value="">Pilih Kategori</option>
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ request('kategori_id') == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
        </div>
        <div class="col-md-3">
            <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
        </div>
        <div class="col-md-1">
            <button type="submit" class="btn btn-dark">Filter</button>
        </div>
    </div>
</form>
{{-- END FILTER PENGELUARAN TAMPILAN --}}



<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Keterangan</th>
            <th>Tanggal</th>
            <th>Harga</th>
            @can('admin')
            <th>Aksi</th>
            @endcan
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
            @can('admin')
            <td class="text-nowrap">

                <a href="/dashboard-pengeluarans/{{ $pengeluaran->id }}/edit" class="btn btn-warning">Edit</a>
                <form action="/dashboard-pengeluarans/{{ $pengeluaran->id }}" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Yakin akan menghapus data ini?')">Hapus</button>
                </form>
            </td>
            @endcan

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
{{-- FILTER CETAK --}}
<form method="GET" action="/dashboard-pengeluarans/cetak" class="mb-5 mt-5">
    <h4>Filter Cetak</h4>
    <div class="row">
        <div class="col-md-3">
            <select name="kategori_id" class="form-select">
                <option value="">Pilih Kategori</option>
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ request('kategori_id') == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
        </div>
        <div class="col-md-3">
            <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-success">Cetak PDF</button>
        </div>
    </div>
</form>
{{-- END FILTER CETAK --}}

<div class="mt-3">
    {{ $pengeluarans->links() }}
</div>

@endsection
