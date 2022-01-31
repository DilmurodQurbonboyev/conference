@extends('admin.layouts.app')
@section('title')
{{{ tr('About Log') }}
@endsection


@section('header')
<div class="col-sm-6">
    <h1 class="">{{ $logs->title ?? '' }}</h1>
</div>
<div class="col-sm-6">
    <div class="breadcrumb float-sm-right">
        {{ Breadcrumbs::render('logs/show', $logs->id) }}
    </div>
</div>
@endsection

@section('content')

<div class="card card-primary card-outline card-outline-tabs">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <tbody>
                    <tr>
                        <td>{{ tr('Id') }}</td>
                        <th scope="row">{{ $logs->id }}</th>
                    </tr>
                    <tr>
                        <td>{{ tr('Changed') }}</td>
                        <th scope="row">{{ $logs->row_id }}</th>
                    </tr>
                    <tr>
                        <td>{{ tr('Users') }}</td>
                        <th scope="row">{{ Str::ucfirst($logs->user['name']) }}</th>
                    </tr>
                    <tr>
                        <td>{{ tr('Ip') }}</td>
                        <th scope="row">{{ $logs->user_ip }}</th>
                    </tr>
                    <tr>
                        <td>{{ tr('Id') }}</td>
                        <th scope="row">{{ $logs->list_type_id }}</th>
                    </tr>
                    <tr>
                        <td>{{ tr('Action') }}</td>
                        <th scope="row">{{ $logs->action }}</th>
                    </tr>
                    <tr>
                        <td>{{ tr('Created At') }}</td>
                        <th scope="row">{{ $logs->created_at->format('d.m.20y') }}</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
