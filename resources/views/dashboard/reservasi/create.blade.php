@extends('dashboard.layouts.main')

@section('container')

<div class="row mb-2 ml-2">
    <a href="/dashboard/reservasi" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i>  Kembali</a>
</div>

<div class="card shadow mb-4 col-lg-8">
    <div class="col">
        <div class="ibox">
            <div class="ibox-head">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">TAMBAH RESERVASI</h6>
                </div>
            </div>
            <br>
            <div class="ibox-body">
                <form class="form-horizontal" id="form-sample-1" method="post" action="/dashboard/reservasi" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row ml-3">
                        <label class="col-sm-2 col-form-label" for="nama">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('nama') is-invalid  @enderror" name="nama" id="nama" placeholder="Nama" value="{{ old('nama') }}" autofocus required>
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row ml-3">
                        <label class="col-sm-2 col-form-label" for="alamat">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('alamat') is-invalid  @enderror" name="alamat" id="alamat" placeholder="Alamat" value="{{ old('alamat') }}" required>
                            @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row ml-3">
                        <label class="col-sm-2 col-form-label" for="paket_id">Paket Wisata</label>
                        <div class="col-sm-10">
                            <select class="form-control @error('paket_id') is-invalid  @enderror" name="paket_id" id="paket_id" value="{{ old('paket_id') }}" required>
                                <option value="">pilih paket..</option>
                                @foreach ($pakets as $paket)
                                    <option value="{{ $paket->id }}">{{ $paket->nama }}</option>
                                @endforeach
                                
                            </select>
                            @error('paket_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row ml-3">
                        <label class="col-sm-2 col-form-label" for="tanggal">Tanggal Reservasi</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control @error('tanggal') is-invalid  @enderror" name="tanggal" id="tanggal" placeholder="Tanggal Reservasi" value="{{ old('tanggal') }}" required>
                            @error('tanggal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row ml-3">
                        <label class="col-sm-2 col-form-label" for="jumlah">Jumlah Orang</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control @error('jumlah') is-invalid  @enderror" name="jumlah" id="jumlah" placeholder="Jumlah Orang" value="{{ old('jumlah') }}" required>
                            @error('jumlah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row ml-3">
                        <label class="col-sm-2 col-form-label" for="kontak">Kontak</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('kontak') is-invalid  @enderror" name="kontak" id="kontak" placeholder="Kontak" value="{{ old('kontak') }}" required>
                            @error('kontak')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row ml-3">
                        <label class="col-sm-2 col-form-label" for="status">Status</label>
                        <div class="col-sm-10">
                            <select class="form-control @error('status') is-invalid  @enderror" name="status" id="status" value="{{ old('status') }}" required>
                                <option value="Belum Konfirmasi">Belum Konfirmasi</option>
                                <option value="Uang Muka">Uang Muka</option>
                                <option value="Lunas">Lunas</option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row ml-3">
                        <div class="col text-right mr-3">
                            <button type="submit" class="btn btn-primary swal"><i class="fas fa-save"></i> Simpan Reservasi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection