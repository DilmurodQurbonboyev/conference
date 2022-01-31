@extends('admin.layouts.app')
@section('title')
{{ tr('Managements') }}
@endsection
@section('header')
<div class="col-sm-6">
    <h1>{{ tr('Managements') }}</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        {{ Breadcrumbs::render('managements') }}
    </ol>
</div>
@endsection
@section('content')
<livewire:management />
@endsection
