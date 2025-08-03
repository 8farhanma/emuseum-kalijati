@section('title')
    Publikasi
@endsection
@extends('admin.v_template_tables')
@section('page')
    Edit Data Publikasi
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
                    <form action="/publikasi/update/{{ $publikasi->id_publikasi }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kategori Publikasi</label>
                                <select name="kategori" class="form-control" id="kategoriPublikasi"
                                    value="{{ $publikasi->kategori }}">
                                    <option value="Artikel" {{ $publikasi->kategori == 'Artikel' ? 'selected' : '' }}>
                                        Artikel</option>
                                    <option value="Berita" {{ $publikasi->kategori == 'Berita' ? 'selected' : '' }}>Berita
                                    </option>
                                </select>
                                <div class="text-danger">
                                    @error('kategori')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Judul Publikasi</label>
                                <input type="text" name="judul" class ="form-control" id ="exampleInputEmail1"
                                    placeholder = "Masukan Judul Publikasi" value="{{ $publikasi->judul }}">
                                <div class="text-danger">
                                    @error('judul')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tanggal Publikasi</label>
                                <input type="date" name="tanggal_publikasi" class="form-control" id="tanggalPublikasi"
                                    value="{{ $publikasi->tanggal_publikasi ?: date('Y-m-d') }}">
                                <div class="text-danger">
                                    @error('tanggal_publikasi')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="isiPublikasiArea">Isi Publikasi</label>
                                <textarea name="isi_publikasi" class="form-control" id="isiPublikasiArea" rows="10"
                                    placeholder="Masukan Isi Publikasi">{{ $publikasi->isi_publikasi }}</textarea>
                                <div class="text-danger">
                                    @error('isi_publikasi')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Foto Publikasi</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="gambar" class ="custom-file-input"
                                            id ="exampleInputFile" onchange="updateLabelFoto(this)">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    {{-- <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div> --}}
                                    <br>
                                    <div class="text-danger">
                                        @error('gambar')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                    <script>
                                        function updateLabelFoto(input) {
                                            var fileName = input.files[0].name;
                                            $(input).next('.custom-file-label').html(fileName);
                                        }
                                    </script>
                                </div>
                                <img src="{{ url('foto_publikasi/' . $publikasi->gambar) }}" width="100px">
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
