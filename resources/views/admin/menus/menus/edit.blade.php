@extends('admin.layouts.app')
@section('title')
    {{tr('Update Menu Category')}}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1>{{ tr('Update Menus Category') }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('menus/edit', $menu->id) }}
        </ol>
    </div>
@endsection
@section('content')
    <div class="card card-primary card-outline card-tabs">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <x-language-tab/>
        </div>
        <div class="card-body">
            <form action="{{ route('menus.update', $menu->id) }}" method="post">
                @csrf
                @method('patch')
                <div class="tab-content">
                    @foreach (Config::get('translatable.locales') as $lang)
                        <div class="tab-pane fade show" id="{{ $lang }}" role="tabpanel"
                             aria-labelledby="{{ $lang }}">
                            <div class="form-group">
                                <label for="title_{{ $lang }}">{{tr('Title')}}</label>
                                <input type="text" name="title_{{ $lang }}"
                                       class="form-control @error('title_'.$lang) is-invalid @enderror"
                                       id="title_{{ $lang }}" value="{{ $menu->translate($lang)->title ?? '' }}">
                                @error('title_'.$lang)
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="link">{{tr('Link')}}</label>
                    <input type="text" name="link"
                           class="form-control @error('link') is-invalid @enderror"
                           id="link" value="{{ $menu->link ?? '' }}">
                    @error('link')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="link_type">{{ tr('Link Type') }}</label>
                    <select name="link_type" class="custom-select rounded-0 select2" id="link_type">
                        <option value="1" {{ $menu->link_type == "1" ? 'selected' : '' }}>{{ tr('Inactive') }}</option>
                        <option
                            value="2" {{ $menu->link_type == "2" ? 'selected' : '' }}>{{ tr('Local opens in this window') }}</option>
                        <option
                            value="3" {{ $menu->link_type == "3" ? 'selected' : '' }}>{{ tr('Local opens in a new window') }}</option>
                        <option
                            value="4" {{ $menu->link_type == "4" ? 'selected' : '' }}>{{ tr('Global opens in this window') }}</option>
                        <option
                            value="5" {{ $menu->link_type == "5" ? 'selected' : '' }}>{{ tr('Global opens in a new window') }}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="image" class="mb-2">{{ tr('Image') }}</label>
                    <div class="input-group">
                        <input id="thumbnail2" class="form-control" type="text" name="image">
                        <span class="input-group-btn">
                            <a id="lfm2" data-input="thumbnail2" data-preview="holder"
                               class="btn btn-primary">
                               {{tr('Choose')}}
                            </a>
                    </span>
                    </div>
                    <img src="{{ $menu->image }}" class="p-2" alt="">
                </div>
                <div class="form-group">
                    <label for="parent_id">{{ tr('Main') }}</label>
                    <select name="parent_id" class="custom-select rounded-0 select2"
                            id="parent_id">
                        <option value="0">{{ tr('Select Parent Menu') }}</option>
                        @foreach ($parents as $parent)
                            <option
                                value="{{ $parent->id }}" {{ $menu->parent_id  == $parent->id ? 'selected' : '' }}>{{ $parent->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="menus_category_id">{{ tr('Category') }}</label>
                    <select class="custom-select rounded-0 select2" name="menus_category_id"
                            id="menus_category_id">
                        @foreach ($menusCategories as $menusCategory)
                            <option
                                value="{{ $menusCategory->id }}" {{ $menu->menus_category_id == $menusCategory->id  ? 'selected' : ''}}>{{ $menusCategory->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">{{ tr('Status') }}</label>
                    <select class="custom-select rounded-0 select2" name="status"
                            id="status">
                        <option value="2" {{ $menu->status == '2' ? 'selected' : '' }}>{{tr('Active')}}</option>
                        <option value="1" {{ $menu->status == '1' ? 'selected' : '' }}>{{tr('Inactive')}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="order">{{tr('Order')}}</label>
                    <input type="number" name="order"
                           class="form-control @error('order') is-invalid @enderror"
                           id="order" value="{{ $menu->order }}">
                    @error('order')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">{{tr('Add')}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
