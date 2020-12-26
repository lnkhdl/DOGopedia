<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;
use Illuminate\Support\Collection;

class DogViewModel extends ViewModel
{
    public $dog;
    public $images;

    public function __construct(array $dogsData)
    {
        $this->dog = $this->setDog($dogsData);
        $this->images = $this->setImages($dogsData);
    }

    private function setDog(array $dogsData): array
    {
        return collect($dogsData[0]['breeds'])->map(function ($value) {
            return [
                'id' => $value['id'],
                'name' => $value['name'],
                'weight' => (isset($value['weight']['metric']) ? ($value['weight']['metric'] != '' ? str_replace(' ', '', $value['weight']['metric']) : '-') : '-'),
                'height' => (isset($value['height']['metric']) ? ($value['height']['metric'] != '' ? str_replace(' ', '', $value['height']['metric']) : '-') : '-'),
                'life_span' => (isset($value['life_span']) ? ($value['life_span'] != '' ? str_replace(' – ', '-', str_replace(' - ', '-', str_replace(' years', '', $value['life_span']))) : '-') : '-'),
                'bred_for' => (isset($value['bred_for']) ? ($value['bred_for'] != '' ? $value['bred_for'] : '-') : '-'),
                'breed_group' => (isset($value['breed_group']) ? ($value['breed_group'] != '' ? $value['breed_group'] : '-') : '-'),
                'temperament' => (isset($value['temperament']) ? ($value['temperament'] != '' ? $value['temperament'] : '-') : '-')
            ];
        })->all()[0]; 
    }

    private function setImages(array $dogsData): Collection
    {
        return collect($dogsData)->map(function ($value) {
            return [
                'img_url' => $value['url']
            ];
        });
    }
}
