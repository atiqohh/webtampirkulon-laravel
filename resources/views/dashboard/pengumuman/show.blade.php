@extends('dashboard.layouts.main')

@section('container')

<div class="col">
    <div class="card shadow mx-2 content-justify">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center text-uppercase">{{ $pengumuman->judul }}</h6>
        </div>

        <div class="card-cody text-center my-2">
            <a href="/dashboard/pengumuman" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i>  Kembali</a>
            <a href="/dashboard/pengumuman/{{ $pengumuman->slug }}/edit" class="btn btn-warning"><i class="far fa-edit"></i> Edit</a>
            <form action="/dashboard/pengumuman/{{ $pengumuman->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i class="far fa-trash-alt"></i> Hapus</button>
            </form>
        </div>
        
        @isset($pengumuman->attachment)
        <div class="card-img text-center">
            <embed type="application/pdf" src="/file/pengumuman/{{ $pengumuman->attachment }}" class="attachment" alt="pengumuman" height="400" width="90%">
        </div>
        @endisset

        <div class="card-body">
            <p>{!! $pengumuman->body !!}</p>
        </div>
    </div>
</div>

@endsection