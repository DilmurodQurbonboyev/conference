@extends('admin.layouts.app')
@section('title')
    {{tr('Pages')}}
@endsection

@section('header')
    <div class="col-sm-6">
        <h1 class="m-0">{{tr('Pages')}}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('pages') }}
        </ol>
    </div>
@endsection
@section('content')
    <livewire:pages/>
@endsection
