@extends('themes.impacta.main')
@section('content')

<div class="container">
    <div class="mt-4 p-4">
        <span class="mt-2 cursosHome_title-style-curses-web__TFYYq cursosHome_styles-text__s0cxF cursosHome_style-title-sidebar__UtfJS">Categorias</span>
        @include('partials.categories_inline', ["categories" => $categories])
    </div>
</div>

<div class="mt-3  container-fluid cursosHome_container-cursos__9dHPX">
    <span class="cursosHome_styles-text-title-social__-kYU8 cursosHome_style-title-sidebar__UtfJS cursosHome_title-center-home-mobile__CNhHF">Programas de bienestar en distintas áreas</span>
    <p class="mt-4 cursosHome_style-title-sidebar__UtfJS cursosHome_title-center-home-mobile__CNhHF">Desarrollar tus capacidades y habilidades relacionadas con nutrición y más, para tener bienestar integral</p>
    <div class="cursosHome_container-coruses__Ni1IP">
        <div class="row row-cols-1 row-cols-md-4 g-5 mt-2">
            @foreach ($courses as $course)
                <div class="col">
                    <div class="CardCurses_card__iCQ0L">
                        <div class="CardCurses_container-imag-card__+Z28v">
                            @if ($course->preview_image !== null && $course->preview_image !== '')
                                <img src="{{ asset('imagenes/cursos/' . $course->preview_image) }}"
                                    class="card-img-top styles-img-curse img-fluid" alt="{{ $course->title }}">
                            @else
                                <img src="{{ asset('img/default.jpg') }}" class="card-img-top CardCurses_styles-img-curse__Eruvg" alt="{{ $course->title }}">
                            @endif
                        </div>
                        <div class="card-body">
                            <h5 class="CardCurses_title__QSP-D CardCurses_textEllipsis__yCplT">{{ $course->title }}</h5>
                            <p class="CardCurses_card-text__uBR0Q">
                                @if (isset($course->user))
                                    Por: <strong>{{ $course->user->name . ' ' . $course->user->surname }}</strong>
                                @endif
                            </p>
                            <div class="container-start">
                                <div class="stars">
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" color="#7929e2" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" style="color: rgb(121, 41, 226);">
                                        <path
                                            d="M908.1 353.1l-253.9-36.9L540.7 86.1c-3.1-6.3-8.2-11.4-14.5-14.5-15.8-7.8-35-1.3-42.9 14.5L369.8 316.2l-253.9 36.9c-7 1-13.4 4.3-18.3 9.3a32.05 32.05 0 0 0 .6 45.3l183.7 179.1-43.4 252.9a31.95 31.95 0 0 0 46.4 33.7L512 754l227.1 119.4c6.2 3.3 13.4 4.4 20.3 3.2 17.4-3 29.1-19.5 26.1-36.9l-43.4-252.9 183.7-179.1c5-4.9 8.3-11.3 9.3-18.3 2.7-17.5-9.5-33.7-27-36.3z"
                                        ></path>
                                    </svg>
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" color="#7929e2" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" style="color: rgb(121, 41, 226);">
                                        <path
                                            d="M908.1 353.1l-253.9-36.9L540.7 86.1c-3.1-6.3-8.2-11.4-14.5-14.5-15.8-7.8-35-1.3-42.9 14.5L369.8 316.2l-253.9 36.9c-7 1-13.4 4.3-18.3 9.3a32.05 32.05 0 0 0 .6 45.3l183.7 179.1-43.4 252.9a31.95 31.95 0 0 0 46.4 33.7L512 754l227.1 119.4c6.2 3.3 13.4 4.4 20.3 3.2 17.4-3 29.1-19.5 26.1-36.9l-43.4-252.9 183.7-179.1c5-4.9 8.3-11.3 9.3-18.3 2.7-17.5-9.5-33.7-27-36.3z"
                                        ></path>
                                    </svg>
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" color="#7929e2" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" style="color: rgb(121, 41, 226);">
                                        <path
                                            d="M908.1 353.1l-253.9-36.9L540.7 86.1c-3.1-6.3-8.2-11.4-14.5-14.5-15.8-7.8-35-1.3-42.9 14.5L369.8 316.2l-253.9 36.9c-7 1-13.4 4.3-18.3 9.3a32.05 32.05 0 0 0 .6 45.3l183.7 179.1-43.4 252.9a31.95 31.95 0 0 0 46.4 33.7L512 754l227.1 119.4c6.2 3.3 13.4 4.4 20.3 3.2 17.4-3 29.1-19.5 26.1-36.9l-43.4-252.9 183.7-179.1c5-4.9 8.3-11.3 9.3-18.3 2.7-17.5-9.5-33.7-27-36.3z"
                                        ></path>
                                    </svg>
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" color="#7929e2" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" style="color: rgb(121, 41, 226);">
                                        <path
                                            d="M908.1 353.1l-253.9-36.9L540.7 86.1c-3.1-6.3-8.2-11.4-14.5-14.5-15.8-7.8-35-1.3-42.9 14.5L369.8 316.2l-253.9 36.9c-7 1-13.4 4.3-18.3 9.3a32.05 32.05 0 0 0 .6 45.3l183.7 179.1-43.4 252.9a31.95 31.95 0 0 0 46.4 33.7L512 754l227.1 119.4c6.2 3.3 13.4 4.4 20.3 3.2 17.4-3 29.1-19.5 26.1-36.9l-43.4-252.9 183.7-179.1c5-4.9 8.3-11.3 9.3-18.3 2.7-17.5-9.5-33.7-27-36.3zM664.8 561.6l36.1 210.3L512 672.7 323.1 772l36.1-210.3-152.8-149L417.6 382 512 190.7 606.4 382l211.2 30.7-152.8 148.9z"
                                        ></path>
                                    </svg>
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" color="#7929e2" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" style="color: rgb(121, 41, 226);">
                                        <path
                                            d="M908.1 353.1l-253.9-36.9L540.7 86.1c-3.1-6.3-8.2-11.4-14.5-14.5-15.8-7.8-35-1.3-42.9 14.5L369.8 316.2l-253.9 36.9c-7 1-13.4 4.3-18.3 9.3a32.05 32.05 0 0 0 .6 45.3l183.7 179.1-43.4 252.9a31.95 31.95 0 0 0 46.4 33.7L512 754l227.1 119.4c6.2 3.3 13.4 4.4 20.3 3.2 17.4-3 29.1-19.5 26.1-36.9l-43.4-252.9 183.7-179.1c5-4.9 8.3-11.3 9.3-18.3 2.7-17.5-9.5-33.7-27-36.3zM664.8 561.6l36.1 210.3L512 672.7 323.1 772l36.1-210.3-152.8-149L417.6 382 512 190.7 606.4 382l211.2 30.7-152.8 148.9z"
                                        ></path>
                                    </svg>
                                </div>
                            </div>
                            <footer class="CardCurses_footer__7RALQ CardCurses_btn-center__v1IG5">
                                <a type="button" class="btn-style CardCurses_button__jRn-e btn-secondary text-center" href="{{ route('course.show',['id' => $course->id, 'slug' => $course->slug ]) }}" name="Nutricón Consciente">Ir al curso</a>
                                <button type="button" class="btn-style CardCurses_button__jRn-e CardCurses_secondary__IexnU CardCurses_btn-activo__rarRD btn-secondary">Activo</button>
                            </footer>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

