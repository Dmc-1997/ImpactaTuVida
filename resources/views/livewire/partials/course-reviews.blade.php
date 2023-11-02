<div>
    <div class="container-fluit mt-5 p-4 Ranking_container-box__ZKdUF">
        <div class="card-body">
            <div class="col-xs-12 col-md-12 text-center">
                <h4><strong>Valoraciones</strong> <br /></h4>
                <h1 class="rating-num" style="font-size: 75px;">
                    <strong>{{ $rated }}</strong>
                </h1>
                @livewire('partials.fivestars', ['rated' => $rated, 'show' => 1, 'dateago' => 0, "color" => $color ?? '#6f27cd'], key(Str::random(4)))
                <span>
                    <strong>Rating de curso</strong>
                </span>

                {{-- <div align="center">
                    <a type="button" href="{{ route('members.courses.show', $data->id) }}" class="mt-1 btn-style text-white btn">
                        Iniciar el curso
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" class="home_arrow-btn-icon__ZcJy9" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
                        </svg>
                    </a>
                </div> --}}
            </div>
        </div>
    </div>

    @if(!$reviewRating_done)

        <div class="p-1 card-footer">
            @if($user_id > 0)
                <div class="mt-3 mb-3 coursesTemplate_container-valorar__VqM0y">
                    <span>Valorar curso</span>
                </div>
            
                <textarea wire:model="rating_review" placeholder="Escribe un aporte:" class="form-control mb-1 @error('rating_review') is-invalid @enderror"></textarea>
                @error('rating_review')
                <p class="mt-0 text-danger"><small>Ingrese un comentario para valorar este contenido</small></p>
                @enderror @error('rating_value')
                <p class="text-danger"><small>Seleccione de 1 a 5 estrellas para poder publicar</small></p>
                @enderror

                <fieldset class="rating">
                    <input type="radio" id="star5" name="rating" wire:model="rating_value" value="5" /><label for="star5" title="Excelente!">5 stars</label> <input type="radio" id="star4" name="rating" wire:model="rating_value" value="4" />
                    <label for="star4" title="Muy Bueno">4 stars</label> <input type="radio" id="star3" name="rating" wire:model="rating_value" value="3" /><label for="star3" title="Regular">3 stars</label>
                    <input type="radio" id="star2" name="rating" wire:model="rating_value" value="2" /><label for="star2" title="Poco Bueno">2 stars</label> <input type="radio" id="star1" name="rating" wire:model="rating_value" value="1" />
                    <label for="star1" title="No tan Bueno">1 star</label>
                </fieldset>
                <button type="button" wire:click="saveReviewRating" style="width: 100%" class=" btn-style btn-cuartary">Calificar Curso</button>
            @else
                <span>Inicia sesión para poder valorar este curso</span>
            @endif
        </div>
    @else
        <div class="p-1 card-footer review-item-footer">
            <span>Contenido ya valorado</span>
        </div>
    @endif

    <div class="mt-3 mb-3 coursesTemplate_container-valorar__VqM0y coursesTemplate_wrapper__rNn4K">
        <span>Ordenar por:</span>
        <div class=""><input type="checkbox" class="btn-check" style="position: absolute;clip: rect(0,0,0,0);pointer-events: none;" id="btncheck1" autocomplete="off" /><label class="coursesTemplate_styles-btn-check__dwWo8" for="btncheck1">Nuevo </label></div>
        <div class=""><input type="checkbox" class="btn-check" style="position: absolute;clip: rect(0,0,0,0);pointer-events: none;" id="btncheck1" autocomplete="off" /><label class="coursesTemplate_styles-btn-check__dwWo8" for="btncheck1">Más votados </label></div>
    </div>
    <div class="coursesTemplate_wrapper__rNn4K coursesTemplate_style-line__-Ipn2"></div>
    
    <div class="mt-3 coursesTemplate_wrapper__rNn4K">
        <span>Aporte: </span>
        @foreach($reviewRatings as $rating)
            @if(isset($rating->user))
                <div class="mt-4" style="max-width: 100%;">
                    <div class="card CardAportes_container-aporte__LgOo2" style="max-width: 100%;">
                        <div class="CardAportes_container-name__qr9WR">
                            <img src="{{ $rating->user->profile_photo_url }}" alt="{{ $rating->user->name }}" class="CardAportes_styles-photo-user__xvmS7" />
                            <span class="CardAportes_styles-title-nombre__9U+Op"> {{ $rating->user->name .' '. $rating->user->lastname }} </span>
                        </div>
                        <div class="card-body CardAportes_styles-body-card__B-U2x">
                            <span>{{ $rating->review }}</span>
                        </div>
                        <div class="ms-3 mb-2">
                            <div class="stars">
                                @livewire('partials.fivestars', ['rated' => $rating->value, 'show' => 0, 'dateago' => 1, 'dateago' => $rating->created_at, "color" => $color ?? '#6f27cd'], key(Str::random(4)))
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            {{-- <div class="m-0 card card-review bg-white" style="max-width: 100%;">
                <div class="p-3 card-body">
                    @if(isset($rating->user))
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <img src="{{ $rating->user->profile_photo_url }}" alt="{{ $rating->user->name }}" class="mx-auto avatar-xs img-thumbnail rounded-circle" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="pb-0 m-0 media-heading text-purple">
                                    <strong> {{ $rating->user->name .' '. $rating->user->lastname }} </strong>
                                </h6>
                                <span class="card-body CardAportes_styles-body-card__B-U2x">{{ $rating->review }}</span>
                                @livewire('partials.fivestars', ['rated' => $rating->value, 'show' => 0, 'dateago' => 1, 'dateago' => $rating->created_at, "color" => $color ?? '#6f27cd'], key(Str::random(4)))
                            </div>
                        </div>
                    @endif
                </div>
            </div> --}}
        @endforeach
    </div>
    
</div>

