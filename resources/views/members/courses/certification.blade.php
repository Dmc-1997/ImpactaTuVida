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
                    @if(getConfig('theme') == 'tribus2')
                        <img src="{{ asset('themes/tribus2/images/logo.png') }}" alt="" width="100px" alt="Tribus U"/>

                    @elseif(getConfig('theme') == 'vision2010')
                        <img src="{{ asset('themes/vision2010/images/logo.png') }}" alt="" width="100px" alt="Vision2010"/>

                    @elseif(getConfig('theme') == 'equipo360')
                        <img src="{{ asset('themes/equipo360/images/logo.png') }}" alt="" width="100px" alt="Equipo360"/>

                    @elseif(getConfig('theme') == 'creandolideres')
                        <img src="{{ asset('themes/creandolideres/images/logo.png') }}" alt="" width="100px" alt="Creandolideres"/>

                    @endif
                </a>
                <a href="{{ route('members.mycourses') }}" class="btn btn-return">Cursos</a>
            </div>

            <div class="menu-chapters">
                <div class="flex-row mb-3 d-flex bd-highlight">
                    <h2 class="mb-0 text-white font-weight-bold text-lg-left text-uppercase d-none d-lg-block">Certificación</h2>
                    <h5 class="mb-0 text-white font-weight-bold text-lg-left text-uppercase d-block d-lg-none">Certificación</h5>
                </div>
            </div>

            <h6 class="text-white">Curso: {{ $course->title }}</h6>

            <div class="line-yellow"></div>

            <div class="">

                <livewire:members.courses.certification :course='$course'></livewire:members.courses.certification>

            </div>
        </div>

    </div>
</div>



@endsection
@section('js')
@endsection
