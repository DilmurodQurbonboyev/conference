@extends('frontend.layouts.app')
@section('content')
    <section class="application-section">
        <div class="application-in">
            <div class="container">
                <div class="row">
                    <x-register-info/>
                    <div class="col-xl-6">

                        <div class="application-form">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            <form action="{{ route('registerPost') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="application-form-in">
                                    <div class="application-title">
                                        <span>{{ tr('Fill out the form to register') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="input1">{{tr('Full Name')}}</label>
                                        <input type="text" name="fullName" class="form-control" id="input1"
                                               aria-describedby="emailHelp"
                                               placeholder="Введите текст">
                                    </div>
                                    <div class="form-group">
                                        <label for="input2">{{ tr('Organization') }}</label>
                                        <input type="text" name="organization" class="form-control" id="input2"
                                               aria-describedby="emailHelp"
                                               placeholder="Введите текст">
                                    </div>
                                    <div class="form-group">
                                        <label for="input3">{{ tr('Position') }}</label>
                                        <input type="text" name="position" class="form-control" id="input3"
                                               aria-describedby="emailHelp"
                                               placeholder="Введите текст">
                                    </div>
                                    <div class="form-group">
                                        <label for="input4">{{tr('Country')}}</label>
                                        <input type="text" name="country" class="form-control" id="input4"
                                               aria-describedby="emailHelp"
                                               placeholder="Введите текст">
                                    </div>
                                    <div class="form-group">
                                        <label for="input5">{{ tr('Email') }}</label>
                                        <input type="text" name="email" class="form-control" id="input5"
                                               aria-describedby="emailHelp"
                                               placeholder="Введите текст">
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="photo" id="input6"
                                               aria-describedby="emailHelp"
                                               placeholder="Введите текст">
                                        <label class="custom-file-label" for="input6">{{ tr('Foto') }}</label>
                                    </div>
                                    <div class="application-submit">
                                        <button type="submit">{{ tr('Send') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
