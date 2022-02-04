<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ tr('Registers') }}</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 my-2">
                <a class="btn btn-primary create-btn" href="{{ route('offline.create') }}">
                    {{ tr('Send Address') }}</a>
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
                    @foreach ($offlineUsers as $key=>$offlineUser)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{ $offlineUser->id }}</td>
                        <td>
                            <img width="100px" src="{{ asset($offlineUser->photo) }}" alt="">
                        </td>
                        <td>{{ $offlineUser->fullName }}</td>
                        <td>{{$offlineUser->organization}}</td>
                        <td>{{$offlineUser->position}}</td>
                        <td>{{$offlineUser->email}}</td>
                        <td>
                            @if ($offlineUser->status == 2)
                            <span class="badge bg-success p-2">{{ tr('Online') }}</span>
                            @else
                            <span class="badge bg-info p-2">{{ tr('Offline') }}</span>
                            @endif
                        </td>
                        <td>{{ $offlineUser->created_at->format('d.m.20y') }}</td>
                        <td class="d-flex">
                            @can('offlineUsers.show')
                            <a class="btn btn-primary m-1" href="{{ route('offlineUsers.show', $offlineUser->id) }}"
                                title="View" aria-label="View"><span class="fas fa-eye"></span>
                            </a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <span class="d-flex pt-2 justify-content-end"> {{ $offlineUsers->links() }}</span>
        </div>
    </div>
</div>
