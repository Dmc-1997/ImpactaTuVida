@extends('layouts.academy')

@section('head')
    <style>
        /*
                            #AFDB00 - verde
                            #6422BA - morado
                            #212F42 - azul oscuro/claro
                            #162742 - azul oscuro
                        */
        .bg-theme {
            background-color: #162742 !important;
            color: #fff !important;
        }

        .btn-theme {
            background-color: #7929E2 !important;
            color: #fff !important;
        }

        .text-theme {
            color: #7929E2 !important;
        }


        .line-divider {
            border-bottom: 3px solid #7929E2;
        }

        .chapter_title button {
            color: #7929E2 !important;
        }

        .chapter_title button .btn-link {
            color: #7929E2 !important;
        }

        .btn-link {
            color: #7929E2 !important;
        }

        .btn-link:hover {
            color: #7929E2 !important;
        }

        a {
            color: #7929E2 !important;
        }

        .theme-course-menu {
            /* background-color: #212F42 !important; */
            color: #fff !important;
        }

        #accordionCourseMenu {
            /* background-color: #212F42 !important; */
            color: #fff !important;
        }

        #accordionCourseMenu>.card {
            /* background-color: #212F42 !important; */
            color: #fff !important;
            border: 0;
        }

        .accordion>.card>.card-header {
            background-color: #ffffff !important;
            color: #162742 !important;
        }

        .chapter_title {
            border: 0px solid #FFFFFF !important;
        }

        /* .chapter_title span
                        {
                            background-color: #212F42 !important;
                            color: #fff !important;
                        } */

        /* .chapter_title i {
                            background-color: #212F42 !important;
                            color: #fff !important;
                        } */

        .chapter_menu {
            background-color: #ffffff !important;
            color: #162742 !important;
        }

        .chapter_menu a {
            background-color: #ffffff !important;
            color: #162742 !important;
        }

        .chapter_title_text {
            color: #212F42 !important;
        }

        .chapter_title_text_active {
            color: #162742 !important;
        }

        .class_title_text {
            color: #162742 !important;
        }

        /* .class_item_block {
            background-color: #414E5F !important;
        } */

        .chapter_title span {
            font-size: 0.8rem;
            font-weight: 400;
        }

        .text-item {
            font-size: 0.9rem;
        }

        .progress_text {
            color: #fff !important;
        }

        .rating-desc {
            width: max-content;
        }

        .margin-progress {
            align-self: center;
        }

        .video_container_buttons {
            background-color: #162742 !important;
            border: 0px solid #ffffff;
        }

        .text-instructor {
            color: #AFDB00 !important;
        }

        .bg-progressbar {
            background-color: #AFDB00 !important;
        }

        .progress-bar {
            background-color: #7929E2 !important;
        }

        .card-review {
            background-color: #414E5F !important;
            color: #fff !important;
        }
    </style>
    <style>
        .icon-upload {
            height: 30px;
        }
    </style>
