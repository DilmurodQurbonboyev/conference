@extends('admin.layouts.app')

@section('title')
    {{ tr('About Register') }}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1>{{ tr('About Register') }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('registers/edit', $appeal->id) }}
        </ol>
    </div>
@endsection

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-body p-0">
            <div class="mailbox-read-message">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <td>{{ tr('Count') }}</td>
                        <th scope="row">{{ $count }}</th>
                    </tr>
                    <tr>
                        <td>{{ tr('Image') }}</td>
                        <th>
                            <img width="150px" src="{{ asset($appeal->photo) }}" alt="">
                        </th>
                    </tr>
                    <tr>
                        <td>{{ tr('Id') }}</td>
                        <th scope="row">{{ $appeal->id }}</th>
                    </tr>
                    <tr>
                        <td>{{ tr('FIO') }}</td>
                        <th scope="row">{{ $appeal->fullName }}</th>
                    </tr>
                    <tr>
                        <td>{{ tr('Organization') }}</td>
                        <th scope="row">{{ $appeal->organization }}</th>
                    </tr>
                    <tr>
                        <td>{{ tr('Country') }}</td>
                        <th scope="row">{{ $appeal->country }}</th>
                    </tr>
                    <tr>
                        <td>{{ tr('Email') }}</td>
                        <th scope="row">{{ $appeal->email }}</th>
                    </tr>
                    <tr>
                        <td>{{ tr('Created At') }}</td>
                        <th scope="row">{{ $appeal->created_at->format('d.m.20y') }}</th>
                    </tr>
                    <tr>
                        <td>{{ tr('Updated At') }}</td>
                        <th scope="row">{{ $appeal->updated_at->format('d.m.20y') }}</th>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-wrap">
                    <thead>
                    <tr class="text-primary">
                        <th></th>
                        <th>{{ tr('Id') }}</th>
                        <th>{{ tr('FullName') }}</th>
                        <th>{{ tr('Link') }}</th>
                        <th>{{ tr('Email') }}</th>
                        <th>{{tr('Created At')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($sendEmail as $key=>$appeal)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{ $appeal->id }}</td>
                            <td>{{ $appeal->fullName }}</td>
                            <td>{{ $appeal->link }}</td>
                            <td>{{$appeal->email}}</td>
                            <td>{{ $appeal->created_at->format('d.m.20y') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
