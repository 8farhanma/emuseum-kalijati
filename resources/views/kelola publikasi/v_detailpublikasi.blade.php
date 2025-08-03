@section('title')
    Publikasi
@endsection
@extends('admin/v_template_tables')
@section('page')
    Detail Data Publikasi
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Detail Data Publikasi</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">ID Publikasi :</label>
                    {{ $publikasi->id_publikasi }}
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Judul Publikasi :</label>
                    {{ $publikasi->judul }}
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Tanggal Publikasi :</label>
                    {{ $publikasi->tanggal_publikasi }}
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Isi Publikasi :</label>
                    {{ $publikasi->isi_publikasi }}
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Foto Publikasi :</label>
                    <img src="{{ url('foto_publikasi/' . $publikasi->gambar) }}" width= "200px" />
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Kategori Publikasi :</label>
                    {{ $publikasi->kategori }}
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <a href="/publikasi"><button type="button" class="btn btn-primary">Kembali</button></a>
            </div>
        </form>
    </div>
@endsection
