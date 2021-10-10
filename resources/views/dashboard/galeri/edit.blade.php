@extends('dashboard.layouts.main')

@section('container')

<div class="row mb-2 ml-2">
    <a href="/dashboard/galeri" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i>  Kembali</a>
</div>

<div class="card shadow mb-4 col-lg-8">
    <div class="ibox">
        <div class="ibox-head">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary text-center">EDIT GALERI</h6>
            </div>
        </div>
        <br>
        <div class="ibox-body">
            <form class="form-horizontal" id="form-sample-1" method="post" action="/dashboard/galeri/{{ $galeri->id }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                
                <div class="form-group row ml-3">
                    <label class="col-sm-2 col-form-label" for="gambar">Gambar</label>
                    <div class="col-sm-10">
                        @isset($galeri->gambar)
                        <img src="/img/galeri/{{ $galeri->gambar }}" alt="gambar" height="250">
                        @endisset
                        <input type="file" class="form-control mt-2 @error('gambar') is-invalid  @enderror" multiple="true" name="gambar" id="gambar" value="{{ old('gambar', $galeri->gambar) }}">
                        <small id="passwordHelpBlock" class="form-text text-muted">
                            Format gambar: jpg, jpeg, png. Ukuran maksimal gambar: 1 mb/1000 kb
                        </small>
                        @error('gambar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row ml-3">
                    <label class="col-sm-2 col-form-label" for="keterangan">keterangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('keterangan') is-invalid  @enderror" name="keterangan" id="keterangan" placeholder="Keterangan" value="{{ old('keterangan', $galeri->keterangan) }}">
                        @error('keterangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row ml-3">
                    <div class="col text-right mr-3">
                        <button type="submit" class="btn btn-primary swal"><i class="fas fa-save"></i> Simpan Gambar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection