@extends('frontend.layouts.app')
@section('title')
    {{ $post->category->title }}
@endsection
@section('content')
    <section class="page">
        <div class="container">
            <div class="head">
                <div class="head-title">
                    <span>{{ $post->category->title }}</span>
                </div>
                <nav class="breadcrumb-nav" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">{{ tr('Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $post->category->title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container detail-container">
            <div class="detail">
                <div class="detail-title">
                    <span>{{ $post->title ?? '' }}</span>
                </div>
                <div class="owl-detail">
                    <div class="owl-carousel owl-theme">
                        @php
                            $res = explode(',', $post->body_image);
                        @endphp
                        @foreach ($res as $i)
                            @if ($i)
                                <div class="item">
                                    <div class="detail-img">
                                        <img
                                            src="{{ $i }}">
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="detail-content">
                    {!! $post->content !!}
                </div>
            </div>
        </div>
    </section>
@endsection
