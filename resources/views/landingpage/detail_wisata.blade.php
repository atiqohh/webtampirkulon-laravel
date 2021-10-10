@extends('landingpage.layouts.main')

@section('container')

<!--================ Banner SM Section start =================-->
<section class="hero-banner hero-banner-sm text-center">
    <div class="container">
        <h1>WISATA</h1>
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Wisata</li>
            </ol>
        </nav>
    </div>
</section>
<!--================ Banner SM Section end =================-->

<section class="blog_area section-margin my-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post">
                    <div class="blog_details py-2">
                        <h2 class="text-center text-uppercase">{{ $wisata->nama }}</h2>
                    </div>
                    @isset($wisata->gambar)
                    <div class="feature-img text-center">
                        <img src="/img/wisata/{{ $wisata->gambar }}" class="gambar justify-content-center" alt="image" height="300px">
                    </div>  
                    @endisset
                    <div class="blog_details pt-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-row ml-2" style="width: 26%">
                                        <b>Harga Tiket </b>
                                    </div>
                                    <div class="col-row" style="width: 2%">
                                        <b>: </b>
                                    </div>
                                    <div class="col" style="width: 72%">
                                        {{ $wisata->harga_tiket }}
                                    </div>
                                </div>
                            </li>
        
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-row ml-2" style="width: 26%">
                                        <b>Operasi </b>
                                    </div>
                                    <div class="col-row" style="width: 2%">
                                        <b>: </b>
                                    </div>
                                    <div class="col" style="width: 72%">
                                        {{ $wisata->operasi }}
                                    </div>
                                </div>
                            </li>
        
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-row ml-2" style="width: 26%">
                                        <b>Lokasi </b>
                                    </div>
                                    <div class="col-row" style="width: 2%">
                                        <b>: </b>
                                    </div>
                                    <div class="col" style="width: 72%">
                                        {{ $wisata->lokasi }}
                                    </div>
                                </div>
                            </li>
                        <p class="text-justify mt-3" style="color: black">{!! $wisata->deskripsi !!}</p>
                    </div>
                </div>
            </div>

            @include('landingpage.layouts.sidepage')

        </div>
    </div>
</section>

@endsection