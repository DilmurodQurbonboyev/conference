@extends('admin.layouts.app')
@section('title')
    {{ tr('Permissions') }}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1>{{ tr('Permissions') }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('permissions') }}
        </ol>
    </div>
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ tr('Roles') }}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 my-2">
                    @can('roles.create')
                        <a class="btn btn-primary" href="#" data-toggle="modal"
                           data-target="#createModal">{{ tr('Create Permissions') }}</a>
                    @endcan
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>{{ tr('Id') }}</th>
                    <th>{{ tr('Name') }}</th>
                    <th>{{ tr('Action') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <th scope="row">{{ $permission->id }}</th>
                        <td>{{ $permission->name ?? ''}}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a class="btn btn-primary m-1"
                                   href="{{ route('permissions.edit', $permission->id) }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" action="{{ route('permissions.destroy', $permission->id) }}">
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
            <span
                class="d-flex pt-2 justify-content-end">{{ $permissions->links('pagination::bootstrap-4') }}</span>
        </div>
    </div>
    @include('admin.permissions.create')
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#addRow').on('click', function () {
                var html = '';
                html += '<tr>';
                html += '<td><input type="text" name="name[]" class="form-control" required /></td>';
                html += '<td><div class="btn btn-danger btn-sm btn-input remove-button-click" id="deleteRow"><i class="fas fa-minus"></i></div></td>';
                html += '</tr>';
                $('#mytable').append(html);
            })
        })

        $(document).on('click', '#deleteRow', function () {
            $(this).closest('tr').remove();
        })
    </script>
@endsection
