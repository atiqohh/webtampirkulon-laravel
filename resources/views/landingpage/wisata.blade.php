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
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    @foreach ($wisatas as $wisata)
                    <article class="blog_item mb-4">
                        <div class="card text-center card-pricing">
                            @if ($wisata->gambar == NULL)
                            <div class="card-pricing__header py-3">
                                <h4>{{ $wisata->nama }}</h4>
                                <br>
                                <p class="font-weight-bold mb-1">Harga Tiket: {{ $wisata->harga_tiket }}</p>
                                <p class="mb-1">Buka: {{ $wisata->operasi }}</p>
                                <hr class="divider d-none d-md-block">
                                <a href="/wisata/detail/{{ $wisata->slug }}"><button class="button">Detail</button></a>
                            </div>
                            @else
                            <div class="row">
                                <div class="col-lg-6 mb-lg-0">
                                    <img src="/img/wisata/{{ $wisata->gambar }}" class="gambar justify-content-center" alt="image" height="290px" width="400px">
                                </div>
                                <div class="col-lg-5 ml-4">
                                    <div class="card-pricing__header">
                                        <h4>{{ $wisata->nama }}</h4>
                                        <br>
                                        <p class="font-weight-bold mb-1">Harga Tiket: {{ $wisata->harga_tiket }}</p>
                                        <p class="mb-1">Buka: {{ $wisata->operasi }}</p>
                                        <hr class="divider d-none d-md-block">
                                        <a href="/wisata/detail/{{ $wisata->slug }}"><button class="button">Detail</button></a>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </article>
                    @endforeach

                    <nav class="blog-pagination justify-content-center d-flex">
                        {{ $wisatas->links() }}
                    </nav>
                </div>
            </div>

            @include('landingpage.layouts.sidepage')

        </div>
    </div>
</section>
    
@endsection