<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ tr('Offline') }}</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 my-2">
                <a class="btn btn-primary create-btn" href="{{ route('offline.create') }}">
                    {{ tr('Send Address') }}</a>
                <button type="button" class="btn btn-success" wire:click="export('xlsx')" wire:loading.attr="disabled">
                    <i class="fas fa-file-excel"></i>
                    {{ tr('Export to Excel') }}
                </button>
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
                @foreach ($offlineUsers as $key=>$offlineUser)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>
                            @if($offlineUser->photo)
                                <img width="80px" src="{{ asset($offlineUser->photo) }}" alt="">
                            @else
                                <img width="80px" src="{{ asset('img/noImage.jpg') }}" alt="">
                            @endif
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
                        <td style="font-weight: 700">
                            @if($offlineUser->sendEmail->count() == 0)
                                <span class="badge bg-danger p-2">{{$offlineUser->sendEmail->count()}}</span>
                            @else
                                <span class="badge bg-success p-2">{{$offlineUser->sendEmail->count()}}</span>
                            @endif
                        </td>
                        <td>{{ $offlineUser->created_at->format('d.m.20y') }}</td>
                        <td class="d-flex">
                            @can('offline.show')
                                <a class="btn btn-primary m-1" href="{{ route('offline.show', $offlineUser->id) }}"
                                   title="View" aria-label="View"><span class="fas fa-eye"></span>
                                </a>
                            @endcan
                            @can('offline.destroy')
                                <form action="{{ route('offline.destroy', $offlineUser->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" wire:click="deleteId({{ $offlineUser->id }})"
                                            class="btn btn-primary m-1"
                                            data-toggle="modal" data-target="#deleteModal">
                                        <span class="fas fa-trash-alt"></span>
                                    </button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                     aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">{{ tr('Delete Confirm') }}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true close-btn">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>{{ tr('Are you sure want to delete') }}?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">{{
                                        tr('No')
                                        }}</button>
                                <button type="button" wire:click.prevent="delete()"
                                        class="btn btn-primary close-modal" data-dismiss="modal">{{
                                        tr('Yes') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
                </tbody>
            </table>
            <span class="d-flex pt-2 justify-content-end"> {{ $offlineUsers->links() }}</span>
        </div>
    </div>
</div>
