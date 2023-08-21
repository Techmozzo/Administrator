@if ($paginator->hasPages())
    <ul class="pagination">
        @if ($paginator->onFirstPage())
            <li class="pagination__item pagination__item--prev pagination__item--disabled"><i class="fa fa-angle-left"
                    aria-hidden="true"></i><span>Back</span>
            </li>
        @else
            <li class="pagination__item pagination__item--prev "><a href="{{ $paginator->previousPageUrl() }}"><i
                        class="fa fa-angle-left" aria-hidden="true"></i><span>Back</span>
                </a>
            </li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="pagination__item pagination__item--disabled"><span>{{ $element }}</span></li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="pagination__item pagination__item--active"><span>{{ $page }}</span></li>
                    @else
                        <li class="pagination__item "><a href="{{ $url }}"><span>{{ $page }}</span>
                            </a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li class="pagination__item pagination__item--next"><a
                    href="{{ $paginator->nextPageUrl() }}"><span>Next</span><i class="fa fa-angle-right"
                        aria-hidden="true"></i>
                </a>
            </li>
        @else
            <li class="pagination__item pagination__item--next pagination__item--disabled"><i class="fa fa-angle-right"
                    aria-hidden="true"></i><span>Next</span>
            </li>
        @endif
    </ul>
@endif
