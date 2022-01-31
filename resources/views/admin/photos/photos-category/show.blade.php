@extends('admin.layouts.app')
@section('title')
    {{ tr('About Photos Category') }}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1>{{ $photosCategory->title ?? '' }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('photos-category/show', $photosCategory->id) }}
        </ol>
    </div>
@endsection
@section('content')
    <div class="p-3 d-flex justify-content-end" style="grid-gap: 2px">
        @can('photos-category.create')
            <a class="btn btn-success" href="{{ route('photos-category.create') }}">
                <i class="fa fa-plus"></i>
            </a>
        @endcan
        @can('photos-category.index')
            <a class="btn btn-info text-white" href="{{ route('photos-category.index') }}">
                <i class="fa fa-list"></i>
            </a>
        @endcan
        @can('photos-category.edit')
            <a class="btn btn-primary" href="{{ route('photos-category.edit', $photosCategory->id) }}">
                <i class="fa fa-edit"></i>
            </a>
        @endcan
        @can('photos-category.destroy')
            <form method="POST" action="{{ route('photos-category.destroy', $photosCategory->id) }}">
                @csrf
                @method('DELETE')
                <input name="_method" type="hidden" value="DELETE">
                <button type="submit" class="btn btn-danger">
                    <i class="fa fa-trash"></i></button>
            </form>
        @endcan
    </div>
    <div class="card card-primary card-outline card-tabs">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <x-language-tab />
        </div>
        <div class="card-body">
            <div class="tab-content">
                @foreach (Config::get('translatable.locales') as $lang)
                    <div class="tab-pane fade show" id="{{ $lang }}" role="tabpanel"
                        aria-labelledby="{{ $lang }}">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <tbody>
                                    <tr>
                                        <td>{{ tr('Id') }}</td>
                                        <th scope="row">{{ $photosCategory->id }}</th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Main') }}</td>
                                        <th scope="row">
                                            @if ($photosCategory->parent_id == 0)
                                                {{ tr('Main Category') }}
                                            @else
                                                {{ $photosCategory->parent->title ?? '' }}
                                            @endif
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Title') }}</td>
                                        <th scope="row">{{ $photosCategory->translate($lang)->title ?? '---' }}</th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Color') }}</td>
                                        <th scope="row">{{ $photosCategory->color }}</th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Status') }}</td>
                                        <th scope="row">
                                            @if ($photosCategory->status == 2)
                                                <span class="badge bg-success p-2">{{ tr('Active') }}</span>
                                            @else
                                                <span class="badge bg-danger p-2">{{ tr('Inactive') }}</span>
                                            @endif
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Creator') }}</td>
                                        <th scope="row">{{ Str::ucfirst($photosCategory->user['name']) }}</th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Modifier') }}</td>
                                        <th scope="row">
                                            @if ($photosCategory->modifier_id)
                                                {{ Str::ucfirst($photosCategory->modifier['name']) }}
                                            @else
                                                <span class="text-danger">{{ tr('Not set') }}</span>
                                            @endif
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Created At') }}</td>
                                        <th scope="row">{{ $photosCategory->created_at->format('d.m.20y') }}</th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Updated At') }}</td>
                                        <th scope="row">{{ $photosCategory->updated_at->format('d.m.20y') }}</th>
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
