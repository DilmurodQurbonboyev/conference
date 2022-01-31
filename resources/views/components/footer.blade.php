<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="footer-title">
                    <span>МЕЖДУНАРОДНАЯ КОНФЕРЕНЦИЯ ВЫСОКОГО УРОВНЯ</span>
                </div>
                <div class="footer-description">
                    <span>«Региональное сотрудничество стран Центральной Азии в рамках<br> Совместного плана действий по реализации<br> Глобальной контртеррористической стратегии ООН»</span>
                </div>
                <div class="footer-description">
                    <span>©COPYRIGHT 2022. Все права защищены</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="uz">
                    <a href="#">
                        <img src="{{ asset('img/uz.png') }}">
                    </a>
                </div>
            </div>
        </div>
        <div class="f-menu">
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
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-expanded="false">
                                {{ $menu['title'] }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($menu['submenus'] as $item)
                                    @if (!isset($item['submenus']))
                                        <a class="dropdown-item"
                                           href="{{ hrefType($item['link_type'], $item['link']) }}"
                                           target="{{ targetType($item['link_type']) }}">Action</a>
                                    @endif
                                @endforeach
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</footer>
