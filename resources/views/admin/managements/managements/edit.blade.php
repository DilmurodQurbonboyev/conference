@extends('admin.layouts.app')
@section('title')
{{ tr('Update Management') }}
@endsection
@section('header')
<div class="col-sm-6">
    <h1>{{ tr('Update Management') }}</h1>
</div>
<div class="col-sm-6">
    <div class="breadcrumb float-sm-right">
        {{ Breadcrumbs::render('managements/edit', $managements->id) }}
    </div>
</div>
@endsection
@section('content')
<div class="card card-primary card-outline card-outline-tabs">
    <div class="card-header p-0 border-bottom-0">
        <x-language-tab />
    </div>
    <div class="card-body">
        <form action="{{ route('managements.update', $managements->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="m_category_id">{{ tr('Category') }}</label>
                <select class="form-control select2 @error('m_category_id') is-invalid @enderror" name="m_category_id"
                    id="m_category_id">
                    <option value="0">{{ tr('Select Category') }}</option>
                    @foreach ($managementCategories as $managementCategory)
                    <option value="{{ $managementCategory->id }}" {{ $managements->m_category_id ==
                        $managementCategory->id ? 'selected' : '' }}>{{ $managementCategory->title }}</option>
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
                            class="form-control @error('title_'.$lang) is-invalid @enderror" id="title_{{ $lang }}"
                            value="{{ $managements->translate($lang)->title ?? '' }}">
                        @error('title_'.$lang)
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="leader_{{ $lang }}">{{ tr('Leader') }}</label>
                        <input type="text" class="form-control" name="leader_{{ $lang }}" id="leader_{{ $lang }}" {{
                            $managements->leader ?? '' }}>
                    </div>
                    <div class="form-group">
                        <label for="reception_{{ $lang }}">{{ tr('Reception') }}</label>
                        <textarea class="form-control" name="reception_{{ $lang }}" id="reception_{{ $lang }}" cols="30"
                            rows="2">{{ $managements->translate($lang)->reception ?? '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="address_{{ $lang }}">{{ tr('Address') }}</label>
                        <textarea class="form-control" name="address_{{ $lang }}" id="address_{{ $lang }}" cols="30"
                            rows="2">{{ $managements->translate($lang)->address ?? '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="biography_{{ $lang }}">{{ tr('Biography') }}</label>
                        <textarea class="form-control" name="biography_{{ $lang }}" id="biography_{{ $lang }}" cols="30"
                            rows="4">{{ $managements->translate($lang)->biography ?? '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="description_{{ $lang }}">{{ tr('Functions') }}</label>
                        <textarea class="form-control" name="description_{{ $lang }}" id="description_{{ $lang }}"
                            cols="30" rows="4">{{ $managements->translate($lang)->description ?? '' }}</textarea>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="form-group">
                <label for="image" class="mb-2">{{ tr('Organization Image') }}</label>
                <div class="input-group">
                    <input id="thumbnail2" class="form-control" type="text" name="image" value="{{ $managements->image }}">
                    <span class="input-group-btn">
                        <a id="lfm3" data-input="thumbnail2" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> {{ tr('Choose') }}
                        </a>
                    </span>
                </div>
                <img src="{{ $managements->image }}" class="p-2" width="100%" alt="">
            </div>
            <div class="form-group">
                <label for="anons_image" class="mb-2">{{ tr('Leader Image') }}</label>
                <div class="input-group">
                    <input id="thumbnail2" class="form-control" type="text" name="anons_image"
                        value="{{ $managements->anons_image }}">
                    <span class="input-group-btn">
                        <a id="lfm2" data-input="thumbnail2" data-preview="holder" class="btn btn-primary">
                            {{ tr('Choose') }}
                        </a>
                    </span>
                </div>
                <img src="{{ $managements->anons_image }}" width="100%" class="p-2" alt="">
            </div>
            <input type="hidden" class="form-control" name="list_type_id" value="10">
            <div class="form-group">
                <label for="phone">{{ tr('Phone') }}</label>
                <input type="text" class="form-control" name="phone" id="phone" value="{{ $managements->phone }}">
            </div>
            <div class="form-group">
                <label for="email">{{ tr('Email') }}</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ $managements->email }}">
            </div>
            <div class="form-group">
                <label for="fax">{{ tr('Fax') }}</label>
                <input type="text" class="form-control" name="fax" id="fax" value="{{ $managements->fax }}">
            </div>
            <div class="form-group">
                <label for="order">{{ tr('Order') }}</label>
                <input type="number" name="order" class="form-control" id="order" value="{{ $managements->order }}">
            </div>
            <div class="form-group">
                <label for="status">{{ tr('Status') }}</label>
                <select class="form-control select2" name="status" id="status">
                    <option value="2" {{ $managements->status == "2" ? 'selected' : '' }}>{{ tr('Active') }}</option>
                    <option value="1" {{ $managements->status == "1" ? 'selected' : '' }}>{{ tr('Inactive') }}</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">{{ tr('Update') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
