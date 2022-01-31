@extends('admin.layouts.app')
@section('title')
    {{tr('Create Roles')}}
@endsection

<?php $langs = ['oz', 'uz', 'ru', 'en'] ?>

@section('header')
                <div class="col-sm-6">
                    <h1>{{tr('Create Roles')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{ Breadcrumbs::render('news-category/create') }}
                    </ol>
                </div>
@endsection


@section('content')
    <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-body">
            <form action="{{ route('roles.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <strong>{{ tr('Name') }}</strong>
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
                <div class="row checkboxes">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-12 mb-2">
                                <label>
                                    <input type="checkbox" id="checkAll"/> {{ tr('Select All') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            @foreach($permissions as $category=>$permission)
                                <div class="col-sm-6 col-md-3 mb-1">
                                    <div class="card categories">
                                        <div class="card-header text-center">
                                            <span
                                                class="btn btn-sm btn-info btn-rule btn-block select-all-category">{{ $category }}</span>
                                        </div>
                                        <div class="card-body p-0 pl-3 pt-2 pb-2">
                                            @foreach($permission as $p)
                                                <div class="form-check">
                                                    <label
                                                        class="form-check-label">{{ Form::checkbox('permission[]', $p->id, false, array('class' => 'checkItem, form-check-input')) }}
                                                        {{ $p->name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i>{{tr('Add')}}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
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
@endsection
