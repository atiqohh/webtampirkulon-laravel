@extends('dashboard.layouts.main')

@section('container')

<div class="card shadow m-2">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <h4 class="text-center"><b>RESERVASI</b></h4>
                @if (session()->has('success'))
                    <div class="alert alert-success col-lg-5 text-center alert-dismissible fade show mx-auto" role="alert">
                    {{ session('success') }}
                    </div>
                @endif
                
                <div class="my-3">
                    <a href="/dashboard/reservasi/create" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i> Tambah Reservasi Baru
                    </a>
                </div>
                <thead>
                    <tr class="text-center">
                        <th width="15px">No</th>
                        <th width="30%">Nama</th>
                        <th>Paket</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservasis as $reservasi)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $reservasi->nama }}</td>
                        <td class="text-center">{{ $reservasi->paket->nama }}</td>
                        <td class="text-center">{{ $reservasi->tanggal }}</td>
                        <td class="text-center">{{ $reservasi->jumlah }}</td>
                        <td class="text-center">{{ $reservasi->status }}</td>
                        <td>
                            <a href="/dashboard/reservasi/{{ $reservasi->id }}" class="btn btn-info"><i class="far fa-eye"></i></a>
                            <a href="/dashboard/reservasi/{{ $reservasi->id }}/edit" class="btn btn-warning"><i class="far fa-edit"></i></a>
                            <form action="/dashboard/reservasi/{{ $reservasi->id }}" method="post" class="d-inline">
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