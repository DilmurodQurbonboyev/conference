@extends('admin.layouts.app')
@section('title')
{{tr('Create Menu Category')}}
@endsection
@section('header')
<div class="col-sm-6">
    <h1>{{ tr('Create Menus Category') }}</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        {{ Breadcrumbs::render('menus-category/create') }}
    </ol>
</div>
@endsection
@section('content')
<div class="card card-primary card-outline card-tabs">
    <div class="card-header p-0 pt-1 border-bottom-0">
        <x-language-tab />
    </div>
    <div class="card-body">
        <form action="{{ route('menus-category.store') }}" method="post">
            @csrf
            <div class="tab-content">
                @foreach (Config::get('translatable.locales') as $lang)
                <div class="tab-pane fade" id="{{ $lang }}" role="tabpanel" aria-labelledby="{{ $lang }}">
                    <div class="form-group">
                        <label for="title_{{ $lang }}" class="@error('title_'.$lang) text-danger @enderror">{{
                            tr('Title') }}</label>
                        <input type="text" name="title_{{ $lang }}"
                            class="form-control @error('title_'.$lang) is-invalid @enderror" id="title_{{ $lang }}">
                        @error('title_'.$lang)
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                @endforeach
            </div>
            <div class="form-group">
                {!! Form::label('status', tr('Status')) !!}
                <select class="custom-select rounded-0 select2" name="status" id="status">
                    <option value="2">{{tr('Active')}}</option>
                    <option value="1">{{tr('Inactive')}}</option>
                </select>
            </div>
            <div class="form-group">
                {!! Form::submit(tr('Add'), ['class' => 'btn btn-primary']) !!}
            </div>
        </form>
    </div>
</div>
@endsection
