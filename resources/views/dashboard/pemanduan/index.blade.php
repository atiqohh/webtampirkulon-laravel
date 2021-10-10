@extends('dashboard.layouts.main')

@section('container')

<div class="card shadow col-lg-8">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <h4 class="text-center"><b>{{ $pemandu->nama }}</b></h4>
                @if (session()->has('success'))
                    <div class="alert alert-success col-lg-5 text-center alert-dismissible fade show mx-auto" role="alert">
                    {{ session('success') }}
                    </div>
                @endif
                
                <div class="my-3">
                    <a href="/dashboard/pemandu" class="btn btn-success">
                        <i class="fas fa-arrow-circle-left"></i>  Kembali
                    </a>
                    <a href="/dashboard/pemanduan/create/{{ $pemandu->id }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i> Tambah Pemanduan Baru
                    </a>
                </div>
                <thead>
                    <tr class="text-center">
                        <th width="15px">No</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Jumlah Orang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pemanduans as $pemanduan)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pemanduan->tanggal }}</td>
                        <td>{{ $pemanduan->waktu }}</td>
                        <td>{{ $pemanduan->jumlah}}</td>
                        <td>
                            <a href="/dashboard/pemanduan/{{ $pemanduan->id }}/edit" class="btn btn-warning"><i class="far fa-edit"></i></a>
                            <form action="/dashboard/pemanduan/{{ $pemanduan->id }}" method="post" class="d-inline">
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