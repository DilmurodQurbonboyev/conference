<table>
    <thead>
    <tr>
        <th style="width: 180px"><strong>{{tr('Last Name')}}</strong></th>
        <th style="width: 180px"><strong>{{tr('First Name')}}</strong></th>
        <th style="width: 180px"><strong>{{tr('Middle Name')}}</strong></th>
        <th style="width: 180px"><strong>{{tr('Organization')}}</strong></th>
        <th style="width: 180px"><strong>{{tr('Position')}}</strong></th>
        <th style="width: 180px"><strong>{{tr('Country')}}</strong></th>
        <th style="width: 180px"><strong>{{ tr('Participation format') }}</strong></th>
        <th style="width: 180px"><strong>{{ tr('Breakout session') }}</strong></th>
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
            <td style="width: 180px">
                @if ($appeal->participation_format == 1)
                    <span>
                                        @if ($app->getLocale() == 'ru')
                            С докладом
                        @else
                            Session Speaker
                        @endif
                                    </span>
                @elseif($appeal->participation_format == 2)
                    <span>
                                        @if ($app->getLocale() == 'ru')
                            С комментарием
                        @else
                            Statement from the floor
                        @endif
                                    </span>
                @elseif($appeal->participation_format == 3)
                    @if ($app->getLocale() == 'ru')
                        Представители СМИ
                    @else
                        Media coverage
                    @endif
                @endif
            </td>
            <td style="width: 180px">
                @if ($appeal->breakout_session == 1)
                    <span>
                                        @if ($app->getLocale() == 'ru')
                            СЕКЦИЯ I: Меры по устранению условий, сопутствующих распространению
                            терроризма
                        @else
                            PANEL DISCUSSION I: Addressing the conditions conducive to the spread of
                            terrorism
                        @endif
                                    </span>
                @elseif($appeal->breakout_session == 2)
                    <span>
                                        @if ($app->getLocale() == 'ru')
                            СЕКЦИЯ II: Предотвращение и борьба с терроризмом
                        @else
                            PANEL DISCUSSION II: Preventing and countering terrorism
                        @endif
                                    </span>
                @elseif($appeal->breakout_session == 3)
                    <span>
                                        @if ($app->getLocale() == 'ru')
                            СЕКЦИЯ III: Укрепление возможностей государств по предотвращению и
                            борьбе с терроризмом, а также расширению роли системы ООН в этой области
                        @else
                            PANEL DISCUSSION III: Building states’ capacity to prevent and combat
                            terrorism and to strengthen the role of the United Nations system in
                            that regard
                        @endif
                                    </span>
                @elseif($appeal->breakout_session == 4)
                    <span>
                                        @if ($app->getLocale() == 'ru')
                            СЕКЦИЯ IV: Обеспечение всеобщего уважения прав человека и верховенства
                            права в качестве фундаментальной основы для борьбы с терроризмом
                        @else
                            PANEL DISCUSSION IV: Ensuring respect for human rights for all and the
                            rule of law as the fundamental basis for the fight against terrorism
                        @endif
                                    </span>
                @endif
            </td>
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
