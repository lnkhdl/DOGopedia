<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;
use Illuminate\Support\Collection;

class RandomDogsViewModel extends ViewModel
{
    public $dogs;

    public function __construct(array $dogsData, int $count)
    {
        $this->dogs = $this->setRandomDogs($dogsData, $count);
    }

    public function setRandomDogs(array $dogsData, int $count): Collection
    {
        // Select only those that have dogs data and are unique
        return collect($dogsData)
            ->filter(function ($value) {
                return !empty($value['breeds']);
            })
            ->unique(function ($item) {
                return $item['breeds'][0]['id'];
            })
            ->shuffle()
            ->take($count)
            ->map(function ($value) {
                return [
                    'id' => $value['breeds'][0]['id'],
                    'img_url' => $value['url'],
                    'name' => $value['breeds'][0]['name'],
                    'weight' => (isset($value['breeds'][0]['weight']['metric']) ? ($value['breeds'][0]['weight']['metric'] != '' ? str_replace(' ', '',  $value['breeds'][0]['weight']['metric']) : '-') : '-'),
                    'height' => (isset($value['breeds'][0]['height']['metric']) ? ($value['breeds'][0]['height']['metric'] != '' ? str_replace(' ', '', $value['breeds'][0]['height']['metric']) : '-') : '-')
                ];
            });
    }
}
