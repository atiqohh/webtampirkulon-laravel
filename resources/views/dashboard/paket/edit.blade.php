@extends('dashboard.layouts.main')

@section('container')

<div class="row mb-2 ml-2">
    <a href="/dashboard/paket" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i>  Kembali</a>
</div>

<div class="card shadow mb-4">
    <div class="col">
        <div class="ibox">
            <div class="ibox-head">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">EDIT PAKET WISATA</h6>
                </div>
            </div>
            <br>
            <div class="ibox-fasilitas">
                <form class="form-horizontal" id="form-sample-1" method="post" action="/dashboard/paket/{{ $paket->slug }}" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-group row ml-3">
                        <label class="col-sm-2 col-form-label" for="nama">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('nama') is-invalid  @enderror" name="nama" id="nama" placeholder="Nama Paket" value="{{ old('nama', $paket->nama) }}" autofocus required>
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
                            <input type="text" class="form-control @error('slug') is-invalid  @enderror" name="slug" id="slug" placeholder="Slug paket" value="{{ old('slug', $paket->slug) }}" readonly required>
                            @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row ml-3">
                        <label class="col-sm-2 col-form-label" for="harga">Harga</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('harga') is-invalid  @enderror" name="harga" id="harga" placeholder="Harga Paket" value="{{ old('harga', $paket->harga) }}" required>
                            @error('harga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row ml-3">
                        <label class="col-sm-2 col-form-label" for="fasilitas">Fasilitas</label>
                        <div class="col-sm-10">
                            @error('fasilitas')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <textarea name="fasilitas" id="fasilitas" class="@error('fasilitas') is-invalid  @enderror" value="{{ old('fasilitas', $paket->fasilitas) }}" required>
                                {{ old('fasilitas', $paket->fasilitas) }}
                            </textarea>
                            <script>
                                CKEDITOR.replace('fasilitas', {
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
                            <button type="submit" class="btn btn-primary swal"><i class="fas fa-save"></i> Simpan paket</button>
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
        fetch('/dashboard/paket/checkSlug?nama=' + nama.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });
</script>

@endsection