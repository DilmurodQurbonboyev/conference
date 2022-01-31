<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ tr('Maps') }}</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 my-2">
                @can('maps.create')
                    <a class="btn btn-primary" href="{{ route('maps.create') }}">{{ tr('Create Map')
                    }}</a>
                @endcan
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-wrap">
                <thead>
                <tr class="text-primary">
                    <th>{{ tr('Id') }}</th>
                    <th>{{ tr('Title') }}</th>
                    <th>{{ tr('Status') }}</th>
                    <th>{{ tr('Creator') }}</th>
                    <th style="width: 100px"></th>
                </tr>
                <tr>
                    <th>
                        <input type="text" class="form-control" wire:model.debounce.300ms="searchId" />
                    </th>
                    <th>
                        <input type="text" class="form-control" wire:model.debounce.300ms="searchTitle" />
                    </th>
                    <th>
                        <select wire:model="searchStatus" class="form-control">
                            <option value=""></option>
                            <option value="2">{{tr('Active')}}</option>
                            <option value="1">{{tr('Inactive')}}</option>
                        </select>
                    </th>
                    <th>
                        <select class="form-control" wire:model="searchUser">
                            <option></option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ Str::ucfirst($user->name) }}</option>
                            @endforeach
                        </select>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($maps as $key=>$map)
                    <tr>
                        <td>{{ $map->id }}</td>
                        <td>{{ $map->title ?? ''}}</td>
                        <td>
                            @if ($map->status == 2)
                                <span class="badge bg-success">{{tr('Active')}}</span>
                            @else
                                <span class="badge bg-danger">{{tr('Inactive')}}</span>
                            @endif
                        </td>
                        <td>{{ Str::ucfirst($map->user['name']) }}</td>
                        <td class="d-flex">
                            @can('maps.show')
                                <a class="btn btn-primary m-1" href="{{ route('maps.show', $map->id) }}"
                                   title="View" aria-label="View"><span class="fas fa-eye"></span>
                                </a>
                            @endcan
                            @can('maps.edit')
                                <a class="btn btn-primary m-1" href="{{ route('maps.edit', $map->id) }}"
                                   title="Янгилаш" aria-label="Янгилаш"><span class="fas fa-pencil-alt"></span>
                                </a>
                            @endcan
                            @can('maps.destroy')
                                <form action="{{ route('maps.destroy', $map->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-primary m-1" type="submit"><span
                                            class="fas fa-trash-alt"></span></button>
                                </form>
                        @endcan
                        <td />
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
