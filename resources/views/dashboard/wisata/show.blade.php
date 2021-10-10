@extends('dashboard.layouts.main')

@section('container')

<div class="col">
    <div class="card shadow mx-2 content-justify">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center text-uppercase">{{ $wisata->nama }}</h6>
        </div>

        <div class="card-cody text-center my-2">
            <a href="/dashboard/wisata" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i>  Kembali</a>
            <a href="/dashboard/wisata/{{ $wisata->slug }}/edit" class="btn btn-warning"><i class="far fa-edit"></i> Edit</a>
            <form action="/dashboard/wisata/{{ $wisata->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i class="far fa-trash-alt"></i> Hapus</button>
            </form>
        </div>
        
        @isset($wisata->gambar)
        <div class="card-img text-center">
            <div class="col-lg-7 mt-1 mx-auto">
                <img src="/img/wisata/{{ $wisata->gambar }}" class="gambar" alt="image" height="300">
            </div>
        </div>
        @endisset

        <div class="card-body">
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-row ml-2" style="width: 26%">
                                <b>Harga Tiket </b>
                            </div>
                            <div class="col-row" style="width: 2%">
                                <b>: </b>
                            </div>
                            <div class="col" style="width: 72%">
                                {{ $wisata->harga_tiket }}
                            </div>
                        </div>
                    </li>

                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-row ml-2" style="width: 26%">
                                <b>Operasi </b>
                            </div>
                            <div class="col-row" style="width: 2%">
                                <b>: </b>
                            </div>
                            <div class="col" style="width: 72%">
                                {{ $wisata->operasi }}
                            </div>
                        </div>
                    </li>

                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-row ml-2" style="width: 26%">
                                <b>Lokasi </b>
                            </div>
                            <div class="col-row" style="width: 2%">
                                <b>: </b>
                            </div>
                            <div class="col" style="width: 72%">
                                {{ $wisata->lokasi }}
                            </div>
                        </div>
                    </li>

                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-row ml-2" style="width: 26%">
                                <b>Deskripsi</b>
                            </div>
                            <div class="col-row" style="width: 2%">
                                <b>: </b>
                            </div>
                            <div class="col" style="width: 72%">
                                {!! $wisata->deskripsi !!}
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection