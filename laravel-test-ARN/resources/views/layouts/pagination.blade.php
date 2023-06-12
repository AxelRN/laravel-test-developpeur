@if($paginator->hasPages())
<div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
            <div>
                <p class="small text-muted">
                    Showing
                    <span class="fw-semibold">{{ ($paginator->perPage() * $paginator->currentPage()) - $paginator->perPage() +  1 }}</span>
                    to
                    <span class="fw-semibold">{{ $paginator->perPage() * $paginator->currentPage() }}</span>
                    of
                    <span class="fw-semibold">{{ $paginator->total() }} </span>
                    results
                </p>
            </div>

            <div>
            <ul class="pagination">
                
                @if($paginator->onfirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
                        <span class="page-link" aria-hidden="true">‹</span>
                    </li>
                @else
                    <li class="page-item" aria-label="« Previous">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}"><</a>
                    </li>
                @endif
                    
                @foreach($elements as $element)
                    @if(is_string($element))
                        <li class="page-item"><span class="page-link">{{$element}}</span></li>
                    @endif
                    @if(is_array($element))
                        @foreach($element as $page => $url)
                            @if($page == $paginator->currentPage())
                                <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                @if($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Next »">›</a>
                    </li>
                @else
                    <li class="page-item">
                        <span class="page-link" rel="next" aria-label="Next »">›</span>
                    </li>
                @endif

            </ul>
    </div>
</div>
@endif