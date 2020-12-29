@extends('layouts.main')

@section('content')
    <div class="container flex flex-col px-4 py-8 mx-auto md:py-16 md:flex-row">
        <a data-lightbox="roadtrip" href="{{ $images[0]['img_url'] }}">
            <img src="{{ $images[0]['img_url'] }}" alt="dog-image" class="self-center object-cover w-full h-full rounded-lg shadow-lg md:w-96">
        </a>
        <div class="text-xl text-indigo-900 md:ml-10 lg:ml-20">
            <h2 class="mt-4 text-4xl font-semibold md:mt-0">{{ $dog['name'] }}</h2>

            @if ($dog['breed_group'] != '-')
                <div class="inline-block px-3 py-1 my-2 text-xs font-bold text-purple-700 uppercase bg-purple-200 rounded leading-sm">{{ $dog['breed_group'] }}</div>
            @endif
            
            <div class="my-4">
                <span>{{ $dog['weight'] }} kg</span>
                <span class="mx-2">|</span>
                <span>{{ $dog['height'] }} cm</span>
                <span class="mx-2">|</span>
                <span>{{ $dog['life_span'] }} years</span>
            </div>
            <div class="flex flex-col my-4">
                <span class="font-bold">Characteristics</span>
                <span class="text-gray-800">{{ $dog['bred_for'] }}</span>
            </div>
            <div class="flex flex-col my-4">
                <span class="font-bold">Temperament</span>
                <span class="text-gray-800">{{ $dog['temperament'] }}</span>
            </div>
        </div>
    </div>

    @if (count($images) > 1)
        <div class="container px-4 py-8 mx-auto">
            <h2 class="mb-4 text-4xl font-semibold text-indigo-900">Images</h2>
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 xl:grid-cols-3">
                @foreach ($images as $image)
                    @if ($loop->first) @continue @endif
                    <a data-lightbox="roadtrip" href="{{ $image['img_url'] }}">
                        <img class="object-cover w-full transition duration-150 ease-in-out rounded-lg shadow-lg h-80 hover:opacity-90" src="{{ $image['img_url'] }}" alt="dog_img">
                    </a>
                @endforeach
            </div>
        </div>
    @endif

@endsection