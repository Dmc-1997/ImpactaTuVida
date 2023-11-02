@extends('themes.advanced.admin', ['nav_active' => 3, 'title' => 'Campus '])

@section('content')
    <style>
        .main-content {
            background-color: #101C33 !important;
            color: #fff !important;
        }



        .page-content {
            background-color: #101C33 !important;
            color: #fff !important;
        }

        /* .page-content h1,
        .page-content h2,
        .page-content h3,
        .page-content h4,
        .page-content h5,
        .page-content h6,
        .page-content p {
            color: #fff !important;
        } */




        .block-info {
            background-color: #212F42 !important;
            color: #fff !important;
        }

        .accordion {
            background-color: #212F42 !important;
        }

        .accordion-button {
            background-color: #212F42 !important;
        }

        .accordion-button::after {
            flex-shrink: 0;
            width: 1.25rem;
            height: 1.25rem;
            margin-left: auto;
            content: "";
            background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='green'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e);
            background-repeat: no-repeat;
            background-size: 1.25rem;
            transition: transform 0.2s ease-in-out;
        }

        .accordion-body {
            background-color: #212F42 !important;
        }

        .accordion-item {
            background-color: #212F42 !important;
        }

        .accordion-chapter {
            color: #FFFFFF !important;
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

        /* path {
                                                                                                    fill: #AFDB00 !important;
                                                                                                }​ */
        .text-duration {
            /* color: #6c757d  !important; */
            color: #CECECE !important;
        }

        .bg-summary {
            background-color: #212F42 !important;
            border: 0px solid #EDEDED;
        }

        .text-summary {
            color: #fff !important
        }

        .card-review {
            background-color: #212F42 !important;
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

        .includes-box-content ul li{
            background: #FFFFFF;
            color: #101C33;
            font-weight: 600;
        }

        .includes-box-content ul li i{
            color: #7929e2;
        }

        .close-modal {
            position: absolute;
            top: -8px;
            font-size: 1.5rem;
            color: #AFDB00 !important;
        }




        .course-content-style {
            padding: 0;
        }

        .title {
            font-size: 2rem;
        }

        .course-content-short-description {
            font-size: 0.9rem;
            text-align: justify;
        }

        .lecture-group-title {
            padding: 10px 10px 10px 25px !important;
        }

        .course-curriculum-accordion .lecture-list .lecture {
            padding: 12px 30px 12px 53px;
        }

        .accordion-button:not(.collapsed) {
            background-color: #f0f0f0;
            box-shadow: inset 0 -1px 0 rgb(0 0 0 / 13%);
        }

        .accordion-button {
            background-color: #f0f0f0;
            padding: 0.5rem 1.25rem;
        }

        .accordion-chapter {
            font-weight: bold;
        }


        @media (min-width: 768px) {
            .position-fixed {
                width: 28%;
                min-height: 120px;
            }
        }

        @media (min-width: 1300px) {
            .position-fixed {
                width: 25rem;
                min-height: 120px;
            }
        }

        @media (min-width: 1500px) {
            .position-fixed {
                width: 25rem;
                min-height: 120px;
            }
        }

        .accordion-item {
            border: 0;
        }

        .accordion-button {
            font-size: 0.8rem;
            border-radius: 0.4rem;
            margin-top: 5px;
        }

        .accordion-button:after {
            order: -1;
            margin-left: 0;
            margin-right: 0.5em;
            /* transform: rotate(-180deg); */
        }

        .accordion-button:not(.collapsed) {
            color: #000000;
            box-shadow: inset 0 0px 0 rgb(0 0 0 / 13%);
            margin-bottom: 5px;
        }

        .no-dots {
            list-style-type: none;
        }

        .video-intro {
            padding: 5rem 0px;
        }

        .video-container {
            /* width is set as 100% here. any width can be specified as per requirement */
            width: 100%;
            padding-top: 56.25%;
            height: 0px;
            position: relative;
        }

        .video {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }

        .img-main {
            border-radius: 1rem 1rem 0rem 0rem;
        }
        
        .bg-theme {
            background-color: #7929E2 !important;
        }

        .text-theme {
            color: #7929E2 !important;
        }

        .margin-progress {
            margin-block: auto;
        }

        .progress {
            height: 0.5rem;
        }

        .card-review {
            background-color: #FFFFFF;
            border: 1px solid #FFFFFF;
            border-radius: 1rem;
        }

        .review-item {}

        .review-item-footer {
            background-color: #fff;
            border-top: 0px solid rgba(0, 0, 0, .125);
        }

        .accordion-button:not(.collapsed)::after {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='green'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
            transform: rotate(-180deg);
            color: #AFDB00;
        }

        .card .card-footer {
            background-color: #212F42 !important;
            border-radius: 1rem 1rem 1rem 1rem;
        }

        .site-footer {
            display: none;
        }
    </style>
    <style>
        .block-info {
            background-color: #212F42 !important;
            color: #fff !important;
        }
        .accordion-item:first-of-type .accordion-button{
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .accordion-item .accordion-button{
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
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
    <div class="container page-content">
        <div class="row" id="cursos">
            <div class="container page-content page-theme">
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
                                    @livewire('partials.fivestars', ['rated' => $rated, 'show' => 1, 'dateago' => 0], key($course->id))
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
                                                <h5 style="color:#7929e2;"><strong>Detalles</strong></h5>
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
                                {{-- <div class="p-2 1bg-white text-summary shadow-sm" style="width: 100%">
                                    <div class="">
                                        <div class="pt-4 pb-4">
                                            <livewire:partials.course-reviews :data="$course"></livewire:partials.course-reviews>
                                        </div>
                                        
                                    </div>
                                </div> --}}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="videoIntroModal" tabindex="-1" aria-labelledby="videoIntroModal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" data-url="{{ $course->url }}">
            <div class="modal-content">
                <div class="modal-header d-none">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="p-0 modal-body">
                    <div class="d-flex flex-row-reverse">
                        <span class="text-end">
                            <i class="fa fa-times close-modal" data-bs-dismiss="modal"></i>
                        </span>
                    </div>
                    <div class="">
                        <div class="video-container">
                            <div id="video_modal" style="height: 50vh;">
                                @if ($course->url != '')
                                <iframe src="{{ $course->url }}" class="video" style=”border:0;height:100%;width:100%;max-width:100%” frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
    <script src="{{ asset('vendor\scrolltofixed\scrolltofixed.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            // Dock the header to the top of the window when scrolled past the banner.
            // This is the default behavior.

            $('.header').scrollToFixed();


            // Dock the footer to the bottom of the page, but scroll up to reveal more
            // content if the page is scrolled far enough.

            $('.footer').scrollToFixed({
                bottom: 0,
                limit: $('.footer').offset().top
            });


            // Dock each summary as it arrives just below the docked header, pushing the
            // previous summary up the page.

            var summaries = $('.summary');
            summaries.each(function(i) {
                var summary = $(summaries[i]);
                var next = summaries[i + 1];

                summary.scrollToFixed({
                    marginTop: $('.header').outerHeight(true) + 10,
                    limit: function() {
                        var limit = 0;
                        if (next) {
                            limit = $(next).offset().top - $(this).outerHeight(true) - 10;
                        } else {
                            limit = $('.footer').offset().top - $(this).outerHeight(true) - 10;
                        }
                        return limit;
                    },
                    zIndex: 999
                });
            });
        });
    </script>
@endsection
