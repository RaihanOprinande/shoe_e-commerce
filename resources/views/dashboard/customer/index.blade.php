@extends('dashboard.layouts.main')
@section('content')

<div class="container-fluid">
    <h1 class="mt-4 mb-3">Customers</h1>
    <table class="table table-bordered ">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Telephone</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
            <tr>
                <td>{{ $customers->firstItem() + $loop->index }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->nohp }}</td>
                <td>{{ $customer->alamat }}</td>
                <td>
                    <a href="/dashboard-customer/{{ $customer->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                    <form action="/dashboard-customer/{{ $customer->id }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
</div>
{{ $customers->links() }}
@endsection
