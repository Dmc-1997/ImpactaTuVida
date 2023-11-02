<!DOCTYPE html>
<html lang="es-co">

<head>
    <title>Cursos</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/fontawesome_5_8/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/toaster/toastr.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('/themes/advanced/css/style.css') }}" type="text/css"> --}}


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="{{asset('themes/advanced/css/new-css.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('/themes/advanced/js/pace.js') }}"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/rating.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,700;0,900;1,100;1,200;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    
    @livewireStyles

    @yield('head')
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        span,
        p,
        a,
        label,
        button {
            font-family: 'Montserrat', sans-serif;
        }

        .border-danger {
            border: 3px red solid;
        }

        .my-fixed-item {
            position: fixed;
            min-height: 120px;
            /*width: 100%;*/
            text-align: center;
            word-wrap: break-word;
        }

        .progress {
            height: 0.25rem;
        }

        .video-container {
            width: 100%;
            padding-top: 56.25%;
            height: 0px;
            position: relative;
        }

        .video {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }

        .close-modal {
            position: absolute;
            top: -8px;
            font-size: 1.5rem;
            color: #AFDB00 !important;
        }

        .menu-group a {
            text-decoration: none;
            color: #7929e2 !important;
        }

        .text-primary {
            color: #7929e2 !important;
        }

        .toast {
            background-color: #030303
        }

        .toast-success {
            background-color: #51a351
        }

        .toast-error {
            background-color: #bd362f
        }

        .toast-info {
            background-color: #2f96b4
        }

        .toast-warning {
            background-color: #f89406
        }

        .ui-datepicker {
            width: auto;
        }
        .ui-datepicker td a {
            padding: 0;
        }

        .ui-datepicker table {
            font-size: .8em;
        }
        .ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default, .ui-button, html .ui-button.ui-state-disabled:hover, html .ui-button.ui-state-disabled:active {
            border: 0px solid #c5c5c5;
            background: #f6f6f6;
            font-weight: 500;
            text-align: center;
            color: #454545;
        }
        .ui-widget-header {
            border: 0;
            background: #fff;
        }
        .ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default, .ui-button, html .ui-button.ui-state-disabled:hover, html .ui-button.ui-state-disabled:active {
            border: 0px solid #7929e2;
            background: #fff;
        }

        .ui-state-highlight, .ui-widget-content .ui-state-highlight, .ui-widget-header .ui-state-highlight {
            border: 1px solid #7929e2;
            background: #7929e2;
            color: #fff;
            border-radius: 3px;
        }

        .ui-datepicker-month, 
        .ui-datepicker-year, .ui-datepicker th{
            font-size: 8px;
        }

        a.ui-state-default {
            margin: 1px 8px 1px 1px;
            font-size: 8px;
            line-height: 1.4rem;
        }

        .ui-widget.ui-widget-content {
            border: 0px solid #c5c5c5;
            background-color: #f9fafb;
            border-radius: 10px;
            box-shadow: 0 1px 4px 3px hsla(240,4%,91%,.71);
        }

        a.ui-state-default.ui-state-hover:hover {
            background: #7929e2;
            color: white;
            border-radius: 3px;
        }

    </style>

    @php
        $team_id = Auth::user()->current_team_id;
        if ($team_id) {
            $team = \App\Models\Team::whereId($team_id)->first();
            if (!is_null($team)) {
                echo '<style>' . $team->style_admin . '</style>';
            }
        }
    @endphp

    @yield('style')
</head>

