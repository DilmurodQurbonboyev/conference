@extends('frontend.layouts.app')
@section('title')
    {{ tr('News') }}
@endsection
@section('layout')
    <x-layout/>
@endsection
@section('content')
    <section class="page">
        <div class="container">
            <div class="head">
                <div class="head-title">
                    <span>{{ tr('News') }}</span>
                </div>
                <nav class="breadcrumb-nav" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">{{ tr('Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ tr('News') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container">
            <div class="page-body">
                <div class="row">
                    @foreach($lists as $list)
                        {{--                        @if ($list->translate($app->getLocale())->title !== null)--}}
                        <div class="col-my-3 col-xl-4 col-md-6">
                            <div class="news-out">
                                <div class="news">
                                    <div class="news-img">
                                        <a href="{{ route('news', $list->slug) }}">
                                            <img src="{{ $list->anons_image }}">
                                        </a>
                                    </div>
                                    <div class="news-title">
                                        <a href="{{ route('news', $list->slug) }}">{{$list->title ?? ''}}</a>
                                    </div>
                                    <div class="news-date">
                                        <img src="{{ asset('img/time.png') }}">
                                        <span>{{ $list->created_at->format('d.m.20y') }}</span>
                                        <span> | </span>
                                        <span>{{ $list->created_at->format('H:i') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--                        @endif--}}
                    @endforeach
                </div>
                <div class="my-pagination">
                    {{ $lists->links('frontend.layouts.pagination') }}
                </div>
            </div>
        </div>
    </section>

    <x-useful/>
@endsection
