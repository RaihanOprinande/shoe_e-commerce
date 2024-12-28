@extends('dashboard.layouts.main')

@section('content')
    <h1 class="mb-4">Data Keuangan Pemasukan</h1>

    <form method="GET" action="{{ url('/dashboard-income') }}" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <input type="date" name="tanggal" class="form-control" value="{{ request('tanggal') }}">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </div>
    </form>


    <table class="table table-bordered table-striped table-hover text-center">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Sepatu</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Merek</th>
                <th>Ukuran</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
                <th>Total Harga</th>
                @can('admin')

                <th>Aksi</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach ($incomes as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->nama }}</td>
                <td>Rp {{ number_format($data->harga, 0, ',', '.') }}</td>
                <td>{{ $data->kategori->nama }}</td>
                <td>{{ $data->merek->nama_brand }}</td>
                <td>{{ $data->size->size }}</td>
                <td>{{ $data->jumlah }}</td>
                <td>{{ $data->tanggal ? $data->tanggal->format('d-m-Y') : '-' }}</td>
                <td>Rp {{ number_format($data->total, 0, ',', '.') }}</td>

                @can('admin')
                <td class="text-nowrap">
                    <a href="/dashboard-income/{{$data->id}}/edit" class="btn btn-warning">Edit</a>
                    <form action="/dashboard-income/{{$data->id}}" method="post" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm" onclick="return confirm('yakin akan menghapus data ini?')">hapus</button>
                    </form>
                </td>

                @endcan
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="table-secondary">
                <td colspan="8" class="text-start fw-bold">Total Pemasukan:</td>

                <td class="fw-bold">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>

    {{-- <a href="{{ url('/dashboard-income/cetak-pdf') }}" class="btn btn-success mb-2">Cetak Pdf</a> --}}

    <div class="d-flex justify-content-center mt-3">
        {{ $incomes->links() }}
    </div>
    @endsection