<body class="">

    <div class="container-fluid mt-2">
        <div class="row header_container-mobile__Idmb0 header_container-tablet__yhYrc">
            <div class="col-2 p-2 header_container-logo__ZLvGb">
                <a href="/home">
                    <img
                        class="header_logo__TmkQW"
                        src="{{ asset('imagenes/logos/logo.png') }}"
                        alt="logo"
                    />
                </a>
            </div>
            <div class="col-8 p-4 d-flex align-items-center header_container-user__Q8xwW">
                <div class="header_container-data-user__UW9Rx">
                    <div class="row col-lg-12">
                        <div class="col-lg-8 d-flex align-items-center">
                            <div class="header_container-foto-perfil__H3Jsx">
                                <img class="header_foto-perfil__uNXD7" src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}" />
                            </div>
                            <span>{{ auth()->user()->name }}</span>
                        </div>
                        <div class="col-lg-4" style="text-align:right;">
                                <a class="btn btn-success" href="{{ route('logoutv2') }}"onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-right"></i> Salir -
                                </a>
                                <form id="logout-form" action="{{ route('logoutv2') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-2 p-2 header_container-pricipal-search__Dhoo7">
                <div class="header_container-search__rxelc">
                    <img
                        class="header_icon-search__D-Dmx"
                        src="data:image/png;base64,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"
                        alt="icon-sarch"
                    />
                    <div><input id="txtBusquedaCursos" class="class-basic border-0 header_input-search__16YwK" type="text" placeholder="Buscar" /></div>
                </div>
            </div>
            <div class="col-4 p-2 header_container-menu-hamburguesa__LwPTN">
                <button class="header_style-button-hamburguer__Zw4rj" id="btn-hamburguer">
                    <img
                        src="data:image/png;base64,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"
                        alt="icon-hamburguer"
                        class="header_icon-hamburger__k2OYg"
                    />
                </button>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row Layout_container-responsive__ZVDfl">
            <div class="col-2 p-4 Layout_style-navbar__V0aXl">
                @include('themes.advanced.partials.admin_sidebar_movil')
            </div>
            <div class="mt-4 header_container-menu-nav__TFAFj" id="container-menu-nav">
                @include('themes.advanced.partials.admin_sidebar_movil')
            </div>

            <div class="col-8 p-4 Layout_container-responsive-children__E9Wi7">

                @yield('content_breadcrumb')

                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ $error }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endforeach
                @endif

                @yield('message')

                @include('flash::message')

                @yield('content')

                <div id="toaster"></div>

            </div>
            <div class="col-2 p-4 Layout_style-sidebar__bu7pR">
                <div id="datepicker"></div>
                @livewire('category')
            </div>
        </div>
    </div>

    <div id="snackbar"></div>


    <div class="modal fade" id="videoIntroModal" tabindex="-1" aria-labelledby="videoIntroModal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-none">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="p-0 modal-body">
                    <div class="d-flex flex-row-reverse ">
                        <span class="text-end">
                            <i class="fa fa-times close-modal" data-dismiss="modal"></i>
                        </span>
                    </div>
                    <div class="">
                        <div class="video-container">

                            <div id="video_modal" class="video"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    <script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/vendor/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/vendor/popper/popper.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/vendor/toaster/toastr.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/themes/advanced/js/app.js') }}"></script>


    <script src="{{ asset('vendor/bootstrap_5_0_1/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('themes/advanced/js/custom.js')}}"></script>

        <script>
        $(document).on("keyup", "#txtBusquedaCursos", function(e) {
            console.log($("#txtBusquedaCursos").val());
        });

        
    </script>

    @stack('scripts')
    @livewireScripts
    
    <script>

        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        function isNull(x) {
            if (x === null) {
                return "";
            }
            return x;
        }

        function showMessage(msg) {
            $("#snackbar").html(msg);
            var x = document.getElementById("snackbar");
            x.class = "show";
            setTimeout(function() {
                x.class = x.class.replace("show", "");
            }, 3000);
        }

        window.addEventListener('show-message', event => {
            if (event.detail.type == 'info') {
                toastr.info(event.detail.message);
            } else if (event.detail.type == 'error') {
                toastr.error(event.detail.message);
            } else if (event.detail.type == 'warning') {
                toastr.warning(event.detail.message);
            } else {
                toastr.success(event.detail.message);
            }
        });

        window.addEventListener('user-added-to-team', event => {
            window.livewire.emit('userAddedToTeam');
        });

        function confirmDestroyRow(goToListener, id) {
            Swal.fire({
                title: '¿Está seguro?',
                text: "No puede revertir esta acción!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#11529A',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, borrarlo!'
            }).then((result) => {
                if (result.value) {
                    console.log(goToListener)
                    window.livewire.emit(goToListener, id);
                }
            })
        }

        /*======== TOASTER ========*/
        var toaster = $('#toaster')

        function callToaster(positionClass) {
            toastr.options = {
                closeButton: true,
                debug: false,
                newestOnTop: false,
                progressBar: true,
                positionClass: positionClass,
                preventDuplicates: false,
                onclick: null,
                showDuration: "300",
                hideDuration: "1000",
                timeOut: "5000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut"
            };
        }

        if (toaster.length != 0) {

            if (document.dir != "rtl") {
                callToaster("toast-top-right");
            } else {
                callToaster("toast-top-left");
            }

        }

        /*======== INFO BAR ========*/
        var infoTeoaset = $('#toaster-info, #toaster-success, #toaster-warning, #toaster-danger');
        if (infoTeoaset !== null) {
            infoTeoaset.on('click', function() {
                toastr.options = {
                    closeButton: true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "3000",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                var thisId = $(this).attr('id');
                if (thisId === 'toaster-info') {
                    toastr.info("Experiencia", " Info message");

                } else if (thisId === 'toaster-success') {
                    toastr.success("Experiencia", "Success message");

                } else if (thisId === 'toaster-warning') {
                    toastr.warning("Experiencia", "Warning message");

                } else if (thisId === 'toaster-danger') {
                    toastr.error("Experiencia", "Danger message");
                }

            });
        }
    </script>

    <script>
        $('#videoIntroModal').on('show.bs.modal', function(event) {
            var url = $($(event.currentTarget)[0].firstElementChild).attr('data-url');
            $('#video_modal').html(`<iframe src="`+url+`" style=”border:0;height:100%;width:100%;max-width:100%” class="video" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>`);
            
        });

        $("#videoIntroModal").on('hidden.bs.modal', function(e) {
            $('#video_modal').html('')
        });
    </script>

    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>

        $.datepicker.regional['es'] = {
            closeText: 'Chiudi', // set a close button text
            currentText: 'Oggi', // set today text
            monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'], // set month names
            monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'], // set short month names
            dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'], // set days names
            dayNamesShort: ['Dom','Lun','Mar','Mier','Jue','Vie','Sab'], // set short day names
            dayNamesMin: ['D','L','M','M','J','V','S'], // set more short days names
            dateFormat: 'dd/mm/yy' // set format date
        };

        $.datepicker.setDefaults($.datepicker.regional['es']);

        $('#datepicker').datepicker({
            language: "es",
        });
    </script>

    @yield('js')
</body>

</html>
