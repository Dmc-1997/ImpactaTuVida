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

<div class="container-fluid">
    <span class="configuration_style-title__4oIuj">Mi negocio</span>
    <div class="Menu_container-submenu__8Bmns">
        <nav class="">
            <ul class="nav mb-3 mt-3">
                @if (Auth::user()->id==1)
                    <li class="Menu_nav-item__1G1ac"><a class="Menu_style-nav__NbCaC" href="{{	route('admin.start') }}">Run Start Configuration</a></li>
                    <li class="Menu_nav-item__1G1ac"><a class="Menu_style-nav__NbCaC" href="{{	route('admin.config.env') }}">Env</a></li>
                    <li class="Menu_nav-item__1G1ac"><a class="Menu_style-nav__NbCaC" href="#"> Base de datos <strong>"{{ env('DB_DATABASE')}}"</strong></a></li>
                @endif
                <li class="Menu_nav-item__1G1ac"><a class="Menu_style-nav__NbCaC" href="{{	route('admin.store.config.logo') }}">Logo</a></li>
                <li class="Menu_nav-item__1G1ac"><a class="Menu_style-nav__NbCaC" href="{{	route('admin.store.config') }}">Variables de configuración</a></li>
            </ul>
        </nav>
    </div>
</div>

@endsection
@section('js')

@endsection
