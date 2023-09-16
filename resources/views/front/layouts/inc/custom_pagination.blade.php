<!--Start pagination -->
<div class="pagination-area pb-45 text-center">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="single-wrap d-flex justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-start">

                            <!-- Previous Page Link -->
                            @if ($paginator->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link"><span class="flaticon-arrow roted"></span></span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                                        <span class="flaticon-arrow roted" aria-hidden="true"></span>
                                    </a>
                                </li>
                            @endif

                            <!-- Pagination Elements -->
                            @foreach ($elements as $element)
                                @if (is_string($element))
                                    <li class="page-item disabled">
                                        <span class="page-link">{{ $element }}</span>
                                    </li>
                                @endif

                                @if (is_array($element))
                                    @foreach ($element as $page => $url)
                                        @if ($page == $paginator->currentPage())
                                            <li class="page-item active">
                                                <span class="page-link">{{ $page }}</span>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach

                            <!-- Next Page Link -->
                            @if ($paginator->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                                        <span class="flaticon-arrow right-arrow" aria-hidden="true"></span>
                                    </a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link"><span class="flaticon-arrow right-arrow"></span></span>
                                </li>
                            @endif

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End pagination -->
