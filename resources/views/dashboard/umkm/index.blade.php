@extends('dashboard.layouts.main')

@section('container')

<div class="card shadow m-2 col-lg-10">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <h4 class="text-center"><b>UMKM</b></h4>
                @if (session()->has('success'))
                    <div class="alert alert-success col-lg-8 text-center alert-dismissible fade show mx-auto" role="alert">
                    {{ session('success') }}
                    </div>
                @endif
                
                <div class="my-3">
                    <a href="/dashboard/umkm/create" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i> Tambah UMKM Baru
                    </a>
                </div>
                <thead>
                    <tr class="text-center">
                        <th width="15px">No</th>
                        <th width="30%">Nama</th>
                        <th>Pemilik</th>
                        <th>Kontak</th>
                        <th class="tabel-atur">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($umkms as $umkm)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $umkm->nama }}</td>
                        <td>{{ $umkm->pemilik }}</td>
                        <td>{{ $umkm->kontak }}</td>
                        <td class="text-center">
                            <a href="/dashboard/umkm/{{ $umkm->slug }}" class="btn btn-info"><i class="far fa-eye"></i></a>
                            <a href="/dashboard/umkm/{{ $umkm->slug }}/edit" class="btn btn-warning"><i class="far fa-edit"></i></a>
                            <form action="/dashboard/umkm/{{ $umkm->slug }}" method="post" class="d-inline">
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