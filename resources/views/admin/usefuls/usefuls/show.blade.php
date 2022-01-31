@extends('admin.layouts.app')
@section('title')
    {{ tr('About Useful') }}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1 class="">{{ $usefuls->title ?? '' }}</h1>
    </div>
    <div class="col-sm-6">
        <div class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('useful/show', $usefuls->id) }}
        </div>
    </div>
@endsection
@section('content')
    <div class="p-3 d-flex justify-content-end" style="grid-gap: 2px">
        @can('useful.create')
            <a class="btn btn-success" href="{{ route('useful.create') }}">
                <i class="fa fa-plus"></i>
            </a>
        @endcan
        @can('useful.index')
            <a class="btn btn-info text-white" href="{{ route('useful.index') }}">
                <i class="fa fa-list"></i>
            </a>
        @endcan
        @can('useful.edit')
            <a class="btn btn-primary" href="{{ route('useful.edit', $usefuls->id) }}">
                <i class="fa fa-edit"></i>
            </a>
        @endcan
        @can('useful.destroy')
            <form method="POST" action="{{ route('useful.destroy', $usefuls->id) }}">
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
                                        <th scope="row">{{ $usefuls->id }}</th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Category') }}</td>
                                        <th scope="row">
                                            @if ($usefuls->category != null)
                                                {{ $usefuls->category->title }}
                                            @else
                                                {{ tr('Main Category') }}
                                            @endif
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Title') }}</td>
                                        <th scope="row">{{ $usefuls->translate($lang)->title ?? '---' }}</th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Description') }}</td>
                                        <th scope="row">{!! $usefuls->translate($lang)->description ?? '---' !!}</th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Link') }}</td>
                                        <th>{{ $usefuls->link }}</th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Date') }}</td>
                                        <th>{{ $usefuls->date }}</th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Order') }}</td>
                                        <th>{{ $usefuls->order }}</th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Status') }}</td>
                                        <th scope="row">
                                            @if ($usefuls->status == 2)
                                                <span class="badge bg-success p-2">{{ tr('Active') }}</span>
                                            @else
                                                <span class="badge bg-danger p-2">{{ tr('Inactive') }}</span>
                                            @endif
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Creator') }}</td>
                                        <th scope="row">{{ Str::ucfirst($usefuls->user['name']) }}</th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Modifier') }}</td>
                                        <th scope="row">
                                            @if ($usefuls->modifier_id)
                                                {{ Str::ucfirst($usefuls->modifier['name']) }}
                                            @else
                                                <span class="text-danger">{{ tr('Not set') }}</span>
                                                <span class="text-danger">{{ tr('Not set') }}</span>
                                            @endif
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Created At') }}</td>
                                        <th scope="row">{{ $usefuls->created_at->format('d.m.20y') }}</th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Updated At') }}</td>
                                        <th scope="row">{{ $usefuls->updated_at->format('d.m.20y') }}</th>
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
