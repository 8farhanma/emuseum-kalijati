@section('title')
    Koleksi
@endsection
@extends('admin/v_template_tables')
@section('page')
    Detail Data Koleksi
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Detail Data Koleksi</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">ID Koleksi :</label>
                    {{ $koleksi->id_koleksi }}
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nama Koleksi :</label>
                    {{ $koleksi->nama_koleksi }}
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Deskripsi Koleksi :</label>
                    {{ $koleksi->deskripsi_koleksi }}
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Foto Koleksi :</label>
                    <img src="{{ url('foto_koleksi/' . $koleksi->foto_koleksi) }}" width= "200px" />
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">QR Code Koleksi :</label>
                    <img src="{{ url('qr_code_koleksi/' . $koleksi->qr_code_koleksi) }}" width= "200px" />
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <a href="/koleksi"><button type="button" class="btn btn-primary">Kembali</button></a>
            </div>
        </form>
    </div>
@endsection
