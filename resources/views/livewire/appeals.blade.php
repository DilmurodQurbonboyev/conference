<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ tr('Appeals') }}</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 my-2">
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-wrap">
                <thead>
                <tr class="text-primary">
                    <th></th>
                    <th>{{ tr('Id') }}</th>
                    <th>{{ tr('Name') }}</th>
                    <th>{{ tr('Number') }}</th>
                    <th>{{ tr('Email') }}</th>
                    <th>{{ tr('Status') }}</th>
                    <th>{{tr('Created At')}}</th>
                    <th style="width: 100px"></th>
                </tr>
                <tr>
                    <th></th>
                    <th>
                        <input class="form-control" wire:model.debounce.300ms="filter_id" type="number">
                    </th>
                    <th>
                        <input class="form-control" type="text" wire:model.debounce.300ms="filter_title">
                    </th>
                    <th>
                        <input class="form-control" type="text" wire:model.debounce.300ms="filter_number">
                    </th>
                    <th>
                        <input class="form-control" type="text" wire:model.debounce.300ms="filter_email">
                    </th>
                    <th>
                        <select class="custom-select rounded-0" wire:model.debounce.300ms="filter_status">
                            <option value=""></option>
                            <option value="2">{{ tr('Active') }}</option>
                            <option value="1">{{ tr('Inactive') }}</option>
                        </select>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($appeals as $key=>$appeal)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{ $appeal->id }}</td>
                        <td>{{ $appeal->project }}</td>
                        <td>{{ $appeal->bank_number }}</td>
                        <td>{{$appeal->bank_email}}</td>
                        <td>
                            @if ($appeal->status == 2)
                                <span class="badge bg-success">{{ tr('Active') }}</span>
                            @else
                                <span class="badge bg-danger">{{ tr('Inactive') }}</span>
                            @endif
                        </td>
                        <td>{{ $appeal->created_at->format('d.m.20y') }}</td>
                        <td class="d-flex">
                            @can('appeals.edit')
                                <a class="btn btn-primary m-1" href="{{ route('appeals.edit', $appeal->id) }}"
                                   title="Янгилаш" aria-label="Янгилаш"><span class="fas fa-pencil-alt"></span>
                                </a>
                            @endcan
                            @can('appeals.destroy')
                                <form action="{{ route('appeals.destroy', $appeal->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-primary m-1" type="submit"><span
                                            class="fas fa-trash-alt"></span></button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <span class="d-flex pt-2 justify-content-end"> {{ $appeals->links() }}</span>
        </div>
    </div>
</div>
