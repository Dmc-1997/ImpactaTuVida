@extends('layouts.academy')

@section('head')
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                <div class="flex-row mt-4 mb-3 d-flex justify-content-between">
                    <a href="#chapterModal" class="mr-4 text-white d-block d-lg-none" data-toggle="modal">
                        <i class="fas fa-bars fs-bar"></i>
                    </a>
                    <a class="" href="{{ route('index') }}">
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
                    <a href="{{ route('members.mycourses') }}" class="btn btn-return">Cursos</a>
                </div>

                <div class="menu-chapters">
                    <div class="flex-row mb-3 d-flex bd-highlight">
                        <h2 class="mb-0 text-white font-weight-bold text-lg-left text-uppercase d-none d-lg-block">
                            Certificación</h2>
                        <h5 class="mb-0 text-white font-weight-bold text-lg-left text-uppercase d-block d-lg-none">
                            Certificación</h5>
                    </div>
                </div>

                <h6 class="text-white">Curso: {{ $course->title }}</h6>

                <div class="line-yellow"></div>

                @if ($certification->approved)
                    <div class="mt-2 text-white certification-fail">
                        <h1 class="display-4">¡FELICITACIONES!</h1>
                        <p class="lead">Ha logrado {{ $certification->score }}%, ya puedes descargar el certificado.</p>
                        <a class="btn btn-return btn-lg"
                            href="{{ route('members.pdf.certification', $certification->reference) }}"
                            role="button">Descargar</a>
                    </div>
                @else
                    <div class="mt-2 text-white certification-fail">
                        <h1 class="display-4">LO SENTIMOS, NO HA APROBADO ESTA CERTIFICACIÓN</h1>
                        <p class="lead">Inténtalo de nuevo.</p>
                        <a class="btn btn-return btn-lg" href="{{ route('members.courses.certification', $course->id) }}"
                            role="button">Otra vez</a>
                    </div>
                @endif
            </div>

        </div>
    </div>



@endsection
@section('js')
@endsection
