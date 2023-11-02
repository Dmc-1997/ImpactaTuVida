<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
            <div class="d-flex justify-between flex-1 sm:hidden">
                <div class="col-lg-6 d-flex align-items-center">
                    <strong>
                        Pagina  &nbsp;  &nbsp;
                    </strong>
                    <input 
                        type="text" readonly 
                        value="{{ $paginator->currentPage() }}"
                        class="form-control" style="width: 25%;">
                    <strong>
                        &nbsp;  &nbsp; De {{ $paginator->lastPage() }}
                    </strong>
                </div>
                <div class="col-lg-6" align="right">
                    
                    <div class="mt-3 personalization_container-bottom__TV6ha">
                        <div class="col-6 text-center">
                            @if ($paginator->onFirstPage())
                                <div class="users_container-styles-nextPage__i4A73">
                                    <span class="btn-style btn-terciary">
                                        Página Anterior
                                    </span>
                                </div>
                            @else
                                <div class="users_container-styles-nextPage__i4A73">
                                    <button 
                                        wire:click="previousPage" 
                                        wire:loading.attr="disabled" 
                                        dusk="previousPage.before"
                                        type="button"
                                        class="btn-style btn-terciary">
                                        Página Anterior
                                    </button>
                                </div>
                            @endif
                        </div>
                        <div class="col-6 text-center">
                            @if ($paginator->hasMorePages())
                                <div class="users_container-styles-nextPage__i4A73">
                                    <button 
                                        wire:click="nextPage" 
                                        wire:loading.attr="disabled" 
                                        dusk="nextPage.before"
                                        type="button" 
                                        class="btn-style btn-terciary">Página Siguiente</button>
                                    {{-- <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHoAAABtCAYAAABuinXHAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAnlJREFUeNrs3cFN40AYQOEJFaQEbwfhxm1DB3DgTFIBuxVsOgAqCJw5QAeEG8d0kJSQEvitjbQIgcDriZ3hvSdZFiIc8JcZMjaJUzIzMzMzMzMzMzMzMyuggYcgpbvnH1Xsqu2Xm7Oj1VLo7wU8jt2f2MZvvrWO7TbAZ0KXjzyJ3fyThy1iOw3wjdBlIp/E7v6LD6+n8ePSsQ+gA3re4LGj2B7jyTEUurzR3BSteGziiB61+LlisalTd6JhCw3BJkIvidjU5dUq/TsT1vZJU8TSizp1T2nTOBI6RuCChk0/1z1JzU6eFDuN469eUbC9TAnBFhqCLTQEW2gIttAQbKEh2EJDsIWGYAsNwRYagi00BFtoCLbQEGyhIdhCQ7CFhmALDcEWGoI9yPzL1v8oNwR7n8c22UfsQcZnc/2G8sqxnbVs2IMMyPOMz2LbEfZBS+SZyDuv/nN42duI3n7Ay0qHzjrevvGg8xF94rHv/IVeL1P3T499p1V9QQ899uXUBnrj4WNAP3n4Ol9m9QJ946jutOteoLcL+N8e/066iuO97mUd/Wo9/SvHgt4+njkDufWb9nOd6x7H7sK19X4iZ4N+g14l7sWNemYb7RvyTqCpZb64kxVZaAiy0BBkoSHIQkOQhYYgCw1BFhqCLDQEWWgIstAQZKEhyEJDkIWGIAsNQRYagiw0BFloCLLQEGQ8NAUZDU1CxkI3vCN88ch13hEegIyE/s87wheNTB3RIxoyeepGIQsNQaZCL2jI5OVV0zvCF41MnrqnJGQs9Ks7wm8IyOgXYwF4E7vD9P5nsTykv5/UN01mZmZmZmZmZmZmZmZmZmb2YS8CDAB0z3mCD2hKlwAAAABJRU5ErkJggg==" alt="" class="me-3 users_icon-arrow__ITTP2"> --}}
                                </div>
                            @else
                                <div class="users_container-styles-nextPage__i4A73">
                                    <span class="btn-style btn-terciary">
                                            Página Siguiente
                                    </span>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
                
                

                {{-- <span>
                    @if ($paginator->onFirstPage())
                        <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                            {!! __('pagination.previous') !!}
                        </span>
                    @else
                        <button wire:click="previousPage" wire:loading.attr="disabled" dusk="previousPage.before" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                            {!! __('pagination.previous') !!}
                        </button>
                    @endif
                </span>

                <span>
                    @if ($paginator->hasMorePages())
                        <button wire:click="nextPage" wire:loading.attr="disabled" dusk="nextPage.before" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                            {!! __('pagination.next') !!}
                        </button>
                    @else
                        <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                            {!! __('pagination.next') !!}
                        </span>
                    @endif
                </span> --}}
            </div>

            {{-- <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-gray-700 leading-5">
                        <span>{!! __('Showing') !!}</span>
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        <span>{!! __('to') !!}</span>
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                        <span>{!! __('of') !!}</span>
                        <span class="font-medium">{{ $paginator->total() }}</span>
                        <span>{!! __('results') !!}</span>
                    </p>
                </div>

                <div>
                    <span class="relative z-0 inline-flex rounded-md shadow-sm">
                        <span> --}}
                            {{-- Previous Page Link --}}
                            {{-- @if ($paginator->onFirstPage())
                                <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                                    <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-l-md leading-5" aria-hidden="true">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </span>
                            @else
                                <button wire:click="previousPage" dusk="previousPage.after" rel="prev" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" aria-label="{{ __('pagination.previous') }}">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            @endif
                        </span> --}}

                        {{-- Pagination Elements --}}
                        {{-- @foreach ($elements as $element) --}}
                            {{-- "Three Dots" Separator --}}
                            {{-- @if (is_string($element))
                                <span aria-disabled="true">
                                    <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5">{{ $element }}</span>
                                </span>
                            @endif --}}

                            {{-- Array Of Links --}}
                            {{-- @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    <span wire:key="paginator-page{{ $page }}">
                                        @if ($page == $paginator->currentPage())
                                            <span aria-current="page">
                                                <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5">{{ $page }}</span>
                                            </span>
                                        @else
                                            <button wire:click="gotoPage({{ $page }})" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                                {{ $page }}
                                            </button>
                                        @endif
                                    </span>
                                @endforeach
                            @endif
                        @endforeach

                        <span> --}}
                            {{-- Next Page Link --}}
                            {{-- @if ($paginator->hasMorePages())
                                <button wire:click="nextPage" dusk="nextPage.after" rel="next" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" aria-label="{{ __('pagination.next') }}">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            @else
                                <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                                    <span class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-r-md leading-5" aria-hidden="true">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </span>
                            @endif
                        </span>
                    </span>
                </div>
            </div> --}}
        </nav>
    @endif
</div>
