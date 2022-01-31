@extends('admin.layouts.app')
@section('title')
{{ tr('About Management') }}
@endsection
@section('header')
<div class="col-sm-6">
    <h1 class="">{{ $managements->title ?? '' }}</h1>
</div>
<div class="col-sm-6">
    <div class="breadcrumb float-sm-right">
        {{ Breadcrumbs::render('managements/show', $managements->id) }}
    </div>
</div>
@endsection
@section('content')
<div class="p-3 d-flex justify-content-end" style="grid-gap: 2px">
    @can('managements.create')
    <a class="btn btn-success" href="{{ route('managements.create') }}">
        <i class="fa fa-plus"></i>
    </a>
    @endcan
    @can('managements.index')
    <a class="btn btn-info text-white" href="{{ route('managements.index') }}">
        <i class="fa fa-list"></i>
    </a>
    @endcan
    @can('managements.edit')
    <a class="btn btn-primary" href="{{ route('managements.edit', $managements->id) }}">
        <i class="fa fa-edit"></i>
    </a>
    @endcan
    @can('managements.destroy')
    <form method="POST" action="{{ route('managements.destroy', $managements->id) }}">
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
                                <th scope="row">{{ $managements->id }}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Category') }}</td>
                                <th scope="row">
                                    @if ($managements->category != null)
                                    {{ $managements->category->title }}
                                    @else
                                    {{ tr('Main Category') }}
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <td>{{ tr('Title') }}</td>
                                <th scope="row">{{ $managements->translate($lang)->title ?? '---' }}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Slug') }}</td>
                                <th scope="row">{{ $managements->slug }}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Description') }}</td>
                                <th scope="row">{!! $managements->translate($lang)->description ?? '---' !!}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Contet') }}</td>
                                <th scope="row">{!! $managements->translate($lang)->content ?? '---' !!}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Anons Image') }}</td>
                                <th>
                                    @if ($managements->anons_image == null)
                                    <span class="text-danger">{{ tr('No Image') }}</span>
                                    @else
                                    <img width="20%" src="{!! $managements->anons_image !!}" alt="">
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <td>{{ tr('Body Image') }}</td>
                                <th>
                                    <?php
                                            $res = explode(',', $managements->body_image);
                                            ?>
                                    @foreach ($res as $i)
                                    <img width="20%" src="{{ $i }}" alt="">
                                    @endforeach
                                </th>
                            </tr>
                            <tr>
                                <td>{{ tr('Pdf Title') }}</td>
                                <th>{{ $managements->translate($lang)->pdf_title ?? '' }}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Pdf') }}</td>
                                <th scope="row">
                                    <i class="far fa-file-pdf"></i>
                                    <a href="{{ $managements->pdf }}" target="__blank" style="color: #000;">{{
                                        $managements->translate($lang)->pdf ?? '' }}</a>
                                </th>
                            </tr>
                            <tr>
                                <td>{{ tr('Date') }}</td>
                                <th>{{ $managements->date }}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Order') }}</td>
                                <th>{{ $managements->order }}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Status') }}</td>
                                <th scope="row">
                                    @if ($managements->status == 2)
                                    <span class="badge bg-success p-2">{{ tr('Active') }}</span>
                                    @else
                                    <span class="badge bg-danger p-2">{{ tr('Inactive') }}</span>
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <td>{{ tr('Creator') }}</td>
                                <th scope="row">{{ Str::ucfirst($managements->user['name']) }}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Modifier') }}</td>
                                <th scope="row">
                                    @if ($managements->modifier_id)
                                    {{ Str::ucfirst($managements->modifier['name']) }}
                                    @else
                                    <span class="text-danger">{{ tr('Not Set') }}</span>
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <td>{{ tr('Created At') }}</td>
                                <th scope="row">{{ $managements->created_at->format('d.m.20y') }}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Updated At') }}</td>
                                <th scope="row">{{ $managements->updated_at->format('d.m.20y') }}</th>
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
