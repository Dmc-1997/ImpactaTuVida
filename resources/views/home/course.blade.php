@extends('themes.impacta.main')
@section('head')
    <style>
        body {
            background-color: #162742 !important;
            color: #fff !important;
        }
        .container {
            background-color: #101c33;
        }

        .card{
            max-width: max-content;
        }

        .includes-box-content ul li{
            background: #FFFFFF;
            color: #101C33;
            font-weight: 600;
        }

        .includes-box-content ul li i{
            color: #7929e2;
        }

        .text-detail{
            color: #7929e2;
        }

        .border-10{
            border-radius: 10px;
        }
        .text-size-2{
            font-size: 1.5rem;
            font-weight: 500;
        }
        .text-green{
            color: #abc821;
        }
        .text-purple{
            color: #7929e2;
        }
        .pr-3{
            padding-right: 1rem;
        }

        .flex-shrink-0 i{
            color: #abc821;
            font-size: xx-large;
        }

        .fa .fa-check-circle:before {
            content: "\f058";
        }

        .css-hr{
            height: 3px;
            color: #ffffff;
            background: white;
            opacity: 0.8;
        }
        hr:not([size]) {
            height: 3px;
        }

        .accordion-item:first-of-type .accordion-button{
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .accordion-item .accordion-button{
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .boder-bottom{
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
        }
        .no-dots{
            list-style: none;
        }
        @media only screen and  (max-width: 480px) {
            .mobile-text-size{
                font-size: 0.8rem;
            }
        }
    </style>
@endsection
@section('content')

    {{-- <div class="mt-4 p-4 container">

    </div> --}}

    <div class="before_content"></div>


    <style>
        .block-info {
            background-color: #212F42 !important;
            color: #fff !important;
        }

        .accordion {
            background-color: #212F42 !important;
        }

        .accordion-button {
            background-color: #fff !important;
        }

        .accordion-body {
            background-color: #fff !important;
            color: black;
        }

        .accordion-item {
            background-color: #101c33 !important;
        }

        .accordion-chapter {
            color: #000 !important;
        }

        #read_moreinfo {
            color: #AFDB00 !important;
        }

        .fa-play-circle:before {
            color: #AFDB00 !important;
        }

        .accordion-item svg {
            fill: : #AFDB00 !important;
        }
        .text-duration {
            color: #000 !important;
        }

        .bg-summary {
            background-color: #212F42 !important;
            border: 0px solid #EDEDED;
        }

        .text-summary {
            color: #fff !important
        }

        .card-review {
            background-color: #fff !important;
        }

        .review-item-footer {
            background-color: #212F42 !important;
        }

        .includes-content {
            background-color: #212F42 !important;
        }

        .includes-box-content {
            background-color: #212F42 !important;
        }

        .includes-box-content ul {
            background-color: #212F42 !important;
        }

        .close-modal {
            position: absolute;
            top: -8px;
            font-size: 1.5rem;
            color: #AFDB00 !important;
        }
    </style>


    <div class="header">
    </div>

    <div class="container page-content page-theme" style="background: #162742">
        <div class="row" id="cursos">
            <div class="my-3 col-md-8">
                @if ($course->cover_image !== null && $course->cover_image !== '')
                    <img src="{{ asset('imagenes/cursos/' . $course->cover_image) }}" class="mr-3 img-fluid img-main border-10"
                        alt="">
                @else
                    <img src="{{ asset('img/default.jpg') }}" class="mr-3 img-fluid img-main border-10" alt="">
                @endif

                @php
                    setlocale(LC_ALL, 'es_ES', 'Spanish_Spain', 'Spanish');
                    $d = iconv('ISO-8859-2', 'UTF-8', strftime('%d/%Y', strtotime($course['updated_at'])));
                @endphp

                <div class="row text-size-2 mobile-text-size">
                    <div class="col-lg-7 col-7 p-3">
                        <div class="bd-highlight d-flex">
                            <span class="pr-3">
                                <i class="fa fa-graduation-cap text-green"></i>
                                {{ $course->tracking }}
                                @if ($course->tracking > 1)
                                    Estudiantes 
                                @else
                                    Estudiante 
                                @endif
                            </span>
                            @livewire('partials.fivestars', ['rated' => $rated, 'show' => 1, 'dateago' => 0, 'color' => "#afdb00"], key($course->id))
                        </div>
                    </div>
                    <div class="col-lg-5 pt-3 col-5">
                        <span>
                            Actualizado el {{ $d }}
                        </span>
                    </div>
                </div>

                {{-- <div class="p-2 bg-light mb-4 d-block d-sm-none block-info">
                    <div class="d-flex flex-column bd-highlight mb-1">
                        @if ($course->more_selling == 1)
                            <div class="p-0 bd-highlight">
                                <span class="badge bg-warning text-dark">Más vendidos</span>
                                <small>
                                    <i class="fa fa-users text-info"></i>
                                    {{ $course->tracking }}
                                    @if ($course->tracking == 1)
                                        Estudiantes
                                    @endif
                                </small>
                                <small>Actualizado el {{ $d }}</small>

                            </div>
                        @endif
                        <div class="p-0 bd-highlight">
                            @livewire('partials.fivestars', ['rated' => $rated, 'show' => 1, 'dateago' => 0], key($course->id))
                        </div>
                    </div>
                </div> --}}


                <div class="course-content-style mb-4">
                    <h1 class="title pt-3 pb-3"><strong>{{ $course->title }}</strong></h1>
                    <p class="subtitle">{!! $course->short_detail !!}</p>
                    <div class="rating-row">

                        <div class="pull-left">
                            <div class="star-ratings-sprite">
                                <span style="width:100%" class="star-ratings-sprite-rating"></span>
                            </div>
                        </div>


                        {{-- <div class="created-row">
                        <span class="created-by">
                            <div class="media">
                                <div class="media-body">
                                    @if ($course->user)
                                        <h3 class="mt-0">Por {{ $course->user->name }}  en <strong>{{$course->category->title}}</strong></h3>
                                    @endif
                                    @php
                                        setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
                                        $d = iconv('ISO-8859-2', 'UTF-8', strftime("%A, %d de %B de %Y", strtotime($course['updated_at'])));
                                    @endphp
                                    <p class="last-updated-date">Última Actualización {{ $d }}</p>
                                </div>
                            </div>
                        </span>
                    </div> --}}
                    </div>
                </div>

                <hr class="css-hr">

                <div class="mb-4 description-box view-more-parent">
                    <h6 class="description-title text-green text-size-2"><strong> Descripción</strong></h6>
                    <div class="description-content-wrap">
                        <div class="description-content">
                            {!! $course->detail !!}
                        </div>
                    </div>
                </div>

                <hr class="css-hr">

                <div class="mb-4 requirements-box">
                    <h6 class="requirements-title text-green text-size-2"><strong>Requerimientos</strong></h6>
                    <div class="requirements-content">
                        {!! $course->requirement !!}
                    </div>
                </div>

                <hr class="css-hr">


                @if ($coursechapters->isNotEmpty())
                    <div class="mb-4 ">
                        <div class="clearfix course-curriculum-title">
                            <div class="px-0 mx-0 row">
                                <div class="col-md-6">
                                    <h6 class="text-green text-size-2"><strong>Temario del curso</strong></h6>
                                </div>
                                {{-- <div class="col-md-6">
                                    <span class="total-lectures">
                                        {{ $coursechapters->count() }} Módulos
                                    </span>
                                    <span class="total-time">
                                        {{ $course->minutes }}
                                    </span>
                                </div> --}}
                            </div>
                        </div>

                        <div class="accordion" id="accordionExample">
                            @foreach ($coursechapters as $chapter)
                                @if ($chapter->status == '1' and $chapter->count() > 0)
                                    <div class="accordion-item mb-8 pb-3">
                                        <h2 class="accordion-header" id="heading{{ $chapter->id }}">
                                            <button class="accordion-button boder-top" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse{{ $chapter->id }}" aria-expanded="true"
                                                aria-controls="collapse{{ $chapter->id }}">
                                                <div
                                                    class="d-flex align-item-center justify-content-between d-flex justify-content-end w-100">
                                                    <div class="p-2  me-auto accordion-chapter">
                                                        <strong>{{ $chapter->chapter_name }}</strong>
                                                    </div>
                                                    {{-- <div class="p-2 text-duration">{{ $chapter->duration }}</div> --}}
                                                </div>
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $chapter->id }}"
                                            class="accordion-collapse collapse {{ $loop->first ? 'lecture-list collapse show' : 'lecture-list collapse' }}"
                                            aria-labelledby="heading{{ $chapter->id }}"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body boder-bottom">
                                                <ul class="no-dots">
                                                    @php
                                                        $i = 0;
                                                    @endphp
                                                    @foreach ($courseclass as $class)
                                                        @if ($class->coursechapter_id == $chapter->id)
                                                            @php
                                                                $i++;
                                                            @endphp
                                                            <li class="lecture has-preview">
                                                                <div class="d-flex bd-highlight mb-1">
                                                                    <div class="me-auto px-2 py-1 bd-highlight w-75">
                                                                        {{ $i }}. {{ $class['title'] }}
                                                                        @if ($class->date_time != null)
                                                                            <!--span class="live-class">En vivo: {{ $class->date_time }}</span-->
                                                                        @endif
                                                                    </div>
                                                                    <div class="px-2 py-1 bd-highlight w-15">
                                                                        <span
                                                                            class=" text-duration"> <strong>{{ $class['duration'] }}</strong></span>
                                                                    </div>
                                                                    <div class="px-2 py-1 bd-highlight w-10">
                                                                        @if ($allow)
                                                                            @if ($class->type == 'pdf')
                                                                                <a href="{!! $class->url !!}"
                                                                                    target="_blank" class="text-primary"><i
                                                                                        class="fa fa-paperclip"></i></a>
                                                                            @endif
                                                                            @if ($class->type == 'video')
                                                                                @if ($class->url != null)
                                                                                    <a href="{{ route('members.courses.show', $course->id) }}?selectedClass={{ $class->id }}"
                                                                                        class="ml-4 text-primary"><i
                                                                                            class="fa fa-play-circle"></i></a>
                                                                                @endif
                                                                            @endif
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif

                <hr class="css-hr">

                <div class="about-instructor-box">
                    <h5 class="text-green text-size-2 pb-3 pt-3">
                        <strong>Acerca del instructor</strong>
                    </h5>

                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            @if (isset($course->user))
                                <img src="{{ $course->user->profile_photo_url }}" alt="{{ $course->user->name }}"
                                    class="mx-auto mr-3 avatar-md rounded-circle">
                            @endif
                        </div>
                        <div class="flex-grow-1 ms-3">
                            @if (isset($course->user))
                                <h6 class="mt-0 text-purple"> <strong>{{ $course->user->name . ' ' . $course->user->surname }}</strong></h6>
                                {!! str_replace('<br>', "\r", $course->user->detail) !!}
                            @endif
                        </div>
                    </div>

                </div>


            </div>

            <div class="col-md-4 my-3">

                <div id="summary1" class="summary" style="z-index: auto; position: static; top: auto;">
                    <span class="caption"></span>
                    <span class="contents">
                        <div class="card p-2 1bg-white text-summary shadow-sm">
                            @if ($course->preview_image_video !== null && $course->preview_image_video !== '')
                                <img src="{{ asset('imagenes/cursos/' . $course->preview_image_video) }}"
                                    class="card-img-top" alt="" data-bs-toggle="modal"
                                    data-bs-target="#videoIntroModal">
                            @else
                                <img src="{{ asset('img/default_video.jpg') }}" class="card-img-top" alt=""
                                    data-bs-toggle="modal" data-bs-target="#videoIntroModal">
                            @endif
                            <div class="card-body">
                                <div class="row pt-4 pb-4">
                                    <div class="col-lg-7">
                                        <h5 class="text-detail"><strong>Detalles</strong></h5>
                                    </div>
                                    <div class="col-lg-5" align="right">
                                        @livewire('partials.fivestars', ['rated' => $rated, 'show' => 1, 'dateago' => 0], key($course->id))
                                    </div>
                                </div>
                                <div class="mb-4 includes-box about-home-includes-list">
                                    <div class="includes-box-content">
                                        {!! $course->it_includes !!}
                                    </div>
                                </div>
                                <div align="center">
                                    <a href="{{ route('members.courses.show', $course->id) }}" type="button" style="height: auto;" class="btn-style mt-1 p-2">
                                        Iniciar el curso
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" class="home_arrow-btn-icon__ZcJy9" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
                                        </svg>
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                        <div class="p-2 1bg-white text-summary shadow-sm" style="width: 100%">
                            <div class="">
                                <div class="pt-4 pb-4">
                                    <livewire:partials.course-reviews :data="$course" :color="'#afdb00'"></livewire:partials.course-reviews>
                                </div>
                                
                            </div>
                        </div>
                    </span>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="mt-3 p-4 bg-white">
        <div class="container bg-white">
            <span style="font-size: 22px;" class="styles-text-title-social style-title-sidebar title-center-home-mobile">
                Cursos Relacionados
            </span>
            <div class="mt-5">
                <div class="slide-courses-movil">
                    @foreach ($courses as $course)
                        <div class="p-3">
                            <div class="card curses-card">
                                <div class="curses-container-imag-card">
                                    @if ($course->preview_image !== null && $course->preview_image !== '')
                                        <img src="{{ asset('imagenes/cursos/' . $course->preview_image) }}"
                                            class="card-img-top styles-img-curse img-fluid">
                                    @else
                                        <img src="{{ asset('img/default.jpg') }}" class="card-img-top styles-img-curse img-fluid">
                                    @endif
                                </div>
                                <div class="card-body">
                                    <h5 class="curses-title textEllipsis">
                                        {{ $course->title }}
                                    </h5>
                                    <p class="curses-card-text">
                                        @if (isset($course->user))
                                            Por: <strong>{{ $course->user->name . ' ' . $course->user->surname }}</strong>
                                        @endif
                                    </p>
                                    <div class="container-start">
                                        @php
                                            $rated = App\Models\Courses\ReviewRating::whereCourse_id($course->id)
                                                ->orderBy('id', 'desc')
                                                ->avg('value');
                                            $rated = round($rated, 2);
                                        @endphp
                                        @livewire('partials.fivestars', ['rated' => $rated, 'show' => 0, 'dateago' => 0], key(Str::random(4)))
                                    </div>
                                    <footer class="curses-footer btn-center" style="display:block">
                                        <a href="{{ route('course.show', ['id' => $course->id, 'slug' => $course->slug]) }}" class="btn-style button btn-secondary">
                                            Ir al curso
                                        </a>
                                        <button class="btn-style button secondary btn-activo btn-secondary">
                                            Activo
                                        </button>
                                    </footer>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-lg-12" align="left">
                    <button class="arrow-left-course-movil btn-arrow-comments">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" color="#afdb00" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" style="color: #7929e2;font-size: 30px;"><path d="M724 218.3V141c0-6.7-7.7-10.4-12.9-6.3L260.3 486.8a31.86 31.86 0 0 0 0 50.3l450.8 352.1c5.3 4.1 12.9.4 12.9-6.3v-77.3c0-4.9-2.3-9.6-6.1-12.6l-360-281 360-281.1c3.8-3 6.1-7.7 6.1-12.6z"></path></svg>
                    </button>
                    <button class="arrow-right-course-movil btn-arrow-comments">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" color="#afdb00" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" style="color: #7929e2;font-size: 30px;"><path d="M765.7 486.8L314.9 134.7A7.97 7.97 0 0 0 302 141v77.3c0 4.9 2.3 9.6 6.1 12.6l360 281.1-360 281.1c-3.9 3-6.1 7.7-6.1 12.6V883c0 6.7 7.7 10.4 12.9 6.3l450.8-352.1a31.96 31.96 0 0 0 0-50.4z"></path></svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
    </div> --}}


    <div class="modal fade" id="videoIntroModal" tabindex="-1" aria-labelledby="videoIntroModal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" data-url="{{ $course->url }}">
            <div class="modal-content">
                <div class="modal-header d-none">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="p-0 modal-body">
                    <div class="d-flex flex-row-reverse ">
                        <span class="text-end">
                            <i class="fa fa-times close-modal" data-bs-dismiss="modal"></i>
                        </span>
                    </div>
                    <div class="">
                        <div class="video-container">
                            <div id="video_modal" style="height: 50vh;">
                                @if ($course->url != '')
                                    <iframe src="{{ $course->url }}" style=”border:0;height:100%;width:100%;max-width:100%” class="video" frameborder="0"
                                        allow="autoplay; fullscreen" allowfullscreen></iframe>
                                @else
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('js')
    <script>
        $(document).ready(function() {
            // $('.slide-courses-movil').slick({
            //     dots: true,
            //     infinite: false,
            //     speed: 300,
            //     slidesToShow: 3,
            //     prevArrow: $(".arrow-left-course-movil"),
            //     nextArrow: $(".arrow-right-course-movil"),
            //     responsive: [
            //         {
            //             breakpoint: 1024,
            //             settings: {
            //                 slidesToShow: 3,
            //                 slidesToScroll: 3,
            //                 infinite: true,
            //                 dots: true
            //             }
            //         },
            //         {
            //             breakpoint: 600,
            //             settings: {
            //                 slidesToShow: 2,
            //                 slidesToScroll: 2
            //             }
            //         },
            //         {
            //             breakpoint: 480,
            //             settings: {
            //                 slidesToShow: 1,
            //                 slidesToScroll: 1
            //             }
            //         }
            //     ]
            // });
        });
    </script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
    <script src="{{ asset('vendor\scrolltofixed\scrolltofixed.min.js') }}"></script> --}}
    <script>
        $(document).ready(function() {
            
            $(".fa-check").each(function(item) {
                $(this).addClass("far fa-check-circle text-green");
                $(this).removeClass("fa fa-check");
                $(this).removeClass("text-success");
            });
            // Dock the header to the top of the window when scrolled past the banner.
            // This is the default behavior.

            // $('.header').scrollToFixed();


            // Dock the footer to the bottom of the page, but scroll up to reveal more
            // content if the page is scrolled far enough.

            // $('.footer').scrollToFixed({
            //     bottom: 0,
            //     limit: $('.footer').offset().top
            // });


            // Dock each summary as it arrives just below the docked header, pushing the
            // previous summary up the page.

            // var summaries = $('.summary');
            // summaries.each(function(i) {
            //     var summary = $(summaries[i]);
            //     var next = summaries[i + 1];

            //     summary.scrollToFixed({
            //         marginTop: $('.header').outerHeight(true) + 10,
            //         limit: function() {
            //             var limit = 0;
            //             if (next) {
            //                 limit = $(next).offset().top - $(this).outerHeight(true) - 10;
            //             } else {
            //                 limit = $('.footer').offset().top - $(this).outerHeight(true) - 10;
            //             }
            //             return limit;
            //         },
            //         zIndex: 999
            //     });
            // });
        });
    </script>
@endsection
