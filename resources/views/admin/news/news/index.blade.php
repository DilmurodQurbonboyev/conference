@extends('admin.layouts.app')
@section('title')
    {{ tr('News') }}
@endsection

@section('header')
    <div class="col-sm-6">
        <h1>{{ tr('News') }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('news-category') }}
        </ol>
    </div>
@endsection
@section('content')
    <livewire:news/>
@endsection
