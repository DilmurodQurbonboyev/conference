@extends('admin.layouts.app')
@section('title')
{{ tr('About Page') }}
@endsection
@section('header')
<div class="col-sm-6">
    <h1 class="">{{ $pages->title ?? '' }}</h1>
</div>
<div class="col-sm-6">
    <div class="breadcrumb float-sm-right">
        {{ Breadcrumbs::render('pages/show', $pages->id) }}
    </div>
</div>
@endsection
@section('content')
<div class="p-3 d-flex justify-content-end" style="grid-gap: 2px">
    @can('pages.create')
    <a class="btn btn-success" href="{{ route('pages.create') }}">
        <i class="fa fa-plus"></i>
    </a>
    @endcan
    @can('pages.index')
    <a class="btn btn-info text-white" href="{{ route('pages.index') }}">
        <i class="fa fa-list"></i>
    </a>
    @endcan
    @can('pages.edit')
    <a class="btn btn-primary" href="{{ route('pages.edit', $pages->id) }}">
        <i class="fa fa-edit"></i>
    </a>
    @endcan
    @can('pages.destroy')
    <form method="POST" action="{{ route('pages.destroy', $pages->id) }}">
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
                                <th scope="row">{{ $pages->id }}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Category') }}</td>
                                <th scope="row">
                                    @if ($pages->category != null)
                                    {{ $pages->category->title }}
                                    @else
                                    {{ tr('Main Category') }}
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <td>{{ tr('Title') }}</td>
                                <th scope="row">{{ $pages->translate($lang)->title ?? '---' }}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Slug') }}</td>
                                <th scope="row">{{ $pages->slug }}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Description') }}</td>
                                <th scope="row">{!! $pages->translate($lang)->description ?? '---' !!}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Content') }}</td>
                                <th scope="row">{!! $pages->translate($lang)->content ?? '---' !!}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Anons Image') }}</td>
                                <th>
                                    @if ($pages->anons_image == null)
                                    <span class="text-danger">{{ tr('No Image') }}</span>
                                    @else
                                    <img width="20%" src="{!! $pages->anons_image !!}" alt="">
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <td>{{ tr('Body Image') }}</td>
                                <th>
                                    <?php
                                            $res = explode(',', $pages->body_image);
                                            ?>
                                    @foreach ($res as $i)
                                    <img width="20%" src="{{ $i }}" alt="">
                                    @endforeach
                                </th>
                            </tr>
                            <tr>
                                <td>{{ tr('Pdf Title') }}</td>
                                <th>{{ $pages->translate($lang)->pdf_title ?? '' }}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Pdf') }}</td>
                                <th scope="row">
                                    <i class="far fa-file-pdf"></i>
                                    <a href="{{ $pages->pdf }}" target="__blank" style="color: #000;">{{
                                        $pages->translate($lang)->pdf ?? '' }}</a>
                                </th>
                            </tr>
                            <tr>
                                <td>{{ tr('Date') }}</td>
                                <th>{{ $pages->date }}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Order') }}</td>
                                <th>{{ $pages->order }}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Status') }}</td>
                                <th scope="row">
                                    @if ($pages->status == 2)
                                    <span class="badge bg-success p-2">{{ tr('Active') }}</span>
                                    @else
                                    <span class="badge bg-danger p-2">{{ tr('Inactive') }}</span>
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <td>{{ tr('Creator') }}</td>
                                <th scope="row">{{ Str::ucfirst($pages->user['name']) }}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Modifier') }}</td>
                                <th scope="row">
                                    @if ($pages->modifier_id)
                                    {{ Str::ucfirst($pages->modifier['name']) }}
                                    @else
                                    <span class="text-danger">{{ tr('Not set') }}</span>
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <td>{{ tr('Created At') }}</td>
                                <th scope="row">{{ $pages->created_at->format('d.m.20y') }}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Updated At') }}</td>
                                <th scope="row">{{ $pages->updated_at->format('d.m.20y') }}</th>
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
