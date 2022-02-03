<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ tr('Registers') }}</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 my-2">
                <a class="btn btn-primary create-btn"
                   href="{{ route('appeals.create') }}">{{ tr('Send Zoom Link') }}</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-wrap">
                <thead>
                <tr class="text-primary">
                    <th></th>
                    <th>{{ tr('Id') }}</th>
                    <th>{{ tr('Image') }}</th>
                    <th>{{ tr('FullName') }}</th>
                    <th>{{ tr('Organization') }}</th>
                    <th>{{ tr('Position') }}</th>
                    <th>{{ tr('Email') }}</th>
                    <th>{{ tr('Status') }}</th>
                    <th>{{tr('Created At')}}</th>
                    <th style="width: 100px"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($appeals as $key=>$appeal)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{ $appeal->id }}</td>
                        <td>
                            <img width="100px" src="{{ asset($appeal->photo) }}" alt="">
                        </td>
                        <td>{{ $appeal->fullName }}</td>
                        <td>{{$appeal->organization}}</td>
                        <td>{{$appeal->position}}</td>
                        <td>{{$appeal->email}}</td>
                        <td>
{{--                            @if ($appeal->sendEmail == 1)--}}
{{--                                <span class="badge bg-success p-2">{{ tr('Active') }}</span>--}}
{{--                            @else--}}
{{--                                <span class="badge bg-danger p-2">{{ tr('Inactive') }}</span>--}}
{{--                            @endif--}}
                        </td>
                        <td>{{ $appeal->created_at->format('d.m.20y') }}</td>
                        <td class="d-flex">
                            @can('appeals.show')
                                <a class="btn btn-primary m-1" href="{{ route('appeals.show', $appeal->id) }}"
                                   title="View" aria-label="View"><span class="fas fa-eye"></span>
                                </a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <span class="d-flex pt-2 justify-content-end"> {{ $appeals->links() }}</span>
        </div>
    </div>
</div>
