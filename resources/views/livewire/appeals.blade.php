<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ tr('Registers') }}</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 my-2">
                <a class="btn btn-primary create-btn" href="{{ route('appeals.create') }}">
                    {{ tr('Send Zoom Link') }}
                </a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-wrap">
                <thead>
                <tr class="text-primary">
                    <th>{{ tr('Id') }}</th>
                    <th>{{ tr('Image') }}</th>
                    <th>{{ tr('Full Name') }}</th>
                    <th>{{ tr('Organization') }}</th>
                    <th>{{ tr('Position') }}</th>
                    <th>{{ tr('Email') }}</th>
                    <th>{{ tr('Status') }}</th>
                    <th>{{ tr('Count') }}</th>
                    <th>{{tr('Created At')}}</th>
                    <th style="width: 100px"></th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th>
                        <input class="form-control" type="text" wire:model.debounce.300ms="filter_fullName">
                    </th>
                    <th>
                        <input class="form-control" type="text" wire:model.debounce.300ms="filter_organization">
                    </th>
                    <th>
                        <input class="form-control" type="text" wire:model.debounce.300ms="filter_position">
                    </th>
                    <th>
                        <input class="form-control" type="text" wire:model.debounce.300ms="filter_email">
                    </th>

                </tr>
                </thead>
                <tbody>
                @foreach ($appeals as $appeal)
                    <tr>
                        <td>{{ $appeal->id }}</td>
                        <td>
                            @if($appeal->photo)
                                <img width="50px" src="{{ asset($appeal->photo) }}" alt="">
                            @else
                                <img width="50px" src="{{ asset('img/noImage.jpg') }}" alt="">
                            @endif
                        </td>
                        <td>
                            {{ $appeal->first_name }} <br/>
                            {{ $appeal->last_name }} <br/>
                            {{ $appeal->middle_name }} <br/>
                        </td>
                        <td>{{$appeal->organization}}</td>
                        <td>{{$appeal->position}}</td>
                        <td>{{$appeal->email}}</td>
                        <td>
                            @if ($appeal->status == 2)
                                <span class="badge bg-success p-2">{{ tr('Online') }}</span>
                            @else
                                <span class="badge bg-info p-2">{{ tr('Offline') }}</span>
                            @endif
                        </td>
                        <td style="font-weight: 700">
                            @if($appeal->sendEmail->count() == 0)
                                <span class="badge bg-danger p-2">{{$appeal->sendEmail->count()}}</span>
                            @else
                                <span class="badge bg-success p-2">{{$appeal->sendEmail->count()}}</span>
                            @endif
                        </td>
                        <td>{{ $appeal->created_at->format('d.m.20y') }}</td>
                        <td class="d-flex">
                            @can('appeals.show')
                                <a class="btn btn-primary m-1" href="{{ route('appeals.show', $appeal->id) }}"
                                   title="View"
                                   aria-label="View"><span class="fas fa-eye"></span>
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
