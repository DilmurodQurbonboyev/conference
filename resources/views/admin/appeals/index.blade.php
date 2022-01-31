@extends('admin.layouts.app')
@section('title')
    {{ tr('Appeals') }}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1>{{ tr('Appeals') }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('appeals') }}
        </ol>
    </div>
@endsection
@section('content')
    <livewire:appeals>
    @endsection
