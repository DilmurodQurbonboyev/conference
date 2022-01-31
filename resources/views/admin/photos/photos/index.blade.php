@extends('admin.layouts.app')
@section('title')
    {{tr('Photos')}}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1 class="m-0">{{tr('Photos')}}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('photos') }}
        </ol>
    </div>
@endsection
@section('content')
    <livewire:photos/>
@endsection
