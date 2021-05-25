<style>
     ul li{
        list-style: none;
        cursor: pointer;
    }
</style>

@if ($paginator->hasPages())
        <ul style="justify-content: space-between; display:flex;">
            {{-- Previous Page --}}
            @if ($paginator->onFirstPage())
                <li class="w-16 px-2 py-1 text-center rounded border bg-secondary text-white">Prev</li>
            @else
                <li class="w-16 px-2 py-1 text-center rounded border shadow bg-light" wire:click="previousPage">Prev</li>
            @endif

            {{-- numbers --}}
            @foreach ($elements as $element)
             @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="w-16 px-3 py-1 text-center rounded border shadow bg-primary text-white" wire:click="gotoPage({{$page}})">{{$page}}</li>
                    @else
                        <li class="w-16 px-3 py-1 text-center rounded border shadow bg-light" wire:click="gotoPage({{$page}})">{{$page}}</li>
                    @endif      
                @endforeach    
             @endif
            @endforeach
            {{-- numbers  end--}}

            {{-- Next Page --}}
            @if ($paginator->hasMorePages())
                <li class="w-16 px-2 py-1 text-center rounded border shadow bg-light" wire:click="nextPage">Next</li>
            @else
                <li class="w-16 px-2 py-1 text-center rounded border bg-secondary text-white">Next</li>
            @endif
            
        </ul>
@endif