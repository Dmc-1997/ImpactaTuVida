@extends('themes.impacta.main')
@section('content')
    <style>
        header.masthead {
            padding-top: 10.5rem;
            padding-bottom: 6rem;
            text-align: center;
            color: #fff;
            background-image: url("imagenes/imagen-slider-nosotros.png");
            background-repeat: no-repeat;
            background-attachment: scroll;
            background-position: center center;
            background-size: cover;
        }

        header.masthead .masthead-heading {
            font-size: 5rem;
        }

        .p1 {
            font-size: 1.4rem;
            padding: 2rem;
        }

        .block-info {
            background-image: url("imagenes/fondo-azul.png");
            background-repeat: no-repeat;
            background-attachment: scroll;
            background-position: center center;
            background-size: cover;
        }

        .learn_p {
            font-size: 1.5rem;
        }

        .border1 {
            border-bottom: #AFDB00 solid 1px;
            border-right: #AFDB00 solid 1px
        }

        .border2 {
            border-top: #AFDB00 solid 1px;
            border-left: #AFDB00 solid 1px
        }

        .block3 {
            background-image: url("imagenes/fondo-para-contadores.png");
            background-repeat: no-repeat;
            background-attachment: scroll;
            background-position: center center;
            background-size: cover;
        }

        .border3 {
            border: 1px #fff solid;
            border-radius: 3%;
        }

        .jumbotron-plus {
            color: #AFDB00 !important;
            /* display: flex; */
            font-size: 6rem;
            /* margin-top: -5rem;
                                                    float: left; */
        }

        .jumbotron-iqual {
            color: #AFDB00 !important;
            font-weight: 600;
            font-size: 6rem;
            /* float: left;

                                                    margin-top: -3rem; */
        }
    </style>

    <header class="masthead">
        <div class="container px-5">
            <div class="text-center row gx-5">
                <div class="col-lg-12">
                    <div class="masthead-heading text-uppercase">Contacto</div>
                </div>
            </div>
        </div>
    </header>


    <section class="page-section bg-success" id="contacto">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="section-heading">TU marca + nuestro contenido = Colaboradores felices</h2>
                <h4 class="section-subheading mb-4">Déjanos tus datos y nos pondremos en contacto contigo.</h4>
            </div>

            <livewire:contact-form></livewire:contact-form>

        </div>
    </section>
@endsection
