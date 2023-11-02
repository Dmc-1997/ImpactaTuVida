@extends('themes.advanced.admin', ['nav_active' => 3,
    'title' =>  'Administración '
])
@section('head')
<link rel="stylesheet" href="{{ asset('themes/advanced/css/users.css') }}">
<link rel="stylesheet" href="{{ asset('themes/advanced/css/courses.css') }}">
<link rel="stylesheet" href="{{ asset('themes/advanced/css/categories.css') }}">
@endsection
@section('content')

<span class="mt-2 courses_title-style-curses-web__-RV8j">Cursos</span>

@include('partials.categories_inline', ["categories" => $categories])

<div class="row mt-3 align-items-center">
    <div class="col-3 users_container-anadir-usuario__lDVJk">
        <a class="users_styles-anadir__mAn-b" href="{{ route('admin.courses.create') }}"> Crear</a>
        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" color="#c3c3c3" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" style="color: rgb(195, 195, 195); font-size: 20px;">
            <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
        </svg>
    </div>
    <div class="col-9 users_container-menu__XXjFU">
    </div>
</div>

<livewire:admin.courses.index></livewire:admin.courses.index>

@endsection
@section('js')
    <script>
        $(document).ready(() => {
            // var $viewCourses = localStorage.getItem("view-card");
            // if($viewCourses){
            //     if($viewCourses == 'card'){
            //         disabled("#course-card", "#course-table");
            //     }else{
            //         disabled("#course-table", "#course-card");
            //     }
            // }else{
            //     disabled("#course-card", "#course-table");
            // }

            // function disabled($view, $removeView){
            //     $type = $($removeView).hasClass("d-none");
            //     $($removeView).removeAttr("style");
            //     $($view).removeClass("d-none");
            //     $($view).attr("style", "color: var(--bs-indigo);");

            //     if(!$type){
            //         $($removeView).addClass("d-none");
            //     }
            // }
        });
    </script>
@endsection