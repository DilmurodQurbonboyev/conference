@extends('admin.layouts.app')
@section('title')
{{ tr('Menus Categories') }}
@endsection
@section('header')
<div class="col-sm-6">
    <h1>{{ tr('Menu Categories') }}</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        {{ Breadcrumbs::render('menus-category') }}
    </ol>
</div>
@endsection
@section('content')
<livewire:menus-category />
@endsection
