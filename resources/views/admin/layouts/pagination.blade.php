@if ($paginator->hasPages())
    <ul class="pagination pagination-rounded justify-content-end align-items-center" style="margin-bottom: 0">
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <a href="javascript:;" wire:click="previousPage"
                   class="page-link">{{tr('Prev')}}
                </a>
            </li>
        @else
            <li class="page-item">
                <a href="javascript:;" wire:click="previousPage" rel="prev" class="page-link">{{tr('Prev')}}</a>
            </li>
        @endif
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="page-item disabled"><a class="page-link"><span>{{ $element }}</span></a></li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page=>$url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active" aria-current="page">
                            <a href="javascript:;" wire:click="gotoPage({{$page}})" class="page-link">
                                <span>{{ $page }}</span>
                            </a>
                        </li>
                    @else
                        <li class="page-item">
                            <a href="javascript:;" wire:click="gotoPage({{$page}})" class="page-link">{{$page}}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a href="javascript:;" wire:click="nextPage" class="page-link">{{ tr('Next') }}</a>
            </li>
        @else
            <li class="page-item disabled">
                <a href="javascript:;" class="page-link">{{ tr('Next') }}</a>
            </li>
        @endif
    </ul>
@endif
