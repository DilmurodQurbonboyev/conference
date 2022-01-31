@extends('admin.layouts.app')
@section('title')
{{ tr('Logs') }}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1>{{ tr('Logs') }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('logs') }}
        </ol>
    </div>
@endsection


@section('content')
<livewire:log>
@endsection
