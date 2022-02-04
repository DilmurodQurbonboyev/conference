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
                    <div class="col-xl-6">
                        <div class="application-form">
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
                                               aria-describedby="emailHelp"
                                               placeholder="{{ tr('Enter text') }}">
                                        @error('last_name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="first_name">{{tr('First Name')}}</label>
                                        <input type="text" name="first_name"
                                               class="form-control @error('first_name') is-invalid @enderror"
                                               id="first_name"
                                               aria-describedby="emailHelp"
                                               placeholder="{{ tr('Enter text') }}">
                                        @error('first_name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="middle_name">{{tr('Middle Name')}}</label>
                                        <input type="text" name="middle_name"
                                               class="form-control @error('middle_name') is-invalid @enderror"
                                               id="middle_name"
                                               aria-describedby="emailHelp"
                                               placeholder="{{ tr('Enter text') }}">
                                        @error('middle_name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="organization">{{ tr('Organization') }}</label>
                                        <input type="text" name="organization"
                                               class="form-control @error('organization') is-invalid @enderror"
                                               id="organization"
                                               aria-describedby="emailHelp"
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
                                               aria-describedby="emailHelp"
                                               placeholder="{{ tr('Enter text') }}">
                                        @error('position')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="country">{{tr('Country')}}</label>
                                        <input type="text" name="country"
                                               class="form-control @error('country') is-invalid @enderror" id="input4"
                                               aria-describedby="emailHelp"
                                               placeholder="{{ tr('Enter text') }}">
                                        @error('country')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">{{ tr('Email') }}</label>
                                        <input type="text" name="email"
                                               class="form-control @error('email') is-invalid @enderror" id="email"
                                               aria-describedby="emailHelp"
                                               placeholder="{{ tr('Enter text') }}">
                                        @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="custom-file">
                                        <input type="file"
                                               class="custom-file-input @error('photo') is-invalid @enderror"
                                               name="photo" id="photo"
                                               aria-describedby="emailHelp"
                                               placeholder="{{ tr('Enter text') }}">
                                        <label class="custom-file-label"
                                               for="file">{{ tr('Foto') }}</label>
                                        @error('photo')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <p class="mt-4 ml-4">{{ tr('Choose a form of participation') }}</p>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="status"
                                               value="2">
                                        <label class="form-check-label" for="status">
                                            {{ tr('Online') }}
                                        </label>
                                    </div>
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="radio" name="status" id="status1"
                                               value="1">
                                        <label class="form-check-label" for="status1">
                                            {{ tr('Offline') }}
                                        </label>
                                    </div>
                                    @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="application-submit">
                                        <button type="button" data-toggle="modal"
                                                data-target="#exampleModal">{{ tr('Send') }}</button>
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
                                                <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ tr('Close') }}</button>
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
