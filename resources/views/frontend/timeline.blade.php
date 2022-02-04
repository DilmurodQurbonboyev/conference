@extends('frontend.layouts.app')

@section('title')
    {{ $post->category->title }}
@endsection

@section('layout')
    <x-layout/>
@endsection

@section('content')
    <section class="page">
        <div class="container">
            <div class="head">
                <div class="head-title">
                    <span>{{ $post->category->title ?? '' }}</span>
                </div>
                <nav class="breadcrumb-nav" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">{{ tr('Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $post->category->title ?? "" }}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container">
            <!-- The time line -->
            <div class="timeline">
                <div class="time-label">
                    <span class="bg-red">{{ $category1[0]->category->title ?? '' }}</span>
                </div>
                @foreach($category1 as $item)
                    <div>
                        <i class="fas fa-circle"></i>
                        <div class="timeline-item">
                            <span class="time"><i class="fas fa-clock"></i>{{ $item->created_at->format('H:i') }}</span>
                            <h3 class="timeline-header">
                                <span>{{ $item->title ?? '' }}</span>
                            </h3>
                            <div class="timeline-body">
                                <span>{!! $item->description ?? '' !!}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="time-label">
                    <span class="bg-red">{{ $category2[0]->category->title ?? '' }}</span>
                </div>
                @foreach($category2 as $item)
                    <div>
                        <i class="fas fa-circle"></i>
                        <div class="timeline-item">
                            <span class="time"><i class="fas fa-clock"></i>{{ $item->created_at->format('H:i') }}</span>
                            <h3 class="timeline-header">
                                <span>{{ $item->title ?? '' }}</span>
                            </h3>
                            <div class="timeline-body">
                                <span>{!! $item->description ?? '' !!}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    </section>
@endsection
