@extends('admin.layouts.app')
@section('title')
{{tr('About News Category')}}
@endsection

<?php $langs = ['oz', 'uz', 'ru', 'en'] ?>

@section('header')
<div class="col-sm-6">
    <h1>{{ Str::ucfirst($users->name) ?? '' }}</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        {{ Breadcrumbs::render('users/show', $users->id) }}
    </ol>
</div>
@endsection
@section('content')
<div class="p-3 d-flex justify-content-end" style="grid-gap: 2px">
    @can('users.index')
    <a class="btn btn-info text-white" href="{{ route('users.index') }}">
        <i class="fa fa-list"></i>
    </a>
    @endcan
    @can('users.edit')
    <a class="btn btn-primary" href="{{ route('users.edit', $users->id) }}">
        <i class="fa fa-edit"></i>
    </a>
    @endcan
    @can('users.destroy')
    <form method="POST" action="{{ route('users.destroy', $users->id) }}">
        @csrf
        @method('DELETE')
        <input name="_method" type="hidden" value="DELETE">
        <button type="submit" class="btn btn-danger">
            <i class="fa fa-trash"></i></button>
    </form>
    @endcan
</div>
<div class="card card-primary card-outline card-outline-tabs">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <tbody>
                    <tr>
                        <td>{{ tr('Id') }}</td>
                        <th scope="row">{{ $users->id }}</th>
                    </tr>
                    <tr>
                        <td>{{ tr('Name') }}</td>
                        <th scope="row">{{ Str::ucfirst($users->name) ?? '' }}</th>
                    </tr>
                    <tr>
                        <td>{{ tr('Email') }}</td>
                        <th scope="row">{{ $users->email ?? '---' }}</th>
                    </tr>
                    <tr>
                        <td>{{ tr('Roles') }}</td>
                        <th scope="row">
                            @if(!empty($users->getRoleNames()))
                            @foreach($users->getRoleNames() as $i)
                            <label class="badge badge-info p-1">{{ $i }}</label>
                            @endforeach
                            @endif
                        </th>
                    </tr>
                    <tr>
                        <td>{{ tr('Created At') }}</td>
                        <th scope="row">{{ $users->created_at->format('d.m.20y') }}</th>
                    </tr>
                    <tr>
                        <td>{{ tr('Updated At') }}</td>
                        <th scope="row">{{ $users->updated_at->format('d.m.20y') }}</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
