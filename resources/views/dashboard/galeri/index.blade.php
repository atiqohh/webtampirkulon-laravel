@extends('dashboard.layouts.main')

@section('container')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary text-center">GALERI</h5>
    </div>
    <br>
    <div class="button ml-4">
        <a href="/dashboard/galeri/create" class="btn btn-primary">
            <i class="fas fa-plus-circle"></i> Tambah Gambar Baru
        </a>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-5 text-center alert-dismissible fade show mx-auto" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="card-body">
        <section id="portfolio" class="portfolio">
            <div class="row portfolio-container" data-aos="fade-up">
                @foreach ($galeris as $galeri)
                <div class="col-lg-3 portfolio-item filter-app" data-aos="fade-up">
                    <img src="/img/galeri/{{ $galeri->gambar }}" class="img-fluid imggaleri col-galeri" alt="" height="300">
                    <div class="row">
                        <div class="portfolio-info">
                            <p>{{ $galeri->keterangan }}</p>
                            <a href="/dashboard/galeri/{{ $galeri->id }}" class="preview-link show-link"><i class="far fa-eye"></i></a>
                            <a href="/dashboard/galeri/{{ $galeri->id }}/edit" class="preview-link"><i class="far fa-edit"></i></a>
                            <form action="/dashboard/galeri/{{ $galeri->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="details-link" style="border: none" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <nav class="blog-pagination justify-content-center d-flex mt-4">
                {{ $galeris->links() }}
            </nav>
        </section>
    </div>
</div>

@endsection