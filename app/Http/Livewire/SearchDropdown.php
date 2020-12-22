<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SearchDropdown extends Component
{
    public $search = '';

    public function render()
    {
        $results = [];

        if (strlen($this->search) >= 2) {
            $dogsData = Http::withToken(config('services.dogs.apiToken'))
            ->get(config('services.dogs.apiUrl') . 'breeds')
            ->throw()
            ->json();

            foreach ($dogsData as $dog) {
                if (str_contains(strtolower($dog['name']), strtolower($this->search)) === true) {
                    $result = [
                        'id' => $dog['id'], 
                        'name' => $dog['name']
                    ];

                    array_push($results, $result);
                }
            }
        }

        return view('livewire.search-dropdown', [
            'results' => $results
        ]);
    }
}
