@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled page-item">
                <a class="page-link" href="javascript:void(0)" aria-label="Previous">
                    <span aria-hidden="true">«</span>
                </a>
            </li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled page-item"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active page-item">
                            <a class="page-link" href="javascript:void(0)">{{ $page }}<span class="sr-only">(current)</span></a>
                        </li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                    <span aria-hidden="true">»</span>
                </a>
            </li>
        @else
            <li class="disabled page-item">
                <a class="page-link" href="javascript:void(0)" aria-label="Next">
                    <span aria-hidden="true">»</span>
                </a>
            </li>
        @endif
    </ul>
@endif
