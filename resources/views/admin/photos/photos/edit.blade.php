@extends('admin.layouts.app')
@section('title')
{{tr('Update Photo')}}
@endsection
@section('header')
<div class="col-sm-6">
    <h1 class="m-0">{{tr('Update Photos')}}</h1>
</div>
<div class="col-sm-6">
    <div class="breadcrumb float-sm-right">
        {{ Breadcrumbs::render('photos/edit', $photos->id) }}
    </div>
</div>
@endsection
@section('content')
<div class="card card-primary card-outline card-tabs">
    <div class="card-header p-0 pt-1 border-bottom-0">
        <x-language-tab />
    </div>
    <div class="card-body">
        <form action="{{ route('photos.update', $photos->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="lists_category_id">{{ tr('Category') }}</label>
                <select class="form-control select2 @error('lists_category_id') is-invalid @enderror"
                    name="lists_category_id" id="lists_category_id">
                    <option value="0">{{ tr('Choose') }}...</option>
                    @foreach ($photosCategories as $photosCategory)
                    <option value="{{ $photosCategory->id }}" {{ $photos->lists_category_id == $photosCategory->id ?
                        'selected' : ''}}>{{ $photosCategory->title }}</option>
                    @endforeach
                </select>
                @error('lists_category_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="tab-content">
                @foreach (Config::get('translatable.locales') as $lang)
                <div class="tab-pane fade show" id="{{ $lang }}" role="tabpanel" aria-labelledby="{{ $lang }}">
                    <div class="form-group">
                        <label for="title_{{ $lang }}">{{ tr('Title') }}</label>
                        <input type="text" name="title_{{ $lang }}"
                            class="form-control @error('title_'.$lang) is-invalid @enderror" id="title_{{ $lang }}"
                            value="{{ $photos->translate($lang)->title ?? '' }}">
                        @error('title_'.$lang)
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                @endforeach
            </div>
            <div class="form-group">
                <label for="anons_image" class="mb-2">{{ tr('Anons Image') }}</label>
                <div class="input-group">
                    <input id="thumbnail2" class="form-control" type="text" name="anons_image"
                        value="{{ $photos->anons_image }}">
                    <span class="input-group-btn">
                        <a id="lfm2" data-input="thumbnail2" data-preview="holder" class="btn btn-primary">
                            {{ tr('Choose') }}
                        </a>
                    </span>
                </div>
                <img src="{{ $photos->anons_image }}" width="30%" class="p-2" alt="">
            </div>
            <input type="hidden" class="form-control" name="list_type_id" value="7">
            <div class="form-group">
                <label for="body_image" class="mb-2">{{ tr('Body Image') }}</label>
                <div class="input-group">
                    <input id="thumbnail3" class="form-control" type="text" value="{!! $photos->body_image !!}"
                        name="body_image">
                    <span class="input-group-btn">
                        <a id="lfm3" data-input="thumbnail3" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> {{ tr('Choose') }}
                        </a>
                    </span>
                </div>
                @php
                $res = explode(',', $photos->body_image);
                @endphp
                @foreach ($res as $i)
                @if ($i)
                <img class="p-2" width="30%" src="{{ $i }}" alt="">
                @endif
                @endforeach
            </div>
            <div class="form-group">
                <label for="date">{{ tr('Date') }}</label>
                <input type="date" class="form-control" name="date" value="{{ $photos->date }}" />
            </div>
            <div class="form-group">
                <label for="parent_id">{{ tr('Main') }}</label>
                <select class="form-control select2" name="parent_id" id="parent_id">
                    <option value="2" {{ $photos->parent_id == "2" ? 'selected' : '' }}>{{ tr('Yes') }}</option>
                    <option value="1" {{ $photos->parent_id == "1" ? 'selected' : '' }}>{{ tr('No') }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="order">{{ tr('Order') }}</label>
                <input type="number" name="order" class="form-control" id="order" value="{{ $photos->order }}">
            </div>
            <div class="form-group">
                <label for="status">{{ tr('Status') }}</label>
                <select class="form-control select2" name="status" id="status">
                    <option value="2" {{ $photos->status == "2" ? 'selected' : '' }}>{{ tr('Active') }}</option>
                    <option value="1" {{ $photos->status == "1" ? 'selected' : '' }}>{{ tr('Inactive') }}</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">{{ tr('Update') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
