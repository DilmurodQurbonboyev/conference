<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ tr('Logs') }}</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-wrap">
                <thead>
                    <tr class="text-primary">
                        <th></th>
                        <th>{{tr('Id')}}</th>
                        <th>{{tr('Model')}}</th>
                        <th>{{tr('Row Id')}}</th>
                        <th>{{tr('Username')}}</th>
                        <th>{{tr('Ip')}}</th>
                        <th>{{tr('Url')}}</th>
                        <th>{{tr('Action')}}</th>
                        <th>{{tr('Created At')}}</th>
                        <th style="width: 100px"></th>
                    </tr>
                    <tr>
                        <th></th>
                        <th>
                            <input class="form-control" type="text" wire:model.debounce.300ms="filter_id">
                        </th>
                        <th>
                            <input class="form-control" type="text" wire:model.debounce.300ms="filter_modal">
                        </th>
                        <th>
                            <input class="form-control" type="text" wire:model.debounce.300ms="filter_row">
                        </th>
                        <th>
                            <select class="custom-select rounded-0 select2bs4" wire:model.debounce.300ms="filter_user">
                                <option value="0"></option>
                                @foreach ($users as $u)
                                <option value="{{ $u->id }}">{{ $u->name }}</option>
                                @endforeach
                            </select>
                        </th>
                        <th>
                            <input class="form-control" type="text" wire:model.debounce.300ms="filter_ip">
                        </th>
                        <th>
                            <input class="form-control" type="text" wire:model.debounce.300ms="filter_url">
                        </th>
                        <th>
                            <select wire:model.debounce.300ms="filter_action" class="form-control">
                                <option value=""></option>
                                <option value="created">{{ tr('created') }}</option>
                                <option value="updated">{{ tr('updated') }}</option>
                                <option value="deleted">{{ tr('deleted') }}</option>
                                <option value="restored">{{ tr('restored') }}</option>
                            </select>
                        </th>
                        <th>
                            <input class="form-control" type="text" wire:model.debounce.300ms="filter_created_at">
                        </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($audits as $key=>$audit)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $audit->id }}</td>
                        <td>{{ $audit->auditable_type }}</td>
                        <td>{{ $audit->auditable_id }}</td>
                        <td>{{ $audit->user_id }}</td>
                        <td>{{ $audit->ip_address }}</td>
                        <td>{{ $audit->url }}</td>
                        <td>{{ $audit->event }}</td>
                        <td>{{ $audit->created_at }}</td>
                        <td class="d-flex">
                            @can('logs.show')
                            <a class="btn btn-primary m-1" href="{{ route('logs.show', $audit->id) }}" title="View"
                                aria-label="View"><span class="fas fa-eye"></span>
                            </a>
                            @endcan
                            @can('logs.destroy')
                            <form action="{{ route('logs.destroy', $audit->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" wire:click="deleteId({{ $audit->id }})"
                                    class="btn btn-primary m-1" data-toggle="modal" data-target="#deleteModal">
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
            <span class="d-flex pt-2 justify-content-end"> {{ $audits->links() }}</span>
        </div>
    </div>
</div>
