<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ tr('Photos') }}</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 my-2 d-flex justify-content-between">
                @can('photos.create')
                    <a class="btn btn-primary create-btn"
                        href="{{ route('photos.create') }}">{{ tr('Create Photo') }}</a>
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
                            <input class="form-control" type="text" wire:model.debounce.300ms="filter_id" />
                        </th>
                        <th>
                            <select class="custom-select rounded-0 select2bs4"
                                wire:model.debounce.300ms="filter_category">
                                <option value="0"></option>
                                @foreach ($photosCategories as $photosCategory)
                                    <option value="{{ $photosCategory->id }}">{{ $photosCategory->title }}
                                    </option>
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
                    @foreach ($photos as $key => $photo)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $photo->id }}</td>
                            <td>
                                @if ($photo->category)
                                    {{ $photo->category->title }}
                                @else
                                    {{ tr('Not set') }}
                                @endif
                            </td>
                            <td>{{ Illuminate\Support\Str::of($photo->title)->words(4) }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($photo->slug, 15) }}</td>
                            <td>{!! Illuminate\Support\Str::of($photo->description)->words(6) !!}</td>
                            <td>{{ $photo->count_view }}</td>
                            <td>
                                @if ($photo->status == 2)
                                    <span class="badge bg-success">{{ tr('Active') }}</span>
                                @else
                                    <span class="badge bg-danger">{{ tr('Inactive') }}</span>
                                @endif
                            </td>
                            <td>{{ Str::ucfirst($photo->user['name']) }}</td>
                            <td class="d-flex">
                                @can('photos.show')
                                    <a class="btn btn-primary m-1" href="{{ route('photos.show', $photo->id) }}"
                                        title="View" aria-label="View"><span class="fas fa-eye"></span>
                                    </a>
                                @endcan
                                @can('photos.edit')
                                    <a class="btn btn-primary m-1" href="{{ route('photos.edit', $photo->id) }}"
                                        title="Янгилаш" aria-label="Янгилаш"><span class="fas fa-pencil-alt"></span>
                                    </a>
                                @endcan
                                @can('photos.destroy')
                                    <form action="{{ route('photos.destroy', $photo->id) }}" method="POST">
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
            <span class="d-flex pt-2 justify-content-end"> {{ $photos->links() }}</span>
        </div>
    </div>
</div>
