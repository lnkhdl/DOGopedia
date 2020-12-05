<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class IndexPageTest extends TestCase
{
  /** @test */
  public function index_page_shows_correct_info()
  {
    Http::fake([
      config('services.dogs.apiUrl') . 'images/search?limit=50&size=small' => $this->fakeDogsData()
    ]);

    $response = $this->get('/');
    $response->assertStatus(200);

    $response->assertSee('Fake Dog 01');
    $response->assertSee('http://localhost/dogs/260');
    $response->assertSee('https://cdn2.thedogapi.com/images/Bkam2l9Vm_390x256.jpg');
    $response->assertSee('20-32 kg');
    $response->assertSee('51-61 cm');

    $response->assertSee('Fake Dog 02');
    $response->assertSee('http://localhost/dogs/9');
    $response->assertSee('https://cdn2.thedogapi.com/images/A3mLu3WQ2.jpg');
    $response->assertSee('29-45 kg');
    $response->assertSee('58-64 cm');

    $response->assertSee('Fake Dog 03');
    $response->assertSee('http://localhost/dogs/1');
    $response->assertSee('https://cdn2.thedogapi.com/images/lGy5M4Ps2.jpg');
    $response->assertSee('3-6 kg');
    $response->assertSee('23-29 cm');

    $response->assertSee('Fake Dog 04');
    $response->assertSee('http://localhost/dogs/50');
    $response->assertSee('https://cdn2.thedogapi.com/images/4UKTN_dQ5.jpg');
    $response->assertSee('14-20 kg');
    $response->assertSee('46-56 cm');

    $response->assertSee('Fake Dog 05');
    $response->assertSee('http://localhost/dogs/61');
    $response->assertSee('https://cdn2.thedogapi.com/images/VSraIEQGd.jpg');
    $response->assertSee('23-32 kg');
    $response->assertSee('53-56 cm');

    $response->assertSee('Fake Dog 06');
    $response->assertSee('http://localhost/dogs/222');
    $response->assertSee('https://cdn2.thedogapi.com/images/XuF0yCht6.jpg');
    $response->assertSee('8-10 kg');
    $response->assertSee('34-42 cm');
  }

  private function fakeDogsData()
  {
    return Http::response([
      0 => [
        "breeds" => [],
        "id" => "ByBOFuhBX",
        "url" => "https://cdn2.thedogapi.com/images/ByBOFuhBX_390x256.jpg",
        "width" => 608,
        "height" => 912,
      ],
      1 => [
        "breeds" => [
          0 => [
            "weight" => [
              "imperial" => "45 - 70",
              "metric" => "20 - 32",
            ],
            "height" => [
              "imperial" => "20 - 24",
              "metric" => "51 - 61",
            ],
            "id" => 260,
            "name" => "Fake Dog 01",
            "bred_for" => "Gundog, 'swamp-tromping', Flushing, pointing, and retrieving water fowl & game birds",
            "breed_group" => "Sporting",
            "life_span" => "12 - 14 years",
            "temperament" => "Loyal, Gentle, Vigilant, Trainable, Proud",
          ],
        ],
        "id" => "Bkam2l9Vm",
        "url" => "https://cdn2.thedogapi.com/images/Bkam2l9Vm_390x256.jpg",
        "width" => 2328,
        "height" => 1604,
      ],
      2 => [
        "breeds" => [
          0 => [
            "weight" => [
              "imperial" => "65 - 100",
              "metric" => "29 - 45",
            ],
            "height" => [
              "imperial" => "23 - 25",
              "metric" => "58 - 64",
            ],
            "id" => 9,
            "name" => "Fake Dog 02",
            "bred_for" => "Hauling heavy freight, Sled pulling",
            "breed_group" => "Working",
            "life_span" => "12 - 15 years",
            "temperament" => "Friendly, Affectionate, Devoted, Loyal, Dignified, Playful",
          ],
        ],
        "id" => "A3mLu3WQ2",
        "url" => "https://cdn2.thedogapi.com/images/A3mLu3WQ2.jpg",
        "width" => 780,
        "height" => 522,
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
            "name" => "Fake Dog 03",
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
      ],
      4 => [
        "breeds" => [],
        "id" => "CAy4xLsx6",
        "url" => "https://cdn2.thedogapi.com/images/CAy4xLsx6.jpg",
        "width" => 960,
        "height" => 696,
      ],
      5 => [
        "breeds" => [],
        "id" => "H0vcCJKJj",
        "url" => "https://cdn2.thedogapi.com/images/H0vcCJKJj.jpg",
        "width" => 3024,
        "height" => 4032,
      ],
      6 => [
        "breeds" => [
          0 => [
            "weight" => [
              "imperial" => "30 - 45",
              "metric" => "14 - 20",
            ],
            "height" => [
              "imperial" => "18 - 22",
              "metric" => "46 - 56",
            ],
            "id" => 50,
            "name" => "Fake Dog 04",
            "bred_for" => "Sheep herder",
            "breed_group" => "Herding",
            "life_span" => "12 - 16 years",
            "temperament" => "Tenacious, Keen, Energetic, Responsive, Alert, Intelligent",
          ],
        ],
        "id" => "4UKTN_dQ5",
        "url" => "https://cdn2.thedogapi.com/images/4UKTN_dQ5.jpg",
        "width" => 1080,
        "height" => 1080,
      ],
      7 => [
        "breeds" => [
          0 => [
            "weight" => [
              "imperial" => "50 - 70",
              "metric" => "23 - 32",
            ],
            "height" => [
              "imperial" => "21 - 22",
              "metric" => "53 - 56",
            ],
            "id" => 61,
            "name" => "Fake Dog 05",
            "bred_for" => "Bull baiting, Fighting",
            "breed_group" => "Terrier",
            "life_span" => "10 - 12 years",
            "temperament" => "Trainable, Protective, Sweet-Tempered, Keen, Active",
          ],
        ],
        "id" => "VSraIEQGd",
        "url" => "https://cdn2.thedogapi.com/images/VSraIEQGd.jpg",
        "width" => 1080,
        "height" => 1080,
      ],
      8 => [
        "breeds" => [
          0 => [
            "weight" => [
              "imperial" => "17 - 23",
              "metric" => "8 - 10",
            ],
            "height" => [
              "imperial" => "13.5 - 16.5",
              "metric" => "34 - 42",
            ],
            "id" => 222,
            "name" => "Fake Dog 06",
            "bred_for" => "Hunting in the mountains of Japan, Alert Watchdog",
            "breed_group" => "Non-Sporting",
            "life_span" => "12 - 16 years",
            "temperament" => "Charming, Fearless, Keen, Alert, Confident, Faithful",
          ],
        ],
        "id" => "XuF0yCht6",
        "url" => "https://cdn2.thedogapi.com/images/XuF0yCht6.jpg",
        "width" => 1080,
        "height" => 1080,
      ],
      9 => [
        "breeds" => [
          0 => [
            "weight" => [
              "imperial" => "17 - 23",
              "metric" => "8 - 10",
            ],
            "height" => [
              "imperial" => "13.5 - 16.5",
              "metric" => "34 - 42",
            ],
            "id" => 222,
            "name" => "Fake Dog 06",
            "bred_for" => "Hunting in the mountains of Japan, Alert Watchdog",
            "breed_group" => "Non-Sporting",
            "life_span" => "12 - 16 years",
            "temperament" => "Charming, Fearless, Keen, Alert, Confident, Faithful",
          ],
        ],
        "id" => "xJJyuYXJS",
        "url" => "https://cdn2.thedogapi.com/images/xJJyuYXJS.jpg",
        "width" => 1080,
        "height" => 1123,
      ]
    ], 200);
  }
}
