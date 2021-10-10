@extends('dashboard.layouts.main')

@section('container')

<div class="card shadow m-2 col-lg-8">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <h4 class="text-center"><b>ADMIN</b></h4>
                @if (session()->has('success'))
                    <div class="alert alert-success col-lg-8 text-center alert-dismissible fade show mx-auto" role="alert">
                    {{ session('success') }}
                    </div>
                @endif

                <div class="my-3">
                    <a href="/dashboard/admin/create" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i> Tambah Admin Baru
                    </a>
                </div>
                <thead>
                    <tr class="text-center">
                        <th width="15px">No</th>
                        <th>Nama</th>
                        <th class="tabel-atur">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $admin)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $admin->name }}</td>
                        <td class="text-center">
                            <a href="/dashboard/admin/{{ $admin->id }}" class="btn btn-info"><i class="far fa-eye"></i></a>
                            <a href="" class="btn btn-warning"><i class="far fa-edit"></i></a>
                            <form action="/dashboard/admin/{{ $admin->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection