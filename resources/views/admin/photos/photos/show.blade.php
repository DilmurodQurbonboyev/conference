@extends('admin.layouts.app')
@section('title')
{{ tr('About Photo') }}
@endsection
@section('header')
<div class="col-sm-6">
    <h1 class="">{{ $photos->title ?? '' }}</h1>
</div>
<div class="col-sm-6">
    <div class="breadcrumb float-sm-right">
        {{ Breadcrumbs::render('photos/show', $photos->id) }}
    </div>
</div>
@endsection
@section('content')
<div class="p-3 d-flex justify-content-end" style="grid-gap: 2px">
    @can('photos.create')
    <a class="btn btn-success" href="{{ route('photos.create') }}">
        <i class="fa fa-plus"></i>
    </a>
    @endcan
    @can('photos.index')
    <a class="btn btn-info text-white" href="{{ route('photos.index') }}">
        <i class="fa fa-list"></i>
    </a>
    @endcan
    @can('photos.edit')
    <a class="btn btn-primary" href="{{ route('photos.edit', $photos->id) }}">
        <i class="fa fa-edit"></i>
    </a>
    @endcan
    @can('photos.destroy')
    <form method="POST" action="{{ route('photos.destroy', $photos->id) }}">
        @csrf
        @method('DELETE')
        <input name="_method" type="hidden" value="DELETE">
        <button type="submit" class="btn btn-danger">
            <i class="fa fa-trash"></i></button>
    </form>
    @endcan
</div>
<div class="card card-primary card-outline card-outline-tabs">
    <div class="card-header p-0 border-bottom-0">
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
                                <th scope="row">{{ $photos->id }}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Category') }}</td>
                                <th scope="row">
                                    @if ($photos->category != null)
                                    {{ $photos->category->title }}
                                    @else
                                    {{ tr('Main Category') }}
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <td>{{ tr('Title') }}</td>
                                <th scope="row">{{ $photos->translate($lang)->title ?? '---' }}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Anons Image') }}</td>
                                <th>
                                    @if ($photos->anons_image == null)
                                    <span class="text-danger">{{ tr('No Image') }}</span>
                                    @else
                                    <img width="20%" src="{!! $photos->anons_image !!}" alt="">
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <td>{{ tr('Body Image') }}</td>
                                <th>
                                    <?php
                                            $res = explode(',', $photos->body_image);
                                            ?>
                                    @foreach ($res as $i)
                                    <img width="20%" src="{{ $i }}" alt="">
                                    @endforeach
                                </th>
                            </tr>
                            <tr>
                                <td>{{ tr('Date') }}</td>
                                <th>{{ $photos->date }}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Order') }}</td>
                                <th>{{ $photos->order }}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Status') }}</td>
                                <th scope="row">
                                    @if ($photos->status == 2)
                                    <span class="badge bg-success p-2">{{ tr('Active') }}</span>
                                    @else
                                    <span class="badge bg-danger p-2">{{ tr('Inactive') }}</span>
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <td>{{ tr('Creator') }}</td>
                                <th scope="row">{{ Str::ucfirst($photos->user['name']) }}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Modifier') }}</td>
                                <th scope="row">
                                    @if ($photos->modifier_id)
                                    {{ Str::ucfirst($photos->modifier['name']) }}
                                    @else
                                    <span class="text-danger">{{ tr('Not Set') }}</span>
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <td>{{ tr('Created At') }}</td>
                                <th scope="row">{{ $photos->created_at->format('d.m.20y') }}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Updated At') }}</td>
                                <th scope="row">{{ $photos->updated_at->format('d.m.20y') }}</th>
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
