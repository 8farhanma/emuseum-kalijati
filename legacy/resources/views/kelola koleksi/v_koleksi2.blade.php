@extends('admin.v_template_tables')
@section('page')
    Kelola Koleksi
@endsection
@section('content')
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Koleksi</h6>
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
                            <a href="/koleksi/add" class="btn btn-sm btn-primary">Tambah Data <i
                                    class="fas fa-plus"></i></a><br>
                        </div>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Koleksi</th>
                                <th>Nama Koleksi</th>
                                <th>Deskripsi Koleksi</th>
                                <th>Foto Koleksi</th>
                                <th>QR Code Koleksi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($koleksi as $key => $data)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $data->id_koleksi }}</td>
                                    <td>{{ $data->nama_koleksi }}</td>
                                    <td>{{ $data->deskripsi_koleksi }}</td>
                                    <td><img src="{{ asset('foto_koleksi/' . $data->foto_koleksi) }}" width="100px"></td>
                                    <td><img src="{{ asset('qr_code_koleksi/' . $data->qr_code_koleksi) }}" width="100px">
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

                                        <a href="/koleksi/detail/{{ $data->id_koleksi }}"
                                            class="btn btn-sm btn-success">Detail</a>
                                        <a href="/koleksi/edit/{{ $data->id_koleksi }}"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#delete{{ $data->id_koleksi }}">
                                            Delete
                                        </button>
                                        <a href="/koleksi/cetak/{{ $data->id_koleksi }}"
                                            class="btn btn-sm btn-secondary">Cetak QR</a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @foreach ($koleksi as $data)
                        <div class="modal fade" id="delete{{ $data->id_koleksi }}">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content bg-danger">
                                    <div class="modal-header">
                                        <h6 class="modal-title text-white">{{ $data->nama_koleksi }}</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true" class="text-white">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-white">
                                        <p>Apakah anda ingin menghapus data ini ?</p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <a href="/koleksi/delete/{{ $data->id_koleksi }}"
                                            class="btn btn-outline-light">Ya</a>
                                        <button type="button" class="btn btn-outline-light"
                                            data-dismiss="modal">Tidak</button>
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
