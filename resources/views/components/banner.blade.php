<section class="banner">
    <div class="banner-in">
        <div class="container">
            <div class="header">
                <div class="logo">
                    <a href="/">
                        <div class="logo-in">
                            {{--                            <img src="{{ asset('img/logo.png') }}">--}}
                            {{--                            <span>{!! tr('UN Global Counter-Terrorism Strategy in Central Asia') !!}</span>--}}
                            @if($app->getLocale() == 'ru')
                                <img src="{{ asset('img/ru.jpg') }}" alt="asia">
                            @else
                                <img src="{{ asset('img/en.jpg') }}" alt="asia">
                            @endif

                        </div>
                    </a>
                </div>
                <div class="lang">
                    <ul>
                        {{--                        <li class="{{ $app->getLocale() == 'uz' ? 'active' : '' }}"><a--}}
                        {{--                                href="{{ LaravelLocalization::getLocalizedURL('uz') }}">ЎЗ</a></li>--}}
                        {{--                        <li class="{{ $app->getLocale() == 'oz' ? 'active' : '' }}">--}}
                        {{--                            <a href="{{ LaravelLocalization::getLocalizedURL('oz') }}">O'Z</a>--}}
                        {{--                        </li>--}}
                        <li class="{{ $app->getLocale() == 'ru' ? 'active' : '' }}">
                            <a href="{{ LaravelLocalization::getLocalizedURL('ru') }}">RU</a>
                        </li>
                        <li class="{{ $app->getLocale() == 'en' ? 'active' : '' }}">
                            <a href="{{ LaravelLocalization::getLocalizedURL('en') }}">EN</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="menu">
                <nav class="navbar navbar-expand-xl navbar-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            @foreach ($top_menu_tree as $menu)
                                @if (!isset($menu['submenus']))
                                    <li class="nav-item active">
                                        <a href="{{ hrefType($menu['link_type'], $menu['link']) }}" class="nav-link"
                                           target="{{ targetType($menu['link_type']) }}">{{ $menu['title'] }}</a>
                                    </li>
                                @endif
                                @if (isset($menu['submenus']))
                                    <li class="nav-item dropdown">
                                        <a class="nav-link" href="#" id="navbarDropdown" role="button"
                                           data-toggle="dropdown" aria-expanded="false">
                                            <span>{{ $menu['title'] }}</span>
                                            <i class="fas fa-chevron-down"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            @foreach ($menu['submenus'] as $item)
                                                @if (!isset($item['submenus']))
                                                    <a class="dropdown-item"
                                                       href="{{ hrefType($item['link_type'], $item['link']) }}"
                                                       target="{{ targetType($item['link_type']) }}">
                                                        {{ $item['title'] }}
                                                    </a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="banner-center">
                <div class="banner-text">
						<span>
							<i>{!! tr('HIGH LEVEL INTL CONFERENCE') !!}</i>
                            @if(!empty($about))
                                {{ $about->title ?? '' }}
                            @endif
						</span>
                </div>
            </div>
            <div class="banner-date">
                <img src="{{ asset('img/date.png') }}">
                <span>
                    @if(!empty($about))
                        {!! $about->description ?? '' !!}
                    @endif
                </span>
            </div>
            <div class="banner-link">
                @if(!empty($about))
                    <a href="{!! $about->link !!}">
                        <span>{{ tr('Registration of participants') }}</span>
                    </a>
                @endif
            </div>
        </div>
        <div class="banner-icon">
            <div class="banner-icon-in">
                @foreach($partners as $partner)
                    @if ($partner->translate($app->getLocale())->title !== null)
                        <div class="banner-col">
                            <a href="{{ hrefType($partner->link_type, $partner->link) }}"
                               target="{{ targetType($partner->link_type) }}">
                                <img src="{{ $partner->image }}"/>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>
