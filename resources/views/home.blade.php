@extends('template')
@section('content')
    {{-- # site header --}}

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
                    <li class="current"><a href="{{ route('home') }}">BERANDA</a></li>
                    <li><a href="{{ route('about') }}">TENTANG</a></li>
                    <li><a href="{{ route('v_koleksi') }}">KOLEKSI</a></li>
                    <li><a href="{{ route('v_publikasi') }}">PUBLIKASI</a></li>
                    <li><a href="{{ route('review') }}">ULASAN</a></li>
                    <li><a href="{{ route('isiankunjungan') }}">KUNJUNGAN</a></li>
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
        </div>
    </header>

    <section id="content" class="s-content">


        <!-- intro
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ----------------------------------------------- -->
        <section id="intro" class="s-intro target-section">

            <div class="row s-intro__content">

                <div class="s-intro__content-bg"></div>

                <div class="column lg-12 s-intro__content-inner">
                    <!-- Menambahkan gambar sebagai judul -->
                    <div style="position: relative;">
                        <img src="{{ asset('WT-Museum') }}/images/logo/12.png" alt="Judul Gambar"
                            style="width: 50%; height: auto; position: absolute; z-index: 1; top: 0; left: 50%; transform: translateX(-50%) translateY(-420px);">
                        <h1 class="s-intro__content-title">
                            Kami hadir dalam melaksanakan <br>
                            bimbingan edukasi dan penyebarluasan informasi <br>
                            mengenai sejarah perjanjian kalijati.
                        </h1>

                        <div class="s-intro__content-buttons">
                            <a href="#about" class="btn btn--stroke s-intro__content-btn smoothscroll">Selengkapnya</a>
                            <a href="/videos/Teaser Museum Rumah Sejarah Kalijati.mp4" class="s-intro__content-video-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                    <path d="M7 6v12l10-6z"></path>
                                </svg>
                            </a>
                        </div>

                    </div> <!-- s-intro__content-inner -->

                </div> <!-- s-intro__content -->

        </section> <!-- end s-intro -->


        <!-- about ----------------------------------------------- -->
        <section id="about" class="s-about target-section">

            <div class="row section-header" data-num="01">
                <h3 class="column lg-12 section-header__pretitle pretitle text-pretitle">Tentang Kami</h3>
                <div class="column lg-6 stack-on-1100 section-header__primary">
                    <h2 class="title text-display-1">
                        Museum Rumah Sejarah Kalijati merupakan Museum umum
                        yang terletak di Pangkalan TNI Angkatan Udara
                        (Lanud) Suryadarma, Kalijati, Subang, Jawa Barat.
                    </h2>
                </div>
                <div class="column lg-6 stack-on-1100 section-header__secondary">
                    <img src="{{ asset('WT-Museum') }}/images/Tentang/home-tentang.jpg" alt="Tentang Museum">
                </div>
                <div class="row process-list list-block show-ctr block-lg-one-half block-tab-whole">

                    <div class="column list-block__item">
                        <div class="list-block__title">
                            <h3 class="h5">Visi</h3>
                        </div>
                        <div class="list-block__text">
                            <p>
                                {{ $profil->visi }}
                            </p>
                        </div>
                    </div>
                    {{-- end list-block__item  --}}

                    <div class="column list-block__item">
                        <div class="list-block__title">
                            <h3 class="h5">Misi</h3>
                        </div>
                        <div class="list-block__text">
                            <p>
                                {{ $profil->misi }}
                            </p>
                        </div>
                    </div>
                    {{-- end list-block__item --}}
                    <div class="row visit-info" style="width: 100%;">
                        <div class="column lg-12"
                            style="display: flex; flex-direction: row; justify-content: space-between;">
                            <div class="visit-info__item">
                                <h3 class="visit-info__title">Kunjungi Rumah Sejarah Kalijati</h3>
                            </div>
                            <div class="visit-info__item">
                                <i class="fas fa-calendar"></i>
                                <span>Senin - Jumat</span>
                            </div>
                            <div class="visit-info__item">
                                <i class="fas fa-clock"></i>
                                <span>09:00 - 15:00</span>
                            </div>
                            <div class="visit-info__item">
                                <i class="fas fa-money-bill-wave"></i>
                                <span>Gratis</span>
                            </div>
                        </div>

        </section>
        <!-- end s-about -->

        <!-- portfolio
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ----------------------------------------------- -->
        <section id="folio" class="s-folio target-section">

            <div class="row section-header light-on-dark" data-num="02">
                <h3 class="column lg-12 section-header__pretitle text-pretitle">Koleksi</h3>
            </div>
            {{-- end section-header --}}

            <div id="bricks" class="row bricks">
                <div class="column lg-12 masonry">
                    <div class="bricks-wrapper" style="text-align: center;">
                        <div class="grid-sizer"></div>
                        @foreach ($koleksi as $item)
                            <article class="brick entry" data-id="{{ $item->id_koleksi }}">
                                <a href="#modal-koleksi" class="entry__link">
                                    <div class="entry__thumb" style="width: 300px; height: 300px; overflow: hidden;">
                                        <img src="{{ asset('foto_koleksi/' . $item->foto_koleksi) }}"
                                            alt="{{ $item->nama_koleksi }}"
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                    <div class="entry__info">
                                        <h4 class="entry__title">{{ $item->nama_koleksi }}</h4>
                                    </div>
                                </a>
                            </article>
                        @endforeach
                    </div> <!-- end masonry -->
                </div> <!-- end bricks -->
                <div id="modal-koleksi" class="modal-popup" hidden>
                    <img id="modal-img" src="" alt="Koleksi">
                    <div class="modal-popup__desc">
                        <h5 id="modal-title"></h5>
                        <p id="modal-desc"></p>
                    </div>
                    <div class="modal-overlay"></div>
                </div>
        </section> <!-- end s-folio -->
        <section id="publikasi-preview" class="s-publikasi-preview target-section">
            <div class="row section-header" data-num="03">
                <h3 class="column lg-12 section-header__pretitle text-pretitle">Publikasi Terbaru</h3>
            </div>
            <div class="row">
                <div class="column lg-12">
                    <div class="publikasi-grid" style="display: flex; overflow-x: auto; gap: 20px; padding: 20px;">
                        @foreach ($publikasi as $publikasi)
                            <div class="publikasi-item" style="min-width: 300px;">
                                <a href="{{ route('publikasi.show', $publikasi->id_publikasi) }}">
                                    <img src="{{ asset('foto_publikasi/' . $publikasi->gambar) }}"
                                        alt="{{ $publikasi->judul }}"
                                        style="width: 100%; height: 200px; object-fit: cover;">
                                    <h4>{{ $publikasi->judul }}</h4>
                                    <p>{{ \Carbon\Carbon::parse($publikasi->tanggal_publikasi)->locale('id')->translatedFormat('d F Y') }}
                                    </p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <section id="ulasan-preview" class="s-ulasan-preview target-section">
            <div class="row section-header light-on-dark" data-num="04">
                <h3 class="column lg-12 section-header__pretitle text-pretitle">Ulasan Terbaru</h3>
            </div>
            <div class="row">
                <div class="column lg-12">
                    <div class="ulasan-grid" style="display: flex; overflow-x: auto; gap: 20px; padding: 20px;">
                        @foreach ($ulasans->sortByDesc('created_at')->take(5) as $ulasan)
                            <div class="ulasan-item"
                                style="min-width: 300px; background-color: white; padding: 10px; border-radius: 5px;">
                                <div class="ulasan-content">
                                    <h3 style="margin-bottom: 0; color: black;">{{ $ulasan->nama }}</h3>
                                    <p style="margin-bottom: 0; font-size: 0.8em; color: black;">{{ $ulasan->asal_kota }}
                                    </p>
                                    <div class="review-rating" style="margin-bottom: 10px;">
                                        @for ($i = 0; $i < 5; $i++)
                                            @if ($i < $ulasan->rating_avg)
                                                <span class="filled">&#9733;</span> <!-- Bintang terisi -->
                                            @else
                                                <span class="empty">&#9734;</span> <!-- Bintang kosong -->
                                            @endif
                                        @endfor
                                    </div>
                                    <p style="margin-bottom: 0; color: black;">{{ $ulasan->isi_ulasan }}</p>
                                    <p class="ulasan-date" style="font-size: 0.7em; color: black;">
                                        {{ \Carbon\Carbon::parse($ulasan->created_at)->locale('id')->translatedFormat('d F Y') }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                        <div class="ulasan-item ulasan-more"
                            style="min-width: 300px; align-items: center; justify-content: center; display: flex;">
                            <a href="{{ route('review') }}" style="text-decoration: none; color: darkorange;">
                                <strong>Lihat Ulasan Selengkapnya</strong>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </section>
@endsection
