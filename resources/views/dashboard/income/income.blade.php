@extends('dashboard.layouts.main')

@section('content')
    <h1 class="mb-4">Data Keuangan Pemasukan</h1>

    <form method="GET" action="/dashboard-income" class="mb-3">
        <div class="row">
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


    <table class="table table-bordered table-striped table-hover text-center">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Sepatu</th>
                <th>Brand</th>
                <th>Harga Satuan</th>
                <th>Ukuran</th>
                <th>quantity</th>
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
                <td>{{ $data->sepatus->nama }}</td>
                <td>{{ $data->sepatus->brands->nama_brand }}</td>
                <td>Rp {{ number_format($data->sepatus->harga, 0, ',', '.') }}</td>
                <td>{{ $data->sizes->size }}</td>
                <td>{{ $data->quantity }}</td>
                <td>{{ $data->tanggal ? $data->tanggal->format('d-m-Y') : '-' }}</td>
                <td>Rp {{ number_format($data->total_harga, 0, ',', '.') }}</td>

                @can('admin')
                <td class="text-nowrap">
                    <a href="/dashboard-income/{{$data->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
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
                <td colspan="7" class="text-start fw-bold">Total Pemasukan:</td>

                <td class="fw-bold">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>



    <div class="d-flex justify-content-center mt-3">
        {{ $incomes->links() }}
    </div>
    <form method="GET" action="/dashboard-income/cetak" class="mb-3">
        <div class="row">
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
    @endsection
