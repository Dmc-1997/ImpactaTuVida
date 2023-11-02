@extends('themes.advanced.admin', ['nav_active' => -2, 'title' => 'Administración '])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mt-3 text-left col-12">
                    <div class="pl-10 mt-2 mb-4 text-basic">
                        <h3>Editar contraseña</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 offset-md-2">
                @livewire('members.profile.pwupdate')
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
