@extends('frontend.layouts.app')

@section('title')
    {{ $leaders[0]->category->title }}
@endsection

@section('layout')
    <x-layout/>
@endsection

@section('content')
    <section class="page">
        <div class="container">
            <div class="head">
                <div class="head-title">
                    <span>{{ $leaders[0]->category->title }}</span>
                </div>
                <nav class="breadcrumb-nav" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">{{ tr('Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $leaders[0]->category->title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach($leaders as $leader)
                    @if ($leader->translate($app->getLocale())->title !== null)
                        <div class="col-my-3 col-xl-4 col-md-6">
                            <div class="leader">
                                <div class="leader-img">
                                    <img src="{{ $leader->anons_image }}">
                                </div>
                                <div class="leader-name">
                                    <span>{{ $leader->leader ?? '' }}</span>
                                </div>
                                <div class="leader-position">
                                    <span>{{ $leader->title ?? '' }}</span>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endsection
