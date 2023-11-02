@extends('themes.advanced.admin', ['nav_active' => 0, 'title' => 'Administración '])
@section('head')
<link rel="stylesheet" href="{{ asset('themes/advanced/css/courses.css') }}">
@endsection
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h3 style="color: #7929e2">
            Hola, {{ Auth::user()->name }} 
            <a class="btn-style" href="{{ route('members.profile') }}">
                <span class="badge badge-primary">Editar</span>
            </a>
        </h3>
    </div>
    <div class="container-fluid d-flex justify-content-between align-items-center mt-2 mb-2 dashboard_container-web__jI75B">
        <div class="col-6 text-center dashboard_styles-background-active__ZNuzP dashboard_container-acountUser__42vW2" style="margin: 10px;">
            <div class="dashboard_style-container-user__93ajk">
                <span class="dashboard_style-number__TK5oE">{{ Utils::showMinutes($dashboard->time_seen_total) }}</span>
                <div class="c100 p{{ Utils::showMinutes($dashboard->time_seen_total) }} blue" style="font-size: 60px; background-color: #7929e2;">
                    <span>{{ Utils::showMinutes($dashboard->time_seen_total) }}mins</span>
                    <div class="slice">
                        <div class="bar" style="border-color: #afdb00;"></div>
                        <div class="fill" style="border-color: #afdb00;"></div>
                    </div>
                </div>
            </div>
            <span class="dashboard_style-text__3H61d">
                Tiempo de estudio total
            </span>
        </div>
        <div class="col-6 text-center dashboard_styles-background-active__ZNuzP dashboard_container-acountUser__42vW2" style="margin: 10px;">
            <div class="dashboard_style-container-user__93ajk">
                <span class="dashboard_style-number__TK5oE">{{  Utils::showMinutes($dashboard->time_seen_average) }}</span>
                <div class="c100 p{{ Utils::showMinutes($dashboard->time_seen_average) }} blue" style="font-size: 60px; background-color: #7929e2;">
                    <span>{{  Utils::showMinutes($dashboard->time_seen_average) }}mins</span>
                    <div class="slice">
                        <div class="bar" style="border-color: #afdb00;"></div>
                        <div class="fill" style="border-color: #afdb00;"></div>
                    </div>
                </div>
            </div>
            <span class="dashboard_style-text__3H61d">
                Tiempo de estudio promedio
            </span>
        </div>
    </div>
    <div class="container-fluid d-flex justify-content-between align-items-center mt-2 mb-2 dashboard_container-web__jI75B">
        <div class="col-6 text-center dashboard_styles-background-active__ZNuzP dashboard_container-acountUser__42vW2" style="margin: 10px;">
            <div class="dashboard_style-container-user__93ajk">
                <span class="dashboard_style-number__TK5oE">{{ $dashboard->total_courses_in_progress }}</span>
                <div class="c100 p{{ $dashboard->total_courses_in_progress }} blue" style="font-size: 60px; background-color: #7929e2;">
                    <span>{{ $dashboard->total_courses_in_progress }}</span>
                    <div class="slice">
                        <div class="bar" style="border-color: #afdb00;"></div>
                        <div class="fill" style="border-color: #afdb00;"></div>
                    </div>
                </div>
            </div>
            <span class="dashboard_style-text__3H61d">
                Cursos en estudio
            </span>
        </div>
        <div class="col-6 text-center dashboard_styles-background-active__ZNuzP dashboard_container-acountUser__42vW2" style="margin: 10px;">
            <div class="dashboard_style-container-user__93ajk">
                <span class="dashboard_style-number__TK5oE">{{ $dashboard->total_courses_approved }}</span>
                <div class="c100 p{{ $dashboard->total_courses_approved }} blue" style="font-size: 60px; background-color: #7929e2;">
                    <span>{{ $dashboard->total_courses_approved }}</span>
                    <div class="slice">
                        <div class="bar" style="border-color: #afdb00;"></div>
                        <div class="fill" style="border-color: #afdb00;"></div>
                    </div>
                </div>
            </div>
            <span class="dashboard_style-text__3H61d">
                Cursos aprobados
            </span>
        </div>
    </div>
