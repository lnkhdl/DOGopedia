<div class="relative w-full my-4 md:w-1/2">
    <input wire:model.debounce.500ms="search" type="text" class="bg-gray-800 rounded-lg w-full  h-10 pl-8 pr-4 py-1 focus:outline-none focus:shadow-outline" placeholder="Search by Breed">
    
    {{-- Search Icon --}}
    <div class="absolute top-0">
        <svg class="w-4 fill-current text-gray-500 mt-3 mx-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.9 14.32a8 8 0 111.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 108 2a6 6 0 000 12z"/></svg>
    </div>

     <svg wire:loading class="animate-spin absolute top-0 right-0 mt-2 mx-2 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
    </svg>
     

    {{-- Dropdown Menu --}}
    @if (strlen($search) >= 2)
        <div class="absolute bg-gray-800 w-full text-sm mt-2 z-50">
            @if(empty($searchResults))
                <div class="border border-gray-700 p-3">No result for: {{ $search }}</div>
            @else
                <ul>
                    @foreach ($searchResults as $result)
                        <li class="border border-gray-700">
                            <a href="{{ route('dogs.show', $result['id']) }}" class="block hover:bg-gray-700 px-3 py-3">{{ $result['name'] }}</a>
                        </li> 
                    @endforeach
                </ul>
            @endif
        </div>
    @endif
</div>