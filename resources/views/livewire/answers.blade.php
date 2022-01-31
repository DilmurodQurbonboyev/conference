<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ tr('Answers') }}</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 my-2">
                @can('answers.create')
                    <a class="btn btn-primary create-btn"
                       href="{{ route('answers.create') }}">{{ tr('Create Answer') }}</a>
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
                        <select class="custom-select rounded-0 select2bs4" wire:model.debounce.300ms="filter_category">
                            <option value="0"></option>
                            @foreach ($answersCategories as $answersCategory)
                                <option value="{{ $answersCategory->id }}">{{ $answersCategory->title }}</option>
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
                            <option></option>
                            <option value="2">{{tr('Active')}}</option>
                            <option value="1">{{tr('Inactive')}}</option>
                        </select>
                    </th>
                    <th>
                        <select class="custom-select rounded-0 select2bs4" wire:model.debounce.300ms="filter_user">
                            <option></option>
                            @foreach ($users as $u)
                                <option value="{{ $u->id }}">{{ $u->name }}</option>
                            @endforeach
                        </select>
                    </th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($answers as $key=>$answer)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{ $answer->id }}</td>
                        <td>
                            @if ($answer->category)
                                {{ $answer->category->title }}
                            @else
                                {{tr('Not set')}}
                            @endif
                        </td>
                        <td>{{ Illuminate\Support\Str::of($answer->title)->words(4) }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($answer->slug, 15) }}</td>
                        <td>{!! Illuminate\Support\Str::of($answer->description)->words(6) !!}</td>
                        <td>{{ $answer->count_view }}</td>
                        <td>
                            @if ($answer->status == 2)
                                <span class="badge bg-success">{{tr('Active')}}</span>
                            @else
                                <span class="badge bg-danger">{{tr('Inactive')}}</span>
                            @endif
                        </td>
                        <td>{{ Str::ucfirst($answer->user['name']) }}</td>
                        <td>
                            @can('answers.show')
                                <a href="{{ route('answers.show', $answer->id) }}" title="View"
                                   aria-label="View"
                                ><span class="fas fa-eye"></span></a>
                            @endcan
                            @can('answers.edit')
                                <a
                                    href="{{ route('answers.edit', $answer->id) }}" title="Янгилаш"
                                    aria-label="Янгилаш"><span class="fas fa-pencil-alt"></span></a>
                            @endcan
                            @can('answers.delete')
                                <a class="delete-button-confirm"
                                   href="{{ route('answers.destroy', $answer->id) }}"
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
