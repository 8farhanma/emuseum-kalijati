@section('title')
    Koleksi
@endsection
@extends('admin.v_template_tables')
@section('page')
    Edit Data Koleksi
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Edit</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="/koleksi/update/{{ $koleksi->id_koleksi }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">ID Koleksi</label>
                                <input type="text" name="id_koleksi" class ="form-control" id ="exampleInputEmail1"
                                    placeholder = "Masukan ID Koleksi " value="{{ $koleksi->id_koleksi }}" readonly>
                                <div class="text-danger">
                                    @error('id_koleksi')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Koleksi</label>
                                <input type="text" name="nama_koleksi" class ="form-control" id ="exampleInputEmail1"
                                    placeholder = "Masukan Nama Koleksi" value="{{ $koleksi->nama_koleksi }}">
                                <div class="text-danger">
                                    @error('nama_koleksi')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="deskripsiKoleksi">Deskripsi Koleksi</label>
                                <textarea name="deskripsi_koleksi" class="form-control" id="deskripsiKoleksi" placeholder="Masukan Deskripsi Koleksi"
                                    rows="10">{{ $koleksi->deskripsi_koleksi }}</textarea>
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
                                <img src="{{ url('foto_koleksi/' . $koleksi->foto_koleksi) }}" width="100px">
                                <input type="hidden" name="foto_koleksi" value="{{ $koleksi->foto_koleksi }}">
                            </div>
                            <script>
                                // Update initial value for the file input field
                                document.addEventListener('DOMContentLoaded', function() {
                                    var fileName = "{{ $koleksi->foto_koleksi }}";
                                    var fileExtension = fileName.split('.').pop().toLowerCase();
                                    var allowedExtensions = ['jpg', 'jpeg', 'png'];
                                    var label = document.querySelector('.custom-file-label');
                                    if (fileName && allowedExtensions.includes(fileExtension)) {
                                        label.innerHTML = fileName;
                                    } else {
                                        label.innerHTML = "default.jpg";
                                    }
                                });

                                function updateLabelFoto(input) {
                                    var fileName = input.files[0].name;
                                    $(input).next('.custom-file-label').html(fileName);
                                }
                            </script>
                            <div class="form-group">
                                <label for="qrCodeInput">URL Koleksi</label>
                                <input type="text" name="url_koleksi" class="form-control" id="qrCodeInput"
                                    placeholder="Masukan URL koleksi baru" value="{{ $koleksi->url_koleksi }}">
                                <div class="text-danger">
                                    @error('url_koleksi')
                                        {{ $message }}
                                    @enderror
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                            </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
