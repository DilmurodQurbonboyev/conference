@extends('admin.layouts.app')
@section('title')
{{ tr('About Menu Category') }}
@endsection
@section('header')
<div class="col-sm-6">
    <h1>{{ $menu->title ?? '' }}</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        {{ Breadcrumbs::render('menus/show', $menu->id) }}
    </ol>
</div>
@endsection
@section('content')
<div class="p-3 d-flex justify-content-end" style="grid-gap: 2px">
    @can('menus.create')
    <a class="btn btn-success" href="{{ route('menus.create') }}">
        <i class="fa fa-plus"></i>
    </a>
    @endcan
    @can('menus.index')
    <a class="btn btn-info text-white" href="{{ route('menus.index') }}">
        <i class="fa fa-list"></i>
    </a>
    @endcan
    @can('menus.edit')
    <a class="btn btn-primary" href="{{ route('menus.edit', $menu->id) }}">
        <i class="fa fa-edit"></i>
    </a>
    @endcan
    @can('menus.destroy')
    <form method="POST" action="{{ route('menus.destroy', $menu->id) }}">
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
                                <th scope="row">{{ $menu->id }}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Title') }}</td>
                                <th scope="row">{{ $menu->translate($lang)->title ?? '---' }}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Main') }}</td>
                                <th>
                                    @if ($menu->parent_id !== null)
                                    {{ $menu->parent->title ?? '---' }}
                                    @else
                                    {{ tr('Main Category') }}
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <td>{{ tr('Category') }}</td>
                                <th scope="row">
                                    @if ($menu->menus_category_id)
                                    {{ $menu->category->title }}
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <td>{{ tr('Link') }}</td>
                                <th>{{ $menu->link }}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Image') }}</td>
                                <th>
                                    @if ($menu->image)
                                    <a data-fancybox="single" href="{{ $menu->image }}">
                                        <div class="foto-in">
                                            <img width="300px" src="{{ $menu->image }}" />
                                        </div>
                                    </a>
                                    @else
                                    <span class="text-danger">{{ tr('Not set') }}</span>
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <td>{{ tr('Link Type') }}</td>
                                @if ($menu->link_type == 1)
                                <th>{{ tr('Inactive') }}</th>
                                @endif
                                @if ($menu->link_type == 2)
                                <th>{{ tr('Local opens in this window') }}</th>
                                @endif
                                @if ($menu->link_type == 3)
                                <th>{{ tr('Local opens in a new window') }}</th>
                                @endif
                                @if ($menu->link_type == 4)
                                <th>{{ tr('Global opens in this window') }}</th>
                                @endif
                                @if ($menu->link_type == 5)
                                <th>{{ tr('Global opens in a new window') }}</th>
                                @endif
                            </tr>
                            <tr>
                                <td>{{ tr('Order') }}</td>
                                <th>{{ $menu->order }}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Status') }}</td>
                                <th scope="row">
                                    @if ($menu->status == 2)
                                    <span class="badge bg-success p-2">{{ tr('Active') }}</span>
                                    @else
                                    <span class="badge bg-danger p-2">{{ tr('Inactive') }}</span>
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <td>{{ tr('Creator') }}</td>
                                <th scope="row">{{ Str::ucfirst($menu->user['name']) }}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Modifier') }}</td>
                                <th scope="row">
                                    @if ($menu->modifier_id)
                                    {{ Str::ucfirst($menu->modifier['name']) }}
                                    @else
                                    <span class="text-danger">{{ tr('Not set') }}</span>
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <td>{{ tr('Created At') }}</td>
                                <th scope="row">{{ $menu->created_at->format('d.m.20y') }}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Updated At') }}</td>
                                <th scope="row">{{ $menu->updated_at->format('d.m.20y') }}</th>
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
