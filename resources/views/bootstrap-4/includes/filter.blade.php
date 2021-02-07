@if (count($filtersViews))
    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-filter mr-1"></i>
            Filters {{ count($filters) ? '(' . count($filters) . ')' : '' }}
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <form id="filter-form">
                @foreach ($filtersViews as $view)
                    <div class="text-xs font-semibold uppercase text-left px-4 py-2">
                        {{ $view->getTitle() }}
                    </div>
                    <div class="px-4 mb-2">
                        @include('laravel-livewire-tables::'.config('laravel-livewire-tables.theme').'.filters.'.$view->view, ['view' => $view])
                    </div>
                @endforeach

                @if ($clearFilterButton && count($filters) > 0)
                    <div class="px-4 py-2 bg-gray-100 text-right flex justify-end">
                        <button type="button" wire:click="clearFilters" onclick="document.querySelector('#filter-form').reset()" class="btn btn-secondary">
                            <i class="fas fa-times mr-1"></i>
                            Clear filters
                        </button>
                    </div>
                @endif
            </form>
        </div>
    </div>
@endif
