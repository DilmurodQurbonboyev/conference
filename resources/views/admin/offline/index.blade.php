@extends('admin.layouts.app')
@section('title')
{{ tr('Offline') }}
@endsection
@section('header')
<div class="col-sm-6">
    <h1>{{ tr('Offline') }}</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        {{ Breadcrumbs::render('offline') }}
    </ol>
</div>
@endsection
@section('content')
<livewire:offline>
    @endsection
