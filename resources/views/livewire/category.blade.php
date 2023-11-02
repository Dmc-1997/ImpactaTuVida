<div class="dashboard_styles-background-categories__H9+Ku" style="height: auto;">
    <div class="container-fluid mt-3">
        <div class="categories_container-title-categories__LEL8D"><span class="mt-2 categories_title-style__cYWCy">Categorias</span></div>
        <div class=" mt-2 categories_container-elemet-icon__IcNjd row">
            @foreach ($categories as $item)
                <div class="col">
                    <a class="categories_container-wrap__ga9sU" href="javascript:;">
                        <span class="categories_style-icon__VD2Ph" style="background-image: url({{$item->icon}})"></span>
                        <span class="text-muted">{{ $item->title }}</span>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
