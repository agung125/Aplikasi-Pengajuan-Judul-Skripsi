@extends('layouts.app')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Data Mahasiswa</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-user-graduate"></i> Tambah Data Mahasiswa</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="nim" value="{{$mahasiswa_id}}">
                        <div class="form-group">
                            <label>NAMA MAHASISWA</label>
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama Mahasiswa"
                                class="form-control @error('name') is-invalid @enderror">

                            @error('name')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>JUMLAH SKS</label>
                            <input type="number" name="total_sks" min="0" value="{{ old('total_sks') }}" min="0" max="110" placeholder="Masukkan Jumlah SKS"
                                class="form-control @error('total_sks') is-invalid @enderror">
                            @error('total_sks')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>EMAIL</label>
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Masukkan Email"
                                class="form-control @error('email') is-invalid @enderror">

                            @error('email')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>PASSWORD</label>
                                    <input type="password" name="password" value="{{ old('password') }}" placeholder="Masukkan Password"
                                        class="form-control @error('password') is-invalid @enderror">

                                    @error('password')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>PASSWORD</label>
                                    <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Masukkan Konfirmasi Password"
                                        class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">ROLE</label>

                            @foreach ($roles as $role)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="role[]" value="{{ $role->name }}" id="check-{{ $role->id }}">
                                <label class="form-check-label" for="check-{{ $role->id }}">
                                    {{ $role->name }}
                                </label>
                            </div>
                            @endforeach
                        </div>

                        <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i>
                            SIMPAN</button>
                        <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@stop
