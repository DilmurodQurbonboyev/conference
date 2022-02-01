@extends('admin.layouts.app')
@section('title')
    {{ tr('Registers') }}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1>{{ tr('Registers') }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('registers') }}
        </ol>
    </div>
@endsection
@section('content')
    <livewire:appeals>
    @endsection
