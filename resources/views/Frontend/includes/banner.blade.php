<div class="wpo-hero-slider">
    <div class="container container-fluid-sm">
        <div class="hero-slider">
            @foreach ($banners as $value)
                <a href="{{ $value->link }}">
                    <div class="hero-slider-item">
                        <div class="slider-bg">
                            <img src="{{ asset($value->image) }}" alt="">
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    <ul class="hero-social">
        @foreach ($social_medias as $value)
            <li>
                <a href="{{ $value->link }}"><i class="{{ $value->icon }}"></i></a>
            </li>
        @endforeach
    </ul>
</div>
