@extends('dashboard.layouts.main')

@section('container')

<div class="row mb-2 ml-2">
    <a href="/dashboard/wisata" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i>  Kembali</a>
</div>

<div class="card shadow mb-4">
    <div class="col">
        <div class="ibox">
            <div class="ibox-head">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">TAMBAH WISATA</h6>
                </div>
            </div>
            <br>
            <div class="ibox-deskripsi">
                <form class="form-horizontal" id="form-sample-1" method="post" action="/dashboard/wisata" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row ml-3">
                        <label class="col-sm-2 col-form-label" for="nama">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('nama') is-invalid  @enderror" name="nama" id="nama" placeholder="Nama Wisata" value="{{ old('nama') }}" autofocus required>
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row ml-3">
                        <label class="col-sm-2 col-form-label" for="slug">Slug</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('slug') is-invalid  @enderror" name="slug" id="slug" placeholder="Slug Wisata" value="{{ old('slug') }}" readonly required>
                            @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row ml-3">
                        <label class="col-sm-2 col-form-label" for="gambar">Gambar</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control @error('gambar') is-invalid  @enderror" multiple="true" name="gambar" id="gambar" value="{{ old('gambar') }}">
                            <small id="passwordHelpBlock" class="form-text text-muted">
                                Format gambar: jpg, jpeg, png. Ukuran maksimal gambar: 1 mb/1000 kb
                            </small>
                            @error('gambar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row ml-3">
                        <label class="col-sm-2 col-form-label" for="harga_tiket">Harga Tiket</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('harga_tiket') is-invalid  @enderror" name="harga_tiket" id="harga_tiket" placeholder="Harga Tiket Wisata" value="{{ old('harga_tiket') }}" required>
                            @error('harga_tiket')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row ml-3">
                        <label class="col-sm-2 col-form-label" for="operasi">Operasi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('operasi') is-invalid  @enderror" name="operasi" id="operasi" placeholder="Operasi Tempat Wisata" value="{{ old('operasi') }}" required>
                            @error('operasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row ml-3">
                        <label class="col-sm-2 col-form-label" for="lokasi">Lokasi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('lokasi') is-invalid  @enderror" name="lokasi" id="lokasi" placeholder="Lokasi Tempat Wisata" value="{{ old('lokasi') }}" required>
                            @error('lokasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row ml-3">
                        <label class="col-sm-2 col-form-label" for="deskripsi">Deskripsi</label>
                        <div class="col-sm-10">
                            @error('deskripsi')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <textarea name="deskripsi" id="deskripsi" class="@error('deskripsi') is-invalid  @enderror" value="{{ old('deskripsi') }}" required>
                                {{ old('deskripsi') }}
                            </textarea>
                            <script>
                                CKEDITOR.replace('deskripsi', {
                                        width: '100%',
                                        height: '250',
                                        // Pressing Enter will create a new <div> element.
                                        enterMode: CKEDITOR.ENTER_BR,
                                        // Pressing Shift+Enter will create a new <p> element.
                                        shiftEnterMode: CKEDITOR.ENTER_P
                                    });

                                    CKEDITOR.on('dialogDefinition', function(e) {
                                        dialogName = e.data.name;
                                        dialogDefinition = e.data.definition;
                                        console.log(dialogDefinition);
                                        if (dialogName == 'image') {
                                            // dialogDefinition.removeContents('Link');
                                            dialogDefinition.removeContents('advanced');
                                            var tabContent = dialogDefinition.getContents('info');
                                            tabContent.remove('txtHSpace');
                                            tabContent.remove('txtVSpace');
                                        }
                                    });

                                    CKFinder.setupCKEditor();
                            </script>
                        </div>
                    </div>

                    <div class="form-group row ml-3">
                        <div class="col text-right mr-3">
                            <button type="submit" class="btn btn-primary swal"><i class="fas fa-save"></i> Simpan Wisata</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<script>
    const nama = document.querySelector('#nama');
    const slug = document.querySelector('#slug');

    nama.addEventListener('change', function(){
        fetch('/dashboard/wisata/checkSlug?nama=' + nama.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });
</script>

@endsection