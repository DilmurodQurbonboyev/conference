<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style1.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
          integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <?php
    $title = tr('seo');
    $description = tr('Regional cooperation of the countries of Central Asia within the framework of the Joint Action Plan for the implementation of the UN Global Counter-Terrorism Strategy');
    $image = '';
    $site_name = 'https://gcts-ca.uz';
    $current_url = url()->current();
    ?>
    <meta name="article:tag" content="Conference">
    <meta name="article:tag" content="Tashkent conference">
    <meta name="article:tag" content="International Conference">
    <meta name="article:tag" content="Global Counterterrorism">
    <meta name="article:tag" content="Central Asia">
    <meta name="article:tag" content="regional cooperation">
    <meta name="article:tag" content="Fight against terrorism">
    <meta name="article:tag" content="The United Nations">
    <meta name="article:tag" content="UN">
    <meta name="article:tag" content="Terrorism">
    <meta name="article:tag" content="global strategy">
    <meta name="article:tag" content="Uzbekistan">

    <meta name="article:tag" content="Конференция">
    <meta name="article:tag" content="Ташкентская конференция">
    <meta name="article:tag" content="Международная конференция">
    <meta name="article:tag" content="Глобальная борьба с терроризмом">
    <meta name="article:tag" content="Центральная Азия">
    <meta name="article:tag" content="региональное сотрудничество">
    <meta name="article:tag" content="Борьба с терроризмом">
    <meta name="article:tag" content="Организация Объединенных Наций">
    <meta name="article:tag" content="ООН">
    <meta name="article:tag" content="Терроризм">
    <meta name="article:tag" content="глобальная стратегия">
    <meta name="article:tag" content="Узбекистан">
    <meta name="keywords"
          content="Conference, Tashkent conference, International Conference,  Global Counterterrorism, Central Asia, regional cooperation, Fight against terrorism, The United Nations, UN, Terrorism, global strategy, Uzbekistan, Конференция, Ташкентская конференция, Международная конференция, Глобальная борьба с терроризмом, Центральная Азия, региональное сотрудничество, Борьба с терроризмом, Организация Объединенных Наций, ООН, Терроризм, глобальная стратегия, Узбекистан">
    <meta name="robots" content="{{$title}}">
    <meta name="googlebot" content="{{$title}}">
    <meta name="robots" content="index, follow">
    <meta name="twitter:site" content="{{$site_name}}">
    <meta name="twitter:type" content="website">
    <meta name="twitter:title" content="{{$title}}">
    <meta name="twitter:description" content="{{$description}}">
    <meta name="twitter:url" content="{{$current_url}}">
    <meta property="og:image" content="{{$image}}">
    <meta property="og:title" content="{{$title}}">
    <meta property="og:description" content="{{$description}}"/>
    <meta property="og:locale" content="{{app()->getLocale()}}">
    <meta property="og:site_name" content="{{$site_name}}">
    <meta property="og:type" content="website">
    <meta property="og:updated_time" content="{{date(now())}}">
    <meta property="og:url" content="{{$current_url}}">
    <link href="{{$current_url}}" rel="canonical">


    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-TSGGZRS');</script>
    <!-- End Google Tag Manager -->
    @stack('css')
</head>

<body>

<x-header/>
@yield('layout')
@yield('content')

<x-footer/>

<script type="text/javascript" src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-ui.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/special-view.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.cookie.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $(".select2").select2({
        theme: 'bootstrap4'
    });
</script>
@stack('javascript')
</body>

</html>
