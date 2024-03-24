@extends('layouts.app')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Mahasiswa</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-user-graduate"></i> Data Mahasiswa</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.mahasiswa.index') }}" method="GET">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                @can('mahasiswas.create')
                                    <div class="input-group-prepend">
                                        <a href="{{ route('admin.mahasiswa.create') }}" class="btn btn-primary" style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> TAMBAH</a>
                                    </div>
                                @endcan
                                <input type="text" class="form-control" name="q"
                                       placeholder="cari berdasarkan hari">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> CARI
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col" style="text-align: center;width: 6%">NO.</th>
                                <th scope="col">NIM</th>
                                <th scope="col">NAMA MAHASISWA</th>
                                <th scope="col">TOTAL SKS</th>
                                <th scope="col">STATUS MAHASISWA</th>
                                <th scope="col">STATUS MATKUL</th>
                                <th scope="col">PEMBERITAHUAN</th>
                                <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($mahasiswas as $no => $mahasiswa)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ ++$no + ($mahasiswas->currentPage()-1) * $mahasiswas->perPage() }}</th>
                                    <td>{{ $mahasiswa->nim }}</td>
                                    <td>{{ $mahasiswa->nama_mahasiswa }}</td>
                                    <td>{{ $mahasiswa->total_sks }}</td>
                                    <td>
                                        @if ($mahasiswa->status == 'aktif')
                                            <button type="button" class="btn btn-sm btn-success">Aktif</button>
                                        @else
                                            <button type="button" class="btn btn-sm btn-danger">Tidak Aktif</button>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($mahasiswa->status_matkul == 'lulus')
                                            <button type="button" class="btn btn-sm btn-success">Lulus</button>
                                        @else
                                            <button type="button" class="btn btn-sm btn-danger">Tidak Lulus</button>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($mahasiswa->invoice == 'Jumlah SKS mata kuliah Metodologi Penelitian tidak mencukupi')
                                            Jumlah SKS mata kuliah Metodologi Penelitian tidak mencukupi
                                        @else
                                           Lulus
                                        @endif
                                    </td>


                                    <td class="text-center">
                                        @can('mahasiswas.edit')
                                            <a href="{{ route('admin.mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                        @endcan

                                        @can('mahasiswas.delete')
                                            <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $mahasiswa->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div style="text-align: center">
                            {{$mahasiswas->links("vendor.pagination.bootstrap-4")}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>

<script>
    //ajax delete
    function Delete(id)
        {
            var id = id;
            var token = $("meta[name='csrf-token']").attr("content");

            swal({
                title: "APAKAH KAMU YAKIN ?",
                text: "INGIN MENGHAPUS DATA INI!",
                icon: "warning",
                buttons: [
                    'TIDAK',
                    'YA'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {


                    //ajax delete
                    jQuery.ajax({
                        url: "/admin/mahasiswa/"+id,
                        data:     {
                            "id": id,
                            "_token": token
                        },
                        type: 'DELETE',
                        success: function (response) {
                            if (response.status == "success") {
                                swal({
                                    title: 'BERHASIL!',
                                    text: 'DATA BERHASIL DIHAPUS!',
                                    icon: 'success',
                                    timer: 1000,
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    buttons: false,
                                }).then(function() {
                                    location.reload();
                                });
                            }else{
                                swal({
                                    title: 'GAGAL!',
                                    text: 'DATA GAGAL DIHAPUS!',
                                    icon: 'error',
                                    timer: 1000,
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    buttons: false,
                                }).then(function() {
                                    location.reload();
                                });
                            }
                        }
                    });

                } else {
                    return true;
                }
            })
        }
</script>
@stop
