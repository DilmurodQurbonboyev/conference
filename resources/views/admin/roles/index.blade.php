@extends('admin.layouts.app')
@section('title')
    {{ tr('Roles') }}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1>{{ tr('Roles') }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('roles') }}
        </ol>
    </div>
@endsection
@section('content')
    <div class="card card-primary card-outline card-tabs">
        <div class="card-header">
            <a class="btn btn-primary" href="{{ route('roles.create') }}">{{ tr('Create Roles') }}</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>{{ tr('Id') }}</th>
                        <th>{{ tr('Name') }}</th>
                        <th>{{ tr('Action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <th scope="row">{{ $role->id }}</th>
                            <td>
                                <span class="badge bg-info">{{ $role->name ?? ''}}</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a class="btn btn-primary m-1" href="{{ route('roles.show', $role->id) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a class="btn btn-primary m-1" href="{{ route('roles.edit', $role->id) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form method="POST" action="{{ route('roles.destroy', $role->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-primary m-1 show_confirm"
                                                data-toggle="tooltip"
                                                title='DELETE'><i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection
