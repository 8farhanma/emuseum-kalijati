@extends('admin.v_template_tables')
@section('page')
    Kelola Publikasi
@endsection
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        {{-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
                DataTables documentation</a>.</p> --}}

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Publikasi</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        @if (session('pesan'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-check"></i> Berhasil! </h5>
                                {{ session('pesan') }}
                            </div>
                        @endif
                        <div align="right">
                            <a href="/publikasi/add" class="btn btn-sm btn-primary">Tambah Data <i class="fas fa-plus"></i>
                            </a><br>
                        </div>
                        <thead>
                            <tr>
                                <th>No</th>
                                {{-- <th>ID Publikasi</th> --}}
                                <th>Judul Publikasi</th>
                                <th>Tanggal Publikasi</th>
                                <th>Isi Publikasi</th>
                                <th>Foto Publikasi</th>
                                <th>Kategori Publikasi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($publikasi as $key => $data)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    {{-- <td>{{ $data->id_publikasi }}</td> --}}
                                    <td>{{ $data->judul }}</td>
                                    <td>{{ $data->tanggal_publikasi }}</td>
                                    <td>{{ $data->isi_publikasi }}</td>
                                    <td><img src="{{ asset('foto_publikasi/' . $data->gambar) }}" width="300px"></td>
                                    <td>{{ $data->kategori }}</td>
                                    </td>
                                    <td>
                                        {{-- <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Dropdown button
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Action</a></li>
                                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            </ul>
                                        </div> --}}

                                        <a href="/publikasi/detail/{{ $data->id_publikasi }}"
                                            class="btn btn-sm btn-success">Detail</a>
                                        <a href="/publikasi/edit/{{ $data->id_publikasi }}" class="btn btn-sm btn-warning">
                                            <i class="fa-solid fa-file-pen"></i> Edit
                                        </a>
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#delete{{ $data->id_publikasi }}">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @foreach ($publikasi as $data)
                        <div class="modal fade" id="delete{{ $data->id_publikasi }}">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content bg-danger text-white">
                                    <div class="modal-header">
                                        <h6 class="modal-title">{{ $data->judul }}</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah anda ingin menghapus data ini ?</p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <a href="/publikasi/delete/{{ $data->id_publikasi }}"
                                            class="btn btn-outline-light">Yes</a>
                                        <button type="button" class="btn btn-outline-light"
                                            data-dismiss="modal">No</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    @endforeach

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    @endsection
