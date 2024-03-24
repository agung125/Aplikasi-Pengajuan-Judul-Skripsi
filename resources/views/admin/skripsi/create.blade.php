@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Buat Pengajuan</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-journal-whills"></i> Buat Pengajuan</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.skripsi.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="mahasiswa_id" value="{{auth()->user()->user_id}}">
                            <input type="hidden" name="sekprod_id" value="{{$sekprod}}">

                            <div class="form-group">
                                <label>NAMA MAHASISWA</label>
                                <input type="text" value="{{ auth()->user()->name }}" class="form-control" disabled>
                            </div>

                            <div class="form-group">
                                <label>DOSEN PEMBIMBING AKADEMIK</label>
                                <select class="form-control select-category @error('dosen_id') is-invalid @enderror" name="dosen_id">
                                    <option value="">-- PILIH DOSEN --</option>
                                    @foreach ($dosens as $dosen)
                                        <option value="{{ $dosen->id }}">{{ $dosen->nama_dosen }}</option>
                                    @endforeach
                                </select>
                                @error('dosen_id')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>JUDUL SKRIPSI</label>
                                <input type="text" name="judul_skripsi" class="form-control @error('judul_skripsi') is-invalid @enderror">

                                @error('judul_skripsi')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>



                            <div class="form-group">
                                <label>PROPOSAL</label>
                                <input type="file" name="file" class="form-control @error('file') is-invalid @enderror">

                                @error('file')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> SIMPAN</button>
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
