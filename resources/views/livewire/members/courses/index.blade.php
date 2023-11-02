<div>
    <div class="container">
        <div class="col-lg-12">
            <h3 style="color: #7929e2">
                Cursos
            </h3>
        </div>

        <div class="row row-cols-1 row-cols-md-2 g-4 mt-3">
            @foreach ($courses as $course)
                @if (!$course->restriction)
                    <div class="col-lg-4">
                        <div class="CardCurses_card__iCQ0L">
                            <div class="CardCurses_container-imag-card__+Z28v">
                                @if ($course->preview_image !== null && $course->preview_image !== '')
                                    <img src="{{ asset('imagenes/cursos/' . $course->preview_image) }}" class="card-img-top styles-img-curse" data-url="{{ $course->url }}" data-toggle="modal"
                                    data-target="#videoIntroModal">
                                @else
                                    <img src="{{ asset('img/default.jpg') }}" class="card-img-top styles-img-curse" data-url="{{ $course->url }}" data-toggle="modal"
                                    data-target="#videoIntroModal">
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
                                <footer class="CardCurses_footer__7RALQ btn-center pt-2 justify-content-center">
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


        {{-- <div class="flex-wrap row d-flex align-content-around justify-content-left">
            @foreach ($courses as $course)
                @if (!$course->restriction)
                    <div class="mb-4 col-md-3">
                        <div class="text-center">
                            <a href="{{ route('members.courses.show',['id' => $course->id]) }}">
                                @if ($course->preview_image !== null && $course->preview_image !== '')
                                    <img src="{{ asset('imagenes/cursos/'. $course->preview_image ) }}" class="card-img-top" >
                                @else
                                    <img src="{{ asset('img/default.jpg') }}" class="card-img-top" >
                                @endif
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach

        </div> --}}
    </div>
</div>
