@extends('layouts.app')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dosen Pembimbing Skripsi</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-unlock"></i>Dosen Pembimbing Skripsi</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.dps.index') }}" method="GET">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                @can('dpss.create')
                                    <div class="input-group-prepend">
                                        <a href="{{ route('admin.dps.create') }}" class="btn btn-primary" style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> TAMBAH</a>
                                    </div>
                                @endcan
                                <input type="date" class="form-control" name="q"
                                       placeholder="cari berdasarkan tanggal ">
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
                                <th scope="col" style="width: 15%">NIM</th>
                                <th scope="col" style="width: 15%">NAMA MAHASISWA</th>
                                <th scope="col">DOSEN PEMBIMBING SKRIPSI</th>
                                <th scope="col">TANGGAL</th>
                                <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($dpss as $no => $dps)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ ++$no + ($dpss->currentPage()-1) * $dpss->perPage() }}</th>
                                    <td>{{ $dps->mahasiswa->nim }}</td>
                                    <td>{{ $dps->mahasiswa->nama_mahasiswa }}</td>
                                    <td>{{ $dps->dosen->nama_dosen }}</td>
                                    <td>{{ \Carbon\Carbon::parse($dps->created_at)->format('d/m/Y') }}</td>
                                    <td>

                                        @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('mahasiswa'))
                                        <a href="{{ route('admin.dps.cetak', $dps->id) }}" class="btn btn-sm btn-primary">
                                            CETAK
                                        </a>
                                        @endif

                                        @if(auth()->user()->hasRole('kaprod'))
                                            <a href="{{ route('admin.dps.edit', $dps->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $dps->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div style="text-align: center">
                            {{$dpss->links("vendor.pagination.bootstrap-4")}}
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
                        url: "/admin/dps/"+id,
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
