@extends('layouts.app')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pengajuan Skripsi</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-journal-whills"></i> Pengajuan Skripsi</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.skripsi.index') }}" method="GET">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                @can('skripsis.create')
                                    <div class="input-group-prepend">
                                        <a href="{{ route('admin.skripsi.create') }}" class="btn btn-primary" style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> TAMBAH</a>
                                    </div>
                                @endcan
                                <input type="date" class="form-control" name="q"
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
                                <th scope="col">JUDUL SKRIPSI</th>
                                <th scope="col">FILE</th>

                                <th scope="col">PEMBERITAHUAN</th>
                                <th scope="col"></th>
                                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('mahasiswa'))
                                <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                                @endif
                                @if(auth()->user()->hasRole('kaprod'))
                                <th scope="col"></th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($skripsis as $no => $skripsi)
                                @if(auth()->user()->hasRole('admin') || (auth()->user()->hasRole('mahasiswa') && $skripsi->mahasiswa_id == auth()->user()->user_id) || (auth()->user()->hasRole('dosen') && $skripsi->dosen_id == auth()->user()->user_id) || (auth()->user()->hasRole('sekprod') && $skripsi->user_approve_1_id != null) || (auth()->user()->hasRole('kaprod') && $skripsi->user_approve_2_id != null))
                                        <tr>
                                        <th scope="row" style="text-align: center">{{ ++$no + ($skripsis->currentPage()-1) * $skripsis->perPage() }}</th>
                                        <td class="text-center"> {{$skripsi->mahasiswa->nim}}</td>
                                        <td class="text-center"> {{$skripsi->mahasiswa->nama_mahasiswa}}</td>
                                        <td class="text-center"> {{$skripsi->judul_skripsi}}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-sm btn-primary" onclick="downloadFile('{{ route('admin.skripsi.download', ['file' => $skripsi->file]) }}')">Download File</button>
                                        </td>
                                        <td>
                                            @if ($skripsi->invoice)
                                                <button type="button" >{{$skripsi->invoice}}</button>
                                            @else
                                                <button type="button" class="btn btn-sm btn-warning">Belum Ada Pemberitahuan</button>
                                            @endif
                                        </td>

                                        <td>
                                            <button type="button" class="btn btn-primary open-modal" data-toggle="modal" data-target="#myModal" data-id="{{ $skripsi->id }}">
                                                Lihat
                                            </button>
                                        </td>


                                        @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('mahasiswa'))

                                        <td class="text-center">
                                            @can('skripsis.edit')
                                                <a href="{{ route('admin.skripsi.edit', $skripsi->id) }}" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                            @endcan

                                            @can('skripsis.delete')
                                                <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $skripsi->id }}">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            @endcan
                                            @endif
                                        </td>
                                        <td>
                                            <td>
                                                @if(auth()->user()->hasRole('kaprod'))
                                                <button type="button" class="btn btn-success open-modal2" data-id="{{ $skripsi->id }}">
                                                    Tambah DPS
                                                </button>
                                                @endif
                                            </td>

                                     </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                        <div style="text-align: center">
                            {{$skripsis->links("vendor.pagination.bootstrap-4")}}
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </section>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Judul Skripsi ({{$skripsi->judul_skripsi}})</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    @if(auth()->user()->hasRole('dosen') && $skripsi->dosen_id == auth()->user()->user_id)
                        <form action="{{ route('admin.setujui.dosen', $skripsi->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-success">Setujui</button>
                        </form>
                        <form action="{{ route('admin.tolak.dosen', $skripsi->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger">Tolak</button>
                        </form>
                    @endif
                    @if(auth()->user()->hasRole('sekprod') && $skripsi->sekprod_id == auth()->user()->id)
                         <form action="{{ route('admin.setujui.sekpro', $skripsi->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-success">Setujui</button>
                        </form>
                        <form action="{{ route('admin.tolak.sekpro', $skripsi->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger">Tolak</button>
                        </form>
                    @endif
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Close Modal --}}

    {{-- Modal 2 --}}
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Tambah Dosen Pembimbing Skripsi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Close Modal --}}


</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Script JavaScript -->
<!-- JavaScript to handle modal and AJAX request -->
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
                        url: "/admin/skripsi/"+id,
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


<script>
    function downloadFile(fileUrl) {
        fetch(fileUrl)
            .then(response => response.blob())
            .then(blob => {
                const url = window.URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.style.display = 'none';
                a.href = url;
                a.download = '{{$skripsi->file}}';
                document.body.appendChild(a);
                a.click();
                window.URL.revokeObjectURL(url);
                document.body.removeChild(a);
            })
            .catch(error => console.error('Error downloading file:', error));
    }
</script>


<script>
    $(document).ready(function() {
        $('.open-modal').on('click', function() {
            var id = $(this).data('id');


            $.ajax({
                url: "/admin/show/"+id,
                type: 'GET',
                success: function(response) {
                    $('#myModal .modal-body').html(response);
                    $('#myModal').modal('show');
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>


<script>
    $(document).ready(function() {
        $('.open-modal2').on('click', function() {
            var id = $(this).data('id');

            $.ajax({
                url: "/admin/dps/show/" + id,
                type: 'GET',
                success: function(response) {
                    $('#myModal2 .modal-body').html(response);
                    $('#myModal2').modal('show');
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>

@stop
