<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;
use Livewire\Livewire;

class SearchDropdownTest extends TestCase
{
    /** @test */
    public function search_dropdown_works_correctly()
    {
        Http::fake([
            config('services.dogs.apiUrl') . 'breeds/search?q=*' => $this->fakeDogsData()
        ]);

        Livewire::test('search-dropdown')
            ->assertDontSee('Fake Dog 01')
            ->assertDontSee('Fake Dog 02')
            ->set('search', 'Fake Dog 0')
            ->assertSee('Fake Dog 01')
            ->assertSee('Fake Dog 02');
    }

    /** @test */
    public function search_dropdown_shows_no_results()
    {
        Http::fake([
            config('services.dogs.apiUrl') . 'breeds/search?q=*' => []
        ]);

        Livewire::test('search-dropdown')
            ->assertDontSee('No result for')
            ->set('search', 'Incorrect Text')
            ->assertSee('No result for: Incorrect Text');
    }

    private function fakeDogsData()
    {
        return Http::response([
            0 => [
                "weight" => [
                    "imperial" => "6 - 13",
                    "metric" => "3 - 6",
                ],
                "height" => [
                    "imperial" => "9 - 11.5",
                    "metric" => "23 - 29",
                ],
                "id" => 1,
                "name" => "Fake Dog 01",
                "bred_for" => "Small rodent hunting, lapdog",
                "breed_group" => "Toy",
                "life_span" => "10 - 12 years",
                "temperament" => "Stubborn, Curious, Playful, Adventurous, Active, Fun-loving",
                "origin" => "Germany, France",
            ],
            1 => [
                "weight" => [
                    "imperial" => "50 - 60",
                    "metric" => "23 - 27",
                ],
                "height" => [
                    "imperial" => "25 - 27",
                    "metric" => "64 - 69",
                ],
                "id" => 10,
                "name" => "Fake Dog 02",
                "country_code" => "AG",
                "bred_for" => "Coursing and hunting",
                "breed_group" => "Hound",
                "life_span" => "10 - 13 years",
                "temperament" => "Aloof, Clownish, Dignified, Independent, Happy",
                "origin" => "Afghanistan, Iran, Pakistan",
            ]
        ], 200);
    }
}
