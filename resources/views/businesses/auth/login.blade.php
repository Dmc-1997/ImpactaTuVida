@extends('layouts.academy')
@section('head')
    @if ($team->bg_color)
        <style>
            body {
                background-color: {{ $team->bg_color }};
            }
        </style>
    @else
        <style>
            body {
                background: url('{{ $bg_image }}') no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                background-size: cover;
                -o-background-size: cover;
            }
        </style>
    @endif
    <style>
        .card {
            border-radius: 3rem;
        }



        {{ $team->style_login }}
    </style>
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="text-left col-lg-6 offset-md-3 text-center">
                    <img src="{{ $logo }}" class="logo" />
                </div>
            </div>

            <div class="mt-0 row">
                <div class="text-left col-lg-6 offset-md-3">
                    <div class="card_centered">
                        <h4 class="mt-0 mb-4 text-center text-white "><strong>INICIA SESIÓN PARA VER LAS CLASES</strong></h4>
                        <div class="p-2 card p-md-4">
                            <div class="card-body">
                                <div class="text-center">
                                    <h1 class="mb-0"><strong>BIENVENID@</strong></h1>
                                    <h2 class="mt-0 mb-5"><span class="text-uppercase text-danger"><strong></strong></span>
                                    </h2>
                                </div>

                                @include('flash::message')

                                @if (session('status'))
                                    <div class="mb-4 text-sm font-medium text-green-600">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div>
                                        <x-jet-label for="email" value="{{ __('Email') }}" />
                                        <x-jet-input id="email" class="text-center form-control input_theme"
                                            type="email" name="email" :value="old('email')" required autofocus />
                                    </div>

                                    <div class="mt-4">
                                        <x-jet-label for="password" value="{{ __('Password') }}" />
                                        <x-jet-input id="password" class="text-center form-control input_theme"
                                            type="password" name="password" required autocomplete="current-password" />
                                    </div>

                                    <div class="block mt-4">
                                        <label for="remember_me" class="flex items-center">
                                            <x-jet-checkbox id="remember_me" name="remember" />
                                            <span class="ml-2 text-sm text-gray-600">Recordarme</span>
                                        </label>
                                    </div>

                                    <div class="flex items-center justify-end mt-4">
                                        <button type="submit"
                                            class="btn btn-login btn-block btn-theme"><strong>ENTRAR</strong></button>
                                    </div>
                                </form>

                                <br />
                                <div class="text-center">
                                    <a href="/recuperar-contrasena">¿Olvidó su contraseña?</a>
                                </div>

                            </div>
                        </div>
                        <h6 class="mt-5 text-center text-white ">Powered by Impacta tu vida</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
