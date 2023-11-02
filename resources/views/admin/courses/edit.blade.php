@extends('themes.advanced.admin', ['nav_active' => 3,
    'title' =>  'Administración '
])
@section('content')


@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <div class="col-md-12">
        <div class="container-fluid p-4 mb-5 EditCategories_box-container__29mrQ" style="height: 100%;width:100%">
            <div class="d-flex bd-highlight">
                <div class="col-lg-8 col-6">
                    <span class="mt-2 courses_title-style-curses-web__-RV8j"> Editar Curso</span>
                </div>
                <div class="col-lg-4 col-6" align="right">
                    <a class="btn btn-style" style="width: auto;" href="{{ route('admin.courses.index') }}">Regresar</a>
                    <a href="{{ route('course.show', ['id' => $course->id, 'slug' => $course->slug]) }}" style="width: auto;" class="btn btn-style" target="_blank">
                        Explorar
                    </a>
                    <a href="{{ route('members.courses.show', $course->id) }}" class="btn btn-style" style="width: auto;" target="_blank">
                        Ver curso
                    </a>
                </div>
            </div>

            <div class="card-body">
                <div class="form-group">
                    {!! Form::open(['route' => ['admin.courses.update', $course->id], 'method' => 'put', 'files' => true]) !!}

                        <div class="mb-2 row">
                            <div class="col-md-4">
                                <label for="exampleInputTit1e">Categoría</label>
                                {!! Form::select('category_id', $categories,  $course->category_id, ['class' => "form-control input-data-configuration col-xs-12" ]) !!}
                            </div>
                            <div class="col-md-2">
                                <label for="exampleInputTit1e">Entrenador</label>
                                {!! Form::select('user_id', $userList,  $course->user_id, ['class' => "form-control input-data-configuration col-xs-12" ]) !!}
                            </div>
                            <div class="col-md-2">
                                <label for="exampleInputTit1e">Más Vendido</label>
                                {!! Form::select('more_selling', ['0' => "No", '1' => "SI"], $course->more_selling, ['class' => "form-control input-data-configuration col-xs-12" ]) !!}
                            </div>
                            <div class="col-md-2">
                                <label for="exampleInputTit1e">Destacado</label>
                                {!! Form::select('featured', ['0' => "No", '1' => "SI"], $course->featured, ['class' => "form-control input-data-configuration col-xs-12" ]) !!}
                            </div>
                            <div class="col-md-2">
                                <label for="exampleInputTit1e">Estado</label>
                                {!! Form::select('status', ['0' => "Inactivo", '1' => "Activo"], $course->status, ['class' => "form-control input-data-configuration col-xs-12" ]) !!}
                            </div>
                            {{-- <div class="col-md-2">
                                <label for="exampleInputTit1e">Academia</label>
                                {!! Form::select('academy', ['0' => "Inactivo", '1' => "Activo"], $course->academy, ['class' => "form-control input-data-configuration col-xs-12" ]) !!}
                            </div> --}}
                        </div>

                        <div class="mb-2 row">
                            <div class="col-md-12">
                                <label for="exampleInputTit1e">Título:<sup class="redstar">*</sup></label>
                                <input type="text" class="form-control input-data-configuration" name="title" id="exampleInputTitle" value="{{ $course->title }}" required>
                            </div>
                        </div>

                        <div class="mb-2 row">
                            <div class="col-md-6">
                                <label for="exampleInputTit1e">Descripción corta:<sup class="redstar">*</sup></label>
                                <textarea name="short_detail" rows="3" class="form-control input-data-configuration" required>{{ $course->short_detail }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputTit1e">Requisitos:<sup class="redstar">*</sup></label>
                                <textarea name="requirement" rows="3" class="form-control input-data-configuration" required>{{ $course->requirement }}</textarea>
                            </div>
                        </div>

                        <div class="mb-2 row">
                            <div class="col-md-12">
                                <label for="exampleInputTit1e">Detalle:<sup class="redstar">*</sup></label>
                                <textarea name="detail" rows="3" class="form-control input-data-configuration" required>{{ $course->detail }}</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="exampleInputTit1e">Qué incluye:</label>
                                <textarea name="it_includes" rows="3" class="form-control input-data-configuration" placeholder="">{{ $course->it_includes }}</textarea>
                            </div>
                        </div>
                        <br>
                        <hr />
                        <h4 class="style-title-actualice">Promoción del curso1</h4>
                        <br>
                        <div class="mb-2 row">
                            <div class="col-md-12 mb-4">
                                <label for="">URL Video de promoción</label>
                                <input type="text" name="url" id="url" value="{{ $course->url }}" placeholder="Enter Your URL" class="form-control input-data-configuration">
                            </div>
                            <div class="col-md-4">
                                @if ($course->preview_image !== NULL && $course->preview_image !== '')
                                    <img src="{{ asset('imagenes/cursos/'. $course->preview_image ) }}" width="80px" >
                                    <a href="{{ route('admin.courses.destroy.image', ['id' => $course->id, 'section' => 'main']) }}" class="text-danger btn btn-outline-danger" title="Eliminar">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                @else
                                    <img src="{{ asset('img/default.jpg') }}" width="80px" >
                                @endif
                                <br />
                                <label for="">Imagen principal</label><br />
                                <input type="file" name="preview_image" id="image" class="inputfile inputfile-1" />
                            </div>

                            <div class="col-md-4">
                                @if ($course->cover_image !== NULL && $course->cover_image !== '')
                                    <img src="{{ asset('imagenes/cursos/'. $course->cover_image ) }}" width="80px" >
                                    <a href="{{ route('admin.courses.destroy.image', ['id' => $course->id, 'section' => 'cover']) }}" class="text-danger btn btn-outline-danger" title="Eliminar">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                @else
                                    <img src="{{ asset('img/default.jpg') }}" width="80px" >
                                @endif
                                <br />
                                <label for="">Imagen Cover del curso</label><br />
                                <input type="file" name="cover_image" id="image" class="inputfile inputfile-1" />
                            </div>




                            <div class="col-md-4">
                                @if ($course->preview_image_video !== NULL && $course->preview_image_video !== '')
                                    <img src="{{ asset('imagenes/cursos/'. $course->preview_image_video ) }}" width="80px" >
                                    <a href="{{ route('admin.courses.destroy.image', ['id' => $course->id, 'section' => 'video']) }}" title="Eliminar" class="text-danger btn btn-outline-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                @else
                                    <img src="{{ asset('img/default.jpg') }}" width="80px" >
                                @endif
                                <br />
                                <label for="">Imagen para visualizar video de promoción</label><br />
                                <input type="file" name="preview_image_video" id="image" class="inputfile inputfile-1" />
                            </div>

                            {{-- <div class="col-md-6">
                                @if($course->bg_image !== NULL && $course->bg_image !== '')
                                    <img src="{{ asset('imagenes/cursos/'. $course->bg_image ) }}" width="80px" >
                                @else
                                    <img src="{{ asset('img/default.jpg') }}" width="80px" >
                                @endif
                                <br />
                                <label for="">Imagen de fondo</label><br />
                                <input type="file" name="bg_image" id="image" class="inputfile inputfile-1" />
                            </div> --}}
                        </div>
                        <br>
                        <hr />
                        <br>
                        <h4 class="style-title-actualice">Restricciones de acceso</h4>
                        <div class="mb-4 row">
                            <div class="col-md-3">
                                <label for="exampleInputSlug">En cuentos días se vence</label>
                                <input min="1" class="form-control input-data-configuration" name="duration" type="number" value="{{ $course->duration }}" id="duration" placeholder="7">
                            </div>

                            <div class="col-md-3">
                                <label for="exampleInputSlug">Duración del curso</label>
                                <input class="form-control input-data-configuration" name="minutes" type="text" id="minutes" value="{{ $course->minutes }}" placeholder="00:00">
                            </div>

                            <div class="col-md-3">
                                <label for="exampleInputSlug">Válido hasta</label>
                                <input class="form-control input-data-configuration" name="valid_until" type="date" id="valid_until" value="{{ $course->valid_until }}">
                            </div>

                            <div class="col-md-3">
                                <label for="exampleInputSlug">Equipos</label>
                                {!! Form::select('team_allow[]', $teams, $allow, ['class' => 'form-control input-data-configuration', 'multiple']) !!}
                            </div>
                        </div>
                        <br>
                        <hr />
                        <br>
                        <h4 class="style-title-actualice">Sección llamados a la Acción </h4>
                        <div class="mb-4 row">
                            <div class="col-md-3">
                                <label for="exampleInputSlug">Activar acción con imagen?</label>
                                {!! Form::select('action_image', ['0' => "Inactivo", '1' => "Activo"], $course->action_image, ['class' => "form-control input-data-configuration" ]) !!}
                            </div>
                            <div class="col-md-3">
                                <label for="exampleInputSlug">Url ubicación de la imagen</label>
                                <input class="form-control input-data-configuration" name="action_image_path" type="text" value="{{ $course->action_image_path }}">
                            </div>
                            <div class="col-md-3">
                                <label for="exampleInputSlug">Url destino de la imagen</label>
                                <input class="form-control input-data-configuration" name="action_image_url" type="text" value="{{ $course->action_image_url }}">
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <div class="col-md-3">
                                <label for="exampleInputSlug">Activar botón de compra?</label>
                                {!! Form::select('action_button', ['0' => "Inactivo", '1' => "Activo"], $course->action_button, ['class' => "form-control input-data-configuration" ]) !!}
                            </div>
                            <div class="col-md-3">
                                <label for="exampleInputSlug">Texto en el botón</label>
                                <input class="form-control input-data-configuration" name="action_button_text" type="text" value="{{ $course->action_image_path }}">
                            </div>
                            <div class="col-md-3">
                                <label for="exampleInputSlug">Url destino del botón</label>
                                <input class="form-control input-data-configuration" name="action_button_url" type="text" value="{{ $course->action_image_url }}">
                            </div>
                        </div>
                        <br>
                        <hr />
                        <br>
                        <h4 class="style-title-actualice">Sección Certicación </h4>
                        <div class="mb-4 row">
                            <div class="col-md-3">
                                <label for="exampleInputSlug">Cuantas clases para certificar?</label>
                                {!! Form::text('classes_to_certificate', $course->classes_to_certificate, ['class' => "form-control input-data-configuration" ]) !!}
                            </div>
                        </div>

                        {!! Form::submit('Guardar!', ['class' => 'btn btn-style', 'style' => 'width:100%']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
@endsection
