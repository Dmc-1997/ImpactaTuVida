@extends('themes.advanced.admin', ['nav_active' => -1,
                        'title' =>  'Administración | Gerenciando'
                        ])
@section('content')

<div class="mb-8 row">
    <div class="mb-4 col-lg-10 col-md-8 col-sm-8 col-xs-12">
        <h1 class="mb-2 text-gray-800 h3">Configuración de la instalación</h1>
        <p class="mb-0"></p>
    </div>
    <div class="mb-4 col-lg-2 col-md-4 col-sm-4 col-xs-12">
        <a href="{{ route('mysettings.index') }}" title="Nuevo" class="btn btn-primary btn-block"> Configuración</a>
    </div>
</div>



<div class="mb-4 shadow card">
    <div class="py-3 card-header">
        <div class="row">
            <div class="col-md-10">
                <h6 class="m-0 font-weight-bold text-primary">Configuración de la instalación: Base de datos <strong>"{{ env('DB_DATABASE')}}"</strong></h6>
            </div>
            <div class="col-md-2">
                <a href="javascript:void(0);" class="mb-2 btn btn-outline-primary" onclick="emailTest()" id="btn_email">Probar Correo</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-borderless table-hover" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <th>Variable</th>
                    <th>Valor</th>
                    <th>Acción</th>
                </tr>

                @include('admin.includes.texts', ['config' => $envConfig[0]])
                @include('admin.includes.select',['config' => $envConfig[1], 'data' => $setenv ])
                @include('admin.includes.bool',  ['config' => $envConfig[2]])
                @include('admin.includes.texts', ['config' => $envConfig[23]])
                @include('admin.includes.texts', ['config' => $envConfig[24]])
                @include('admin.includes.texts', ['config' => $envConfig[25]])
                @include('admin.includes.texts', ['config' => $envConfig[26]])
                @include('admin.includes.texts', ['config' => $envConfig[27]])
                @include('admin.includes.texts', ['config' => $envConfig[28]])


                @include('admin.includes.texts', ['config' => $envConfig[3]])
                @include('admin.includes.texts', ['config' => $envConfig[4]])
                @include('admin.includes.texts', ['config' => $envConfig[5]])
                @include('admin.includes.texts', ['config' => $envConfig[6]])
                @include('admin.includes.texts', ['config' => $envConfig[7]])
                @include('admin.includes.texts', ['config' => $envConfig[8]])
                @include('admin.includes.texts', ['config' => $envConfig[9]])
                @include('admin.includes.texts', ['config' => $envConfig[10]])


                @include('admin.includes.texts', ['config' => $envConfig[11]])
                @include('admin.includes.texts', ['config' => $envConfig[12]])


                @include('admin.includes.texts', ['config' => $envConfig[13]])
                @include('admin.includes.texts', ['config' => $envConfig[14]])


                @include('admin.includes.texts', ['config' => $envConfig[15]])
                @include('admin.includes.texts', ['config' => $envConfig[16]])


                @include('admin.includes.texts', ['config' => $envConfig[17]])
                @include('admin.includes.texts', ['config' => $envConfig[18]])
                @include('admin.includes.bool', ['config' => $envConfig[19]])
                @include('admin.includes.select', ['config' => $envConfig[20], 'data' => $captchapos ])
                @include('admin.includes.texts', ['config' => $envConfig[21]])
                @include('admin.includes.bool', ['config' => $envConfig[22]])




            </table>
        </div>
    </div>
</div>



@endsection
@section('js')
<script>
function updateConfig(x) {
    $('#btn_'+x).fadeOut(1000);

    var value = $("#config_"+x).val();
    var dataString={
        'id': x,
        'value': value
    };
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "POST",
        url: "{{ route('admin.config.env.update') }}",
        data: dataString,
        beforeSend: function () {
        },
        success: function(data) {
            $('#btn_'+x).fadeIn(500);
            $('#btn_'+x).html('Actualizado');
            setTimeout(function() {
                $('#btn_'+x).html('Actualizar');
                }, 3000);

            /*
            setTimeout(function(){
                window.location.href = "/login";
            }, 5000);
            */

        }
    });
}

function emailTest() {
    $('#btn_email').fadeOut(1000);
    var dataString = {};
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "POST",
        url: "{{ route('admin.config.email.test') }}",
        data: dataString,
        beforeSend: function () {
        },
        success: function(data) {
            $('#btn_email').fadeIn(500);
            $('#btn_email').html('Enviando...');
            setTimeout(function(){
                $('#btn_email').html('Enviado!');
            }, 3000);
        }
    });
}
</script>
@endsection
