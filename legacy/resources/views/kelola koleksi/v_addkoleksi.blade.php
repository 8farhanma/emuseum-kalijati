@extends('admin.v_template_tables')
@section('page')
    Tambah Data Koleksi
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Koleksi</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="/koleksi/insert" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Koleksi</label>
                                <input type="text" name="nama_koleksi" class="form-control" id="exampleInputEmail1"
                                    placeholder="Masukan Nama Koleksi" value="{{ old('nama_koleksi') }}">
                                <div class="text-danger">
                                    @error('nama_koleksi')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="deskripsiKoleksi">Deskripsi Koleksi</label>
                                <textarea name="deskripsi_koleksi" class="form-control" id="deskripsiKoleksi" placeholder="Masukan Deskripsi Koleksi"
                                    rows="10">{{ old('deskripsi_koleksi') }}</textarea>
                                <div class="text-danger">
                                    @error('deskripsi_koleksi')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Foto Koleksi</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="foto_koleksi" class="custom-file-input"
                                            id="exampleInputFileFoto" onchange="updateLabelFoto(this)">
                                        <label class="custom-file-label" for="exampleInputFileFoto">Choose file</label>
                                    </div>
                                </div>
                                <br>
                                <div class="text-danger">
                                    @error('foto_koleksi')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <script>
                                function updateLabelFoto(input) {
                                    var fileName = input.files[0].name;
                                    $(input).next('.custom-file-label').html(fileName);
                                }
                            </script>

                            <div class="form-group">
                                <label for="qrCodeInput">URL Koleksi</label>
                                <input type="text" name="url_koleksi" class="form-control" id="qrCodeInput"
                                    placeholder="Masukan URL Koleksi" value="{{ old('url_koleksi') }}">
                                <div class="text-danger">
                                    @error('url_koleksi')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Insert</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
