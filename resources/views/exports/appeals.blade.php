<table>
    <thead>
    <tr>
        <th style="width: 180px"><strong>{{tr('Last Name')}}</strong></th>
        <th style="width: 180px"><strong>{{tr('First Name')}}</strong></th>
        <th style="width: 180px"><strong>{{tr('Middle Name')}}</strong></th>
        <th style="width: 180px"><strong>{{tr('Organization')}}</strong></th>
        <th style="width: 180px"><strong>{{tr('Position')}}</strong></th>
        <th style="width: 180px"><strong>{{tr('Country')}}</strong></th>
        <th style="width: 180px"><strong>{{tr('Email')}}</strong></th>
        <th style="width: 100px"><strong>{{tr('Gender')}}</strong></th>
        <th style="width: 180px"><strong>{{ tr('Status') }}</strong></th>
        <th style="width: 180px"><strong>{{tr('Created At')}}</strong></th>
    </tr>
    </thead>
    <tbody>
    @foreach($appeals as $appeal)
        <tr>
            <td style="width: 180px">{{ $appeal->last_name }}</td>
            <td style="width: 180px">{{ $appeal->first_name }}</td>
            <td style="width: 180px">{{ $appeal->middle_name ?? '' }}</td>
            <td style="width: 180px">{{ $appeal->organization }}</td>
            <td style="width: 180px">{{ $appeal->position }}</td>
            <td style="width: 180px">{{ $appeal->country }}</td>
            <td style="width: 180px">{{ $appeal->email }}</td>
            <td style="width: 100px">
                @if($appeal->gender == 2)
                    <span>{{ tr('Male') }}</span>
                @else
                    <span>{{ tr('Female') }}</span>
                @endif
            </td>
            <td style="width: 180px">
                @if ($appeal->status == 2)
                    <span>{{ tr('Online') }}</span>
                @else
                    <span>{{ tr('Offline') }}</span>
                @endif
            </td>
            <td style="width: 180px">
                {{ $appeal->created_at->format('d.m.20y') }} {{ $appeal->created_at->format('H:i') }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
