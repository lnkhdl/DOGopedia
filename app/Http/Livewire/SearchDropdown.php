<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SearchDropdown extends Component
{
    public $search = '';

    public function render()
    {
        $searchResults = [];

        if (strlen($this->search) >= 2) {
            $searchResults = Http::withToken(config('services.dogs.apiToken'))
            ->get(config('services.dogs.apiUrl') . 'breeds/search?q=' . $this->search)
            ->throw()
            ->json();
        }

        return view('livewire.search-dropdown', [
            'searchResults' => $searchResults
        ]);
    }
}
