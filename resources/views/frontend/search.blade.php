@extends('frontend.layouts.app')
@section('title')
    {{ tr('Search') }}
@endsection
@section('layout')
    <x-layout/>
@endsection
@section('content')
    <section class="page">
        <div class="container">
            <div class="head">
                <div class="head-title">
                    <span>НОВОСТИ</span>
                </div>
                <nav class="breadcrumb-nav" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">{{ tr('Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Library</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                @if($lists->isNotEmpty())
                    @foreach($lists as $list)
                        <div class="col-xl-6">
                            <div class="card mt-3">
                                <div class="card-body">
                                    <h5 class="card-title">{{$list->title ?? ''}}</h5>
                                    {{--                                    <p class="card-text">With supporting text below as a natural lead-in to additional--}}
                                    {{--                                        content.</p>--}}
                                    <a href="{{ route('news', $list->slug) }}"
                                       class="btn btn-primary">{{ tr('More') }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div>
                        <h2>{{ tr('Not Found') }} ...</h2>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
