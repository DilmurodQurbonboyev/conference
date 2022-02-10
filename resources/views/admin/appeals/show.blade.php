@extends('admin.layouts.app')

@section('title')
    {{ tr('About Register') }}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1>{{ tr('About Register') }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('registers/edit', $appeal->id) }}
        </ol>
    </div>
@endsection

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-body p-0">
            <div class="mailbox-read-message">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <td>{{ tr('Count') }}</td>
                        <th scope="row">{{ $count }}</th>
                    </tr>
                    <tr>
                        <td>{{ tr('Image') }}</td>
                        <th>
                            @if ($appeal->photo)
                                <img width="150px" src="{{ asset($appeal->photo) }}" alt="">
                            @else
                                <img width="150px" src="{{ asset('img/noImage.jpg') }}" alt="">
                            @endif
                        </th>
                    </tr>
                    <tr>
                        <td>{{ tr('Id') }}</td>
                        <th scope="row">{{ $appeal->id }}</th>
                    </tr>
                    <tr>
                        <td>{{ tr('FIO') }}</td>
                        <th scope="row">{{ $appeal->fullName }}</th>
                    </tr>
                    <tr>
                        <td>{{ tr('Gender') }}</td>
                        <th scope="row">
                            @if($appeal->gender == 2)
                                <span>{{ tr('Male') }}</span>
                            @elseif($appeal->gender == 1)
                                <span>{{ tr('Female') }}</span>
                            @endif
                        </th>
                    </tr>
                    <tr>
                        <td>{{ tr('Organization') }}</td>
                        <th scope="row">{{ $appeal->organization }}</th>
                    </tr>
                    <tr>
                        <td>{{ tr('Country') }}</td>
                        <th scope="row">{{ $appeal->country }}</th>
                    </tr>
                    <tr>
                        <td>{{ tr('Email') }}</td>
                        <th scope="row">{{ $appeal->email }}</th>
                    </tr>
                    <tr>
                        <td>{{ tr('Participation format') }}</td>
                        <th scope="row">
                            @if($appeal->participation_format == 1)
                                <span>С докладом</span>
                            @elseif($appeal->participation_format == 2)
                                <span>С комментарием</span>
                            @endif
                        </th>
                    </tr>
                    <tr>
                        <td>{{ tr('Breakout session') }}</td>
                        <th scope="row">
                            @if($appeal->breakout_session == 1)
                                <span>
                                     СЕКЦИЯ I: Меры по устранению условий, сопутствующих распространению
                                                терроризма
                                </span>
                            @elseif($appeal->breakout_session == 2)
                                <span>
                                СЕКЦИЯ II: Предотвращение и борьба с терроризмом
                                </span>
                            @elseif($appeal->breakout_session == 3)
                                <span>
                                    СЕКЦИЯ III: Укрепление возможностей государств по предотвращению и
                                                борьбе с терроризмом, а также расширению роли системы ООН в этой области
                                </span>
                            @elseif($appeal->breakout_session == 4)
                                <span>
                                    СЕКЦИЯ IV: Обеспечение всеобщего уважения прав человека и верховенства
                                                права в качестве фундаментальной основы для борьбы с терроризмом
                                </span>
                            @endif
                        </th>
                    </tr>
                    <tr>
                        <td>{{ tr('Created At') }}</td>
                        <th scope="row">{{ $appeal->created_at->format('d.m.20y') }}</th>
                    </tr>
                    <tr>
                        <td>{{ tr('Updated At') }}</td>
                        <th scope="row">{{ $appeal->updated_at->format('d.m.20y') }}</th>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-wrap">
                    <thead>
                    <tr class="text-primary">
                        <th></th>
                        <th>{{ tr('Id') }}</th>
                        <th>{{ tr('FullName') }}</th>
                        <th>{{ tr('Link') }}</th>
                        <th>{{ tr('Email') }}</th>
                        <th>{{tr('Created At')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($sendEmail as $key=>$appeal)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{ $appeal->id }}</td>
                            <td>{{ $appeal->fullName }}</td>
                            <td>{{ $appeal->link }}</td>
                            <td>{{$appeal->email}}</td>
                            <td>{{ $appeal->created_at->format('d.m.20y') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
