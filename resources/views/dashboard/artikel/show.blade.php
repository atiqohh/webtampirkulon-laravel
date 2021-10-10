@extends('dashboard.layouts.main')

@section('container')

<div class="row">
    <div class="card shadow mx-2 content-justify">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center text-uppercase">{{ $artikel->judul }}</h6>
        </div>

        <div class="card-cody text-center my-2">
            <a href="/dashboard/artikel" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i>  Kembali</a>
            <a href="/dashboard/artikel/{{ $artikel->slug }}/edit" class="btn btn-warning"><i class="far fa-edit"></i> Edit</a>
            <form action="/dashboard/artikel/{{ $artikel->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i class="far fa-trash-alt"></i> Hapus</button>
            </form>
        </div>
        
        @isset($artikel->gambar)
        <div class="card-img text-center">
            <div class="col-lg-10 mt-1 mx-auto">
                <img src="/img/artikel/{{ $artikel->gambar }}" class="gambar" alt="image" height="300px">
            </div>
        </div>
        @endisset

        <div class="card-body">
            <p>{!! $artikel->body !!}</p>
        </div>
    </div>
</div>

@endsection