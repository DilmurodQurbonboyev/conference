@extends('admin.layouts.app')
@section('title')
    {{ tr('Create Management') }}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1>{{ tr('Create Management') }}</h1>
    </div>
    <div class="col-sm-6">
        <div class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('managements/create') }}
        </div>
    </div>
@endsection
@section('content')
    <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
            <x-language-tab/>
        </div>
        <div class="card-body">
            <form action="{{ route('managements.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="m_category_id">{{ tr('Category') }}</label>
                    <select class="form-control select2 @error('m_category_id') is-invalid @enderror"
                            name="m_category_id"
                            id="m_category_id">
                        <option value="0">{{ tr('Select Category') }}</option>
                        @foreach ($managementCategories as $managementCategory)
                            <option value="{{ $managementCategory->id }}">{{ $managementCategory->title }}</option>
                        @endforeach
                    </select>
                    @error('m_category_id')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="tab-content">
                    @foreach (Config::get('translatable.locales') as $lang)
                        <div class="tab-pane fade show" id="{{ $lang }}" role="tabpanel" aria-labelledby="{{ $lang }}">
                            <div class="form-group">
                                <label for="title_{{ $lang }}"
                                       class="@error('title_'.$lang) text-danger @enderror">{{tr('Title')}}</label>
                                <input type="text" name="title_{{ $lang }}"
                                       class="form-control @error('title_'.$lang) is-invalid @enderror"
                                       id="title_{{ $lang }}">
                                @error('title_'.$lang)
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="leader_{{ $lang }}">{{ tr('Leader') }}</label>
                                <input type="text" class="form-control" name="leader_{{ $lang }}"
                                       id="leader_{{ $lang }}">
                            </div>
                            <div class="form-group">
                                <label for="reception_{{ $lang }}">{{ tr('Reception') }}</label>
                                <textarea class="form-control" name="reception_{{ $lang }}" id="reception_{{ $lang }}"
                                          cols="30"
                                          rows="2"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="address_{{ $lang }}">{{ tr('Address') }}</label>
                                <textarea class="form-control" name="address_{{ $lang }}" id="address_{{ $lang }}"
                                          cols="30"
                                          rows="2"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="biography_{{ $lang }}">{{ tr('Biography') }}</label>
                                <textarea class="form-control" name="biography_{{ $lang }}" id="biography_{{ $lang }}"
                                          cols="30"
                                          rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="description_{{ $lang }}">{{ tr('Functions') }}</label>
                                <textarea class="form-control" name="description_{{ $lang }}"
                                          id="description_{{ $lang }}"
                                          cols="30" rows="4"></textarea>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="image" class="mb-2">{{ tr('Organization Image') }}</label>
                    <div class="input-group">
                        <input id="thumbnail2" class="form-control" type="text" name="image">
                        <span class="input-group-btn">
                            <a id="lfm2" data-input="thumbnail2" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> {{tr('Choose')}}
                            </a>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="anons_image" class="mb-2">{{ tr('Leader Image') }}</label>
                    <div class="input-group">
                        <input id="thumbnail3" class="form-control" type="text" name="anons_image">
                        <span class="input-group-btn">
                            <a id="lfm3" data-input="thumbnail3" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> {{ tr('Choose') }}
                            </a>
                        </span>
                    </div>
                </div>
                <input type="hidden" class="form-control" name="list_type_id" value="10">
                <div class="form-group">
                    <label for="phone">{{ tr('Phone') }}</label>
                    <input type="text" class="form-control" name="phone" id="phone">
                </div>
                <div class="form-group">
                    <label for="email">{{ tr('Email') }}</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="fax">{{ tr('Fax') }}</label>
                    <input type="text" class="form-control" name="fax" id="fax">
                </div>
                <div class="form-group">
                    <label for="order">{{ tr('Order') }}</label>
                    <input type="number" name="order" class="form-control" id="order" value="50">
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
