@extends('admin.layouts.app')
@section('title')
    {{tr('Update Permissions')}}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1>{{tr('Update Permissions')}}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('permissions/edit', $permissions->id) }}
        </ol>
    </div>
@endsection
@section('content')
    <div class="card card-primary card-outline">
        <div class="card-body">
            <form action="{{ route('permissions.update', $permissions->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <input type="text" name="name" @class('form-control') value="{{ $permissions->name ?? '' }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        {{tr('Update')}}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
