@extends('layouts.main')

@section('content')
    <div class="container px-2 pt-8 mx-auto">
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 xl:grid-cols-3">
            @foreach ($dogs as $dog)
                <div class="overflow-hidden rounded-lg shadow-lg">
                    <a href="{{ route('dogs.show', $dog['id']) }}">
                        <img class="object-cover w-full transition duration-150 ease-in-out h-80 hover:opacity-90" src="{{ $dog['img_url'] }}" alt="dog_image">
                        <div class="p-4">
                            <span class="text-lg font-bold text-indigo-900 hover:text-indigo-700">{{ $dog['name'] }}</span>
                            <div class="text-gray-700">
                                <span>{{ $dog['weight'] }} kg</span>
                                <span class="mx-2">|</span>
                                <span>{{ $dog['height'] }} cm</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection