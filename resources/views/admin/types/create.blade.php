@extends('admin.layouts.app')
@section('title')
Types
@endsection

<?php $langs = ['oz', 'uz', 'ru', 'en'] ?>

@section('header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{tr('Create Types')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    </ol>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
<div class="card card-primary card-outline card-outline-tabs">
    <div class="card-header p-0 border-bottom-0">
        <x-language-tab />
    </div>
    <div class="card-body">
        <form action="{{ route('types.store') }}" method="post">
            @csrf
            <div class="tab-content">
                @foreach ($langs as $lang)
                <div class="tab-pane fade show" id="{{ $lang }}" role="tabpanel" aria-labelledby="{{ $lang }}">
                    <div class="form-group">
                        <label for="title_{{ $lang }}">{{ __('admin.title') }}</label>
                        <input type="text" name="title_{{ $lang }}" class="form-control" id="title_{{ $lang }}">
                    </div>
                </div>
                @endforeach
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">{{__('admin.add')}}</button>
            </div>
        </form>
    </div>
</div>
@endsection
