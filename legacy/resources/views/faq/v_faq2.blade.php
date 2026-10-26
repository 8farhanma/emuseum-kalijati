@extends('admin.v_template_tables')
@section('page')
    Kelola FAQ
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
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data FAQ</h6>
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
                        {{-- <div align="right">
                            <a href="/faq/add" class="btn btn-sm btn-primary">Tambah Data</a><br>
                        </div> --}}
                        <thead>
                            <tr>
                                <th>No</th>
                                {{-- <th>ID FAQ</th> --}}
                                <th>Pertanyaan</th>
                                <th>Jawaban</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faq as $key => $data)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    {{-- <td>{{ $data->id_faq }}</td> --}}
                                    <td>{{ $data->pertanyaan }}</td>
                                    <td>{{ $data->jawaban }}</td>
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

                                        <a href="/faq/detail/{{ $data->id_faq }}" class="btn btn-sm btn-success">Detail</a>
                                        <a href="/faq/edit/{{ $data->id_faq }}" class="btn btn-sm btn-warning">Edit</a>
                                        {{-- <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#delete{{ $data->id_faq }}">
                                            Delete
                                        </button> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @foreach ($faq as $data)
                        <div class="modal fade" id="delete{{ $data->id_faq }}">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content bg-danger">
                                    <div class="modal-header">
                                        <h6 class="modal-title">{{ $data->pertanyaan }}</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah anda ingin menghapus data ini ?</p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <a href="/faq/delete/{{ $data->id_faq }}" class="btn btn-outline-light">Yes</a>
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
