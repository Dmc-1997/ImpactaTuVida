<div>
    @if ($rated)
        <div class="star-rating">
            <div class="text-green">
                @if ($rated == 0)
                    <span class="bi-star" style="color: {{ $color ?? '#6f27cd' }}"></span>
                    <span class="bi-star" style="color: {{ $color ?? '#6f27cd' }}"></span>
                    <span class="bi-star" style="color: {{ $color ?? '#6f27cd' }}"></span>
                    <span class="bi-star" style="color: {{ $color ?? '#6f27cd' }}"></span>
                    <span class="bi-star" style="color: {{ $color ?? '#6f27cd' }}"></span>
                @elseif ($rated >= 0.25 && $rated < 0.75)
                    <span class="bi-star-half"></span>
                    <span class="bi-star"></span>
                    <span class="bi-star"></span>
                    <span class="bi-star"></span>
                    <span class="bi-star"></span>
                @elseif ($rated >= 0.75 && $rated < 1.25)
                    <span class="bi-star-fill" style="color: {{ $color ?? '#6f27cd' }}"></span>
                    <span class="bi-star"></span>
                    <span class="bi-star"></span>
                    <span class="bi-star"></span>
                    <span class="bi-star"></span>
                @elseif ($rated >= 1.25 && $rated < 1.75)
                    <span class="bi-star-fill" style="color: {{ $color ?? '#6f27cd' }}"></span>
                    <span class="bi-star-half"></span>
                    <span class="bi-star"></span>
                    <span class="bi-star"></span>
                    <span class="bi-star"></span>
                @elseif ($rated >= 1.75 && $rated < 2.25)
                    <span class="bi-star-fill" style="color: {{ $color ?? '#6f27cd' }}"></span>
                    <span class="bi-star-fill" style="color: {{ $color ?? '#6f27cd' }}"></span>
                    <span class="bi-star"></span>
                    <span class="bi-star"></span>
                    <span class="bi-star"></span>
                @elseif ($rated >= 2.25 && $rated < 2.75)
                    <span class="bi-star-fill" style="color: {{ $color ?? '#6f27cd' }}"></span>
                    <span class="bi-star-fill" style="color: {{ $color ?? '#6f27cd' }}"></span>
                    <span class="bi-star-half"></span>
                    <span class="bi-star"></span>
                    <span class="bi-star"></span>
                @elseif ($rated >= 2.75 && $rated < 3.25)
                    <span class="bi-star-fill" style="color: {{ $color ?? '#6f27cd' }}"></span>
                    <span class="bi-star-fill" style="color: {{ $color ?? '#6f27cd' }}"></span>
                    <span class="bi-star-fill" style="color: {{ $color ?? '#6f27cd' }}"></span>
                    <span class="bi-star"></span>
                    <span class="bi-star"></span>
                @elseif ($rated >= 3.25 && $rated < 3.75)
                    <span class="bi-star-fill" style="color: {{ $color ?? '#6f27cd' }}"></span>
                    <span class="bi-star-fill" style="color: {{ $color ?? '#6f27cd' }}"></span>
                    <span class="bi-star-fill" style="color: {{ $color ?? '#6f27cd' }}"></span>
                    <span class="bi-star-half"></span>
                    <span class="bi-star"></span>
                @elseif ($rated >= 3.75 && $rated < 4.25)
                    <span class="bi-star-fill" style="color: {{ $color ?? '#6f27cd' }}"></span>
                    <span class="bi-star-fill" style="color: {{ $color ?? '#6f27cd' }}"></span>
                    <span class="bi-star-fill" style="color: {{ $color ?? '#6f27cd' }}"></span>
                    <span class="bi-star-fill" style="color: {{ $color ?? '#6f27cd' }}"></span>
                    <span class="bi-star"></span>
                @elseif ($rated >= 4.25 && $rated < 4.75)
                    <span class="bi-star-fill" style="color: {{ $color ?? '#6f27cd' }}"></span>
                    <span class="bi-star-fill" style="color: {{ $color ?? '#6f27cd' }}"></span>
                    <span class="bi-star-fill" style="color: {{ $color ?? '#6f27cd' }}"></span>
                    <span class="bi-star-fill" style="color: {{ $color ?? '#6f27cd' }}"></span>
                    <span class="bi-star-half"></span>
                @elseif ($rated >= 4.75)
                    <span class="bi-star-fill" style="color: {{ $color ?? '#6f27cd' }}"></span>
                    <span class="bi-star-fill" style="color: {{ $color ?? '#6f27cd' }}"></span>
                    <span class="bi-star-fill" style="color: {{ $color ?? '#6f27cd' }}"></span>
                    <span class="bi-star-fill" style="color: {{ $color ?? '#6f27cd' }}"></span>
                    <span class="bi-star-fill" style="color: {{ $color ?? '#6f27cd' }}"></span>
                @endif
            </div>
        </div>
    @else
        <div class="no-rating">
            <i class="bi-star" style="color: {{ $color ?? '#6f27cd' }}"></i>
            <i class="bi-star" style="color: {{ $color ?? '#6f27cd' }}"></i>
            <i class="bi-star" style="color: {{ $color ?? '#6f27cd' }}"></i>
            <i class="bi-star" style="color: {{ $color ?? '#6f27cd' }}"></i>
            <i class="bi-star" style="color: {{ $color ?? '#6f27cd' }}"></i>
        </div>
    @endif
</div>
