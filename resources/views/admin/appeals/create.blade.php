@extends('admin.layouts.app')
@section('title')
    {{tr('Send Zoom Link')}}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1>{{ tr('About Online') }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('registers/create') }}
        </ol>
    </div>
@endsection

@section('content')
    <div class="card card-primary card-outline card-tabs">

        <div class="card-body">
            <form action="{{ route('appeals.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="link">{{ tr('Link') }}</label>
                    <input type="text" name="link" value="<?php if (isset($link->link)) {
                        echo $link->link;
                    } ?>" class="form-control">
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr class="text-primary">
                                <th><input type="checkbox" id="checkAll"></th>
                                <th>{{ tr('Id') }}</th>
                                <th>{{ tr('Image') }}</th>
                                <th>{{ tr('Full Name') }}</th>
                                <th>{{ tr('Organization') }}</th>
                                <th>{{ tr('Position') }}</th>
                                <th>{{ tr('Email') }}</th>
                                <th>{{ tr('Count') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($onlineUsers as $onlineUser)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="users[]" class="checkItem" value="{{$onlineUser->id}}">
                                    </td>
                                    <td>{{ $onlineUser->id }}</td>
                                    <td>
                                        @if($onlineUser->photo)
                                            <img width="50px" src="{{ asset($onlineUser->photo) }}" alt="">
                                        @else
                                            <img width="50px" src="{{ asset('img/noImage.jpg') }}" alt="">
                                        @endif
                                    </td>
                                    <td>
                                        {{ $onlineUser->first_name }} <br/>
                                        {{ $onlineUser->last_name }} <br/>
                                        {{ $onlineUser->middle_name }} <br/>
                                    </td>
                                    <td>{{$onlineUser->organization}}</td>
                                    <td>{{$onlineUser->position}}</td>
                                    <td>{{$onlineUser->email}}</td>
                                    <td style="font-weight: 700">
                                        @if($onlineUser->sendEmail->count() == 0)
                                            <span class="badge bg-danger p-2">{{$onlineUser->sendEmail->count()}}</span>
                                        @else
                                            <span
                                                class="badge bg-success p-2">{{$onlineUser->sendEmail->count()}}</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <span class="d-flex pt-2 justify-content-end"> {{ $onlineUsers->links() }}</span>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary saveBtn">{{ tr('Send') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $("#checkAll").change(function () {
            $(".checkItem").prop("checked", $(this).prop("checked"));
        })
        $(".checkItem").change(function () {
            if ($(this).prop("checked") == false) {
                $("#checkAll").prop("checked", false)
            }
            if ($(".checkItem:checked").length == $(".checkItem").length) {
                $("#checkAll").prop("checked", true)
            }
        })
    </script>
@endpush


{{--                <div class="form-group">--}}
{{--                    <label for="users[]" class="p-1">{{ tr('Users') }}</label>--}}
{{--                    <select name="users[]" class="select2 form-control" id="users[]" multiple="multiple"--}}
{{--                            data-placeholder="">--}}
{{--                        @foreach ($onlineUsers as $register)--}}
{{--                            <option value="{{ $register->id }}">--}}
{{--                                Organization: {{ $register->organization }}--}}
{{--                                FIO: {{ $register->fullName }}--}}
{{--                                Email: {{ $register->email }}--}}
{{--                            </option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </div>--}}
