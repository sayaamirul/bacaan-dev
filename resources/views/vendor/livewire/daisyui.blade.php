<div class="join">
    @if ($paginator->hasPages())
        <div class="flex flex-1 justify-between sm:hidden">
            @if ($paginator->onFirstPage())
                <button class="btn btn-disabled join-item">{!! __('pagination.previous') !!}</button>
            @else
                <button class="btn join-item"
                    dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before"
                    type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')"
                    wire:loading.attr="disabled">
                    {!! __('pagination.previous') !!}
                </button>
            @endif

            @if ($paginator->hasMorePages())
                <button class="btn join-item"
                    dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before"
                    type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')"
                    wire:loading.attr="disabled">
                    {!! __('pagination.next') !!}
                </button>
            @else
                <button class="btn btn-disabled join-item">{!! __('pagination.next') !!}</button>
            @endif
        </div>
        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
            @if ($paginator->onFirstPage())
                <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                    <button aria-hidden="true" class="btn btn-disabled join-item">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path clip-rule="evenodd"
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                fill-rule="evenodd" />
                        </svg>
                    </button>
                </span>
            @else
                <button aria-label="{{ __('pagination.previous') }}" class="btn join-item"
                    dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after"
                    rel="prev" type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                        <path clip-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            fill-rule="evenodd" />
                    </svg>
                </button>
            @endif

            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span aria-disabled="true">
                        <button class="btn btn-disabled join-item">{{ $element }}</button>
                    </span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <span wire:key="paginator-{{ $paginator->getPageName() }}-page{{ $page }}">
                            @if ($page == $paginator->currentPage())
                                <button aria-label="{{ __('Go to page :page', ['page' => $page]) }}"
                                    class="btn join-item btn-active" type="button">
                                    {{ $page }}
                                </button>
                            @else
                                <button aria-label="{{ __('Go to page :page', ['page' => $page]) }}"
                                    class="btn join-item" type="button"
                                    wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')">
                                    {{ $page }}
                                </button>
                            @endif
                        </span>
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <button aria-label="{{ __('pagination.next') }}" class="btn join-item"
                    dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after"
                    rel="next" type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                        <path clip-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            fill-rule="evenodd" />
                    </svg>
                </button>
            @else
                <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                    <button aria-hidden="true" class="btn btn-disabled join-item">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path clip-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                fill-rule="evenodd" />
                        </svg>
                    </button>
                </span>
            @endif
        </div>

    @endif
</div>
