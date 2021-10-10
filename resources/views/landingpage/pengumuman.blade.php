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
            <div class="col-lg-12 mb-5 mb-lg-0">
                @foreach ($pengumumans as $pengumuman)
                <article class="blog_item">
                    <div class="blog_details p-3">
                        <a class="d-inline-block" href="/pengumuman/{{ $pengumuman->slug }}">
                            <h2 class="text-capitalize">{{ $pengumuman->judul }}</h2>
                        </a>
                        @isset($pengumuman->gambar)
                        <div class="blog_item_img d-flex justify-content-center">
                            <img src="/img/pengumuman/{{ $pengumuman->gambar }}" alt="image" height="200">
                        </div>
                        @endisset
                        <p>{!! $pengumuman->excerpt !!}</p>
                        <ul class="blog-info-link">
                            <li><a href="/pengumuman/detail/{{ $pengumuman->slug }}" class="btn btn-primary" style="color: white">Baca Selengkapnya ...</a></li>
                        </ul>
                    </div>
                </article>
                @endforeach
        
                <nav class="blog-pagination justify-content-center d-flex mt-5">
                    {{ $pengumumans->links() }}
                </nav>
            </div>
        </div>
    </div>
</section>

@endsection