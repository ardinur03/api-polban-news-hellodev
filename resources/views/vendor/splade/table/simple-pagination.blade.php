<nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between px-4 sm:px-0 py-3">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <span
            class="relative inline-flex items-center px-4 py-2 text-xs sm:text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
            {!! __('pagination.previous') !!}
        </span>
    @else
        @php
            $url_prev = env('APP_ENV') === 'production' ? str_replace('http://', 'https://', $paginator->previousPageUrl()) : $paginator->previousPageUrl();
        @endphp
        <Link keep-modal dusk="pagination-simple-previous" href="{{ $url_prev }}" rel="prev"
            class="relative inline-flex items-center px-4 py-2 text-xs sm:text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
        {!! __('pagination.previous') !!}
        </Link>
    @endif

    @includeWhen($hasPerPageOptions ?? true, 'splade::table.per-page-selector')

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        @php
            $url_next = env('APP_ENV') === 'production' ? str_replace('http://', 'https://', $paginator->nextPageUrl()) : $paginator->nextPageUrl();
        @endphp
        <Link keep-modal dusk="pagination-simple-next" href="{{ $$url_next }}" rel="next"
            class="relative inline-flex items-center px-4 py-2 text-xs sm:text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
        {!! __('pagination.next') !!}
        </Link>
    @else
        <span
            class="relative inline-flex items-center px-4 py-2 text-xs sm:text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
            {!! __('pagination.next') !!}
        </span>
    @endif
</nav>
