<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class SingleDogPageTest extends TestCase
{
    /** @test */
    public function single_dog_page_shows_correct_info()
    {
        Http::fake([
            config('services.dogs.apiUrl') . 'images/search?limit=100&breed_id=*' => $this->fakeDogData()
        ]);

        $response = $this->get('/dogs/1');
        $response->assertStatus(200);

        $response->assertSee('Fake Dog 01');
        $response->assertSee('https://cdn2.thedogapi.com/images/BJa4kxc4X_1280.jpg');
        $response->assertSee('Toy');
        $response->assertSee('3-6 kg');
        $response->assertSee('23-29 cm');
        $response->assertSee('10-12 years');
        $response->assertSee('Characteristics');
        $response->assertSee('Small rodent hunting, lapdog');
        $response->assertSee('Temperament');
        $response->assertSee('Stubborn, Curious, Playful, Adventurous, Active, Fun-loving');

        $response->assertSee('Images');
        $response->assertSee('https://cdn2.thedogapi.com/images/Dkqdl0c6N.jpg');
        $response->assertSee('https://cdn2.thedogapi.com/images/mhikcBw9U.jpg');
        $response->assertSee('https://cdn2.thedogapi.com/images/lGy5M4Ps2.jpg');
    }

    /** @test */
    public function single_dog_page_shows_correct_info_with_received_empty_data()
    {
        Http::fake([
            config('services.dogs.apiUrl') . 'images/search?limit=100&breed_id=*' => $this->fakeDogEmptyData()
        ]);

        $response = $this->get('/dogs/1');
        $response->assertStatus(200);

        $response->assertSee('Fake Dog 01');
        $response->assertSee('https://cdn2.thedogapi.com/images/BJa4kxc4X_1280.jpg');
        $response->assertSee('-');
        $response->assertSee('- kg');
        $response->assertSee('- cm');
        $response->assertSee('- years');
        $response->assertSee('Characteristics');
        $response->assertSee('Temperament');

        $response->assertDontSee('Images');
    }

    /** @test */
    public function single_dog_page_shows_correct_info_with_some_data_not_received()
    {
        Http::fake([
            config('services.dogs.apiUrl') . 'images/search?limit=100&breed_id=*' => $this->fakeDogMissingData()
        ]);

        $response = $this->get('/dogs/1');
        $response->assertStatus(200);

        $response->assertSee('Fake Dog 01');
        $response->assertSee('https://cdn2.thedogapi.com/images/BJa4kxc4X_1280.jpg');
        $response->assertSee('-');
        $response->assertSee('- kg');
        $response->assertSee('- cm');
        $response->assertSee('- years');
        $response->assertSee('Characteristics');
        $response->assertSee('Temperament');

        $response->assertDontSee('Images');
    }

    private function fakeDogData()
    {
        return Http::response([
            0 => [
                "breeds" => [
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
                ],
                "id" => "BJa4kxc4X",
                "url" => "https://cdn2.thedogapi.com/images/BJa4kxc4X_1280.jpg",
                "width" => 1600,
                "height" => 1199,
            ],
            1 => [
                "breeds" => [
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
                ],
                "id" => "Dkqdl0c6N",
                "url" => "https://cdn2.thedogapi.com/images/Dkqdl0c6N.jpg",
                "width" => 1200,
                "height" => 846,
            ],
            2 => [
                "breeds" => [
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
                ],
                "id" => "mhikcBw9U",
                "url" => "https://cdn2.thedogapi.com/images/mhikcBw9U.jpg",
                "width" => 1600,
                "height" => 1200,
            ],
            3 => [
                "breeds" => [
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
                ],
                "id" => "lGy5M4Ps2",
                "url" => "https://cdn2.thedogapi.com/images/lGy5M4Ps2.jpg",
                "width" => 1200,
                "height" => 1600,
            ]
        ], 200);
    }

    private function fakeDogEmptyData()
    {
        return Http::response([
            0 => [
                "breeds" => [
                    0 => [
                        "weight" => [
                            "imperial" => "",
                            "metric" => "",
                        ],
                        "height" => [
                            "imperial" => "",
                            "metric" => "",
                        ],
                        "id" => 1,
                        "name" => "Fake Dog 01",
                        "bred_for" => "",
                        "breed_group" => "",
                        "life_span" => "",
                        "temperament" => "",
                        "origin" => "",
                    ],
                ],
                "id" => "BJa4kxc4X",
                "url" => "https://cdn2.thedogapi.com/images/BJa4kxc4X_1280.jpg",
                "width" => 1600,
                "height" => 1199,
            ]
        ], 200);
    }

    private function fakeDogMissingData()
    {
        return Http::response([
            0 => [
                "breeds" => [
                    0 => [
                        "id" => 1,
                        "name" => "Fake Dog 01",
                    ],
                ],
                "id" => "BJa4kxc4X",
                "url" => "https://cdn2.thedogapi.com/images/BJa4kxc4X_1280.jpg",
                "width" => 1600,
                "height" => 1199,
            ]
        ], 200);
    }
}
