<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ tr('Managements') }}</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 my-2">
                @can('managements.create')
                    <a class="btn btn-primary create-btn" href="{{ route('managements.create') }}">
                        {{ tr('Create Management') }}
                    </a>
                @endcan
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-wrap">
                <thead>
                    <tr class="text-primary">
                        <th></th>
                        <th>{{ tr('Id') }}</th>
                        <th>{{ tr('Category') }}</th>
                        <th>{{ tr('Title') }}</th>
                        <th>{{ tr('Leader') }}</th>
                        <th>{{ tr('Slug') }}</th>
                        <th>{{ tr('Status') }}</th>
                        <th>{{ tr('Creator') }}</th>
                        <th style="width: 100px"></th>
                    </tr>
                    <tr>
                        <th></th>
                        <th>
                            <input class="form-control" type="text" wire:model.debounce.300ms="filter_id" />
                        </th>
                        <th>
                            <select class="custom-select rounded-0 select2bs4"
                                wire:model.debounce.300ms="filter_category">
                                <option value="0"></option>
                                @foreach ($managementCategories as $managementCategory)
                                    <option value="{{ $managementCategory->id }}">{{ $managementCategory->title }}
                                    </option>
                                @endforeach
                            </select>
                        </th>
                        <th>
                            <input class="form-control" type="text" wire:model.debounce.300ms="filter_title">
                        </th>
                        <th>
                            <input class="form-control" type="text" wire:model.debounce.300ms="filter_leader">
                        </th>
                        <th>
                            <input class="form-control" type="text" wire:model.debounce.300ms="filter_slug">
                        </th>
                        <th>
                            <select class="form-control" wire:model.debounce.300ms="filter_status">
                                <option value="0"></option>
                                <option value="2">{{ tr('Active') }}</option>
                                <option value="1">{{ tr('Inactive') }}</option>
                            </select>
                        </th>
                        <th>
                            <select class="custom-select rounded-0 select2bs4" wire:model.debounce.300ms="filter_user">
                                <option value="0"></option>
                                @foreach ($users as $u)
                                    <option value="{{ $u->id }}">{{ $u->name }}</option>
                                @endforeach
                            </select>
                        </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($managements as $key => $management)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $management->id }}</td>
                            <td>
                                @if ($management->category)
                                    {{ $management->category->title }}
                                @else
                                    {{ tr('Not set') }}
                                @endif
                            </td>
                            <td>{{ Illuminate\Support\Str::of($management->title)->words(8) ?? '' }}</td>
                            <td>{{ $management->leader ?? '' }}</td>
                            <td>{{ $management->slug }}</td>
                            <td>
                                @if ($management->status == 2)
                                    <span class="badge bg-success p-2">{{ tr('Active') }}</span>
                                @else
                                    <span class="badge bg-danger p-2">{{ tr('Inactive') }}</span>
                                @endif
                            </td>
                            <td>{{ Str::ucfirst($management->user['name']) }}</td>
                            <td class="d-flex">
                                @can('managements.show')
                                    <a class="btn btn-primary m-1"
                                        href="{{ route('managements.show', $management->id) }}" title="View"
                                        aria-label="View"><span class="fas fa-eye"></span>
                                    </a>
                                @endcan
                                @can('managements.edit')
                                    <a class="btn btn-primary m-1"
                                        href="{{ route('managements.edit', $management->id) }}" title="Янгилаш"
                                        aria-label="Янгилаш"><span class="fas fa-pencil-alt"></span>
                                    </a>
                                @endcan
                                @can('managements.destroy')
                                    <form action="{{ route('managements.destroy', $management->id) }}" method="POST">
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
            <span class="d-flex pt-2 justify-content-end"> {{ $managements->links() }}</span>
        </div>
    </div>
</div>
