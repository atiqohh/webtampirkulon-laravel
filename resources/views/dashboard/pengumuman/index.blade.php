@extends('dashboard.layouts.main')

@section('container')

<div class="card shadow m-2">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <h4 class="text-center"><b>PENGUMUMAN</b></h4>
                @if (session()->has('success'))
                    <div class="alert alert-success col-lg-5 text-center alert-dismissible fade show mx-auto" role="alert">
                    {{ session('success') }}
                    </div>
                @endif
                
                <div class="my-3">
                    <a href="/dashboard/pengumuman/create" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i> Tambah Pengumuman Baru
                    </a>
                </div>
                <thead>
                    <tr class="text-center">
                        <th width="15px">No</th>
                        <th width="48%">Judul</th>
                        <th class="tabel-atur-tgl">Tgl Buat</th>
                        <th class="tabel-atur-tgl">Tgl Update</th>
                        <th class="tabel-atur">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengumumans as $pengumuman)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $pengumuman->judul }}</td>
                        <td>{{ $pengumuman->created_at }}</td>
                        <td>{{ $pengumuman->updated_at}}</td>
                        <td>
                            <a href="/dashboard/pengumuman/{{ $pengumuman->slug }}" class="btn btn-info"><i class="far fa-eye"></i></a>
                            <a href="/dashboard/pengumuman/{{ $pengumuman->slug }}/edit" class="btn btn-warning"><i class="far fa-edit"></i></a>
                            <form action="/dashboard/pengumuman/{{ $pengumuman->slug }}" method="post" class="d-inline">
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