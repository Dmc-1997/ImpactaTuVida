<div>
    @php
        $hab_menu_progress  = 0;
    @endphp
    <hr class="mt-2 mb-0">

    @if($course->cover_image !== NULL && $course->cover_image !== '')
        <img src="{{ asset('/imagenes/cursos/'. $course->cover_image) }}" class="mb-4 img-fluid d-none d-lg-block" alt="" >
    @endif

    <div class="accordion d-none d-lg-block" id="accordionCourseMenu">

        @foreach($chapters as $chapter)
            @if($chapter->status == '1')
                <div class="card mb-2" data-toggle="collapse" data-target="#collapse{{ $chapter->id }}">
                    <div class="card-header chapter_title" id="heading{{ $chapter->id }}">
                        <div class="flex-row mb-0 d-flex bd-highlight ">
                            <button type="button" class="btn btn-link">
                                @if ($chapter->id == $selectedChapter)
                                    <i class="fa fa-minus chapter_title_text_active"></i>
                                @else
                                    <i class="fa fa-plus chapter_title_text"></i>
                                @endif
                                @if ($chapter->id == $selectedChapter)
                                    <span class="chapter_title_text_active">
                                        @if(Auth::User()->role == 'admin')
                                            {{ $chapter->id }} -
                                        @endif
                                        {{$chapter->chapter_name}}
                                    </span>
                                @else
                                    <span class="chapter_title_text">
                                        @if(Auth::User()->role == 'admin')
                                            {{ $chapter->id }} -
                                        @endif
                                        {{$chapter->chapter_name}}
                                    </span>
                                @endif
                            </button>
                        </div>
                    </div>
                    <div id="collapse{{ $chapter->id }}" class="collapse  @if ($chapter->id == $selectedChapter) show @endif" aria-labelledby="heading{{ $chapter->id }}" data-parent="#accordionCourseMenu">
                        <div class="p-0 card-body chapter_menu">
                            @if (isset($chapter->course_classes) &&  $chapter->course_classes->count())
                                @foreach($chapter->course_classes as $class)
                                    @if($class->coursechapter_id == $chapter->id)
                                        <div class="pt-2 pb-1 col-lg-12 @if($class->id == $selectedClass) class_item_block @else @endif ">
                                            <a href="javascript:void" class="" style="text-decoration:none">
                                                <h6 class="text-item @if($class->seen > 90) class_title_text @endif"
                                                    wire:click="selectThisClass({{$chapter->id}}, {{$class->id}}, '{{$class->url}}', '{{$chapter->chapter_name}}', '{{$class->title}}', '{{$class->type}}', '{{$class->duration}}')"
                                                >
                                                <span @if($class->id == $selectedClass)  class="dot_active" @else class="dot" @endif id="class_dot_{{$class->id}}"></span>
                                                    @if(Auth::User()->role == 'admin')
                                                        {{ $class->id }} -
                                                    @endif
                                                    {{ $class->title }}
                                                    @if($class->completed) <i class="ml-2 fa fa-check text-success"></i>@endif
                                                </h6>
                                            </a>
                                            @if ($hab_menu_progress)
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $class->seen }}%" aria-valuenow="{{ $class->seen }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            @endif
                                        </div>
                                    @endif
                                @endforeach
                            @else

                            @endif
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>





    <div class="text-center row text-lg-left ">

        <div class="border-content chapter_menu">

            <div wire:ignore.self id="chapterModal" class="modal fade modal-content-left show chapter_menu" tabindex="-1" role="dialog" aria-labelledby="chapterModal" aria-hidden="true">
                <div class="modal-dialog modal-cart modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="shadow-sm modal-header align-items-baseline chapter_menu">
                            <h5 class=" modal-title">MENÚ CURSO</h5>
                            <button type="button" class="bg-transparent border-0" data-dismiss="modal" aria-label="Close">
                                <h2 class="text-primary" aria-hidden="true">&times;</h2>
                            </button>
                        </div>
                        @if($course->preview_image !== NULL && $course->preview_image !== '')
                            <div class="course_image">
                                <img src="{{ asset('/imagenes/cursos/'. $course->preview_image) }}" class="mt-4 mb-4 img-fluid" alt="" >
                            </div>
                        @endif

                        <div class="accordion menu-box" id="accordionExample">
                            @foreach($chapters as $chapter)
                                @if($chapter->status == '1')
                                    <div class="card">
                                        <div class="card-header chapter_title" id="heading{{ $chapter->id }}">
                                            <div class="flex-row mb-0 d-flex bd-highlight">
                                                <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapse{{ $chapter->id }}">
                                                    @if ($chapter->id == $selectedChapter)
                                                        <i class="fa fa-minus"></i>
                                                        @else
                                                        <i class="fa fa-plus"></i>
                                                    @endif
                                                    <span class="">
                                                        @if(Auth::User()->role == 'admin')
                                                            {{ $chapter->id }} -
                                                        @endif
                                                        {{$chapter->chapter_name}}
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                        <div id="collapse{{ $chapter->id }}" class="collapse @if ($chapter->id == $selectedChapter) show @endif" aria-labelledby="heading{{ $chapter->id }}" data-parent="#accordionExample">
                                            <div class="p-0 card-body chapter_menu">
                                                @if (isset($chapter->course_classes) &&  $chapter->course_classes->count())
                                                    @foreach($chapter->course_classes as $class)
                                                        @if($class->coursechapter_id == $chapter->id)
                                                            <div class="pt-2 pb-1 col-lg-12">
                                                                <a href="javascript:void" class="" style="text-decoration:none">
                                                                    <h6 class="text-left text-item"
                                                                        wire:click="selectThisClassFromModal({{$chapter->id}}, {{$class->id}}, '{{$class->url}}', '{{$chapter->chapter_name}}', '{{$class->title}}', '{{$class->type}}', '{{$class->duration}}')"
                                                                        >
                                                                        <span @if($class->id == $selectedClass)  class="dot_active" @else class="dot" @endif id="class_dot_{{$class->id}}"></span>
                                                                        @if(Auth::User()->role == 'admin')
                                                                            {{ $class->id }} -
                                                                        @endif
                                                                        {{ $class->title }}
                                                                        @if($class->completed) <i class="ml-2 fa fa-check text-success"></i>@endif
                                                                    </h6>
                                                                </a>
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $class->seen }}%" aria-valuenow="{{ $class->seen }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>

</div>
