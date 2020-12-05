<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class AllDogsPageTest extends TestCase
{
    /** @test */
    public function all_breeds_page_shows_correct_info()
    {
        Http::fake([
            config('services.dogs.apiUrl') . 'breeds' => $this->fakeDogsData()
        ]);

        $response = $this->get('/all');
        $response->assertStatus(200);
        $response->assertSee('All Breeds');

        $response->assertSee('Fake Dog 01');
        $response->assertSee('http://localhost/dogs/1');
        $response->assertSee('3-6 kg');
        $response->assertSee('23-29 cm');

        $response->assertSee('Fake Dog 02');
        $response->assertSee('http://localhost/dogs/10');
        $response->assertSee('23-27 kg');
        $response->assertSee('64-69 cm');

        $response->assertSee('Fake Dog 03');
        $response->assertSee('http://localhost/dogs/15');
        $response->assertSee('20-30 kg');
        $response->assertSee('76 cm');

        $response->assertSee('Fake Dog 04');
        $response->assertSee('http://localhost/dogs/30');
        $response->assertSee('18-29 kg');
        $response->assertSee('53-58 cm');

        $response->assertSee('Fake Dog 05');
        $response->assertSee('http://localhost/dogs/55');
        $response->assertSee('41-54 kg');
        $response->assertSee('71-86 cm');

        $response->assertSee('Fake Dog 06');
        $response->assertSee('http://localhost/dogs/99');
        $response->assertSee('29-52 kg');
        $response->assertSee('61-71 cm');

        $response->assertSee('Fake Dog 07');
        $response->assertSee('http://localhost/dogs/100');
        $response->assertSee('25-41 kg');
        $response->assertSee('46-61 cm');

        $response->assertSee('Fake Dog 08');
        $response->assertSee('http://localhost/dogs/199');
        $response->assertSee('17-23 kg');
        $response->assertSee('58-66 cm');

        $response->assertSee('Fake Dog 09');
        $response->assertSee('http://localhost/dogs/1000');
        $response->assertSee('29-45 kg');
        $response->assertSee('58-64 cm');

        $response->assertSee('Fake Dog 10');
        $response->assertSee('http://localhost/dogs/1001');
        $response->assertSee('27-54 kg');
        $response->assertSee('56-69 cm');
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
            ],
            2 => [
                "weight" => [
                    "imperial" => "44 - 66",
                    "metric" => "20 - 30",
                ],
                "height" => [
                    "imperial" => "30",
                    "metric" => "76",
                ],
                "id" => 15,
                "name" => "Fake Dog 03",
                "bred_for" => "A wild pack animal",
                "life_span" => "11 years",
                "temperament" => "Wild, Hardworking, Dutiful",
                "origin" => "",
            ],
            3 => [
                "weight" => [
                    "imperial" => "40 - 65",
                    "metric" => "18 - 29",
                ],
                "height" => [
                    "imperial" => "21 - 23",
                    "metric" => "53 - 58",
                ],
                "id" => 30,
                "name" => "Fake Dog 04",
                "bred_for" => "Badger, otter hunting",
                "breed_group" => "Terrier",
                "life_span" => "10 - 13 years",
                "temperament" => "Outgoing, Friendly, Alert, Confident, Intelligent, Courageous",
                "origin" => "United Kingdom, England",
            ],
            4 => [
                "weight" => [
                    "imperial" => "90 - 120",
                    "metric" => "41 - 54",
                ],
                "height" => [
                    "imperial" => "28 - 34",
                    "metric" => "71 - 86",
                ],
                "id" => 55,
                "name" => "Fake Dog 05",
                "bred_for" => "Sheep guarding",
                "breed_group" => "Working",
                "life_span" => "10 - 12 years",
                "temperament" => "Loyal, Independent, Intelligent, Brave",
                "origin" => "",
            ],
            5 => [
                "weight" => [
                    "imperial" => "65 - 115",
                    "metric" => "29 - 52",
                ],
                "height" => [
                    "imperial" => "24 - 28",
                    "metric" => "61 - 71",
                ],
                "id" => 99,
                "name" => "Fake Dog 06",
                "bred_for" => "Hunting bears",
                "breed_group" => "Working",
                "life_span" => "10 - 14 years",
                "temperament" => "Docile, Alert, Responsive, Dignified, Composed, Friendly, Receptive, Faithful, Courageous",
            ],
            6 => [
                "weight" => [
                    "imperial" => "55 - 90",
                    "metric" => "25 - 41",
                ],
                "height" => [
                    "imperial" => "18 - 24",
                    "metric" => "46 - 61",
                ],
                "id" => 100,
                "name" => "Fake Dog 07",
                "description" => "The Alapaha Blue Blood Bulldog is a well-developed, exaggerated bulldog with a broad head and natural drop ears. The prominent muzzle is covered by loose upper lips. The prominent eyes are set well apart. The Alapaha's coat is relatively short and fairly stiff. Preferred colors are blue merle, brown merle, or red merle all trimmed in white or chocolate and white. Also preferred are the glass eyes (blue) or marble eyes (brown and blue mixed in a single eye). The ears and tail are never trimmed or docked. The body is
            sturdy and very muscular. The well-muscled hips are narrower than the chest. The straight back is as long as the dog is high at the shoulders. The dewclaws are never removed and the feet are cat-like.",
                "bred_for" => "Guarding",
                "breed_group" => "Mixed",
                "life_span" => "12 - 13 years",
                "history" => "",
                "temperament" => "Loving, Protective, Trainable, Dutiful, Responsible",
            ],
            7 => [
                "weight" => [
                    "imperial" => "38 - 50",
                    "metric" => "17 - 23",
                ],
                "height" => [
                    "imperial" => "23 - 26",
                    "metric" => "58 - 66",
                ],
                "id" => 199,
                "name" => "Fake Dog 08",
                "bred_for" => "Sled pulling",
                "breed_group" => "Mixed",
                "life_span" => "10 - 13 years",
                "temperament" => "Friendly, Energetic, Loyal, Gentle, Confident",
            ],
            8 => [
                "weight" => [
                    "imperial" => "65 - 100",
                    "metric" => "29 - 45",
                ],
                "height" => [
                    "imperial" => "23 - 25",
                    "metric" => "58 - 64",
                ],
                "id" => 1000,
                "name" => "Fake Dog 09",
                "bred_for" => "Hauling heavy freight, Sled pulling",
                "breed_group" => "Working",
                "life_span" => "12 - 15 years",
                "temperament" => "Friendly, Affectionate, Devoted, Loyal, Dignified, Playful",
            ],
            9 => [
                "weight" => [
                    "imperial" => "60 - 120",
                    "metric" => "27 - 54",
                ],
                "height" => [
                    "imperial" => "22 - 27",
                    "metric" => "56 - 69",
                ],
                "id" => 1001,
                "name" => "Fake Dog 10",
                "breed_group" => "Working",
                "life_span" => "10 - 12 years",
                "temperament" => "Friendly, Assertive, Energetic, Loyal, Gentle, Confident, Dominant",
            ]
        ], 200);
    }
}
