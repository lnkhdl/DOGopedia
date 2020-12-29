@extends('layouts.main')

@section('content')
    <div class="container px-2 pt-8 mx-auto">
        <h2 class="mb-4 text-4xl font-semibold text-indigo-900">All Breeds</h2>

        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 xl:grid-cols-3">
            @foreach ($dogs as $dog)
                <div class="p-3 overflow-hidden border border-gray-300 rounded shadow-lg hover:bg-gray-300">
                    <a href="{{ route('dogs.show', $dog['id']) }}">
                        <div class="text-lg font-bold text-indigo-900 hover:text-gray-900">{{ $dog['name'] }}</div>
                        <div class="text-gray-700">
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