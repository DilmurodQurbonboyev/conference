<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ tr('Posters') }}</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 my-2">
                @can('posters.create')
                <a class="btn btn-primary create-btn" href="{{ route('posters.create') }}">{{ tr('Create Poster') }}</a>
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
                                @foreach ($postersCategories as $postersCategory)
                                <option value="{{ $postersCategory->id }}">{{ $postersCategory->title }}</option>
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
                                <option value="2">{{tr('Active')}}</option>
                                <option value="1">{{tr('Inactive')}}</option>
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
                    @foreach ($posters as $key=>$poster)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{ $poster->id }}</td>
                        <td>
                            @if ($poster->category)
                            {{ $poster->category->title }}
                            @else
                            {{tr('Not set')}}
                            @endif
                        </td>
                        <td>{{ Illuminate\Support\Str::of($poster->title)->words(4) }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($poster->slug, 15) }}</td>
                        <td>{!! Illuminate\Support\Str::of($poster->description)->words(6) !!}</td>
                        <td>{{ $poster->count_view }}</td>
                        <td>
                            @if ($poster->status == 2)
                            <span class="badge bg-success">{{tr('Active')}}</span>
                            @else
                            <span class="badge bg-danger">{{tr('Inactive')}}</span>
                            @endif
                        </td>
                        <td>{{ Str::ucfirst($poster->user['name']) }}</td>
                        <td>
                            @can('posters.show')
                            <a href="{{ route('posters.show', $poster->id) }}" title="View" aria-label="View"><span
                                    class="fas fa-eye"></span></a>
                            @endcan
                            @can('posters.edit')
                            <a href="{{ route('posters.edit', $poster->id) }}" title="Янгилаш"
                                aria-label="Янгилаш"><span class="fas fa-pencil-alt"></span></a>
                            @endcan
                            @can('posters.destroy')
                            <a class="delete-button-confirm" href="{{ route('posters.destroy', $poster->id) }}"
                                title="Ўчириш" aria-label="Ўчириш"><span class="fas fa-trash-alt"></span></a>
                            @endcan
                            <td />
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>