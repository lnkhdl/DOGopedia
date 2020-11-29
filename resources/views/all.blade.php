@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-2 pt-8">
        <h2 class="text-4xl font-semibold mb-4">All Breeds</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
            @foreach ($dogs as $dog)
                <div class="rounded overflow-hidden p-3 bg-gray-800 hover:bg-gray-700">
                    <a href="{{ route('dogs.show', $dog['id']) }}">
                        <div class="text-lg">{{ $dog['name'] }}</div>
                        <div class="text-gray-400">
                            <span>{{ $dog['weight'] }} kg</span>
                            <span class="mx-2">|</span>
                            <span>{{ $dog['height'] }} cm</span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection