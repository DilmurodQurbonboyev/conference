@extends('admin.layouts.app')
@section('title')
    {{ tr('About Menus Category') }}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1>{{ $menusCategory->title ?? '' }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('menus-category/show', $menusCategory->id) }}
        </ol>
    </div>
@endsection
@section('content')
    <div class="p-3 d-flex justify-content-end" style="grid-gap: 2px">
        @can('menus-category.create')
            <a class="btn btn-success" href="{{ route('menus-category.create') }}">
                <i class="fa fa-plus"></i>
            </a>
        @endcan
        @can('menus-category.index')
            <a class="btn btn-info text-white" href="{{ route('menus-category.index') }}">
                <i class="fa fa-list"></i>
            </a>
        @endcan
        @can('menus-category.edit')
            <a class="btn btn-primary" href="{{ route('menus-category.edit', $menusCategory->id) }}">
                <i class="fa fa-edit"></i>
            </a>
        @endcan
        @can('menus-category.destroy')
            <form method="POST" action="{{ route('menus-category.destroy', $menusCategory->id) }}">
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
                                        <th scope="row">{{ $menusCategory->id }}</th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Title') }}</td>
                                        <th scope="row">{{ $menusCategory->translate($lang)->title ?? '---' }}</th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Status') }}</td>
                                        <th scope="row">
                                            @if ($menusCategory->status == 2)
                                                <span class="badge bg-success p-2">{{ tr('Active') }}</span>
                                            @else
                                                <span class="badge bg-danger p-2">{{ tr('Inactive') }}</span>
                                            @endif
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Creator') }}</td>
                                        <th scope="row">{{ Str::ucfirst($menusCategory->user['name']) }}</th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Modifier') }}</td>
                                        <th scope="row">
                                            @if ($menusCategory->modifier_id)
                                                {{ Str::ucfirst($menusCategory->modifier['name']) }}
                                            @else
                                                <span class="text-danger">{{ tr('Not set') }}</span>
                                            @endif
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Created At') }}</td>
                                        <th scope="row">{{ $menusCategory->created_at->format('d.m.20y') }}</th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Updated At') }}</td>
                                        <th scope="row">{{ $menusCategory->updated_at->format('d.m.20y') }}</th>
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
