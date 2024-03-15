@if ($paginator->hasPages())
    <div class="join">
        <!-- Previous Page Link -->
        @if ($paginator->onFirstPage())
            <button class="join-item btn" disabled>«</button>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="join-item btn">«</a>
        @endif

        <!-- Current Page -->
        <button class="join-item btn">Halaman {{ $paginator->currentPage() }}</button>

        <!-- Next Page Link -->
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="join-item btn">»</a>
        @else
            <button class="join-item btn" disabled>»</button>
        @endif
    </div>
@endif