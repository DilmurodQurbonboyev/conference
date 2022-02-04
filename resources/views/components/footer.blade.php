<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="footer-title">
                    <span>{!! tr('HIGH LEVEL INTL CONFERENCE') !!}</span>
                </div>
                <div class="footer-description">
                    <span>{!! tr('Regional cooperation of the countries of Central Asia within the framework of the Joint Action Plan for the implementation of the UN Global Counter-Terrorism Strategy') !!}</span>
                </div>
                <div class="footer-description">
                    <span>©COPYRIGHT 2022. Все права защищены</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="uz text-md-right">
                    <a href="@if($app->getLocale() == 'ru') https://uzinfocom.uz/ru @else https://uzinfocom.uz/en @endif"
                       target="_blank">
                        <img src="{{ asset('img/uz.png') }}">
                    </a>
                </div>
                <div class="counter py-3 text-md-right">

                    <!-- START WWW.UZ TOP-RATING --><SCRIPT language="javascript" type="text/javascript">
                        <!--
                        top_js="1.0";top_r="id=46229&r="+escape(document.referrer)+"&pg="+escape(window.location.href);document.cookie="smart_top=1; path=/"; top_r+="&c="+(document.cookie?"Y":"N")
                        //-->
                    </SCRIPT>
                    <SCRIPT language="javascript1.1" type="text/javascript">
                        <!--
                        top_js="1.1";top_r+="&j="+(navigator.javaEnabled()?"Y":"N")
                        //-->
                    </SCRIPT>
                    <SCRIPT language="javascript1.2" type="text/javascript">
                        <!--
                        top_js="1.2";top_r+="&wh="+screen.width+'x'+screen.height+"&px="+
                            (((navigator.appName.substring(0,3)=="Mic"))?screen.colorDepth:screen.pixelDepth)
                        //-->
                    </SCRIPT>
                    <SCRIPT language="javascript1.3" type="text/javascript">
                        <!--
                        top_js="1.3";
                        //-->
                    </SCRIPT>
                    <SCRIPT language="JavaScript" type="text/javascript">
                        <!--
                        top_rat="&col=0063AF&t=ffffff&p=DD7900";top_r+="&js="+top_js+"";document.write('<a href="http://www.uz/ru/res/visitor/index?id=46229" target=_top><img src="http://cnt0.www.uz/counter/collect?'+top_r+top_rat+'" width=88 height=31 border=0 alt="Топ рейтинг www.uz"></a>')//-->
                    </SCRIPT><NOSCRIPT><A href="http://www.uz/ru/res/visitor/index?id=46229" target=_top><IMG height=31 src="http://cnt0.www.uz/counter/collect?id=46229&pg=http%3A//uzinfocom.uz&&col=0063AF&amp;t=ffffff&amp;p=DD7900" width=88 border=0 alt="Топ рейтинг www.uz"></A></NOSCRIPT><!-- FINISH WWW.UZ TOP-RATING -->


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
    </div>
</footer>
