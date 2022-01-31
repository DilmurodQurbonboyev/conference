@extends('admin.layouts.app')
@section('title')
    {{tr('About Message')}}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1>{!! $messages->title ?? '' !!}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        </ol>
    </div>
@endsection
@section('content')
    <div class="p-3 d-flex justify-content-end">
        @can('messages.create')
            <a class="btn btn-success" href="{{ route('messages.create') }}">
                <i class="fa fa-plus"></i>
            </a>
        @endcan
        @can('messages.index')
            <a class="btn btn-info text-white" href="{{ route('messages.index') }}">
                <i class="fa fa-list"></i>
            </a>
        @endcan
        @can('messages.edit')
            <a class="btn btn-primary" href="{{ route('messages.edit', $messages->id) }}">
                <i class="fa fa-edit"></i>
            </a>
        @endcan
        @can('messages.destroy')
            <form method="POST" action="{{ route('messages.destroy', $messages->id) }}">
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
            <x-language-tab/>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <tbody>
                    <tr>
                        <td>{{ tr('Id') }}</td>
                        <th scope="row">{{ $messages->id }}</th>
                    </tr>
                    <tr>
                        <td>O‘zb</td>
                        <th scope="row">{!! $messages->translate('oz')->title ?? '---' !!}</th>
                    </tr>
                    <tr>
                        <td>Ўзб</td>
                        <th scope="row">{!! $messages->translate('uz')->title ?? '---' !!}</th>
                    </tr>
                    <tr>
                        <td>Рус</td>
                        <th scope="row">{!! $messages->translate('ru')->title ?? '---' !!}</th>
                    </tr>
                    <tr>
                        <td>Eng</td>
                        <th scope="row">{!! $messages->translate('en')->title ?? '---' !!}</th>
                    </tr>
                    <tr>
                        <td>{{tr('Created At')}}</td>
                        <th scope="row">{{ $messages->created_at->format('d.m.20y') }}</th>
                    </tr>
                    <tr>
                        <td>{{tr('Updated At')}}</td>
                        <th scope="row">{{ $messages->updated_at->format('d.m.20y') }}</th>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
