<?php
/* @var $post */

?>

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
                    @if($post->id == 14)
                        <span class="d-none">{{ $post->title ?? '' }}</span>
                    @else
                        <span>{{ $post->title ?? '' }}</span>
                    @endif
                </div>
                <?php
                if(!empty($post->body_image) && is_array(explode(',', $post->body_image))) {
                $res = explode(',', $post->body_image);
                ?>
                <div class="owl-detail">
                    <div class="owl-carousel owl-theme">
                        @foreach ($res as $i)
                            @if ($i)
                                <div class="item">
                                    <div class="detail-img">
                                        <img src="{{ $i }}">
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <?php }?>
                <div class="detail-content">
                    {!! $post->content !!}
                </div>
                @if ($post->pdf)
                    @if ($post->pdf_type == 2)
                        <div class="pdf">
                            <div class="pdf-in">
                                <div class="pdf-icon">
                                    <a href="{{ $post->pdf ?? '' }}" download="true">
                                        <img src="{{ asset('img/pdf.png') }}" alt="pdf">
                                    </a>
                                </div>
                                <div class="pdf-text">
                                    <div class="pdf-title">
                                        <span>{{ $post->pdf_title ?? '' }}</span>
                                    </div>
                                    <div class="pdf-download">
                                        <a href="{{ $post->pdf }}" download="true">{{ tr('Download') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($post->pdf_type == 1)
                        <div>
                            <embed src="{{ $post->pdf }}" width="100%" type="application/pdf"
                                   style="min-height: 1000px;">
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </section>


@endsection
