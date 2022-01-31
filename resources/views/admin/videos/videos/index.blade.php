@extends('admin.layouts.app')
@section('title')
    {{tr('Videos')}}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1 class="m-0">{{tr('Videos')}}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('videos') }}
        </ol>
    </div>
@endsection
@section('content')
    <livewire:videos/>
@endsection
