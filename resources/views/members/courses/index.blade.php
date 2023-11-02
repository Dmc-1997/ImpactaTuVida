@extends('themes.advanced.admin', ['nav_active' => 3, 'title' => 'Campus '])
@section('head')
<link rel="stylesheet" href="{{ asset('themes/advanced/css/courses.css') }}">
@endsection
@section('content')
    <livewire:members.courses.index></livewire:members.courses.index>
@endsection
@section('js')
@endsection
