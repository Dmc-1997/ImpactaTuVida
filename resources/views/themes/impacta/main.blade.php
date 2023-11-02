<!DOCTYPE html>
<html lang="es-co">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Impacta tu vida</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />

    <!-- Core theme CSS (includes Bootstrap)-->
    {{-- <link rel="stylesheet" href="{{ asset('themes/impacta/css/styles.css') }}" /> --}}
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome_5_8/css/fontawesome-all.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('css/rating.css') }}">

    {{-- @livewireStyles --}}

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;700;900&display=swap" rel="stylesheet">
    {{-- {!! Consult::getStoreConfig('head_home') !!} --}}
    <link rel="stylesheet" href="{{ asset('themes/impacta/css/new-css.css') }}">
    @yield('head')

    {{-- <style>
        {!! Consult::getStoreConfig('style_home') !!}
    </style> --}}
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
</head>

<body id="page-top">
    <header class="HeaderHome_container-mobile__z7wK5 HeaderHome_container-web__+bpTL bg-white">
        <div class="col-4 p-4 HeaderHome_container-logo__vhmIS">
            <a href="/"><img class="HeaderHome_logo__SQcf-" src="{{ asset('images/logo.png') }}" alt="logo" /></a>
        </div>
        <div class="col-4 p-4 HeaderHome_container-nav__i6My-">
            <nav class="HeaderHome_nav-container__1Fazq">
                <ul class="HeaderHome_ul-container__EaPDm">
                    <li class="mb-2 HeaderHome_nav-item__gA8PS {{ Route::current()->getName() == 'about' ? 'navbar_active__fCu0i' : '' }}"><a class="" href="/nosotros"> Nosotros</a></li>
                    <li class="mb-2 HeaderHome_nav-item__gA8PS {{ Route::current()->getName() == 'courses' ? 'navbar_active__fCu0i' : '' }}"><a class="" href="/cursos">Cursos</a></li>
                    {{-- <li class="mb-2 HeaderHome_nav-item__gA8PS {{ Route::current()->getName() == 'plans' ? 'navbar_active__fCu0i' : '' }}"><a class="" href="/planes">Planes</a></li> --}}
                </ul>
            </nav>
        </div>
        <div class="col-4 p-4 HeaderHome_container-btns__qpF4R">
            @guest
                <a class="HeaderHome_styles-link-btn__2G83s" href="/login">
                    <button type="button" class="btn-style HeaderHome_styles-btn-login__n4+Dn">Login</button>
                </a>
                <a class="HeaderHome_styles-link-btn__2G83s" href="/login">
                    <button type="button" class="btn-style btn-empresa">Empresas</button>
                </a>
            @else
                @if (Auth::user()->role == 'business')
                    <a class="HeaderHome_styles-link-btn__2G83s" href="{{ route('businesses.index') }}">
                        <button type="button" class="btn-style HeaderHome_styles-btn-login__n4+Dn">Panel</button>
                    </a>
                @else
                    <a class="HeaderHome_styles-link-btn__2G83s" href="{{ route('valid.account') }}">
                        <button type="button" class="btn-style HeaderHome_styles-btn-login__n4+Dn">Ingresar</button>
                    </a>
                @endif
                <a class="HeaderHome_styles-link-btn__2G83s" href="{{ route('end.this.session') }}">
                    <button type="button" class="btn-style btn-empresa">Salir</button>
                </a>
            @endguest
        </div>
        <div class="col-4 p-2 HeaderHome_container-menu-hamburguesa__dycYw">
            <button class="HeaderHome_style-button-hamburguer__0Tfuk" id="btn-hamburguer">
                <img src="/images/icono-hamburguesa-color.png" alt="icon-hamburguer" class="HeaderHome_icon-hamburger__CUJob" />
            </button>
        </div>
    </header>
    
    <div class="HeaderHome_container-menu-nav__3rUb3" id="container-menu-nav">
        <div class="p-2 HeaderHome_container-nav-mobile__ytr-B">
            <nav class="HeaderHome_nav-container__1Fazq">
                <ul class="HeaderHome_ul-container__EaPDm">
                    <li class="mb-2 HeaderHome_nav-item__gA8PS {{ Route::current()->getName() == 'about' ? 'navbar_active__fCu0i' : '' }}"><a class="" href="/nosotros"> Nosotros</a></li>
                    <li class="mb-2 HeaderHome_nav-item__gA8PS {{ Route::current()->getName() == 'courses' ? 'navbar_active__fCu0i' : '' }}"><a class="" href="/cursos">Cursos</a></li>
                    <li class="mb-2 HeaderHome_nav-item__gA8PS {{ Route::current()->getName() == 'plans' ? 'navbar_active__fCu0i' : '' }}"><a class="" href="/planes">Planes</a></li>
                </ul>
            </nav>
        </div>
        <div class="p-2 HeaderHome_container-btns-mobile__ENVRH">
            @guest
                <a class="HeaderHome_styles-btn-login__n4+Dn" href="/login">Login</a>
                <a class="HeaderHome_styles-btn-empresa__zlzZp" href="/login">Empresas</a>
            @else
                @if (Auth::user()->role == 'business')
                    <a class="HeaderHome_styles-btn-login__n4+Dn" href="{{ route('businesses.index') }}">
                        Panel
                    </a>
                @else
                    <a class="HeaderHome_styles-btn-login__n4+Dn" href="{{ route('valid.account') }}">
                        Ingresar
                    </a>
                @endif
                <a class="HeaderHome_styles-btn-empresa__zlzZp" href="{{ route('end.this.session') }}">
                    Salir
                </a>
            @endguest
        </div>
    </div>

    @yield('content')

    <!-- Footer-->
    <div class="container-fluid">
        <div class="row FooterHome_container-mobile__V67mv">
            <div class="col-4 col-sm-4 col-sm-8 col-md-4 FooterHome_container-logo__5vpqV">
                <div class=""><img src="{{ asset('images/logo-blanco.png') }}" alt="logo-blanco" class="FooterHome_styles-icon-logo__gIyYm" /></div>
            </div>
            <div class="col-4 col-sm-4 col-sm-8 col-md-4 FooterHome_container-social-media__oUjiS">
                <span class="FooterHome_style-social-text__5+4pP">Síguenos en: </span>
                <div class="FooterHome_container-icons__s9iWn">
                    <a href="https://instagram.com/impactatuvida.co">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" class="FooterHome_styles-icon-social__aj953" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"
                            ></path>
                        </svg>
                    </a>
                    <a rel="stylesheet" href="https://facebook.com/impactatuvida.co">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" class="FooterHome_styles-icon-social__aj953" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"
                            ></path>
                        </svg>
                    </a>
                    <a rel="stylesheet" href="https://www.linkedin.com/company/impactatuvida-co/">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" class="FooterHome_styles-icon-social__aj953" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"
                            ></path>
                        </svg>
                    </a>
                    <a rel="stylesheet" href="https://www.youtube.com/@impactatuvidaco3698">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 576 512" class="FooterHome_styles-icon-social-youtube__X2Pvn" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"
                            ></path>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="col-4 col-sm-4 col-sm-8 col-md-4 FooterHome_container-wrap-links__YrcXC">
                <div class="FooterHome_container-wrappers-links__CCFMI">
                    <svg
                        stroke="currentColor"
                        fill="none"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="FooterHome_styles-point__lWn0Y"
                        color="#fff"
                        height="1em"
                        width="1em"
                        xmlns="http://www.w3.org/2000/svg"
                        style="color: rgb(255, 255, 255);"
                    >
                        <desc></desc>
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="12" cy="12" r="4"></circle>
                    </svg>
                    <a class="FooterHome_style-upload-link__i6Zyr" href="/home/politicasPrivacidad">Política de privacidad</a>
                </div>
                <div class="FooterHome_container-wrappers-links__CCFMI">
                    <svg
                        stroke="currentColor"
                        fill="none"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="FooterHome_styles-point__lWn0Y"
                        color="#fff"
                        height="1em"
                        width="1em"
                        xmlns="http://www.w3.org/2000/svg"
                        style="color: rgb(255, 255, 255);"
                    >
                        <desc></desc>
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="12" cy="12" r="4"></circle>
                    </svg>
                    <a class="FooterHome_style-upload-link__i6Zyr" href="/home/terminosCodiciones">Términos y condiciones</a>
                </div>
                <div class="FooterHome_container-wrappers-links__CCFMI">
                    <svg
                        stroke="currentColor"
                        fill="none"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="FooterHome_styles-point__lWn0Y"
                        color="#fff"
                        height="1em"
                        width="1em"
                        xmlns="http://www.w3.org/2000/svg"
                        style="color: rgb(255, 255, 255);"
                    >
                        <desc></desc>
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="12" cy="12" r="4"></circle>
                    </svg>
                    <a class="FooterHome_style-upload-link__i6Zyr" href="/home/cookies">Política de Cookies</a>
                </div>
            </div>
            <div class="FooterHome_container-derechos__2Lgo3"><span>@Impacta tu vida 2023</span></div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <!-- Bootstrap core JS-->
    <script src="{{ asset('vendor/bootstrap_5_0_1/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core theme JS-->
    <!--script src="{{ asset('themes/impacta/js/scripts.js') }}"></script-->
    <script src="{{ asset('themes/impacta/js/custom.js') }}"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    
    @livewireScripts

    <script>
        $('#videoIntroModal').on('show.bs.modal', function(event) {
            var url = $($(event.currentTarget)[0].firstElementChild).attr('data-url');
            $('#video_modal').html(`<iframe src="`+url+`" style=”border:0;height:100%;width:100%;max-width:100%” class="video" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>`);
            
        });

        $("#videoIntroModal").on('hidden.bs.modal', function(e) {
            $('#video_modal').html('')
        });

        $('.nav-container ul li a').each(function(){
            var path = window.location.href;
            var current = path.substring(path.lastIndexOf('/')+1);
            var url = $(this).attr('href');
            url = url.substring(url.lastIndexOf('/')+1);
            if(url == current){
                $($(this)[0].parentNode).addClass('active');
            };
        }); 
    </script>

    @yield('js')

</body>

</html>
