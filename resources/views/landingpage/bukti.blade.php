@extends('landingpage.layouts.main')

@section('container')
    
<!--================ Banner SM Section start =================-->
<section class="hero-banner hero-banner-sm text-center">
    <div class="container">
        <h1>CETAK BUKTI RESERVASI</h1>
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
    <div class="container p-20">
        <div class="text-center text-bold">
            <h3>CETAK BUKTI RESERVASI</h3>
        </div>
        <div class="cetakbukti">
            <hr>
            <h5 class="text-center">Halaman ini hanya muncul satu kali!!</h5>
            <hr>
            <h6 class="text-center">Silahkan cetak bukti reservasi ini untuk konfirmasi kepada narahubung!!</h6>
            <hr>
            <form action="/reservasi/cetak" method="post" target="_blank">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="nama">Nama</label>
                    <div class="col-sm-8 cap">: {{ $nama }}</div>
                    <input type="hidden" class="" name="nama" id="nama" value="{{ $nama }}">
                </div>
                <div class="form-group row ">
                    <label class="col-sm-3 col-form-label" for="paket">Paket</label>
                    <div class="col-sm-8">: {{ $paket->nama }}</div>
                    <input type="hidden" class="" name="paket" id="paket" value="{{ $paket->nama }}">
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="alamat">Alamat</label>
                    <div class="col-sm-8 cap">: {{ $alamat }}</div>
                    <input type="hidden" class="" name="alamat" id="alamat" value="{{ $alamat }}">
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="jumlah">Jumlah Orang</label>
                    <div class="col-sm-8">: {{ $jumlah }}</div>
                    <input type="hidden" class="" name="jumlah" id="jumlah" value="{{ $jumlah }}">
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="tanggal">Tanggal Reservasi</label>
                    <div class="col-sm-8">: {{ $tanggal }}</div>
                    <input type="hidden" class="" name="tanggal" id="tanggal" value="{{  $tanggal }}">
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="kontak">Kontak</label>
                    <div class="col-sm-8">: {{ $kontak }}</div>
                    <input type="hidden" class="" name="kontak" id="kontak" value="{{ $kontak }}">
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary pdf"><i class="fas fa-print"></i> Cetak Bukti Reservasi</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection