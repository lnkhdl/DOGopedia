<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DogsController extends Controller
{
    /**
     * Display random breeds.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Not every image has info about breeds, that is why more is taken and then limited to 6 in the collection
        $dogsData = Http::withToken(config('services.dogs.apiToken'))
        ->get(config('services.dogs.apiUrl') . 'images/search?limit=50&size=small')
        ->throw()
        ->json();

        $randomDogs = collect($dogsData)
        ->filter(function ($value) {
            return !empty($value['breeds']);
        })
        ->unique(function ($item) {
            return $item['breeds'][0]['id'];
        })
        ->shuffle()
        ->take(6)
        ->map(function ($value) {
            return [
                'id' => $value['breeds'][0]['id'],
                'img_url' => $value['url'], 
                'name' => $value['breeds'][0]['name'],
                'weight' => (isset( $value['breeds'][0]['weight']['metric']) ? ( $value['breeds'][0]['weight']['metric'] != '' ? str_replace(' ', '',  $value['breeds'][0]['weight']['metric']) : '-') : '-'),
                'height' => (isset($value['breeds'][0]['height']['metric']) ? ($value['breeds'][0]['height']['metric'] != '' ? str_replace(' ', '', $value['breeds'][0]['height']['metric']) : '-') : '-')
            ];
        });

        return view('index', [
            'dogs' => $randomDogs,
        ]);
    }

    /**
     * Display all breeds.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $dogsData = Http::withToken(config('services.dogs.apiToken'))
        ->get(config('services.dogs.apiUrl') . 'breeds')
        ->throw()
        ->json();

        $dogs = collect($dogsData)->map(function ($value) {
            return [
                'id' => $value['id'],
                'name' => $value['name'],
                'weight' => (isset($value['weight']['metric']) ? ($value['weight']['metric'] != '' ? str_replace(' ', '', $value['weight']['metric']) : '-') : '-'),
                'height' => (isset($value['height']['metric']) ? ($value['height']['metric'] != '' ? str_replace(' ', '', $value['height']['metric']) : '-') : '-')
            ];
        });

        return view('all', [
            'dogs' => $dogs,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dogsData = Http::withToken(config('services.dogs.apiToken'))
        ->get(config('services.dogs.apiUrl') . 'images/search?limit=100&breed_id=' . $id)
        ->throw()
        ->json();

        $dog = collect($dogsData[0]['breeds'])->map(function ($value) {
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

        $images = [];
        $images = collect($dogsData)->map(function ($value) {
            return [
                'img_url' => $value['url']
            ];
        });

        return view('show', [
            'dog' => $dog,
            'images' => $images
        ]);
    }
}