@endsection
@section('content')

    <div class="row MenuHeaderMobile_container-mobile__hyrQw">
        <div class="col-2 p-2 MenuHeaderMobile_container-logo__4uz-X">
            <a href="/">
                <img
                    class="MenuHeaderMobile_logo__4exiK"
                    src="data:image/png;base64,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"
                    alt="logo"
                />
            </a>
        </div>
        <div class="col-2 p-2 MenuHeaderMobile_container-pricipal-search__HvQjf">
            <div class="MenuHeaderMobile_container-search__IvFwY">
                <img
                    class="MenuHeaderMobile_icon-search__E7EJr"
                    src="data:image/png;base64,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"
                    alt="icon-sarch"
                />
                <div><input class="class-basic border-0 MenuHeaderMobile_input-search__xjOOG" type="text" placeholder="Buscar" /></div>
            </div>
        </div>
        <div class="col-4 p-2 MenuHeaderMobile_container-menu-hamburguesa__et8ir">
            <button class="MenuHeaderMobile_style-button-hamburguer__Oyod1">
                <img
                    src="data:image/png;base64,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"
                    alt="icon-hamburguer"
                    class="MenuHeaderMobile_icon-hamburger__Kk3Po"
                    id="btn-hamburguer"
                />
            </button>
        </div>
    </div>
    <div class="mt-4 header_container-menu-nav__TFAFj" id="container-menu-nav">
        @include('themes.advanced.partials.admin_sidebar_movil')
    </div>
    

    <div class="LayoutBackgroundCurses_background__jNUmW">
        <header class="p-4 coursesTemplate_style-header__3P065">
            <div class="col-12 col-sm-4 col-sm-12 col-md-8 coursesTemplate_container-header__ixczC">
                <div class="col-4 text-center">
                    <img
                        src="data:image/png;base64,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"
                        alt=""
                        class="coursesTemplate_icon-impacta__Azfua"
                    />
                </div>
                <div class="col-8 coursesTemplate_container-title__mImRn"><span class="coursesTemplate_styles-tittle-curso__rX-4P">{{ $course->title }}</span></div>
            </div>
            <div class="col-4 p-4 container-fluid row" style="justify-content: right;">
                @if (Auth::user()->role == 'business')
                    <div class="p-2 bd-highlight">
                        <a href="{{ route('businesses.index') }}" class="btn btn-theme rounded-pill">Campus</a>
                    </div>
                    <div class="p-2 bd-highlight">
                        <a href="{{ route('businesses.courses.index') }}"
                            class="btn btn-theme rounded-pill">Cursos</a>
                    </div>
                @elseif (Auth::user()->role == 'member')
                    <div class="p-2 bd-highlight">
                        <a href="{{ route('members.index') }}" class="btn btn-theme rounded-pill">Campus</a>
                    </div>
                    <div class="p-2 bd-highlight">
                        <a href="{{ route('members.mycourses') }}" class="btn btn-theme rounded-pill">Cursos</a>
                    </div>
                @else
                    <div class="p-2 bd-highlight">
                        <a href="{{ route('admin.courses.index') }}"
                            class="btn btn-theme rounded-pill">Cursos</a>
                    </div>
                @endif
                {{-- @if (file_exists(public_path() . '/imagenes/logos/' . $logo) && $logo != '' && $logo != 'default.jpg')
                    <img src="{{ asset('imagenes/logos/' . $logo) }}" class="coursesTemplate_banner-styles__BV8w7" alt="{{ $course->title }}" />
                @else
                    <img src="{{ asset('/images/logoacademy.png') }}" class="coursesTemplate_banner-styles__BV8w7" alt="{{ $course->title }}">
                @endif --}}
            </div>
        </header>
    </div>


    <div class="px-4 container-fluid bg-theme pb-5">
        <div class="row">
            <div class="col-md-8">

                {{-- <div class=" d-none d-lg-block">
                    <div class="mt-2 mb-1 d-flex bd-highlight">
                        <div class="p-2 flex-grow-1 bd-highlight">
                            <a class="" href="{{ route('members.index') }}">
                                @if (Auth::user()->role == 'business' || Auth::user()->role == 'member')
                                    @php
                                        $logo = '';
                                        $team = \App\Models\Team::whereId(Auth::user()->current_team_id)->first();
                                        if (!is_null($team)) {
                                            $logo = $team->logo;
                                        }
                                    @endphp
                                    @if (file_exists(public_path() . '/imagenes/logos/' . $logo) && $logo != '' && $logo != 'default.jpg')
                                        <img src="{{ asset('imagenes/logos/' . $logo) }}" class="logo" width="100px" />
                                    @else
                                        <img class="logo-img" src="{{ asset('/images/logoacademy.png') }}" width="100px">
                                    @endif
                                @else
                                    <img class="logo-img" src="{{ asset('/images/logoacademy.png') }}" width="100px">
                                @endif
                            </a>
                        </div>
                        @if (Auth::user()->role == 'business')
                            <div class="p-2 bd-highlight">
                                <a href="{{ route('businesses.index') }}" class="btn btn-theme rounded-pill">Campus</a>
                            </div>
                            <div class="p-2 bd-highlight">
                                <a href="{{ route('businesses.courses.index') }}"
                                    class="btn btn-theme rounded-pill">Cursos</a>
                            </div>
                        @elseif (Auth::user()->role == 'member')
                            <div class="p-2 bd-highlight">
                                <a href="{{ route('members.index') }}" class="btn btn-theme rounded-pill">Campus</a>
                            </div>
                            <div class="p-2 bd-highlight">
                                <a href="{{ route('members.mycourses') }}" class="btn btn-theme rounded-pill">Cursos</a>
                            </div>
                        @else
                            <div class="p-2 bd-highlight">
                                <a href="{{ route('admin.courses.index') }}"
                                    class="btn btn-theme rounded-pill">Cursos</a>
                            </div>
                        @endif
                    </div>
                </div> --}}

                {{-- <div class=" d-block d-lg-none">
                    <div class="mt-2 mb-1 flex-rowd-flex justify-content-between d-flex">
                        <a href="#chapterModal" class="mr-4 " data-toggle="modal">
                            <i class="fas fa-bars fs-bar text-white"></i>
                        </a>
                        <a class="" href="{{ route('members.index') }}">
                            <img src="{{ asset('/images/logoacademy.png') }}" alt="" width="100px" alt="" />
                        </a>
                        <div align="right">
                            <a href="{{ route('members.index') }}" class="btn btn-theme rounded-pill">Campus</a>
                            <a href="{{ route('members.mycourses') }}" class="btn btn-theme rounded-pill">Cursos</a>
                        </div>
                    </div>
                </div> --}}


                {{-- <div class="menu-chapters">
                    <div class="flex-row mb-1 d-flex bd-highlight">
                        <h2 class="mb-0 font-weight-bold text-lg-left text-uppercase d-none d-lg-block">
                            {{ $course->title }}</h2>
                        <h5 class="mb-0 font-weight-bold text-lg-left text-uppercase d-block d-lg-none">
                            {{ $course->title }}</h5>
                    </div>
                </div> --}}

                {{-- @if (isset($course->user))
                    <h6 class="mb-1">
                        <small>
                            INTRUCTOR: <span
                                class="mr-3 text-instructor">{{ $course->user->name . ' ' . $course->user->surname }}</span>
                        </small>
                    </h6>
                @endif

                <div class="line-divider"></div> --}}

                <div class="theme-course-player">
                    <livewire:members.courses.player :course="$course"></livewire:members.courses.player>
                </div>

                <div class="mt-3 coursesTemplate_container-instructor__nhvZC">                    
                    <span class="coursesTemplate_styles-subttitle__0mxkN">Acerca del instructor</span>
                    <br>
                    @if ($course->is_completed)
                        <b>🎉Completo🎉</b>
                    @endif </td>
                    <div class="coursesTemplate_container-acerca-instructor__fkVkL">
                        <div class="coursesTemplate_container-foto-perfil__Lxuer">
                            @if (isset($course->user))
                                <img src="{{ $course->user->profile_photo_url }}" alt="{{ $course->user->name }}"
                                    class="coursesTemplate_foto-perfil__AF0ME">
                            @endif
                            {{-- <img class="coursesTemplate_foto-perfil__AF0ME" src="/static/media/foto-perfil.c17e0967dd9ff22c8805.jpg" alt="foto de perfil" /> --}}
                        </div>
                        <div class="mb-3 coursesTemplate_contaienr-descripcion-instructor__P7aoC">
                            <span class="mb-2 coursesTemplate_styles-tittle-instructor__H7lHG">{{ $course->user->name }}</span>
                            <p>
                                {!! str_replace('<br>', "\r", $course->user->detail) !!}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <div>
                        <ul class="MenuTabs_tabItems__mMipZ nav nav-tabs" id="myTab" role="tablist">
                            <li class="MenuTabs_tabItem__YEnth nav-item" role="presentation" id="temary-tab" data-toggle="tab" data-target="#temary" type="button" role="tab">
                                Temario
                            </li>
                            <li class="MenuTabs_tabItem__YEnth nav-item" role="presentation" id="benefits-tab" data-toggle="tab" data-target="#benefits" type="button" role="tab">
                                Beneficios
                            </li>
                            <li class="MenuTabs_tabItem__YEnth nav-item" role="presentation" id="description-tab" data-toggle="tab" data-target="#description" type="button" role="tab">
                                Descripcion
                            </li>
                            <li class="MenuTabs_tabItem__YEnth nav-item" role="presentation" id="requirements-tab" data-toggle="tab" data-target="#requirements" type="button" role="tab">
                                Requerimientos
                            </li>
                            <li class="MenuTabs_tabItem__YEnth nav-item" role="presentation" id="downloadable-tab" data-toggle="tab" data-target="#downloadable" type="button" role="tab">
                                Descargables
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="temary" role="tabpanel" aria-labelledby="temary-tab">
                                <div class="accordion">
                                    <div class="accordion-item">
                                        <livewire:members.courses.menu-information :course="$course"></livewire:members.courses.menu-information>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="benefits" role="tabpanel" aria-labelledby="benefits-tab">
                                <div class="accordion">
                                    <div class="accordion-item pt-4">
                                        {!! $course->short_detail !!}
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description-tab">
                                <div class="accordion">
                                    <div class="accordion-item pt-4">
                                        {!! $course->detail !!}
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="requirements" role="tabpanel" aria-labelledby="requirements-tab">
                                <div class="accordion">
                                    <div class="accordion-item pt-4">
                                        {!! $course->requirement !!}
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="downloadable" role="tabpanel" aria-labelledby="downloadable-tab">
                                <div class="accordion">
                                    <div class="accordion-item pt-4">
                                        
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="MenuTabs_tab__Qpm21">
                                <div class="mb-3 MenuTabs_container-beneficios-all__W9qs2">
                                    <div class="MenuTabs_container-beneficios__dQdQc">
                                        <div class="MenuTabs_beneficio__rdQQl">
                                            <svg
                                                stroke="currentColor"
                                                fill="currentColor"
                                                stroke-width="0"
                                                viewBox="0 0 16 16"
                                                class="MenuTabs_icon__87Y2C"
                                                color="#afdb00"
                                                height="1em"
                                                width="1em"
                                                xmlns="http://www.w3.org/2000/svg"
                                                style="color: rgb(175, 219, 0);"
                                            >
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                                                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"></path>
                                            </svg>
                                            <span class="MenuTabs_text__PBhQw">Aprenderás de manera divertida y práctica que es la nutrición y cuales son alimentos que realmente aportan valor a tu alimentación.</span>
                                        </div>
                                        <div class="MenuTabs_beneficio__rdQQl">
                                            <svg
                                                stroke="currentColor"
                                                fill="currentColor"
                                                stroke-width="0"
                                                viewBox="0 0 16 16"
                                                class="MenuTabs_icon__87Y2C"
                                                color="#afdb00"
                                                height="1em"
                                                width="1em"
                                                xmlns="http://www.w3.org/2000/svg"
                                                style="color: rgb(175, 219, 0);"
                                            >
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                                                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"></path>
                                            </svg>
                                            <span class="MenuTabs_text__PBhQw">Descubrirás recetas fáciles y prácticas para una merienda, almuerzo o cena deliciosa y rica en nutrientes.</span>
                                        </div>
                                        <div class="MenuTabs_beneficio__rdQQl">
                                            <svg
                                                stroke="currentColor"
                                                fill="currentColor"
                                                stroke-width="0"
                                                viewBox="0 0 16 16"
                                                class="MenuTabs_icon__87Y2C"
                                                color="#afdb00"
                                                height="1em"
                                                width="1em"
                                                xmlns="http://www.w3.org/2000/svg"
                                                style="color: rgb(175, 219, 0);"
                                            >
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                                                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"></path>
                                            </svg>
                                            <span class="MenuTabs_text__PBhQw">Aprenderás a leer etiquetas nutricionales, a conocer los aditivos y tóxicos que esconden las etiquetas y los componentes que debes evitar.</span>
                                        </div>
                                        <div class="MenuTabs_beneficio__rdQQl">
                                            <svg
                                                stroke="currentColor"
                                                fill="currentColor"
                                                stroke-width="0"
                                                viewBox="0 0 16 16"
                                                class="MenuTabs_icon__87Y2C"
                                                color="#afdb00"
                                                height="1em"
                                                width="1em"
                                                xmlns="http://www.w3.org/2000/svg"
                                                style="color: rgb(175, 219, 0);"
                                            >
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                                                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"></path>
                                            </svg>
                                            <span class="MenuTabs_text__PBhQw">Conocerás cuales son los nutrientes esenciales que tu cuerpo necesita para estar en equilibrio y balance.</span>
                                        </div>
                                        <div class="MenuTabs_beneficio__rdQQl">
                                            <svg
                                                stroke="currentColor"
                                                fill="currentColor"
                                                stroke-width="0"
                                                viewBox="0 0 16 16"
                                                class="MenuTabs_icon__87Y2C"
                                                color="#afdb00"
                                                height="1em"
                                                width="1em"
                                                xmlns="http://www.w3.org/2000/svg"
                                                style="color: rgb(175, 219, 0);"
                                            >
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                                                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"></path>
                                            </svg>
                                            <span class="MenuTabs_text__PBhQw">Aprenderás a conocer tu composición corporal y entenderás que todos tenemos un cuerpo diferente.</span>
                                        </div>
                                        <div class="MenuTabs_beneficio__rdQQl">
                                            <svg
                                                stroke="currentColor"
                                                fill="currentColor"
                                                stroke-width="0"
                                                viewBox="0 0 16 16"
                                                class="MenuTabs_icon__87Y2C"
                                                color="#afdb00"
                                                height="1em"
                                                width="1em"
                                                xmlns="http://www.w3.org/2000/svg"
                                                style="color: rgb(175, 219, 0);"
                                            >
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                                                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"></path>
                                            </svg>
                                            <span class="MenuTabs_text__PBhQw">Tendrás claro los conceptos claves para empezar a crear una alimentación balanceada y empezar a prevenir afecciones y enfermedades futuras para ti y tu familia.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="MenuTabs_tab__Qpm21"><p>Nutricionista dietista, por más de 10 años fue presentadora y realizadora de de programas de nutrición y gastronomía, le apasiona ser fuente de bienestar.</p></div>
                            <div class="MenuTabs_tab__Qpm21"><p>No hay un requerimiento especial, sin embargo sugerimos acompañar el programa de nutrición consciente con los programas de actividad física.</p></div> --}}
                        </div>
                    </div>
                </div>
                
                
                {{-- <div class="d-block d-lg-none">

                    <livewire:partials.course-reviews :data="$course"></livewire:partials.course-reviews>

                </div> --}}

            </div>
            <div class="col-md-4 theme-course-menu">

                <livewire:members.courses.menu :course="$course"></livewire:members.courses.menu>

                @if ($course->classes_to_certificate == $course->total_completed && $course->classes_to_certificate > 0)
                    <div class="my-2">
                        <a href="{{ route('members.courses.certification', $course->id) }}"
                            class="btn btn-theme rounded-pill btn-block">Certificación</a>
                    </div>
                @endif

                <div class="my-3 d-none d-lg-block">

                    <livewire:partials.course-reviews :data="$course" :color="'#afdb00'"></livewire:partials.course-reviews>

                </div>

            </div>
        </div>
    </div>



@endsection
@section('js')
@endsection
