@extends('template')
@section('content')
    <section style="margin-left: 150px; margin-top: 60px;">
        <h1 class="column lg-12 section-header__pretitle pretitle text-pretitle" style="font-size: 24px;">
            Tambahkan Ulasan Baru</h1>

        @if ($errors->any())
            <div>
                <strong>Whoops!</strong> Ada beberapa masalah dengan inputan Anda.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <form action="{{ route('ulasan.store') }}" method="POST">
            @csrf
            <div>
                <strong>Nama :</strong>
                <input type="text" name="nama" class="form-control wide-input" value="{{ old('nama') }}">
            </div>
            <div>
                <strong>Asal Kota :</strong>
                <input type="text" name="asal_kota" class="form-control wide-input" value="{{ old('asal_kota') }}">
            </div>
            <div style="display: flex; align-items: center;">
                <div style="margin-right: 10px;">
                    <strong>Rating Pelayanan :</strong>
                    <div class="rating">
                        @for ($i = 1; $i <= 5; $i++)
                            <input type="radio" id="star_pelayanan{{ $i }}" name="rating_pelayanan"
                                value="{{ $i }}" {{ old('rating_pelayanan') == $i ? 'checked' : '' }} />
                            <label for="star_pelayanan{{ $i }}" title="{{ $i }} stars">&#9733;</label>
                        @endfor
                    </div>
                </div>
                <div style="margin-right: 10px;">
                    <strong>Rating Fasilitas :</strong>
                    <div class="rating">
                        @for ($i = 1; $i <= 5; $i++)
                            <input type="radio" id="star_fasilitas{{ $i }}" name="rating_fasilitas"
                                value="{{ $i }}" {{ old('rating_fasilitas') == $i ? 'checked' : '' }} />
                            <label for="star_fasilitas{{ $i }}"
                                title="{{ $i }} stars">&#9733;</label>
                        @endfor
                    </div>
                </div>
                <div>
                    <strong>Rating Kebersihan :</strong>
                    <div class="rating">
                        @for ($i = 1; $i <= 5; $i++)
                            <input type="radio" id="star_kebersihan{{ $i }}" name="rating_kebersihan"
                                value="{{ $i }}" {{ old('rating_kebersihan') == $i ? 'checked' : '' }} />
                            <label for="star_kebersihan{{ $i }}"
                                title="{{ $i }} stars">&#9733;</label>
                        @endfor
                    </div>
                </div>
            </div>
            <div>
                <strong>Isi Ulasan :</strong>
                <textarea name="isi_ulasan" class="form-control wide-input">{{ old('isi_ulasan') }}</textarea>
            </div>
            <br>
            <div>
                <button type="submit" style="background-color: orange;">Unggah</button>
            </div>
        </form>
    </section>
@endsection
