@extends('admin.layouts.app')
@section('title')
    {{ tr('Menus') }}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1>{{ tr('Menus') }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('menus') }}
        </ol>
    </div>
@endsection
@section('content')
    <livewire:menu/>
@endsection
