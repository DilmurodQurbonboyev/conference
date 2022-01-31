@extends('admin.layouts.app')
@section('title')
    {{tr('About News Category')}}
@endsection

<?php $langs = ['oz', 'uz', 'ru', 'en'] ?>

@section('header')

    <div class="col-sm-6">
        <h1>{{ $newsCategory->title ?? '' }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('permissions/show', $newsCategory->id) }}
        </ol>
    </div>

@endsection
@section('content')
    <div class="p-3 d-flex justify-content-end">
        <x-show-button destroyAction="{{ route('permissions.destroy', $newsCategory->id) }}"
                       createAction="{{ route('permissions.create') }}"
                       indexAction="{{ route('permissions.index') }}"
                       editAction="{{ route('permissions.edit', $newsCategory->id ) }}"/>
    </div>
    <div class="card card-primary card-outline card-tabs">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <x-language-tab/>
        </div>
        <div class="card-body">
            <div class="tab-content">
                @foreach ($langs as $lang)
                    <div class="tab-pane fade show" id="{{ $lang }}" role="tabpanel" aria-labelledby="{{ $lang }}">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <tbody>
                                <tr>
                                    <td>{{ tr('Id') }}</td>
                                    <th scope="row">{{ $newsCategory->id }}</th>
                                </tr>
                                <tr>
                                    <td>{{ tr('Main') }}</td>
                                    <th scope="row">
                                        @if ($newsCategory->parent_id == 0)
                                            {{ tr('Main Category') }}
                                        @else
                                            {{ $newsCategory->parent->title ?? '' }}
                                        @endif
                                    </th>
                                </tr>
                                <tr>
                                    <td>{{ tr('Title') }}</td>
                                    <th scope="row">{{ $newsCategory->translate($lang)->title ?? '---' }}</th>
                                </tr>
                                <tr>
                                    <td>{{ tr('Color') }}</td>
                                    <th scope="row">{{ $newsCategory->color }}</th>
                                </tr>
                                <tr>
                                    <td>{{ tr('Status') }}</td>
                                    <th scope="row">
                                        @if ($newsCategory->status == 2)
                                            <span class="badge bg-success p-2">{{tr('Active')}}</span>
                                        @else
                                            <span class="badge bg-danger p-2">{{tr('Inactive')}}</span>
                                        @endif
                                    </th>
                                </tr>
                                <tr>
                                    <td>{{ tr('Creator') }}</td>
                                    <th scope="row">{{ Str::ucfirst($newsCategory->user['name']) }}</th>
                                </tr>
                                <tr>
                                    <td>{{ tr('Modifier') }}</td>
                                    <th scope="row">
                                        @if($newsCategory->modifier_id)
                                            {{ Str::ucfirst($newsCategory->modifier['name']) }}
                                        @else
                                            <span class="text-danger">{{tr('Not set')}}</span>
                                        @endif
                                    </th>
                                </tr>
                                <tr>
                                    <td>{{ tr('Created At') }}</td>
                                    <th scope="row">{{ $newsCategory->created_at->format('d.m.20y') }}</th>
                                </tr>
                                <tr>
                                    <td>{{ tr('Updated At') }}</td>
                                    <th scope="row">{{ $newsCategory->updated_at->format('d.m.20y') }}</th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
