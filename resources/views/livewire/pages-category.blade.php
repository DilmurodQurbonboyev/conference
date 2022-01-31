<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ tr('Pages Categories') }}</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 my-2 d-flex justify-content-between">
                @can('pages-category.create')
                    <a class="btn btn-primary create-btn"
                       href="{{ route('pages-category.create') }}">{{ tr('Create Page Category') }}</a>
                @endcan
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
                            @foreach ($pagesParent as $pagepar)
                                <option value="{{ $pagepar->id }}">{{ $pagepar->title }}</option>
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
                        <select class="custom-select rounded-0 select2bs4"
                                wire:model.debounce.300ms="filter_status">
                            <option value=""></option>
                            <option value="2">{{ tr('Active') }}</option>
                            <option value="1">{{ tr('Inactive') }}</option>
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
                @foreach ($pages as $key => $page)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $page->id }}</td>
                        <td>
                            @if ($page->parent !== null)
                                {{ $page->parent->title }}
                            @else
                                {{ tr('Main Category') }}
                            @endif
                        </td>
                        <td>{{ $page->title ?? '' }}</td>
                        <td>{{ $page->slug }}</td>
                        <td>
                            @if ($page->status == 2)
                                <span class="badge bg-success">{{ tr('Active') }}</span>
                            @else
                                <span class="badge bg-danger">{{ tr('Inactive') }}</span>
                            @endif
                        </td>
                        <td>{{ Str::ucfirst($page->user['name']) }}</td>
                        <td class="d-flex">
                            @can('pages-category.show')
                                <a class="btn btn-primary m-1" href="{{ route('pages-category.show', $page->id) }}"
                                   title="View" aria-label="View"><span class="fas fa-eye"></span>
                                </a>
                            @endcan
                            @can('pages-category.edit')
                                <a class="btn btn-primary m-1" href="{{ route('pages-category.edit', $page->id) }}"
                                   title="Янгилаш" aria-label="Янгилаш"><span class="fas fa-pencil-alt"></span>
                                </a>
                            @endcan
                            @can('pages-category.destroy')
                                <form action="{{ route('pages-category.destroy', $page->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" wire:click="deleteId({{ $page->id }})"
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
            <span class="d-flex pt-2 justify-content-end"> {{ $pages->links() }}</span>
        </div>
    </div>
</div>
