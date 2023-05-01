{{-- @if ($paginator->hasPages()) --}}
<ul class="pagination">
    @if ($paginator->onFirstPage())
    @else
    <li class="page-item previous">
        <a href="javascript:;" halaman="{{ $paginator->previousPageUrl() }}" class="page-link paginasi">
            <i class="previous"></i>
        </a>
    </li>
    @endif
    @foreach ($elements as $element)
        @if (is_string($element))
        <li class="page-item ">
            <a href="javascript:;" class="page-link disabled">...</a>
        </li>
        @endif
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="page-item active">
                        <a href="javascript:;" class="page-link">{{ $page }}</a>
                    </li>
                @else
                <li class="page-item ">
                    <a halaman="{{ $url }}" href="javascript:;" class="page-link paginasi">{{ $page }}</a>
                </li>
                @endif
            @endforeach
        @endif
    @endforeach
    @if ($paginator->hasMorePages())
    <li class="page-item next">
        <a halaman="{{ $paginator->nextPageUrl() }}" href="javascript:;"  class="page-link paginasi">
            <i class="next"></i>
        </a>
    </li>
    @endif
</ul>
{{-- @endif --}}