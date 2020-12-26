<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Facades\Http;

class Api
{
    protected $apiUrl;
    protected $apiToken;

    public function __construct()
    {
        $this->apiUrl = config('services.dogs.apiUrl');
        $this->apiToken = config('services.dogs.apiToken');
    }

    public function getAll(): array
    {
        return Http::withToken($this->apiToken)
        ->get($this->apiUrl . 'breeds')
        ->throw()
        ->json();
    }

    public function getSingleWithImages(int $id): array
    {
        return Http::withToken(config('services.dogs.apiToken'))
        ->get(config('services.dogs.apiUrl') . 'images/search?limit=100&breed_id=' . $id)
        ->throw()
        ->json();
    }

    public function getImages(string $limit, string $type): array
    {
        return Http::withToken(config('services.dogs.apiToken'))
        ->get(config('services.dogs.apiUrl') . 'images/search?limit=' . $limit . '&size=' . $type)
        ->throw()
        ->json();
    }
}