<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
          integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>
<body>

<x-header/>

<section class="layout">
    <div class="container">
        <div class="row">
            <div class="col-my-4 col-xl-5">
                <div class="layout-left">
                    <span>{!! tr('HIGH LEVEL INTERNATIONAL CONFERENCE') !!}</span>
                </div>
            </div>
            <div class="col-my-4 col-xl-5">
                <div class="layout-right">
                    <span>{{ tr('Regional cooperation of the countries of Central Asia within the framework of the Joint Action Plan for the implementation of the UN Global Counter-Terrorism Strategy') }}</span>
                </div>
            </div>
        </div>
    </div>
</section>

@yield('content')

<x-footer/>

<script type="text/javascript" src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
</body>
</html>