{{-- <div class="home_container-grey__Wkmb0 container-fluid">
    <div class="container"> --}}
        @include('partials.comments',[])
    {{-- </div>
</div> --}}

<div class="Articules_container-violet__vNu+s">
    <h3 class="Articules_title__hdodI mb-2 home_container-title-social__QvT+G">Artículos de interes</h3>
    <div class="Articules_cardVioletContainer__xYp2z slide-articles">
        <div>
            <div class="CardArticules_wrapper__Jy8Nu p-3">
                <div class="CardArticules_card__l26EF">
                    <a href="https://www.bancolombia.com/negocios/actualizate/tendencias/beneficios-salario-emocional-y-como-implementarlo">
                        <div class="CardArticules_container__2JK+x">
                            <header class="CardArticules_container-header-card__-ltLd">
                                <span class="text-dark">01 de septiembre 2020</span>
                                <div class="CardArticules_container-like-coments__fASOV">
                                    <div class="CardArticules_styles-lik-coments__hmXU3">
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" color="#7929e2" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" style="color: rgb(121, 41, 226);">
                                            <path
                                                d="M923 283.6a260.04 260.04 0 0 0-56.9-82.8 264.4 264.4 0 0 0-84-55.5A265.34 265.34 0 0 0 679.7 125c-49.3 0-97.4 13.5-139.2 39-10 6.1-19.5 12.8-28.5 20.1-9-7.3-18.5-14-28.5-20.1-41.8-25.5-89.9-39-139.2-39-35.5 0-69.9 6.8-102.4 20.3-31.4 13-59.7 31.7-84 55.5a258.44 258.44 0 0 0-56.9 82.8c-13.9 32.3-21 66.6-21 101.9 0 33.3 6.8 68 20.3 103.3 11.3 29.5 27.5 60.1 48.2 91 32.8 48.9 77.9 99.9 133.9 151.6 92.8 85.7 184.7 144.9 188.6 147.3l23.7 15.2c10.5 6.7 24 6.7 34.5 0l23.7-15.2c3.9-2.5 95.7-61.6 188.6-147.3 56-51.7 101.1-102.7 133.9-151.6 20.7-30.9 37-61.5 48.2-91 13.5-35.3 20.3-70 20.3-103.3.1-35.3-7-69.6-20.9-101.9zM512 814.8S156 586.7 156 385.5C156 283.6 240.3 201 344.3 201c73.1 0 136.5 40.8 167.7 100.4C543.2 241.8 606.6 201 679.7 201c104 0 188.3 82.6 188.3 184.5 0 201.2-356 429.3-356 429.3z"
                                            ></path>
                                        </svg>
                                        <span class="text-dark">1200</span>
                                    </div>
                                    <div class="CardArticules_styles-lik-coments__hmXU3">
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" color="#7929e2" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" style="color: rgb(121, 41, 226);">
                                            <path
                                                d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"
                                            ></path>
                                            <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"></path>
                                        </svg>
                                        <span class="text-dark">1200</span>
                                    </div>
                                </div>
                            </header>
                            <div class="" style="height: 200px;width: 100%;background-image:url(/images/articles/art-01.jpg);background-repeat: no-repeat;background-attachment: fixed;background-size: cover;">
                            </div>
                            {{-- <img src="/images/articles/art-01.jpg" class="CardArticules_styles-img-curse__IHbia" alt="BENEFICIOS DEL SALARIO EMOCIONAL Y CÓMO IMPLEMENTARLOS" /> --}}
                            <a href="https://www.bancolombia.com/negocios/actualizate/tendencias/beneficios-salario-emocional-y-como-implementarlo">
                                <footer class="card-body" style="height: 125px">
                                    <h5 class="CardArticules_title__ukswI">BENEFICIOS DEL SALARIO EMOCIONAL Y CÓMO IMPLEMENTARLOS</h5>
                                    <p class="CardArticules_card-text__dpbzS">
                                    </p>
                                    <footer class="CardArticules_footer__-4PFN"></footer>
                                </footer>
                            </a>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div>
            <div class="CardArticules_wrapper__Jy8Nu p-3">
                <div class="CardArticules_card__l26EF">
                    <a href="https://www.portafolio.co/tendencias/oficinas-wellness-una-tendencia-global-535619">
                        <div class="CardArticules_container__2JK+x">
                            <header class="CardArticules_container-header-card__-ltLd">
                                <span class="text-dark">15 de noviembre 2019</span>
                                <div class="CardArticules_container-like-coments__fASOV">
                                    <div class="CardArticules_styles-lik-coments__hmXU3">
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" color="#7929e2" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" style="color: rgb(121, 41, 226);">
                                            <path
                                                d="M923 283.6a260.04 260.04 0 0 0-56.9-82.8 264.4 264.4 0 0 0-84-55.5A265.34 265.34 0 0 0 679.7 125c-49.3 0-97.4 13.5-139.2 39-10 6.1-19.5 12.8-28.5 20.1-9-7.3-18.5-14-28.5-20.1-41.8-25.5-89.9-39-139.2-39-35.5 0-69.9 6.8-102.4 20.3-31.4 13-59.7 31.7-84 55.5a258.44 258.44 0 0 0-56.9 82.8c-13.9 32.3-21 66.6-21 101.9 0 33.3 6.8 68 20.3 103.3 11.3 29.5 27.5 60.1 48.2 91 32.8 48.9 77.9 99.9 133.9 151.6 92.8 85.7 184.7 144.9 188.6 147.3l23.7 15.2c10.5 6.7 24 6.7 34.5 0l23.7-15.2c3.9-2.5 95.7-61.6 188.6-147.3 56-51.7 101.1-102.7 133.9-151.6 20.7-30.9 37-61.5 48.2-91 13.5-35.3 20.3-70 20.3-103.3.1-35.3-7-69.6-20.9-101.9zM512 814.8S156 586.7 156 385.5C156 283.6 240.3 201 344.3 201c73.1 0 136.5 40.8 167.7 100.4C543.2 241.8 606.6 201 679.7 201c104 0 188.3 82.6 188.3 184.5 0 201.2-356 429.3-356 429.3z"
                                            ></path>
                                        </svg>
                                        <span class="text-dark">1200</span>
                                    </div>
                                    <div class="CardArticules_styles-lik-coments__hmXU3">
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" color="#7929e2" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" style="color: rgb(121, 41, 226);">
                                            <path
                                                d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"
                                            ></path>
                                            <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"></path>
                                        </svg>
                                        <span class="text-dark">1200</span>
                                    </div>
                                </div>
                            </header>
                            <div class="" style="height: 200px;width: 100%;background-image:url(/images/articles/art-02.jpeg);background-repeat: no-repeat;background-attachment: fixed;background-size: cover;">
                            </div>
                            {{-- <img src="/images/articles/art-02.jpeg" class="CardArticules_styles-img-curse__IHbia" alt="..." /> --}}
                            <a href="https://www.portafolio.co/tendencias/oficinas-wellness-una-tendencia-global-535619">
                                <footer class="card-body" style="height: 125px">
                                    <h5 class="CardArticules_title__ukswI">Oficinas ‘Wellness’: una Tendencia global</h5>
                                    <p class="CardArticules_card-text__dpbzS">
                                    </p>
                                    <footer class="CardArticules_footer__-4PFN"></footer>
                                </footer>
                            </a>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div>
            <div class="CardArticules_wrapper__Jy8Nu p-3">
                <div class="CardArticules_card__l26EF">
                    <a href="https://rhsaludable.com/el-bienestar-organizacional-una-inversion-valiosa-para-el-exito-empresarial">
                        <div class="CardArticules_container__2JK+x">
                            <header class="CardArticules_container-header-card__-ltLd">
                                <span class="text-dark">03 de marzo 2023</span>
                                <div class="CardArticules_container-like-coments__fASOV">
                                    <div class="CardArticules_styles-lik-coments__hmXU3">
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" color="#7929e2" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" style="color: rgb(121, 41, 226);">
                                            <path
                                                d="M923 283.6a260.04 260.04 0 0 0-56.9-82.8 264.4 264.4 0 0 0-84-55.5A265.34 265.34 0 0 0 679.7 125c-49.3 0-97.4 13.5-139.2 39-10 6.1-19.5 12.8-28.5 20.1-9-7.3-18.5-14-28.5-20.1-41.8-25.5-89.9-39-139.2-39-35.5 0-69.9 6.8-102.4 20.3-31.4 13-59.7 31.7-84 55.5a258.44 258.44 0 0 0-56.9 82.8c-13.9 32.3-21 66.6-21 101.9 0 33.3 6.8 68 20.3 103.3 11.3 29.5 27.5 60.1 48.2 91 32.8 48.9 77.9 99.9 133.9 151.6 92.8 85.7 184.7 144.9 188.6 147.3l23.7 15.2c10.5 6.7 24 6.7 34.5 0l23.7-15.2c3.9-2.5 95.7-61.6 188.6-147.3 56-51.7 101.1-102.7 133.9-151.6 20.7-30.9 37-61.5 48.2-91 13.5-35.3 20.3-70 20.3-103.3.1-35.3-7-69.6-20.9-101.9zM512 814.8S156 586.7 156 385.5C156 283.6 240.3 201 344.3 201c73.1 0 136.5 40.8 167.7 100.4C543.2 241.8 606.6 201 679.7 201c104 0 188.3 82.6 188.3 184.5 0 201.2-356 429.3-356 429.3z"
                                            ></path>
                                        </svg>
                                        <span class="text-dark">1200</span>
                                    </div>
                                    <div class="CardArticules_styles-lik-coments__hmXU3">
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" color="#7929e2" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" style="color: rgb(121, 41, 226);">
                                            <path
                                                d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"
                                            ></path>
                                            <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"></path>
                                        </svg>
                                        <span class="text-dark">1200</span>
                                    </div>
                                </div>
                            </header>
                            <div class="" style="height: 200px;width: 100%;background-image:url(/images/articles/art-03.jpg);background-repeat: no-repeat;background-attachment: fixed;background-size: cover;">
                            </div>
                            {{-- <img src="/images/articles/art-03.jpg" class="CardArticules_styles-img-curse__IHbia" alt="..." /> --}}
                            <a href="https://rhsaludable.com/el-bienestar-organizacional-una-inversion-valiosa-para-el-exito-empresarial">
                                <footer class="card-body" style="height: 125px">
                                    {{-- CardArticules_textEllipsis__kTST4 --}}
                                    <h5 class="CardArticules_title__ukswI ">EL BIENESTAR ORGANIZACIONAL: UNA INVERSIÓN VALIOSA PARA EL ÉXITO EMPRESARIAL</h5>
                                    <p class="CardArticules_card-text__dpbzS">
                                    </p>
                                    <footer class="CardArticules_footer__-4PFN"></footer>
                                </footer>
                            </a>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="Articules_container-btn__85B7K">
        <button class="Articules_btn-prev__-ppL8 arrow-left-articles">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" color="#afdb00" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" style="color: rgb(175, 219, 0); font-size: 50px;">
                <path d="M724 218.3V141c0-6.7-7.7-10.4-12.9-6.3L260.3 486.8a31.86 31.86 0 0 0 0 50.3l450.8 352.1c5.3 4.1 12.9.4 12.9-6.3v-77.3c0-4.9-2.3-9.6-6.1-12.6l-360-281 360-281.1c3.8-3 6.1-7.7 6.1-12.6z"></path>
            </svg>
        </button>
        <button class="Articules_btn-next__2We9w arrow-right-articles">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" color="#afdb00" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" style="color: rgb(175, 219, 0); font-size: 50px;">
                <path d="M765.7 486.8L314.9 134.7A7.97 7.97 0 0 0 302 141v77.3c0 4.9 2.3 9.6 6.1 12.6l360 281.1-360 281.1c-3.9 3-6.1 7.7-6.1 12.6V883c0 6.7 7.7 10.4 12.9 6.3l450.8-352.1a31.96 31.96 0 0 0 0-50.4z"></path>
            </svg>
        </button>
    </div>
</div>

@include('partials.form_contact',[]);

{{-- <div class="before_content"></div> --}}

@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('.slide-comments').slick({
                dots: false,
                infinite: true,
                speed: 300,
                slidesToShow: 2,
                prevArrow: $(".arrow-left-courses"),
                nextArrow: $(".arrow-right-courses"),
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });

            $('.slide-articles').slick({
                dots: false,
                infinite: true,
                speed: 300,
                slidesToShow: 3,
                prevArrow: $(".arrow-left-articles"),
                nextArrow: $(".arrow-right-articles"),
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 4,
                        }
                    },
                    {
                        breakpoint: 800,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });

            $('.slide-courses-movil').slick({
                dots: false,
                infinite: true,
                speed: 300,
                slidesToShow: 4,
                padding: "10px",
                prevArrow: $(".Carrucel_btn-prev__bEm+8"),
                nextArrow: $(".Carrucel_btn-next__AiILA"),
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 3,
                        }
                    },
                    {
                        breakpoint: 800,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 2,
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        });
    </script>
@endsection
