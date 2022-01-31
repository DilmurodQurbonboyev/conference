@extends('admin.layouts.app')
@section('title')
{{tr('Update News')}}
@endsection
@section('header')
<div class="col-sm-6">
    <h1>{{tr('Update News')}}</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        {{ Breadcrumbs::render('news/edit', $news->id) }}
    </ol>
</div>
@endsection
@section('content')
<div class="card card-primary card-outline card-tabs">
    <div class="card-header p-0 pt-1 border-bottom-0">
        <x-language-tab />
    </div>
    <div class="card-body">
        <form action="{{ route('news.update', $news->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="lists_category_id">{{ tr('Category') }}</label>
                <select class="custom-select rounded-0 select2" name="lists_category_id" id="lists_category_id">
                    <option value="0">{{ tr('Choose') }}...</option>
                    @foreach ($newsCategories as $newsCategory)
                    <option value="{{ $newsCategory->id }}" {{ $news->lists_category_id == $newsCategory->id ?
                        'selected' : ''}}>{{ $newsCategory->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="tab-content">
                @foreach (Config::get('translatable.locales') as $lang)
                <div class="tab-pane fade show" id="{{ $lang }}" role="tabpanel" aria-labelledby="{{ $lang }}">
                    <div class="form-group">
                        <label for="title_{{ $lang }}">{{ tr('Title') }}</label>
                        <input type="text" name="title_{{ $lang }}"
                            class="form-control @error('title_'.$lang) is-invalid @enderror" id="title_{{ $lang }}"
                            value="{{ $news->translate($lang)->title ?? '' }}">
                        @error('title_'.$lang)
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <x-form.description name="description_{{ $lang }}"
                        value="{!! $news->translate($lang)->description ?? '' !!}" />
                    <x-form.content name="content_{{ $lang }}" value="{!! $news->translate($lang)->content ?? '' !!}" />
                    <div class="form-group">
                        <label for="pdf_title_{{ $lang }}">{{ tr('Pdf title') }}</label>
                        <input type="text" class="form-control @error('pdf_title_'.$lang) is-invalid @enderror"
                            name="pdf_title_{{ $lang }}" id="pdf_title_{{ $lang }}"
                            value="{{ $news->translate($lang)->pdf_title ?? '' }}">
                        @error('pdf_title_'.$lang)
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pdf" class="mb-2">{{ tr('Pdf') }}</label>
                        <div class="input-group">
                            <input id="thumbnail_{{ $lang }}" class="form-control" type="text" name="pdf_{{ $lang }}"
                                value="{{ $news->translate($lang)->pdf ?? '' }}" />
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
                    <option value="2" {{ $news->pdf_type == "2" ? 'selected' : '' }}>{{ tr('Download') }}</option>
                    <option value="1" {{ $news->pdf_type == "1" ? 'selected' : '' }}>{{ tr('Show') }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="show_on_slider">{{ tr('Show on slider') }}</label>
                <select class="custom-select rounded-0 select2" name="show_on_slider" id="show_on_slider">
                    <option value="2" {{ $news->show_on_slider == "2" ? 'selected' : '' }}>{{ tr('Yes') }}</option>
                    <option value="1" {{ $news->show_on_slider == "1" ? 'selected' : '' }}>{{ tr('No') }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="anons_image" class="mb-2">{{ tr('Anons Image') }}</label>
                <div class="input-group">
                    <input value="{{ $news->anons_image }}" id="thumbnail2" class="form-control" type="text"
                        name="anons_image">
                    <span class="input-group-btn">
                        <a id="lfm2" data-input="thumbnail2" data-preview="holder" class="btn btn-primary">
                            <i class="fas fa-images"></i>
                            {{ tr('Choose') }}
                        </a>
                    </span>
                </div>
                <img class="p-2" src="{{ $news->anons_image }}" alt="" width="30%">
            </div>
            <div class="form-group">
                <label for="body_image" class="mb-2">{{ tr('Body Image') }}</label>
                <div class="input-group">
                    <input id="thumbnail3" class="form-control" type="text" value="{!! $news->body_image !!}"
                        name="body_image">
                    <span class="input-group-btn">
                        <a id="lfm3" data-input="thumbnail3" data-preview="holder" class="btn btn-primary">
                            <i class="fas fa-images"></i>
                            {{ tr('Choose') }}
                        </a>
                    </span>
                </div>
                @php
                $res = explode(',', $news->body_image);
                @endphp
                @foreach ($res as $i)
                @if ($i)
                <img class="p-2" width="30%" src="{{ $i }}" alt="">
                @endif
                @endforeach
            </div>
            <input type="hidden" class="form-control" name="list_type_id" value="1">
            <div class="form-group">
                <label for="order">{{ tr('Order') }}</label>
                <input type="number" name="order" class="form-control" id="order" value="{{ $news->order }}">
            </div>
            <div class="form-group">
                <label for="date">{{ tr('Date') }}</label>
                <input type="date" class="form-control" name="date" value="{{ $news->date }}" />
            </div>
            <div class="form-group">
                <label for="parent_id">{{ tr('Main') }}</label>
                <select class="custom-select rounded-0 select2" name="parent_id" id="parent_id">
                    <option value="2" {{ $news->parent_id == "2" ? 'selected' : '' }}>{{ tr('Yes') }}</option>
                    <option value="1" {{ $news->parent_id == "1" ? 'selected' : '' }}>{{ tr('No') }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="right_menu">{{ tr('Right Menu') }}</label>
                <select class="custom-select rounded-0 select2" name="right_menu" id="right_menu">
                    <option value="2" {{ $news->right_menu == '2' ? 'selected' : '' }}>{{ tr('Yes') }}</option>
                    <option value="1" {{ $news->right_menu == '1' ? 'selected' : '' }}>{{ tr('No') }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status">{{ tr('Status') }}</label>
                <select class="custom-select rounded-0 select2" name="status" id="status">
                    <option value="2" {{ $news->status == "2" ? 'selected' : '' }}>{{ tr('Active') }}</option>
                    <option value="1" {{ $news->status == "1" ? 'selected' : '' }}>{{ tr('Inactive') }}</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">{{ tr('Update') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
