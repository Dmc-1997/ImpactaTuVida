@extends('themes.advanced.admin', ['nav_active' => 0,
    'title' =>  'Administración '
])
@section('content')

<div class="d-flex bd-highlight">
    <div class="col-lg-8 col-6">
        <span class="mt-2 courses_title-style-curses-web__-RV8j"> Contenido del  Curso: <strong>{{ $course->title }}</strong></span>
    </div>
    <div class="col-lg-4 col-6" align="right">
        <a class="btn btn-style" align="right" style="width: auto;" href="{{ route('admin.courses.index') }}">Regresar</a>
    </div>
</div>


    <livewire:admin-courses-content :course="$course"></livewire:admin-courses-content>


@endsection

@section('js')
    <script>
        window.addEventListener('chapter-class-stored', event => {
            $('#chapterClassModal').modal('hide');
        });
    </script>

@endsection
