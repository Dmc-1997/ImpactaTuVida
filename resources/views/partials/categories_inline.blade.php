<div class="container-fluid mt-3 categories_style-inline__zAT85">
    <div class="mt-2 row">
        @foreach($categories as $key => $category)
            <div class="col">
                <a class="categories_container-wrap__ga9sU" href="javascript:;">
                    <span class="categories_style-icon__VD2Ph" style="background-image: url({{ $category->icon }})"></span>
                    <span class="text-muted"> {{ $category->title }}</span>
                </a>
            </div>
        @endforeach
    </div>
</div>
