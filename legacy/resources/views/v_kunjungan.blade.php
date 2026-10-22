@extends('template')
@section('content')
    <header class="s-header" style="background-color : #161616">

        <div class="row s-header__inner">

            <div class="s-header__block">
                <div class="s-header__logo">
                    <a class="logo">
                        <img src="{{ asset('WT-Museum') }}/images/logo/13.png" alt="Homepage" style="width: 80px">
                    </a>
                </div>

                <a class="s-header__menu-toggle" href="#0"><span>Menu</span></a>
            </div> <!-- end s-header__block -->

            <nav class="s-header__nav">

                <ul class="s-header__menu-links">
                    <li><a href="{{ route('home') }}">BERANDA</a></li>
                    <li><a href="{{ route('about') }}">TENTANG</a></li>
                    <li><a href="{{ route('v_koleksi') }}">KOLEKSI</a></li>
                    <li><a href="{{ route('v_publikasi') }}">PUBLIKASI</a></li>
                    <li><a href="{{ route('review') }}">ULASAN</a></li>
                    <li class="current"><a href="{{ route('isiankunjungan') }}">KUNJUNGAN</a></li>
                    <li><a href="{{ route('v_faq') }}">FAQ</a></li>
                </ul> <!-- s-header__menu-links -->

                <ul class="s-header__social">
                    <li>
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                style="fill:rgba(0, 0, 0, 1);transform:;-ms-filter:">
                                <path
                                    d="M20,3H4C3.447,3,3,3.448,3,4v16c0,0.552,0.447,1,1,1h8.615v-6.96h-2.338v-2.725h2.338v-2c0-2.325,1.42-3.592,3.5-3.592 c0.699-0.002,1.399,0.034,2.095,0.107v2.42h-1.435c-1.128,0-1.348,0.538-1.348,1.325v1.735h2.697l-0.35,2.725h-2.348V21H20 c0.553,0,1-0.448,1-1V4C21,3.448,20.553,3,20,3z">
                                </path>
                            </svg>
                            <span class="u-screen-reader-text">Facebook</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                style="fill:rgba(0, 0, 0, 1);transform:;-ms-filter:">
                                <path
                                    d="M19.633,7.997c0.013,0.175,0.013,0.349,0.013,0.523c0,5.325-4.053,11.461-11.46,11.461c-2.282,0-4.402-0.661-6.186-1.809 c0.324,0.037,0.636,0.05,0.973,0.05c1.883,0,3.616-0.636,5.001-1.721c-1.771-0.037-3.255-1.197-3.767-2.793 c0.249,0.037,0.499,0.062,0.761,0.062c0.361,0,0.724-0.05,1.061-0.137c-1.847-0.374-3.23-1.995-3.23-3.953v-0.05 c0.537,0.299,1.16,0.486,1.82,0.511C3.534,9.419,2.823,8.184,2.823,6.787c0-0.748,0.199-1.434,0.548-2.032 c1.983,2.443,4.964,4.04,8.306,4.215c-0.062-0.3-0.1-0.611-0.1-0.923c0-2.22,1.796-4.028,4.028-4.028 c1.16,0,2.207,0.486,2.943,1.272c0.91-0.175,1.782-0.512,2.556-0.973c-0.299,0.935-0.936,1.721-1.771,2.22 c0.811-0.088,1.597-0.312,2.319-0.624C21.104,6.712,20.419,7.423,19.633,7.997z">
                                </path>
                            </svg>
                            <span class="u-screen-reader-text">Twitter</span>
                        </a>
                    </li>
                    <li>
                        <a
                            href="https://www.instagram.com/museumrumahsejarah?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                style="fill:rgba(0, 0, 0, 1);transform:;-ms-filter:">
                                <path
                                    d="M11.999,7.377c-2.554,0-4.623,2.07-4.623,4.623c0,2.554,2.069,4.624,4.623,4.624c2.552,0,4.623-2.07,4.623-4.624 C16.622,9.447,14.551,7.377,11.999,7.377L11.999,7.377z M11.999,15.004c-1.659,0-3.004-1.345-3.004-3.003 c0-1.659,1.345-3.003,3.004-3.003s3.002,1.344,3.002,3.003C15.001,13.659,13.658,15.004,11.999,15.004L11.999,15.004z">
                                </path>
                                <circle cx="16.806" cy="7.207" r="1.078"></circle>
                                <path
                                    d="M20.533,6.111c-0.469-1.209-1.424-2.165-2.633-2.632c-0.699-0.263-1.438-0.404-2.186-0.42 c-0.963-0.042-1.268-0.054-3.71-0.054s-2.755,0-3.71,0.054C7.548,3.074,6.809,3.215,6.11,3.479C4.9,3.946,3.945,4.902,3.477,6.111 c-0.263,0.7-0.404,1.438-0.419,2.186c-0.043,0.962-0.056,1.267-0.056,3.71c0,2.442,0,2.753,0.056,3.71 c0.015,0.748,0.156,1.486,0.419,2.187c0.469,1.208,1.424,2.164,2.634,2.632c0.696,0.272,1.435,0.426,2.185,0.45 c0.963,0.042,1.268,0.055,3.71,0.055s2.755,0,3.71-0.055c0.747-0.015,1.486-0.157,2.186-0.419c1.209-0.469,2.164-1.424,2.633-2.633 c0.263-0.7,0.404-1.438,0.419-2.186c0.043-0.962,0.056-1.267,0.056-3.71s0-2.753-0.056-3.71C20.941,7.57,20.801,6.819,20.533,6.111z M19.315,15.643c-0.007,0.576-0.111,1.147-0.311,1.688c-0.305,0.787-0.926,1.409-1.712,1.711c-0.535,0.199-1.099,0.303-1.67,0.311 c-0.95,0.044-1.218,0.055-3.654,0.055c-2.438,0-2.687,0-3.655-0.055c-0.569-0.007-1.135-0.112-1.669-0.311 c-0.789-0.301-1.414-0.923-1.719-1.711c-0.196-0.534-0.302-1.099-0.311-1.669c-0.043-0.95-0.053-1.218-0.053-3.654 c0-2.437,0-2.686,0.053-3.655c0.007-0.576,0.111-1.146,0.311-1.687c0.305-0.789,0.93-1.41,1.719-1.712 c0.534-0.198,1.1-0.303,1.669-0.311c0.951-0.043,1.218-0.055,3.655-0.055c2.437,0,2.687,0,3.654,0.055 c0.571,0.007,1.135,0.112,1.67,0.311c0.786,0.303,1.407,0.925,1.712,1.712c0.196,0.534,0.302,1.099,0.311,1.669 c0.043,0.951,0.054,1.218,0.054,3.655c0,2.436,0,2.698-0.043,3.654H19.315z">
                                </path>
                            </svg>
                            <span class="u-screen-reader-text">Instagram</span>
                        </a>
                    </li>
                </ul> <!-- s-header__social -->

            </nav> <!-- end s-header__nav -->

        </div> <!-- end s-header__inner -->

    </header>
    <section class="container-fluid" style="margin-top: 100px">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h1 class="column lg-12 section-header__pretitle pretitle text-pretitle" style="font-size: 24px;">
                            Isian Daftar Kunjungan</h1>
                    </div>
                    <!-- /.card-header -->
                    @if (session('pesan'))
                        <div class="alert alert-success alert-dismissible"
                            style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999; background-color: #dff0d8; color: #155724; width: 30%; text-align: center;">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i> Berhasil! </h5>
                            {{ session('pesan') }}
                        </div>
                    @endif

                    <!-- form start -->
                    <form action="{{ route('isiankunjungan.post') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="form-group">
                                <label for="tanggal_kunjungan">Tanggal Kunjungan</label>
                                <input type="date" name="tanggal_kunjungan" class="form-control wide-input"
                                    id="tanggal_kunjungan" placeholder="YYYY-MM-DD"
                                    value="{{ old('tanggal_kunjungan', date('Y-m-d')) }}">
                                <div class="text-danger">
                                    @error('tanggal_kunjungan')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kategori_pengunjung">Kategori Pengunjung</label>
                                <select name="kategori_pengunjung" class="form-control wide-input" id="kategori_pengunjung">
                                    <option value="">Pilih Kategori Pengunjung</option>
                                    <option value="individu"
                                        {{ old('kategori_pengunjung') == 'individu' ? 'selected' : '' }}>Individu</option>
                                    <option value="kelompok"
                                        {{ old('kategori_pengunjung') == 'kelompok' ? 'selected' : '' }}>Kelompok
                                    </option>
                                </select>
                                <div class="text-danger">
                                    @error('kategori_pengunjung')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div id="formIndividu" style="display: none;">
                                <div class="form-group">
                                    <label for="nama_pengunjung">Nama Lengkap</label>
                                    <input type="text" name="nama_pengunjung" class="form-control wide-input"
                                        id="nama_pengunjung" placeholder="Masukkan Nama Lengkap"
                                        value="{{ old('nama_pengunjung') }}">
                                    <div class="text-danger">
                                        @error('nama_pengunjung')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" name="alamat" class="form-control wide-input" id="alamat"
                                        placeholder="Masukkan Alamat" value="{{ old('alamat') }}">
                                    <div class="text-danger">
                                        @error('alamat')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="pekerjaan">Pekerjaan</label>
                                    <input type="text" name="pekerjaan" class="form-control wide-input"
                                        id="pekerjaan" placeholder="Masukkan Pekerjaan" value="{{ old('pekerjaan') }}">
                                    <div class="text-danger">
                                        @error('pekerjaan')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alasan_kunjungan">Alasan Kunjungan</label>
                                    <input type="text" name="alasan_kunjungan" class="form-control wide-input"
                                        id="alasan_kunjungan" placeholder="Masukkan Alasan Kunjungan"
                                        value="{{ old('alasan_kunjungan') }}">
                                    <div class="text-danger">
                                        @error('alasan_kunjungan')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Tambahkan elemen form tersembunyi untuk Rombongan -->
                            <div id="formRombongan" style="display: none;">
                                <div class="form-group">
                                    <label for="nama_ketua">Nama Ketua Rombongan</label>
                                    <input type="text" name="nama_ketua" class="form-control wide-input"
                                        id="nama_ketua" placeholder="Masukkan Nama Ketua Rombongan"
                                        value="{{ old('nama_lengkap') }}">
                                    <div class="text-danger">
                                        @error('nama_lengkap')
                                            {{ $message }}
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="asal_instansi">Asal Instansi</label>
                                    <input type="text" name="asal_instansi" class="form-control wide-input"
                                        id="asal_instansi" placeholder="Masukkan Asal Instansi"
                                        value="{{ old('asal_instansi') }}">
                                    <div class="text-danger">
                                        @error('asal_instansi')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_rombongan">Jumlah Rombongan</label>
                                    <input type="number" name="jumlah_rombongan" class="form-control wide-input"
                                        id="jumlah_rombongan" placeholder="Masukkan Jumlah Rombongan"
                                        value="{{ old('jumlah_rombongan') }}">
                                    <div class="text-danger">
                                        @error('jumlah_rombongan')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alasan_kunjungan_rombongan">Alasan Kunjungan</label>
                                    <input type="text" name="alasan_kunjungan" class="form-control wide-input"
                                        id="alasan_kunjungan_rombongan" placeholder="Masukkan Alasan Kunjungan"
                                        value="{{ old('alasan_kunjungan') }}">
                                    <div class="text-danger">
                                        @error('alasan_kunjungan')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Modifikasi script untuk menangani perubahan dropdown -->
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    var kategoriPengunjung = document.getElementById('kategori_pengunjung');
                                    var formIndividu = document.getElementById('formIndividu');
                                    var formRombongan = document.getElementById('formRombongan');
                                    var alasanKunjunganIndividu = document.getElementById('alasan_kunjungan');
                                    var alasanKunjunganRombongan = document.getElementById('alasan_kunjungan_rombongan');

                                    function updateFormVisibility() {
                                        if (kategoriPengunjung.value === 'individu') {
                                            formIndividu.style.display = 'block';
                                            formRombongan.style.display = 'none';
                                            alasanKunjunganIndividu.setAttribute('name', 'alasan_kunjungan');
                                            alasanKunjunganRombongan.removeAttribute('name');
                                        } else if (kategoriPengunjung.value === 'kelompok') {
                                            formRombongan.style.display = 'block';
                                            formIndividu.style.display = 'none';
                                            alasanKunjunganRombongan.setAttribute('name', 'alasan_kunjungan');
                                            alasanKunjunganIndividu.removeAttribute('name');
                                        } else {
                                            formIndividu.style.display = 'none';
                                            formRombongan.style.display = 'none';
                                            alasanKunjunganIndividu.removeAttribute('name');
                                            alasanKunjunganRombongan.removeAttribute('name');
                                        }
                                    }

                                    kategoriPengunjung.addEventListener('change', updateFormVisibility);

                                    // Memanggil fungsi saat halaman dimuat untuk mengatur tampilan form dan atribut name sesuai dengan pilihan yang mungkin sudah disimpan sebelumnya
                                    updateFormVisibility();
                                });
                            </script>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
@endsection
