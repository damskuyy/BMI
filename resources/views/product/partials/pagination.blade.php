<div class="row justify-content-center mt-4">
    <nav aria-label="Product pagination">
        <ul class="pagination">
            <li class="page-item {{ $page == 1 ? 'disabled' : '' }}">
                    <a class="page-link" href="?page={{ $page - 1 }}&tab={{ request('tab', 'home') }}#product-section">Previous</a>
            </li>
            @php
                $maxShow = 4;
                $start = max(1, min($page - 1, $totalPages - $maxShow + 1));
                $end = min($totalPages, $start + $maxShow - 1);
            @endphp
            @for($i = $start; $i <= $end; $i++)
                <li class="page-item {{ $page == $i ? 'active' : '' }}">
                        <a class="page-link" href="?page={{ $i }}&tab={{ request('tab', 'home') }}#product-section">{{ $i }}</a>
                </li>
            @endfor
            <li class="page-item {{ $page == $totalPages ? 'disabled' : '' }}">
                    <a class="page-link" href="?page={{ $page + 1 }}&tab={{ request('tab', 'home') }}#product-section">Next</a>
            </li>
        </ul>
    </nav>
</div>
