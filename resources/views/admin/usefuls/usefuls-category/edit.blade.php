@extends('admin.layouts.app')
@section('title')
{{tr('Update Usefuls Category')}}
@endsection
@section('header')
<div class="col-sm-6">
    <h1>{{tr('Update Usefuls Category')}}</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        {{ Breadcrumbs::render('useful-category/edit', $usefulsCategory->id) }}
    </ol>
</div>
@endsection
@section('content')
<div class="card card-primary card-outline card-tabs">
    <div class="card-header p-0 pt-1 border-bottom-0">
        <x-language-tab />
    </div>
    <div class="card-body">
        <form action="{{ route('useful-category.update', $usefulsCategory->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="parent_id">{{ tr('Main') }}</label>
                <select class="custom-select rounded-0 select2" name="parent_id" id="parent_id">
                    <option value="0">---</option>
                    @foreach ($usefulsCategories as $useful)
                    <option value="{{ $useful->id }}" {{ $usefulsCategory->parent_id == $useful->id ?
                        'selected' : '' }}>{{ $useful->title }}</option>
                    @endforeach
                </select>
            </div>
            <input type="hidden" class="form-control" name="list_type_id" value="6">
            <div class="tab-content">
                @foreach (Config::get('translatable.locales') as $lang)
                <div class="tab-pane fade show" id="{{ $lang }}" role="tabpanel" aria-labelledby="{{ $lang }}">
                    <div class="form-group">
                        <label for="title_{{ $lang }}">{{ tr('Title') }}</label>
                        <input type="text" name="title_{{ $lang }}"
                            class="form-control @error('title_'.$lang) is-invalid @enderror" id="title_{{ $lang }}"
                            value="{{ $usefulsCategory->translate($lang)->title ?? '' }}">
                        @error('title_'.$lang)
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                @endforeach
            </div>
            <div class="form-group">
                <label for="color">{{ tr('Color') }}</label>
                <div class="input-group my-colorpicker2">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fas fa-square"></i>
                        </span>
                    </div>
                    <input type="text" name="color" class="form-control" value="{{ $usefulsCategory->color }}">
                </div>
            </div>
            <div class="form-group">
                <label for="image" class="mb-2">{{ tr('Image') }}</label>
                <div class="input-group">
                    <input id="thumbnail2" class="form-control" type="text" name="image"
                        value="{{ $usefulsCategory->image }}">
                    <span class="input-group-btn">
                        <a id="lfm2" data-input="thumbnail2" data-preview="holder" class="btn btn-primary">
                            {{ tr('Choose') }}
                        </a>
                    </span>
                </div>
                <img class="p-2" src="{{ $usefulsCategory->image }}" width="30%" alt="">
            </div>
            <div class="form-group">
                <label for="status">{{ tr('Status') }}</label>
                <select class="custom-select rounded-0 select2" name="status" id="status">
                    <option value="2" {{ $usefulsCategory->status == "2" ? 'selected' : '' }}>{{tr('Active')}}</option>
                    <option value="1" {{ $usefulsCategory->status == "1" ? 'selected' : '' }}>{{tr('Inactive')}}
                    </option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    {{tr('Update')}}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
