<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <title>{{ tr('Login') }}</title>
</head>

<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <img width="100%" src="{{ asset('img/uzinfocom.png') }}" alt="">
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <div class="social-auth-links text-center mb-3">
                <a class="btn btn-block btn-primary btn-social btn-dropbox" data-toggle="collapse"
                   data-target="#login" aria-expanded="true">
                    <i class="fa fa-lock"></i>
                    Кириш </a>
                <br>
                <div id="login" class="collapse in" aria-expanded="true" style="">
                    <div class="row">
                        <p>
                            <br>
                            Aгар сиз шу пайтга қадар id.egov.uz ишлаётганига ишончингиз комил бўлса, илтимос,
                            қуйидаги ҳавола билан авторизациядан ўтинг <br><br>
                            <a href="{{ route('oneId') }}" class="register_square">
                                <img src="{{ asset('img/oneId.png') }}">
                            </a>
                            <br><br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

</body>

</html>
