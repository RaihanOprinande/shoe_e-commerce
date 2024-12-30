@extends('dashboard.layouts.main')
@section('content')

<h1>Daftar User</h1>

  @if (session('pesan'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Hei Tayo!</strong> {{session('pesan')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
<a href="/dashboard-user/create" class="btn btn-primary mb-2">Create User</a>

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>


    </tr>
    @foreach ($users as $user)
    <tr>
        <td>{{ $users->firstItem()+$loop->index }}</td>
        {{-- <td>{{ $user->id }}</td> --}}

        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>

        <td class="text-nowrap">
            <a href="/dashboard-user/{{$user->id}}" class="btn btn-success btn-sm" title="lihat detail">Detail</a>
            <a href="/dashboard-user/{{$user->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
            <form action="/dashboard-user/{{$user->id}}" method="post" class="d-inline">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger btn-sm" onclick="return confirm('yakin akan menghapus data ini?')">hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{{ $users->links() }}
@endsection


