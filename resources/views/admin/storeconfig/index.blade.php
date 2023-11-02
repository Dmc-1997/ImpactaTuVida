@extends('themes.advanced.admin', ['nav_active' => -1,
'title' => 'Administración | Gerenciando'
])
@section('head')
<style>
    .list-group{
        background: white;
        border-radius: 15px;
        box-shadow: 0px 1px 4px 3px rgb(230 230 232 / 71%);
    }
</style>
@endsection
@section('content')

<div class="mb-8 row">
    <div class="mb-4 col-lg-9 col-md-8 col-sm-8 col-xs-12">
        <strong class="style-title-actualice">Variables de Configuración</strong>
        <p class="mb-0"></p>
    </div>
    <div class="mb-4 col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <a href="{{ route('mysettings.index') }}" title="Nuevo" style="width: 100%" class="btn btn-style "> Configuración</a>
    </div>
</div>

    <livewire:admin.storeconfig.table></livewire:admin.storeconfig.table>

@endsection
