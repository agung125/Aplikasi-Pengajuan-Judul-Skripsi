<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pembimbing Skripsi</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 0;
        }

        .btn {
            border-radius: 3px;
            margin-right: 10px;
        }

        table {
            width: 100%;
        }

        th,
        td {
            text-align: center;
        }

        th {
            background-color: #84B0CA;
            color: white;
        }

        td {
            vertical-align: middle;
        }

        .bold-text {
            font-weight: bold;
            color: #5d9fc5;
        }

        .text-muted {
            color: #7e8d9f;
        }

        .text-primary {
            color: #007bff;
        }

        .text-danger {
            color: #dc3545;
        }

        .btn-primary {
            background-color: #60bdf3;
            border-color: #60bdf3;
        }

        .btn-primary:hover {
            background-color: #4aa0d5;
            border-color: #4aa0d5;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="mb-5 mt-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <p style="color: #7e8d9f;font-size: 20px;">Mahasiswa >> <strong>NIM: #{{$dps->mahasiswa->nim}}</strong></p>
                        </div>
                        <div class="col-3 text-end">
                            <a class="btn btn-light text-capitalize border-0 print-button" data-mdb-ripple-color="dark"><i
                                    class="fas fa-print text-primary"></i> Print</a>
                        </div>
                    </div>
                    <hr>
                </div>

                <div class="text-center">
                    <i class="bold-text">Daftar Pembimbing Skripsi</i>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <ul class="list-unstyled">
                            <li class="text-muted">Kepada : <span style="color:#5d9fc5 ;">{{$dps->dosen->nama_dosen}}</span></li>
                            <li class="text-muted">Politeknik</li>
                            <li class="text-muted">Harapan Bersama</li>
                            <li class="text-muted"><i class="fas fa-phone"></i> 123-456-789</li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <p class="text-muted">Tanggal</p>
                        <ul class="list-unstyled">
                            <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                    class="fw-bold">ID:</span>#123-456</li>
                            <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                    class="fw-bold">Tanggal Di Buat: </span>{{ \Carbon\Carbon::parse($dps->created_at)->format('d F Y') }}</li>
                            <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                    class="me-1 fw-bold">Status:</span><span
                                    class="badge bg-warning text-black fw-bold">
                                    DPA</span></li>
                        </ul>
                    </div>
                </div>

                <div class="my-2 mx-1 justify-content-center">
                    <table class="table table-striped table-borderless">
                        <thead style="background-color:#84B0CA ;" class="text-white">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Mahasiswa</th>
                                <th scope="col">Judul Skripsi</th>
                                <th scope="col">Dosen Pembimbing Skripsi</th>
                                <th scope="col">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>{{$dps->mahasiswa->nama_mahasiswa}}</td>
                                <td>{{$dps->judul_skripsi}}</td>
                                <td>{{$dps->dosen->nama_dosen}}</td>
                                <td>{{ \Carbon\Carbon::parse($dps->created_at)->format('d F Y') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <p class="ms-3"></p>
                    </div>
                    <div class="col-md-4">
                        <p class="text-muted">Kaprodi</p>
                        <p class="text-muted">{{$user->name}}</p>
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-10">
                            <p>TTD Admin Politeknik Harapan Bersama</p>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-primary text-capitalize"
                                style="background-color:#4c00a9 ;"></button>
                        </div>
                    </div>
                    </div>
                    </div>
                    </div>

                    <script>
                        const printButton = document.querySelector('.print-button');

                        printButton.addEventListener('click', () => {
                            window.print();
                        });
                    </script>
                    </body>

                    </html>

