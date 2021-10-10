@extends('dashboard.layouts.main')

@section('container')

<div class="col-lg-8">
    <div class="card shadow mx-2 content-justify">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center text-uppercase">{{ $admin->name }}</h6>
        </div>

        <div class="card-cody text-center my-2">
            <a href="/dashboard/admin" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i>  Kembali</a>
            <a href="/dashboard/admin/{{ $admin->id }}/edit" class="btn btn-warning"><i class="far fa-edit"></i> Edit</a>
        </div>

        <div class="card-body">
            <div class="card">
                <ul class="my-2">
                    <div class="text-center">
                        <img src="/img/profile/{{ $admin->profile }}" class="rounded" alt="Profile" height="200">
                      </div>
                </ul>
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
                                {{ $admin->name }}
                            </div>
                        </div>
                    </li>

                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-row ml-2" style="width: 26%">
                                <b>Email</b>
                            </div>
                            <div class="col-row" style="width: 2%">
                                <b>: </b>
                            </div>
                            <div class="col" style="width: 72%">
                                {{ $admin->email }}
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection