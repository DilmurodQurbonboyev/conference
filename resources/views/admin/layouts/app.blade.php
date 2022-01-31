<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/leaflet/leaflet.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.min.css') }}">
    @stack('css')
    <title>@yield('title')</title>
    @livewireStyles
</head>

<body class="control-sidebar-slide-open {{ Auth::user()->dark_mode == 0 ? '' : 'dark-mode' }} layout-fixed sidebar-mini"
    style="height: auto;">
    <div class="wrapper">
        <livewire:navbar />
        @include('admin.layouts.sidebar')
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        @yield('header')
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            @include('admin.layouts.alert')
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
    </a>
    @livewireScripts
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js ') }}"></script>
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('vendor/laravel-filemanager/js/cropper.min.js') }}"></script>
    <script src="{{ asset('vendor/laravel-filemanager/js/dropzone.min.js') }}"></script>
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('plugins/leaflet/leaflet.js') }}"></script>
    <script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
    <script>
        $('#lfm_oz').filemanager('file');
        $('#lfm_uz').filemanager('file');
        $('#lfm_ru').filemanager('file');
        $('#lfm_en').filemanager('file');
        $('#lfm2').filemanager('image');
        $('#lfm3').filemanager('image');
    </script>

    <script src="{{ asset('js/tinymce.min.js') }}"></script>

    <script src="{{ asset('js/admin.js') }}"></script>

    <script>
        @if(Session::has('success'))
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true,
            "newestOnTop": true,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
        }
    toastr.success("{{ session('success') }}");
    @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true,
            "newestOnTop": true,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
        }
    toastr.error("{{ session('error') }}");
    @endif
    </script>

    @stack('js')

</body>

</html>
