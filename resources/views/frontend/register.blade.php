@extends('frontend.layouts.app')
@section('title')
    {{ tr('Registration of participants') }}
@endsection
@section('content')
    <style>
        .required:after {
            content: " *";
            color: red;
        }
    </style>
    <section class="application-section">
        <div class="application-in">
            <div class="container">
                <div class="row">
                    <x-register-info/>
                    <div class="col-xl-12">
                        <div class="application-form">
                            {{-- @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif --}}
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
                                        <label for="last_name" class="required">{{ tr('Last Name') }}</label>
                                        <input type="text" name="last_name"
                                               class="form-control @error('last_name') is-invalid @enderror"
                                               id="last_name"
                                               aria-describedby="emailHelp" placeholder="{{ tr('Enter text') }}"
                                               value="{{ old('last_name') }}">
                                        @error('last_name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="first_name" class="required">{{ tr('First Name') }}</label>
                                        <input type="text" name="first_name"
                                               class="form-control @error('first_name') is-invalid @enderror"
                                               id="first_name"
                                               aria-describedby="emailHelp" placeholder="{{ tr('Enter text') }}"
                                               value="{{ old('first_name') }}">
                                        @error('first_name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    @if ($app->getLocale() == 'ru')
                                        <div class="form-group">
                                            <label for="middle_name" class="required">{{ tr('Middle Name') }}</label>
                                            <input type="text" name="middle_name"
                                                   class="form-control @error('middle_name') is-invalid @enderror"
                                                   id="middle_name" aria-describedby="emailHelp"
                                                   placeholder="{{ tr('Enter text') }}"
                                                   value="{{ old('middle_name') }}">
                                            @error('middle_name')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <p class="mt-3 required">{{ tr('Gender') }}</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio" name="gender" id="gender"
                                                       value="2" @if(old('gender') == 2) checked @endif>
                                                <label class="form-check-label" for="gender">
                                                    {{ tr('Male') }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio" name="gender" id="gender1"
                                                       value="1" @if(old('gender') == 1) checked @endif>
                                                <label class="form-check-label" for="gender1">
                                                    {{ tr('Female') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    @error('gender')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="organization" class="required">{{ tr('Organization') }}</label>
                                        <input type="text" name="organization"
                                               class="form-control @error('organization') is-invalid @enderror"
                                               id="organization" aria-describedby="emailHelp"
                                               placeholder="{{ tr('Enter text') }}" value="{{ old('organization') }}">
                                        @error('organization')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="position" class="required">{{ tr('Position') }}</label>
                                        <input type="text" name="position"
                                               class="form-control @error('position') is-invalid @enderror"
                                               id="position"
                                               aria-describedby="emailHelp" placeholder="{{ tr('Enter text') }}"
                                               value="{{ old('position') }}">
                                        @error('position')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="country" class="required">{{ tr('Country') }}</label>
                                        <select name="country"
                                                class="form-control select2 @error('country') is-invalid @enderror"
                                                id="country">
                                            <option value></option>
                                            @foreach ($countries as $country)
                                                @if ($app->getLocale() == 'ru')
                                                    <option
                                                        value="{{ $country->name_ru }}" {{old ('country') == $country->name_ru ? 'selected' : ''}}>{{ $country->name_ru }}
                                                    </option>
                                                @else
                                                    <option
                                                        value="{{ $country->name_en }}" {{old ('country') == $country->name_en ? 'selected' : ''}}>{{ $country->name_en }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('country')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="required">{{ tr('Email') }}</label>
                                        <input type="text" name="email"
                                               class="form-control @error('email') is-invalid @enderror" id="email"
                                               aria-describedby="emailHelp" placeholder="{{ tr('Enter text') }}"
                                               value="{{ old('email') }}">
                                        @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="custom-file">
                                        <input type="file"
                                               class="custom-file-input @error('photo') is-invalid @enderror"
                                               name="photo" id="photo" aria-describedby="emailHelp"
                                               placeholder="{{ tr('Enter text') }}">
                                        <label class="custom-file-label" for="file">{{ tr('Foto') }}</label>
                                        @error('photo')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <p class="mt-4 required">{{ tr('Choose a form of participation') }}</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" id="status"
                                                       value="2" @if(old('status') == 2) checked @endif>
                                                <label class="form-check-label" for="status">
                                                    {{ tr('Online') }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" id="status1"
                                                       value="1" @if(old('status') == 1) checked @endif>
                                                <label class="form-check-label" for="status1">
                                                    {{ tr('Offline') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group mt-3">
                                        <label for="participation_format">{{ tr('Participation format') }}</label>
                                        <select class="custom-select select2" name="participation_format"
                                                id="participation_format">
                                            <option value></option>
                                            <option value="1" {{old ('participation_format') == 1 ? 'selected' : ''}}>
                                                @if ($app->getLocale() == 'ru')
                                                    С докладом
                                                @else
                                                    Session Speaker
                                                @endif
                                            </option>
                                            <option value="2" {{old ('participation_format') == 2 ? 'selected' : ''}}>
                                                @if ($app->getLocale() == 'ru')
                                                    С комментарием
                                                @else
                                                    Statement from the floor
                                                @endif
                                            </option>
                                            <option value="3" {{old ('participation_format') == 3 ? 'selected' : ''}}>
                                                @if ($app->getLocale() == 'ru')
                                                    Представители СМИ
                                                @else
                                                    Media coverage
                                                @endif
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="breakout_session">{{ tr('Breakout session') }}</label>
                                        <select class="custom-select select2" name="breakout_session"
                                                id="breakout_session">
                                            <option value></option>
                                            <option value="1" {{old ('breakout_session') == 1 ? 'selected' : ''}}>
                                                @if ($app->getLocale() == 'ru')
                                                    СЕКЦИЯ I: Меры по устранению условий, сопутствующих распространению
                                                    терроризма
                                                @else
                                                    PANEL DISCUSSION I: Addressing the conditions conducive to the
                                                    spread of
                                                    terrorism
                                                @endif
                                            </option>
                                            <option value="2" {{old ('breakout_session') == 2 ? 'selected' : ''}}>
                                                @if ($app->getLocale() == 'ru')
                                                    СЕКЦИЯ II: Предотвращение и борьба с терроризмом
                                                @else
                                                    PANEL DISCUSSION II: Preventing and countering terrorism
                                                @endif
                                            </option>
                                            <option value="3" {{old ('breakout_session') == 3 ? 'selected' : ''}}>
                                                @if ($app->getLocale() == 'ru')
                                                    СЕКЦИЯ III: Укрепление возможностей государств по предотвращению и
                                                    борьбе с терроризмом, а также расширению роли системы ООН в этой
                                                    области
                                                @else
                                                    PANEL DISCUSSION III: Building states’ capacity to prevent and
                                                    combat
                                                    terrorism and to strengthen the role of the United Nations system in
                                                    that regard
                                                @endif
                                            </option>
                                            <option value="4" {{old ('breakout_session') == 4 ? 'selected' : ''}}>
                                                @if ($app->getLocale() == 'ru')
                                                    СЕКЦИЯ IV: Обеспечение всеобщего уважения прав человека и
                                                    верховенства
                                                    права в качестве фундаментальной основы для борьбы с терроризмом
                                                @else
                                                    PANEL DISCUSSION IV: Ensuring respect for human rights for all and
                                                    the
                                                    rule of law as the fundamental basis for the fight against terrorism
                                                @endif
                                            </option>
                                        </select>
                                    </div>
                                    <div class="application-submit">
                                        <button type="button" data-toggle="modal" data-target="#exampleModal">
                                            {{ tr('Send') }}</button>
                                    </div>
                                </div>

                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ tr('notice') }}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                {{ tr('Are you sure') }}?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    {{ tr('Close') }}
                                                </button>
                                                <button type="submit" class="btn btn-info">{{ tr('Send') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('css')
        <style>
            .custom-file-label::after {
                content: "<?php echo tr('Browse'); ?>";
            }

        </style>
    @endpush
@endsection
