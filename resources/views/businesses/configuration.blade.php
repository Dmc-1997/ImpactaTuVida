@extends('themes.advanced.admin', ['nav_active' => 2, 'title' => 'Administración '])

@section('content')

    <livewire:businesses.configuration :data="$team"></livewire:businesses.configuration>
@endsection
@section('js')
@endsection
