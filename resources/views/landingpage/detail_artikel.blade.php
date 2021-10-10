@extends('landingpage.layouts.main')

@section('container')

<!--================ Banner SM Section start =================-->
<section class="hero-banner hero-banner-sm text-center">
    <div class="container">
        <h1>ARTIKEL</h1>
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Artikel</li>
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
                    @isset($artikel->gambar)
                    <div class="feature-img text-center">
                        <img src="/img/artikel/{{ $artikel->gambar }}" class="gambar justify-content-center" alt="image" height="300px">
                    </div>  
                    @endisset
                    <div class="blog_details pt-4">
                        <h2 class="text-center text-capitalize">{{ $artikel->judul }}</h2>
                        <p class="text-justify">{!! $artikel->body !!}</p>
                    </div>
                </div>
            </div>

            @include('landingpage.layouts.sidepage')

        </div>
    </div>
</section>

@endsection