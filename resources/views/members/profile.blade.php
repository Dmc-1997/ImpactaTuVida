@extends('themes.advanced.admin', ['nav_active' => -2, 'title' => 'Administración '])

@section('content')
    <div class="mb-8 row">
        <div class="mb-4 col-lg-10 col-md-8 col-sm-8 col-xs-12">
            <strong class="configuration_style-title__4oIuj">Editar perfil</strong>
            <p class="mb-0"></p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                @livewire('profile.update-profile-information-form')
                @livewire('members.profile.pwupdate')
            </div>
            <div class="col-md-8">
                @livewire('members.profile', ['data' => $user], key($user->id))
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
