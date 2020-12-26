<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;
use Illuminate\Support\Collection;

class DogsViewModel extends ViewModel
{
    public $dogs;

    public function __construct(array $dogsData)
    {
        $this->dogs = $this->setDogs($dogsData);
    }

    private function setDogs(array $dogsData): Collection
    {
        return collect($dogsData)->map(function ($value) {
            return [
                'id' => $value['id'],
                'name' => $value['name'],
                'weight' => (isset($value['weight']['metric']) ? ($value['weight']['metric'] != '' ? str_replace(' ', '', $value['weight']['metric']) : '-') : '-'),
                'height' => (isset($value['height']['metric']) ? ($value['height']['metric'] != '' ? str_replace(' ', '', $value['height']['metric']) : '-') : '-')
            ];
        });
    }
}
