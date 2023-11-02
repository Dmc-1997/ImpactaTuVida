@extends('themes.advanced.admin', ['nav_active' => -1,
                           'title' =>  'Administración | Gerenciando'
                           ])

@section('content')

<div class="row mb-8">
    <div class="col-lg-10 col-md-8 col-sm-8 col-xs-12 mb-4">
        <h1 class="h3 mb-2 text-gray-800">Información de mi negocio</h1>
        <p class="mb-0"></p>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12 mb-4">
        <a href="{{ route('mysettings') }}" title="Nuevo" class="btn btn-primary btn-block"> Configuración</a>
    </div>
</div>


<div class="row">
    <div class="col-sm-12">
        <div class="card shadow">
            <div class="card-header">
                <h3>Logo</h3>
			</div>
			<div class="card-body">
				{!! Form::open(['route' => ['mysettings.update',$mysettings->id], 'method' => 'PUT','class'=>'form-horizontal']) !!}
					<div class="form-group">
						@if(file_exists( public_path().'/imagenes/logos/'.$mysettings->logo ) && ($mysettings->logo != '') && ($mysettings->logo != 'default.jpg'))
							<img src="{{ asset('imagenes/logos/'.$mysettings->logo) }}" width="150px" />
							<a href="{{ route('mysettings.destroy.logo') }}" class="btn btn-theme-dark mb-1 float-right"><i class="fa fa-trash"></i></a>
						@endif
					</div>

					<div class="form-group">
						{!! Form::label('logo','Imagen') !!}
						{!! Form::file('logo') !!}
						<div>
							<small class="text-danger">
								tamaño sugerido (48px por 48px) <br />
							</small>
						</div>
					</div>

					<div class="form-group float-right">
                        {!! Form::submit('Guardar', ['class' => 'btn btn-primary pull-right']) !!}
                    </div>

				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection
@section('js')

@endsection