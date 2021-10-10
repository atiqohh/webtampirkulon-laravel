@extends('dashboard.layouts.main')

@section('container')

<div class="card shadow mb-4 col-lg-8">
    <div class="col">
        <div class="ibox">
            <div class="ibox-head">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">EDIT PEMANDUAN: {{ $pemanduan->pemandu->nama }}</h6>
                </div>
            </div>
            <br>
            <div class="ibox-body">
                <form class="form-horizontal" id="form-sample-1" method="post" action="/dashboard/pemanduan/{{ $pemanduan->id }}" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-group row ml-3">
                        <label class="col-sm-4 col-form-label" for="pemandu_id">Nama Pemandu</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @error('pemandu') is-invalid  @enderror" name="pemandu" id="pemandu" placeholder="" value="{{ $pemanduan->pemandu->nama }}" readonly required>
                            <input type="hidden" class="form-control @error('pemandu_id') is-invalid  @enderror" name="pemandu_id" id="pemandu_id" placeholder="" value="{{ $pemanduan->pemandu_id }}">
                            @error('pemandu_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row ml-3">
                        <label class="col-sm-4 col-form-label" for="tanggal">Tanggal Pemanduan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @error('tanggal') is-invalid  @enderror" name="tanggal" id="tanggal" value="{{ old('tanggal', $pemanduan->tanggal) }}" autofocus required>
                            @error('tanggal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row ml-3">
                        <label class="col-sm-4 col-form-label" for="waktu">Waktu Mulai Pemanduan</label>
                        <div class="col-sm-8">
                            <input type="time" class="form-control @error('waktu') is-invalid  @enderror" name="waktu" id="waktu" value="{{ old('waktu', $pemanduan->waktu) }}" required>
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
                            <input type="number" class="form-control @error('jumlah') is-invalid  @enderror" name="jumlah" id="jumlah" placeholder="Jumlah orang dalam pemanduan yang dipandu" value="{{ old('jumlah', $pemanduan->jumlah) }}" required>
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