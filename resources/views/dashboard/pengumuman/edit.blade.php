@extends('dashboard.layouts.main')

@section('container')

<div class="row mb-2 ml-2">
    <a href="/dashboard/pengumuman" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i>  Kembali</a>
</div>

<div class="card shadow mb-4">
    <div class="col">
        <div class="ibox">
            <div class="ibox-head">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">EDIT PENGUMUMAN</h6>
                </div>
            </div>
            <br>
            <div class="ibox-body">
                <form class="form-horizontal" id="form-sample-1" method="post" action="/dashboard/pengumuman/{{ $pengumuman->slug }}" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-group row ml-3">
                        <label class="col-sm-2 col-form-label" for="judul">Judul</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('judul') is-invalid  @enderror" name="judul" id="judul" placeholder="Judul Pengumuman" value="{{ old('judul', $pengumuman->judul) }}" autofocus required>
                            @error('judul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row ml-3">
                        <label class="col-sm-2 col-form-label" for="slug">Slug</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('slug') is-invalid  @enderror" name="slug" id="slug" placeholder="Slug Pengumuman" value="{{ old('slug', $pengumuman->slug) }}" readonly required>
                            @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row ml-3">
                        <label class="col-sm-2 col-form-label" for="attachment">Attachment</label>
                        <div class="col-sm-10">
                            @isset($pengumuman->attachment)
                            <p>
                                {{ $pengumuman->attachment }}
                            </p>
                            @endisset
                            <input type="file" class="form-control @error('attachment') is-invalid  @enderror" multiple="true" name="attachment" id="attachment" value="{{ old('attachment', $pengumuman->attachment) }}">
                            <small id="passwordHelpBlock" class="form-text text-muted">
                                Format file: PDF. Ukuran maksimal file: 2 mb/2000 kb
                            </small>
                            @error('attachment')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row ml-3">
                        <label class="col-sm-2 col-form-label" for="body">Isi</label>
                        <div class="col-sm-10">
                            @error('body')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <textarea name="body" id="body" class="@error('body') is-invalid  @enderror" value="{{ old('body', $pengumuman->body) }}" required>
                                {{ old('body', $pengumuman->body) }}
                            </textarea>
                            <script>
                                CKEDITOR.replace('body', {
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
                            <button type="submit" class="btn btn-primary swal"><i class="fas fa-save"></i> Simpan Pengumuman</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<script>
    const judul = document.querySelector('#judul');
    const slug = document.querySelector('#slug');

    judul.addEventListener('change', function(){
        fetch('/dashboard/pengumuman/checkSlug?judul=' + judul.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });
</script>

@endsection