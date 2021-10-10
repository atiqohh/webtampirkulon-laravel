@extends('dashboard.layouts.main')

@section('container')

<div class="row mb-2 ml-2">
    <a href="/dashboard/admin" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i>  Kembali</a>
</div>

<div class="card shadow mb-4 col-lg-8">
    <div class="col">
        <div class="ibox">
            <div class="ibox-head">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">TAMBAH ADMIN</h6>
                </div>
            </div>
            <br>
            <div class="ibox-body">
                <form class="form-horizontal" id="form-sample-1" method="post" action="/dashboard/admin" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row ml-3">
                        <label class="col-sm-3 col-form-label" for="name">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @error('name') is-invalid  @enderror" name="name" id="name" placeholder="Nama Admin" value="{{ old('name') }}" autofocus required>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row ml-3">
                        <label class="col-sm-3 col-form-label" for="email">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control @error('email') is-invalid  @enderror" name="email" id="email" placeholder="Email Admin" value="{{ old('email') }}" required>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row ml-3">
                        <label class="col-sm-3 col-form-label" for="password">Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control @error('password') is-invalid  @enderror" name="password" id="password" placeholder="Password" value="{{ old('password') }}" required>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row ml-3">
                        <div class="col text-right mr-3">
                            <button type="submit" class="btn btn-primary swal"><i class="fas fa-save"></i> Simpan Admin</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection