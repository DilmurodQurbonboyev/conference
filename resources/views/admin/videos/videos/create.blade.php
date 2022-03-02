@extends('admin.layouts.app')
@section('title')
{{tr('Create Video')}}
@endsection
@section('header')
<div class="col-sm-6">
    <h1 class="m-0">{{tr('Create Video')}}</h1>
</div>
<div class="col-sm-6">
    <div class="breadcrumb float-sm-right">
        {{ Breadcrumbs::render('videos/create') }}
    </div>
</div>
@endsection
@section('content')
<div class="card card-primary card-outline card-tabs">
    <div class="card-header p-0 pt-1 border-bottom-0">
        <x-language-tab />
    </div>
    <div class="card-body">
        <form action="{{ route('videos.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="lists_category_id">{{ tr('Category') }}</label>
                <select class="form-control select2 @error('lists_category_id') is-invalid @enderror"
                    name="lists_category_id" id="lists_category_id">
                    <option value="0">{{ tr('Choose') }}...</option>
                    @foreach ($videosCategories as $videosCategory)
                    <option value="{{ $videosCategory->id }}">{{ $videosCategory->title }}</option>
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
                            class="form-control @error('title_'.$lang) is-invalid @enderror" id="title_{{ $lang }}">
                        @error('title_'.$lang)
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <x-form.description name="description_{{ $lang }}" value="" />
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="video_code">{{ tr('Video Code') }}</label>
                    <input type="text" name="video_code" class="form-control" id="video_code">
                </div>
                <div class="form-group col-6">
                    <label for="video" class="mb-2">{{ tr('Video') }}</label>
                    <div class="input-group">
                        <input id="thumbnail" class="form-control" type="text" name="video">
                        <span class="input-group-btn">
                            <a id="lfm2" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> {{ tr('Choose') }}
                            </a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="image" class="mb-2">{{ tr('Video Image') }}</label>
                <div class="input-group">
                    <input id="thumbnail2" class="form-control" type="text" name="image">
                    <span class="input-group-btn">
                        <a id="lfm3" data-input="thumbnail2" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> {{ tr('Choose') }}
                        </a>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label for="media_type">{{ tr('Video Type') }}</label>
                <select class="custom-select select2" name="media_type" id="media_type">
                    <option value="1">{{ tr('Inactive') }}</option>
                    <option value="2">{{ tr('Image') }}</option>
                    <option value="3">{{ tr('Video from this site') }}</option>
                    <option value="4">{{ tr('Video from utube.uz') }}</option>
                    <option value="5">{{ tr('Video from youtube.com') }}</option>
                    <option value="6">{{ tr('Link') }}</option>
                </select>
            </div>
            <input type="hidden" class="form-control" name="list_type_id" value="8">

            <div class="form-group">
                <label for="date">{{ tr('Date') }}</label>
                <input type="date" class="form-control" name="date" />
            </div>
            <div class="form-group">
                <label for="parent_id">{{ tr('Main') }}</label>
                <select class="form-control select2" name="parent_id" id="parent_id">
                    <option value="2">{{ tr('Yes') }}</option>
                    <option value="1">{{ tr('No') }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="right_menu">{{ tr('Right Menu') }}</label>
                <select class="form-control select2" name="right_menu" id="right_menu">
                    <option value="2">{{ tr('Yes') }}</option>
                    <option value="1">{{ tr('No') }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status">{{ tr('Status') }}</label>
                <select class="form-control select2" name="status" id="status">
                    <option value="2">{{ tr('Active') }}</option>
                    <option value="1">{{ tr('Inactive') }}</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">{{ tr('Add') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection

