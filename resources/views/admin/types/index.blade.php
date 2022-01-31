@extends('admin.layouts.app')
@section('title')
Types
@endsection
@section('header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{tr('Types')}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                </ol>
            </div>
        </div>
    </div>
</section>
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <a class="btn btn-primary" href="{{ route('types.create') }}">{{tr('Create Type')}}</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <form action="{{ route('types.index') }}" method="GET">
                        <tr>
                            <th>{{tr('Id')}}</th>
                            <th>{{tr('Title')}}</th>
                            <th>{{tr('Creator')}}</th>
                            <th>{{tr('Action')}}</th>
                        </tr>
                        <tr>
                            <th>
                                <input class="form-control" type="number" name="filterId" id="filterId">
                            </th>
                            <th>
                                <input class="form-control" type="text" name="filterTitle" id="filterTitle">
                            </th>
                            <th>
                                <select class="form-control select2" name="filterUser" id="filterUser">
                                    <option></option>
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ Str::ucfirst($user->name) }}</option>
                                    @endforeach
                                </select>
                            </th>
                            <th>
                                <button type="submit" class="btn btn-success">Search</button>
                            </th>
                        </tr>
                    </form>
                </thead>
                <tbody>
                    @foreach ($listTypes as $type)
                    <tr>
                        <th scope="row">{{ $type->id }}</th>
                        <td>{{ $type->title ?? ''}}</td>
                        <td>{{ Str::ucfirst($type->user['name']) }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a class="btn btn-primary m-1" href="{{ route('types.show', $type->id) }}">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a class="btn btn-primary m-1" href="{{ route('types.edit', $type->id) }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
