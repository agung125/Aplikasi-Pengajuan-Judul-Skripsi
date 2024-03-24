<!-- Modal Body -->
<div class="modal-body">
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">NIM</th>D
                    <th scope="col">NAMA MAHASISWA</th>
                    <th scope="col">DOSEN PEMBIMBING AKADEMIK</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">FILE</th>
                    <th scope="col">TANGGAL PENGAJUAN</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$skripsi->mahasiswa->nim}}</td>
                    <td>{{$skripsi->mahasiswa->nama_mahasiswa}}</td>
                    <td>{{$skripsi->dosen->nama_dosen}}</td>
                    <td>{{$skripsi->mahasiswa->status}}</td>
                    <td>{{$skripsi->file}}</td>
                    <td>{{ \Carbon\Carbon::parse($skripsi->created_at)->format('d-M-Y H:i:s') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="info-pemberitahuan">
        <table class="table table-bordered">

        </table>
    </div>
</div>

<style>
    /* Gaya untuk tabel */
    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }

    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
        background-color: #f8f9fa;
    }

    .table tbody+tbody {
        border-top: 2px solid #dee2e6;
    }

    /* Gaya untuk teks pemberitahuan */
    .info-pemberitahuan {
        margin-top: 20px;
    }

    .info-pemberitahuan .table {
        margin-bottom: 0;
    }

    .info-pemberitahuan .table td {
        padding: 10px;
    }

    .info-pemberitahuan .text-primary {
        color: blue;
        font-weight: bold;
    }

    .info-pemberitahuan .text-success {
        color: green;
        font-weight: bold;
    }
</style>
