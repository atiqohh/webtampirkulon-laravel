@extends('dashboard.layouts.main')

@section('container')

<div class="col">
    <div class="card shadow mx-2 content-justify">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center text-uppercase">DETAIL GAMBAR</h6>
        </div>

        <div class="card-cody text-center my-2">
            <a href="/dashboard/galeri" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i>  Kembali</a>
            <a href="/dashboard/galeri/{{ $galeri->id }}/edit" class="btn btn-warning"><i class="far fa-edit"></i> Edit</a>
            <form action="/dashboard/galeri/{{ $galeri->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i class="far fa-trash-alt"></i> Hapus</button>
            </form>
        </div>

        <div class="card-img text-center">
            <div class="col-lg-10 mt-1 mx-auto">
                <img src="/img/galeri/{{ $galeri->gambar }}" class="gambar mb-4" alt="image" height="500px">
                @isset($galeri->keterangan)
                <p class="text-center">{{ $galeri->keterangan }}</p>
                @endisset
            </div>
        </div>
    </div>
</div>

@endsection