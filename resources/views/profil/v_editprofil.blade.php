@section('title')
    Profil
@endsection
@extends('admin.v_template_tables')
@section('page')
    Edit Data Profil Museum
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Profil Museum</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="/profil/update/{{ $profil->id_profil }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body d-flex">
                            <div class="form-group mr-4" style="width: 40%;">
                                <label for="sejarahArea">Sejarah</label>
                                <textarea name="sejarah" class="form-control" id="sejarahArea" rows="20" placeholder="Masukan sejarah museum">{{ $profil->sejarah }}</textarea>
                                <div class="text-danger">
                                    @error('sejarah')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mr-4" style="width: 30%;">
                                <label for="visiArea">Visi</label>
                                <textarea name="visi" class="form-control" id="visiArea" rows="20" placeholder="Masukan visi museum">{{ $profil->visi }}</textarea>
                                <div class="text-danger">
                                    @error('visi')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mr-4" style="width: 30%;">
                                <label for="misiArea">Misi</label>
                                <textarea name="misi" class="form-control" id="misiArea" rows="20" placeholder="Masukan misi museum">{{ $profil->misi }}</textarea>
                                <div class="text-danger">
                                    @error('misi')
                                        {{ $message }}
                                    @enderror
                                </div>
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
