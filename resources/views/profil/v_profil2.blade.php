@extends('admin.v_template_tables')
@section('page')
    Kelola Profil Museum
@endsection
@section('content')
    <div class="container-fluid">


        <!-- DataTalbes Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Profil Museum</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        @if (session('pesan'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-check"></i> Berhasil! </h5>
                                {{ session('pesan') }}
                            </div>
                        @endif
                        <thead>
                            <tr>
                                <th>Sejarah</th>
                                <th>Visi</th>
                                <th>Misi</th>
                                <th style="width: 8%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($profil as $key => $data)
                                <tr>
                                    <td>{{ $data->sejarah }}</td>
                                    <td>{{ $data->visi }}</td>
                                    <td>{{ $data->misi }}</td>
                                    </td>
                                    <td style="width: 8%">
                                        <a href="/profil/edit/{{ $data->id_profil }}" class="btn btn-sm btn-warning">Edit
                                            Data</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    @endsection
