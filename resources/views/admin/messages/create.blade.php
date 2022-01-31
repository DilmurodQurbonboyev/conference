@extends('admin.layouts.app')
@section('title')
    {{ tr('Create Message') }}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1>{{ tr('Create Message') }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        </ol>
    </div>
@endsection
@section('content')
    <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
        </div>
        <div class="card-body">
            <form action="{{ route('messages.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="key">Message</label>
                    <textarea id="key" name="key" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="title_oz">O‘zb</label>
                    <textarea name="title_oz" id="" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="title_uz">Ўзб</label>
                    <textarea name="title_uz" id="" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="title_ru">Рус</label>
                    <textarea name="title_ru" id="" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="title_en">Eng</label>
                    <textarea name="title_en" id="" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">{{ tr('Add') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
