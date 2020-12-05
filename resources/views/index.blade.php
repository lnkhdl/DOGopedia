@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-2 pt-8">
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
            @foreach ($dogs as $dog)
                <div class="rounded-lg overflow-hidden">
                    <a href="{{ route('dogs.show', $dog['id']) }}">
                        <img class="h-80 w-full object-cover hover:opacity-75 transition ease-in-out duration-150" src="{{ $dog['img_url'] }}" alt="dog_image">
                    </a>
                    <div class="px-2 py-4 bg-gray-800">
                        <a href="{{ route('dogs.show', $dog['id']) }}" class="text-lg hover:text-gray-300">{{ $dog['name'] }}</a>
                        <div class="text-gray-400">
                            <span>{{ $dog['weight'] }} kg</span>
                            <span class="mx-2">|</span>
                            <span>{{ $dog['height'] }} cm</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection