@extends('admin.layouts.app')
@section('title')
{{ tr('About News Category') }}
@endsection
@section('header')
<div class="col-sm-6">
    <h1>{{ $newsCategory->title ?? '' }}</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        {{ Breadcrumbs::render('news-category/show', $newsCategory->id) }}
    </ol>
</div>
@endsection
@section('content')
<div class="p-3 d-flex justify-content-end" style="grid-gap: 2px">
    @can('news-category.create')
    <a class="btn btn-success" href="{{ route('news-category.create') }}">
        <i class="fa fa-plus"></i>
    </a>
    @endcan
    @can('news-category.index')
    <a class="btn btn-info text-white" href="{{ route('news-category.index') }}">
        <i class="fa fa-list"></i>
    </a>
    @endcan
    @can('news-category.edit')
    <a class="btn btn-primary" href="{{ route('news-category.edit', $newsCategory->id) }}">
        <i class="fa fa-edit"></i>
    </a>
    @endcan
    @can('news-category.destroy')
    <form method="POST" action="{{ route('news-category.destroy', $newsCategory->id) }}">
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
                                <td>{{ tr('Image') }}</td>
                                <th>
                                    @if ($newsCategory->image)
                                    <a data-fancybox="single" href="{{ $newsCategory->image }}">
                                        <div class="foto-in">
                                            <img width="300px" src="{{ $newsCategory->image }}" />
                                        </div>
                                    </a>
                                    @else
                                    <span class="text-danger">{{ tr('Not set') }}</span>
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <td>{{ tr('Status') }}</td>
                                <th scope="row">
                                    @if ($newsCategory->status == 2)
                                    <span class="badge bg-success p-2">{{ tr('Active') }}</span>
                                    @else
                                    <span class="badge bg-danger p-2">{{ tr('Inactive') }}</span>
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
                                    @if ($newsCategory->modifier_id)
                                    {{ Str::ucfirst($newsCategory->modifier['name']) }}
                                    @else
                                    <span class="text-danger">{{ tr('Not set') }}</span>
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
