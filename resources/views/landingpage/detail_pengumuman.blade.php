@extends('landingpage.layouts.main')

@section('container')

<!--================ Banner SM Section start =================-->
<section class="hero-banner hero-banner-sm text-center">
    <div class="container">
        <h1>PENGUMUMAN</h1>
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pengumuman</li>
            </ol>
        </nav>
    </div>
</section>
<!--================ Banner SM Section end =================-->

<section class="blog_area section-margin my-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 posts-list">
                <div class="single-post">
                    <h4 class="text-center text-capitalize">{{ $pengumuman->judul }}</h4>
                    @isset($pengumuman->attachment)
                    <div class="feature-img text-center py-3">
                        <embed type="application/pdf" src="/file/pengumuman/{{ $pengumuman->attachment }}" class="lampiran justify-content-center" width="1000px" height="500px">
                    </div>
                    @endisset
                    <div class="blog_details pt-1">
                        <p>{!! $pengumuman->body !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    
@endsection