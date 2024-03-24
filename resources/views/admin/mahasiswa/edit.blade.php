@extends('layouts.app')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Mahasiswa</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-user-graduate"></i> Edit Data Mahasiswa</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.mahasiswa.update', $mahasiswa->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>NAMA MAHASISWA</label>
                            <input type="text" name="nama_mahasiswa" value="{{ old('nama_mahasiswa', $mahasiswa->nama_mahasiswa) }}"
                                placeholder="Masukkan Nama Mahasiswa"
                                class="form-control @error('nama_mahasiswa') is-invalid @enderror">
                            @error('nama_mahasiswa')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>STATUS MAHASISWA</label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="aktif"> Aktif</option>
                                    <option value="tidak aktif"> Tidak Aktif</option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>JUMLAH SKS</label>
                            <input type="number" name="total_sks" max="110" min="0" value="{{ old('total_sks', $mahasiswa->total_sks) }}"
                                placeholder="Masukkan Jumlah SKS"
                                class="form-control @error('total_sks') is-invalid @enderror">
                            @error('total_sks')
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
