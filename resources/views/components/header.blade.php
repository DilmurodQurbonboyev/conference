<header>
    <div class="container">
        <div class="header-ly">
            <div class="logo-ly">
                <a href="/">
                    <div class="logo-ly-in">
                        <img src="{{ asset('img/logo-ly.png') }}">
                    </div>
                </a>
            </div>
            <div class="menu-ly">
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
                                        <a class="nav-link" href="{{ hrefType($menu['link_type'], $menu['link']) }}"
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
                                                       target="{{ targetType($item['link_type']) }}">{{ $item['title'] }}</a>
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
            <div class="lang-ly">
                <ul>
{{--                    <li class="{{ $app->getLocale() == 'uz' ? 'active' : '' }}"><a--}}
{{--                            href="{{ LaravelLocalization::getLocalizedURL('uz') }}">ЎЗ</a></li>--}}
{{--                    <li class="{{ $app->getLocale() == 'oz' ? 'active' : '' }}">--}}
{{--                        <a href="{{ LaravelLocalization::getLocalizedURL('oz') }}">O'Z</a>--}}
{{--                    </li>--}}
                    <li class="{{ $app->getLocale() == 'ru' ? 'active' : '' }}">
                        <a href="{{ LaravelLocalization::getLocalizedURL('ru') }}">RU</a>
                    </li>
                    <li class="{{ $app->getLocale() == 'en' ? 'active' : '' }}">
                        <a href="{{ LaravelLocalization::getLocalizedURL('en') }}">EN</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
