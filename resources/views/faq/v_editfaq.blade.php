@section('title')
    FAQ
@endsection
@extends('admin.v_template_tables')
@section('page')
    Edit Data FAQ
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
                    <form action="/faq/update/{{ $faq->id_faq }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">ID FAQ</label>
                                <input type="text" name="id_faq" class ="form-control" id ="exampleInputEmail1"
                                    placeholder = "Masukan ID FAQ " value="{{ $faq->id_faq }}" readonly>
                                <div class="text-danger">
                                    @error('id_faq')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Pertanyaan</label>
                                <input type="text" name="pertanyaan" class ="form-control" id ="exampleInputEmail1"
                                    placeholder = "Masukan Pertanyaan" value="{{ $faq->pertanyaan }}">
                                <div class="text-danger">
                                    @error('pertanyaan')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jawabanArea">Jawaban</label>
                                <textarea name="jawaban" class="form-control" id="jawabanArea" rows="10" placeholder="Masukan jawaban">{{ $faq->jawaban }}</textarea>
                                <div class="text-danger">
                                    @error('jawaban')
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
