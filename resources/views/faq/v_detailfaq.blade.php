@section('title')
    FAQ
@endsection
@extends('admin/v_template_tables')
@section('page')
    Detail Data FAQ
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Detail Data FAQ</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">ID FAQ :</label>
                    {{ $faq->id_faq }}
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Pertanyaan :</label>
                    {{ $faq->pertanyaan }}
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Jawaban :</label>
                    {{ $faq->jawaban }}
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <a href="/faq"><button type="button" class="btn btn-primary">Kembali</button></a>
            </div>
        </form>
    </div>
@endsection
