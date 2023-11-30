@if ($paginator->hasPages())
    <div class="clearfix">
        <div class="hint-text">Showing <b>{{$paginator->count()}}</b> out of <b>{{$paginator->total()}}</b> entries</div>
        <ul class="pagination">
            @if ($paginator->onFirstPage())
                <li class="disabled"><a href="" class="page-link">Previous</a></li>
            @else
                <li class="page-item"><a href="{{$paginator->previousPageUrl()}}" class="page-link">Previous</a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="disabled"><span>{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active"><a class="page-link">{{ $page }}</a></li>
                        @else
                            <li class="page-item"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            
            @if ($paginator->hasMorePages())
                <li class="page-item"><a href="{{$paginator->nextPageUrl()}}" class="page-link">Next</a></li>
            @else
                <li class="disabled"><a href="" class="page-link">Next</a></li>
            @endif
        </ul>
    </div>
@endif