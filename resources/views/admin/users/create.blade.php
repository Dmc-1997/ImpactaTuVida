@extends('themes.advanced.admin', ['nav_active' => 1,
                            'title' =>  'Administración '
                        ])

@section('content')

<div class="mb-8 row">
    <div class="mb-2 col-lg-10 col-md-8 col-sm-8 col-xs-12">
    </div>
    <div class="mb-2 col-lg-2 col-md-4 col-sm-4 col-xs-12">
        <a href="{{ route('admin.users') }}" title="Nuevo" class="btn btn-style "> Usuarios</a>
    </div>
</div>


<div class="row mt-4">
    <div class="col-sm-6">
        <div class="p-4 mb-5 container-fluid personalization_box-container__Gpida">
            <h5 class="style-title-actualice">Datos generales para crear empresas</h5>
        
            {!! Form::open(['route' => 'admin.users.store', 'method' => 'POST','class'=>'form-horizontal']) !!}
                <div class="form-group row">
                    {!! Form::label('name','Nombre',['class' => 'col-sm-3 align-self-center col-form-label']) !!}
                    <div class="col-sm-9">
                        {!! Form::text('name', null, ['class' => 'form-control input-data-configuration mt-2', 'placeholder' => 'Escriba el nombre', 'required']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('surname','Apellido',['class' => 'col-sm-3 align-self-center col-form-label']) !!}
                    <div class="col-sm-9">
                        {!! Form::text('surname', null, ['class' => 'form-control input-data-configuration mt-2', 'placeholder' => 'Escriba el apellido', 'required']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('email','Email',['class' => 'col-sm-3 align-self-center col-form-label']) !!}
                    <div class="col-sm-9">
                        {!! Form::text('email', null, ['class' => 'form-control input-data-configuration mt-2', 'placeholder' => 'Escriba el email', 'required']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('subdomain','subdominio',['class' => 'col-sm-3 align-self-center col-form-label']) !!}
                    <div class="col-sm-9">
                        {!! Form::text('subdomain', null, ['class' => 'form-control input-data-configuration mt-2', 'placeholder' => 'Escriba el subdominio', 'required']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('company','Empresa',['class' => 'col-sm-3 align-self-center col-form-label']) !!}
                    <div class="col-sm-9">
                        {!! Form::text('company', null, ['class' => 'form-control input-data-configuration mt-2', 'placeholder' => 'Escriba la empresa', 'required']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('country','País',['class' => 'col-sm-3 align-self-center col-form-label']) !!}
                    <div class="col-sm-9">
                        {!! Form::text('country', null, ['class' => 'form-control input-data-configuration mt-2', 'placeholder' => 'Escriba el país', 'required']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('nit','NIT',['class' => 'col-sm-3 align-self-center col-form-label']) !!}
                    <div class="col-sm-9">
                        {!! Form::text('nit', null, ['class' => 'form-control input-data-configuration mt-2', 'placeholder' => 'Escriba el nit', 'required']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('address','Dirección',['class' => 'col-sm-3 align-self-center col-form-label']) !!}
                    <div class="col-sm-9">
                        {!! Form::text('address', null, ['class' => 'form-control input-data-configuration mt-2', 'placeholder' => 'Escriba la dirección', 'required']) !!}
                    </div>
                </div>

                <div class="float-right form-group">
                    {!! Form::hidden('role', 'business', ['class' => 'form-control input-data-configuration mt-2', 'placeholder' => '', 'required']) !!}
                    {!! Form::submit('Guardar', ['class' => 'btn btn-style mt-3', 'style' => 'width: 100%']) !!}
                </div>
            {!! Form::close() !!}
        </div>
	</div>
    <div class="col-sm-6">
        <div class="p-4 mb-5 container-fluid personalization_box-container__Gpida">
            <h5 class="style-title-actualice">Datos generales para crear instructores</h5>
            {!! Form::open(['route' => 'admin.users.store', 'method' => 'POST','class'=>'form-horizontal']) !!}
                <div class="form-group row">
                    {!! Form::label('name','Nombre',['class' => 'col-sm-3 align-self-center col-form-label']) !!}
                    <div class="col-sm-9">
                        {!! Form::text('name', null, ['class' => 'form-control input-data-configuration mt-2', 'placeholder' => 'Escriba el nombre', 'required']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('surname','Apellido',['class' => 'col-sm-3 align-self-center col-form-label']) !!}
                    <div class="col-sm-9">
                        {!! Form::text('surname', null, ['class' => 'form-control input-data-configuration mt-2', 'placeholder' => 'Escriba el apellido', 'required']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('email','Email',['class' => 'col-sm-3 align-self-center col-form-label']) !!}
                    <div class="col-sm-9">
                        {!! Form::text('email', null, ['class' => 'form-control input-data-configuration mt-2', 'placeholder' => 'Escriba el email', 'required']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('detail','Detalle',['class' => 'col-sm-3 align-self-center col-form-label']) !!}
                    <div class="col-sm-9">
                        {!! Form::textarea('detail', null, ['class' => 'form-control input-data-configuration mt-2', 'placeholder' => 'Escriba el detalle']) !!}
                    </div>
                </div>

                <div class="float-right form-group">
                    {!! Form::hidden('role', 'instructor', ['class' => 'form-control input-data-configuration mt-2', 'placeholder' => '', 'required']) !!}
                    {!! Form::hidden('subdomain', 'unknown', ['class' => 'form-control input-data-configuration mt-2', 'placeholder' => '', '']) !!}
                    {!! Form::submit('Guardar', ['class' => 'btn btn-style mt-3', 'style' => 'width: 100%']) !!}
                </div>
            {!! Form::close() !!}
		</div>
	</div>
</div>




@endsection
@section('js')
@endsection
