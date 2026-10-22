<!DOCTYPE html>
<html lang="en" class="no-js">

<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rumah Sejarah Kalijati</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        document.documentElement.classList.remove('no-js');
        document.documentElement.classList.add('js');
    </script>

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{ asset('WT-Museum') }}/css/vendor.css">
    <link rel="stylesheet" href="{{ asset('WT-Museum') }}/css/styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Stencilla&display=swap">
    <link href="{{ asset('sb-admin') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">


    <!-- favicons
    ================================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('WT-Museum') }}/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('WT-Museum') }}/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('WT-Museum') }}/favicon-16x16.png">
    <link rel="manifest" href="{{ asset('WT-Museum') }}/site.webmanifest">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>


<body id="top">


    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader"></div>
    </div>


    <!-- page wrap
    ================================================== -->
    <div id="page" class="s-pagewrap">

        <!-- # site-content
        ================================================== -->
        @yield('content')
        <!-- end content -->


        <!-- # site-footer
        ================================================== -->
        <footer id="footer" class="s-footer target-section">

            <div class="row section-header">
                <h3 class="column lg-12 section-header__pretitle text-pretitle">Kontak & Lokasi</h3>
                <div class="stack-on-1100">
                    <h2 class="title text-display-1">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15855.924459094964!2d107.6609927!3d-6.5240681!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6917babbd88735%3A0x25b2777d9376702!2sRumah%20Sejarah%20Kalijati!5e0!3m2!1sid!2sid!4v1717959856889!5m2!1sid!2sid"
                            width="500" height="325" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </h2>
                </div>
                <div class="column lg-6 stack-on-1100">

                    <div class="contact-block">
                        <h6>Lokasi</h6>
                        <p>
                            Komplek Garuda E 25 Lanud Suryadarma, Kalijati <br>
                            Subang, Jawa Barat <br>
                            41721 Indonesia
                        </p>
                    </div>

                    <div class="contact-block">
                        <h6>Kontak Pribadi</h6>
                        <ul class="contact-list">
                            <li><a>+62 821 2706 5564</a></li>
                            {{-- <li><a href="tel:197-123-9876">+197 123 9876</a></li> --}}
                        </ul>
                    </div>

                </div>
            </div>
            {{-- end section-header  --}}

            {{-- <div class="row list-block block-lg-one-half block-tab-whole block-stack-on-1000 s-footer__btns">
                <div class="column list-block__item">
                    <div class="s-footer__contact-btn">
                        <a href="mailto:#0" class="btn btn--primary u-fullwidth">
                            Let's Talk
                        </a>
                    </div>
                </div>
                <div class="column list-block__item">
                    <div class="subscribe-form s-footer__subscribe">
                        <h6>Subscribe</h6>
                        <form id="mc-form" class="mc-form">
                            <input type="email" name="EMAIL" id="mce-EMAIL" class="u-fullwidth text-center"
                                placeholder="Your Email Address"
                                title="The domain portion of the email address is invalid (the portion after the @)."
                                pattern="^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*(\.\w{2,})+$"
                                required>
                            <input type="submit" name="subscribe" value="Subscribe"
                                class="btn btn--primary u-fullwidth">
                            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text"
                                    name="b_cdb7b577e41181934ed6a6a44_9a91cfe7b3" tabindex="-1" value=""></div>
                            <div class="mc-status"></div>
                        </form>
                    </div>
                </div>
            </div> --}}
            {{-- end s-footer__btns --}}

            <div class="row s-footer__bottom">

                <div class="column lg-6 tab-12 s-footer__bottom-left">
                    <ul class="s-footer__social">
                        <li>
                            <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" style="fill:rgba(0, 0, 0, 1);transform:;-ms-filter:">
                                    <path
                                        d="M20,3H4C3.447,3,3,3.448,3,4v16c0,0.552,0.447,1,1,1h8.615v-6.96h-2.338v-2.725h2.338v-2c0-2.325,1.42-3.592,3.5-3.592 c0.699-0.002,1.399,0.034,2.095,0.107v2.42h-1.435c-1.128,0-1.348,0.538-1.348,1.325v1.735h2.697l-0.35,2.725h-2.348V21H20 c0.553,0,1-0.448,1-1V4C21,3.448,20.553,3,20,3z">
                                    </path>
                                </svg>
                                <span class="u-screen-reader-text">Facebook</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" style="fill:rgba(0, 0, 0, 1);transform:;-ms-filter:">
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" style="fill:rgba(0, 0, 0, 1);transform:;-ms-filter:">
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
                    </ul>
                </div>

                <div class="column lg-6 tab-12 s-footer__bottom-right">
                    <div class="ss-copyright">
                        <span>© Rumah Sejarah Kalijati 2024</span>
                        <span>Design by Kelompok 5 SI 2A</a> </span>
                    </div>
                </div>

            </div>
            {{-- s-footer__bottom --}}

            <div class="ss-go-top">
                <a class="smoothscroll" title="Back to Top" href="#top">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                        <path d="M6 4h12v2H6zm5 10v6h2v-6h5l-6-6-6 6z"></path>
                    </svg>
                </a>
            </div>
            {{-- end ss-go-top --}}

            <div class="whatsapp-float">
                <a href="https://api.whatsapp.com/send?phone=62082127065564&text=Halo,%20saya%20ingin%20menanyakan%20beberapa%20informasi%20mengenai%20museum%20ini.%20Apakah%20saya%20bisa%20mendapatkan%20informasi%20lebih%20lanjut?%20Terima%20kasih."
                    target="_blank">
                    <span><img class="whatsapp-icon" src="/icons/whatsapp_icon.png" alt="WhatsApp">
                        Hubungi Kami</span>
                </a>
            </div>

        </footer>
        {{-- end footer --}}


        <!-- Java Script
    ================================================== -->
        <script src="{{ asset('WT-Museum') }}/js/plugins.js"></script>
        <script src="{{ asset('WT-Museum') }}/js/main.js"></script>

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('sb-admin') }}/vendor/jquery/jquery.min.js"></script>
        <script src="{{ asset('sb-admin') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
