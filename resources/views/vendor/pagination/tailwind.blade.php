@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Paginación" class="w-full">
        {{-- Móvil --}}
        <div class="flex gap-2 items-center justify-between sm:hidden">
            @if ($paginator->onFirstPage())
                <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-600 bg-[#111111] border border-[#2A2A2A] cursor-not-allowed leading-5 rounded-sm">
                    Anterior
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-300 bg-[#111111] border border-[#2A2A2A] leading-5 rounded-sm hover:border-[#C9A84C] hover:text-[#C9A84C] transition">
                    Anterior
                </a>
            @endif
            <span class="text-xs text-gray-500">{{ $paginator->currentPage() }} / {{ $paginator->lastPage() }}</span>
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-300 bg-[#111111] border border-[#2A2A2A] leading-5 rounded-sm hover:border-[#C9A84C] hover:text-[#C9A84C] transition">
                    Siguiente
                </a>
            @else
                <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-600 bg-[#111111] border border-[#2A2A2A] cursor-not-allowed leading-5 rounded-sm">
                    Siguiente
                </span>
            @endif
        </div>

        {{-- Desktop --}}
        <div class="hidden sm:flex sm:items-center sm:justify-center">
            <span class="inline-flex rounded-sm overflow-hidden border border-[#2A2A2A]">
                @if ($paginator->onFirstPage())
                    <span aria-disabled="true" class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-600 bg-[#111111] cursor-not-allowed">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-400 bg-[#111111] hover:bg-[#1A1A1A] hover:text-[#C9A84C] transition">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                    </a>
                @endif

                @foreach ($elements as $element)
                    @if (is_string($element))
                        <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-600 bg-[#111111] border-l border-[#2A2A2A]">{{ $element }}</span>
                    @endif
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span aria-current="page" class="inline-flex items-center px-4 py-2 text-sm font-medium text-black bg-[#C9A84C] border-l border-[#C9A84C]">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-400 bg-[#111111] border-l border-[#2A2A2A] hover:bg-[#1A1A1A] hover:text-[#C9A84C] transition">{{ $page }}</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-400 bg-[#111111] border-l border-[#2A2A2A] hover:bg-[#1A1A1A] hover:text-[#C9A84C] transition">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" /></svg>
                    </a>
                @else
                    <span class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-600 bg-[#111111] border-l border-[#2A2A2A] cursor-not-allowed">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" /></svg>
                    </span>
                @endif
            </span>
        </div>
    </nav>
@endif
