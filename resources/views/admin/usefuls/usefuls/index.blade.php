@extends('admin.layouts.app')
@section('title')
    {{tr('Useful')}}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1 class="m-0">{{tr('Useful')}}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('useful') }}
        </ol>
    </div>
@endsection
@section('content')
    <livewire:useful/>
@endsection
