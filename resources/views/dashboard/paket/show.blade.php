@extends('dashboard.layouts.main')

@section('container')

<div class="col">
    <div class="card shadow mx-2 content-justify">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center text-uppercase">{{ $paket->nama }}</h6>
        </div>

        <div class="card-cody text-center my-2">
            <a href="/dashboard/paket" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i>  Kembali</a>
            <a href="/dashboard/paket/{{ $paket->slug }}/edit" class="btn btn-warning"><i class="far fa-edit"></i> Edit</a>
            <form action="/dashboard/paket/{{ $paket->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i class="far fa-trash-alt"></i> Hapus</button>
            </form>
        </div>

        <div class="card-body">
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-row ml-2" style="width: 26%">
                                <b>Harga Paket </b>
                            </div>
                            <div class="col-row" style="width: 2%">
                                <b>: </b>
                            </div>
                            <div class="col" style="width: 72%">
                                {{ $paket->harga }}
                            </div>
                        </div>
                    </li>

                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-row ml-2" style="width: 26%">
                                <b>Fasilitas</b>
                            </div>
                            <div class="col-row" style="width: 2%">
                                <b>: </b>
                            </div>
                            <div class="col" style="width: 72%">
                                {!! $paket->fasilitas !!}
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection