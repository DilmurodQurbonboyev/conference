@extends('admin.layouts.app')
@section('title')
    {{tr('Send Address')}}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1>{{ tr('About Offline') }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('offline/create') }}
        </ol>
    </div>
@endsection

@section('content')
    <div class="card card-primary card-outline card-tabs">

        <div class="card-body">
            <form action="{{ route('offline.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="link">{{ tr('Address') }}</label>
                    <input type="text" name="link" value="<?php if (isset($link->link)) {
                        echo $link->link;
                    } ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="users[]" class="p-1">{{ tr('Users') }}</label>
                    <select name="users[]" class="select2 form-control" id="users[]" multiple="multiple"
                            data-placeholder="">
                        @foreach ($offlineUsers as $register)
                            <option value="{{ $register->id }}">
                                Organization: {{ $register->organization }}
                                FIO: {{ $register->fullName }}
                                Email: {{ $register->email }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">{{ tr('Send') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
