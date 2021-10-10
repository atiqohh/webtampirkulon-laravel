@extends('landingpage.layouts.main')

@section('container')

<!--================ Banner SM Section start =================-->
<section class="hero-banner hero-banner-sm text-center">
    <div class="container">
        <h1>PAKET</h1>
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Paket</li>
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
                    @foreach ($pakets as $paket)
                    <article class="blog_item mb-4">
                        <div class="card text-center card-pricing">
                            <div class="card-pricing__header py-3">
                                <h4>{{ $paket->nama }}</h4>
                                <br>
                                <p class="font-weight-bold mb-1">Harga Paket: {{ $paket->harga }}</p>
                                <p class="mb-1">{{ $paket->fasilitas }}</p>
                                <hr class="divider d-none d-md-block">
                                <a href="/reservasi"><button class="button">Reservasi</button></a>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>

            @include('landingpage.layouts.sidepage')

        </div>
    </div>
</section>
    
@endsection