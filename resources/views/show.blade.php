@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 py-8 md:py-16 flex flex-col md:flex-row">
        <img src="{{ $images[0]['img_url'] }} " alt="dog-image" class="self-center w-full md:w-96 h-full object-cover rounded">
        <div class="md:ml-10 lg:ml-20">
            <h2 class="text-4xl font-semibold mt-4 md:mt-0">{{ $dog[0]['name'] }}</h2>
            <div class="text-xs inline-block font-bold leading-sm uppercase px-3 py-1 my-2 bg-purple-200 text-purple-700 rounded">
                {{ $dog[0]['breed_group'] }}
            </div>
            <div class="my-2">
                <span>{{ $dog[0]['weight'] }} kg</span>
                <span class="mx-2">|</span>
                <span>{{ $dog[0]['height'] }} cm</span>
                <span class="mx-2">|</span>
                <span>{{ $dog[0]['life_span'] }} years</span>
            </div>
            <div class="my-4 flex flex-col">
                <span class="text-gray-400">Characteristics</span>
                <span>{{ $dog[0]['bred_for'] }}</span>
            </div>
            <div class="my-4 flex flex-col">
                <span class="text-gray-400">Temperament</span>
                <span>{{ $dog[0]['temperament'] }}</span>
            </div>
        </div>
    </div>


    <div class="container mx-auto px-4 py-8">
        <h2 class="text-4xl font-semibold mb-4">Images</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
            @foreach ($images as $image)
                <a href="#">
                    <img class="h-80 w-full object-cover rounded hover:opacity-75 transition ease-in-out duration-150" src="{{ $image['img_url'] }} " alt="dog_img">
                </a>
            @endforeach
        </div>
    </div>
@endsection