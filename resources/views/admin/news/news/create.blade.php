@extends('admin.layouts.app')
@section('title')
{{tr('Create News')}}
@endsection
@section('header')
<div class="col-sm-6">
    <h1>{{tr('Create News')}}</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        {{ Breadcrumbs::render('news/create') }}
    </ol>
</div>
@endsection
@section('content')
<div class="card card-primary card-outline card-tabs">
    <div class="card-header p-0 pt-1 border-bottom-0">
        <x-language-tab />
    </div>
    <div class="card-body">
        <form action="{{ route('news.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="lists_category_id" class="@error('lists_category_id') text-danger @enderror">{{
                    tr('Category') }}</label>
                <select class="custom-select rounded-0 select2 @error('lists_category_id') is-invalid @enderror"
                    name="lists_category_id" id="lists_category_id">
                    @foreach ($newsCategories as $newsCategory)
                    <option value="{{ $newsCategory->id }}">{{ $newsCategory->title }}</option>
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
                        <label for="title_{{ $lang }}" class="@error('title_'.$lang) text-danger @enderror">{{
                            tr('Title') }}</label>
                        <input type="text" name="title_{{ $lang }}"
                            class="form-control @error('title_'.$lang) is-invalid @enderror" id="title_{{ $lang }}">
                        @error('title_'.$lang)
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <x-form.description name="description_{{ $lang }}" value="" />

                    <x-form.content name="content_{{ $lang }}" value="" />
                    <div class="form-group">
                        <label for="pdf_title_{{ $lang }}">{{ tr('Pdf title') }}</label>
                        <input type="text" class="form-control @error('pdf_title_'.$lang) is-invalid @enderror"
                            name="pdf_title_{{ $lang }}" id="pdf_title_{{ $lang }}">
                        @error('pdf_title_'.$lang)
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pdf" class="mb-2">{{ tr('Pdf') }}</label>
                        <div class="input-group">
                            <input id="thumbnail_{{ $lang }}"
                                class="form-control @error('pdf_'.$lang) is-invalid @enderror" type="text"
                                name="pdf_{{ $lang }}" />
                            <span class="input-group-btn">
                                <a id="lfm_{{ $lang }}" data-input="thumbnail_{{ $lang }}" data-preview="holder"
                                    class="btn btn-primary">
                                    {{ tr('Choose') }}
                                </a>
                            </span>
                        </div>
                        @error('pdf_'.$lang)
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                @endforeach
            </div>
            <div class="form-group">
                <label for="pdf_type">{{ tr('Pdf Type') }}</label>
                <select class="custom-select rounded-0 select2" name="pdf_type" id="pdf_type">
                    <option value="2">{{ tr('Download') }}</option>
                    <option value="1">{{ tr('Show') }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="show_on_slider">{{ tr('Show on slider') }}</label>
                <select class="custom-select rounded-0 select2" name="show_on_slider" id="show_on_slider">
                    <option value="2">{{ tr('Yes') }}</option>
                    <option value="1">{{ tr('No') }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="anons_image" class="mb-2">{{ tr('Anons Image') }}</label>
                <div class="input-group">
                    <input id="thumbnail2" class="form-control" type="text" name="anons_image">
                    <span class="input-group-btn">
                        <a id="lfm2" data-input="thumbnail2" data-preview="holder" class="btn btn-primary">
                            <i class="fas fa-images"></i>
                            {{ tr('Choose') }}
                        </a>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label for="body_image" class="mb-2">{{ tr('Body Image') }}</label>
                <div class="input-group">
                    <input id="thumbnail3" class="form-control" type="text" name="body_image">
                    <span class="input-group-btn">
                        <a id="lfm3" data-input="thumbnail3" data-preview="holder" class="btn btn-primary">
                            <i class="fas fa-images"></i>
                            {{ tr('Choose') }}
                        </a>
                    </span>
                </div>
            </div>
            <input type="hidden" class="form-control" name="list_type_id" value="1">
            <div class="form-group">
                <label for="order">{{ tr('Order') }}</label>
                <input type="number" name="order" class="form-control" id="order" value="50">
            </div>

            <div class="form-group">
                <label for="date" class="@error('date') text-danger @enderror">{{ tr('Date') }}</label>
                <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" />
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
                <label for="right_menu">{{ tr('Right Menu') }}</label>
                <select class="custom-select rounded-0 select2" name="right_menu" id="right_menu">
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
                <button type="submit" class="btn btn-primary">{{ tr('Add') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
