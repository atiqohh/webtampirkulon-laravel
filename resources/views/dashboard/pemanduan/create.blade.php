@extends('dashboard.layouts.main')

@section('container')

<div class="card shadow mb-4 col-lg-8">
    <div class="col">
        <div class="ibox">
            <div class="ibox-head">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">TAMBAH PEMANDUAN WISATA: {{ $pemanduan->pemandu->nama }}</h6>
                </div>
            </div>
            <br>
            <div class="ibox-body">
                <form class="form-horizontal" id="form-sample-1" method="post" action="/dashboard/pemandu" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row ml-3">
                        <label class="col-sm-4 col-form-label" for="nama">Nama Pemandu</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @error('nama') is-invalid  @enderror" name="nama" id="nama" placeholder="Nama Pemandu Wisata" value="{{ old('nama', $pemanduan->pemandu->nama) }}" readonly required>
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row ml-3">
                        <label class="col-sm-4 col-form-label" for="tanggal">Tanggal Pemanduan</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control @error('tanggal') is-invalid  @enderror" name="tanggal" id="tanggal" value="{{ old('tanggal') }}" autofocus required>
                            @error('tanggal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row ml-3">
                        <label class="col-sm-4 col-form-label" for="waktu">Waktu Mulai Pemandu</label>
                        <div class="col-sm-8">
                            <input type="time" class="form-control @error('waktu') is-invalid  @enderror" name="waktu" id="waktu" value="{{ old('waktu') }}" required>
                            @error('waktu')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row ml-3">
                        <label class="col-sm-4 col-form-label" for="jumlah">Jumlah Pengunjung</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control @error('jumlah') is-invalid  @enderror" name="jumlah" id="jumlah" placeholder="Jumlah orang dalam pemanduan yang dipandu" value="{{ old('jumlah') }}" required>
                            @error('jumlah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row ml-3">
                        <div class="col text-right mr-3">
                            <button type="submit" class="btn btn-primary swal"><i class="fas fa-save"></i> Simpan Pemanduan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection