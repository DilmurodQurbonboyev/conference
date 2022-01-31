<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ tr('Menus') }}</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 my-2">
                @can('menus.create')
                    <a class="btn btn-primary" href="{{ route('menus.create') }}">{{ tr('Create Menu') }}</a>
                @endcan
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-wrap">
                <thead>
                <tr class="text-primary">
                    <th>{{ tr('Id') }}</th>
                    <th>{{ tr('Main') }}</th>
                    <th>{{ tr('Category') }}</th>
                    <th>{{ tr('Title') }}</th>
                    <th>{{ tr('Link') }}</th>
                    <th>{{ tr('Link Type') }}</th>
                    <th>{{ tr('Status') }}</th>
                    <th>{{ tr('Creator') }}</th>
                    <th style="width: 100px"></th>
                </tr>
                <tr>
                    <th>
                        <input class="form-control" wire:model.debounce.300ms="filter_id" type="number">
                    </th>
                    <th>
                        <select class="custom-select rounded-0" wire:model.debounce.300ms="filter_parent_id">
                            <option value="0"></option>
                            @foreach ($parentMenus as $parentId)
                                <option value="{{ $parentId->id }}">{{ $parentId->title }}
                                </option>
                            @endforeach
                        </select>
                    </th>
                    <th>
                        <select class="custom-select rounded-0" wire:model.debounce.300ms="filter_category">
                            <option value="0"></option>
                            @foreach ($menus as $menu)
                                <option value="{{ $menu->id }}">
                                    {{ $menu->translate()->title }}
                                </option>
                            @endforeach
                        </select>
                    </th>
                    <th>
                        <input class="form-control" type="text" wire:model.debounce.300ms="filter_title">
                    </th>
                    <th>
                        <input class="form-control" type="text" wire:model.debounce.300ms="filter_link">
                    </th>
                    <th>
                        <select class="custom-select rounded-0" wire:model.debounce.300ms="filter_link_type">
                            <option></option>
                            <option value="1">{{ tr('Inactive') }}</option>
                            <option value="2">{{ tr('Local opens in this window') }}</option>
                            <option value="3">{{ tr('Local opens in a new window') }}</option>
                            <option value="4">{{ tr('Global opens in this window') }}</option>
                            <option value="5">{{ tr('Global opens in a new window') }}</option>
                        </select>
                    </th>
                    <th>
                        <select class="custom-select rounded-0" wire:model.debounce.300ms="filter_status">
                            <option value=""></option>
                            <option value="2">{{ tr('Active') }}</option>
                            <option value="1">{{ tr('Inactive') }}</option>
                        </select>
                    </th>
                    <th>
                        <select class="custom-select rounded-0" wire:model.debounce.300ms="filter_user">
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
                @foreach ($menus as $menu)
                    <tr>
                        <td>{{ $menu->id }}</td>
                        <td>{{ $menu->parent != null ? $menu->parent->title : tr('Main Category') }}</td>
                        <td>
                            @if ($menu->category)
                                {{ $menu->category->title }}
                            @else
                                {{ tr('Not set') }}
                            @endif
                        </td>
                        <td>{{ $menu->title ?? '' }}</td>
                        <td>{{ $menu->link }}</td>
                        <td>
                            @if ($menu->link_type == 1)
                                {{ tr('Inactive') }}
                            @endif
                            @if ($menu->link_type == 2)
                                {{ tr('Local opens in this window') }}
                            @endif
                            @if ($menu->link_type == 3)
                                {{ tr('Local opens in a new window') }}
                            @endif
                            @if ($menu->link_type == 4)
                                {{ tr('Global opens in this window') }}
                            @endif
                            @if ($menu->link_type == 5)
                                {{ tr('Global opens in a new window') }}
                            @endif
                        </td>
                        <td>
                            @if ($menu->status == 2)
                                <span class="badge bg-success">{{ tr('Active') }}</span>
                            @else
                                <span class="badge bg-danger">{{ tr('Inactive') }}</span>
                            @endif
                        </td>
                        <td>{{ Str::ucfirst($menu->user['name']) }}</td>
                        <td class="d-flex">
                            @can('menus.show')
                                <a class="btn btn-primary m-1" href="{{ route('menus.show', $menu->id) }}"
                                   title="View" aria-label="View"><span class="fas fa-eye"></span>
                                </a>
                            @endcan
                            @can('menus.edit')
                                <a class="btn btn-primary m-1" href="{{ route('menus.edit', $menu->id) }}"
                                   title="Янгилаш" aria-label="Янгилаш"><span class="fas fa-pencil-alt"></span>
                                </a>
                            @endcan
                            @can('menus.destroy')
                                <form action="{{ route('menus.destroy', $menu->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" wire:click="deleteId({{ $menu->id }})"
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
            <span class="d-flex pt-2 justify-content-end"> {{ $menus->links() }}</span>
        </div>
    </div>
</div>
