@extends('layouts.app')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Dosen Pembimbing Akademik</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-user-tie"></i> Edit Data Dosen Pembimbing Akademik</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.dosen.update', $dosen->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>NAMA DOSEN</label>
                            <input type="text" name="nama_dosen" value="{{ old('nama_dosen', $dosen->nama_dosen) }}"
                                placeholder="Masukkan Nama Kepala Cabang"
                                class="form-control @error('nama_dosen') is-invalid @enderror">
                            @error('nama_dosen')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>NIPY</label>
                            <input type="text" name="nipy" value="{{ old('nipy', $dosen->nipy) }}"
                                placeholder="Masukkan Alamat Kantor Cabang"
                                class="form-control @error('nipy') is-invalid @enderror">
                            @error('nipy')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i>
                            UPDATE</button>
                        <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.6.2/tinymce.min.js"></script>
<script>
    var editor_config = {
        selector: "textarea.content",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
    };

    tinymce.init(editor_config);
</script>
@stop
