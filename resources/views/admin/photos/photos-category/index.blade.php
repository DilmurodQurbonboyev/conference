@extends('admin.layouts.app')
@section('title')
    {{ tr('Photos Categories') }}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1>{{ tr('Photos Categories') }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('photos-category') }}
        </ol>
    </div>
@endsection
@section('content')
    <livewire:photos-category/>
@endsection
