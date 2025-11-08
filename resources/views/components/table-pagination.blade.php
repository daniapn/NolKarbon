@php
    use Illuminate\Pagination\LengthAwarePaginator;
    use Illuminate\Contracts\Pagination\Paginator as SimplePaginator;

    $isLengthAware = $paginator instanceof LengthAwarePaginator;
    $isSimple = $paginator instanceof SimplePaginator && ! $isLengthAware;
@endphp

@if ($isLengthAware && $paginator->hasPages())
    @php
        $current = $paginator->currentPage();
        $last = $paginator->lastPage();
        $window = 1;
        $start = max(1, $current - $window);
        $end = min($last, $current + $window);
        $pages = [];

        if ($start > 1) {
            $pages[] = 1;
            if ($start > 2) {
                $pages[] = '...';
            }
        }

        for ($page = $start; $page <= $end; $page++) {
            $pages[] = $page;
        }

        if ($end < $last) {
            if ($end < $last - 1) {
                $pages[] = '...';
            }
            $pages[] = $last;
        }
    @endphp
    <nav class="inline-flex items-center gap-4 rounded-full border border-blue-200 bg-white px-4 py-2 text-xs font-semibold text-blue-900 shadow-inner"
         role="navigation" aria-label="Pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-slate-100 text-slate-400">
                <i class="fa-solid fa-angle-left"></i>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="inline-flex h-8 w-8 items-center justify-center rounded-full border border-blue-200 text-blue-800 hover:bg-blue-50">
                <i class="fa-solid fa-angle-left"></i>
            </a>
        @endif

        {{-- Pagination Elements --}}
        <div class="flex items-center gap-2">
            @foreach ($pages as $page)
                @if ($page === '...')
                    <span class="px-2 text-slate-400">…</span>
                @else
                    @if ($page == $current)
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-blue-800 text-white">{{ $page }}</span>
                    @else
                        <a href="{{ $paginator->url($page) }}" class="inline-flex h-8 w-8 items-center justify-center rounded-full border border-blue-200 text-blue-800 hover:bg-blue-50">{{ $page }}</a>
                    @endif
                @endif
            @endforeach
        </div>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="inline-flex h-8 w-8 items-center justify-center rounded-full border border-blue-200 text-blue-800 hover:bg-blue-50">
                <i class="fa-solid fa-angle-right"></i>
            </a>
        @else
            <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-slate-100 text-slate-400">
                <i class="fa-solid fa-angle-right"></i>
            </span>
        @endif
    </nav>
@elseif ($isSimple && $paginator->hasPages())
    <nav class="inline-flex items-center gap-4 rounded-full border border-blue-200 bg-white px-4 py-2 text-xs font-semibold text-blue-900 shadow-inner"
         role="navigation" aria-label="Simple Pagination">
        @if ($paginator->onFirstPage())
            <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-slate-100 text-slate-400">
                <i class="fa-solid fa-angle-left"></i>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="inline-flex h-8 w-8 items-center justify-center rounded-full border border-blue-200 text-blue-800 hover:bg-blue-50">
                <i class="fa-solid fa-angle-left"></i>
            </a>
        @endif

        <span class="text-slate-500">
            Page {{ $paginator->currentPage() }}
        </span>

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="inline-flex h-8 w-8 items-center justify-center rounded-full border border-blue-200 text-blue-800 hover:bg-blue-50">
                <i class="fa-solid fa-angle-right"></i>
            </a>
        @else
            <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-slate-100 text-slate-400">
                <i class="fa-solid fa-angle-right"></i>
            </span>
        @endif
    </nav>
@endif
