@extends('admin.layouts.app')
@section('title')
    {{ tr('Messages') }}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1>{{ tr('Messages') }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('messages') }}
        </ol>
    </div>
@endsection
@section('content')
    <livewire:message/>
@endsection
