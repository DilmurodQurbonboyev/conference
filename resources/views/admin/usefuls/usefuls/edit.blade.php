@extends('admin.layouts.app')
@section('title')
    {{tr('Update Useful')}}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1 class="m-0">{{tr('Update Useful')}}</h1>
    </div>
    <div class="col-sm-6">
        <div class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('useful/edit', $usefuls->id) }}
        </div>
    </div>
@endsection

@section('content')
    <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
            <x-language-tab/>
        </div>
        <div class="card-body">
            <form action="{{ route('useful.update', $usefuls->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="lists_category_id">{{ tr('Category') }}</label>
                    <select class="custom-select rounded-0 select2" name="lists_category_id" id="lists_category_id">
                        <option value="0">{{ tr('Choose') }}...</option>
                        @foreach ($usefulsCategories as $usefulsCategory)
                            <option value="{{ $usefulsCategory->id }}" {{ $usefuls->lists_category_id == $usefulsCategory->id ?
                        'selected' : ''}}>{{ $usefulsCategory->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="tab-content">
                    @foreach (Config::get('translatable.locales') as $lang)
                        <div class="tab-pane fade show" id="{{ $lang }}" role="tabpanel" aria-labelledby="{{ $lang }}">
                            <div class="form-group">
                                <label for="title_{{ $lang }}">{{ tr('Title') }}</label>
                                <input type="text" name="title_{{ $lang }}"
                                       class="form-control @error('title_'.$lang) is-invalid @enderror"
                                       id="title_{{ $lang }}"
                                       value="{{ $usefuls->translate($lang)->title ?? '' }}">
                                @error('title_'.$lang)
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        <x-form.description name="description_{{ $lang }}"
                        value="{!! $usefuls->translate($lang)->description ?? '' !!}" />
                            <input type="hidden" class="form-control" name="list_type_id" value="6">
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="image" class="mb-2">{{ tr('Image') }}</label>
                    <div class="input-group">
                        <input id="thumbnail2" class="form-control" type="text" name="image"
                               value="{{ $usefuls->image }}">
                        <span class="input-group-btn">
                            <a id="lfm2" data-input="thumbnail2" data-preview="holder" class="btn btn-primary">
                                {{ tr('Choose') }}
                            </a>
                        </span>
                    </div>
                    <img src="{{ $usefuls->image }}" class="p-2" width="30%" alt="">
                </div>
                <input type="hidden" class="form-control" name="list_type_id" value="6">
                <div class="row">
                    <div class="form-group col-6">
                        <label for="link">{{ tr('Link') }}</label>
                        <input type="text" name="link" class="form-control" id="link" value="{{ $usefuls->link }}">
                    </div>
                    <div class="form-group col-6">
                        <label for="link_type">{{ tr('Link Type') }}</label>
                        <select name="link_type" class="custom-select select2" id="link_type">
                            <option value="1" {{ $usefuls->link_type == "1" ? 'selected' : '' }}>{{ tr('Inactive') }}
                            </option>
                            <option
                                value="2" {{ $usefuls->link_type == "2" ? 'selected' : '' }}>{{ tr('Local opens in this window') }}
                            </option>
                            <option
                                value="3" {{ $usefuls->link_type == "3" ? 'selected' : '' }}>{{ tr('Local opens in a new window') }}
                            </option>
                            <option
                                value="4" {{ $usefuls->link_type == "4" ? 'selected' : '' }}>{{ tr('Global opens in this window') }}
                            </option>
                            <option
                                value="5" {{ $usefuls->link_type == "5" ? 'selected' : '' }}>{{ tr('Global opens in a new window') }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="order">{{ tr('Order') }}</label>
                    <input type="number" name="order" class="form-control" id="order" value="{{ $usefuls->order }}">
                </div>
                <div class="form-group">
                    <label for="date">{{ tr('Date') }}</label>
                    <input type="date" class="form-control" name="date" value="{{ $usefuls->date }}"/>
                </div>
                <div class="form-group">
                    <label for="parent_id">{{ tr('Main') }}</label>
                    <select class="custom-select rounded-0 select2" name="parent_id" id="parent_id">
                        <option value="2" {{ $usefuls->parent_id == "2" ? 'selected' : '' }}>{{ tr('Yes') }}</option>
                        <option value="1" {{ $usefuls->parent_id == "1" ? 'selected' : '' }}>{{ tr('No') }}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">{{ tr('Status') }}</label>
                    <select class="custom-select rounded-0 select2" name="status" id="status">
                        <option value="2" {{ $usefuls->status == "2" ? 'selected' : '' }}>{{tr('Active')}}</option>
                        <option value="1" {{ $usefuls->status == "1" ? 'selected' : '' }}>{{tr('Inactive')}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">{{tr('Update')}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
