@extends('themes.advanced.admin', ['nav_active' => 1,
                            'title' =>  'Administración '
                        ])

@section('content')

<div class="mb-8 row">
    <div class="mb-4 col-lg-10 col-md-8 col-sm-8 col-xs-12">
        <strong class="style-title-actualice">Usuarios</strong>
        <p class="mb-0"></p>
    </div>
</div>

<div class="container-fluid p-4 mb-5 mt-4 box-container">
    <div class="row">
        <div class="col-6">
            <ul>
                <ol>1. Descarga el ejemplo de excel para importar los usuarios de tu empresa</ol>
                <ol>2. Llena el excel</ol>
                <ol>3. Sube el archivo</ol>
            </ul>
            <a href="{{ route('businesses.users.download') }}" class="btn btn-style">Descargar Ejemplo</a>
            <br>
            <br>
        </div>
        <div class="col-6">

        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route' => 'businesses.users.import.upload', 'method' => 'POST', 'files'=> true]) !!}
                    <div class="input-group mb-3">
                        <input
                            type="file"
                            name="image"
                            class="form-control col-lg-6"
                            placeholder=""
                            aria-label=""
                            aria-describedby="button-file"
                            >
                        <div class="input-group-append col-lg-2">
                            <button
                                class="btn btn-style"
                                type="submit"
                                id="button-file"
                                >
                                Subir
                            </button>
                        </div>
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>

    </div>
</div>




@endsection
@section('js')
@endsection
