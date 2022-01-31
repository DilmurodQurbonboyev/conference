<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ tr('Messages') }}</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 my-2">
                @can('messages.create')
                    <a class="btn btn-primary create-btn"
                       href="{{ route('messages.create') }}">{{ tr('Create Message') }}</a>
                @endcan
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-wrap">
                <thead>
                <tr class="text-primary">
                    <th></th>
                    <th>{{ tr('Id') }}</th>
                    <th>{{ tr('Title') }}</th>
                    <th>{{ tr('Messages') }}</th>
                    <th></th>
                </tr>
                <tr>
                    <th></th>
                    <th>
                        <input class="form-control" type="text" wire:model.debounce.300ms="filter_id">
                    </th>
                    <th>
                        <input class="form-control" type="text" wire:model.debounce.300ms="filter_title">
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($messages as $key => $message)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $message->id }}</td>
                        <td>{{ $message->title ?? '' }}</td>
                        <td>
                            @if ($message->translate('oz')->title)
                                <span class="badge bg-success">O‘zb</span>
                            @else
                                <span class="badge bg-danger">O‘zb</span>
                            @endif
                            @if ($message->translate('uz')->title)
                                <span class="badge bg-success">Ўзб</span>
                            @else
                                <span class="badge bg-danger">Ўзб</span>
                            @endif
                            @if ($message->translate('ru')->title)
                                <span class="badge bg-success">Рус</span>
                            @else
                                <span class="badge bg-danger">Рус</span>
                            @endif
                            @if ($message->translate('en')->title)
                                <span class="badge bg-success">Eng</span>
                            @else
                                <span class="badge bg-danger">Eng</span>
                            @endif
                        </td>
                        <td class="d-flex">
                            @can('messages.show')
                                <a class="btn btn-primary m-1" href="{{ route('messages.show', $message->id) }}"
                                   title="View" aria-label="View"><span class="fas fa-eye"></span>
                                </a>
                            @endcan
                            @can('messages.edit')
                                <a class="btn btn-primary m-1" href="{{ route('messages.edit', $message->id) }}"
                                   title="Янгилаш" aria-label="Янгилаш"><span class="fas fa-pencil-alt"></span>
                                </a>
                            @endcan
                            @can('messages.destroy')
                                <form action="{{ route('messages.destroy', $message->id) }}" method="POST">
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
            <span class="d-flex pt-2 justify-content-end"> {{ $messages->links() }}</span>
        </div>
    </div>
</div>
