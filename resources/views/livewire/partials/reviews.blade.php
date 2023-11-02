<div>

    <div class="m-0 card review-card">
        <h5 class="p-2 mb-1 card-title">
            <span class="fa fa-comments"></span> 
            Calificaciones de los estudiantes
        </h5>

        <div class="pl-2 mb-2 border-bottom">
            <div class="star-rating">
                @for($i=1; $i<=5; $i++)
                    @if ($rated >= $i)
                        <span class="fa fa-star star_checked"></span>
                    @else
                        @if (($i - $rated) < 1 && ($i - $rated) > 0 )
                            <span class="fa fa-star-half-alt star_checked"></span>
                        @else
                            <span class="fa fa-star"></span>
                        @endif
                    @endif
                @endfor
            </div>
            <p class="mt-0 mb-0 text-black">Valoración <b class="text-black">{{ $rated }}</b> de <b class="text-black">5</b></p>
            <h6 class="mb-0">Total de valoraciones <b class="text-black">{{ $reviewsRatings_users }}</b></h6>
        </div>



        <div class="p-1 card-body ">
            <ul class="pl-1 media-list review-box">

                @foreach($reviewRatings as $rating)
                    @if(isset($rating->user))
                    <li class="media border-bottom">
                        <div class="mr-1 media-left">
                            <img src="{{ $rating->user->profile_photo_url }}" alt="{{ $rating->user->name }}" class="mx-auto avatar-xs img-thumbnail rounded-circle" >
                        </div>
                        <div class="media-body">
                            <h6 class="pb-0 m-0 media-heading"> {{ $rating->user->name .' '. $rating->user->lastname }} </h6>

                            @for($i=1; $i<=5; $i++)
                                @if ($i <= $rating->value)
                                    <span class="fa fa-star star_checked"></span>
                                @else
                                    <span class="fa fa-star"></span>
                                @endif
                            @endfor

                            <span class="pt-0 comment-time">{{ $rating->created_at }}</span>
                            <p>{{ $rating->review }}</p>
                        </div>
                    </li>
                    @endif
                @endforeach


            </ul>
        </div>
        @if(!$reviewRating_done)
        <div class="p-1 card-footer">
            <span>Valorar:</span>
            <textarea wire:model="rating_review" class="form-control  mb-4 @error('rating_review') is-invalid @enderror"></textarea>
            @error('rating_review')
                <p class="text-danger"><small>Seleccione</small></p>
            @enderror
            <fieldset class="rating">
                <input type="radio" id="star5" name="rating" wire:model="rating_value" value="5" /><label for="star5" title="Excelente!">5 stars</label>
                <input type="radio" id="star4" name="rating" wire:model="rating_value"  value="4" /><label for="star4" title="Muy Bueno">4 stars</label>
                <input type="radio" id="star3" name="rating" wire:model="rating_value"  value="3" /><label for="star3" title="Regular">3 stars</label>
                <input type="radio" id="star2" name="rating" wire:model="rating_value"  value="2" /><label for="star2" title="Poco Bueno">2 stars</label>
                <input type="radio" id="star1" name="rating" wire:model="rating_value"  value="1" /><label for="star1" title="No tan Bueno">1 star</label>
            </fieldset>

            <button class="ml-4 btn btn-premium btn-theme" wire:click="saveReviewRating">Calificar Curso</button>
        </div>
        @endif

    </div>
</div>
