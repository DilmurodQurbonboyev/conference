<section class="news-section">
    <div class="container">
        <a href="/category/yangiliklar" class="heading text-dark">
            <span>{{ tr('News') }}</span>
        </a>
    </div>
    <div class="container">
        <div class="owl-news">
            <div class="owl-carousel owl-theme">
                @foreach($news as $new)
                    @if ($new->translate($app->getLocale())->title !== null)
                        <div class="item">
                            <div class="news">
                                <div class="news-img">
                                    <a href="{{ route('news', $new->slug) }}">
                                        <img src="{{ $new->anons_image }}"/>
                                    </a>
                                </div>
                                <div class="news-title">
                                    <a href="{{ route('news', $new->slug) }}">{{ $new->title ?? '' }}</a>
                                </div>
                                <div class="news-date">
                                    <img src="{{ asset('img/time.png') }}">
                                    <span>{{ $new->created_at->format('d.m.20y') }}</span>
                                    <span> | </span>
                                    <span>{{ $new->created_at->format('H:i') }}</span>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>
