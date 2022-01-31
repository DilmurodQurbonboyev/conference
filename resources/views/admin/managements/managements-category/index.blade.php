@extends('admin.layouts.app')
@section('title')
{{ tr('Management Categories') }}
@endsection
@section('header')
<div class="col-sm-6">
    <h1>{{ tr('Management Categories') }}</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        {{ Breadcrumbs::render('managements-category') }}
    </ol>
</div>
@endsection
@section('content')
<livewire:management-category />
@endsection