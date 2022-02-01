@extends('admin.layouts.app')
@section('title')
{{ tr('Users') }}
@endsection
@section('header')
<div class="col-sm-6">
    <h1>{{ tr('Users') }}</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        {{ Breadcrumbs::render('users') }}
    </ol>
</div>
@endsection
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ tr('Users') }}</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-wrap">
                <thead>
                    <tr class="text-primary">
                        <th></th>
                        <th>{{ tr('Id') }}</th>
                        <th>{{ tr('Name') }}</th>
                        <th>{{ tr('Email') }}</th>
                        <th>{{ tr('Roles') }}</th>
                        <th style="width: 100px"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $user)
                    <tr>
                        <th>{{ ++$key }}</th>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name ?? '' }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if (!empty($user->getRoleNames()))
                            @foreach ($user->getRoleNames() as $i)
                            <label class="badge badge-info p-1">{{ $i }}</label>
                            @endforeach
                            @endif
                        </td>
                        <td class="d-flex">
                            @can('users.show')
                            <a class="btn btn-primary m-1" href="{{ route('users.show', $user->id) }}" title="View"
                                aria-label="View"><span class="fas fa-eye"></span>
                            </a>
                            @endcan
                            @can('users.edit')
                            <a class="btn btn-primary m-1" href="{{ route('users.edit', $user->id) }}" title="Янгилаш"
                                aria-label="Янгилаш"><span class="fas fa-pencil-alt"></span>
                            </a>
                            @endcan
                            @can('users.destroy')
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" wire:click="deleteId({{ $user->id }})" class="btn btn-primary m-1"
                                    data-toggle="modal" data-target="#deleteModal">
                                    <span class="fas fa-trash-alt"></span>
                                </button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
