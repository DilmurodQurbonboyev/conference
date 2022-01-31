<section class="link-section">
    <div class="container">
        <div class="heading">
            <span>{!! tr('Useful links') !!}</span>
        </div>
        <div class="owl-link">
            <div class="owl-carousel owl-theme">
                @foreach ($useluls as $useful)
                    @if ($useful->translate($app->getLocale())->title !== null)
                        <div class="item">
                            <a href="{{ hrefType($useful->link_type, $useful->link) }}"
                               target="{{ targetType($useful->link_type) }}">
                                <div class="link">
                                    <div class="link-img">
                                        <img src="{{ asset('img/l1.png') }}">
                                    </div>
                                    <div class="link-text">
                                        <span>{{ $useful->title ?? '' }}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>
