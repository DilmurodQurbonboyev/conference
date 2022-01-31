<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ tr('Answers Categories') }}</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 my-2">
                @can('answers-category.create')
                    <a class="btn btn-primary create-btn"
                       href="{{ route('answers-category.create') }}">{{ tr('Create Answer Category ') }}</a>
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
                            <option></option>
                            @foreach ($answersParent as $answerpar)
                                <option value="{{ $answerpar->id }}">{{ $answerpar->title }}</option>
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
                @foreach($answers as $key=>$answer)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $answer->id }}</td>
                        <td>
                            @if($answer->parent !== null)
                                {{ $answer->parent->title }}
                            @else
                                {{tr('Main Category')}}
                            @endif
                        </td>
                        <td>{{ $answer->title ?? ''}}</td>
                        <td>{{ $answer->slug }}</td>
                        <td>
                            @if ($answer->status == 2)
                                <span class="badge bg-success">{{tr('Active')}}</span>
                            @else
                                <span class="badge bg-danger">{{tr('Inactive')}}</span>
                            @endif
                        </td>
                        <td>{{ Str::ucfirst($answer->user['name']) }}</td>
                        <td>
                            @can('answers-category.show')
                                <a href="{{ route('answers-category.show', $answer->id) }}" title="View"
                                   aria-label="View"
                                ><span class="fas fa-eye"></span></a>
                            @endcan
                            @can('answers-category.edit')
                                <a
                                    href="{{ route('answers-category.edit', $answer->id) }}" title="Янгилаш"
                                    aria-label="Янгилаш"><span class="fas fa-pencil-alt"></span></a>
                            @endcan
                            @can('answers-category.delete')
                                <a class="delete-button-confirm"
                                   href="{{ route('answers-category.destroy', $answer->id) }}"
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
