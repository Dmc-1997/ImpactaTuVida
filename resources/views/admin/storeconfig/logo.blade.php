@extends('themes.advanced.admin', ['nav_active' => -1,
'title' => 'Administración | Gerenciando'
])

@section('head')
@endsection
@section('content')

<div class="mb-8" align="right">
    <div class="mb-4 col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <a href="{{ route('mysettings.index') }}" title="Nuevo" type="button" style="width: 100%" class="btn btn-style"> Configuración</a>
    </div>
</div>

<div class="container-fluid p-4 mb-5 text-center EditLogo_line-divider-boton__-tZco">
    {!! Form::open(['route' => ['admin.store.config.update', 0], 'method' => 'PUT', 'files'=> true]) !!}
    <div class="row">
        <div class="grid-containe"><span class="EditLogo_style-title-logos__WQ8vq">Logo</span></div>
    </div>
    <div class="row mt-3">
        <div class="grid-containe">
            <div class="mt-3">
                @if(file_exists( public_path().'/imagenes/logos/logo.png'))
                    <img src="{{ asset('imagenes/logos/logo.png') }}" style="height:auto;" class="EditLogo_style-img-perfil__gMJSB" id="img-perfil" />
                @else
                    <img src="{{ asset('images/logo.png') }}" style="height:auto;" class="EditLogo_style-img-perfil__gMJSB" id="img-perfil" />
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="grid-containe mt-3">
            <div class="EditLogo_container-input__jjzaG">
                <div>
                    <input type="file" name="image" id="file" class="inputfile inputfile-4" />
                    <label for="file-4"><span class="iborrainputfile iborrainputfile">Selecionar una imagen</span></label>
                </div>
            </div>
            <span>Tamaño sugerido (250px por 250px)</span>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-3">
            {!! Form::submit('Actualizar', ['class' => 'btn-style']) !!}
            {{-- <button type="button" class="btn-style">Guardar</button> --}}
        </div>
    </div>
    {!! Form::close() !!}
</div>

<div class="p-4 mb-5 container-fluid personalization_box-container__Gpida">
    {!! Form::open(['route' => ['admin.store.config.update', 1], 'method' => 'PUT', 'files'=> true]) !!}
    <div class="row">
        <div class="mt-3 p-4 personalization_container-backgraund__08-h2">
            <span class="mt-3">Editar imagen Background del login</span>
            <div class="mt-4 d-flex personalization_image-upload-wrap__7Acpe">
                <div><div class="container-DragAndDrop"></div></div>
            </div>
            <div></div>
            <div class="d-flex col mt-3">
                @if(file_exists( public_path().'/imagenes/logos/background.png'))
                    <img src="{{ asset('imagenes/logos/background.png') }}" class="personalization_icon-photo__W7T63"  />
                @else
                    <img src="{{ asset('images/background.png') }}" class="personalization_icon-photo__W7T63"  />
                @endif
                
                <div class="d-flex">
                    <div class="ms-3 personalization_container-upload-img__DNRdN">
                        <span>Arrastra una imagen hasta aqui o</span>
                        <div>
                            <input type="file" name="image" id="file" class="inputfile inputfile-4" data-multiple-caption="{count} archivos seleccionados" multiple="" />
                            <label for="file-4"><span class="iborrainputfile ms-3">sube un archivo</span></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-3 personalization_container-bottom__TV6ha">
            {!! Form::submit('Actualizar', ['class' => 'btn-style']) !!}
            {{-- <div class="col-6 mt-3 text-center"><button type="button" class="btn-style" name="btnSaveImg">Guardar</button></div>
            <div class="col-6 mt-3 text-center"><button type="button" class="btn-style" name="btnDeleteImg">Eliminar</button></div> --}}
        </div>
    </div>
    {!! Form::close() !!}
</div>

@endsection
