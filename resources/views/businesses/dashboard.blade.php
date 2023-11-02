@extends('themes.advanced.admin', ['nav_active' => 0, 'title' => 'Administración '])

@section('css')
<style>
    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 310px;
        max-width: 800px;
        margin: 1em auto;
    }

    #container {
        height: 400px;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }

    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }

    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
        padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }
    
</style>
@endsection
@section('content')

    {{-- <div class="row justify-content-end">
        <div class="col-lg-3 pb-2">
            <a class="nav-link btn-style" href="{{ route('logoutv2') }}"onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out"></i> Salir
            </a>
            <form id="logout-form" action="{{ route('logoutv2') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div> --}}

    <div class="">
        <div class="container-fluid p-4 dashboard_styles-background__VCk1G">
            <div id="chart-user"></div>
            <figure class="highcharts-figure"></figure>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mt-5 mb-5 dashboard_container-web__jI75B">
        <div class="col-5 text-center dashboard_styles-background-active__ZNuzP dashboard_container-acountUser__42vW2">
            <div class="dashboard_style-container-user__93ajk">
                <img
                    class="dashboard_user-icon__EVxjm"
                    src="data:image/png;base64,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"
                    alt=""
                />
                <span class="dashboard_style-number__TK5oE">{{ $dashboard->data0 }}</span>
                <div class="c100 p{{ $dashboard->data0 }} blue" style="font-size: 60px; background-color: rgb(175, 219, 0);">
                    <span>{{ $dashboard->data0 }}%</span>
                    <div class="slice">
                        <div class="bar" style="border-color: rgb(121, 41, 226);"></div>
                        <div class="fill" style="border-color: rgb(121, 41, 226);"></div>
                    </div>
                </div>
            </div>
            <span class="dashboard_style-text__3H61d">Usuarios activos</span>
        </div>
        <div class="col-5 text-center dashboard_styles-background-active__ZNuzP dashboard_container-acountUser__42vW2">
            <div class="dashboard_style-container-user__93ajk">
                <img
                    class="dashboard_user-icon__EVxjm"
                    src="data:image/png;base64,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"
                    alt=""
                />
                <span class="dashboard_style-number__TK5oE">{{ $dashboard->data1 }}</span>
                <div class="c100 p{{ $dashboard->data1 }} blue" style="font-size: 60px; background-color: rgb(121, 41, 226);">
                    <span>{{ $dashboard->data1 }}%</span>
                    <div class="slice">
                        <div class="bar" style="border-color: rgb(175, 219, 0);"></div>
                        <div class="fill" style="border-color: rgb(175, 219, 0);"></div>
                    </div>
                </div>
            </div>
            <span class="dashboard_style-text__3H61d">Usuarios activos la ultima semana</span>
        </div>
    </div>

    <div class="p-4 text-center dashboard_styles-background-active__ZNuzP dashboard_container-acountUser__42vW2" style="height: auto;">
        <div class="dashboard_style-container-user__93ajk">
            <div class="row">
                <div class="col-lg-7 d-flex justify-content-center align-items-center">
                    <div>
                        <div class="c100 p{{$dashboard->data2}} blue" style="font-size: 150px; background-color: #000;">
                            <span>{{ $dashboard->data2 }}</span>
                            <div class="slice">
                                <div class="bar" style="border-color: #afdb00;"></div>
                                <div class="fill" style="border-color: #afdb00;"></div>
                            </div>
                        </div>
                    </div>
                    <div style="padding-left: 20px;">
                        <div class="c100 p{{$dashboard->data3}} blue" style="font-size: 150px; background-color: #000;">
                            <span>{{ $dashboard->data3 }}</span>
                            <div class="slice">
                                <div class="bar" style="border-color: #7929e2;"></div>
                                <div class="fill" style="border-color: #7929e2;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 align-self-center">
                    <ul class="style-chart-pie">
                        <li>
                            <strong style="font-size: 20px"> Total de tiempo promedio por usuario (horas)</strong>
                        </li>
                        <li>
                            <strong style="font-size: 20px">Total de tiempo consumido por los usuarios  (horas)</strong>
                        </li>
                    </ul>
                    <p id="pDebug" style="display:none";>{{json_encode($dashboard)}} | {{json_encode(get_defined_vars())}}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <a type="button" style="width: 100%" href="{{ route('businesses.users.import') }}" class="btn btn-style btn-block">
                Da click aquí para comenzar el proceso de activar tus usuarios
                <i class="fa fa-upload"></i>
            </a>
        </div>
    </div>

    <br />
    <br />
    <br />

@endsection
@section('js')
    
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
    Highcharts.chart('chart-user', {
        chart: {
            type: 'area',
        },
        title: {
            text: 'Promedio de entrenamientos cursados <hr>',
            align: 'center',
            margin: 50,
            style: {
                color: '#7929e2',
                fontSize: '20px',
                fontWeight: 'normal',
                'dominant-baseline': 'text-after-edge',
            }
        },
        subtitle: {
            text: 'Impacta tu vida'
        },
        xAxis: [{
            categories: @json($dashboard->categories),
            //crosshair: true
        }],
        yAxis: [{ // Primary yAxis
            labels: {
                format: '{value}',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            title: {
                text: 'Cursos',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            }
        }, { // Secondary yAxis
            title: {
                text: 'Usuarios activos por mes',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            },
            labels: {
                format: '{value}',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            },
        }],
        series: [{
            name: 'Colaboradores',
            data: @json($dashboard->graph1),
            color: '#afdb00'

        }, {
            name: 'Cursos',
            data: @json($dashboard->graph2),
            color: '#7929e2'
        }]
    });
</script>
@endsection