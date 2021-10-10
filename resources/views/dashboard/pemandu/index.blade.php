@extends('dashboard.layouts.main')

@section('container')

<div class="card shadow m-2  col-lg-8">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <h4 class="text-center"><b>PEMANDU WISATA</b></h4>
                @if (session()->has('success'))
                    <div class="alert alert-success col-lg-8 text-center alert-dismissible fade show mx-auto" role="alert">
                    {{ session('success') }}
                    </div>
                @endif
                
                <div class="my-3">
                    <a href="/dashboard/pemandu/create" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i> Tambah Pemandu Wisata Baru
                    </a>
                </div>
                <thead>
                    <tr class="text-center">
                        <th width="15px">No</th>
                        <th class="">Nama</th>
                        <th class="tabel-atur">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pemandus as $pemandu)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td width="50%">{{ $pemandu->nama }}</td>
                        <td class="text-center">
                            <a href="/dashboard/pemanduan/create/{{ $pemandu->id }}" class="btn btn-success"><i class="fas fa-plus"></i></a>
                            <a href="/dashboard/pemandu/{{ $pemandu->id }}" class="btn btn-info"><i class="far fa-eye"></i></a>
                            <a href="/dashboard/pemandu/{{ $pemandu->id }}/edit" class="btn btn-warning"><i class="far fa-edit"></i></a>
                            <form action="/dashboard/pemandu/{{ $pemandu->id }}" method="post" class="d-inline">
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