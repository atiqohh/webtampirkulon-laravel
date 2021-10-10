@extends('dashboard.layouts.main')

@section('container')

<div class="col-lg-8">
    <div class="card shadow mx-2 content-justify">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center text-uppercase">Detail Reservasi: {{ $reservasi->nama }}</h6>
        </div>

        <div class="card-cody text-center my-2">
            <a href="/dashboard/reservasi" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i>  Kembali</a>
            <a href="/dashboard/reservasi/{{ $reservasi->id }}/edit" class="btn btn-warning"><i class="far fa-edit"></i> Edit</a>
            <form action="/dashboard/reservasi/{{ $reservasi->id }}" method="post" class="d-inline">
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
                                <b>Nama </b>
                            </div>
                            <div class="col-row" style="width: 2%">
                                <b>: </b>
                            </div>
                            <div class="col" style="width: 72%">
                                {{ $reservasi->nama }}
                            </div>
                        </div>
                    </li>

                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-row ml-2" style="width: 26%">
                                <b>Paket</b>
                            </div>
                            <div class="col-row" style="width: 2%">
                                <b>: </b>
                            </div>
                            <div class="col" style="width: 72%">
                               {{ $reservasi->paket->nama }}
                            </div>
                        </div>
                    </li>

                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-row ml-2" style="width: 26%">
                                <b>Alamat</b>
                            </div>
                            <div class="col-row" style="width: 2%">
                                <b>: </b>
                            </div>
                            <div class="col" style="width: 72%">
                                {{ $reservasi->alamat }}
                            </div>
                        </div>
                    </li>

                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-row ml-2" style="width: 26%">
                                <b>Tanggal</b>
                            </div>
                            <div class="col-row" style="width: 2%">
                                <b>: </b>
                            </div>
                            <div class="col" style="width: 72%">
                                {{ $reservasi->tanggal }}
                            </div>
                        </div>
                    </li>

                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-row ml-2" style="width: 26%">
                                <b>Jumlah Orang</b>
                            </div>
                            <div class="col-row" style="width: 2%">
                                <b>: </b>
                            </div>
                            <div class="col" style="width: 72%">
                                {{ $reservasi->jumlah }}
                            </div>
                        </div>
                    </li>

                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-row ml-2" style="width: 26%">
                                <b>Kontak</b>
                            </div>
                            <div class="col-row" style="width: 2%">
                                <b>: </b>
                            </div>
                            <div class="col" style="width: 72%">
                                {{ $reservasi->kontak }}
                            </div>
                        </div>
                    </li>

                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-row ml-2" style="width: 26%">
                                <b>Status</b>
                            </div>
                            <div class="col-row" style="width: 2%">
                                <b>: </b>
                            </div>
                            <div class="col" style="width: 72%">
                                {{ $reservasi->status }}
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection