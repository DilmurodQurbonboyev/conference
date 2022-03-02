<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ tr('Conference') }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
          integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <?php
    $title = tr('seo');
    $description = tr('Regional cooperation of the countries of Central Asia within the framework of the Joint Action Plan for the implementation of the UN Global Counter-Terrorism Strategy');
    $image = '';
    $site_name = 'https://gcts-ca.uz';
    $current_url = url()->current();
    ?>

    <meta name="robots" content="{{$title}}">
    <meta name="googlebot" content="{{$title}}">
    <meta name="robots" content="index, follow">
    <meta name="twitter:site" content="{{$site_name}}">
    <meta name="twitter:type" content="website">
    <meta name="twitter:url" content="{{$current_url}}">
    <meta property="og:image" content="{{$image}}">
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
</head>
<body>
<x-banner/>
<x-translation/>
<x-news/>
<x-useful/>
<x-footer/>
<script type="text/javascript" src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
@stack('javascript')
</body>
</html>

