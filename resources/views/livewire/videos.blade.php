<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ tr('Videos') }}</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 my-2 d-flex justify-content-between">
                @can('videos.create')
                <a class="btn btn-primary create-btn" href="{{ route('videos.create') }}">{{ tr('Create Video') }}</a>
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
                                @foreach ($videosCategories as $videosCategory)
                                <option value="{{ $videosCategory->id }}">{{ $videosCategory->title }}</option>
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
                    @foreach ($videos as $key=>$video)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{ $video->id }}</td>
                        <td>
                            @if ($video->category)
                            {{ $video->category->title }}
                            @else
                            {{tr('Not set')}}
                            @endif
                        </td>
                        <td>{{ Illuminate\Support\Str::of($video->title)->words(4) }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($video->slug, 15) }}</td>
                        <td>{!! Illuminate\Support\Str::of($video->description)->words(6) !!}</td>
                        <td>{{ $video->count_view }}</td>
                        <td>
                            @if ($video->status == 2)
                            <span class="badge bg-success">{{tr('Active')}}</span>
                            @else
                            <span class="badge bg-danger">{{tr('Inactive')}}</span>
                            @endif
                        </td>
                        <td>{{ Str::ucfirst($video->user['name']) }}</td>
                        <td class="d-flex">
                            @can('videos.show')
                                <a class="btn btn-primary m-1"
                                   href="{{ route('videos.show', $video->id) }}"
                                   title="View" aria-label="View"><span class="fas fa-eye"></span>
                                </a>
                            @endcan
                            @can('videos.edit')
                                <a class="btn btn-primary m-1"
                                   href="{{ route('videos.edit', $video->id) }}"
                                   title="Янгилаш" aria-label="Янгилаш"><span class="fas fa-pencil-alt"></span>
                                </a>
                            @endcan
                            @can('videos.destroy')
                                <form action="{{ route('videos.destroy', $video->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-primary m-1" type="submit"><span
                                            class="fas fa-trash-alt"></span></button>
                                </form>
                        @endcan
                        <td/>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <span class="d-flex pt-2 justify-content-end"> {{ $videos->links() }}</span>
        </div>
    </div>
</div>
