@extends('dashboard.layouts.main')

@section('container')

<div class="card shadow">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <h4 class="text-center"><b>ARTIKEL</b></h4>
                @if (session()->has('success'))
                    <div class="alert alert-success col-lg-5 text-center alert-dismissible fade show mx-auto" role="alert">
                    {{ session('success') }}
                    </div>
                @endif
                
                <div class="my-3">
                    <a href="/dashboard/artikel/create" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i> Tambah Artikel Baru
                    </a>
                </div>
                <thead>
                    <tr class="text-center">
                        <th width="15px">No</th>
                        <th class="">Judul</th>
                        <th class="tabel-atur-tgl">Tgl Buat</th>
                        <th class="tabel-atur-tgl">Tgl Update</th>
                        <th class="tabel-atur">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($artikels as $artikel)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td width="48%">{{ $artikel->judul }}</td>
                        <td>{{ $artikel->created_at }}</td>
                        <td>{{ $artikel->updated_at}}</td>
                        <td>
                            <a href="/dashboard/artikel/{{ $artikel->slug }}" class="btn btn-info"><i class="far fa-eye"></i></a>
                            <a href="/dashboard/artikel/{{ $artikel->slug }}/edit" class="btn btn-warning"><i class="far fa-edit"></i></a>
                            <form action="/dashboard/artikel/{{ $artikel->slug }}" method="post" class="d-inline">
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