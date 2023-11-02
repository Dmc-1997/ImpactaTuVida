@extends('themes.advanced.admin', ['nav_active' => 3,
                            'title' =>  'Administración '
                        ])
@section('head')
<link rel="stylesheet" href="{{ asset('themes/advanced/css/courses.css') }}">
<link rel="stylesheet" href="{{ asset('themes/advanced/css/categories.css') }}">
@endsection
@section('content')

<span class="mt-2 courses_title-style-curses-web__-RV8j">Cursos</span>

@include('partials.categories_inline', ["categories" => $categories])

<livewire:businesses.courses.table></livewire:businesses.courses.table>

@endsection
@section('js')
<script>
    $(document).ready(() => {
        
        var $viewCourses = localStorage.getItem("view-card");
        if($viewCourses){
            if($viewCourses == 'card'){
                disabled("#course-card", "#course-table");
            }else{
                disabled("#course-table", "#course-card");
            }
        }else{
            disabled("#course-card", "#course-table");
        }

        function disabled($view, $removeView){
            // $type = $($removeView).hasClass("d-none");
            // $($removeView).removeAttr("style");
            
            // $($view).removeClass("d-none");

            // if(!$type){
            //     $($removeView).addClass("d-none");
            // }
        }
    });
</script>
@endsection
