@extends('frontend.layouts.app')
@section('title')
    {{ tr('Photos') }}
@endsection
@section('layout')
    <x-layout/>
@endsection
@section('content')
    <section class="page">
        <div class="container">
            <div class="head">
                <div class="head-title">
                    <span>{{ tr('Photos') }}</span>
                </div>
                <nav class="breadcrumb-nav" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">{{ tr('Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ tr('Photos') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container detail-container">
            <div class="row">
                @foreach($lists as $list)
                    @if ($list->translate($app->getLocale())->title !== null)
                        <div class="col-xl-3 col-md-6">
                            <div class="f-in">
                                <div class="foto-main">
                                    <a href="{{ $list->anons_image }}"
                                       data-fancybox="images-{{ $list->id }}"
                                       data-caption="{{ $list->title ?? '' }}">
                                        <div class="foto-in">
                                            <img src="{{ $list->anons_image }}"
                                                 alt="{{ $list->title ?? '' }}">
                                        </div>
                                    </a>
                                </div>
                                <div class="foto-title">
                                    <span>{{ $list->title ?? "" }}</span>
                                </div>
                                <div class="f-time">
                                    <span>{{ $list->created_at->format('d.m.20y') }}</span>
                                </div>
                                <div class="foto-list">
                                    <?php
                                    if (!empty($list->body_image) && is_array(explode(',', $list->body_image))) {
                                    $res = explode(',', $list->body_image);
                                    ?>
                                    @foreach ($res as $i)
                                        @if ($i)
                                            <div class="foto" style="display: none">
                                                <a href="{{ $i }}"
                                                   data-fancybox="images-{{ $list->id }}"
                                                   data-caption="{{ $list->title ?? '' }}">
                                                    <div class="foto-in">
                                                        <img src="{{ $i }}"
                                                             alt="{{ $list->title ?? '' }}">
                                                    </div>
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endsection
