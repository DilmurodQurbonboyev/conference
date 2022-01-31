<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ tr('Events Categories') }}</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 my-2 d-flex justify-content-between">
                @can('events-category.create')
                    <a class="btn btn-primary create-btn"
                       href="{{ route('events-category.create') }}">{{ tr('Create Event Category ') }}</a>
                @endcan
                <div>
                    <button type="button" wire:click="export('csv')" class="btn btn-outline-secondary">
                        <i class="fas fa-file-csv"></i>
                        <span>{{ tr('Csv') }}</span>
                    </button>
                    <button type="button" wire:click="export('pdf')" class="btn btn-outline-danger">
                        <i class="fas fa-file-pdf"></i>
                        <span>{{ tr('Pdf') }}</span>
                    </button>
                    <button type="button" wire:click="export('xlsx')" wire:loading.attr="disabled"
                            class="btn btn-outline-success">
                        <i class="fas fa-file-excel"></i>
                        <span>{{ tr('Excel') }}</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-wrap">
                <thead>
                <tr class="text-primary">
                    <th></th>
                    <th>{{ tr('Id') }}</th>
                    <th>{{ tr('Main') }}</th>
                    <th>{{ tr('Title') }}</th>
                    <th>{{ tr('Slug') }}</th>
                    <th>{{ tr('Status') }}</th>
                    <th>{{ tr('Creator') }}</th>
                    <th style="width: 100px"></th>
                </tr>
                <tr>
                    <th></th>
                    <th>
                        <input class="form-control" type="number" wire:model.debounce.300ms="filter_id"/>
                    </th>
                    <th>
                        <select class="form-control" wire:model.debounce.300ms="filter_parent_id">
                            <option value="0"></option>
                            @foreach ($eventsParent as $eventpar)
                                <option value="{{ $eventpar->id }}">{{ $eventpar->title }}</option>
                            @endforeach
                        </select>
                    </th>
                    <th>
                        <input class="form-control" type="text" wire:model.debounce.300ms="filter_title"/>
                    </th>
                    <th>
                        <input class="form-control" type="text" wire:model.debounce.300ms="filter_slug"/>
                    </th>
                    <th>
                        <select class="custom-select rounded-0 select2bs4" wire:model.debounce.300ms="filter_status">
                            <option value=""></option>
                            <option value="2">{{tr('Active')}}</option>
                            <option value="1">{{tr('Inactive')}}</option>
                        </select>
                    </th>
                    <th>
                        <select class="custom-select rounded-0 select2bs4" wire:model.debounce.300ms="filter_user">
                            <option></option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ Str::ucfirst($user->name) }}</option>
                            @endforeach
                        </select>
                    </th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @forelse ($events as $key=>$event)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td scope="row">{{ $event->id }}</td>
                        <td>
                            @if($event->parent !== null)
                                {{ $event->parent->title }}
                            @else
                                {{tr('Main Category')}}
                            @endif
                        </td>
                        <td>{{ $event->title ?? ''}}</td>
                        <td>{{ $event->slug }}</td>
                        <td>
                            @if ($event->status == 2)
                                <span class="badge bg-success">{{tr('Active')}}</span>
                            @else
                                <span class="badge bg-danger">{{tr('Inactive')}}</span>
                            @endif
                        </td>
                        <td>{{ Str::ucfirst($event->user['name']) }}</td>
                        <td>
                            @can('events-category.show')
                                <a href="{{ route('events-category.show', $event->id) }}" title="View"
                                   aria-label="View"
                                ><span class="fas fa-eye"></span></a>
                            @endcan
                            @can('events-category.edit')
                                <a
                                    href="{{ route('events-category.edit', $event->id) }}" title="Янгилаш"
                                    aria-label="Янгилаш"><span class="fas fa-pencil-alt"></span></a>
                            @endcan
                            @can('events-category.delete')
                                <a class="delete-button-confirm"
                                   href="{{ route('events-category.destroy', $event->id) }}"
                                   title="Ўчириш" aria-label="Ўчириш"><span
                                        class="fas fa-trash-alt"></span></a>
                        @endcan
                        <td/>
                    </tr>
                @empty
                    No any data
                @endforelse
                </tbody>
            </table>
            <div class="summary mt-2 mb-2">Namoyish etilayabdi <b>{{ $events->firstItem() }}
                    - {{ $events->lastItem() }} </b> ta yozuv <b>{{ $events->total() }}</b> tadan.
            </div>
        </div>
        <div class="card-footer clearfix">
            {{ $events->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
