@extends('admin.layouts.app')
@section('title')
    {{tr('Update Menu Category')}}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1>{{ tr('Update Menu Category') }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('menus-category/edit', $menusCategory->id) }}
        </ol>
    </div>
@endsection
@section('content')
    <div class="card card-primary card-outline card-tabs">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <x-language-tab/>
        </div>
        <div class="card-body">
            <form action="{{ route('menus-category.update', $menusCategory->id) }}" method="post">
                @csrf
                @method('patch')
                <div class="tab-content">
                    @foreach (Config::get('translatable.locales') as $lang)
                        <div class="tab-pane fade show" id="{{ $lang }}" role="tabpanel" aria-labelledby="{{ $lang }}">
                            <div class="form-group">
                                <label for="title_{{ $lang }}">{{ tr('Title') }}</label>
                                <input type="text" name="title_{{ $lang }}"
                                       class="form-control @error('title_'.$lang) is-invalid @enderror"
                                       id="title_{{ $lang }}"
                                       value="{{ $menusCategory->translate($lang)->title ?? '' }}">
                                @error('title_'.$lang)
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="status">{{ tr('Status') }}</label>
                    <select class="custom-select rounded-0 select2" name="status" id="status">
                        <option value="2"
                                class="{{ $menusCategory->status == "2" ? 'selected' : '' }}">{{tr('Active')}}</option>
                        <option value="1"
                                class="{{ $menusCategory->status == "1" ? 'selected' : '' }}">{{tr('Inactive')}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        {{tr('Add')}}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
