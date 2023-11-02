<div class="mb-5">
    <div class="container-search mt-4" style="width: 100%">
        {{-- <div class="col-lg-9 d-flex">
            <img class="icon-search" src="/images/icono-buscador.png" alt="icon-sarch">
            <input class="form-control color-input-form" type="text" placeholder="Buscar.." wire:model.debounce.500ms="search">
        </div> --}}
        
        <div align="right" class="col-lg-12">
            <span class="btn" style="{{$typeView == 'card' ? 'color: var(--bs-indigo);' : ''}}" id="btn-course-card"  wire:click="loadTypeView('card')">
                <i class="fa fa-table"></i>
            </span>
            <span class="btn" style="{{$typeView == 'table' ? 'color: var(--bs-indigo);' : ''}}" id="btn-course-table" wire:click="loadTypeView('table')">
                <i class="fa fa-list"></i>
            </span>
        </div>
    </div>
    @if ($courses->count())        
        @if(\Session::get('view-card') == 'table' && $typeView == 'table')
            <div id="course-table"class="p-4 mb-5 container-fluid personalization_box-container__Gpida table-responsive">
                <table class="table mb-0 table-hover table-sm">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Título</th>
                            <th scope="col">Instructor</th>
                            <th scope="col">Categoría</th>
                            <th scope="col" class="text-right" width="20%">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                            <tr>
                                <td>{{ $course->id }}</td>
                                <td>
                                    @if($course->preview_image !== NULL && $course->preview_image !== '')
                                        <img src="{{ asset('imagenes/cursos/'. $course->preview_image ) }}" width="80px" >
                                    @else
                                        <img src="{{ asset('img/default.jpg') }}" width="80px" >
                                    @endif
                                </td>
                                <td>{{ $course->title }}</td>
                                <td>
                                    @if (isset($course->user))
                                        {{ $course->user->name .' '. $course->user->surname}}
                                    @endif
                                </td>
                                <td>
                                    @if(isset($course->category->title))
                                        {{ $course->category->title }}
                                    @endif
                                </td>
                                <td class="text-right">
                                    <footer class="CardCurses_footer__7RALQ">
                                        <a href="{{ route('members.courses.show', ['id' => $course->id]) }}" class="btn-style CardCurses_button__jRn-e btn-secondary" style="width: -webkit-fill-available;" >
                                            Ir al curso
                                        </a>
                                        @if (Consult::hasRestriction($course->id, $team_id))
                                            <button wire:click="activeCourse({{ $course->id }})"
                                                class=" btn-style CardCurses_button__jRn-e CardCurses_secondary__IexnU btn-secondary" style="width: 80%;">
                                                Restringuido
                                            </button>
                                        @else
                                            <button wire:click="inactiveCourse({{ $course->id }})"
                                                class=" btn-style CardCurses_button__jRn-e CardCurses_secondary__IexnU btn-secondary" style="width: 80%;">
                                                Activo
                                            </button>
                                        @endif
                                    </footer>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        @if(\Session::get('view-card') == 'card' && $typeView == 'card')
        <p>Aqui...</p>
            <div id="course-card" class="row row-cols-1 row-cols-md-2 g-4 mt-3">
                @foreach ($courses as $course)
                    <div class="col-lg-4">
                        <div class="CardCurses_card__iCQ0L">
                            <div class="CardCurses_container-imag-card__+Z28v">
                                @if ($course->preview_image !== null && $course->preview_image !== '')
                                <a href="{{ route('members.courses.show', ['id' => $course->id]) }}">
                                    <img src="{{ asset('imagenes/cursos/' . $course->preview_image) }}" class="card-img-top styles-img-curse">
                                </a>
                                @else
                                <a href="{{ route('members.courses.show', ['id' => $course->id]) }}">
                                    <img src="{{ asset('img/default.jpg') }}" class="card-img-top styles-img-curse">
                                </a>
                                @endif
                            </div>
                
                            <div class="card-body">
                                <h5 class="CardCurses_title__QSP-D CardCurses_textEllipsis__yCplT">
                                    {{ $course->title }}
                                </h5>
                                <p class="CardCurses_card-text__uBR0Q">
                                    Por: 
                                    @if (isset($course->user->name))
                                        {{ $course->user->name . ' ' . $course->user->surname }}
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
                                <footer class="CardCurses_footer__7RALQ btn-center pt-2 justify-content-center" align="center">
                                    <a href="{{ route('members.courses.show', ['id' => $course->id]) }}" class=" btn-style CardCurses_button__jRn-e btn-secondary">
                                        Ir al curso
                                    </a>
                                    @if (Consult::hasRestriction($course->id, $team_id))
                                        <button wire:click="activeCourse({{ $course->id }})"
                                            class=" btn-style CardCurses_button__jRn-e CardCurses_secondary__IexnU btn-secondary">
                                            Restringuido
                                        </button>
                                    @else
                                        <button wire:click="inactiveCourse({{ $course->id }})"
                                            class=" btn-style CardCurses_button__jRn-e CardCurses_secondary__IexnU btn-secondary">
                                            Activo
                                        </button>
                                    @endif
                                </footer>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    @else
        <span class="text-muted">No hay resultados para la búsqueda "{{ $search }}" en la pagina {{ $page }} al mostar {{ $perPage }}</span>
    @endif
    
    
    <div class="mt-5">
        {{ $courses->links() }}
    </div>

</div>
