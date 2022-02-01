<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ tr('Registers') }}</h3>
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
                    <th>{{ tr('Image') }}</th>
                    <th>{{ tr('FullName') }}</th>
                    <th>{{ tr('Organization') }}</th>
                    <th>{{ tr('Position') }}</th>
                    <th>{{ tr('Email') }}</th>
                    <th>{{tr('Created At')}}</th>
                    <th style="width: 100px"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($appeals as $key=>$appeal)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{ $appeal->id }}</td>
                        <td>
                            <img src="{{$appeal->photo}}" alt="">
                            <img src="{{ public_path($appeal->photo) }}" alt="Image"/>

                        </td>
                        <td>{{ $appeal->fullName }}</td>
                        <td>{{$appeal->organization}}</td>
                        <td>{{$appeal->position}}</td>
                        <td>{{$appeal->email}}</td>
                        <td>{{ $appeal->created_at->format('d.m.20y') }}</td>
                        <td class="d-flex">
                            @can('appeals.show')
                                <a class="btn btn-primary m-1" href="{{ route('appeals.show', $appeal->id) }}"
                                   title="View" aria-label="View"><span class="fas fa-eye"></span>
                                </a>
                            @endcan
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
