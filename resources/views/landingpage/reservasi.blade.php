@extends('landingpage.layouts.main')

@section('container')
    
<!--================ Banner SM Section start =================-->
<section class="hero-banner hero-banner-sm text-center">
    <div class="container">
        <h1>RESERVASI</h1>
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Reservasi</li>
            </ol>
        </nav>
    </div>
</section>
<!--================ Banner SM Section end =================-->

<section class="blog_area section-margin my-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    <h4 class="text-center">Reservasi Wisata Tampir Kulon</h4>
                    <br>
                    <br>

                    <form class="form-horizontal" id="form-sample-1" method="post" action="/reservasi/store" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row ml-3">
                            <label class="col-sm-3 col-form-label" for="nama">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('nama') is-invalid  @enderror" name="nama" id="nama" placeholder="Nama" value="{{ old('nama') }}" autofocus required>
                                @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    
                        <div class="form-group row ml-3">
                            <label class="col-sm-3 col-form-label" for="alamat">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('alamat') is-invalid  @enderror" name="alamat" id="alamat" placeholder="Alamat" value="{{ old('alamat') }}" required>
                                @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    
                        <div class="form-group row ml-3">
                            <label class="col-sm-3 col-form-label" for="paket_id">Paket Wisata</label>
                            <div class="col-sm-9">
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
                            <label class="col-sm-3 col-form-label" for="tanggal">Tanggal Reservasi</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control @error('tanggal') is-invalid  @enderror" name="tanggal" id="tanggal" placeholder="Tanggal Reservasi" value="{{ old('tanggal') }}" required>
                                @error('tanggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    
                        <div class="form-group row ml-3">
                            <label class="col-sm-3 col-form-label" for="jumlah">Jumlah Orang</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control @error('jumlah') is-invalid  @enderror" name="jumlah" id="jumlah" placeholder="Jumlah Orang" value="{{ old('jumlah') }}" required>
                                @error('jumlah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    
                        <div class="form-group row ml-3">
                            <label class="col-sm-3 col-form-label" for="kontak">Kontak</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('kontak') is-invalid  @enderror" name="kontak" id="kontak" placeholder="Kontak" value="{{ old('kontak') }}" required>
                                @error('kontak')
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

            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget">
                        <h5>Petunjuk Reservasi</h5>
                        <hr>
                        <ol class="text-justify">
                            <li>Isi form reservasi dengan data yang benar</li>
                            <li>Rincian pilihan paket wisata dapat dilihat pada menu paket wisata</li>
                            <li>Setelah melakukan pengisian form, cetak bukti reservasi</li>
                            <li>Simpan bukti reservasi (file pdf)</li>
                            <li>Pembayaran uang muka reservasi ke rekening: </li>
                            <li>Konfirmasi reservasi dengan mengirim bukti reservasi dan bukti pembayaran uang muka ke narahubung: </li>
                        </ol>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection