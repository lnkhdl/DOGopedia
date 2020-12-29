<div
    class="relative w-full my-4 md:w-1/2"
    x-data="{ isOpen: true }"
    @click="isOpen = true"
    @click.away="isOpen = false"
>

    <input
        wire:model.debounce.500ms="search" 
        type="text" 
        class="w-full h-10 py-1 pl-8 pr-4 text-gray-900 placeholder-gray-600 bg-gray-100 border border-gray-900 rounded-lg focus:outline-none focus:placeholder-gray-400" 
        placeholder="Search by Breed"
        x-ref="search"
        @keydown.window="
            // if slash is pressed, focus on the search input
            if (event.KeyCode === 191 || event.keyCode === 219 || event.keyCode === 111) {
                event.preventDefault();
                $refs.search.focus();
            }
        "
        @focus="isOpen = true"
        @keydown="isOpen = true"
        @keydown.escape.window="isOpen = false"
        @keydown.shift.tab="isOpen = false"
    >

    
    {{-- Search Icon --}}
    <div class="absolute top-0">
        <svg class="w-4 mx-2 mt-3 text-gray-900 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.9 14.32a8 8 0 111.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 108 2a6 6 0 000 12z"/></svg>
    </div>


    {{-- Loading Icon --}}
     <svg
        wire:loading
        class="absolute top-0 right-0 w-5 h-5 mx-2 mt-2 text-gray-900 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
    >
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
    </svg>
     

    {{-- Dropdown Menu --}}
    @if (strlen($search) >= 2)
        <div
            x-show.transition.duration.200ms="isOpen"
            class="absolute z-50 w-full mt-2 text-sm"
        >
            @if(empty($results))
                <div class="p-3 text-black bg-gray-100 border border-gray-400 rounded-lg">No result for: {{ $search }}</div>
            @else
                <ul>
                    @foreach ($results as $dog)
                        <li class="bg-gray-100 hover:bg-gray-200 text-black border border-gray-400 border-t-0 @if ($loop->first && $loop->remaining == 0) border-t rounded-t-lg rounded-b-lg @elseif ($loop->first) border-t rounded-t-lg @elseif ($loop->last) rounded-b-lg @endif">
                            <a href="{{ route('dogs.show', $dog['id']) }}" class="block p-3">{{ $dog['name'] }}</a>
                        </li> 
                    @endforeach
                </ul>
            @endif
        </div>
    @endif

</div>