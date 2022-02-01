@extends('frontend.layouts.app')
@section('title')
    {{ tr('Photos') }}
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
            @foreach($lists as $list)
                @if ($list->translate($app->getLocale())->title !== null)
                    <div class="foto-title">
                        <span>{{ $list->title ?? "" }}</span>
                    </div>
                    <div class="foto-list">
                        <div class="row">
                            <?php
                            if (!empty($list->body_image) && is_array(explode(',', $list->body_image))) {
                            $res = explode(',', $list->body_image);
                            ?>
                            @foreach ($res as $i)
                                @if ($i)
                                    <div class="col-my-3 col-xl-4 col-md-6">
                                        <div class="foto">
                                            <a href="{{ $i }}"
                                               data-fancybox="images"
                                               data-caption="{{ $list->title ?? '' }}">
                                                <div class="foto-in">
                                                    <img src="{{ $i }}"
                                                         alt="{{ $list->title ?? '' }}">
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            <?php }?>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
@endsection
