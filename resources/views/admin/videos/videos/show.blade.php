@extends('admin.layouts.app')
@section('title')
    {{ tr('About Video') }}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1 class="">{{ $videos->title ?? '' }}</h1>
    </div>
    <div class="col-sm-6">
        <div class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('videos/show', $videos->id) }}
        </div>
    </div>
@endsection
@section('content')
    <div class="p-3 d-flex justify-content-end" style="grid-gap: 2px">
        @can('videos.create')
            <a class="btn btn-success" href="{{ route('videos.create') }}">
                <i class="fa fa-plus"></i>
            </a>
        @endcan
        @can('videos.index')
            <a class="btn btn-info text-white" href="{{ route('videos.index') }}">
                <i class="fa fa-list"></i>
            </a>
        @endcan
        @can('videos.edit')
            <a class="btn btn-primary" href="{{ route('videos.edit', $videos->id) }}">
                <i class="fa fa-edit"></i>
            </a>
        @endcan
        @can('videos.destroy')
            <form method="POST" action="{{ route('videos.destroy', $videos->id) }}">
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
                                        <th scope="row">{{ $videos->id }}</th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Category') }}</td>
                                        <th scope="row">
                                            @if ($videos->category != null)
                                                {{ $videos->category->title }}
                                            @else
                                                {{ tr('Main Category') }}
                                            @endif
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Title') }}</td>
                                        <th scope="row">{{ $videos->translate($lang)->title ?? '---' }}</th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Description') }}</td>
                                        <th scope="row">{!! $videos->translate($lang)->description ?? '---' !!}</th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Video Code') }}</td>
                                        <th>{{ $videos->video_code }}</th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Video Image') }}</td>
                                        <th>
                                            @if ($videos->image == null)
                                                <span class="text-danger">{{ tr('No Image') }}</span>
                                            @else
                                                <img width="20%" src="{!! $videos->image !!}" alt="">
                                            @endif
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Date') }}</td>
                                        <th>{{ $videos->date }}</th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Status') }}</td>
                                        <th scope="row">
                                            @if ($videos->status == 2)
                                                <span class="badge bg-success p-2">{{ tr('Active') }}</span>
                                            @else
                                                <span class="badge bg-danger p-2">{{ tr('Inactive') }}</span>
                                            @endif
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Creator') }}</td>
                                        <th scope="row">{{ Str::ucfirst($videos->user['name']) }}</th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Modifier') }}</td>
                                        <th scope="row">
                                            @if ($videos->modifier_id)
                                                {{ Str::ucfirst($videos->modifier['name']) }}
                                            @else
                                                <span class="text-danger">{{ tr('Not set') }}</span>
                                            @endif
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Created At') }}</td>
                                        <th scope="row">{{ $videos->created_at->format('d.m.20y') }}</th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Updated At') }}</td>
                                        <th scope="row">{{ $videos->updated_at->format('d.m.20y') }}</th>
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
