@extends('admin.layouts.app')
@section('title')
    {{ tr('Edit Video') }}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1 class="m-0">{{ tr('Edit Video') }}</h1>
    </div>
    <div class="col-sm-6">
        <div class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('videos/edit', $videos->id) }}
        </div>
    </div>
@endsection
@section('content')
    <div class="card card-primary card-outline card-tabs">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <x-language-tab/>
        </div>
        <div class="card-body">
            <form action="{{ route('videos.update', $videos->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="lists_category_id">{{ tr('Category') }}</label>
                    <select class="form-control select2 @error('lists_category_id') is-invalid @enderror"
                            name="lists_category_id" id="lists_category_id">
                        <option value="0">{{ tr('Choose') }}...</option>
                        @foreach ($videosCategories as $videosCategory)
                            <option value="{{ $videosCategory->id }}" {{ $videos->lists_category_id == $videosCategory->id ?
                        'selected' : ''}}>{{ $videosCategory->title }}</option>
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
                                       id="title_{{ $lang }}"
                                       value="{{ $videos->translate($lang)->title ?? '' }}">
                                @error('title_'.$lang)
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <x-form.description name="description_{{ $lang }}"
                                                value="{!! $videos->translate($lang)->description ?? '' !!}"/>
                        </div>
                    @endforeach
                </div>
                <input type="hidden" class="form-control" name="list_type_id" value="8">
                <div class="row">
                    <div class="form-group col-6">
                        <label for="video_code">{{ tr('Video Code') }}</label>
                        <input type="text" name="video_code" class="form-control" id="video_code"
                               value="{{ $videos->video_code }}">
                    </div>
                    <div class="form-group col-6">
                        <label for="video" class="mb-2">{{ tr('Video') }}</label>
                        <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm2" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> {{ tr('Choose') }}
                            </a>
                        </span>
                            <input id="thumbnail" class="form-control" type="text" name="video"
                                   value="{{ $videos->video }}">
                        </div>
                        <img src="{{ $videos->video }}" class="p-2" width="30%" alt="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="image" class="mb-2">{{ tr('Video Image') }}</label>
                    <div class="input-group">
                    <span class="input-group-btn">
                        <a id="lfm3" data-input="thumbnail2" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> {{ tr('Choose') }}
                        </a>
                    </span>
                        <input id="thumbnail2" class="form-control" type="text" name="image"
                               value="{{ $videos->image }}">
                    </div>
                    <img src="{{ $videos->image }}" class="p-2" width="30%" alt="">
                </div>
                <div class="form-group">
                    <label for="media_type">{{ tr('Video Type') }}</label>
                    <select class="custom-select select2" name="media_type" id="media_type">
                        <option value="1" {{ $videos->media_type == "1" ? 'selected' : '' }}>{{ tr('Inactive') }}
                        </option>
                        <option value="2" {{ $videos->media_type == "2" ? 'selected' : '' }}>{{ tr('Image') }}
                        </option>
                        <option
                            value="3" {{ $videos->media_type == "3" ? 'selected' : '' }}>{{ tr('Video from this site') }}
                        </option>
                        <option
                            value="4" {{ $videos->media_type == "4" ? 'selected' : '' }}>{{ tr('Video from utube.uz') }}
                        </option>
                        <option value="5" {{ $videos->media_type == "5" ? 'selected' : ''
                            }}>{{ tr('Video from youtube.com') }}</option>
                        <option value="6" {{ $videos->media_type == "6" ? 'selected' : ''
                            }}>{{ tr('Link') }}</option>

                    </select>
                </div>
                <div class="form-group">
                    <label for="date">{{ tr('Date') }}</label>
                    <input type="date" class="form-control" name="date" value="{{ $videos->date }}"/>
                </div>
                <div class="form-group">
                    <label for="parent_id">{{ tr('Main') }}</label>
                    <select class="form-control select2" name="parent_id" id="parent_id">
                        <option value="2" {{ $videos->parent_id == "2" ? 'selected' : '' }}>{{ tr('Yes') }}</option>
                        <option value="1" {{ $videos->parent_id == "1" ? 'selected' : '' }}>{{ tr('No') }}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="right_menu">{{ tr('Right Menu') }}</label>
                    <select class="form-control select2" name="right_menu" id="right_menu">
                        <option value="2" {{ $videos->right_menu == "2" ? 'selected' : '' }}>{{ tr('Yes') }}</option>
                        <option value="1" {{ $videos->right_menu == "1" ? 'selected' : '' }}>{{ tr('No') }}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">{{ tr('Status') }}</label>
                    <select class="form-control select2" name="status" id="status">
                        <option value="2" {{ $videos->status == "2" ? 'selected' : '' }}>{{ tr('Active') }}</option>
                        <option
                            value="1" {{ $videos->status == "1" ? 'selected' : '' }}>{{ tr('Inactive') }}</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">{{ tr('Update') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection

