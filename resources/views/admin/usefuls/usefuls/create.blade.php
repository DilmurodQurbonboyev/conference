@extends('admin.layouts.app')
@section('title')
    {{tr('Create Useful')}}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1 class="m-0">{{tr('Create Useful')}}</h1>
    </div>
    <div class="col-sm-6">
        <div class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('useful/create') }}
        </div>
    </div>
@endsection

@section('content')
    <div class="card card-primary card-outline card-tabs">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <x-language-tab/>
        </div>
        <div class="card-body">
            <form action="{{ route('useful.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="lists_category_id"
                           class="@error('lists_category_id') text-danger @enderror">{{ tr('Category') }}</label>
                    <select class="form-control select2 @error('lists_category_id') is-invalid @enderror"
                            name="lists_category_id" id="lists_category_id">
                        @foreach ($usefulsCategories as $usefulsCategory)
                            <option value="{{ $usefulsCategory->id }}">{{ $usefulsCategory->title }}</option>
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
                                       class="form-control @error('title_'.$lang) is-invalid @enderror"
                                       id="title_{{ $lang }}">
                                @error('title_'.$lang)
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <x-form.description name="description_{{ $lang }}" value="" />
                        </div>
                    @endforeach
                </div>
                <input type="hidden" class="form-control" name="list_type_id" value="6">
                <div class="form-group">
                    <label for="image" class="mb-2">{{ tr('Image') }}</label>
                    <div class="input-group">
                        <input id="thumbnail2" class="form-control" type="text" name="image">
                        <span class="input-group-btn">
                            <a id="lfm2" data-input="thumbnail2" data-preview="holder" class="btn btn-primary">
                                {{ tr('Choose') }}
                            </a>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="link" class="@error('link') text-danger @enderror">{{tr('Link')}}</label>
                        <input type="text" name="link" class="form-control" id="link">
                        @error('link')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="link_type">{{ tr('Link Type') }}</label>
                        <select name="link_type" class="custom-select rounded-0 select2" id="link_type">
                            <option value="1">{{ tr('Inactive') }}</option>
                            <option value="2">{{ tr('Local opens in this window') }}</option>
                            <option value="3">{{ tr('Local opens in a new window') }}</option>
                            <option value="4">{{ tr('Global opens in this window') }}</option>
                            <option value="5">{{ tr('Global opens in a new window') }}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="order">{{ tr('Order') }}</label>
                    <input type="number" name="order" class="form-control" id="order" value="50">
                </div>
                <div class="form-group">
                    <label for="date" class="@error('date') text-danger @enderror">{{ tr('Date') }}</label>
                    <input type="date" class="form-control @error('date') is-invalid @enderror" name="date"/>
                    @error('date')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="parent_id">{{ tr('Main') }}</label>
                    <select class="custom-select rounded-0 select2" name="parent_id" id="parent_id">
                        <option value="2">{{ tr('Yes') }}</option>
                        <option value="1">{{ tr('No') }}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">{{ tr('Status') }}</label>
                    <select class="custom-select rounded-0 select2" name="status" id="status">
                        <option value="2">{{tr('Active')}}</option>
                        <option value="1">{{tr('Inactive')}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">{{tr('Add')}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
