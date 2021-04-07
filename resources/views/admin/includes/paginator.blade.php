@if (isset($paginator) && $paginator->hasPages())
    <!--PAGINATOR -->
    <div id="paginator">
        <nav class="nav-pagination" aria-label="Paginação">
            <ul class="pagination">
                {{-- Previous Page Link --}}

				@if ($paginator->onFirstPage())
                    <li class="page-item disabled">
                        <a class="page-link prev" href="#" rel="Página Anterior"><i></i><span>Anterior</span></a>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link prev" href="{{ $paginator->previousPageUrl() }}" rel="Página Anterior"><i></i><span>Anterior</span></a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
			        	@foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="ls-disabled"><a href="#">{{ $element }}</a></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
				@if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link next" href="{{ $paginator->nextPageUrl() }}" rel="Próxima Página"><span>Próximo</span><i></i></a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <a class="page-link next" href="#" rel="Próxima Página"><span>Próximo</span><i></i></a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
@endif
