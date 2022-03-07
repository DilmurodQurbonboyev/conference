@extends('frontend.layouts.app')
@section('title')
    {{ tr('Videos') }}
@endsection
@section('layout')
    <x-layout/>
@endsection
@section('content')
    <section class="page">
        <div class="container">
            <div class="head">
                <div class="head-title">
                    <span>{{ tr('Videos') }}</span>
                </div>
                <nav class="breadcrumb-nav" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">{{ tr('Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ tr('Videos') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container detail-container">
            <div class="foto-list">
                <div class="row">
                    @foreach($lists as $list)
                            @if ($list->media_type == 5)
                                <div class="col-my-4 col-xl-4 col-md-6">
                                    <div class="foto">
                                        <a data-fancybox data-type="iframe"
                                           data-src="https://www.youtube.com/embed/{{ $list->video_code }}"
                                           href="javascript:;">
                                            <div class="video-in">
                                                <img
                                                    src="{{ $list->image }}"
                                                    alt="{{ $list->title ?? '' }}">
                                            </div>
                                            <div class="video-title">
                                                <span>{{ $list->title ?? '' }}</span>
                                            </div>
                                            <div class="video-date">
                                                <span>{{ $list->created_at->format('d.m.20y') }}</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endif
                            @if ($list->media_type == 3)
                                <div class="col-my-4 col-xl-4 col-md-6">
                                    <div class="foto">
                                        <a data-fancybox data-type="iframe"
                                           data-src="{{ $list->video }}"
                                           href="javascript:;">
                                            <div class="video-in">
                                                <img src="{{ $list->image }}"
                                                     alt="{{ $list->title ?? '' }}">
                                            </div>
                                            <div class="video-title">
                                                <span>{{ $list->title ?? '' }}</span>
                                            </div>
                                            <div class="video-date">
                                                <span>{{  $list->created_at->format('d.m.20y') }}</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endif
                            @if($list->media_type == 4)
                                <div class="col-my-4 col-xl-4 col-md-6">
                                    <div class="foto">
                                        <a data-fancybox data-type="iframe"
                                           data-src="https://utube.uz/embed/{{ $list->video_code }}"
                                           data-caption="2">
                                            <div class="video-in">
                                                <img src="{{ $list->image }}"
                                                     alt="{{ $list->title ?? '' }}">
                                            </div>
                                            <div class="video-title">
                                                <span>{{ $list->title ?? '' }}</span>
                                            </div>
                                            <div class="video-date">
                                                <span>{{ $list->created_at->format('d.m.20y') }}</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endif
                    @endforeach

                    {{--                    <div class="col-my-4 col-xl-4 col-md-6">--}}
                    {{--                        <div class="foto">--}}
                    {{--                            <a data-fancybox data-type="iframe" data-src="https://www.youtube.com/embed/kyY3UhV7YD8"--}}
                    {{--                               href="javascript:;">--}}
                    {{--                                <div class="video-in">--}}
                    {{--                                    <img src="http://ombudsman.uz/uploads/2022/01/photo2022-01-2223-58-13.jpg"--}}
                    {{--                                         alt="Омбудсманнинг 2021 йилги фаолияти таҳлил қилиниб, 2022 йилги режалар белгилаб олинди">--}}
                    {{--                                </div>--}}
                    {{--                                <div class="video-title">--}}
                    {{--                                    <span>Муҳокамалар марказида Инсон ҳуқуқлари бўйича Омбудсман фаолиятининг ҳуқуқий асосларини такомиллаштириш бўйича миллий ва халқаро тажриба</span>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="video-date">--}}
                    {{--                                    <span>20.01.2022</span>--}}
                    {{--                                </div>--}}
                    {{--                            </a>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>
            </div>
        </div>
    </section>
@endsection
