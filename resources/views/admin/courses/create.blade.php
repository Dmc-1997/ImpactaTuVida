@extends('themes.advanced.admin', ['nav_active' => 0,
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
        <div class="container-fluid p-4 mb-5 EditCategories_box-container__29mrQ">
            <div class="row">
                <div class="col-lg-8 col-10">
                    <span class="mt-2 courses_title-style-curses-web__-RV8j"> Agregar Curso</span>
                </div>
                <div class="col-lg-4 col-2" align="right">
                    <a class="btn btn-style" style="width: auto;" href="{{ route('admin.courses.index') }}">Regresar</a>
                </div>
            </div>

            <div class="form-group">
                <form action="{{ route('admin.courses.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-2 row">
                        <div class="col-md-3">
                            <label for="exampleInputTit1e">Categoría</label>
                            {!! Form::select('category_id', $categories,  null, ['class' => "form-control input-data-configuration col-xs-12" ]) !!}
                        </div>
                        <div class="col-md-3">
                            <label for="exampleInputTit1e">Entrenador</label>
                            {!! Form::select('user_id', $userList,  1, ['class' => "form-control input-data-configuration col-xs-12" ]) !!}
                        </div>
                        <div class="col-md-3">
                            <label for="exampleInputTit1e">Destacado</label>
                            {!! Form::select('featured', ['0' => "No", '1' => "SI"], 0, ['class' => "form-control input-data-configuration col-xs-12" ]) !!}
                        </div>
                        <div class="col-md-3">
                            <label for="exampleInputTit1e">Estado</label>
                            {!! Form::select('status', ['0' => "Inactivo", '1' => "Activo"], 0, ['class' => "form-control input-data-configuration col-xs-12" ]) !!}
                        </div>
                    </div>

                    <div class="mb-2 row">
                        <div class="col-md-12">
                            <label for="exampleInputTit1e">Título:<sup class="redstar">*</sup></label>
                            <input type="text" class="form-control input-data-configuration" name="title" id="exampleInputTitle" value="" required>
                        </div>
                    </div>

                    <div class="mb-2 row">
                        <div class="col-md-6">
                            <label for="exampleInputTit1e">Descripción corta:<sup class="redstar">*</sup></label>
                            <textarea name="short_detail" rows="3" class="form-control input-data-configuration" required></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputTit1e">Requisitos:<sup class="redstar">*</sup></label>
                            <textarea name="requirement" rows="3" class="form-control input-data-configuration" required></textarea>
                        </div>
                    </div>

                    <div class="mb-2 row">
                        <div class="col-md-12">
                            <label for="exampleInputTit1e">Detalle:<sup class="redstar">*</sup></label>
                            <textarea name="detail" rows="3" class="form-control input-data-configuration" required></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="exampleInputTit1e">Qué incluye:</label>
                            <textarea name="it_includes" rows="3" class="form-control input-data-configuration" placeholder=""></textarea>
                        </div>
                    </div>

                    <hr />
                    <h4>Promoción del curso</h4>
                    <div class="mb-2 row">
                        <div class="col-md-6">
                            <label for="">Url</label>
                            <input type="text" name="url" id="url" placeholder="Enter Your URL" class="form-control input-data-configuration">
                        </div>
                        <div class="col-md-6">
                            <label for="">Imagen</label><br />
                            <input type="file" name="preview_image" id="image" class="inputfile inputfile-1" />
                        </div>
                        <div class="col-md-6">
                            <label for="">Imagen de fondo</label><br />
                            <input type="file" name="bg_image" id="image" class="inputfile inputfile-1" />
                        </div>
                    </div>

                    <hr />
                    <h4>Restricciones de acceso</h4>
                    <div class="mb-4 row">
                        <div class="col-md-3">
                            <label for="exampleInputSlug">En cuentos días se vence</label>
                            <input min="1" class="form-control input-data-configuration" name="duration" type="number" id="duration" placeholder="7">
                        </div>

                        <div class="col-md-3">
                            <label for="exampleInputSlug">Duración del curso</label>
                            <input class="form-control input-data-configuration" name="minutes" type="text" id="minutes" placeholder="00:00">
                        </div>

                        <div class="col-md-3">
                            <label for="exampleInputSlug">Válido hasta</label>
                            <input class="form-control input-data-configuration" name="valid_until" type="date" id="valid_until">
                        </div>
                    </div>
                    <hr />
                    <div align="center">
                        <button type="submit" class="float-right btn btn-lg col-md-4 btn-style btn-block">Guardar</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

@endsection

@section('js')


@endsection
