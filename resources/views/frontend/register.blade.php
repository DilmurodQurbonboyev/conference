@extends('frontend.layouts.app')
@section('title')
    {{ tr('Registration of participants') }}
@endsection
@section('content')
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
                                        <label for="last_name">{{tr('Last Name')}}</label>
                                        <input type="text" name="last_name"
                                               class="form-control @error('last_name') is-invalid @enderror"
                                               id="last_name"
                                               aria-describedby="emailHelp" placeholder="{{ tr('Enter text') }}">
                                        @error('last_name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="first_name">{{tr('First Name')}}</label>
                                        <input type="text" name="first_name"
                                               class="form-control @error('first_name') is-invalid @enderror"
                                               id="first_name"
                                               aria-describedby="emailHelp" placeholder="{{ tr('Enter text') }}">
                                        @error('first_name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    @if($app->getLocale() == 'ru')
                                        <div class="form-group">
                                            <label for="middle_name">{{tr('Middle Name')}}</label>
                                            <input type="text" name="middle_name"
                                                   class="form-control @error('middle_name') is-invalid @enderror"
                                                   id="middle_name"
                                                   aria-describedby="emailHelp" placeholder="{{ tr('Enter text') }}">
                                            @error('middle_name')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <p class="mt-3">{{ tr('Gender') }}</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio" name="gender" id="gender"
                                                       value="2">
                                                <label class="form-check-label" for="gender">
                                                    {{ tr('Male') }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio" name="gender" id="gender1"
                                                       value="1">
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
                                        <label for="organization">{{ tr('Organization') }}</label>
                                        <input type="text" name="organization"
                                               class="form-control @error('organization') is-invalid @enderror"
                                               id="organization" aria-describedby="emailHelp"
                                               placeholder="{{ tr('Enter text') }}">
                                        @error('organization')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="position">{{ tr('Position') }}</label>
                                        <input type="text" name="position"
                                               class="form-control @error('position') is-invalid @enderror"
                                               id="position"
                                               aria-describedby="emailHelp" placeholder="{{ tr('Enter text') }}">
                                        @error('position')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="country">{{tr('Country')}}</label>
                                        <select name="country"
                                                class="form-control select2 @error('country') is-invalid @enderror"
                                                id="country">
                                            <option value>{{ tr('Select Country') }}</option>
                                            @foreach ($countries as $country)
                                                @if($app->getLocale() == 'ru')
                                                    <option
                                                        value="{{ $country->name_ru }}">{{ $country->name_ru }}</option>
                                                @else
                                                    <option
                                                        value="{{ $country->name_en }}">{{ $country->name_en }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('country')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">{{ tr('Email') }}</label>
                                        <input type="text" name="email"
                                               class="form-control @error('email') is-invalid @enderror" id="email"
                                               aria-describedby="emailHelp" placeholder="{{ tr('Enter text') }}">
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
                                        <p class="mt-4">{{ tr('Choose a form of participation') }}</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" id="status"
                                                       value="2">
                                                <label class="form-check-label" for="status">
                                                    {{ tr('Online') }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" id="status1"
                                                       value="1">
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
                                        <select class="custom-select" name="participation_format"
                                                id="participation_format">
                                            <option value></option>
                                            <option value="1">С докладом</option>
                                            <option value="2">С комментарием</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="breakout_session">{{ tr('Breakout session') }}</label>
                                        <select class="custom-select" name="breakout_session" id="breakout_session">
                                            <option value></option>
                                            <option value="1">
                                                СЕКЦИЯ I: Меры по устранению условий, сопутствующих распространению
                                                терроризма
                                            </option>
                                            <option value="2">
                                                СЕКЦИЯ II: Предотвращение и борьба с терроризмом
                                            </option>
                                            <option value="3">
                                                СЕКЦИЯ III: Укрепление возможностей государств по предотвращению и
                                                борьбе с терроризмом, а также расширению роли системы ООН в этой области
                                            </option>
                                            <option value="4">
                                                СЕКЦИЯ IV: Обеспечение всеобщего уважения прав человека и верховенства
                                                права в качестве фундаментальной основы для борьбы с терроризмом
                                            </option>
                                        </select>
                                    </div>
                                    <div class="application-submit">
                                        <button type="button" data-toggle="modal" data-target="#exampleModal">
                                            {{ tr('Send') }}</button>
                                    </div>
                                </div>

                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                     aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
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
                content: "<?php echo tr('Browse') ?>";
            }
        </style>
    @endpush
@endsection
