<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ tr('News') }}</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 my-2">
                @can('news.create')
                    <a class="btn btn-primary create-btn" href="{{ route('news.create') }}">{{ tr('Create News') }}</a>
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
                    <th>{{ tr('Slug') }}</th>
                    <th>{{ tr('Description') }}</th>
                    <th>{{ tr('Count Views') }}</th>
                    <th>{{ tr('Status') }}</th>
                    <th>{{ tr('Creator') }}</th>
                    <th style="width: 100px"></th>
                </tr>
                <tr>
                    <th></th>
                    <th>
                        <input class="form-control" type="text" wire:model.debounce.300ms="filter_id"/>
                    </th>
                    <th>
                        <select class="custom-select rounded-0 select2bs4"
                                wire:model.debounce.300ms="filter_category">
                            <option value="0"></option>
                            @foreach ($newsCategories as $newsCategory)
                                <option value="{{ $newsCategory->id }}">{{ $newsCategory->title }}</option>
                            @endforeach
                        </select>
                    </th>
                    <th>
                        <input class="form-control" type="text" wire:model.debounce.300ms="filter_title">
                    </th>
                    <th>
                        <input class="form-control" type="text" wire:model.debounce.300ms="filter_slug">
                    </th>
                    <th>
                        <input class="form-control" type="text" wire:model.debounce.300ms="filter_description">
                    </th>
                    <th>
                        <input class="form-control" type="text" wire:model.debounce.300ms="filter_count_view">
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
                @foreach ($news as $key => $new)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $new->id }}</td>
                        <td>
                            @if ($new->category)
                                {{ $new->category->title }}
                            @else
                                {{ tr('Not set') }}
                            @endif
                        </td>
                        <td>{{ Illuminate\Support\Str::of($new->title)->words(4) ?? '' }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($new->slug, 15) ?? '' }}</td>
                        <td>{!! Illuminate\Support\Str::of($new->description)->words(3) ?? '' !!}</td>
                        <td>{{ $new->count_view }}</td>
                        <td>
                            @if ($new->status == 2)
                                <span class="badge bg-success p-2">{{ tr('Active') }}</span>
                            @else
                                <span class="badge bg-danger p-2">{{ tr('Inactive') }}</span>
                            @endif
                        </td>
                        <td>{{ Str::ucfirst($new->user['name']) }}</td>
                        <td class="d-flex">
                            @can('news.show')
                                <a class="btn btn-primary m-1" href="{{ route('news.show', $new->id) }}" title="View"
                                   aria-label="View"><span class="fas fa-eye"></span>
                                </a>
                            @endcan
                            @can('news.edit')
                                <a class="btn btn-primary m-1" href="{{ route('news.edit', $new->id) }}"
                                   title="??????????????" aria-label="??????????????"><span class="fas fa-pencil-alt"></span>
                                </a>
                            @endcan
                            @can('news.destroy')
                                <form action="{{ route('news.destroy', $new->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" wire:click="deleteId({{ $new->id }})"
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
                                    <span aria-hidden="true close-btn">??</span>
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
            <span class="d-flex pt-2 justify-content-end"> {{ $news->links() }}</span>
        </div>
    </div>
</div>
