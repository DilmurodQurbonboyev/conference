<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ tr('Concerns') }}</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 my-2 d-flex justify-content-between">
                @can('concerns.create')
                    <a class="btn btn-primary create-btn"
                       href="{{ route('concerns.create') }}">{{ tr('Create Concern') }}</a>
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
                        <select class="custom-select rounded-0 select2bs4" wire:model.debounce.300ms="filter_category">
                            <option value="0"></option>
                            @foreach ($concernsCategories as $concernsCategory)
                                <option value="{{ $concernsCategory->id }}">{{ $concernsCategory->title }}</option>
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
                @foreach ($concerns as $key=>$concern)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{ $concern->id }}</td>
                        <td>
                            @if ($concern->category)
                                {{ $concern->category->title }}
                            @else
                                {{tr('Not set')}}
                            @endif
                        </td>
                        <td>{{ Illuminate\Support\Str::of($concern->title)->words(4) }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($concern->slug, 15) }}</td>
                        <td>{!! Illuminate\Support\Str::of($concern->description)->words(6) !!}</td>
                        <td>{{ $concern->count_view }}</td>
                        <td>
                            @if ($concern->status == 2)
                                <span class="badge bg-success">{{tr('Active')}}</span>
                            @else
                                <span class="badge bg-danger">{{tr('Inactive')}}</span>
                            @endif
                        </td>
                        <td>{{ Str::ucfirst($concern->user['name']) }}</td>
                        <td>
                            @can('concerns.show')
                                <a href="{{ route('concerns.show', $concern->id) }}" title="View"
                                   aria-label="View"
                                ><span class="fas fa-eye"></span></a>
                            @endcan
                            @can('concerns.edit')
                                <a
                                    href="{{ route('concerns.edit', $concern->id) }}" title="Янгилаш"
                                    aria-label="Янгилаш"><span class="fas fa-pencil-alt"></span></a>
                            @endcan
                            @can('concerns.delete')
                                <a class="delete-button-confirm"
                                   href="{{ route('concerns.destroy', $concern->id) }}"
                                   title="Ўчириш" aria-label="Ўчириш"><span
                                        class="fas fa-trash-alt"></span></a>
                        @endcan
                        <td/>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
