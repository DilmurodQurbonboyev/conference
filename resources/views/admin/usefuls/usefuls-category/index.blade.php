@extends('admin.layouts.app')
@section('title')
    {{ tr('Useful Categories') }}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1>{{ tr('Useful Categories') }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('useful-category') }}
        </ol>
    </div>
@endsection
@section('content')
    <livewire:useful-category/>
@endsection
