@extends('admin.layouts.app')
@section('title')
    {{ tr('Update Users') }}
@endsection

<?php $langs = ['oz', 'uz', 'ru', 'en']; ?>

@section('header')
    <div class="col-sm-6">
        <h1>{{ tr('Update Users') }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('users/edit', $users->id) }}
        </ol>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{ asset('img/noimage.jpg') }}"
                            alt="User profile picture">
                    </div>
                    <h3 class="profile-username text-center">{{ Str::ucfirst(Auth::user()->name) }}</h3>
                    <p class="text-center text-muted">{{ $users->roles->first()->name ?? '' }}</p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>{{ tr('Menus') }}</b><a class="float-right">0</a>
                        </li>
                        <li class="list-group-item">
                            <b>{{ tr('News') }}</b> <a class="float-right">0</a>
                        </li>
                        <li class="list-group-item">
                            <b>{{ tr('Posters') }}</b> <a class="float-right">0</a>
                        </li>
                        <li class="list-group-item">
                            <b>{{ tr('Answers') }}</b> <a class="float-right">0</a>
                        </li>
                        <li class="list-group-item">
                            <b>{{ tr('Concerns') }}</b> <a class="float-right">0</a>
                        </li>
                        <li class="list-group-item">
                            <b>{{ tr('Pages') }}</b> <a class="float-right">0</a>
                        </li>
                        <li class="list-group-item">
                            <b>{{ tr('Useful') }}</b> <a class="float-right">0</a>
                        </li>
                        <li class="list-group-item">
                            <b>{{ tr('Photos') }}</b> <a class="float-right">0</a>
                        </li>
                        <li class="list-group-item">
                            <b>{{ tr('Videos') }}</b> <a class="float-right">0</a>
                        </li>
                        <li class="list-group-item">
                            <b>{{ tr('Managements') }}</b> <a class="float-right">0</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card card-primary card-outline">
                <div class="card-body">
                    <form action="{{ route('users.update', $users->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="status">{{ tr('Role') }}</label>
                            {!! Form::select('roles[]', $roles, $userRole, ['class' => 'form-control select2', 'multiple']) !!}
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                {{ tr('Update') }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
