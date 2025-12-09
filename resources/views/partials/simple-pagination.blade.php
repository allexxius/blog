@if ($paginator->hasPages())
    <nav class="flex space-x-2">
        @if ($paginator->onFirstPage())
            <button class="btn btn-outline btn-sm" disabled>
                @lang('pagination.previous')
            </button>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-outline btn-sm" rel="prev">
                @lang('pagination.previous')
            </a>
        @endif

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-outline btn-sm" rel="next">
                @lang('pagination.next')
            </a>
        @else
            <button class="btn btn-outline btn-sm" disabled>
                @lang('pagination.next')
            </button>
        @endif
    </nav>
@endif
