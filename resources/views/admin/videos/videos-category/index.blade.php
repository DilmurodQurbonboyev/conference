@extends('admin.layouts.app')
@section('title')
    {{ tr('Videos Categories') }}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1>{{ tr('Videos Categories') }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('videos-category') }}
        </ol>
    </div>
@endsection
@section('content')
    <livewire:videos-category/>
@endsection