</div>
<div class="container mt-4">

    <h3 class="configuration_style-title__4oIuj" style="font-size: 20px">Continúa aprendiendo</h3>

    <div class="row row-cols-1 row-cols-md-2 g-4 mt-3">
        @foreach ($courses as $course)
            @if (!$course->restriction)
            <!--<p>{{var_dump($course->is_completed);}}</p>-->            
                <div class="col-lg-4">
                    <div id="{{ $course->title }}" class="curso CardCurses_card__iCQ0L" style="height: 100%;">
                        <div class="CardCurses_container-imag-card__+Z28v">
                            @if ($course->preview_image !== null && $course->preview_image !== '')
                            <a href="{{ route('members.courses.show', ['id' => $course->id]) }}">
                                <img src="{{ asset('imagenes/cursos/' . $course->preview_image) }}" class="card-img-top styles-img-curse"/>
                            </a>
                            @else
                            <a href="{{ route('members.courses.show', ['id' => $course->id]) }}">
                                <img src="{{ asset('img/default.jpg') }}" class="card-img-top styles-img-curse"/>
                            </a>
                            
                            @endif
                        </div>
                        @php
                            $total_duration = App\Models\Courses\CourseFollowup::whereUser_id(auth()->user()->id)
                                ->whereCourse_id($course->id)
                                ->sum('duration');
                            $total_progress = App\Models\Courses\CourseFollowup::whereUser_id(auth()->user()->id)
                                ->whereCourse_id($course->id)
                                ->sum('progress');
                            $total_completed = App\Models\Courses\CourseFollowup::whereUser_id(auth()->user()->id)
                                ->whereCourse_id($course->id)
                                ->sum('completed');

                            $seen = 0;
                            if ($total_duration) {
                                $seen = $total_progress / $total_duration;
                            }
                        @endphp
                        <div class="progress">
                            <div class="progress-bar bg-progressbar" role="progressbar"
                                style="width: {{ $seen }}%" aria-valuenow="{{ $seen }}"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="card-body">
                            <h5 class="title textEllipsis">
                                {{ $course->title }}
                            </h5>
                            <p class="CardCurses_card-text__uBR0Q">
                                Por: 
                                @if (isset($course->user->name))
                                    {{ $course->user->name . ' ' . $course->user->surname }}
                                @endif                                
                            </p>
                            <div class="container-start">
                            <table style="width:100%;">
                                <tr>
                                <td>
                                @php
                                    $rated = App\Models\Courses\ReviewRating::whereCourse_id($course->id)
                                        ->orderBy('id', 'desc')
                                        ->avg('value');
                                    $rated = round($rated, 2);
                                @endphp
                                @livewire('partials.fivestars', ['rated' => $rated, 'show' => 0, 'dateago' => 0], key(Str::random(4)))                                        
                                </td>
                                <td>
                                @if ($course->is_completed != 0)
                                    <b style="float:right;">🎉Completo🎉</b>
                                @endif </td>
                                </tr>
                            </table>
                                
                            </div>                                               
                            <footer class="CardCurses_footer__7RALQ btn-center pt-2 justify-content-center" align="center">
                                <a href="{{ route('members.courses.show', ['id' => $course->id]) }}" class="btn-style CardCurses_button__jRn-e btn-secondary">
                                    Ir al curso
                                </a>
                                <a href="{{ route('members.course.detail', ['id' => $course->id, 'slug' => $course->slug]) }}"
                                    class="btn-style CardCurses_button__jRn-e CardCurses_secondary__IexnU btn-secondary">Leer Más</a>
                            </footer>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    <!-- Modal -->
    <div class="modal fade" id="coursesModal" tabindex="-1" aria-labelledby="coursesModalLabel" aria-hidden="true">
                    <div class="modal-dialog" >
                    <div class="modal-content">
                        <div class="modal-header">
                        <input type="text" id="searchBar" class="form-control" placeholder="Buscar cursos...">
                        </div>
                        <div class="modal-body" id="coursesList">
                        <!-- Las tarjetas de cursos se añadirán aquí -->
                        </div>
                    </div>
                    </div>
                </div>

    <script>

            var courses = [
                @if (isset($courses))
                @foreach ($courses as $course)
                @if (isset($course) && !$course->restriction)
                
                {
                    name: '{{ $course->title }}',
                    author: '{{ $course->user->name . ' ' . $course->user->surname }}',
                    rating: {{ round(App\Models\Courses\ReviewRating::whereCourse_id($course->id)
                                        ->orderBy('id', 'desc')
                                        ->avg('value'), 2); }},
                    image: '{{ asset('imagenes/cursos/' . $course->preview_image) }}'
                },  
                @endif
                @endforeach
                @endif
            ];
            

            function openModal(searchText) {
                // Filtrar cursos según el texto de búsqueda
                const filteredCourses = courses;
                searchText = searchText.toLowerCase();

                // Limpiar el contenido anterior del modal
                document.getElementById('coursesList').innerHTML = '';

                // Rellenar el modal con tarjetas de cursos
                filteredCourses.forEach((course,index) => {
                    



                    document.getElementById('coursesList').innerHTML += courseCard;
                });

                // Abrir el modal
                const modal = new bootstrap.Modal(document.getElementById('coursesModal'));
                modal.show();
            }

            function ocultarCursos(criterio){
                var idCursos = [];
                courses.forEach((course,index)=>{
                    if(course.name.toLowerCase().includes(criterio) || course.author.toLowerCase().includes(criterio)){
                        document.getElementById("tarjeta"+index).style.display="block";
                    }else{
                        document.getElementById("tarjeta"+index).style.display="none";
                    }
                });
                

            }

            //
            document.getElementById('txtBusquedaCursos').addEventListener('keypress', function(e) {
                if(e.keyCode == 13){
                    openModal(this.value);
                }
            });

            document.getElementById('searchBar').addEventListener('keyup', function(e) {
                ocultarCursos(this.value.toLowerCase());
            });


        </script>


</div>
@endsection
@section('js')
@endsection
